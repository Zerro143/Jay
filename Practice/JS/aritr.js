const numbers = [45, 4, 9, 16, 25];

let txt = "";
numbers.forEach(myFunc);
document.getElementById("arj").innerHTML = txt;

function myFunc(value) {
  txt += value + ","; 
}

const numbers2 = numbers.map(myFunction);

document.getElementById("ark").innerHTML = numbers2;

function myFunction(value /*index, array*/) {
  return value * 2 ;
}