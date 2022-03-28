const dateList = document.getElementById("date-list");
const weekdays = [
    "SUNDAY",
    "MONDAY",
    "TUESDAY",
    "WEDNESDAY",
    "THURSDAY",
    "FRIDAY",
    "SATURDAY",
];

const dateWeekOne = document.getElementById("date-week-one");
const dateWeekTwo = document.getElementById("date-week-two");
const slotRowOne = document.getElementById("slot-row-one");
const slotRowTwo = document.getElementById("slot-row-two");

const populateSchedule = (slotOne, slotTwo) => {
    let weekOne = `<div class="grid-item-time" id="slot-row-one">
        <span class="time-start">8.00</span>
        <span class="time-end">12.00</span>
        </div>`;

    let weekTwo = `<div class="grid-item-time" id="slot-row-one">
        <span class="time-start">8.00</span>
        <span class="time-end">12.00</span>
        </div>`;

    let closedSlots = [];
    for (let slotIndex = 0; slotIndex < slotOne.length; slotIndex++) {
        if (slotIndex < 7) {
            dateWeekOne.innerHTML += `<div class="grid-item-day">
          <span class="day">${
                weekdays[new Date(slotOne[slotIndex].date).getDay()]
            }</span>
          <span class="date">${slotOne[slotIndex].date}</span>
          </div>`;
            dateWeekTwo.innerHTML += `<div class="grid-item-day">
          <span class="day">${
                weekdays[new Date(slotTwo[slotIndex].date).getDay()]
            }</span>
          <span class="date">${slotTwo[slotIndex].date}</span>
          </div>`;
        }
        console.log(slotOne[slotIndex].state);
        // console.log(slotTwo[slotIndex].reserved_count);

        weekOne +=
            `<div class="grid-item-slot" id="${slotOne[slotIndex].shiftId}">
        <span class="slot-id">Slot #00${slotOne[slotIndex].shiftId}</span>
        <span class="slot-remain">`+ (slotOne[slotIndex].state === 0 ? `Remaining: ${
                5 - slotOne[slotIndex].reserved_count
            }` : '') +`</span>
        <div class="lables">` +
            (slotOne[slotIndex].reserved_count < 5 && slotOne[slotIndex].state === 0
                ? '<span class="label-available">AVAILABLE</span>'
                : '<span class="label-closed">CLOSED</span>') +
            `</div>`+(slotOne[slotIndex].state === 0 ? `<button class="view-btn" onclick="slotDecision(${slotOne[slotIndex].shiftId})">VIEW</button>`: '') +
            `</div>`;

        weekTwo +=
            `<div class="grid-item-slot" id="${slotTwo[slotIndex].shiftId}">
        <span class="slot-id">Slot #00${slotTwo[slotIndex].shiftId}</span>
        <span class="slot-remain">` + (slotTwo[slotIndex].state === 0 ? `Remaining: ${
                5 - slotTwo[slotIndex].reserved_count
            }`:'') + `</span>
        <div class="lables">` +
            (slotTwo[slotIndex].reserved_count < 5 || slotTwo[slotIndex].state === 0
                ? '<span class="label-available">AVAILABLE</span>'
                : '<span class="label-closed">CLOSED</span>') +
            `</div>`+
        (slotTwo[slotIndex].state === 0 ? `<button class="view-btn" onclick="slotDecision(${slotTwo[slotIndex].shiftId})">VIEW</button>`: '')
      +`</div>`;

        if (slotIndex == 6) {
            weekOne += `<div class="grid-item-time" id="slot-row-one">
        <span class="time-start">13.00</span>
        <span class="time-end">17.00</span>
      </div>`;
            weekTwo += `<div class="grid-item-time" id="slot-row-one">
        <span class="time-start">13.00</span>
        <span class="time-end">17.00</span>
      </div>`;
        }
        if (slotOne[slotIndex].reserved_count === 3)
            closedSlots.push(slotOne[slotIndex].shiftId);

        if (slotTwo[slotIndex].reserved_count === 3)
            closedSlots.push(slotOne[slotIndex].shiftId);
    }

    if (closedSlots.length !== 0)
        sessionStorage.setItem("closedSlots", JSON.stringify(closedSlots));

    slotRowOne.innerHTML = weekOne;
    slotRowTwo.innerHTML = weekTwo;
};

