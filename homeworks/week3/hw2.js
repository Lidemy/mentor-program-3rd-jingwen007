function alphaSwap(str) {
  const arr = str.slice('');
  const chr = [];
  for (let i = 0; i < arr.length; i += 1) {
    if ((arr[i] >= 'A') && (arr[i] <= 'Z')) {
      chr[i] = arr[i].toLowerCase();
    } else {
      chr[i] = arr[i].toUpperCase();
    }
  }
  return (chr.join(''));
}

module.exports = alphaSwap;
