const notificationButton = document.querySelector(".notifications");
const settingsButton = document.querySelector(".settings");

const notificationDropDown = document.querySelector(".notifications-list");
const settingsDropDown = document.querySelector(".settings-list");

notificationButton.addEventListener("click", () => {
  if (settingsDropDown.classList.contains("settings-list-visible"))
    settingsDropDown.classList.remove("settings-list-visible");

  if (notificationDropDown.classList.contains("notification-list-visible")) {
    notificationDropDown.classList.remove("notification-list-visible");
  } else notificationDropDown.classList.add("notification-list-visible");
});

settingsButton.addEventListener("click", () => {
  console.log(settingsDropDown.classList);
  if (notificationDropDown.classList.contains("notification-list-visible"))
    notificationDropDown.classList.remove("notification-list-visible");

  if (settingsDropDown.classList.contains("settings-list-visible")) {
    settingsDropDown.classList.remove("settings-list-visible");
  } else settingsDropDown.classList.add("settings-list-visible");
});
