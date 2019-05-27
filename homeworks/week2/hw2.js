function capitalize(str) {
  if (str[0] >= 'A' && str[0] <= 'Z') {
    return str[0] + str.slice(1);
  }
  return str[0].toUpperCase() + str.slice(1);
}
const result = capitalize('!nick');
console.log(result);
