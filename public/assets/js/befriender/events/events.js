const eventList = document.getElementById('card-list');
const months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
let eventArray = {};
fetch("http://localhost:80/api/v1/supportgroup/upcomingEvents").
then(response => response.json()).
then(data => {
    console.log(data);
    data.forEach(event => {
        let dateArray = event.eventDate.split("-");
        eventArray[event.id] = event;
        eventList.innerHTML += `<div class="event-card-container">
        <div class="card-left">
            <div class="event-date">
                <h5 class="card-date-year">
                    ${dateArray[0]}
                </h5>
                <h5 class="card-date-month">
                    ${months[parseInt(dateArray[1])]}
                </h5>
                <h5 class="card-date-day">
                    ${dateArray[2]}
                </h5>
            </div>
        </div>
        <div class="card-right">
            <h5 class="event-title">
                ${event.topic}
            </h5>
            <h5 class="event-time">${event.startTime} - ${event.endTime}</h5>
            <div class="event-card-btn-set">
                <button onclick="displayPopup(${event.id})" class="event-view-btn event-card-common-btn">VIEW</button>
                <button onclick="deleteEvent(${event.id}})" class="event-delete-btn event-card-common-btn">DELETE</button>
            </div>
        </div>
        <div class="event-type-container">
            <h5 class="event-type">
                ${event.type}
            </h5>
        </div>
    </div>`;
    });
})