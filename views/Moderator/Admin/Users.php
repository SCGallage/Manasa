<?php
?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Search User</title>
    <link rel="stylesheet" href="./assets/css/main.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,200;0,300;0,400;0,500;0,700;1,200&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
          rel="stylesheet">
    <style>
        .file {
            opacity: 0;
            width: 0.1px;
            height: 0.1px;
            position: absolute;
        }
        .customLable{
            display: block;
            position: relative;
            width: 200px;
            height: 50px;
            border-radius: 25px;
            background: #6c6c6c;
            box-shadow: 0 4px 7px rgba(0, 0, 0, 0.4);
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            font-weight: bold;
            cursor: pointer;
            transition: transform .2s ease-out;
        }
        <style>
         .dropbutton {
             background-color: #4CAF50;
             color: white;
             padding: 14px;
             font-size: 14px;
             border: none;
             cursor: pointer;
         }

        .dropbutton:hover, .dropbutton:focus {
            background-color: #3e8e41;
        }

        .dropdownmenu {
            position: relative;
            display: inline-block;
            outline: none;
        }

        .dropdownmenu-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 140px;
            overflow: auto;
            box-shadow: 0px 8px 16px rgba(0,0,0,0.3);
        }

        .dropdownmenu-content a {
            color: black;
            padding: 12px 14px;
            text-decoration: none;
            display: block;
        }

        .dropdownmenu a:hover {
            background-color: #f1f1f1
        }

        .show {
            display:block;
        }
    </style>
    </style>
</head>
<body>
<main>
    <div class="row flex-container">

        <div class="col-l-12 col-m-12 col-s-12 flex-gap">

            <div class="col-l-8 col-m-12 col-s-12">
                <span class="head-text2">User Details</span>
            </div>
            <div class="col-l-1 col-m-4 col-s-4 positionR">
                <button class=" button2" onclick="dropDownButton()">Befrinder</button>
                <div class="sub-button3" id="dropdown">
                    <a href="#" class="button4">Volunteer</a>
                    <a href="#" class="button4">Caller</a>
                    <a href="#" class="button4">Moderator</a>
                </div>
            </div>
            <div class="col-l-3 col-m-8 col-s-8 positionR">
                <div class="search">
                    <input type="text" class="searchTerm" placeholder="Search">
                    <button type="submit" class="searchButton">
                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="currentColor"><path d="M0 0h24v24H0z" fill="none"/><path d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"/></svg>
                    </button>
                </div>
            </div>
        </div>

    </div>

    <div class="row row-style flex-container">
