<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Подсчёт гласных</title>
</head>
<body>
  <form>
    <lable for="str">Введите строку</lable><br>
    <input type="text" name="str" id="userStr" placeholder="Введите строку"><br>
    <button type="button" onclick="countVowels()">Показать количество гласных</button>
    <p id="result"></p>
    <a href="http://localhost/Lab8/">Вернуться</a>
  </form>

  <script src="countVowels.js"></script>
</body>
</html>