<?php

use util\CommonConstants;

//set timezone
date_default_timezone_set("Asia/Colombo");
$today = date("Y-m-d");
$timeToday = date("H:i:s");

?>
<div class="col-s-12 col-m-12 col-l-12 normal-card">
    <!--div class="col-s-12 col-m-12 col-l-12">
        <div class="col-s-12 col-m-4 col-l-4 list-card border-color-1 shadow-2 card-align-right">
            <h2 class="heading color-1 ">Total Participated events:<?php echo " 12"?></h2>
        </div>
        <div class="col-s-12 col-m-4 col-l-4"></div>
        <div class="col-s-12 col-m-4 col-l-4"></div>
    </div-->
    <h1 class="col-s-12 col-m-12 col-l-12 heading text-shadow color-1 text-center">Upcoming Events</h1>

    <?php
    $i = -1;
    if (array_key_exists('upcoming', $params)){

        foreach ($params['upcoming'] as $event){
            if ($event['state'] == CommonConstants::STATE_FINISHED) continue;
            $i++;
            ?>
            <div class="col-s-12 col-m-12 col-l-12 list-card normal-card shadow-2 bg-color-7">
                <div class="normal-card">
                    <div class="col-l-12 col-m-12 col-s-12">
                        <div class="col-l-8 col-m-8 col-s-8 heading color-1"> <span ><?php echo $event['name']?></span></div>
                        <div class="col-l-4 col-m-8 col-s-8">

                        </div>
                    </div>
                    <div class="col-l-12 col-m-12 col-s-12 flex-container padding-top-1">

                        <div class="col-l-3 col-m-12 col-s-12">
                            <div class="col-l-2 col-m-2 col-s-2"><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zM7 9c0-2.76 2.24-5 5-5s5 2.24 5 5c0 2.88-2.88 7.19-5 9.88C9.92 16.21 7 11.85 7 9z"/><circle cx="12" cy="9" r="2.5"/></svg>
                            </div>
                            <div class="col-l-10 col-m-10 col-s-10 "><span class="custom-text"><?php echo $event['location']?></span></div>
                        </div>

                        <div class="col-l-3 col-m-12 col-s-12">
                            <div class="col-l-2 col-m-2 col-s-2"><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M7 11h2v2H7v-2zm14-5v14c0 1.1-.9 2-2 2H5c-1.11 0-2-.9-2-2l.01-14c0-1.1.88-2 1.99-2h1V2h2v2h8V2h2v2h1c1.1 0 2 .9 2 2zM5 8h14V6H5v2zm14 12V10H5v10h14zm-4-7h2v-2h-2v2zm-4 0h2v-2h-2v2z"/></svg>
                            </div>
                            <div class="col-l-10 col-m-10 col-s-10"><span class="custom-text"><?php echo $event['startDate']?></span></div>
                        </div>

                        <div class="col-l-3 col-m-12 col-s-12">
                            <div class="col-l-2 col-m-2 col-s-2"><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M11.99 2C6.47 2 2 6.48 2 12s4.47 10 9.99 10C17.52 22 22 17.52 22 12S17.52 2 11.99 2zM12 20c-4.42 0-8-3.58-8-8s3.58-8 8-8 8 3.58 8 8-3.58 8-8 8zm.5-13H11v6l5.25 3.15.75-1.23-4.5-2.67z"/></svg>
                            </div>
                            <div class="col-l-10 col-m-10 col-s-10 "><span class="custom-text"><?php echo $event['startTime']." - ".$event['endTime']?></span></div>
                        </div>

                        <div class="col-l-3 col-m-12 col-s-12">
                            <div class="col-l-2 col-m-2 col-s-2"><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M12 2l-5.5 9h11L12 2zm0 3.84L13.93 9h-3.87L12 5.84zM17.5 13c-2.49 0-4.5 2.01-4.5 4.5s2.01 4.5 4.5 4.5 4.5-2.01 4.5-4.5-2.01-4.5-4.5-4.5zm0 7c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5zM3 21.5h8v-8H3v8zm2-6h4v4H5v-4z"/></svg>
                            </div>
                            <div class="col-l-10 col-m-10 col-s-10"><span class="custom-text"><?php
                                    if ($event['type'] == CommonConstants::VOLUNTEER_EVENT_TYPE_OPEN){
                                        echo 'Open Event';
                                    } else {
                                        echo 'Exclusive Event';
                                    }
                                    ?></span></div>
                        </div>
                    </div>
                    <div class="col-l-12 col-m-12 col-s-12 padding-top-1">
                        <p class="custom-text">
                            <?php echo $event['description']?>
                        </p>
                    </div>
                    <a href="/participateVolunteerEvent?eventId=<?php echo $event['id']?>&type=<?php echo $event['type']?>">
                        <input class="col-s-12 col-m-3 col-l-3 color-4 bg-color-5 normal-card border-color-tranparent bannerButton card-align-right"
                               type="button"
                               value="Participate">
                    </a>

                </div>
            </div>
            <?php
        }
    } if ($i == -1) {
        ?>
        <div class="col-s-12 col-m-12 col-l-12 normal-card shadow-2 bg-color-5 list-card">
            <h3 class="color-4 heading text-center">
                You have no upcoming events.
            </h3>
        </div>
        <?php
    } else if (!array_key_exists('upcoming', $params)) {
        ?>
        <div class="col-s-12 col-m-12 col-l-12 normal-card shadow-2 bg-color-5 list-card">
            <h3 class="color-4 heading text-center">
                You have no upcoming events.
            </h3>
        </div>
        <?php
    }
    ?>