<!--        <div class="dropdownmenu">-->
<!---->
<!--            <button onclick="btnToggle()" class="dropbutton">-->
<!--                Dropdown-->
<!--            </button>-->
<!---->
<!--            <div id="Dropdown" class="dropdownmenu-content" >-->
<!--                <a href="#Java">Java</a>-->
<!--                <a href="#HTML">HTML</a>-->
<!--                <a href="#CSS">CSS</a>-->
<!--                <a href="#JS">JavaScript</a>-->
<!--            </div>-->
<!--        </div>-->
        <div class="col-l-12 col-m-12 col-s-12 primary-card flex-gap">

            <div class="col-l-12 col-m-12 col-s-12 padding1">
                <div class="col-l-8 col-m-6 col-s-6"> <span class="head-text">Berinder</span> </div>
                <div class="col-l-4 col-m-6 col-s-6">
                    <div>
                    <div onclick="dropDownButtonUser()">
                    <span class="add-text" >+Add User</span>
                    <div class="sub-button3 padding-top" id="dropdownUser">
                        <a href="/UserRequests" class="button5">User Requests</a>
                        <a href="#" class="button5" id="createUser" onclick="createUser()">Add user</a>
                    </div>
                    </div>
                    </div>
                </div>
            </div>

            <div class="col-l-12 col-m-12 col-s-12 table-overflow">
                <table>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Contact</th>
                        <th>Start Date</th>
                        <th>Type</th>
                        <th> </th>
                        <th> </th>
                    </tr>
                    <tr>
                        <td>Ben Affleck</td>
                        <td>BenAffleck@gmail.com</td>
                        <td>0771268920</td>
                        <td>2017/09/10</td>
                        <td>Befrinder</td>
                        <td><span class="material-icons" id="updateUser" onclick="updateUser()">edit</span></td>
                        <td><span class="material-icons">delete</span></td>
                    </tr>
                    <tr>
                        <td>Peter Griffin</td>
                        <td>PeterGriffin@gmail.com</td>
                        <td>077229667</td>
                        <td>2017/09/10</td>
                        <td>Befrinder</td>
                        <td><span class="material-icons">edit</span></td>
                        <td><span class="material-icons">delete</span></td>
                    </tr>
                    <tr>
                        <td>Carla Bruni</td>
                        <td>CarlaBruni@gmail.com</td>
                        <td>077146278</td>
                        <td>2017/09/10</td>
                        <td>Befrinder</td>
                        <td><span class="material-icons">edit</span></td>
                        <td><span class="material-icons">delete</span></td>
                    </tr>
                    <tr>
                        <td>David Arquette</td>
                        <td>DavidArquette@gmail.com</td>
                        <td>0772678924</td>
                        <td>2017/09/10</td>
                        <td>Befrinder</td>
                        <td><span class="material-icons">edit</span></td>
                        <td><span class="material-icons">delete</span></td>
                    </tr>
                    <tr>
                        <td>Ben Affleck</td>
                        <td>BenAffleck@gmail.com</td>
                        <td>0771268920</td>
                        <td>2017/09/10</td>
                        <td>Befrinder</td>
                        <td><span class="material-icons">edit</span></td>
                        <td><span class="material-icons">delete</span></td>
                    </tr>
                    <tr>
                        <td>Peter Griffin</td>
                        <td>PeterGriffin@gmail.com</td>
                        <td>077229667</td>
                        <td>2017/09/10</td>
                        <td>Befrinder</td>
                        <td><span class="material-icons">edit</span></td>
                        <td><span class="material-icons">delete</span></td>
                    </tr>
                    <tr>
                        <td>Carla Bruni</td>
                        <td>CarlaBruni@gmail.com</td>
                        <td>077146278</td>
                        <td>2017/09/10</td>
                        <td>Befrinder</td>
                        <td><span class="material-icons">edit</span></td>
                        <td><span class="material-icons">delete</span></td>
                    </tr>
                    <tr>
                        <td>David Arquette</td>
                        <td>DavidArquette@gmail.com</td>
                        <td>0772678924</td>
                        <td>2017/09/10</td>
                        <td>Befrinder</td>
                        <td><span class="material-icons">edit</span></td>
                        <td><span class="material-icons">delete</span></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

</main>

