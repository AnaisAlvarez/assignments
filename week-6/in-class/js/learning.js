// "use strict" tells the browser to enforce some rules about what can be in our JavaScript.
"use strict";

let my_name = "Anais";
let your_name = "Kylo";

let name = prompt("Give us a name: ")

if (name.length === my_name.length){
  renderOutput("Are you Anais?");
} else if (name.length === your_name.length) {
  renderOutput("Are you Kylo?");
} else {
  renderOutput("Who are you?");
}

if (name === my_name) {
  renderOutput("That's me!");
} else if (name === your_name) {
  renderOutput("That's Kylo!");
} else {
  renderOutput("I must be someone else.");
}

/*for (var index = 0; index < 10; index++){
  renderOutput(index);
}*/

function helloWorld() {
  renderOutput("Hello World");
}

helloWorld();

function helloName(name) {
  renderOutput("Hello " + name);
}

helloName(name);
helloName("Ben");
helloName("George");
helloName("Martha");

function todaysHours(days_hours) {
  renderOutput("ran todaysHours once");
  renderOutput(days_hours);
}

//todaysHours("Tuesday: 9a - 5p");

hours.forEach(todaysHours);
