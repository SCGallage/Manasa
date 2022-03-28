const shiftList = document.getElementById("shifts");
const checkBoxList = document.getElementById("checkbox-list")

const populateShiftTimes = (shift) => {
    let slotOption = document.createElement("option");
    slotOption.innerHTML = `${shift.startTime} - ${shift.endTime}`;
    slotOption.value = shift.shiftId;
    document.getElementById("shifts").appendChild(slotOption);
}

/*const populateShiftBefrienders = (befriender) => {
    let befLabel = document.createElement("label");
    let befCheckBox = document.createElement("input");
    befCheckBox.type = "checkbox";
    befCheckBox.classList.add("befriender_id");
    befLabel.innerHTML = `${befriender.fname} ${befriender.lname}`;
    befCheckBox.name = befriender.befrienderId;
    document.getElementById("checkbox-list").append(befCheckBox, befLabel);
}*/

const populateShiftBefrienders = (befriender) => {

    let rowDiv = document.createElement("div");
    rowDiv.classList.add("befriender-header");

    let befCheckBox = document.createElement("input");
    befCheckBox.type = "checkbox";
    befCheckBox.classList.add("befriender_id");
    befCheckBox.name = befriender.befrienderId;
    befCheckBox.classList.add("radio-btn");

    let befSpan = document.createElement("span");
    befSpan.innerHTML = `${befriender.fname} ${befriender.lname}`;
    befSpan.classList.add("shift-id");

    rowDiv.appendChild(befCheckBox);
    rowDiv.appendChild(befSpan);
    document.getElementById("checkbox-list").appendChild(rowDiv);
}

const getShiftInformation = async (scheduleDate) => {
  await fetch(`http://localhost:80/api/v1/schedule/getShiftFromDate?scheduleDate=${scheduleDate}`)
      .then(response => response.json())
      .then(
          data => {
              console.log(data);
              data.forEach((shift) => populateShiftTimes(shift));
          }
      );
}

const getShiftBefrienders = async (slotId) => {
    await fetch(`http://localhost:80/api/v1/schedule/getSlotReservations?slotId=${slotId}`)
        .then(response => response.json())
        .then(
            data => {
                console.log(data);
                document.getElementById("checkbox-list").innerHTML = "";
                data.forEach((befriender) => populateShiftBefrienders(befriender));
                console.log(document.querySelectorAll(".befriender_id"));
                let checkBoxes = document.querySelectorAll('.befriender_id');
                checkBoxes.forEach((checkBox) => {
                    console.log(checkBox.name);
                })
            }
        );
}

const getBefrienderToShift = (shiftId) => {

}

const getCheckedBefrienders = () => {
    let checkBoxes = document.querySelectorAll(".befriender_id");
    let befrienderIds = [];
    checkBoxes.forEach((checkBox) => {
        checkBox.checked ? befrienderIds.push(parseInt(checkBox.name)) : console.log("Not checked");
    });
    console.log(befrienderIds);
    return befrienderIds;
};

const storeCheckedShiftSession = () => {
    let checkBoxes = type === "available" ? document.getElementById("availableShiftList") : document.getElementById("reservedShiftList");


};

const createTransferRequestBody = () => {
  let transferRequest = {
      availableShift: sessionStorage.getItem("availableShift"),
      befrienderId: 41,
      reservedShift: sessionStorage.getItem("reservedShift"),
      trBefIds: getCheckedBefrienders()
  };

  return JSON.stringify(transferRequest);
}

const sendTransferRequest = async () => {
  await fetch('http://localhost:80/api/v1/schedule/createShiftTransfer', {
      method: 'POST',
      mode: "cors",
      cache: "no-cache",
      headers: {
          'Content-Type': 'application/json'
      },
      body: createTransferRequestBody()
  }).then(response => response.json()).then(data => {
      console.log(data);
      window.location.reload();
  });
}

const deleteShiftTransfer = async (transferId) => {
    await fetch("http://localhost:80/api/v1/schedule/deleteShiftTransfer",{
        method: 'POST',
        mode: "cors",
        cache: "no-cache",
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({
            trRequestId: transferId
        })
    });
};

const acceptShiftTransfer = async (transferId) => {
  await fetch();
}

/*document.getElementById('transfer-list').addEventListener('click', (e) => {
    if (e.target && e.target.nodeName === "BUTTON" && e.target.name === "decline") {
        deleteShiftTransfer(e.target.value);
        console.log(e.target.value);
    }
});*/