<!-- POP-UP Create User --------------------------------------------------------------------------------------------------------------------->
<div class="modal" id="createUser-modal">
    <div class="modal-content">

        <div class="modal-header padding1">
            <div class="head-text3">
                <span class="close" id="close-user">&times;</span>
            </div>

            <div class="head-text3 padding-top">
                <span>Create User</span>
            </div>
        </div>

        <div class="modal-body">
            <div class="card-content">
                <form name="createUserForm" action="/SearchUsers" class="form1" method="post" id="registerForm">
                    <div class="col-l-12 col-m-12 col-s-12 flex-container3 ">
                        <div class="col-l-4 col-m-4 col-s-4">
                            <label for="userType" class="text-style3">User Type</label>
                        </div>
                        <div class="col-l-8 col-m-8 col-s-8">
                            <select name="type" id="reportType" class="select1">
                                <option value="Volunteer">Volunteer</option>
                                <option value="Befriender">Befriender</option>
                                <option value="Moderator">Moderator</option>
                                <option value="Administrator">Administrator</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-l-12 col-m-12 col-s-12 flex-container padding-top">
                        <div class="col-l-6 col-m-12 col-s-12 padding-right flex-container2">
                            <div class="col-l-12 col-m-12 col-s-12">
                                <label for="email" class="text-style3">Username:</label>
                            </div>
                            <div class="col-l-12 col-m-12 col-s-12">
                                <input type="text" id="username" name="username" value="">
                            </div>
                        </div>
                        <div class="col-l-6 col-m-12 col-s-12 padding-left flex-container2">
                            <div class="col-l-12 col-m-12 col-s-12">
                                <label for="Date" class="text-style3">Email:</label>
                            </div>
                            <div class="col-l-12 col-m-12 col-s-12">
                                <input type="text" id="email" name="email" value="">
                            </div>
                        </div>
                    </div>

                    <div class="col-l-12 col-m-12 col-s-12 flex-container padding-top">
                        <div class="col-l-6 col-m-12 col-s-12 padding-right flex-container2">
                            <div class="col-l-12 col-m-12 col-s-12">
                                <label for="email" class="text-style3">First Name:</label>
                            </div>
                            <div class="col-l-12 col-m-12 col-s-12">
                                <input type="text" id="fname" name="fname" value="">
                            </div>
                        </div>
                        <div class="col-l-6 col-m-12 col-s-12 padding-left flex-container2">
                            <div class="col-l-12 col-m-12 col-s-12">
                                <label for="Date" class="text-style3">Last Name:</label>
                            </div>
                            <div class="col-l-12 col-m-12 col-s-12">
                                <input type="text" id="lname" name="lname" value="">
                            </div>
                        </div>
                    </div>

                    <div class="col-l-12 col-m-12 col-s-12 flex-container padding-top">
                        <div class="col-l-6 col-m-12 col-s-12 padding-right flex-container2">
                            <div class="col-l-12 col-m-12 col-s-12">
                                <label for="email" class="text-style3">Password:</label>
                            </div>
                            <div class="col-l-12 col-m-12 col-s-12">
                                <input type="password" id="password" name="password" value="">
                            </div>
                        </div>
                        <div class="col-l-6 col-m-12 col-s-12 padding-left flex-container2">
                            <div class="col-l-12 col-m-12 col-s-12">
                                <label for="Date" class="text-style3">Confirm Password:</label>
                            </div>
                            <div class="col-l-12 col-m-12 col-s-12">
                                <input type="password" id="password" name="con_password" value="">
                            </div>
                        </div>
                    </div>

                    <div class="col-l-12 col-m-12 col-s-12 flex-container padding-top">
                        <div class="col-l-6 col-m-12 col-s-12 padding-right flex-container2">
                            <div class="col-l-12 col-m-12 col-s-12">
                                <label for="email" class="text-style3">Date of Birth:</label>
                            </div>
                            <div class="col-l-12 col-m-12 col-s-12">
                                <input type="date" id="dob" name="dob" value="">
                            </div>
                        </div>
                        <div class="col-l-6 col-m-12 col-s-12 padding-left flex-container2">
                            <div class="col-l-12 col-m-12 col-s-12">
                                <label for="Date" class="text-style3">Gender:</label>
                            </div>
                            <div class="col-l-12 col-m-12 col-s-12">
                                <select name="gender" id="gender" class="select2">
                                    <option value="-------" selected disabled>--------</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                    <option value="rather not say">Rather Not Say</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="col-l-12 col-m-12 col-s-12 flex-container padding-top">
                        <div class="col-l-6 col-m-12 col-s-12 padding-right flex-container2">
                            <div class="col-l-12 col-m-12 col-s-12">
                                <label for="Date" class="text-style3">State:</label>
                            </div>
                            <div class="col-l-12 col-m-12 col-s-12">
                                <select name="reportType" id="reportType" class="select2">
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-l-6 col-m-12 col-s-12 padding-left flex-container2">
<!--                            <div class="col-l-12 col-m-12 col-s-12">-->
<!--                                <input type="file" name="cv" id="file" class="file">-->
<!--                                <label for="file" class="customLable">Attach Your CV:</label>-->
<!--                            </div>-->
                        </div>
                    </div>
                    <div class="col-l-12 col-m-12 col-s-12 padding-top">
                        <div class="col-l-8"></div>
                        <div class="col-l-4 col-m-12 col-s-12 positionR">
                            <input type="submit" value="Submit">
                        </div>
                    </div>

                </form>
            </div>
        </div>
        <div class="modal-footer"></div>
    </div>
</div>
<!-- -------------------------------------------------------------------------------------------------------------------------------------------------- -->

