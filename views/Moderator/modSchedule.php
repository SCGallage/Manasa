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
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet"/>
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
            <span class="head-text2">Schedule</span>
        </div>
    </div>

    <div class="row">
        <div class="col-l-12 col-m-12 col-s-12 upper-box card-content ">
            <div class="col-l-12 col-m-12 col-s-12 ">
                <div class="col-l-11 col-m-12 col-s-12 padding-top">
                    <span class="head-text">Current Schedule</span>
                </div>

                <div class="col-l-1 col-m-12 col-s-12 padding-top">
                    <label class="switch">
                        <input type="checkbox" checked>
                        <span class="slider round"></span>
                    </label>
                </div>
            </div>

            <div class="col-l-12 col-m-12 col-s-13 ">
                <span class="duration">01/11/2021 TO 14/11/2021</span>
            </div>

            <div class="col-l-12 col-m-12 col-s-12 card2">
                <div class="main-grid-container-01 col-l-12">
                    <div class="grid-container-01 col-l-12">
                        <div></div>
                        <div class="grid-item-day">
                            <span class="day">MONDAY</span>
                            <span class="date">25.05.2021</span>
                        </div>
                        <div class="grid-item-day">
                            <span class="day">TUESDAY</span>
                            <span class="date">26.05.2021</span>
                        </div>
                        <div class="grid-item-day">
                            <span class="day">WEDNESDAY</span>
                            <span class="date">27.05.2021</span>
                        </div>
                        <div class="grid-item-day">
                            <span class="day">THURSDAY</span>
                            <span class="date">28.05.2021</span>
                        </div>
                        <div class="grid-item-day">
                            <span class="day">FRIDAY</span>
                            <span class="date">29.05.2021</span>
                        </div>
                        <div class="grid-item-day">
                            <span class="day">SATURDAY</span>
                            <span class="date">30.05.2021</span>
                        </div>
                        <div class="grid-item-day">
                            <span class="day">SUNDAY</span>
                            <span class="date">31.05.2021</span>
                        </div>
                    </div>
                    <div class="grid-container-02">
                        <div class="grid-item-time">
                            <span class="time-start">9.00</span>
                            <span class="time-end">12.00</span>
                        </div>

                        <div class="grid-item-slot success">
                            <span class="slot-id">Slot #0103</span>
                            <span class="slot-remain">Remaining: 0</span>
                            <div class="lables">
                                <span class="label-closed">CLOSED</span>
                            </div>
                            <button class="view-btn">VIEW</button>
                        </div>
                        <div class="grid-item-slot">
                            <span class="slot-id">Slot #0104</span>
                            <span class="slot-remain">Remaining: 3</span>
                            <div class="labels">
                                <span class="label-available">AVAILABLE</span>
                                <span class="label-reserved">RESERVED</span>
                            </div>
                            <button class="view-btn">VIEW</button>
                        </div>
                        <div class="grid-item-slot danger">
                            <span class="slot-id">Slot #0105</span>
                            <span class="slot-remain">Remaining: 0</span>
                            <div class="lables">
                                <span class="label-closed">CLOSED</span>
                            </div>
                            <button class="view-btn">VIEW</button>
                        </div>
                        <div class="grid-item-slot disabled">
                            <span class="slot-id">Slot #0106</span>
                            <span class="slot-remain">Remaining: 5</span>
                            <div class="labels">
                                <span class="label-available">AVAILABLE</span>
                                <span class="label-reserved">RESERVED</span>
                            </div>
                            <button class="view-btn">VIEW</button>
                        </div>
                        <div class="grid-item-slot">
                            <span class="slot-id">Slot #0107</span>
                            <span class="slot-remain">Remaining: 0</span>
                            <div class="lables">
                                <span class="label-closed">CLOSED</span>
                            </div>
                            <button class="view-btn">VIEW</button>
                        </div>
                        <div class="grid-item-slot pending">
                            <span class="slot-id">Slot #0108</span>
                            <span class="slot-remain">Remaining: 2</span>
                            <div class="labels">
                                <span class="label-available">AVAILABLE</span>
                                <span class="label-reserved">RESERVED</span>
                            </div>
                            <button class="view-btn">VIEW</button>
                        </div>
                        <div class="grid-item-slot">
                            <span class="slot-id">Slot #0109</span>
                            <span class="slot-remain">Remaining: 0</span>
                            <div class="lables">
                                <span class="label-closed">CLOSED</span>
                            </div>
                            <button class="view-btn">VIEW</button>
                        </div>
                        <div class="grid-item-time">
                            <span class="time-start">13.00</span>
                            <span class="time-end">15.00</span>
                        </div>
                        <div class="grid-item-slot">
                            <span class="slot-id">Slot #0110</span>
                            <span class="slot-remain">Remaining: 0</span>
                            <div class="lables">
                                <span class="label-closed">CLOSED</span>
                                <span class="label-reserved">RESERVED</span>
                            </div>
                            <button class="view-btn">VIEW</button>
                        </div>
                        <div class="grid-item-slot">
                            <span class="slot-id">Slot #0111</span>
                            <span class="slot-remain">Remaining: 5</span>
                            <div class="labels">
                                <span class="label-available">AVAILABLE</span>
                            </div>
                            <button class="view-btn">VIEW</button>
                        </div>
                        <div class="grid-item-slot">
                            <span class="slot-id">Slot #0112</span>
                            <span class="slot-remain">Remaining: 5</span>
                            <div class="labels">
                                <span class="label-available">AVAILABLE</span>
                                <span class="label-reserved">RESERVED</span>
                            </div>
                            <button class="view-btn">VIEW</button>
                        </div>
                        <div class="grid-item-slot">
                            <span class="slot-id">Slot #0113</span>
                            <span class="slot-remain">Remaining: 0</span>
                            <div class="lables">
                                <span class="label-closed">CLOSED</span>
                                <span class="label-reserved">RESERVED</span>
                            </div>
                            <button class="view-btn">VIEW</button>
                        </div>
                        <div class="grid-item-slot">
                            <span class="slot-id">Slot #0114</span>
                            <span class="slot-remain">Remaining: 4</span>
                            <div class="labels">
                                <span class="label-available">AVAILABLE</span>
                                <span class="label-reserved">RESERVED</span>
                            </div>
                            <button class="view-btn">VIEW</button>
                        </div>
                        <div class="grid-item-slot">
                            <span class="slot-id">Slot #0115</span>
                            <span class="slot-remain">Remaining: 0</span>
                            <div class="lables">
                                <span class="label-closed">CLOSED</span>
                                <span class="label-reserved">RESERVED</span>
                            </div>
                            <button class="view-btn">VIEW</button>
                        </div>
                        <div class="grid-item-slot">
                            <span class="slot-id">Slot #0116</span>
                            <span class="slot-remain">Remaining: 0</span>
                            <div class="lables">
                                <span class="label-closed">CLOSED</span>
                            </div>
                            <button class="view-btn">VIEW</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-l-12 col-m-12 col-s-12 card2">
                <div class="main-grid-container-01 col-l-12">
                    <div class="grid-container-01 col-l-12">
                        <div></div>
                        <div class="grid-item-day">
                            <span class="day">MONDAY</span>
                            <span class="date">25.05.2021</span>
                        </div>
                        <div class="grid-item-day">
                            <span class="day">TUESDAY</span>
                            <span class="date">26.05.2021</span>
                        </div>
                        <div class="grid-item-day">
                            <span class="day">WEDNESDAY</span>
                            <span class="date">27.05.2021</span>
                        </div>
                        <div class="grid-item-day">
                            <span class="day">THURSDAY</span>
                            <span class="date">28.05.2021</span>
                        </div>
                        <div class="grid-item-day">
                            <span class="day">FRIDAY</span>
                            <span class="date">29.05.2021</span>
                        </div>
                        <div class="grid-item-day">
                            <span class="day">SATURDAY</span>
                            <span class="date">30.05.2021</span>
                        </div>
                        <div class="grid-item-day">
                            <span class="day">SUNDAY</span>
                            <span class="date">31.05.2021</span>
                        </div>
                    </div>
                    <div class="grid-container-02">
                        <div class="grid-item-time">
                            <span class="time-start">9.00</span>
                            <span class="time-end">12.00</span>
                        </div>

                        <div class="grid-item-slot success">
                            <span class="slot-id">Slot #0103</span>
                            <span class="slot-remain">Remaining: 0</span>
                            <div class="lables">
                                <span class="label-closed">CLOSED</span>
                            </div>
                            <button class="view-btn">VIEW</button>
                        </div>
                        <div class="grid-item-slot">
                            <span class="slot-id">Slot #0104</span>
                            <span class="slot-remain">Remaining: 3</span>
                            <div class="labels">
                                <span class="label-available">AVAILABLE</span>
                                <span class="label-reserved">RESERVED</span>
                            </div>
                            <button class="view-btn">VIEW</button>
                        </div>
                        <div class="grid-item-slot danger">
                            <span class="slot-id">Slot #0105</span>
                            <span class="slot-remain">Remaining: 0</span>
                            <div class="lables">
                                <span class="label-closed">CLOSED</span>
                            </div>
                            <button class="view-btn">VIEW</button>
                        </div>
                        <div class="grid-item-slot disabled">
                            <span class="slot-id">Slot #0106</span>
                            <span class="slot-remain">Remaining: 5</span>
                            <div class="labels">
                                <span class="label-available">AVAILABLE</span>
                                <span class="label-reserved">RESERVED</span>
                            </div>
                            <button class="view-btn">VIEW</button>
                        </div>
                        <div class="grid-item-slot">
                            <span class="slot-id">Slot #0107</span>
                            <span class="slot-remain">Remaining: 0</span>
                            <div class="lables">
                                <span class="label-closed">CLOSED</span>
                            </div>
                            <button class="view-btn">VIEW</button>
                        </div>
                        <div class="grid-item-slot pending">
                            <span class="slot-id">Slot #0108</span>
                            <span class="slot-remain">Remaining: 2</span>
                            <div class="labels">
                                <span class="label-available">AVAILABLE</span>
                                <span class="label-reserved">RESERVED</span>
                            </div>
                            <button class="view-btn">VIEW</button>
                        </div>
                        <div class="grid-item-slot">
                            <span class="slot-id">Slot #0109</span>
                            <span class="slot-remain">Remaining: 0</span>
                            <div class="lables">
                                <span class="label-closed">CLOSED</span>
                            </div>
                            <button class="view-btn">VIEW</button>
                        </div>
                        <div class="grid-item-time">
                            <span class="time-start">13.00</span>
                            <span class="time-end">15.00</span>
                        </div>
                        <div class="grid-item-slot">
                            <span class="slot-id">Slot #0110</span>
                            <span class="slot-remain">Remaining: 0</span>
                            <div class="lables">
                                <span class="label-closed">CLOSED</span>
                                <span class="label-reserved">RESERVED</span>
                            </div>
                            <button class="view-btn">VIEW</button>
                        </div>
                        <div class="grid-item-slot">
                            <span class="slot-id">Slot #0111</span>
                            <span class="slot-remain">Remaining: 5</span>
                            <div class="labels">
                                <span class="label-available">AVAILABLE</span>
                            </div>
                            <button class="view-btn">VIEW</button>
                        </div>
                        <div class="grid-item-slot">
                            <span class="slot-id">Slot #0112</span>
                            <span class="slot-remain">Remaining: 5</span>
                            <div class="labels">
                                <span class="label-available">AVAILABLE</span>
                                <span class="label-reserved">RESERVED</span>
                            </div>
                            <button class="view-btn">VIEW</button>
                        </div>
                        <div class="grid-item-slot">
                            <span class="slot-id">Slot #0113</span>
                            <span class="slot-remain">Remaining: 0</span>
                            <div class="lables">
                                <span class="label-closed">CLOSED</span>
                                <span class="label-reserved">RESERVED</span>
                            </div>
                            <button class="view-btn">VIEW</button>
                        </div>
                        <div class="grid-item-slot">
                            <span class="slot-id">Slot #0114</span>
                            <span class="slot-remain">Remaining: 4</span>
                            <div class="labels">
                                <span class="label-available">AVAILABLE</span>
                                <span class="label-reserved">RESERVED</span>
                            </div>
                            <button class="view-btn">VIEW</button>
                        </div>
                        <div class="grid-item-slot">
                            <span class="slot-id">Slot #0115</span>
                            <span class="slot-remain">Remaining: 0</span>
                            <div class="lables">
                                <span class="label-closed">CLOSED</span>
                                <span class="label-reserved">RESERVED</span>
                            </div>
                            <button class="view-btn">VIEW</button>
                        </div>
                        <div class="grid-item-slot">
                            <span class="slot-id">Slot #0116</span>
                            <span class="slot-remain">Remaining: 0</span>
                            <div class="lables">
                                <span class="label-closed">CLOSED</span>
                            </div>
                            <button class="view-btn">VIEW</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-l-12 col-m-12 col-s-12 padding1">
                <span class="button1">
                    <a href="/mod/FixSchedule">
                        Set Schedule
                    </a>
                </span>
            </div>

        </div>
    </div>
