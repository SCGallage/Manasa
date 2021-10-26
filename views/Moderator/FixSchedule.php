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
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
          rel="stylesheet"/>
</head>
<body>
<main>

    <div class="row flex-gap">
        <div class="col-l-12">
            <span class="head-text2">Update Schedule</span>
        </div>
    </div>

    <div class="row row-style flex-container">
        <div class="col-l-8 col-m-12 col-s-12 primary-card flex-gap1 card-content ">
            <div class="col-l-12 col-m-12 col-s-12">
                <span class="head-text">Calendar</span>
            </div>
            <div class="col-l-12 col-m-12 col-s-12 card3">
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

        </div>

        <div class="col-l-4 col-m-12 col-s-12 primary-card flex-gap1 card-content">

            <div class="col-l-12 col-m-12 col-s-12">
                <span class="head-text">Empty Timeslots</span>
            </div>

            <div class="col-l-12 col-m-12 col-s-12 scroll1">
                <div class="upper-box-details card1">
                    <div class="col-l-12 col-m-12 col-s-12">
                        <span>Date: 2021/09/08</span><br>
                        <span>Time: 9.00 AM </span><br>
                        <span>No. of slots: 7</span>
                    </div>
                </div>

                <div class="upper-box-details card1">
                    <div class="col-l-12 col-m-12 col-s-12">
                        <span>Date: 2021/09/08</span><br>
                        <span>Time: 9.00 AM </span><br>
                        <span>No. of slots: 7</span>
                    </div>
                </div>

                <div class="upper-box-details card1">
                    <div class="col-l-12 col-m-12 col-s-12">
                        <span>Date: 2021/09/08</span><br>
                        <span>Time: 9.00 AM </span><br>
                        <span>No. of slots: 7</span>
                    </div>
                </div>
            </div>

            <div class="col-l-12 col-m-12 col-s-12 flex-gap3">
                <span class="head-text">Befrienders</span>
            </div>

            <div class="col-l-12 col-m-12 col-s-12 scroll1">
                <table>
                    <tr>
                        <td>Peter Griffin</td>
                        <td> <a href="#" class="button1">Assign</a></td>
                    </tr>

                    <tr>
                        <td>Peter Griffin</td>
                        <td> <a href="#" class="button1">Assign</a></td>
                    </tr>

                    <tr>
                        <td>Peter Griffin</td>
                        <td> <a href="#" class="button1">Assign</a></td>
                    </tr>

                    <tr>
                        <td>Peter Griffin</td>
                        <td> <a href="#" class="button1">Assign</a></td>
                    </tr>

                </table>
            </div>
        </div>
    </div>


</main>

<script src="http://localhost/assets/js/admin/calendar.js" ></script>

</body>
</html>
