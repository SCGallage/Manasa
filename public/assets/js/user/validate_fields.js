const userName = document.getElementById("username");
const email = document.getElementById("email");
const fname = document.getElementById("fname");
const lname = document.getElementById("lname");
const password = document.getElementById("password");
const conPassword = document.getElementById("conpassword");
const dateOfBirth = document.getElementById("dob");
const termsCheckBox = document.getElementById("terms-box");

const nameRegex = /^[aA-zZ][a-z]{1,}$/;
const usernameRegex = /^[aA-zZ0-9]{6,30}$/;
const passwordRegex =
  /^(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=.{7,})(?=.*[!@#$%^&*]).*$/;


const usernameState = false;
const emailState = false;
const fnameState = false;
const lnameState = false;
const passwordState = false;
const conpasswordState = false;


const validateInput = (inputField) => {
  if (inputField.classList.contains("danger"))
    inputField.classList.remove("danger");
  inputField.classList.add("success");
};

password.addEventListener("keyup", () => {
  //   console.log(passwordRegex.test(password.value));
  //   console.log("valid check");
  //    console.log(password.value);
  if (passwordRegex.test(password.value)) {
    console.log("valid");
    validateInput(password);
  } else {
    if (password.classList.contains("success"))
      password.classList.remove("success");
    password.classList.add("danger");
  }
});

conPassword.addEventListener("keyup", () => {
  console.log(conPassword.value);
  console.log(password.value === conPassword.value);
  if (password.value === conPassword.value) {
    validateInput(conPassword);
  } else {
    if (conPassword.classList.contains("success"))
      conPassword.classList.remove("success");
    conPassword.classList.add("danger");
  }
});

fname.addEventListener("keyup", () => {
  //console.log(fname.value.match(nameRegex));
  console.log(nameRegex.test(fname.value));
  if (nameRegex.test(fname.value)) validateInput(fname);
  else {
    if (fname.classList.contains("success")) fname.classList.remove("success");
    fname.classList.add("danger");
  }
  // if(nameRegex.test(fname.value)){
  //     console.log('valid');
  //     validateInput(fname);
  // }
  // else
  //     fname.classList.add('danger');
});

lname.addEventListener("keyup", () => {
  console.log(nameRegex.test(lname.value));
  if (nameRegex.test(lname.value)) validateInput(lname);
  else {
    if (lname.classList.contains("success")) lname.classList.remove("success");
    lname.classList.add("danger");
  }
});

userName.addEventListener("keyup", () => {
  console.log(usernameRegex.test(userName.value));
  if (usernameRegex.test(userName.value)) {
    fetch("http://localhost:80/api/v1/auth/validate", {
      method: "POST",
      headers: {
        "Accept": "application/json",
        "Content-Type": "application/json",
      },
      body: JSON.stringify({
        value: userName.value,
        type: "username",
      }),
    }).then(reponse => reponse.json()).then(data => {
        console.log(data.valid);
        if (data.valid)
            validateInput(userName);
        else {
            if (userName.classList.contains("success"))
                userName.classList.remove("success");
            userName.classList.add("danger");
        }
    });
    console.log("valid");
    validateInput(userName);
  } else {
    if (userName.classList.contains("success"))
      userName.classList.remove("success");
    userName.classList.add("danger");
  }
});

email.addEventListener('keyup', () => {
    fetch("http://localhost:80/api/v1/auth/validate", {
      method: "POST",
      headers: {
        "Accept": "application/json",
        "Content-Type": "application/json",
      },
      body: JSON.stringify({
        value: email.value,
        type: "email",
      }),
    }).then(reponse => reponse.json()).then(data => {
        console.log(data.valid);
        if (data.valid)
            validateInput(email);
        else {
            if (email.classList.contains("success"))
                email.classList.remove("success");
            email.classList.add("danger");
        }
    });
});

dob.addEventListener("change", () => {
  //const today = new Date().getTime();
  console.log(dateOfBirth.value);
  // console.log(new Date().getTime());
  // console.log(new Date(dateOfBirth.value).getTime());
  console.log(dateOfBirth.value);
  if (new Date(dateOfBirth.value).getTime() < new Date().getTime()) {
    validateInput(dateOfBirth);
  } else dateOfBirth.classList.add("danger");
});

console.log(termsCheckBox);

const registerForm = document.getElementById("registerForm");

registerForm.addEventListener("submit", (e) => {
  e.preventDefault;
  registerForm.submit();
});
