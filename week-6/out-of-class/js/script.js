"use strict";

function renderOutput(output) {
    let output_element = document.getElementById("output");
    output_element.innerHTML += "<div>" + output + "</div>"
}

let hours = [
    "Monday: 9a - 9p",
    "Tuesday: 9a - 9p",
    "Wednesday: 9a - 9p",
    "Thursday: 9a - 9p",
    "Friday: 9a - 5p",
    "Saturday: 9a - 5p",
    "Sunday: closed"
];

function displayOneDaysHours(original_hours) {
  let parts_of_hours = original_hours.split(": ");
  if (parts_of_hours[1] === "closed") {
      renderOutput("On " + parts_of_hours[0] + " the library is " + parts_of_hours[1] + ".");
      } else {
      renderOutput("On " + parts_of_hours[0] + " the hours are " + parts_of_hours[1] + ".");
      }
}

function dailyHours(hours) {
  hours.forEach(displayOneDaysHours);
}

dailyHours(hours);


 