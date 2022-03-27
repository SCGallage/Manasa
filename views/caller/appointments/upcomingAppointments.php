<?php use util\CommonConstants; ?>
<!--Upcoming Appointments-------------------------------------------------------------------------------->
<?php //print_r($params);

//set timezone
date_default_timezone_set("Asia/Colombo");
$today = date("Y-m-d");
$timeToday = date("H:i");

if (array_key_exists('pending', $params) && !empty($params['pending'])){
    ?>

    <!--Upcoming Appointments-------------------------------------------------------------------------------->
    <div id="upcoming" class="col-l-12 col-m-12 col-s-12 bg-color-4">
        <h1 class="col-s-12 col-m-12 col-l-12 heading-text-center color-1 text-shadow">Upcoming Appointments</h1>

        <div class="col-s-12 col-m-12 col-l-12">
            <?php
            foreach ($params['pending'] as $meeting){

                $appointmentDate = date($meeting['date']);
                $appointmentEndTime = strtotime($meeting['endTime']);
                $timeToday = strtotime($timeToday);

                if ($appointmentDate == $today &&$appointmentEndTime < $timeToday) {
                    continue;
                }

                ?>
                <div class="col-s-12 col-m-12 col-l-12 normal-card shadow-2 bg-color-3 list-card">
                    <div class="col-s-1 col-m-1 col-l-1">
                        <div class="col-s-12 col-m-12 col-l-12 bg-color-5 listDateCard">
                            <p class="heading color-4 text-center"><?php echo date('d', strtotime($meeting['date']))?></p>
                            <p class="heading color-4 text-center"><?php echo date('M', strtotime($meeting['date']))?></p>
                        </div>
                    </div>
                    <div class="col-s-11 col-m-4 col-l-3 listInfoCard">
                        <p class="heading color-1 text-left">Scheduled Appointment</p>
                        <p class="normal-text color-1 text-left"><?php echo $meeting['meeting_type']?></p>
                    </div>
                    <div class="col-s-6 col-m-3 col-l-3 ">
                        <table class="col-s-12 col-m-12 col-l-12">
                            <tr>
                                <td class="imageTableCard"><img src="../../assets/img/icons/calendar-icon.png"
                                                                alt="calander icon"></td>
                                <td>
                                    <p class="col-s-9 col-m-10 col-l-10 heading color-1 text-left"><?php echo $meeting['date']?></p>
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
                                    <p class="col-s-9 col-m-10 col-l-10 heading color-1 text-left"><?php echo date("H:i", strtotime($meeting['startTime']))?></p>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-s-12 col-m-12 col-l-2">
                        <?php

                        if ($today == $appointmentDate) {
                            ?>
                            <input type="hidden"
                                   name="<?php echo CommonConstants::VIEW_TYPE?>"
                                   value="<?php echo CommonConstants::VIEW_APPOINTMENT_LINK?>">
                            <a href="/appointmentLink?id=<?php echo $meeting['id']?>"
                               class="col-s-12 col-m-12 col-l-12">
                                <input class="col-s-12 col-m-12 col-l-12 bannerButton bg-color-1 color-4  heading"
                                       type="button" value="Get Link">
                            </a>
                            <?php
                        } else {
                            ?>
                            <a href="/appointmentInfo?id=<?php echo $meeting['id']?>"
                               class="col-s-12 col-m-12 col-l-12">
                                <input class="col-s-12 col-m-12 col-l-12 bannerButton bg-color-5 color-4  heading"
                                       type="button" value="View">
                            </a>
                            <div class="col-s-12 col-m-12 col-l-12">
                                <form action="/cancelMeeting" method="post">
                                    <input type="hidden" value="1">
                                    <input class="col-s-12 col-m-12 col-l-12 bannerButton bg-color-6 color-4 heading"
                                           type="button"
                                           value="Cancel"
                                           onclick="popup('popup<?php echo $meeting['id']?>', <?php echo CommonConstants::POPUP_SHOW; ?>)">

                                    <input type="hidden" name="id" value="<?php echo $meeting['id']?>">

                                    <!--Cancel Appointment message popup--------------------------------------------------------------------->
                                    <div id="popup<?php echo $meeting['id']?>" class="col-s-7 col-m-8 col-l-6 popup-card list-card shadow-2 border-color-1 bg-color-4">
                                        <h2 class="col-s-12 col-m-12 col-l-12 text-center heading color-6">
                                            Your Appointment will be canceled!!
                                        </h2>
                                        <h4 class="col-s-12 col-m-12 col-l-12 text-center heading color-1">
                                            Do you really want to continue?<br>
                                            Your appointment will be deleted once you click "Confirm" button.<br>
                                            You can cancel this process by clicking "Cancel" button.
                                        </h4>

                                        <div class="col-s-0 col-m-1 col-l-2 color-0">.</div>
                                        <input class="col-s-12 col-m-5 col-l-4 bannerButton color-4 normal-text bg-color-5"
                                               type="button"
                                               onclick="popup('popup<?php echo $meeting['id']?>', <?php echo CommonConstants::POPUP_HIDE; ?>)"
                                               value="Cancel">

                                        <a href="">
                                            <input class="col-s-12 col-m-5 col-l-4 bannerButton color-4 normal-text bg-color-6"
                                                   type="submit"
                                                   onclick="popup('popup<?php echo $meeting['id']?>', <?php echo CommonConstants::POPUP_HIDE; ?>)"
                                                   value="Confirm">
                                        </a>
                                        <div class="col-s-0 col-m-1 col-l-2 color-0">.</div>

                                    </div>
                                    <!--/Cancel Appointment message popup-------------------------------------------------------------------->
                                </form>
                            </div>
                            <?php
                        }
                        ?>

                    </div>
                </div>
                <?php
            }
            ?>

        </div>
    </div>
    <!--/Upcoming Appointments------------------------------------------------------------------------------->

    <?php
}

?>