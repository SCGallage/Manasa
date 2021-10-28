//---------------changeClassById function-----------------------------------------------------------------
/*
    function name: changeClassListById
    parameters:
        1. elementId: id of the element that the function going to change the classlist
        2. change class: name of the class that going to append with the classlist
    
    Note* : you can append only one class at a time
*/

function changeClassListById(elementId, changeClass) {
    
    var selectedElement = document.getElementById(elementId);
   
    // check class
    if(!selectedElement.classList.contains(changeClass)) {
        selectedElement.classList.add(changeClass);
    } else {
        //remove appended class
        selectedElement.classList.remove(changeClass);
    }
    
}
//----------------------/changeClass function----------------------------------------------------------


//---------------changeClassByClass function-----------------------------------------------------------------
/*
    function name: changeClassListByClass
    parameters:
        1. className: class of the elements that the function going to change the classlist
        2. change class: name of the class that going to append with the classlist

    Note* : you can append only one class at a time
*/

function changeClassListByClass(className, changeClass) {

    var selectedElements = document.getElementsByClassName(className);
    //loop
    for(let i = 0; i < selectedElements.length; i++) {
        // check class
        if(!selectedElements[i].classList.contains(changeClass)) {
            selectedElements[i].classList.add(changeClass);
        } else {
            //remove appended class
            selectedElements[i].classList.remove(changeClass);
        }
    }


}



/*
    function name: changeClassListByID
    parameters:
        1. id: id of the element that the function going to change the classlist
        2. change class: name of the class that going to append with the classlist

    Note* : you can append only one class at a time
*/

function changeClassListByID(id, changeClass) {

    let selectedElement = document.getElementById(id);

    if (selectedElement.classList.contains(changeClass)) {
        selectedElement.classList.remove(changeClass);
    } else {
        selectedElement.classList.add(changeClass);
    }

}
//----------------------/changeClass function----------------------------------------------------------





//-----------------------Caller, Volunteer profile form validation function----------------------------

/*

    * Function: validateProfileForm
    * This function is used to validate profile form in caller, volunteer functions

*/
function validateProfileForm(){
    var validationState = true;
    //var age = document.getElementById('age');
    var phone = document.getElementById('phone');
    var phoneno = /^\d{10}$/;

    /*
    if(age.value < 10 || age.value > 100) {
        validationState = false;
        age.style.color = "red";
    }
     */

    if (!phone.value.match(phoneno)) {
        validationState = false;
        phone.style.color = "red";
    }


}

/*

    * Function: isPositive
    * This function is used to check weather the entered number is positive.

*/
function isPositive(id, message) {
    let number = document.getElementById(id).value;
    let msg = document.getElementById(message);
    if (number > 0) {
        msg.style.display = "none";
    } else {
        msg.style.display = "block";
    }
}
//----------------------/Caller, Volunteer profile form validation function----------------------------




//-----------------------Clear form function-----------------------------------------------------------
/*

    * Function: clearForm
    * This function is used to clear form data.

*/
function clearForm(fromName) {
    document.getElementById(fromName).reset();
}
//----------------------/Clear form function-----------------------------------------------------------



//----------------------popup function-----------------------------------------------------------------
/*

    * Function: popup
    * This function is used to show or hide popup messages.

*/
function popup(id, x) {

    if (x === 1) {
        document.getElementById(id).style.display = "block";
    } else if (x === 0) {
        document.getElementById(id).style.display = "none";
    }
}

//----------------------/popup function----------------------------------------------------------------




//----------------------Validate future date function--------------------------------------------------
/*

    * Function: isFutureDate
    * This function is used to check weather the entered date is future date.

*/
function isFutureDate(id, message) {
    let inputField = document.getElementById(id);
    let inputDay = new Date(inputField.value);
    let today = new Date();

    if (inputDay.getFullYear() >= today.getFullYear()) {
        if (inputDay.getMonth() >= today.getMonth()) {
            if (inputDay.getDay() <= today.getDay()) {
                document.getElementById(message).style.display = "block";
            } else {
                document.getElementById(message).style.display = "none";
            }
        } else {
            document.getElementById(message).style.display = "block";
        }
    } else {
        document.getElementById(message).style.display = "block";
    }

}
//----------------------/Validate future date function-------------------------------------------------





//----------------------Slide show class------------------------------------------------------------

class SlideShow {
    constructor(className){
        this.slideIndex = 0;
        this.x = 1;
        this.i = 0;
        this.className = this.className;
    }
    

    slideShow() {
    
        //get all elements by class
        if(this.x === 1) {// reduces unwanted element searchings
            this.x = document.getElementsByClassName(this.className);
        }
    
        for(this.i = 0; this.i < this.x.length; this.i++) {
            // change style display to non for all slides
            this.x[this.i].style.display = "none";
        }

        //increment slideIndex
        this.slideIndex++;

        if(this.slideIndex > this.x.length) {
            this.slideIndex = 1;
        }

        this.x[this.slideIndex - 1].style.display = "block";

    setTimeout(slideShow(this.className),3000); //set timer to 3 seconds


}
}





/*
    References:
        1. check class contains in a class list:https://www.javascripttutorial.net/dom/css/check-if-an-element-contains-a-class/
        2. Slide show js code: https://www.w3schools.com/w3css/tryit.asp?filename=tryw3css_slideshow_auto

*/