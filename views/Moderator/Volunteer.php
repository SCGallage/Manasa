<?php $params
?>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="http://localhost/assets/css/main.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,200;0,300;0,400;0,500;0,700;1,200&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
          rel="stylesheet"/>
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
                    <button class="add-text"><a href="/mod/createVolunteerEvent">+Add Event</a></button>
                </div>
            </div>

            <?php
            foreach ($eventDetails as $data) {?>

            <div class="col-l-12 col-m-12 col-s-12 card-content">
                <div class="event-card">
                    <div class="col-l-12 col-m-12 col-s-12 flex-container3">
                        <div class="col-l-8 col-m-8 col-s-8"> <span class="text-style4"><?php echo $data['name'];?></span></div>
                        <div class="col-l-4 col-m-8 col-s-8">
                            <div class="col-l-12 col-m-12 col-s-12">
                                <a onclick="document.getElementById('deleteEvent<?php echo $data['id'] ?>').style.display='block'">
                                    <span class="add-text ">
                                        <svg aria-hidden="true" focusable="false" data-prefix="far" data-icon="trash-alt" class="svg-inline--fa fa-trash-alt fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" height="24px" width="24px" viewBox="0 0 576 512" fill="#000000"><path fill="" d="M268 416h24a12 12 0 0 0 12-12V188a12 12 0 0 0-12-12h-24a12 12 0 0 0-12 12v216a12 12 0 0 0 12 12zM432 80h-82.41l-34-56.7A48 48 0 0 0 274.41 0H173.59a48 48 0 0 0-41.16 23.3L98.41 80H16A16 16 0 0 0 0 96v16a16 16 0 0 0 16 16h16v336a48 48 0 0 0 48 48h288a48 48 0 0 0 48-48V128h16a16 16 0 0 0 16-16V96a16 16 0 0 0-16-16zM171.84 50.91A6 6 0 0 1 177 48h94a6 6 0 0 1 5.15 2.91L293.61 80H154.39zM368 464H80V128h288zm-212-48h24a12 12 0 0 0 12-12V188a12 12 0 0 0-12-12h-24a12 12 0 0 0-12 12v216a12 12 0 0 0 12 12z"></path></svg>
                                    </span>
                                </a>

                                <!--Event Delete Confirmation ----------------------------------------------------------------------------------------->

                                <div id="deleteEvent<?php echo $data['id'] ?>" class="modal">
                                    <div class="modal-content modal-container">
                                        <span onclick="document.getElementById('deleteEvent<?php echo $data['id'] ?>').style.display='none'" class="close" title="Close">×</span>
                                        <span class="modal-head-text">Delete Volunteer Event</span><br><br>
                                        <span class="modal-text">Are you sure you want to delete the event?</span>

                                        <div class="clearfix padding-top">
                                            <button type="button" onclick="document.getElementById('deleteEvent<?php echo $data['id'] ?>').style.display='none'" class="cancelbtn modal-button">Cancel</button>
                                            <a onclick="document.getElementById('deleteEvent<?php echo $data['id'] ?>').style.display='none'"
                                               class="deletebtn modal-button"
                                               href="/mod/deleteVolunteerEvent?id=<?php echo $data['id'] ?>" >Delete</a>
                                        </div>
                                    </div>
                                </div>

                                <!------------------------------------------------------------------------------------------------------------------------->

                                <a href="/mod/updateVolunteerEvent?id=<?php echo $data['id'] ?>">
                                    <span class="add-text padding-right-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" width="24px" viewBox="0 0 576 512" fill="#000000"><path fill="" d="M402.3 344.9l32-32c5-5 13.7-1.5 13.7 5.7V464c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V112c0-26.5 21.5-48 48-48h273.5c7.1 0 10.7 8.6 5.7 13.7l-32 32c-1.5 1.5-3.5 2.3-5.7 2.3H48v352h352V350.5c0-2.1.8-4.1 2.3-5.6zm156.6-201.8L296.3 405.7l-90.4 10c-26.2 2.9-48.5-19.2-45.6-45.6l10-90.4L432.9 17.1c22.9-22.9 59.9-22.9 82.7 0l43.2 43.2c22.9 22.9 22.9 60 .1 82.8zM460.1 174L402 115.9 216.2 301.8l-7.3 65.3 65.3-7.3L460.1 174zm64.8-79.7l-43.2-43.2c-4.1-4.1-10.8-4.1-14.8 0L436 82l58.1 58.1 30.9-30.9c4-4.2 4-10.8-.1-14.9z"></path></svg>
                                    </span>
                                </a>

                            </div>

                        </div>
                    </div>
                    <div class="col-l-12 col-m-12 col-s-12 flex-container padding-top-1">

                        <div class="col-l-3 col-m-12 col-s-12">
                            <div class="col-l-2 col-m-2 col-s-2"><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zM7 9c0-2.76 2.24-5 5-5s5 2.24 5 5c0 2.88-2.88 7.19-5 9.88C9.92 16.21 7 11.85 7 9z"/><circle cx="12" cy="9" r="2.5"/></svg>
                            </div>
                            <div class="col-l-10 col-m-10 col-s-10 "><span class="custom-text"><?php echo $data['location'];?></span></div>
                        </div>

                        <div class="col-l-3 col-m-12 col-s-12">
                            <div class="col-l-2 col-m-2 col-s-2"><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M7 11h2v2H7v-2zm14-5v14c0 1.1-.9 2-2 2H5c-1.11 0-2-.9-2-2l.01-14c0-1.1.88-2 1.99-2h1V2h2v2h8V2h2v2h1c1.1 0 2 .9 2 2zM5 8h14V6H5v2zm14 12V10H5v10h14zm-4-7h2v-2h-2v2zm-4 0h2v-2h-2v2z"/></svg>
                            </div>
                            <div class="col-l-10 col-m-10 col-s-10"><span class="custom-text"><?php echo $data['startDate'];?></span></div>
                        </div>

                        <div class="col-l-3 col-m-12 col-s-12">
                            <div class="col-l-2 col-m-2 col-s-2"><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M11.99 2C6.47 2 2 6.48 2 12s4.47 10 9.99 10C17.52 22 22 17.52 22 12S17.52 2 11.99 2zM12 20c-4.42 0-8-3.58-8-8s3.58-8 8-8 8 3.58 8 8-3.58 8-8 8zm.5-13H11v6l5.25 3.15.75-1.23-4.5-2.67z"/></svg>
                            </div>
                            <div class="col-l-10 col-m-10 col-s-10 "><span class="custom-text"><?php echo $data['startTime'] ." - " .$data['endTime'];?></span></div>
                        </div>

                        <div class="col-l-3 col-m-12 col-s-12">
                            <div class="col-l-2 col-m-2 col-s-2"><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M12 2l-5.5 9h11L12 2zm0 3.84L13.93 9h-3.87L12 5.84zM17.5 13c-2.49 0-4.5 2.01-4.5 4.5s2.01 4.5 4.5 4.5 4.5-2.01 4.5-4.5-2.01-4.5-4.5-4.5zm0 7c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5zM3 21.5h8v-8H3v8zm2-6h4v4H5v-4z"/></svg>
                            </div>
                            <div class="col-l-10 col-m-10 col-s-10"><span class="custom-text"><?php
                                    if ($data['type'] == 1) {
                                        echo 'Open Event';
                                    }
                                    elseif ($data['type'] == 0){
                                        echo 'Exclusive Event';
                                    }
                                    ?></span></div>
                        </div>

                    </div>

                    <div class="col-l-12 col-m-12 col-s-12 padding-top-1">
                        <span class="custom-text">Moderator: <?php echo $data['fname'] ." " .$data['lname'];?>
                    </div>


                    <div class="col-l-12 col-m-12 col-s-12 padding-top-1">
                        <p class="custom-text">
                            <?php echo $data['description'];?>
                        </p>
                    </div>

                    <div class="col-l-12 col-m-12 col-s-12 padding1">
                        <a href="/mod/selectVolunteer?id=<?php echo $data['id'] ?>">
                            <span class="button7">

                                Select Volunteers
                            </span>
                        </a>
                    </div>

                </div>
                </div>

                    <?php }?>
                </div>
    </div>
</main>

                <script src="http://localhost/assets/js/admin/AdminBackEnd.js" ></script>

