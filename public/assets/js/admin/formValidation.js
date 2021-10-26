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
    var password=document.createUserForm.password.value;
    var con_password=document.createUserForm.con_password.value;
    var fname =document.createUserForm.fname.value;
    var lname =document.createUserForm.lname.value;
    var GivenDate = document.createUserForm.dob.value;
    var CurrentDate = new Date();
    GivenDate = new Date(GivenDate);


    if(password.length<6 || password!==con_password ){
        alert("Password Invalid");
        return false;
    }
    else if(!/^[a-zA-Z]*$/g.test(fname)){
        alert("First name must consist of only letters");
        return false;
    }
    else if(!/^[a-zA-Z]*$/g.test(lname)){
        alert("Last name must consist of only letters");
        return false;
    }
    else if(GivenDate > CurrentDate){
        alert("Incorrect Date of birth");
        return false;
    }
}

