<!DOCTYPE html>
<html>
  <head>
    <title>Factorial</title>
    <meta charset='UTF-8'>
  </head>
  <body>
    <h1>Счастливые билеты</h1>
    <form method='POST'>
      <label for='number'>Введите число</label>
      <input type='number' name='number' min='0' max='20' id='number' required><br>
      <button type='submit'>Вычислить</button>
      <a href="http://localhost/Lab4/">Вернуться</a>
    </form>

    <?php
    function factoria($digit): int
    {
      if ($digit > 0)
      {
        $resultNum = $digit * factoria($digit - 1);
        return $resultNum;
      }
      else
      {
        return 1;
      }  
    }
    if ($_SERVER['REQUEST_METHOD'] == 'POST')
    {
      $digit = $_POST['number'];
      $result = factoria($digit);
      echo $result;
    }
    ?>
  </body>
</html>