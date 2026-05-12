function object() 
{
  let result = document.getElementById('result');
  const input = document.getElementById('userStr');
  const arr = (input.value).split(' ');
  let output = '';
  let obj = {};
  for (let element of arr) 
  {
    if (element.startsWith("'") && element.endsWith("'")) 
    {
      element = element.slice(1, -1);
    }

    if (element.startsWith('"') && element.endsWith('"')) 
    {
      element = element.slice(1, -1);
    }

    if (obj[element])
    {
      obj[element]++;
    }
    else
    {
      obj[element] = 1;
    }
  }

  for (const key in obj) 
  {    
    output = output + key + ': ' + obj[key] + ' | ';
  }
  if (arr.length === 1 && arr[0] === '')
    output = 'Вы ничего не ввели';
    
  result.textContent = output; 
}
// Ковычки не учитывать