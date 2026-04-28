<!DOCTYPE html>
<html>
  <head>
    <title>ReversePoland</title>
    <meta charset='UTF-8'>
  </head>
  <body>
    <h1>Польская запись</h1>
    <form method='POST'>
      <label for='prim'>Введите пример</label>
      <input type='text' name='prim' id='prim' required>
      <button type='submit'>Сосчитать</button>
      <a href="http://localhost/Lab4/">Вернуться</a>
    </form>

    <?php
    function reversePoland($arr): string
    {
      $result = 0;
      $i = 0;
      $operations = ['+', '-', '/', '*', '^'];
      while (count($arr) > 1)
      {
        $first = 0;
        $second = 0;
        $third = 0;
        while (!(in_array($third, $operations)))
        {
          if ($i + 2 < count($arr))
          {
            $i = 0;
          }            
          $first = $arr[$i];
          $second = $arr[$i+1];
          $third = $arr[$i+2];
          $i++;
        }
        $i--;
        switch ($third)
        {
          case '+':
            $result = $first + $second;
            break;
          case '-':
            $result = $first - $second;
            break;
          case '*':
            $result = $first * $second;
            break;
          case '/':
            if ($second != 0) 
            {
              $result = $first / $second;
            } 
            else 
            {
              $result = 'Ошибка: деление на ноль';
            }
            break;
          case '^':
            $result = pow($first, $second);
            break;
        }
        $arr[$i] = $result;
        unset($arr[$i+1]);
        unset($arr[$i+2]);
        $arr = array_values($arr);
      }
      return (string)$result;
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST')
    {
      $dataSring = $_POST['prim'];
      $dataSringInArr = explode(' ', $dataSring);
      $result = reversePoland($dataSringInArr);
      echo 'Ответ: ' . $result;
    }
    ?>
  </body>
</html>