<!------------------------------------------------------------------------------------------------------------------->
    <div class="row margin-top-2">
        <div class="col-l-12 col-m-12 col-s-12 upper-box card-content ">
            <div class="col-l-12 col-m-12 col-s-12 ">
                <div class="col-l-11 col-m-12 col-s-12 padding-top">
                    <span class="head-text">Upcoming Schedule</span>
                </div>

                <div class="col-l-1 col-m-12 col-s-12 padding-top">
                    <label class="switch">
                        <input type="checkbox" >
                        <span class="slider round"></span>
                    </label>
                </div>
            </div>

            <div class="col-l-12 col-m-12 col-s-13 ">
                <span class="duration">15/11/2021 TO 28/11/2021</span>
            </div>

            <div class="col-l-12 col-m-12 col-s-12 card2">
                <div class="main-grid-container-01 col-l-12">
                    <div class="grid-container-01 col-l-12">
                        <div></div>
                        <div class="grid-item-day">
                            <span class="day">MONDAY</span>
                            <span class="date">25.05.2021</span>
                        </div>
                        <div class="grid-item-day">
                            <span class="day">TUESDAY</span>
                            <span class="date">26.05.2021</span>
                        </div>
                        <div class="grid-item-day">
                            <span class="day">WEDNESDAY</span>
                            <span class="date">27.05.2021</span>
                        </div>
                        <div class="grid-item-day">
                            <span class="day">THURSDAY</span>
                            <span class="date">28.05.2021</span>
                        </div>
                        <div class="grid-item-day">
                            <span class="day">FRIDAY</span>
                            <span class="date">29.05.2021</span>
                        </div>
                        <div class="grid-item-day">
                            <span class="day">SATURDAY</span>
                            <span class="date">30.05.2021</span>
                        </div>
                        <div class="grid-item-day">
                            <span class="day">SUNDAY</span>
                            <span class="date">31.05.2021</span>
                        </div>
                    </div>
                    <div class="grid-container-02">
                        <div class="grid-item-time">
                            <span class="time-start">9.00</span>
                            <span class="time-end">12.00</span>
                        </div>

                        <div class="grid-item-slot success">
                            <span class="slot-id">Slot #0103</span>
                            <span class="slot-remain">Remaining: 0</span>
                            <div class="lables">
                                <span class="label-closed">CLOSED</span>
                            </div>
                            <button class="view-btn">VIEW</button>
                        </div>
                        <div class="grid-item-slot">
                            <span class="slot-id">Slot #0104</span>
                            <span class="slot-remain">Remaining: 3</span>
                            <div class="labels">
                                <span class="label-available">AVAILABLE</span>
                                <span class="label-reserved">RESERVED</span>
                            </div>
                            <button class="view-btn">VIEW</button>
                        </div>
                        <div class="grid-item-slot danger">
                            <span class="slot-id">Slot #0105</span>
                            <span class="slot-remain">Remaining: 0</span>
                            <div class="lables">
                                <span class="label-closed">CLOSED</span>
                            </div>
                            <button class="view-btn">VIEW</button>
                        </div>
                        <div class="grid-item-slot disabled">
                            <span class="slot-id">Slot #0106</span>
                            <span class="slot-remain">Remaining: 5</span>
                            <div class="labels">
                                <span class="label-available">AVAILABLE</span>
                                <span class="label-reserved">RESERVED</span>
                            </div>
                            <button class="view-btn">VIEW</button>
                        </div>
                        <div class="grid-item-slot">
                            <span class="slot-id">Slot #0107</span>
                            <span class="slot-remain">Remaining: 0</span>
                            <div class="lables">
                                <span class="label-closed">CLOSED</span>
                            </div>
                            <button class="view-btn">VIEW</button>
                        </div>
                        <div class="grid-item-slot pending">
                            <span class="slot-id">Slot #0108</span>
                            <span class="slot-remain">Remaining: 2</span>
                            <div class="labels">
                                <span class="label-available">AVAILABLE</span>
                                <span class="label-reserved">RESERVED</span>
                            </div>
                            <button class="view-btn">VIEW</button>
                        </div>
                        <div class="grid-item-slot">
                            <span class="slot-id">Slot #0109</span>
                            <span class="slot-remain">Remaining: 0</span>
                            <div class="lables">
                                <span class="label-closed">CLOSED</span>
                            </div>
                            <button class="view-btn">VIEW</button>
                        </div>
                        <div class="grid-item-time">
                            <span class="time-start">13.00</span>
                            <span class="time-end">15.00</span>
                        </div>
                        <div class="grid-item-slot">
                            <span class="slot-id">Slot #0110</span>
                            <span class="slot-remain">Remaining: 0</span>
                            <div class="lables">
                                <span class="label-closed">CLOSED</span>
                                <span class="label-reserved">RESERVED</span>
                            </div>
                            <button class="view-btn">VIEW</button>
                        </div>
                        <div class="grid-item-slot">
                            <span class="slot-id">Slot #0111</span>
                            <span class="slot-remain">Remaining: 5</span>
                            <div class="labels">
                                <span class="label-available">AVAILABLE</span>
                            </div>
                            <button class="view-btn">VIEW</button>
                        </div>
                        <div class="grid-item-slot">
                            <span class="slot-id">Slot #0112</span>
                            <span class="slot-remain">Remaining: 5</span>
                            <div class="labels">
                                <span class="label-available">AVAILABLE</span>
                                <span class="label-reserved">RESERVED</span>
                            </div>
                            <button class="view-btn">VIEW</button>
                        </div>
                        <div class="grid-item-slot">
                            <span class="slot-id">Slot #0113</span>
                            <span class="slot-remain">Remaining: 0</span>
                            <div class="lables">
                                <span class="label-closed">CLOSED</span>
                                <span class="label-reserved">RESERVED</span>
                            </div>
                            <button class="view-btn">VIEW</button>
                        </div>
                        <div class="grid-item-slot">
                            <span class="slot-id">Slot #0114</span>
                            <span class="slot-remain">Remaining: 4</span>
                            <div class="labels">
                                <span class="label-available">AVAILABLE</span>
                                <span class="label-reserved">RESERVED</span>
                            </div>
                            <button class="view-btn">VIEW</button>
                        </div>
                        <div class="grid-item-slot">
                            <span class="slot-id">Slot #0115</span>
                            <span class="slot-remain">Remaining: 0</span>
                            <div class="lables">
                                <span class="label-closed">CLOSED</span>
                                <span class="label-reserved">RESERVED</span>
                            </div>
                            <button class="view-btn">VIEW</button>
                        </div>
                        <div class="grid-item-slot">
                            <span class="slot-id">Slot #0116</span>
                            <span class="slot-remain">Remaining: 0</span>
                            <div class="lables">
                                <span class="label-closed">CLOSED</span>
                            </div>
                            <button class="view-btn">VIEW</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-l-12 col-m-12 col-s-12 card2">
                <div class="main-grid-container-01 col-l-12">
                    <div class="grid-container-01 col-l-12">
                        <div></div>
                        <div class="grid-item-day">
                            <span class="day">MONDAY</span>
                            <span class="date">25.05.2021</span>
                        </div>
                        <div class="grid-item-day">
                            <span class="day">TUESDAY</span>
                            <span class="date">26.05.2021</span>
                        </div>
                        <div class="grid-item-day">
                            <span class="day">WEDNESDAY</span>
                            <span class="date">27.05.2021</span>
                        </div>
                        <div class="grid-item-day">
                            <span class="day">THURSDAY</span>
                            <span class="date">28.05.2021</span>
                        </div>
                        <div class="grid-item-day">
                            <span class="day">FRIDAY</span>
                            <span class="date">29.05.2021</span>
                        </div>
                        <div class="grid-item-day">
                            <span class="day">SATURDAY</span>
                            <span class="date">30.05.2021</span>
                        </div>
                        <div class="grid-item-day">
                            <span class="day">SUNDAY</span>
                            <span class="date">31.05.2021</span>
                        </div>
                    </div>
                    <div class="grid-container-02">
                        <div class="grid-item-time">
                            <span class="time-start">9.00</span>
                            <span class="time-end">12.00</span>
                        </div>

                        <div class="grid-item-slot success">
                            <span class="slot-id">Slot #0103</span>
                            <span class="slot-remain">Remaining: 0</span>
                            <div class="lables">
                                <span class="label-closed">CLOSED</span>
                            </div>
                            <button class="view-btn">VIEW</button>
                        </div>
                        <div class="grid-item-slot">
                            <span class="slot-id">Slot #0104</span>
                            <span class="slot-remain">Remaining: 3</span>
                            <div class="labels">
                                <span class="label-available">AVAILABLE</span>
                                <span class="label-reserved">RESERVED</span>
                            </div>
                            <button class="view-btn">VIEW</button>
                        </div>
                        <div class="grid-item-slot danger">
                            <span class="slot-id">Slot #0105</span>
                            <span class="slot-remain">Remaining: 0</span>
                            <div class="lables">
                                <span class="label-closed">CLOSED</span>
                            </div>
                            <button class="view-btn">VIEW</button>
                        </div>
                        <div class="grid-item-slot disabled">
                            <span class="slot-id">Slot #0106</span>
                            <span class="slot-remain">Remaining: 5</span>
                            <div class="labels">
                                <span class="label-available">AVAILABLE</span>
                                <span class="label-reserved">RESERVED</span>
                            </div>
                            <button class="view-btn">VIEW</button>
                        </div>
                        <div class="grid-item-slot">
                            <span class="slot-id">Slot #0107</span>
                            <span class="slot-remain">Remaining: 0</span>
                            <div class="lables">
                                <span class="label-closed">CLOSED</span>
                            </div>
                            <button class="view-btn">VIEW</button>
                        </div>
                        <div class="grid-item-slot pending">
                            <span class="slot-id">Slot #0108</span>
                            <span class="slot-remain">Remaining: 2</span>
                            <div class="labels">
                                <span class="label-available">AVAILABLE</span>
                                <span class="label-reserved">RESERVED</span>
                            </div>
                            <button class="view-btn">VIEW</button>
                        </div>
                        <div class="grid-item-slot">
                            <span class="slot-id">Slot #0109</span>
                            <span class="slot-remain">Remaining: 0</span>
                            <div class="lables">
                                <span class="label-closed">CLOSED</span>
                            </div>
                            <button class="view-btn">VIEW</button>
                        </div>
                        <div class="grid-item-time">
                            <span class="time-start">13.00</span>
                            <span class="time-end">15.00</span>
                        </div>
                        <div class="grid-item-slot">
                            <span class="slot-id">Slot #0110</span>
                            <span class="slot-remain">Remaining: 0</span>
                            <div class="lables">
                                <span class="label-closed">CLOSED</span>
                                <span class="label-reserved">RESERVED</span>
                            </div>
                            <button class="view-btn">VIEW</button>
                        </div>
                        <div class="grid-item-slot">
                            <span class="slot-id">Slot #0111</span>
                            <span class="slot-remain">Remaining: 5</span>
                            <div class="labels">
                                <span class="label-available">AVAILABLE</span>
                            </div>
                            <button class="view-btn">VIEW</button>
                        </div>
                        <div class="grid-item-slot">
                            <span class="slot-id">Slot #0112</span>
                            <span class="slot-remain">Remaining: 5</span>
                            <div class="labels">
                                <span class="label-available">AVAILABLE</span>
                                <span class="label-reserved">RESERVED</span>
                            </div>
                            <button class="view-btn">VIEW</button>
                        </div>
                        <div class="grid-item-slot">
                            <span class="slot-id">Slot #0113</span>
                            <span class="slot-remain">Remaining: 0</span>
                            <div class="lables">
                                <span class="label-closed">CLOSED</span>
                                <span class="label-reserved">RESERVED</span>
                            </div>
                            <button class="view-btn">VIEW</button>
                        </div>
                        <div class="grid-item-slot">
                            <span class="slot-id">Slot #0114</span>
                            <span class="slot-remain">Remaining: 4</span>
                            <div class="labels">
                                <span class="label-available">AVAILABLE</span>
                                <span class="label-reserved">RESERVED</span>
                            </div>
                            <button class="view-btn">VIEW</button>
                        </div>
                        <div class="grid-item-slot">
                            <span class="slot-id">Slot #0115</span>
                            <span class="slot-remain">Remaining: 0</span>
                            <div class="lables">
                                <span class="label-closed">CLOSED</span>
                                <span class="label-reserved">RESERVED</span>
                            </div>
                            <button class="view-btn">VIEW</button>
                        </div>
                        <div class="grid-item-slot">
                            <span class="slot-id">Slot #0116</span>
                            <span class="slot-remain">Remaining: 0</span>
                            <div class="lables">
                                <span class="label-closed">CLOSED</span>
                            </div>
                            <button class="view-btn">VIEW</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-l-12 col-m-12 col-s-12 padding1">
                <span class="button1">
                    <a href="/mod/FixSchedule">
                        Set Schedule
                    </a>
                </span>
            </div>

        </div>
    </div>