document.getElementById("submitBtn").addEventListener('click', sendTransferRequest);

const cancelTransfer = async (transferId) => {
    await fetch("http://localhost:80/api/v1/schedule/cancelTransferRequest",{
        method: 'POST',
        mode: "cors",
        cache: "no-cache",
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({
            id: parseInt(transferId)
        })
    }).then(response => response.json())
        .then(data => {
            if (data.result)
                window.location.reload();
        });
};

document.getElementById("transfers-list").addEventListener('click', (e) => {
    if (e.target && e.target.nodeName === "BUTTON" && e.target.name === "cancel") {
        cancelTransfer(e.target.value);
        console.log(e.target.value);
    }
});

/*let scheduleDate = document.getElementById("scheduleDate")

scheduleDate.addEventListener('change',() => getShiftInformation(scheduleDate.value));
shiftList.addEventListener("change", () => getShiftBefrienders(shiftList.options[shiftList.selectedIndex].value))*/

console.log("reached");

/* refactored parts */

const getClickedShiftId = (e, type) => {
    if (e.target && e.target.type === "radio" && type === "available") {
        console.log(e.target.value);
        getShiftBefrienders(e.target.value);
        sessionStorage.setItem("availableShift", e.target.value);
    }
    else if (e.target && e.target.type === "radio" && type === "reserved") {
        console.log(e.target.value);
        sessionStorage.setItem("reservedShift", e.target.value);
    }
}

const decisionOnTransfer = async (decisionType, selectedTransferId) => {
  await fetch('http://localhost:80/api/v1/schedule/makeDecisionOnTransfer', {
      method: 'POST',
      mode: "cors",
      cache: "no-cache",
      headers: {
          'Content-Type': 'application/json'
      },
      body: JSON.stringify({
          transferId: selectedTransferId,
          type: decisionType
      })
  });
}

document.getElementById('availableShiftList').addEventListener('click', (e) => getClickedShiftId(e, "available"));
document.getElementById('reservedShiftList').addEventListener('click', (e) => getClickedShiftId(e, "reserved"));
document.getElementById('submitBtn').addEventListener('click', sendTransferRequest);
//document.getElementById('accept').addEventListener('click', (e) => console.log(e.target.value));
document.getElementById('requested-transfer-list').addEventListener('click', (e) => {
    if (e.target && e.target.nodeName === "BUTTON" && e.target.name === "accept") {
        console.log(e.target.value);
        decisionOnTransfer(1, e.target.value);
    } else if (e.target && e.target.nodeName === "BUTTON" && e.target.name === "decline") {
        console.log("decline clicked");
    }
});

/* Request Button Validation */
const requestBtn = document.getElementById("submitBtn");
requestBtn.disabled = true;
let requestedSlotPicked = false;
let reservedSlotPicked = false;
let befriendersPicked = false;

const validateRequestingShift = () => {
    let requestedSlots = document.querySelectorAll(".request-selection");
    requestedSlots.forEach((radioBtn) => {
        if (radioBtn.checked) {
            requestedSlotPicked = true;
            return;
        }
        requestedSlotPicked = false;
    });
}

const validateReservedSlots = () => {
    let reservedSlots = document.querySelectorAll(".reserved-selection");
    reservedSlots.forEach((radioBtn) => {
        if (radioBtn.checked) {
            reservedSlotPicked = true;
            return;
        }
        reservedSlotPicked = false;
    });
}

const validateBefrienderSelection = () => {
    let checkBoxes = document.querySelectorAll(".befriender_id");

    checkBoxes.forEach((checkBox) => {
        if (checkBox.checked) {
            befriendersPicked = true;
            return;
        }
        befriendersPicked = true;
    });
}

const validateAllFields = () => {
    return requestedSlotPicked && reservedSlotPicked && befriendersPicked;
}

const changeButtonState = () => {
  if (validateAllFields()) {
      console.log(validateAllFields())
      requestBtn.disabled = false;
      return;
  }
  console.log(validateAllFields())
  requestBtn.disabled = true;
}

console.log(document.querySelectorAll(".shift-transfer-validate"));
document.querySelectorAll(".shift-transfer-validate").forEach(selection => {
    selection.addEventListener("click", (e) => {
            validateBefrienderSelection();
            validateRequestingShift();
            validateReservedSlots();
            changeButtonState();
    })
})
