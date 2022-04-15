const time = new Date().getHours();
let greeting;
if (time < 10) {
  greeting = "Good morning";
} else if (time < 20) {
  greeting = "Good Afternoon";
} else {
  greeting = "Good evening";
}
document.getElementById("wish").innerHTML = greeting;