<!--        <div class="col-l-4 col-m-12 col-s-12 primary-card flex-gap1 card-content">-->
<!--            <div class="col-l-12 col-m-12 col-s-12 padding1">-->
<!--                <span class="head-text">Timeslot Details</span>-->
<!--            </div>-->
<!---->
<!--            <div class="col-l-12 col-m-12 col-s-12 card2">-->
<!--                <form action="" class="form1">-->
<!--                    <div class="col-l-12 col-m-12 col-s-12 flex-container3 ">-->
<!--                        <div class="col-l-6 col-m-6 col-s-6">-->
<!--                            <span class="text-style3">Date:</span>-->
<!--                        </div>-->
<!--                        <div class="col-l-6 col-m-6 col-s-6">-->
<!--                            <sapn class="text-style3"> 11/10/2021</sapn>-->
<!--                        </div>-->
<!--                    </div>-->
<!---->
<!--                    <div class="col-l-12 col-m-12 col-s-12 flex-container3 padding-top">-->
<!--                        <div class="col-l-6 col-m-6 col-s-6">-->
<!--                            <span class="text-style3">Timeslot ID:</span>-->
<!--                        </div>-->
<!--                        <div class="col-l-6 col-m-6 col-s-6">-->
<!--                            <sapn class="text-style3"> 1121</sapn>-->
<!--                        </div>-->
<!--                    </div>-->
<!---->
<!--                    <div class="col-l-12 col-m-12 col-s-12 padding-top">-->
<!--                        <label for="name" class="text-style3">Number of slots:</label>-->
<!--                    </div>-->
<!--                    <div class="col-l-12 col-m-12 col-s-12 ">-->
<!--                        <input type="text" id="fname" name="fname" value="">-->
<!--                    </div>-->
<!---->
<!--                    <div class="col-l-12 col-m-12 col-s-12 padding-top">-->
<!--                        <input type="submit" value="Update" class="button2">-->
<!--                    </div>-->
<!---->
<!--                </form>-->
<!--            </div>-->
<!--        </div>-->
    </div>
    </div>

