function objToArr(obj, str)
{
  let arr = obj.map(x => x[str]);
  return arr;
}


const users = [
  { id: 1, name: "Alice" },
  { id: 2, name: "Bob" },
  { id: 3, name: "Charlie" }
];

console.log(objToArr(users, 'name'));
console.log(objToArr(users, 'id'));
console.log(objToArr(users, ''));