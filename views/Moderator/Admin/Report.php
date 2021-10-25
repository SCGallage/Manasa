<?php
?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Report Generation</title>
    <link rel="stylesheet" href="http://localhost/assets/css/main.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,200;0,300;0,400;0,500;0,700;1,200&display=swap" rel="stylesheet">



</head>
<body>
<main>

    <div class="row flex-gap">
        <div class="col-l-12">
            <span class="head-text2">Generate Reports</span>
        </div>
    </div>
    <div class="row flex-container">

        <div class="col-l-6 col-m-12 col-s-12 primary-card card-content flex-gap1">
            <div class="col-l-12 col-m-12 col-s-12 padding1">
                <span class="head-text">Generated Reports</span>
            </div>

            <div class="col-l-12 col-m-12 col-s-12 flex-gap4">
                <div class="upper-box-details card1">
                    <div class="col-l-12 col-m-12 col-s-12 text-style3">Expense Report</div>
                    <div class="col-l-12 col-m-12 col-s-12 ">
                        <span>Date: 2021/09/08</span><br>
                        <span>Type: Overview report </span><br>
                    </div>
                </div>

                <div class="upper-box-details card1">
                    <div class="col-l-12 col-m-12 col-s-12 text-style3">Events Conducted</div>
                    <div class="col-l-12 col-m-12 col-s-12">
                        <span>Date: 2021/09/08</span><br>
                        <span>Type: Overview report </span><br>
                    </div>
                </div>

                <div class="upper-box-details card1">
                    <div class="col-l-12 col-m-12 col-s-12 text-style3">Volunteer events</div>
                    <div class="col-l-12 col-m-12 col-s-12">
                        <span>Date: 2021/09/08</span><br>
                        <span>Type: Overview report </span><br>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-l-6 col-m-12 col-s-12 flex-gap1 primary-card card-content">
            <div class="col-l-12 col-m-12 col-s-12 padding1">
                <span class="head-text">Reports</span>
            </div>

            <div class="col-l-12 col-m-12 col-s-12 card2">
                <form action="" class="form1">
                    <div class="col-l-12 col-m-12 col-s-12 flex-container3 ">
                        <div class="col-l-6 col-m-6 col-s-6">
                            <label for="reportType" class="text-style3">Report Type</label>
                        </div>
                        <div class="col-l-6 col-m-6 col-s-6">
                            <select name="reportType" id="reportType" class="select1">
                                <option value="vol">Volunteers</option>
                                <option value="don">Donations</option>
                                <option value="ov">Overview</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-l-12 col-m-12 col-s-12 padding-top">
                        <label for="name" class="text-style3">Volunteer Name:</label>
                    </div>
                    <div class="col-l-12 col-m-12 col-s-12 ">
                        <input type="text" id="fname" name="fname" value="">
                    </div>

                    <div class="col-l-12 col-m-12 col-s-12 flex-container padding-top">
                        <div class="col-l-6 col-m-12 col-s-12 padding-right flex-container2">
                            <div class="col-l-12 col-m-12 col-s-12">
                                <label for="email" class="text-style3">To:</label>
                            </div>
                            <div class="col-l-12 col-m-12 col-s-12">
                                <input type="text" id="email" name="email" value="">
                            </div>
                        </div>
                        <div class="col-l-6 col-m-12 col-s-12 padding-left flex-container2">
                            <div class="col-l-12 col-m-12 col-s-12">
                                <label for="Date" class="text-style3">From:</label>
                            </div>
                            <div class="col-l-12 col-m-12 col-s-12">
                                <input type="text" id="date" name="date" value="">
                            </div>
                        </div>
                    </div>

                    <div class="col-l-12 col-m-12 col-s-12 padding-top">
                        <input type="submit" value="Submit" class="button2">
                    </div>

                </form>
            </div>
        </div>
    </div>


</main>

</body>
</html>
