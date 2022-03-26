const eventList = document.getElementById('card-list');
let eventArray = {};
fetch("http://localhost:80/api/v1/supportgroup/upcomingEvents").
then(response => response.json()).
then(data => {
    data.forEach(event => {
        eventArray[event.id] = event;
        eventList.innerHTML += `<div class="event-card-container">
        <div class="card-left">
            <div class="event-date">
                <h5 class="card-date-year">
                    2022
                </h5>
                <h5 class="card-date-month">
                    January
                </h5>
                <h5 class="card-date-day">
                    06
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
                <button class="event-delete-btn event-card-common-btn">DELETE</button>
            </div>
        </div>
        <div class="event-type-container">
            <h5 class="event-type">
                ${event.type}
            </h5>
        </div>
    </div>`;
    });
    console.log(data);

})