function isPrime(num) {
  if (num < 1) 
    return false;
  for (let i = 2; i < num; i++) 
  {
  if (num % i === 0) 
    return false;
  }
  return true;
}

function checkPrimes() 
{
  const input = document.getElementById('userNumber');
  const numbers = (input.value).split(' ');
  let result = document.getElementById('result');
  let primes = [];
  let notPrimes = [];
  let notDigit = [];
  let resultstr = '';
  for (let num of numbers) 
  {
    if (!isNaN(parseInt(num, 10)))
    {  
      if (isPrime(num)) 
      {
        primes.push(num);
      }
      else
      {
        notPrimes.push(num);
      }
    }
    else
      notDigit.push(num);
  }
    
  if (primes.length == 0)
  {
    resultstr = 'Простых чисел нет ';
  }
  else
  {
    resultstr = primes.join(', ') + ' - простые числа ';    
  }

  if (notPrimes.length == 0 || notPrimes.includes(''))    
  {
    resultstr = resultstr + 'и нет не простых чисел нет ';
  }
  else
  {
    resultstr = resultstr + notPrimes.join(', ') + ' - не простые числа ';    
  }

  if (notDigit.length >= 1 && !notDigit.includes(''))    
  {
    resultstr = resultstr + 'и не числа: ' + notDigit.join(', ');
  }

  result.textContent = resultstr;
}