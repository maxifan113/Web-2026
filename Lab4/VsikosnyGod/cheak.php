<!DOCTYPE html>
<html>
  <head>
    <title>Результат</title>
    <meta charset='UTF-8'>
  </head>
  <body>
    <h1>Результат</h1>
    <?php
    function vesGod($year): string
    {
      if (is_numeric($year) && $year > 0)
      {
        if (($year % 4 == 0 && $year % 100 != 0) || ($year % 400 == 0))
        {
          return 'Год високосный';
        }
        else
        {
          return 'Год невисокосный';
        }
      }
      elseif ($year == 0)
      {
        return 'Вы не ввели год';
      }
    }
    if ($_SERVER['REQUEST_METHOD'] == 'POST')
    {
      $year = (int)$_POST['year'];
      if (($year > 0) && ($year <= 30000))
      {
        $result = vesGod($year);
      }
      else
      {
        $result = 'Введите год в диапозоне от 1 до 30000';
      }
      echo $result;
    }
    ?>
    <br>
    <a href="index.html">Проверить другой год</a>
  </body>
</html>