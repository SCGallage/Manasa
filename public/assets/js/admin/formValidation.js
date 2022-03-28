function validateCreateSG(){
    var participants=document.createSGForm.participants.value;
    var facilitator=document.createSGForm.facilitator.value;
    var co_facilitator=document.createSGForm.co_facilitator.value;
    var type=document.createSGForm.type.value;

    if (participants<=0 || isNaN(participants)) {
        alert("Please enter valid participant count");
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

function createVolEventForm(){
    var dateOfEvent=document.createEventForm.startDate.value;
    var startTime=document.createEventForm.startTime.value;
    var endTime=document.createEventForm.endTime.value;
    var capacity=document.createEventForm.capacity.value;

    dateOfEvent = new Date(dateOfEvent);
    var today = new Date();

    const startDuration = startTime.split(':');
    const endDuration = endTime.split(':');

    var hours = ((endDuration[0]-startDuration[0])*60);
    var minutes = (endDuration[0]-startDuration[0]);
    var duration = hours+minutes;

    // var todayDate = today.setHours(0,0,0,0);
    if (dateOfEvent<today) {
        alert("Please enter valid future date");
        return false;
    }
    else if(endTime===startTime || endTime<startTime){
        alert("Please enter valid time period");

        return false;
    }
    else if(duration < 60){
        alert("Events must be minimum one hour");

        return false;
    }else if (!/^[0-9]+$/.test(capacity)){
        alert("Please enter valid number for capacity");
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

function reportGenValidation(){
    var startDate = document.reportGenForm.StartDate.value;
    var endDate = document.reportGenForm.EndDate.value;

    var CurrentDate = new Date();
    startDate = new Date(startDate);
    endDate = new Date(endDate);

    if (startDate>endDate){
        alert("Please enter valid duration");
        return false;
    }else if(startDate>CurrentDate){
        alert("Reports can only be created for past time period");
        return false;
    }else if(endDate>CurrentDate){
        alert("Reports can only be created for past time period");
        return false;
    }else if(startDate===endDate){
        alert("Same day reports cannot be created");
        return false;
    }
}

function validatePhone(){
    var number = document.phoneReg.contact_number.value;

    if (number.length<10 || number.length>10 ){
        alert("Invalid phone number");
        return false;
    }
    else if (!/^[0-9]+$/.test(number)){
        alert("Invalid phone number");
        return false;
    }
}

function validateConfig(){
    var value = document.limitations.val.value;

    if (!/^[0-9]+$/.test(value)){
        alert("Invalid phone number");
        return false;
    }
}
