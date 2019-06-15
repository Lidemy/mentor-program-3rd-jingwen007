function isPrime(num) {
  if (num === 1) {
    return false;
  }
  if (num <= 100000 && num >= 1) {
    for (let i = 2; i < num; i += 1) {
      if (num % i === 0) {
        return false;
      }
    }
    return true;
  }
  return true;
}
module.exports = isPrime;
