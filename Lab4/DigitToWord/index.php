<!DOCTYPE html>
<html>
  <head>
    <title>DigitToWord</title>
    <meta charset='UTF-8'>
  </head>
  <body>
    <h1>Перевод цифры в слово</h1>
    <form method='POST'>
      <label for='digit'>Введите цифру 0т 0 до 9</label>
      <input type='number' name='digit' min='0' max='9' id='digit' required>
      <button type='submit'>Перевести</button>
      <a href="http://localhost/Lab4/">Вернуться</a>
    </form>

    <?php
    function digitToWord($digit): string
    {
      switch ($digit) 
      {
        case 0:
          return 'Ноль';
        case 1:
          return 'Один';
        case 2:
          return 'Два';
        case 3:
          return 'Три';
        case 4:
          return 'Четыре';
        case 5:
          return 'Пять';
        case 6:
          return 'Шесть';
        case 7:
          return 'Семь';
        case 8:
          return 'Восемь';
        case 9:
          return 'Девять';
        default:
          return 'Неверная цифра';
      }
    }
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST')
    {
      $digit = $_POST['digit'];
      $result = 'Вы ввели цифру: ' . digitToWord($digit);
      echo $result;
    }
    ?>
  </body>
</html>