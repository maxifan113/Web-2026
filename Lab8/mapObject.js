function mapObject(obj, callBack)
{
  let result = {};
  for (const key in obj) 
  {
    result[key] = callBack(obj[key]);
  }
  return result;
}

const nums = { a: 1, b: 2, c: 9 };
const newNums = mapObject(nums, x => x * 9);
for (const key in newNums) 
{
  console.log(newNums[key]);
}
