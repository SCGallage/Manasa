<?php
?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Search User</title>
    <link rel="stylesheet" href="http://localhost/assets/css/main.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,200;0,300;0,400;0,500;0,700;1,200&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
          rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
          rel="stylesheet"/>
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
        <div class="col-l-12 col-m-12 col-s-12 primary-card flex-gap">
            <div class="col-l-12 col-m-12 col-s-12 padding1">
                <div class="col-l-12 col-m-12 col-s-12"> <span class="head-text">Befriender</span> </div>
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


</body>
</html>
