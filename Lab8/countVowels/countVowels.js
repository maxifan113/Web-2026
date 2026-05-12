function countVowels() 
{
  let result = document.getElementById('result');
  const input = document.getElementById('userStr');
  const resiveSrting = input.value.toLowerCase();
  const vowels = ['а', 'е', 'ё', 'и', 'о', 'у', 'ы', 'э', 'ю', 'я'];
  let counter = 0;
    
  for (let char of resiveSrting) 
  {
    if (vowels.includes(char))
    {
      counter++;
    }
    }
    
  result.textContent = 'Количество гласных в строке: ' + counter; 
}