getAllTimeSlots = async () => {
    response = await fetch("http://localhost:80/api/v1/schedule/scheduleDetails");

    firstSlots = await response.json();
    secondSlots = [];
    //secondSlots = firstSlots.splice(14, 28);

    firstSlots.forEach((slot, index) => {
        if ((index >= 7 && index < 14) || (index >= 21 && index < 28)) {
            secondSlots.push(slot);
        }
    });
    firstSlots.splice(7, 7);
    firstSlots.splice(14, 7);

    populateSchedule(firstSlots, secondSlots);
};

const saveToStorage = (shiftId) => {
    sessionStorage.setItem("shiftID", shiftId);
    console.log(sessionStorage.getItem("shiftID"));
};

const slotDecision = (shiftId) => {
    sessionStorage.setItem("shiftID", shiftId);
    // console.log(sessionStorage.getItem("shiftID"));
    // console.log("Shift:", shiftId);
    let cardBtn = document.getElementById("pop-up-btn");

    if (sessionStorage.getItem("closedSlots") != null) {
        JSON.parse(sessionStorage.getItem("closedSlots")).forEach((slot) => {
            console.log("Slot ID: ", slot);
            if (slot === shiftId) cardBtn.innerHTML = "";
            return;
        });
    }

    if (JSON.parse(sessionStorage.getItem("reservedSlots")).length >= 4) {
        cardBtn.innerHTML = "";
    }

    console.log(JSON.parse(sessionStorage.getItem("reservedSlots")).length);
    JSON.parse(sessionStorage.getItem("reservedSlots")).forEach((slot) => {
        // slot.shiftId === shiftId
        //   ? cardBtn.innerHTML = "REMOVE RESERVATION"
        //   : console.log("Not Found");
        //console.log("Slot:", slot);
        if (slot.shiftId === shiftId) {
            cardBtn.innerHTML = "REMOVE RESERVATION";
            return false;
        } else if (JSON.parse(sessionStorage.getItem("reservedSlots")).length
            <= parseInt(sessionStorage.getItem("max_reservations"))) {
            cardBtn.innerHTML = "";
            return false;
        }
    });
    popolateBefrienders(shiftId);
    document.querySelector(".modal-bg").classList.add("display");
};

const getTimeSlotsReserved = async (befrienderId) => {
    let response = await fetch(
        `http://localhost:80/api/v1/schedule/getReservedSlotsBefriender?befId=${befrienderId}`
    );

    let reservedSlots = await response.json();

    if (reservedSlots != null)
    {
        console.log(reservedSlots);
        reservedSlots.forEach((shift) => {
            document.getElementById(
                shift.shiftId
            ).children[2].innerHTML += `<span class="label-reserved">RESERVED</span>`;
        });

        sessionStorage.setItem("reservedSlots", JSON.stringify(reservedSlots));
    }
};

const reserveTimeSlot = async () => {
    //console.log(sessionStorage.getItem("shiftID"));
    let type = "add";
    JSON.parse(sessionStorage.getItem("reservedSlots")).forEach((slot) => {
        slot.shiftId == sessionStorage.getItem("shiftID") ? (type = "remove") : "";
    });
    console.log("type", type);
    let response = await fetch(
        "http://localhost:80/api/v1/schedule/reserveTimeSlot",
        {
            method: "post",
            headers: {
                "Access-Control-Allow-Origin": "*",
                Accept: "application/json, text/plain, */*",
                "Content-Type": "application/json",
            },
            body: JSON.stringify({
                befrienderId: 41,
                shiftId: sessionStorage.getItem("shiftID"),
                reserveType: type,
            }),
        }
    );

    data = await response.json();

    if (data.result === 1)
        window.location.reload();

    /*dateWeekOne.innerHTML = "<div></div>";
    dateWeekTwo.innerHTML = "<div></div>";

    getAllTimeSlots();
    getTimeSlotsReserved(41);

    console.log(data);*/
};

const popolateBefrienders = async (slotId) => {
    let response = await fetch(
        `http://localhost:80/api/v1/schedule/getSlotReservations?slotId=${slotId}`
    );

    data = await response.json();

    let cardBody = document.querySelector(".card-body");

    data.forEach((befriender) => {
        cardBody.innerHTML += `<div class="single-card">
      <div class="icon">
        <img class="card-icon" src="./15-M.jpg" alt="" srcset="" />
      </div>
      <h4 class="card-name">${befriender.fname} ${befriender.lname}</h4>
    </div>`;
    });
    console.log(cardBody);
};

getAllTimeSlots();
getTimeSlotsReserved(41);
