const invokeSecondaryModal = (requestId, fullname, type) => {
  console.log("Reached");
  console.log(document.querySelector(".modal-secondary-bg"));
  document.querySelector(
    ".flash-description"
  ).innerHTML = `Are you sure you want to accept ${fullname}'s support group
  request?`;
  document.querySelector(".modal-secondary-bg").style.visibility = "visible";
  document.querySelector(".flash-card").style.transform = "scale(1)";
  document.querySelector(".accept-button").addEventListener("click", () => {
    getRequestId(requestId, type);
    document.querySelector(".modal-secondary-bg").style.visibility = "hidden";
  });

  document.querySelector(".cancel-button").addEventListener("click", () => {
    document.querySelector(".modal-secondary-bg").style.visibility = "hidden";
  });
  // document
  //   .querySelector(".cancel-button")
  //   .addEventListener("click", getRequestId(requestId, type));
};

var cardcontainer = document.getElementById("card-container");
var memberlist = document.querySelector(".caller-list");

console.log(window.location.href.searchParams);
fetch(
  "http://localhost:80/api/v1/supportgroup/requests?" +
    new URLSearchParams({
      supportGroupId: /supId=([^&]+)/.exec(window.location.href)[1],
    })
)
  .then((response) => response.json())
  .then((data) => {
    console.log(data);
    for (let i = 0; i < data.length; i++)
      cardcontainer.innerHTML += `<div id="${data[i].id}" class="request-card"><div class="card-icon"><img class="picture" src="data:image/jpg;base64, ${data[i].profile_pic}" alt="" /></div><span class="card-text"><h4 class="request-name">${data[i].username}</h4></span><div data-requestid="${data[i].id}" class="button-set"><button class="approve-btn" onclick="invokeSecondaryModal(${data[i].id}, '${data[i].fname} ${data[i].lname}', 'approved')">Approve</button><button class="reject-btn" onclick="invokeSecondaryModal(${data[i].id}, '${data[i].fname} ${data[i].lname}', 'rejected')" >Remove</button></div></div>`;
  });

fetch(
  "http://localhost:80/api/v1/supportgroup/members?" +
    new URLSearchParams({ supportGroupId: 1 })
)
  .then((response) => response.json())
  .then((data) => {
    //console.log(data);
    data.forEach((element) => {
      console.log(element);
      memberlist.innerHTML += `<div id="${element.id}" class="caller-card">
      <div class="caller-image">
        <img
          class="caller-icon"
          src="data:image/jpg;base64, ${element.profile_pic}"
          alt=""
          srcset=""
        />
      </div>
      <div class="caller-info">
        <h4 class="caller-name">${element.username}</h4>
      </div>
      <div class="button-set">
        <button class="remove-btn" onclick="invokeRemoveCallerModal(${
          element.id
        }, '${element.fname} ${element.lname}')">Remove</button>
      </div>
    </div>`;
    });
    // for (let i = 0; i < data.length; i++)
    //   cardcontainer.innerHTML += `<div id="${data[i].id}" class="request-card"><div class="card-icon"><img class="picture" src="./img/propic.png" alt="" /></div><span class="card-text"><h4 class="request-name">${data[i].fname} ${data[i].lname}</h4></span><div data-requestid="${data[i].id}" class="button-set"><button class="approve-btn" onclick="invokeSecondaryModal(${data[i].id}, '${data[i].fname} ${data[i].lname}', 'approved')">Approve</button><button class="reject-btn" onclick="invokeSecondaryModal(${data[i].id}, '${data[i].fname} ${data[i].lname}', 'rejected')" >Remove</button></div></div>`;
  });

const getRequestId = (requestId, type) => {
  console.log(requestId);
  console.log(type);
  console.log(
    JSON.stringify({
      callerId: requestId,
      supportGroupId: 1,
      type: type,
    })
  );
  console.log(document.getElementById(requestId));
  //document.getElementById(requestId).remove();
  fetch("http://localhost:80/api/v1/supportgroup/requestDecision", {
    method: "post",
    headers: {
      "Access-Control-Allow-Origin": "*",
      Accept: "application/json, text/plain, */*",
      "Content-Type": "application/json",
    },
    body: JSON.stringify({
      callerId: requestId,
      supportGroupId: 1,
      type: type,
    }),
  })
    .then((res) => res.json())
    .then((res) => {
      // toast.classList.add("toast-visible");
      // popupInteval = setInterval(function () {
      //   toast.classList.remove("toast-visible");
      // }, 5000);
      console.log(res);
      if (res.result) document.getElementById(requestId).remove();
    });
};

const removeCaller = (callerId) => {
  console.log(callerId);
  console.log(
    JSON.stringify({
      callerId: callerId,
      supportGroupId: 1,
    })
  );
  fetch("http://localhost:80/api/v1/supportgroup/remove_member", {
    method: "post",
    headers: {
      "Access-Control-Allow-Origin": "*",
      Accept: "application/json, text/plain, */*",
      "Content-Type": "application/json",
    },
    body: JSON.stringify({
      callerId: callerId,
      supportGroupId: 1,
    }),
  })
    .then((res) => res.json())
    .then((res) => {
      console.log(res);
      if (res.result) document.getElementById(callerId).remove();
    });
};

const invokeRemoveCallerModal = (callerId, fullname) => {
  document.querySelector(
    ".flash-description"
  ).innerHTML = `Are you sure you want to remove ${fullname} from the support group.`;
  document.querySelector(".modal-secondary-bg").style.visibility = "visible";
  document.querySelector(".flash-card").style.transform = "scale(1)";
  document.querySelector(".accept-button").addEventListener("click", () => {
    removeCaller(callerId);
    document.querySelector(".modal-secondary-bg").style.visibility = "hidden";
  });

  document.querySelector(".cancel-button").addEventListener("click", () => {
    document.querySelector(".flash-card").style.transform = "scale(0)";
    document.querySelector(".modal-secondary-bg").style.visibility = "hidden";
  });
};
