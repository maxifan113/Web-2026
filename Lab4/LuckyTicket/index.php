<!DOCTYPE html>
<html>
  <head>
    <title>Lucky tiket</title>
    <meta charset='UTF-8'>
  </head>
  <body>
    <h1>Счастливые билеты</h1>
    <form method='POST'>
      <label for='start'>Введите минимальный номер билета</label>
      <input type='number' name='start' min='100000' max='999999' id='start' required><br>
      <label for='end'>Введите максимальный номер билета</label>
      <input type='number' name='end' min='100000' max='999999' id='end' required><br>
      <button type='submit'>Найти</button>
      <a href="http://localhost/Lab4/">Вернуться</a>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST')
    {
      $start = $_POST['start'];
      $end = $_POST['end'];
      if ((strlen($start) == 6) && (strlen($end) == 6))
      {
        for ($i = $start; $i <= $end; $i++)
        {
          $firstHalf = ((string)$i)[0] + ((string)$i)[1] + ((string)$i)[2];
          $secondHalf = ((string)$i)[3] + ((string)$i)[4] + ((string)$i)[5];
          if ($secondHalf == $firstHalf)
          {
            echo "Билет номер {$i} счастливый<br>";
          }
        }
      }
      else
      {
        echo 'Введите число в от 100000 до 999999';
      }
    }
    ?>
  </body>
</html>