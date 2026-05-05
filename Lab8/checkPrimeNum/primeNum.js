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
  let resultstr = '';
  for (let num of numbers) 
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
    resultstr = resultstr + 'и не простых чисел нет';
  }
  else
  {
    resultstr = resultstr + ' - не простые числа ';    
  }
  result.textContent = resultstr;
}