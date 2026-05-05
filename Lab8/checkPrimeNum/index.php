<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Простые числа</title>
</head>
<body>
  <form>
    <lable for="number">Введите числа через пробел</lable><br>
    <input type="text" name="number" id="userNumber" placeholder="Введите числа"><br>
    <button type="button" onclick="checkPrimes()">Показать простые числа</button>
    <p id="result"></p>
    <a href="http://localhost/Lab8/">Вернуться</a>
  </form>

  <script src="primeNum.js"></script>
</body>
</html>