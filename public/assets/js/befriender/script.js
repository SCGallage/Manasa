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
