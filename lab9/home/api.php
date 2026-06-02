<?php
/**
 *   URL: http://localhost/lab7/home/api.php
 *{
 *    "user_id": 
 *    "comment_text": 
 *    "full_text": 
 *    "photo_count":
 *    "likes": 
 *    "has_more":
 *    "views": 
 *    "comments_count": 
 *    "image": 
 */
header('Content-Type: application/json');
require_once 'config/database.php';
$method = $_SERVER['REQUEST_METHOD'];
if ($method !== 'POST') {
    http_response_code(405);
    echo json_encode([
        'success' => false,
        'error' => 'Метод не поддерживается. Используйте POST.',
        'method_used' => $method
    ]);
    exit;
}

$input_data = file_get_contents('php://input');
$request_data = json_decode($input_data, true);
if (json_last_error() !== JSON_ERROR_NONE) {
    http_response_code(400);
    echo json_encode([
        'success' => false,
        'error' => 'Невалидный JSON формат',
        'json_error' => json_last_error_msg()
    ]);
    exit;
}

$required_fields = ['user_id', 'comment_text', 'image'];
$missing_fields = [];

// Проверяем каждое обязательное поле
foreach ($required_fields as $field) {
    if (!isset($request_data[$field]) || empty($request_data[$field])) {
        $missing_fields[] = $field;
    }
}
if (!empty($missing_fields)) {
    http_response_code(400);
    echo json_encode([
        'success' => false,
        'error' => 'Отсутствуют обязательные поля',
        'missing_fields' => $missing_fields
    ]);
    exit;
}

$base64_image = $request_data['image'];
if (preg_match('/^data:image\/(\w+);base64,/', $base64_image, $matches)) {
    $image_extension = $matches[1]; // 'jpeg', 'png', 'jpg', 'gif'
    $base64_image = substr($base64_image, strpos($base64_image, ',') + 1);
} else {
    $image_extension = 'jpg';
}
$image_data = base64_decode($base64_image);
if ($image_data === false) {
    http_response_code(400);
    echo json_encode([
        'success' => false,
        'error' => 'Невалидные base64 данные. Некорректная картинка.'
    ]);
    exit;
}
$images_dir = __DIR__ . '/image';
if (!file_exists($images_dir)) {
    mkdir($images_dir, 0777, true);
}
$filename = uniqid() . '_' . time() . '.' . $image_extension;
$file_path = $images_dir . '/' . $filename;

$result = file_put_contents($file_path, $image_data);
if ($result === false) {
    http_response_code(500);
    echo json_encode([
        'success' => false,
        'error' => 'Ошибка при сохранении файла на сервере',
        'attempted_path' => $file_path
    ]);
    exit;
}
$image_url = 'image/' . $filename;

try {
    $db = Database::getInstance()->getConnection();
    $sql = "INSERT INTO posts (
        user_id,
        image_url,
        photo_count,
        likes,
        comment_text,
        full_text,
        has_more,
        views,
        comments_count
    ) VALUES (
        ?, ?, ?, ?, ?, ?, ?, ?, ?
    )";
    $stmt = $db->prepare($sql);
    $params = [
        (int)$request_data['user_id'],                   
        $image_url,                                       
        $request_data['photo_count'] ?? 1,                
        $request_data['likes'] ?? 0,                      
        $request_data['comment_text'],                    
        $request_data['full_text'] ?? null,               
        $request_data['has_more'] ?? false,               
        $request_data['views'] ?? 0,                     
        $request_data['comments_count'] ?? 0              
    ];
  
    $stmt->execute($params);
    $new_post_id = $db->lastInsertId();
    http_response_code(200);
    echo json_encode([
        'success' => true,
        'message' => 'Пост успешно создан',
        'post_id' => $new_post_id,
        'image_url' => $image_url,
        'post_url' => "/post.php?postId={$new_post_id}",
        'timestamp' => time()
    ]);
    
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode([
        'success' => false,
        'error' => 'Ошибка при сохранении в базу данных',
        'db_error' => $e->getMessage()
    ]);
}