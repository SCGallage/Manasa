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
//----------------------/changeClass function----------------------------------------------------------






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