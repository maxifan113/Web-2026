<!DOCTYPE html>
<html>
  <head>
    <title>Zodiac</title>
    <meta charset='UTF-8'>
  </head>
  <body>
    <h1>Определение знака зодиака</h1>
    <form method='POST'>
      <label for='date'>Укажите дату</label>
      <input type='date' name='date' id='date' required>
      <button type='submit'>Подтвердить</button>
      <a href="http://localhost/Lab4/">Вернуться</a>
    </form>

    <?php
    function serchZodiac($day, $months): string
    {
      if (($months == 1 && $day >= 21 && $day <= 31) || ($months == 2 && $day <= 20))
      {
        return 'Водолей';
      }
      if (($months == 2 && $day >= 21 && $day <= 28) || ($months == 3 && $day <= 20))
      {
        return 'Рыбы';
      }
      if (($months == 3 && $day >= 21 && $day <= 31) || ($months == 4 && $day <= 20))
      {
        return 'Овен';
      }
      if (($months == 4 && $day >= 21 && $day <= 30) || ($months == 5 && $day <= 20))
      {
        return 'Телец';
      }
      if (($months == 5 && $day >= 21 && $day <= 31) || ($months == 6 && $day <= 21))
      {
        return 'Близнецы';
      }
      if (($months == 6 && $day >= 22 && $day <= 30) || ($months == 7 && $day <= 22))
      {
        return 'Рак';
      }
      if (($months == 7 && $day >= 23 && $day <= 31) || ($months == 8 && $day <= 23))
      {
        return 'Лев';
      }
      if (($months == 8 && $day >= 24 && $day <= 31) || ($months == 9 && $day <= 23))
      {
        return 'Дева';
      }
      if (($months == 9 && $day >= 24 && $day <= 30) || ($months == 10 && $day <= 23))
      {
        return 'Весы';
      }
      if (($months == 10 && $day >= 24 && $day <= 31) || ($months == 11 && $day <= 22))
      {
        return 'Скорпион';
      }
      if (($months == 11 && $day >= 23 && $day <= 30) || ($months == 12 && $day <= 21))
      {
        return 'Стрелец';
      }
      if (($months == 12 && $day >= 22 && $day <= 31) || ($months == 1 && $day <= 20))
      {
        return 'Козерог';
      }
      else
      {
        return 'Некоректная дата';
      }
    }
    if ($_SERVER['REQUEST_METHOD'] == 'POST')
    {
      $date = $_POST['date'];
      $dateInArr = explode('-', $date);
      // Валидность даты
      if (count($dateInArr) == 3)
      {
        $day = $dateInArr[2];
        $months = $dateInArr[1];
        $result = serchZodiac($day, $months);
      }
      else
      {
        $result = 'Введена не коректная дата';
      }
      echo $result;
    }
    ?>
  </body>
</html>