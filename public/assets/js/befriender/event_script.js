let events = [
    {"eventName": "Annual Meeting", "participants": 25, "start": "9:00", "end": "10:00", "duration": 60},
    {"eventName": "General Meeting", "participants": 35, "start": "10:15", "end": "12:15",  "duration": 120},
    {"eventName": "Annual Meeting", "participants": 55, "start": "14:30", "end": "15:30", "duration": 60}
];


let colors = ["#cfe0e8", "#b7d7e8", "#87bdd8", "#daebe8"];

let pixelValues = {9: 0, 10: 60, 11: 120, 12: 180, 13: 240, 14: 300, 15: 360, 16: 420};

events.forEach((event) => {
    console.log(event.start);
});

console.log(pixelValues[14]);

const cardList = document.querySelector(".cards-list");
let formState = false;
let dateValidationState = false;
let timeValidationState = false;
let timeDiffValidationState = false;
// let card = document.createElement("div");
// card.classList.add("pixel");

// cardList.appendChild(card);

const loadEventList = (eventList) => {
    eventList.forEach((event, index) => {
        let timeArray = event.startTime.split(":");

        let singleCard = document.createElement("div");
        let eventName = document.createElement("h4");
        let eventParticiapants = document.createElement("h5");
        eventName.innerHTML = event.topic;
        eventName.classList.add("event-title-text");

        eventParticiapants.innerHTML = `Time: ${event.startTime} - ${event.endTime}`;
        eventParticiapants.classList.add("participant-text");

        singleCard.classList.add("single-card");
        singleCard.style.paddingTop = "5px";
        singleCard.style.paddingBottom = `${event.duration - 49}px`;
        singleCard.style.backgroundColor = colors[Math.floor(Math.random()*4)];
        // singleCard.style.paddingLeft = "30px";
        // singleCard.style.paddingRight = "30px";

        // if(index != 0) {singleCard.style.marginTop = `${pixelValues[event.start]-(pixelValues[events[index-1].start] + (events[index-1].duration*0.5))}px`;
        // console.log("Pixel Value:",pixelValues[event.start]-(pixelValues[events[index-1].start] + (events[index-1].duration*0.5)));}
        if(index != 0) {
            //console.log("Prev> Event: ", event[index-1]);
            let previousTimeArray = eventList[index-1].startTime.split(":");
            console.log(previousTimeArray);
            singleCard.style.marginTop = `${(pixelValues[parseInt(timeArray[0])]+(parseInt(timeArray[1])))-(pixelValues[previousTimeArray[0]] + parseInt(previousTimeArray[1]) + (events[index-1].duration))}px`;
            //console.log("Pixel Value:",pixelValues[parseInt(timeArray[0])]+(parseInt(timeArray[1])))-(pixelValues[previousTimeArray[0]] + parseInt(previousTimeArray[1]) + (events[index-1].duration));
        }
        singleCard.appendChild(eventName);
        singleCard.appendChild(eventParticiapants);
        cardList.appendChild(singleCard);

        console.log("Values:", Math.floor(Math.random()*4));
    });

};

let eventStart = document.getElementById("event-start");
let eventEnd = document.getElementById("event-end");

let logTime = () => console.log(eventStart.value);

// const timeDifferenceInMinutes = (firstTime, secondTime) => {
//     let firstTimeArray = firstTime.split(":");
//     let secondTimeArray = secondTime.split(":");
    
//     console.log(firstTimeArray.value);
//     console.log(secondTimeArray.value);
// };

const validateTime = (timeField) => {
    console.log("Time: ", timeField.value);
    let currentDate = new Date();
    let hour = currentDate.getHours();
    let minutes = currentDate.getMinutes();

    let selectedDate = new Date(sessionStorage.getItem('event-date'));

    let timeFieldArray = timeField.value.split(":");
    let timeFieldHour = parseInt(timeFieldArray[0]);
    let timeFieldMinute = parseInt(timeFieldArray[1]);

    console.log(timeFieldArray);
    // if (hour > parseInt(timeFieldArray[0])) console.log("Has entered a before time.");
    // if (minutes > parseInt(timeFieldArray[1])) console.log("Has entered a before time as well");

    console.log("Selected Time: ", selectedDate.getTime());
    console.log("Current Time: ", currentDate.getTime());

    if (selectedDate.getTime() < currentDate.getTime()){
        console.log("date is before today!");
        return;
    }

    if ((selectedDate.toDateString() === currentDate.toDateString())){
        if (hour > timeFieldHour){
            console.log("This is an old time");
            return;
        }
        if (minutes > timeFieldMinute && hour === timeFieldHour){
            console.log("This is an old time as well.");
            return;
        }
    }

    // if (!(timeFieldHour < 17 && timeFieldHour >= 9)){
    //     console.log("Time range out of the boundaries!");
    //     return;
    // }

    timeDifferenceInMinutes();
}

