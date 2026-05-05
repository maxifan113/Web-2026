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
      $stack = [];
      $operations = ['+', '-', '/', '*', '^'];
      
      foreach ($arr as $elem) 
      {
        if (is_numeric($elem)) 
        {
          array_push($stack, $elem);
        }
        elseif (in_array($elem, $operations)) 
        {
          if (count($stack) < 2) 
          {
            return "Ошибка: недостаточно операндов для операции '$elem'";
          }
          $second = array_pop($stack);
          $first = array_pop($stack);    
          switch ($elem) {
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
                return "Ошибка: деление на ноль";
              }
              break;
            case '^':
              $result = pow($first, $second);
              break;
            default:
              return "Ошибка: неизвестная операция '$elem'";
              }
            array_push($stack, $result);
          }
          else 
          {
            return "Ошибка: недопустимый токен '$elem'";
          }
      }
      if (count($stack) !== 1) {
          return "Ошибка: некорректное выражение, осталось " . count($stack) . " элементов в стеке";
      }
      $finalResult = $stack[0];
      return (string)$finalResult;
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