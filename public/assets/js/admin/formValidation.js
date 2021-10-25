function validateCreateSG(){
    var participants=document.createSGForm.participants.value;
    var facilitator=document.createSGForm.facilitator.value;
    var co_facilitator=document.createSGForm.co_facilitator.value;
    var type=document.createSGForm.type.value;

    if (participants<=0 || isNaN(participants)) {
        alert("Please enter valid positive integer");
        return false;
    }
    else if(facilitator===co_facilitator){
        alert("Facilitator and co-facilitator must be different");
        return false;
    }
    else if(!/^[a-zA-Z]*$/g.test(type)){
        alert("Type must consist of only letters");
        return false;
    }
}

function validateUserCreate(){
    // var username=document.createUserForm.username.value;
    var password=document.createUserForm.password.value;
    var con_password=document.createUserForm.con-password.value;
    // var type=document.createUserForm.type.value;

    // if(password.length<6 || password!==con_password ){
    //     alert("Password Invalid");
    //     return false;
    // }
    // else if(){
    //     alert("Passwords do not match");
    //     return false;
    // }

    const userName = document.getElementById("username");
    const email = document.getElementById("email");

    const nameRegex = /^[aA-zZ][a-z]{1,}$/;
    const usernameRegex = /^[aA-zZ0-9]{6,30}$/;
    const passwordRegex =
        /^(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=.{7,})(?=.*[!@#$%^&*]).*$/;


    const usernameState = false;


    const validateInput = (inputField) => {
        if (inputField.classList.contains("danger"))
            inputField.classList.remove("danger");
        inputField.classList.add("success");
    };



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


    console.log(termsCheckBox);

    const registerForm = document.getElementById("createUserForm");

    registerForm.addEventListener("submit", (e) => {
        e.preventDefault;
        registerForm.submit();
    });

}

