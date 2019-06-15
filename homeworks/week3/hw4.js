function isPalindrome(str) {
  const arr = str.split('');
  const result = arr.reverse().join('');
  return result === str;
}
console.log(isPalindrome('abcbfa'));

module.exports = isPalindrome;
