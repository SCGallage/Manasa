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

const getMeetingTypeDetails = async (meetingId, meetingType, event) => {
  await fetch(`http://localhost:80/api/v1/supportgroup/eventTypeDetails?meetingId=${meetingId}&meetingType=${meetingType}`)
      .then(response => response.json())
      .then(data => {
        console.log(data);
        if (event.type === 'physical') {

            document.getElementById('event-btn').href = `https://www.google.com/maps/search/?api=1&query=${data.lat}%2C${data.lng}&query_place_id=${data.place_id}`;
        } else if (event.type === 'virtual') {
            document.getElementById('info-field').innerHTML = `Meeting ID: ${data.meetingId}<br>Password: ${data.password}`;
            document.getElementById('event-btn').href = data.join_url;
        }
      });
}

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
  getMeetingTypeDetails(event.id, event.type, event);
}

const deleteEvent = async (eventId) => {
  await fetch('http://localhost:80/api/v1/supportgroup/deleteEvent', {
      method: 'POST',
      mode: "cors",
      cache: "no-cache",
      headers: {
        'Content-Type': 'application/json'
      },
      body: JSON.stringify({
        id: eventId
      }
  )})
      .then(response => response.json())
      .then(data => {
        (data.result === 1 ? window.location.reload() : '')
      });
}


