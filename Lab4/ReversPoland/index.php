<!DOCTYPE html>
<html>
  <head>
    <title>DigitToWord</title>
    <meta charset='UTF-8'>
  </head>
  <body>
    <h1>Перевод цифры в слово</h1>
    <form method='POST'>
      <label for='prim'>Введите пример</label>
      <input type='text' name='prim' min='0' max='9' id='prim' required>
      <button type='submit'>Сосчитать</button>
      <a href="http://localhost/Lab4/">Вернуться</a>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST')
    {
      $dataSring = $_POST['prim'];
      $dataSringInMass = explode(' ', $dataSring);
      echo $dataSringInMass[0];
    }
    ?>
  </body>
</html>