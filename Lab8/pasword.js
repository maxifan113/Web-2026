function generatePassword(length) 
{
  const lower = 'abcdefghijklmnopqrstuvwxyz';
  const upper = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
  const digits = '0123456789';
  const special = '!@#$%^&*()_+-=[]{}|;:,.<>?';
  const allChars = lower + upper + digits + special;
  let password = '';
  let first4 = '';
  let found = false;
  let digit = 0;

  while (!found)
  {
    digit = Math.floor((Math.random() * 4) + 1)
    if (!(first4.includes(String(digit))))
    {
      first4 = String(digit) + first4;
    }
    if (first4.length == 4)
    {
      found = true;
    }
  }
  for (const element of first4) 
  {
    switch (element)
    {
      case '1':
        password += lower[Math.floor(Math.random() * lower.length)];
        break;
      case '2':
        password += upper[Math.floor(Math.random() * upper.length)];
        break;
      case '3':
        password += digits[Math.floor(Math.random() * digits.length)];
        break;
      case '4':
        password += special[Math.floor(Math.random() * special.length)];
        break;
    }
  }
  
  for (let i = password.length; i < length; i++) 
  {
    password += allChars[Math.floor(Math.random() * allChars.length)];
  }
  return password;
}

console.log(generatePassword(10));
console.log(generatePassword(8));
console.log(generatePassword(100));