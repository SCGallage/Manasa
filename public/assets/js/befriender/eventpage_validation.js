let currentDate = new Date();
console.log(currentDate.getHours());

const jsonData = JSON.stringify({
  startTime: "16:00",
  endTime: "18:00",
});

console.log(JSON.parse(jsonData));

let validateEventDateAndTime = () => {
  let date = document.getElementById("event-date");
  let startTime = document.getElementById("event-start-time");
  let endTime = document.getElementById("event-end-time");
  console.log(date.value);
  //console.log(time.value);
  const dateArray = date.value.split("-");
  console.log(dateArray);
  const newDate = new Date(
    parseInt(dateArray[0]),
    parseInt(dateArray[1]) - 1,
    parseInt(dateArray[2])
  );
  console.log("Date: ", newDate.getDate());
  console.log("Starting Hour: ", parseInt(startTime.value.split(":")[0]));
  console.log(
    "Ending Hour: ",
    parseInt("End Hours: ", parseInt(endTime.value.split(":")[0]))
  );

  if (
    parseInt(startTime.value.split(":")[0]) >
    parseInt(endTime.value.split(":")[0])
  )
    console.log("Wrong Time!");
  else if (
    parseInt(startTime.value.split(":")[0]) ===
    parseInt(endTime.value.split(":")[0])
  ) {
    console.log("Same time is wrong!");
  }
};

// document
//   .getElementById("event-date")
//   .addEventListener("click", validateEventDateAndTime);
