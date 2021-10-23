<?php
?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Search Reports</title>
    <link rel="stylesheet" href="./assets/css/main.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,200;0,300;0,400;0,500;0,700;1,200&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
                rel="stylesheet">

</head>
<body>
<main>
    <div class="row flex-container">

        <div class="col-l-12 col-m-12 col-s-12 flex-gap">

            <div class="col-l-8 col-m-12 col-s-12">
                <span class="head-text2">Session Reports</span>
            </div>
            <div class="col-l-1 col-m-4 col-s-4 positionR">
                    <button class="button2" onclick="dropDownButton()">By Befrinder</button>
                    <div class="sub-button3" id="dropdown">
                        <a href="#" class="button4">By Date</a>
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
            <div class="col-l-12 col-m-12 col-s-12 card-content">
                <span class="head-text">Session Reports</span>
            </div>

            <div class="col-l-12 col-m-12 col-s-12 table-overflow">
                <table>
                    <tr>
                        <th>Befriender Name</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Type</th>
                        <th></th>
                    </tr>
                    <tr>
                        <td>Peter Griffin</td>
                        <td>2017/09/10</td>
                        <td>5.00 PM</td>
                        <td>Call</td>
                        <td><span class="material-icons" id="viewReport" onclick="viewReport()">more_horiz</span></td>
                    </tr>
                    <tr>
                        <td>Carla Bruni</td>
                        <td>2017/09/10</td>
                        <td>5.00 PM</td>
                        <td>Call</td>
                        <td><span class="material-icons">more_horiz</span></td>
                    </tr>
                    <tr>
                        <td>David Arquette</td>
                        <td>2017/09/10</td>
                        <td>5.00 PM</td>
                        <td>Call</td>
                        <td><span class="material-icons">more_horiz</span></td>
                    </tr>
                    <tr>
                        <td>Ben Affleck</td>
                        <td>2017/09/10</td>
                        <td>5.00 PM</td>
                        <td>Call</td>
                        <td><span class="material-icons">more_horiz</span></td>
                    </tr>
                    <tr>
                        <td>Peter Griffin</td>
                        <td>2017/09/10</td>
                        <td>5.00 PM</td>
                        <td>Call</td>
                        <td><span class="material-icons">more_horiz</span></td>
                    </tr>
                    <tr>
                        <td>Carla Bruni</td>
                        <td>2017/09/10</td>
                        <td>5.00 PM</td>
                        <td>Call</td>
                        <td><span class="material-icons">more_horiz</span></td>
                    </tr>
                    <tr>
                        <td>David Arquette</td>
                        <td>2017/09/10</td>
                        <td>5.00 PM</td>
                        <td>Call</td>
                        <td><span class="material-icons">more_horiz</span></td>
                    </tr>
                    <tr>
                        <td>Ben Affleck</td>
                        <td>2017/09/10</td>
                        <td>5.00 PM</td>
                        <td>Call</td>
                        <td><span class="material-icons">more_horiz</span></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

</main>

<!-- POP-UP View report ------------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->
<div class="modal" id="modal-box">
    <div class="modal-content">

        <div class="modal-header padding1">
            <div class="head-text3">
                <span class="close" id="close">&times;</span>
            </div>

            <div class="head-text2 padding-top">
                <span>Report Details</span>
            </div>
        </div>

        <div class="modal-body">
            <div class="card-content">
                <div class="col-l-12 col-m-12 col-s-12 padding-top">
                    <div class="col-l-3 col-m-3 col-s-3">
                        <span class="text-style5">Caller Name:</span>
                    </div>
                    <div class="col-l-9 col-m-9 col-s-9">
                        <span>Rober pattinson</span>
                    </div>
                </div>

                <div class="col-l-12 col-m-12 col-s-12 padding-top">
                    <div class="col-l-3 col-m-3 col-s-3">
                        <span class="text-style5">Session Date:</span>
                    </div>
                    <div class="col-l-9 col-m-9 col-s-9">
                        <span>2020/11/10</span>
                    </div>
                </div>

                <div class="col-l-12 col-m-12 col-s-12 padding-top">
                    <div class="col-l-3 col-m-3 col-s-3">
                        <span class="text-style5">Session Time:</span>
                    </div>
                    <div class="col-l-9 col-m-9 col-s-9">
                        <span>6.00 PM</span>
                    </div>
                </div>

                <div class="col-l-12 col-m-12 col-s-12 padding-top">
                    <div class="col-l-3 col-m-3 col-s-3">
                        <span class="text-style5">Session Type:</span>
                    </div>
                    <div class="col-l-9 col-m-9 col-s-9">
                        <span>Virtual</span>
                    </div>
                </div>

                <div class="col-l-12 col-m-12 col-s-12 padding-top">
                    <span class="text-style5">Remark:</span>
                </div>
                <div class="col-l-12 col-m-12 col-s-12 ">
                    <span> </span>
                </div>

            </div>
        </div>
        <div class="modal-footer"></div>
    </div>
</div>
<!-- ------------------------------------------------------------------------------------------------------------------------------------------------------------ -->

<script src="./assets/JS/AdminBackEnd.js" ></script>

</body>
</html>
