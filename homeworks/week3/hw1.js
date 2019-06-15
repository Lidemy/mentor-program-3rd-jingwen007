function stars(num) {
  let str = '';
  const arr = [];
  for (let i = 0; i < num; i += 1) {
    str += '*';
    arr.push(str);
  }
  return arr;
}

module.exports = stars;
