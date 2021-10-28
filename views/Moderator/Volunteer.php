<?php
?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Volunteer events</title>
    <link rel="stylesheet" href="http://localhost/assets/css/main.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,200;0,300;0,400;0,500;0,700;1,200&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
          rel="stylesheet"/>
<!---->
<!--    <style>-->
<!--        .sub-button3{-->
<!--            display: none;-->
<!---->
<!--        }-->
<!---->
<!--        .sub-button3 a{-->
<!--            display: block;-->
<!---->
<!--        }-->
<!---->
<!--        .show {display: block;}-->
<!---->
<!--    </style>-->

</head>
<body>
<main>

    <div class="row flex-container ">
        <div class="col-l-12 col-m-12 col-s-12 flex-gap">
            <span class="head-text2">Volunteer Events</span>
        </div>
    </div>

    <div class="row flex-container">
        <div class="col-l-12 col-m-12 col-s-12 flex-gap1 primary-card card-content">
            <div class="col-l-12 col-m-12 col-s-12 padding1">
                <div class="col-l-6 col-m-12 col-s-12 "> <span class="head-text">Upcoming events</span> </div>
                <div class="col-l-6 col-m-12 col-s-12">
                    <button class="add-text" id="AddEvent" onclick="AddEvent()">+Add Event</button>
                </div>
            </div>

            <div class="col-l-12 col-m-12 col-s-12 card-content">
                <div class="event-card">
                    <div class="col-l-12 col-m-12 col-s-12 flex-container3">
                        <div class="col-l-8 col-m-8 col-s-8"> <span class="text-style4">Annual Workshop</span></div>
                        <div class="col-l-4 col-m-8 col-s-8">
                            <div class="" onclick="dropDownButton()">
                                <span class="add-text"><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M12 8c1.1 0 2-.9 2-2s-.9-2-2-2-2 .9-2 2 .9 2 2 2zm0 2c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm0 6c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2z"/></svg></span>
                                <div class="sub-button3" id="dropdown">
                                    <a href="#" class="button5" id="UpdateEvent" onclick="UpdateEvent()">Update Event</a>
                                    <a href="#" class="button5" id="selectUsers" onclick="selectUsers()">Select Volunteers</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-l-12 col-m-12 col-s-12 flex-container padding-top-1">

                        <div class="col-l-3 col-m-12 col-s-12">
                            <div class="col-l-2 col-m-2 col-s-2"><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zM7 9c0-2.76 2.24-5 5-5s5 2.24 5 5c0 2.88-2.88 7.19-5 9.88C9.92 16.21 7 11.85 7 9z"/><circle cx="12" cy="9" r="2.5"/></svg>
                            </div>
                            <div class="col-l-10 col-m-10 col-s-10 "><span class="custom-text">Reid avenue, Colombo</span></div>
                        </div>

                        <div class="col-l-3 col-m-12 col-s-12">
                            <div class="col-l-2 col-m-2 col-s-2"><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M7 11h2v2H7v-2zm14-5v14c0 1.1-.9 2-2 2H5c-1.11 0-2-.9-2-2l.01-14c0-1.1.88-2 1.99-2h1V2h2v2h8V2h2v2h1c1.1 0 2 .9 2 2zM5 8h14V6H5v2zm14 12V10H5v10h14zm-4-7h2v-2h-2v2zm-4 0h2v-2h-2v2z"/></svg>
                            </div>
                            <div class="col-l-10 col-m-10 col-s-10"><span class="custom-text">14th August 2021</span></div>
                        </div>

                        <div class="col-l-3 col-m-12 col-s-12">
                            <div class="col-l-2 col-m-2 col-s-2"><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M11.99 2C6.47 2 2 6.48 2 12s4.47 10 9.99 10C17.52 22 22 17.52 22 12S17.52 2 11.99 2zM12 20c-4.42 0-8-3.58-8-8s3.58-8 8-8 8 3.58 8 8-3.58 8-8 8zm.5-13H11v6l5.25 3.15.75-1.23-4.5-2.67z"/></svg>
                            </div>
                            <div class="col-l-10 col-m-10 col-s-10 "><span class="custom-text">12.00 p.m - 4.00 p.m.</span></div>
                        </div>

                        <div class="col-l-3 col-m-12 col-s-12">
                            <div class="col-l-2 col-m-2 col-s-2"><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M12 2l-5.5 9h11L12 2zm0 3.84L13.93 9h-3.87L12 5.84zM17.5 13c-2.49 0-4.5 2.01-4.5 4.5s2.01 4.5 4.5 4.5 4.5-2.01 4.5-4.5-2.01-4.5-4.5-4.5zm0 7c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5zM3 21.5h8v-8H3v8zm2-6h4v4H5v-4z"/></svg>
                            </div>
                            <div class="col-l-10 col-m-10 col-s-10"><span class="custom-text">Open event</span></div>
                        </div>
                    </div>
                    <div class="col-l-12 col-m-12 col-s-12 padding-top-1">
                        <p class="custom-text">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Porro ipsam necessitatibus dolore odio est nulla perspiciatis possimus eum et magni laudantium, unde officiis consequuntur, illum totam optio. Eveniet, autem. Impedit corrupti, nisi dolore eius natus, animi in rerum ex adipisci pariatur delectus ipsa laudantium cumque, consectetur voluptatibus necessitatibus ipsum architecto?
                        </p>
                    </div>
                </div>

                <div class="event-card">
                    <div class="col-l-12 col-m-12 col-s-12 flex-container3">
                        <div class="col-l-8 col-m-8 col-s-8"> <span class="text-style4">Annual Meeting</span></div>
                        <div class="col-l-4 col-m-8 col-s-8">
                            <div class="">
                                <span class="add-text"><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M12 8c1.1 0 2-.9 2-2s-.9-2-2-2-2 .9-2 2 .9 2 2 2zm0 2c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm0 6c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2z"/></svg></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-l-12 col-m-12 col-s-12 flex-container padding-top-1">

                        <div class="col-l-3 col-m-12 col-s-12">
                            <div class="col-l-2 col-m-2 col-s-2"><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zM7 9c0-2.76 2.24-5 5-5s5 2.24 5 5c0 2.88-2.88 7.19-5 9.88C9.92 16.21 7 11.85 7 9z"/><circle cx="12" cy="9" r="2.5"/></svg>
                            </div>
                            <div class="col-l-10 col-m-10 col-s-10 "><span class="custom-text">Head Office, Sri lanka, Sumithrayo</span></div>
                        </div>

                        <div class="col-l-3 col-m-12 col-s-12">
                            <div class="col-l-2 col-m-2 col-s-2"><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M7 11h2v2H7v-2zm14-5v14c0 1.1-.9 2-2 2H5c-1.11 0-2-.9-2-2l.01-14c0-1.1.88-2 1.99-2h1V2h2v2h8V2h2v2h1c1.1 0 2 .9 2 2zM5 8h14V6H5v2zm14 12V10H5v10h14zm-4-7h2v-2h-2v2zm-4 0h2v-2h-2v2z"/></svg>
                            </div>
                            <div class="col-l-10 col-m-10 col-s-10"><span class="custom-text">14th September 2021</span></div>
                        </div>

                        <div class="col-l-3 col-m-12 col-s-12">
                            <div class="col-l-2 col-m-2 col-s-2"><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M11.99 2C6.47 2 2 6.48 2 12s4.47 10 9.99 10C17.52 22 22 17.52 22 12S17.52 2 11.99 2zM12 20c-4.42 0-8-3.58-8-8s3.58-8 8-8 8 3.58 8 8-3.58 8-8 8zm.5-13H11v6l5.25 3.15.75-1.23-4.5-2.67z"/></svg>
                            </div>
                            <div class="col-l-10 col-m-10 col-s-10 "><span class="custom-text">4.00 p.m - 6.00 p.m.</span></div>
                        </div>

                        <div class="col-l-3 col-m-12 col-s-12">
                            <div class="col-l-2 col-m-2 col-s-2"><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M12 2l-5.5 9h11L12 2zm0 3.84L13.93 9h-3.87L12 5.84zM17.5 13c-2.49 0-4.5 2.01-4.5 4.5s2.01 4.5 4.5 4.5 4.5-2.01 4.5-4.5-2.01-4.5-4.5-4.5zm0 7c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5zM3 21.5h8v-8H3v8zm2-6h4v4H5v-4z"/></svg>
                            </div>
                            <div class="col-l-10 col-m-10 col-s-10"><span class="custom-text">Open event</span></div>
                        </div>
                    </div>
                    <div class="col-l-12 col-m-12 col-s-12 padding-top-1">
                        <p class="custom-text">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Porro ipsam necessitatibus dolore odio est nulla perspiciatis possimus eum et magni laudantium, unde officiis consequuntur, illum totam optio. Eveniet, autem. Impedit corrupti, nisi dolore eius natus, animi in rerum ex adipisci pariatur delectus ipsa laudantium cumque, consectetur voluptatibus necessitatibus ipsum architecto?
                        </p>
                    </div>
                </div>


                <div class="event-card">
                    <div class="col-l-12 col-m-12 col-s-12 flex-container3">
                        <div class="col-l-8 col-m-8 col-s-8"> <span class="text-style4">Awareness Program 1</span></div>
                        <div class="col-l-4 col-m-8 col-s-8">
                            <div class="">
                                <span class="add-text"><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M12 8c1.1 0 2-.9 2-2s-.9-2-2-2-2 .9-2 2 .9 2 2 2zm0 2c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm0 6c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2z"/></svg></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-l-12 col-m-12 col-s-12 flex-container padding-top-1">

                        <div class="col-l-3 col-m-12 col-s-12">
                            <div class="col-l-2 col-m-2 col-s-2"><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zM7 9c0-2.76 2.24-5 5-5s5 2.24 5 5c0 2.88-2.88 7.19-5 9.88C9.92 16.21 7 11.85 7 9z"/><circle cx="12" cy="9" r="2.5"/></svg>
                            </div>
                            <div class="col-l-10 col-m-10 col-s-10 "><span class="custom-text">Reid avenue, Colombo</span></div>
                        </div>

                        <div class="col-l-3 col-m-12 col-s-12">
                            <div class="col-l-2 col-m-2 col-s-2"><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M7 11h2v2H7v-2zm14-5v14c0 1.1-.9 2-2 2H5c-1.11 0-2-.9-2-2l.01-14c0-1.1.88-2 1.99-2h1V2h2v2h8V2h2v2h1c1.1 0 2 .9 2 2zM5 8h14V6H5v2zm14 12V10H5v10h14zm-4-7h2v-2h-2v2zm-4 0h2v-2h-2v2z"/></svg>
                            </div>
                            <div class="col-l-10 col-m-10 col-s-10"><span class="custom-text">20th November 2021</span></div>
                        </div>

                        <div class="col-l-3 col-m-12 col-s-12">
                            <div class="col-l-2 col-m-2 col-s-2"><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M11.99 2C6.47 2 2 6.48 2 12s4.47 10 9.99 10C17.52 22 22 17.52 22 12S17.52 2 11.99 2zM12 20c-4.42 0-8-3.58-8-8s3.58-8 8-8 8 3.58 8 8-3.58 8-8 8zm.5-13H11v6l5.25 3.15.75-1.23-4.5-2.67z"/></svg>
                            </div>
                            <div class="col-l-10 col-m-10 col-s-10 "><span class="custom-text">3.00 p.m - 5.00 p.m.</span></div>
                        </div>

                        <div class="col-l-3 col-m-12 col-s-12">
                            <div class="col-l-2 col-m-2 col-s-2"><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M12 2l-5.5 9h11L12 2zm0 3.84L13.93 9h-3.87L12 5.84zM17.5 13c-2.49 0-4.5 2.01-4.5 4.5s2.01 4.5 4.5 4.5 4.5-2.01 4.5-4.5-2.01-4.5-4.5-4.5zm0 7c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5zM3 21.5h8v-8H3v8zm2-6h4v4H5v-4z"/></svg>
                            </div>
                            <div class="col-l-10 col-m-10 col-s-10"><span class="custom-text">Exclusive event</span></div>
                        </div>
                    </div>
                    <div class="col-l-12 col-m-12 col-s-12 padding-top-1">
                        <p class="custom-text">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Porro ipsam necessitatibus dolore odio est nulla perspiciatis possimus eum et magni laudantium, unde officiis consequuntur, illum totam optio. Eveniet, autem. Impedit corrupti, nisi dolore eius natus, animi in rerum ex adipisci pariatur delectus ipsa laudantium cumque, consectetur voluptatibus necessitatibus ipsum architecto?
                        </p>
                    </div>
                </div>

            <!-- POP-UP Create volunteer event---------------------------------------------------------------------------- -->
            <div class="modal" id="modal-box">
                <div class="modal-content">

                    <div class="modal-header padding1">
                        <div class="head-text3">
                            <span class="close" id="close">&times;</span>
                        </div>

                        <div class="head-text3 padding-top">
                            <span>Add Event</span>
                        </div>
                    </div>

                    <div class="modal-body">
                        <div class=" card-content">
                            <form action="" class="form1">
                                <div class="col-l-12 col-m-12 col-s-12 flex-container3 ">
                                    <div class="col-l-4 col-m-4 col-s-4">
                                        <label for="reportType" class="text-style3">Event Type</label>
                                    </div>
                                    <div class="col-l-8 col-m-8 col-s-8">
                                        <select name="reportType" id="reportType" class="select1">
                                            <option value="vol" class="custom-font">Open</option>
                                            <option value="don" class="custom-font">Exclusive</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-l-12 col-m-12 col-s-12 padding-top">
                                    <div class="col-l-10 col-m-10 col-s-10 ">
                                        <label for="name" class="text-style3">Event Name:</label>
                                    </div>
                                    <div class="col-l-2 col-m-2 col-s-2">
                                        <div class="tooltip-icon  positionR " data-tooltip="Enter event name. Ex: Annual General meeting"></div>
                                    </div>
                                </div>
                                <div class="col-l-12 col-m-12 col-s-12 ">
                                    <input type="text" id="fname" name="fname" value="">
                                    <span class="required-text">*Required</span>
                                </div>

                                <div class="col-l-12 col-m-12 col-s-12 padding-top">
                                    <div class="col-l-10 col-m-10 col-s-10 ">
                                        <label for="name" class="text-style3">Date:</label>
                                    </div>
                                    <div class="col-l-2 col-m-2 col-s-2">
                                        <div class="tooltip-icon  positionR " data-tooltip="Date of the event"></div>
                                    </div>
                                </div>
                                <div class="col-l-12 col-m-12 col-s-12 ">
                                    <input type="text" id="fname" name="fname" value="">
                                    <span class="required-text">*Required</span>
                                </div>

                                <div class="col-l-12 col-m-12 col-s-12 padding-top">
                                    <div class="col-l-10 col-m-10 col-s-10 ">
                                        <label for="name" class="text-style3">Place:</label>
                                    </div>
                                    <div class="col-l-2 col-m-2 col-s-2">
                                        <div class="tooltip-icon  positionR " data-tooltip="Place of the event"></div>
                                    </div>
                                </div>

                                <div class="col-l-12 col-m-12 col-s-12 ">
                                    <input type="text" id="fname" name="fname" value="">
                                    <span class="required-text">*Required</span>
                                </div>

                                <div class="col-l-12 col-m-12 col-s-12 flex-container padding-top">
                                    <div class="col-l-6 col-m-12 col-s-12 padding-right flex-container2">
                                        <div class="col-l-12 col-m-12 col-s-12">
                                            <div class="col-l-10 col-m-10 col-s-10 ">
                                                <label for="email" class="text-style3">To:</label>
                                            </div>
                                            <div class="col-l-2 col-m-2 col-s-2">
                                                <div class="tooltip-icon  positionR " data-tooltip="Starting time of the event"></div>
                                            </div>
                                        </div>
                                        <div class="col-l-12 col-m-12 col-s-12">
                                            <input type="text" id="email" name="email" value="">
                                            <span class="required-text">*Required</span>
                                        </div>
                                    </div>
                                    <div class="col-l-6 col-m-12 col-s-12 padding-left flex-container2">
                                        <div class="col-l-12 col-m-12 col-s-12">
                                            <div class="col-l-10 col-m-10 col-s-10 ">
                                                <label for="Date" class="text-style3">From:</label>
                                            </div>
                                            <div class="col-l-2 col-m-2 col-s-2">
                                                <div class="tooltip-icon  positionR " data-tooltip="Ending time of the event"></div>
                                            </div>
                                        </div>
                                        <div class="col-l-12 col-m-12 col-s-12">
                                            <input type="text" id="date" name="date" value="">
                                            <span class="required-text">*Required</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-l-12 col-m-12 col-s-12 padding-top">
                                    <label for="name" class="text-style3">Agenda:</label>
                                </div>
                                <div class="col-l-12 col-m-12 col-s-12 ">
                                    <textarea id="" name="" rows="4" cols="50"></textarea>
                                </div>

                                <div class="col-l-12 col-m-12 col-s-12 padding-top">
                                    <input type="submit" value="Submit" class="button2">
                                </div>

                            </form>
                        </div>
                    </div>
                    <div class="modal-footer">
                    </div>
                </div>
            </div>
            <!-- -------------------------------------------------------------------------------------------------------------------------------------------- -->
            <!-- POP-UP Update volunteer event---------------------------------------------------------------------------- -->
            <div class="modal" id="update-modal">
                <div class="modal-content">

                    <div class="modal-header padding1">
                        <div class="head-text3">
                            <span class="close" id="update-close">&times;</span>
                        </div>

                        <div class="head-text3 padding-top">
                            <span>Update Event</span>
                        </div>
                    </div>

                    <div class="modal-body">
                        <div class="card-content">
                            <form action="" class="form1">
                                <div class="col-l-12 col-m-12 col-s-12 flex-container3 ">
                                    <div class="col-l-4 col-m-4 col-s-4">
                                        <label for="reportType" class="text-style3">Event Type</label>
                                    </div>
                                    <div class="col-l-8 col-m-8 col-s-8">
                                        <select name="reportType" id="reportType" class="select1">
                                            <option value="vol">Open</option>
                                            <option value="don">Exclusive</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-l-12 col-m-12 col-s-12 padding-top">
                                    <div class="col-l-10 col-m-10 col-s-10 ">
                                        <label for="name" class="text-style3">Event Name:</label>
                                    </div>
                                    <div class="col-l-2 col-m-2 col-s-2">
                                        <div class="tooltip-icon  positionR " data-tooltip="Enter event name. Ex: Annual General meeting"></div>
                                    </div>
                                </div>
                                <div class="col-l-12 col-m-12 col-s-12 ">
                                    <input type="text" id="fname" name="fname" value="">
                                    <span class="required-text">*Required</span>
                                </div>

                                <div class="col-l-12 col-m-12 col-s-12 padding-top">
                                    <div class="col-l-10 col-m-10 col-s-10 ">
                                        <label for="name" class="text-style3">Date:</label>
                                    </div>
                                    <div class="col-l-2 col-m-2 col-s-2">
                                        <div class="tooltip-icon  positionR " data-tooltip="Date of the event"></div>
                                    </div>
                                </div>
                                <div class="col-l-12 col-m-12 col-s-12 ">
                                    <input type="text" id="fname" name="fname" value="">
                                    <span class="required-text">*Required</span>
                                </div>

                                <div class="col-l-12 col-m-12 col-s-12 padding-top">
                                    <div class="col-l-10 col-m-10 col-s-10 ">
                                        <label for="name" class="text-style3">Place:</label>
                                    </div>
                                    <div class="col-l-2 col-m-2 col-s-2">
                                        <div class="tooltip-icon  positionR " data-tooltip="Place of the event"></div>
                                    </div>
                                </div>

                                <div class="col-l-12 col-m-12 col-s-12 ">
                                    <input type="text" id="fname" name="fname" value="">
                                    <span class="required-text">*Required</span>
                                </div>

                                <div class="col-l-12 col-m-12 col-s-12 flex-container padding-top">
                                    <div class="col-l-6 col-m-12 col-s-12 padding-right flex-container2">
                                        <div class="col-l-12 col-m-12 col-s-12">
                                            <div class="col-l-10 col-m-10 col-s-10 ">
                                                <label for="email" class="text-style3">To:</label>
                                            </div>
                                            <div class="col-l-2 col-m-2 col-s-2">
                                                <div class="tooltip-icon  positionR " data-tooltip="Starting time of the event"></div>
                                            </div>
                                        </div>
                                        <div class="col-l-12 col-m-12 col-s-12">
                                            <input type="text" id="email" name="email" value="">
                                            <span class="required-text">*Required</span>
                                        </div>
                                    </div>
                                    <div class="col-l-6 col-m-12 col-s-12 padding-left flex-container2">
                                        <div class="col-l-12 col-m-12 col-s-12">
                                            <div class="col-l-10 col-m-10 col-s-10 ">
                                                <label for="Date" class="text-style3">From:</label>
                                            </div>
                                            <div class="col-l-2 col-m-2 col-s-2">
                                                <div class="tooltip-icon  positionR " data-tooltip="Ending time of the event"></div>
                                            </div>
                                        </div>
                                        <div class="col-l-12 col-m-12 col-s-12">
                                            <input type="text" id="date" name="date" value="">
                                            <span class="required-text">*Required</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-l-12 col-m-12 col-s-12 padding-top">
                                    <label for="name" class="text-style3">Agenda:</label>
                                </div>
                                <div class="col-l-12 col-m-12 col-s-12 ">
                                    <textarea id="" name="" rows="4" cols="50"></textarea>
                                </div>

                                <div class="col-l-12 col-m-12 col-s-12 padding-top">
                                    <input type="submit" value="Submit" class="button2">
                                </div>

                            </form>
                        </div>
                    </div>
                    <div class="modal-footer">
                    </div>
                </div>
            </div>
            <!-- -------------------------------------------------------------------------------------------------------------------------------------------- -->

            <!-- POP-UP select users--------------------------------------------------------------------------------------------------- -->
            <div class="modal" id="selectUsers-modal">
                <div class="modal-content">

                    <div class="modal-header padding1">
                        <div class="head-text3">
                            <span class="close" id="close-selectUser">&times;</span>
                        </div>

                        <div class="head-text3 padding-top">
                            <span>Requests</span>
                        </div>
                    </div>

                    <div class="modal-body">
                        <div class="card-content">
                            <table>
                                <tr>
                                    <td>Peter Griffin</td>
                                    <td> <a href="#" class="button1">Accept</a></td>
                                    <td> <a href="#" class="button6">Reject</a></td>
                                </tr>

                                <tr>
                                    <td>Peter Griffin</td>
                                    <td> <a href="#" class="button1">Accept</a></td>
                                    <td> <a href="#" class="button6">Reject</a></td>
                                </tr>
                                <tr>
                                    <td>Peter Griffin</td>
                                    <td> <a href="#" class="button1">Accept</a></td>
                                    <td> <a href="#" class="button6">Reject</a></td>
                                </tr>

                                <tr>
                                    <td>Peter Griffin</td>
                                    <td> <a href="#" class="button1">Accept</a></td>
                                    <td> <a href="#" class="button6">Reject</a></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="modal-footer">
                    </div>
                </div>
            </div>
            <!-- -------------------------------------------------------------------------------------------------------------------------------------------- -->

            <script src="http://localhost/assets/js/admin/AdminBackEnd.js" ></script>

</body>
</html>