</div>

<div class="col-s-12 col-m-12 col-l-12 normal-card">

    <?php
    $i = -1;
    if (array_key_exists('participated', $params)){
        ?>
        <h1 class="col-s-12 col-m-12 col-l-12 heading text-shadow color-1 text-center">Participated Events</h1>
        <?php
        foreach ($params['participated'] as $event){
            if ($event['state'] == CommonConstants::STATE_FINISHED) continue;

            $i++;
            ?>

            <div class="col-s-12 col-m-12 col-l-12 list-card normal-card shadow-2 bg-color-7">
                <div class="normal-card">
                    <div class="col-l-12 col-m-12 col-s-12">
                        <div class="col-l-8 col-m-8 col-s-8 heading color-1"> <span ><?php echo $event['name']?></span></div>
                        <div class="col-l-4 col-m-8 col-s-8">

                        </div>
                    </div>
                    <div class="col-l-12 col-m-12 col-s-12 flex-container padding-top-1">

                        <div class="col-l-3 col-m-12 col-s-12">
                            <div class="col-l-2 col-m-2 col-s-2"><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zM7 9c0-2.76 2.24-5 5-5s5 2.24 5 5c0 2.88-2.88 7.19-5 9.88C9.92 16.21 7 11.85 7 9z"/><circle cx="12" cy="9" r="2.5"/></svg>
                            </div>
                            <div class="col-l-10 col-m-10 col-s-10 "><span class="custom-text"><?php echo $event['location']?></span></div>
                        </div>

                        <div class="col-l-3 col-m-12 col-s-12">
                            <div class="col-l-2 col-m-2 col-s-2"><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M7 11h2v2H7v-2zm14-5v14c0 1.1-.9 2-2 2H5c-1.11 0-2-.9-2-2l.01-14c0-1.1.88-2 1.99-2h1V2h2v2h8V2h2v2h1c1.1 0 2 .9 2 2zM5 8h14V6H5v2zm14 12V10H5v10h14zm-4-7h2v-2h-2v2zm-4 0h2v-2h-2v2z"/></svg>
                            </div>
                            <div class="col-l-10 col-m-10 col-s-10"><span class="custom-text"><?php echo $event['startDate']?></span></div>
                        </div>

                        <div class="col-l-3 col-m-12 col-s-12">
                            <div class="col-l-2 col-m-2 col-s-2"><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M11.99 2C6.47 2 2 6.48 2 12s4.47 10 9.99 10C17.52 22 22 17.52 22 12S17.52 2 11.99 2zM12 20c-4.42 0-8-3.58-8-8s3.58-8 8-8 8 3.58 8 8-3.58 8-8 8zm.5-13H11v6l5.25 3.15.75-1.23-4.5-2.67z"/></svg>
                            </div>
                            <div class="col-l-10 col-m-10 col-s-10 "><span class="custom-text"><?php echo $event['startTime']." - ".$event['endTime']?></span></div>
                        </div>

                        <div class="col-l-3 col-m-12 col-s-12">
                            <div class="col-l-2 col-m-2 col-s-2"><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M12 2l-5.5 9h11L12 2zm0 3.84L13.93 9h-3.87L12 5.84zM17.5 13c-2.49 0-4.5 2.01-4.5 4.5s2.01 4.5 4.5 4.5 4.5-2.01 4.5-4.5-2.01-4.5-4.5-4.5zm0 7c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5zM3 21.5h8v-8H3v8zm2-6h4v4H5v-4z"/></svg>
                            </div>
                            <div class="col-l-10 col-m-10 col-s-10"><span class="custom-text"><?php
                                    if ($event['type'] == CommonConstants::VOLUNTEER_EVENT_TYPE_OPEN){
                                        echo 'Open Event';
                                    } else {
                                        echo 'Exclusive Event';
                                    }
                                    ?></span></div>
                        </div>
                    </div>
                    <div class="col-l-12 col-m-12 col-s-12 padding-top-1">
                        <p class="custom-text">
                            <?php echo $event['description']?>
                        </p>
                    </div>
                    <div class="col-l-12 col-m-12 col-s-12 padding-top-1">
                        <div class="col-s-6 col-m-4 col-l-4">
                            <p class="col-s-6 col-m-6 col-l-5 color-1 heading">
                                Participation Approval:
                            </p>
                            <p class="col-s-6 col-m-6 col-l-6 color-5 heading">
                                <?php
                                //print_r($event);
                                if ($event['participation_state'] == CommonConstants::STATE_PENDING) echo 'Pending';
                                else echo 'Approved';
                                ?>
                            </p>
                        </div>

                    </div>

                    <?php
                    //calculate date difference
                    $eventDate = date_create($event['startDate']);
                    $todayDate = date_create($today);
                    $difference = intval(date_diff($todayDate, $eventDate)->format('%R%a days'));

                    if ($difference > CommonConstants::VOLUNTEER_EVENT_CANCEL_LIMIT &&
                        $event['type'] == CommonConstants::VOLUNTEER_EVENT_TYPE_EXCLUSIVE ||
                        $event['type'] == CommonConstants::VOLUNTEER_EVENT_TYPE_OPEN){
                        ?>
                        <a href="/cancelParticipationVolunteerEvent?eventId=<?php echo $event['id']?>">
                            <input class="col-s-12 col-m-3 col-l-3 color-4 bg-color-6 normal-card border-color-tranparent bannerButton card-align-right"
                                   type="button"
                                   value="Cancel Participation">
                        </a>
                        <?php
                    }
                    ?>


                </div>
            </div>
            <?php
        }
    } if ($i == -1) {
        ?>
        <div class="col-s-12 col-m-12 col-l-12 normal-card shadow-2 bg-color-5 list-card">
            <h3 class="color-4 heading text-center">
                You have no participating events.
            </h3>
        </div>
        <?php
    } else if (!array_key_exists('participated', $params)) {
        ?>
        <div class="col-s-12 col-m-12 col-l-12 normal-card shadow-2 bg-color-5 list-card">
            <h3 class="color-4 heading text-center">
                You have no participating events.
            </h3>
        </div>
        <?php
    }
    ?>

</div>

