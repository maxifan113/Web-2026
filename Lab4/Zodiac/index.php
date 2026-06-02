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
      <input type='text' name='date' id='date' required>
      <button type='submit'>Подтвердить</button>
      <a href="http://localhost/Lab4/">Вернуться</a>
    </form>

    <?php
    function parseDate($dateString) {
      $dateString = trim($dateString);
      $dateString = str_replace(['-', '/', '.', ' '], '-', $dateString);
      
      $parts = explode('-', $dateString);
      $parts = array_map('intval', $parts);
      
      if (count($parts) == 3) {
        if ($parts[0] >= 32 && $parts[0] <= 9999) {
          return getDayAndMonth($parts[1], $parts[2]);
        } elseif ($parts[1] >= 32 && $parts[1] <= 9999) {
          return getDayAndMonth($parts[0], $parts[2]);
        } elseif ($parts[2] >= 32 && $parts[2] <= 9999) {
          return getDayAndMonth($parts[0], $parts[1]);
        }
      } elseif (count($parts) == 2) {
          return getDayAndMonth($parts[0], $parts[1]);
      }
      
      return null;
    }

    function getDayAndMonth($first, $second) {
      $first = (int)$first;
      $second = (int)$second;
      if ($first >= 1 && $first <= 12 && $second >= 1 && $second <= 31) {
        return ['day' => $second, 'month' => $first];
      } elseif ($second >= 1 && $second <= 12 && $first >= 1 && $first <= 31) {
        return ['day' => $first, 'month' => $second];
      }
      return null;
    }

    function isValidDate($day, $month) {
      if ($month < 1 || $month > 12) {
        return false;
      }
      if ($day < 1 || $day > 31) {
        return false;
      }
    return true;
    }

    function searchZodiac($day, $month): string {
      if (($month == 1 && $day >= 21 && $day <= 31) || ($month == 2 && $day <= 20)) {
        return 'Водолей';
      }
      if (($month == 2 && $day >= 21 && $day <= 29) || ($month == 3 && $day <= 20)) {
        return 'Рыбы';
      }
      if (($month == 3 && $day >= 21 && $day <= 31) || ($month == 4 && $day <= 20)) {
        return 'Овен';
     }
      if (($month == 4 && $day >= 21 && $day <= 30) || ($month == 5 && $day <= 20)) {
        return 'Телец';
      }
      if (($month == 5 && $day >= 21 && $day <= 31) || ($month == 6 && $day <= 21)) {
        return 'Близнецы';
      }
      if (($month == 6 && $day >= 22 && $day <= 30) || ($month == 7 && $day <= 22)) {
        return 'Рак';
      }
      if (($month == 7 && $day >= 23 && $day <= 31) || ($month == 8 && $day <= 23)) {
        return 'Лев';
      }
      if (($month == 8 && $day >= 24 && $day <= 31) || ($month == 9 && $day <= 23)) {
        return 'Дева';
      }
      if (($month == 9 && $day >= 24 && $day <= 30) || ($month == 10 && $day <= 23)) {
        return 'Весы';
      }
      if (($month == 10 && $day >= 24 && $day <= 31) || ($month == 11 && $day <= 22)) {
        return 'Скорпион';
      }
      if (($month == 11 && $day >= 23 && $day <= 30) || ($month == 12 && $day <= 21)) {
        return 'Стрелец';
      }
      if (($month == 12 && $day >= 22 && $day <= 31) || ($month == 1 && $day <= 20)) {
        return 'Козерог';
      }
      return 'Не удалось определить знак зодиака';
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $dateString = $_POST['date'];
      $parsedDate = parseDate($dateString);
      if ($parsedDate !== null) {
        $day = $parsedDate['day'];
        $month = $parsedDate['month'];
        if (isValidDate($day, $month)) {
          $zodiac = searchZodiac($day, $month);
          echo "Знак зодиака: $zodiac";
        } else {
            echo "Некорректные день или месяц (день: $day, месяц: $month)";
        }
      } else {
        echo "Ошибка: Не удалось распознать дату";
      }
    }
    ?>
  </body>
</html>