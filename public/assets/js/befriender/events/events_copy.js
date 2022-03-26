const eventList = document.getElementById('card-list');
let eventArray = {};
fetch("http://localhost:80/api/v1/supportgroup/upcomingEvents").
then(response => response.json()).
then(data => {
    data.forEach(event => {
        eventArray[event.id] = event;
        eventList.innerHTML += `<div class="event-card">
                        <div class="card-content">
                            <div>
                            <h4 class="event-title">${event.topic}</h4>
                            <div class="event-details">
                                <svg
                                        width="15"
                                        height="15"
                                        viewBox="0 0 15 15"
                                        fill="none"
                                        xmlns="http://www.w3.org/2000/svg"
                                >
                                    <g clip-path="url(#clip0_152:13444)">
                                        <path
                                                d="M13.125 6.25C13.125 10.625 7.5 14.375 7.5 14.375C7.5 14.375 1.875 10.625 1.875 6.25C1.875 4.75816 2.46763 3.32742 3.52252 2.27252C4.57742 1.21763 6.00816 0.625 7.5 0.625C8.99184 0.625 10.4226 1.21763 11.4775 2.27252C12.5324 3.32742 13.125 4.75816 13.125 6.25Z"
                                                stroke="black"
                                                stroke-width="1"
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                        />
                                        <path
                                                d="M7.5 8.125C8.53553 8.125 9.375 7.28553 9.375 6.25C9.375 5.21447 8.53553 4.375 7.5 4.375C6.46447 4.375 5.625 5.21447 5.625 6.25C5.625 7.28553 6.46447 8.125 7.5 8.125Z"
                                                stroke="black"
                                                stroke-width="1"
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                        />
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_152:13444">
                                            <rect width="15" height="15" fill="white" />
                                        </clipPath>
                                    </defs>
                                </svg>
                                <h5 class="details-text">${event.type}</h5>
                                <svg
                                        class="svg-image"
                                        width="15"
                                        height="15"
                                        viewBox="0 0 15 15"
                                        fill="none"
                                        xmlns="http://www.w3.org/2000/svg"
                                >
                                    <path
                                            d="M7.5 13.75C10.9518 13.75 13.75 10.9518 13.75 7.5C13.75 4.04822 10.9518 1.25 7.5 1.25C4.04822 1.25 1.25 4.04822 1.25 7.5C1.25 10.9518 4.04822 13.75 7.5 13.75Z"
                                            stroke="black"
                                            stroke-width="2"
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                    />
                                    <path
                                            d="M7.5 3.75V7.5L10 8.75"
                                            stroke="black"
                                            stroke-width="2"
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                    />
                                </svg>
                                <h5 class="details-text">${event.eventDate}</h5>
                                <svg
                                        class="svg-image"
                                        width="15"
                                        height="15"
                                        viewBox="0 0 15 15"
                                        fill="none"
                                        xmlns="http://www.w3.org/2000/svg"
                                >
                                    <path
                                            d="M11.875 2.5H3.125C2.43464 2.5 1.875 3.05964 1.875 3.75V12.5C1.875 13.1904 2.43464 13.75 3.125 13.75H11.875C12.5654 13.75 13.125 13.1904 13.125 12.5V3.75C13.125 3.05964 12.5654 2.5 11.875 2.5Z"
                                            stroke="black"
                                            stroke-width="2"
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                    />
                                    <path
                                            d="M10 1.25V3.75"
                                            stroke="black"
                                            stroke-width="2"
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                    />
                                    <path
                                            d="M5 1.25V3.75"
                                            stroke="black"
                                            stroke-width="2"
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                    />
                                    <path
                                            d="M1.875 6.25H13.125"
                                            stroke="black"
                                            stroke-width="2"
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                    />
                                </svg>
                                <h5 class="details-text">${event.startTime} - ${event.endTime}</h5>
                            </div>
                            </div>
                            <div class="event-btn-set">
                                <button id="view-btn" onclick="displayPopup(${event.id})" class="event-btn view-event">View</button>
                                <button class="event-btn remove-event">Remove</button>
                            </div>
                        </div>
                    </div>`;
    });
    console.log(data);

})