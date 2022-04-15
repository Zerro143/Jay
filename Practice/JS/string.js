let text = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
document.getElementById("len").innerHTML = text.length;
let str = "Apple, BMW   , Kiwi";
document.getElementById("slice").innerHTML = str.slice(7,13); 
document.getElementById("substring").innerHTML = str.substring(0,5);
function myFunction() {
    let text = document.getElementById("replace").innerHTML;
    document.getElementById("replace").innerHTML =
    text.replace("Gujarat","India");
    
}
let a = "5";
document.getElementById("padStart").innerHTML = a.padStart(4,"x");
document.getElementById("padEnd").innerHTML = a.padEnd(4,"x");