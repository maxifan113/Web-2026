function applyOperation(first, operation, second) 
{
  switch (operation) {
    case '+': 
      return first + second;
    case '-': 
      return first - second;
    case '*': 
      return first * second;
    case '/':
      if (second == 0)
      {
        console.warn('Делим на ноль')
        return NaN;
      }
      else 
        return first / second;
    default: 
      return first;
  }
}
function compare(first, compSymb, second)
{
    switch (compSymb) {
    case '>': 
      return first > second;
    case '>=': 
      return first >= second;
    case '<': 
      return first < second;
    case '<=': 
      return first <= second;
    case '=': 
      return first == second;
    case '!=': 
      return first != second;
    default: 
      return first;
  }
}

const numbers = [2, 5, 8, 10, 3];
const operation = '*';
const compOperation = '<';
const operationNum = 3;
const compNum = 10;

let firstStep = [];
let secondStep = [];

firstStep = numbers.map(x => applyOperation(x, operation, operationNum));
secondStep = firstStep.filter(x => compare(x, compOperation, compNum));
console.log(secondStep)