<!--    -->
    </div>
    <div class="row row-style flex-container">-->
        <!--        <div class="col-l-12 col-m-12 col-s-12 primary-card flex-gap1">-->
        <!--            <div class="col-l-12 col-m-12 col-s-12 flex-container2 padding1">-->
        <!--                <span class="head-text">Appointments</span>-->
        <!--            </div>-->
        <!---->
        <!--            <div class="col-l-12 col-m-12 col-s-12 table-overflow">-->
        <!--                <table>-->
        <!--                    <tr>-->
        <!--                        <th>Name</th>-->
        <!--                        <th>Email</th>-->
        <!--                        <th>Contact</th>-->
        <!--                        <th>Date</th>-->
        <!--                        <th>Timeslot</th>-->
        <!--                        <th>State</th>-->
        <!--                    </tr>-->
        <!--                    <tr>-->
        <!--                        <td>Peter Griffin</td>-->
        <!--                        <td>Griffin@gmail.com</td>-->
        <!--                        <td>077229667</td>-->
        <!--                        <td>07/09/2021</td>-->
        <!--                        <td>9.00 AM - 10.00 AM </td>-->
        <!--                        <td>Active</td>-->
        <!--                    </tr>-->
        <!---->
        <!--                    <tr>-->
        <!--                        <td>Peter Griffin</td>-->
        <!--                        <td>Griffin@gmail.com</td>-->
        <!--                        <td>077229667</td>-->
        <!--                        <td>07/09/2021</td>-->
        <!--                        <td>9.00 AM - 10.00 AM </td>-->
        <!--                        <td>Active</td>-->
        <!--                    </tr>-->
        <!--                    <tr>-->
        <!--                        <td>Peter Griffin</td>-->
        <!--                        <td>Griffin@gmail.com</td>-->
        <!--                        <td>077229667</td>-->
        <!--                        <td>07/09/2021</td>-->
        <!--                        <td>9.00 AM - 10.00 AM </td>-->
        <!--                        <td>Active</td>-->
        <!--                    </tr>-->
        <!--                    <tr>-->
        <!--                        <td>Peter Griffin</td>-->
        <!--                        <td>Griffin@gmail.com</td>-->
        <!--                        <td>077229667</td>-->
        <!--                        <td>07/09/2021</td>-->
        <!--                        <td>9.00 AM - 10.00 AM </td>-->
        <!--                        <td>Active</td>-->
        <!--                    </tr>-->
        <!--                </table>-->
        <!--            </div>-->
        <!--        </div>-->
        <!--    </div>
        </main>

        <script src="http://localhost/assets/js/admin/calendar.js" ></script>

        </body>
        </html>
