<!DOCTYPE html>
<html>
  <head>
    <title>Результат</title>
    <meta charset='UTF-8'>
  </head>
  <body>
    <h1>Результат</h1>
    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST')
    {
      $year = (int)$_POST['year'];
      ##В функ
      if (is_numeric($year) && $year > 0)
      {
        if (($year % 4 == 0 && $year % 100 != 0) || ($year % 400 == 0))
        {
          echo 'Год високосный';
        }
        else
        {
          echo 'Год невисокосный';
        }
      }
      elseif ($year == 0)
      {
        echo 'Вы не ввели год';
      }

    }
    ?>
    <br>
    <a href="index.html">Проверить другой год</a>
  </body>
</html>