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
      ## свич на мэч
      switch ($digit) 
      {
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
      if (($digit >= 0) && ($digit < 10))
      {    
        $result = 'Вы ввели цифру: ' . match ($digit) 
        {
          '0' => 'ноль',
          '1' => 'один',
          '2' => 'два',
          '3' => 'три',
          '4' => 'четыре',
          '5' => 'пять',
          '6' => 'шесть',
          '7' => 'семь',
          '8' => 'восемь',
          '9' => 'девять',
        };
      } 
      else 
      {
        $result = 'Пожалуйста введите цифру от 0 до 9';
      }
      echo $result;
    }
    ?>
  </body>
</html>