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