document.getElementById("reserve-btn").addEventListener("click", (e) => {
    console.log("hello");
    document.querySelector(".modal-bg").classList.add("display");
    //document.querySelector(".card").classList.add("display");
    //document.querySelector(".card-container").style.bottom = 0;
});

document.getElementById("schedule-close-btn-01").addEventListener("click", (e) => {
    console.log("hello");
    document.querySelector(".modal-bg").classList.remove("display");
    //document.querySelector(".card").classList.add("display");
    //document.querySelector(".card-container").style.bottom = 0;
});