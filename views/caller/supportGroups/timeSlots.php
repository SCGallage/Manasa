<?php

use util\CommonConstants;

//set timezone
date_default_timezone_set("Asia/Colombo");
$today = date("Y-m-d");
$timeToday = date("H:i:s");

if (array_key_exists('chances' , $params)) {
    if (intval($params['chances']) > 0 && array_key_exists('timeSlots', $params)) {

        if (!empty($params['timeSlots'])) {
            //load time slots
            ?>
            <h1 class="heading color-1 text-center text-shadow">Available Time Slots for Preliminary Session.</h1>
            <h3 class="heading color-2 text-center">Please select a time slot.</h3>
            <?php

            foreach ($params['timeSlots'] as $values){
                ?>
                <div class="col-s-12 col-m-12 col-l-12 normal-card shadow-2 bg-color-3 list-card">
                    <div class="col-s-1 col-m-1 col-l-1">
                        <div class="col-s-12 col-m-12 col-l-12 bg-color-5 listDateCard">
                            <?php
                            $dateArr = explode("-", $values['date']);
                            ?>
                            <p class="heading color-4 text-center">
                                <?php
                                echo date("j",strtotime($values['date']));

                                ?>
                            </p>
                            <p class="heading color-4 text-center">
                                <?php
                                echo date(" M",strtotime($values['date']));

                                ?>
                            </p>
                        </div>
                    </div>

                    <div class="col-s-11 col-m-3 col-l-3 ">
                        <table class="col-s-12 col-m-12 col-l-12">
                            <tr>
                                <td class="imageTableCard"><img src="../../assets/img/icons/calendar-icon.png"
                                                                alt="calander icon"></td>
                                <td>
                                    <p class="col-s-9 col-m-10 col-l-10 heading color-1 text-left">
                                        <?php echo $values['date']?>
                                    </p>
                                </td>
                            </tr>
                        </table>
                    </div>

                    <div class="col-s-5 col-m-4 col-l-3">
                        <table class="col-s-12 col-m-12 col-l-12">
                            <tr>
                                <td class="imageTableCard"><img src="../../assets/img/icons/clock-icon.png" alt="clock icon">
                                </td>
                                <td>
                                    <p class="col-s-9 col-m-10 col-l-10 heading color-1 text-left">
                                        From: <?php echo " ".date("H:i", strtotime($values['startTime']))?>
                                    </p>
                                </td>
                            </tr>
                        </table>
                    </div>

                    <div class="col-s-6 col-m-4 col-l-3">
                        <table class="col-s-12 col-m-12 col-l-12">
                            <tr>
                                <td class="imageTableCard"><img src="../../assets/img/icons/clock-icon.png" alt="clock icon">
                                </td>
                                <td>
                                    <p class="col-s-9 col-m-10 col-l-10 heading color-1 text-left">
                                        To:<?php echo " ".date("H:i", strtotime($values['endTime']))?></p>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-s-12 col-m-12 col-l-2">
                        <div class="col-s-12 col-m-12 col-l-12">
                            <form action="/reserveSgMeeting" method="post">
                                <input type="hidden" name="timeslotId" value="<?php echo $values['timeslotId']?>">
                                <input type="hidden" name="supportGroupId" value="<?php echo $params['sgId']?>">
                                <input type="hidden" name="befrienderId" value="<?php echo $values['befrienderId']?>">
                                <!--Select meeting type message popup--------------------------------------------------------------------->
                                <div id="popup<?php echo $values['timeslotId']?>" class="col-s-7 col-m-8 col-l-6 popup-card list-card shadow-2 border-color-1 bg-color-4">
                                    <h2 class="col-s-12 col-m-12 col-l-12 text-center heading color-6">
                                        Please select meeting type.
                                    </h2>
                                    <div class="col-s-1 col-m-1 col-l-1 text-hidden">.</div>
                                    <select class="col-s-10 col-m-10 col-l-10 border-color-1" name="meetingType" id="type" required>
                                        <option class="bg-color-1 color-4 heading text-center" disabled selected value>Select meeting type</option>
                                        <?php

                                        foreach (CommonConstants::MEETING_TYPES_ARRAY as $item){
                                            ?>
                                            <option class="bg-color-1 color-4 heading text-center"
                                                    value="<?php echo $item?>">
                                                <?php echo $item?>
                                            </option>
                                            <?php
                                        }

                                        ?>
                                    </select>
                                    <div class="col-s-1 col-m-1 col-l-1 text-hidden">.</div>
                                    <div class="col-s-0 col-m-1 col-l-2 color-0">.</div>
                                    <input class="col-s-12 col-m-5 col-l-4 bannerButton color-4 normal-text bg-color-6"
                                           type="button"
                                           onclick="popup('popup<?php echo $values['timeslotId']?>', <?php echo CommonConstants::POPUP_HIDE; ?>)"
                                           value="Cancel">

                                    <a href="">
                                        <input class="col-s-12 col-m-5 col-l-4 bannerButton color-4 normal-text bg-color-5"
                                               type="submit"
                                               onclick="popup('popup<?php echo $values['timeslotId']?>', <?php echo CommonConstants::POPUP_HIDE; ?>)"
                                               value="Confirm">
                                    </a>
                                    <div class="col-s-0 col-m-1 col-l-2 color-0">.</div>

                                </div>
                                <!--/Select meeting type message popup-------------------------------------------------------------------->


                                <input class="col-s-12 col-m-12 col-l-12 bannerButton bg-color-1 color-4  heading"
                                       type="button"
                                       value="Select Time Slot"
                                       onclick="popup('popup<?php echo $values['timeslotId']?>', <?php echo CommonConstants::POPUP_SHOW; ?>)">
                            </form>
                        </div>
                    </div>
                </div>
                <?php
            }


        } else {
            ?>
            <div class="col-s-12 col-m-12 col-l-12 normal-card shadow-2 bg-color-5 list-card">
                <h3 class="heading color-4 text-center">All the time slots are booked. Please try again later.</h3>
                <h1 class="heading color-4 text-center">:(</h1>
            </div>
            <?php
        }

    }
}
