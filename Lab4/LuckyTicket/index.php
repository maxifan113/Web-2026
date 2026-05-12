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
      <input type='text' name='start' min='1' max='999999' id='start' required><br>
      <label for='end'>Введите максимальный номер билета</label>
      <input type='text' name='end' min='1' max='999999' id='end' required><br>
      <button type='submit'>Найти</button>
      <a href="http://localhost/Lab4/">Вернуться</a>
    </form>

    <?php
    // добавить проверку на число
    if ($_SERVER['REQUEST_METHOD'] == 'POST')
    {
      $start = $_POST['start'];
      $end = $_POST['end'];
      $ind = 0;
      for ($i = 0; strlen($start) < 6; $i++)
      {
        $start = '0' . $start;
      }
      for ($i = 0; strlen($end) < 6; $i++)
      {
        $end = '0' . $end;
      }
      for ($i = $start; $i <= $end; $i++)
      {
        $i = (string)$i;
        for ($j = 0; strlen($i) < 6; $j++)
        {
          $i = '0' . $i;
        }
        $firstHalf = ((string)$i)[0] + ((string)$i)[1] + ((string)$i)[2];
        $secondHalf = ((string)$i)[3] + ((string)$i)[4] + ((string)$i)[5];
        if ($secondHalf == $firstHalf)
        {
          echo "Билет номер {$i} счастливый<br>";
          $ind = 1;
        }
      }
      if ($ind == 0)
      {
        echo 'В этом диапозоне нет счастливых билетов';
      }
    }
    ?>
  </body>
</html>