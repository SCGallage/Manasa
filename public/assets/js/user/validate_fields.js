const userName = document.getElementById("username");
const email = document.getElementById("email");
const fname = document.getElementById("fname");
const lname = document.getElementById("lname");
const password = document.getElementById("password");
const conPassword = document.getElementById("conpassword");
const dateOfBirth = document.getElementById("dateOfBirth");
const termsCheckBox = document.getElementById("terms-box");

const userText = document.getElementById("user-text");
const emailText = document.getElementById("email-text");
const fnameText = document.getElementById("fname-text");
const lnameText = document.getElementById("lname-text");
const passwordText = document.getElementById("password-text");
const conpasswordText = document.getElementById("conpassword-text");

const nameRegex = /^[aA-zZ][a-z]{1,}$/;
const usernameRegex = /^[aA-zZ0-9]{6,30}$/;
const passwordRegex =
  /^(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=.{7,})(?=.*[!@#$%^&*]).*$/;

let usernameState = false;
let emailState = false;
let fnameState = false;
let lnameState = false;
let passwordState = false;
let conpasswordState = false;

const validateInput = (inputField) => {
  if (inputField.classList.contains("danger"))
    inputField.classList.remove("danger");
  inputField.classList.add("success");
};

password.addEventListener("keyup", () => {
  if (passwordRegex.test(password.value)) {
    //console.log("valid");
    validateInput(password);
    passwordText.innerText = "Success!";
    passwordText.style.color = "rgba(8, 140, 21, 0.88)";
    passwordState = true;
  } else {
    if (password.classList.contains("success"))
      password.classList.remove("success");
    password.classList.add("danger");
    passwordText.innerText = "Invalid Password Pattern!";
    passwordText.style.color = "rgba(173, 5, 5)";
    passwordState = true;
  }
});

conPassword.addEventListener("keyup", () => {
  //console.log(conPassword.value);
  //console.log(password.value === conPassword.value);
  if (password.value === conPassword.value) {
    validateInput(conPassword);
    conpasswordText.innerText = "Success!";
    conpasswordText.style.color = "rgba(8, 140, 21, 0.88)";
    conpasswordState = true;
  } else {
    if (conPassword.classList.contains("success"))
      conPassword.classList.remove("success");
    conPassword.classList.add("danger");
    conpasswordText.innerText = "Password does not match!";
    conpasswordText.style.color = "rgba(173, 5, 5)";
    conpasswordState = false;
  }
});

fname.addEventListener("keyup", () => {
  //console.log(nameRegex.test(fname.value));
  if (nameRegex.test(fname.value)) {
    validateInput(fname);
    fnameText.innerText = "Success!";
    fnameText.style.color = "rgba(8, 140, 21, 0.88)";
    fnameState = true;
  } else {
    if (fname.classList.contains("success")) fname.classList.remove("success");
    fname.classList.add("danger");
    fnameText.innerText = "Only letters are allowed!";
    fnameText.style.color = "rgba(173, 5, 5)";
    fnameState = false;
  }
});

lname.addEventListener("keyup", () => {
  //console.log(nameRegex.test(lname.value));
  if (nameRegex.test(lname.value)) {
    validateInput(lname);
    lnameText.innerText = "Success!";
    lnameText.style.color = "rgba(8, 140, 21, 0.88)";
    lnameState = true;
  } else {
    if (lname.classList.contains("success")) lname.classList.remove("success");
    lname.classList.add("danger");
    lnameText.innerText = "Only letters are allowed!";
    lnameText.style.color = "rgba(173, 5, 5)";
    lnameState = false;
  }
});

userName.addEventListener("keyup", () => {
  //console.log(usernameRegex.test(userName.value));
  if (usernameRegex.test(userName.value)) {
    fetch("http://localhost:80/api/v1/auth/validate", {
      method: "POST",
      headers: {
        Accept: "application/json",
        "Content-Type": "application/json",
      },
      body: JSON.stringify({
        value: userName.value,
        type: "username",
      }),
    })
      .then((reponse) => reponse.json())
      .then((data) => {
        //console.log(data.valid);
        if (data.valid) {
          validateInput(userName);
          userText.innerText = "Success!";
          userText.style.color = "rgba(8, 140, 21, 0.88)";
          usernameState = true;
        } else {
          if (userName.classList.contains("success"))
            userName.classList.remove("success");
          userName.classList.add("danger");
          userText.innerText = "Username already taken!";
          userText.style.color = "rgba(173, 5, 5)";
          usernameState = false;
        }
      });
    //console.log("valid");
    validateInput(userName);
  } else {
    if (userName.classList.contains("success"))
      userName.classList.remove("success");
    userName.classList.add("danger");
    userText.innerText = "Invalid username pattern!";
    userText.style.color = "rgba(173, 5, 5)";
    usernameState = false;
  }
});

email.addEventListener("keyup", () => {
  fetch("http://localhost:80/api/v1/auth/validate", {
    method: "POST",
    headers: {
      Accept: "application/json",
      "Content-Type": "application/json",
    },
    body: JSON.stringify({
      value: email.value,
      type: "email",
    }),
  })
    .then((reponse) => reponse.json())
    .then((data) => {
      //console.log(data.valid);
      if (data.valid) {
        validateInput(email);
        emailState = true;
      } else {
        if (email.classList.contains("success"))
          email.classList.remove("success");
        email.classList.add("danger");
        emailState = false;
      }
    });
});

dateOfBirth.addEventListener("change", () => {
  //console.log(dateOfBirth.value);
  //console.log(dateOfBirth.value);
  if (new Date(dateOfBirth.value).getTime() < new Date().getTime()) {
    validateInput(dateOfBirth);
  } else dateOfBirth.classList.add("danger");
});

//console.log(termsCheckBox);

const registerForm = document.getElementById("registerForm");

registerForm.addEventListener("submit", (e) => {
  e.preventDefault();

  console.log(emailState);
  console.log(username);

  if (
    emailState &&
    usernameState &&
    fname &&
    lname &&
    passwordState &&
    conpasswordState
  )
    console.log(true);
  //registerForm.submit();
});

//console.log(registerForm);
