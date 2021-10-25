<?php
?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="http://localhost/assets/css/main.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,200;0,300;0,400;0,500;0,700;1,200&display=swap" rel="stylesheet">

</head>
<body>
<main>

    <div class="row flex-gap">
        <div class="col-l-12">
            <span class="head-text2">Schedule</span>
        </div>
    </div>

    <div class="row row-style flex-container">
        <div class="col-l-8 col-m-12 col-s-12 upper-box flex-gap1 card-content ">
            <div class="col-l-12 col-m-12 col-s-12 padding1">
                <span class="head-text">Calendar</span>
            </div>
            <div class="col-l-12 col-m-12 col-s-12 card2">
                <div class="calendar-card">
                    <div class="calendar">
                        <div class="calendar-header">
                            <select name="month-picker" id="month-picker">
                                <option value="0">January</option>
                                <option value="1">February</option>
                                <option value="2">March</option>
                                <option value="3">April</option>
                                <option value="4">May</option>
                                <option value="5">June</option>
                                <option value="6">July</option>
                                <option value="7">August</option>
                                <option value="8">September</option>
                                <option value="9">October</option>
                                <option value="10">November</option>
                                <option value="11">December</option>
                            </select>
                            <span class="year-change" id="prev-year">
                        <
                      </span>
                            <span id="year">2021</span>
                            <span class="year-change" id="next-year">
                        >
                      </span>
                            <div class="calendar-body">
                                <div class="calendar-week-day">
                                    <div>Sun</div>
                                    <div>Mon</div>
                                    <div>Tue</div>
                                    <div>Wed</div>
                                    <div>Thu</div>
                                    <div>Fri</div>
                                    <div>Sat</div>
                                </div>
                                <div class="calendar-days"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-l-12 col-m-12 col-s-12 padding1">
                <span class="button1">
                    <a href="/admin/FixSchedule">
                        Fix Schedule
                    </a>
                </span>
            </div>

        </div>

        <div class="col-l-4 col-m-12 col-s-12 primary-card flex-gap1 card-content">
            <div class="col-l-12 col-m-12 col-s-12 padding1">
                <span class="head-text">Timeslot Details</span>
            </div>

            <div class="col-l-12 col-m-12 col-s-12 card2">
                <form action="" class="form1">
                    <div class="col-l-12 col-m-12 col-s-12 flex-container3 ">
                        <div class="col-l-6 col-m-6 col-s-6">
                            <span class="text-style3">Date:</span>
                        </div>
                        <div class="col-l-6 col-m-6 col-s-6">
                            <sapn class="text-style3"> 11/10/2021</sapn>
                        </div>
                    </div>

                    <div class="col-l-12 col-m-12 col-s-12 flex-container3 padding-top">
                        <div class="col-l-6 col-m-6 col-s-6">
                            <span class="text-style3">Timeslot ID:</span>
                        </div>
                        <div class="col-l-6 col-m-6 col-s-6">
                            <sapn class="text-style3"> 1121</sapn>
                        </div>
                    </div>

                    <div class="col-l-12 col-m-12 col-s-12 padding-top">
                        <label for="name" class="text-style3">Number of slots:</label>
                    </div>
                    <div class="col-l-12 col-m-12 col-s-12 ">
                        <input type="text" id="fname" name="fname" value="">
                    </div>

                    <div class="col-l-12 col-m-12 col-s-12 padding-top">
                        <input type="submit" value="Update" class="button2">
                    </div>

                </form>
            </div>
        </div>
    </div>
    </div>

    <div class="row row-style flex-container">
        <div class="col-l-12 col-m-12 col-s-12 primary-card flex-gap1">
            <div class="col-l-12 col-m-12 col-s-12 flex-container2 padding1">
                <span class="head-text">Appointments</span>
            </div>

            <div class="col-l-12 col-m-12 col-s-12 table-overflow">
                <table>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Contact</th>
                        <th>Date</th>
                        <th>Timeslot</th>
                        <th>State</th>
                    </tr>
                    <tr>
                        <td>Peter Griffin</td>
                        <td>Griffin@gmail.com</td>
                        <td>077229667</td>
                        <td>07/09/2021</td>
                        <td>9.00 AM - 10.00 AM </td>
                        <td>Active</td>
                    </tr>

                    <tr>
                        <td>Peter Griffin</td>
                        <td>Griffin@gmail.com</td>
                        <td>077229667</td>
                        <td>07/09/2021</td>
                        <td>9.00 AM - 10.00 AM </td>
                        <td>Active</td>
                    </tr>
                    <tr>
                        <td>Peter Griffin</td>
                        <td>Griffin@gmail.com</td>
                        <td>077229667</td>
                        <td>07/09/2021</td>
                        <td>9.00 AM - 10.00 AM </td>
                        <td>Active</td>
                    </tr>
                    <tr>
                        <td>Peter Griffin</td>
                        <td>Griffin@gmail.com</td>
                        <td>077229667</td>
                        <td>07/09/2021</td>
                        <td>9.00 AM - 10.00 AM </td>
                        <td>Active</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    </div>

</main>

<script src="http://localhost/assets/js/admin/calendar.js" ></script>

</body>
</html>
