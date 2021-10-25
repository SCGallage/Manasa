
    function dropDownButton() {
    document.getElementById("dropdown").classList.toggle("show");
}

    function dropDownButtonUser() {
        document.getElementById("dropdownUser").classList.toggle("show");
    }

    function updateUser(){
        var modal = document.getElementById("modal-box")
        var btn = document.getElementById("updateUser");
        var close = document.getElementById("close")

        btn.onclick = function(){
            modal.style.display = "block";
        }

        close.onclick = function(){
            modal.style.display = "none";
        }

        window.onclick = function(event){
            if (event.target == modal){
                modal.style.display = "none";
            }
        }
    }

    function createUser(){
        var modal = document.getElementById("createUser-modal");
        var btn = document.getElementById("createUser");
        var close = document.getElementById("close-user");

        btn.onclick = function(){
            modal.style.display = "block";
        }

        close.onclick = function(){
            modal.style.display = "none";
        }

        window.onclick = function(event){
            if (event.target == modal){
                modal.style.display = "none";
            }
        }
    }

    function viewReport(){
        var modal = document.getElementById("modal-box")
        var btn = document.getElementById("viewReport");
        var close = document.getElementById("close")

        btn.onclick = function(){
        modal.style.display = "block";
        }

        close.onclick = function(){
        modal.style.display = "none";
        }

        window.onclick = function(event){
            if (event.target == modal){
            modal.style.display = "none";
            }
        }
    }

    function updateSG(){
        var modal = document.getElementById("updateSG-modal")
        var btn = document.getElementById("updateSG");
        var close = document.getElementById("close-updateSG")

        btn.onclick = function(){
            modal.style.display = "block";
        }

        close.onclick = function(){
            modal.style.display = "none";
        }

        window.onclick = function(event){
            if (event.target == modal){
                modal.style.display = "none";
            }
        }
    }

    function AddEvent(){
        var modal = document.getElementById("modal-box")
        var btn = document.getElementById("AddEvent");
        var close = document.getElementById("close")

        btn.onclick = function(){
            modal.style.display = "block";
        }

        close.onclick = function(){
            modal.style.display = "none";
        }

        window.onclick = function(event){
            if (event.target == modal){
                modal.style.display = "none";
            }
        }
    }

    function UpdateEvent(){
        var modal = document.getElementById("update-modal")
        var btn = document.getElementById("UpdateEvent");
        var close = document.getElementById("update-close")

        btn.onclick = function(){
            modal.style.display = "block";
        }

        close.onclick = function(){
            modal.style.display = "none";
        }

        window.onclick = function(event){
            if (event.target == modal){
                modal.style.display = "none";
            }
        }
    }

    function selectUsers(){
        var modal = document.getElementById("selectUsers-modal")
        var btn = document.getElementById("selectUsers");
        var close = document.getElementById("close-selectUser")

        btn.onclick = function(){
            modal.style.display = "block";
        }

        close.onclick = function(){
            modal.style.display = "none";
        }

        window.onclick = function(event){
            if (event.target == modal){
                modal.style.display = "none";
            }
        }
    }