<!-- POP-UP Update User ----------------------------------------------------------------------------------------------------------------------------------->
<div class="modal" id="modal-box">
    <div class="modal-content">

        <div class="modal-header padding1">
            <div class="head-text3">
                <span class="close" id="close">&times;</span>
            </div>

            <div class="head-text3 padding-top">
                <span>Update User</span>
            </div>
        </div>

        <div class="modal-body">
            <div class="primary-card card-content">
                <form action="" class="form1">
                    <div class="col-l-12 col-m-12 col-s-12 flex-container3 ">
                        <div class="col-l-4 col-m-4 col-s-4">
                            <label for="reportType" class="text-style3">User Type</label>
                        </div>
                        <div class="col-l-8 col-m-8 col-s-8">
                            <select name="reportType" id="reportType" class="select1">
                                <option value="vol">Volunteer</option>
                                <option value="don">Befriender</option>
                                <option value="ov">Caller</option>
                                <option value="don">Moderator</option>
                                <option value="ov">Administrator</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-l-12 col-m-12 col-s-12 flex-container padding-top">
                        <div class="col-l-6 col-m-12 col-s-12 padding-right flex-container2">
                            <div class="col-l-12 col-m-12 col-s-12">
                                <label for="email" class="text-style3">Username:</label>
                            </div>
                            <div class="col-l-12 col-m-12 col-s-12">
                                <input type="text" id="email" name="email" value="">
                            </div>
                        </div>
                        <div class="col-l-6 col-m-12 col-s-12 padding-left flex-container2">
                            <div class="col-l-12 col-m-12 col-s-12">
                                <label for="Date" class="text-style3">Email:</label>
                            </div>
                            <div class="col-l-12 col-m-12 col-s-12">
                                <input type="text" id="date" name="date" value="">
                            </div>
                        </div>
                    </div>

                    <div class="col-l-12 col-m-12 col-s-12 flex-container padding-top">
                        <div class="col-l-6 col-m-12 col-s-12 padding-right flex-container2">
                            <div class="col-l-12 col-m-12 col-s-12">
                                <label for="email" class="text-style3">First Name:</label>
                            </div>
                            <div class="col-l-12 col-m-12 col-s-12">
                                <input type="text" id="email" name="email" value="">
                            </div>
                        </div>
                        <div class="col-l-6 col-m-12 col-s-12 padding-left flex-container2">
                            <div class="col-l-12 col-m-12 col-s-12">
                                <label for="Date" class="text-style3">Last Name:</label>
                            </div>
                            <div class="col-l-12 col-m-12 col-s-12">
                                <input type="text" id="date" name="date" value="">
                            </div>
                        </div>
                    </div>

                    <div class="col-l-12 col-m-12 col-s-12 flex-container padding-top">
                        <div class="col-l-6 col-m-12 col-s-12 padding-right flex-container2">
                            <div class="col-l-12 col-m-12 col-s-12">
                                <label for="email" class="text-style3">Password:</label>
                            </div>
                            <div class="col-l-12 col-m-12 col-s-12">
                                <input type="text" id="email" name="email" value="">
                            </div>
                        </div>
                        <div class="col-l-6 col-m-12 col-s-12 padding-left flex-container2">
                            <div class="col-l-12 col-m-12 col-s-12">
                                <label for="Date" class="text-style3">Confirm Password:</label>
                            </div>
                            <div class="col-l-12 col-m-12 col-s-12">
                                <input type="text" id="date" name="date" value="">
                            </div>
                        </div>
                    </div>

                    <div class="col-l-12 col-m-12 col-s-12 flex-container padding-top">
                        <div class="col-l-6 col-m-12 col-s-12 padding-right flex-container2">
                            <div class="col-l-12 col-m-12 col-s-12">
                                <label for="email" class="text-style3">Date of Birth:</label>
                            </div>
                            <div class="col-l-12 col-m-12 col-s-12">
                                <input type="text" id="email" name="email" value="">
                            </div>
                        </div>
                        <div class="col-l-6 col-m-12 col-s-12 padding-left flex-container2">
                            <div class="col-l-12 col-m-12 col-s-12">
                                <label for="Date" class="text-style3">Gender:</label>
                            </div>
                            <div class="col-l-12 col-m-12 col-s-12">
                                <select name="reportType" id="reportType" class="select2">
                                    <option value="vol">Male</option>
                                    <option value="don">Female</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="col-l-12 col-m-12 col-s-12 padding-top">
                        <div class="col-l-8"></div>
                        <div class="col-l-4 col-m-12 col-s-12 positionR">
                            <input type="submit" value="Submit">
                        </div>
                    </div>

                </form>
            </div>
        </div>
        <div class="modal-footer"></div>
    </div>
</div>
<!-- -------------------------------------------------------------------------------------------------------------------------------------------------- -->

<script src="./assets/JS/AdminBackEnd.js" ></script>
<script src="./assets/JS/formValidation.js" ></script>
<script src="./assets/JS/register_validate.js" ></script>
<script>

    // JavaScript code to avoid dropdown
    // menu close

    // Clicking dropdown button will toggle display
    function btnToggle() {
        document.getElementById("Dropdown").classList.toggle("show");
    }

    // // Prevents menu from closing when clicked inside
    // document.getElementById("Dropdown").addEventListener('click', function (event) {
    //     alert("click outside");
    //     event.stopPropagation();
    // });

    // Closes the menu in the event of outside click
    window.onclick = function(event) {
        if (!event.target.matches('.dropbutton')) {

            var dropdowns =
                document.getElementsByClassName("dropdownmenu-content");

            var i;
            for (i = 0; i < dropdowns.length; i++) {
                var openDropdown = dropdowns[i];
                if (openDropdown.classList.contains('show')) {
                    openDropdown.classList.remove('show');
                }
            }
        }
    }
</script>

</body>
</html>