const timeDifferenceInMinutes = () => {
    if (eventStart.value === '' || eventEnd.value === ''){
        console.log("One of the fields are still empty!");
        return;
    }
    let eventStartArray = eventStart.value.split(":");
    let eventEndArray = eventEnd.value.split(":");

    let eventStartHour = parseInt(eventStartArray[0]);
    let eventStartMinutes = parseInt(eventStartArray[1]);

    let eventEndHour = parseInt(eventEndArray[0]);
    let eventEndMinutes = parseInt(eventEndArray[1]);

    let minutesDifference = (((eventEndHour - eventStartHour) <= 0) ? 
        0 : (eventEndHour - eventStartHour) * 60) + (eventEndMinutes - eventStartMinutes);
    console.log("Minutes Diff. :", minutesDifference)

    console.log("Event end: ", eventEnd.value);
    console.log(eventStartArray);
    //console.log(eventEndArray);
};

const validateEventTime = () => {
  let eventStartArray = eventStart.value.split(":");
  let startStartTimeMinutes = (parseInt(eventStartArray[0])*60) + parseInt(eventStartArray[1]);

  let eventEndArray = eventEnd.value.split(":");
  let evenEndTimeMinutes = (parseInt(eventEndArray[0])*60) + parseInt(eventEndArray[1]);
  const errorMsg = document.getElementById("error");
  if ((evenEndTimeMinutes - startStartTimeMinutes) >= 30) {
      errorMsg.innerHTML = "";
      timeDiffValidationState = true;
      return;
  }
  errorMsg.innerHTML = "Event Time Error.";

}

const validateStartTime = () => {
    const errorMsg = document.getElementById("error");
    let eventStartArray = eventStart.value.split(":");
    let startStartTimeMinutes = (parseInt(eventStartArray[0])*60) + parseInt(eventStartArray[1]);
    if ((9*60) > startStartTimeMinutes || (17*60) < startStartTimeMinutes) {
        errorMsg.innerHTML = "Start Time Invalid."
        timeValidationState = false;
        return;
    }
    timeValidationState = true;
    eventEnd.disabled = false;
}

//eventStart.disabled = true;
//eventStart.addEventListener("change", validateStartTime);

const openLocationModal = () => {
    console.log("Class", document.querySelector(".modal-secondary-bg").classList.add("open-modal"));
};

const submitEventDetails = () => {
    let eventName = document.getElementById("event-name").value;
    let eventStart = document.getElementById("event-start").value;
    let eventEnd = document.getElementById("event-end").value;
    let eventAgenda = document.getElementById("event-agenda").value;
    let notify = document.getElementById("notify").checked;
    let meetingType = (document.getElementById("virtual").checked) ? "virtual": "physical";

    console.log(JSON.parse(sessionStorage.getItem('location')));
    let meetingObject = null;
    if (sessionStorage.getItem('location') === null)
    {    
        meetingObject = {
            topic: eventName,
            eventDate: sessionStorage.getItem("event-date"),
            startTime: eventStart,
            endTime: eventEnd,
            agenda: eventAgenda,
            notify: notify,
            type: meetingType,
            supportGroupId: 1
        };
    } else {
        meetingObject = {
            topic: eventName,
            eventDate: sessionStorage.getItem("event-date"),
            startTime: eventStart,
            endTime: eventEnd,
            agenda: eventAgenda,
            notify: notify,
            type: meetingType,
            location: JSON.parse(sessionStorage.getItem("location")),
            supportGroupId: 1
        };
    }  
    console.log(meetingObject);
    fetch('http://localhost:80/api/v1/supportgroup/createEvent', {
        method: 'POST', // or 'PUT'
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify(meetingObject),
        })
        .then(response => response.json())
        .then(data => {
        console.log('Success:', data);
        window.location.reload();
    });

    //console.log(JSON.stringify(meetingObject));
};

const validateDate = () => {
    let selectedDateString = sessionStorage.getItem("event-date");
    let currentDate = new Date();
    const error = document.getElementById("error");
    const selectedDate = new Date(selectedDateString);
    const diffTime = Math.abs(currentDate - selectedDate);
    const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));
    console.log("Curr Date: " + currentDate);
    console.log("Time Diff.: " + (currentDate >= selectedDate));
    (currentDate >= selectedDate ? error.innerHTML = "Error: Invalid Date or Time" : error.innerHTML = "" );
}

console.log(document.getElementById("submit-btn"));
document.getElementById("submit-btn").addEventListener("click", submitEventDetails);