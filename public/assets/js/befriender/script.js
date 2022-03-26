// const request_list = document.getElementById("request-list");
// console.log(document.getElementById("request-list"));

// request_list.addEventListener("click", () => console.log("hello"));

document.getElementById("request-list").addEventListener("click", (e) => {
  console.log("hello");
  document.querySelector(".modal-bg").classList.add("display");
  document.querySelector(".card-container").style.bottom = 0;
});

document.querySelector(".close-btn").addEventListener("click", () => {
  console.log("helloooo");
  document.querySelector(".modal-bg").classList.remove("display");
  document.querySelector(".card-container").style.bottom = "999px";
});

document.getElementById("event-list").addEventListener("click", (e) => {
  console.log("hello");
  document.querySelector(".modal-background").classList.add("display");
  //document.querySelector(".card-container").style.bottom = 0;
});

// document.getElementById("view-btn").addEventListener("click", () => {
//   document.getElementById("event-popup").classList.add("display");
// })

document.querySelector(".close-btn").addEventListener("click", () => {
  document.getElementById("event-popup").classList.remove("display");
});

const name = ["Sanka", "Chandika", "Gallage"];

function displayPopup(eventId) {
  const months = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
  document.getElementById("event-popup").classList.add("display");
  console.log(eventArray);
  let event = eventArray[eventId];
  console.log(event.eventDate.split("-"));
  let dateArray = event.eventDate.split("-");
  document.querySelector(".event-topic").innerHTML = event.topic;
  document.querySelector(".event-date").innerHTML = `${dateArray[2]} ${months[parseInt(dateArray[1])-1]}, ${dateArray[0]}`;
  document.querySelector(".event-time").innerHTML = `${event.startTime} - ${event.endTime}`;
}
