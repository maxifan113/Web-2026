<?php

header('Content-Type: application/json');
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

if (!isset($request_data['image']) || empty($request_data['image'])) {
  http_response_code(400);
  echo json_encode([
    'success' => false,
    'error' => 'Поле "image" обязательно и не может быть пустым'
  ]);
  exit;
}

$base64_image = $request_data['image'];
if (preg_match('/^data:image\/(\w+);base64,/', $base64_image, $matches)) {
    $image_extension = $matches[1];
    $base64_image = substr($base64_image, strpos($base64_image, ',') + 1);
} else {
    $image_extension = 'png';
}

$image_data = base64_decode($base64_image);
if ($image_data === false) {
  http_response_code(400);
  echo json_encode([
    'success' => false,
    'error' => 'Невалидные base64 данные'
  ]);
  exit;
}

$static_dir = __DIR__ . '/static';
if (!file_exists($static_dir)) {
  mkdir($static_dir, 0777, true);
}

$filename = uniqid() . '_' . time() . '.' . $image_extension;
$file_path = $static_dir . '/' . $filename;
$result = file_put_contents($file_path, $image_data);

if ($result === false) {
  http_response_code(500);
  echo json_encode([
    'success' => false,
    'error' => 'Ошибка при сохранении файла',
    'path_attempted' => $file_path
  ]);
  exit;
}

$file_url = '/static/' . $filename;
http_response_code(200);
echo json_encode([
  'success' => true,
  'message' => 'Изображение успешно загружено',
  'filename' => $filename,
  'path' => $file_path,
  'url' => $file_url,
  'size' => $result,
  'timestamp' => time()
]);
?>