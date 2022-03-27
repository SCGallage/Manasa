<?php
    use util\CommonConstants;

    $callerId = $params['request']['callerId'];
    $state = $params['request']['state'];
    $viewType = $params['viewType'];
    $sgId = -1;

    //set timezone
    date_default_timezone_set("Asia/Colombo");
    $today = date("Y-m-d");
    $timeToday = date("H:i:s");

    $dateSearched = 'not_set';
    $meetingType = 'not_set';

    if (array_key_exists('meetingType', $params['request']) && array_key_exists('date', $params['request'])){
        $dateSearched = $params['request']['date'];
        $meetingType = $params['request']['meetingType'];
    }


    $formLink = "";
    $reserveLink = "";
    if ($viewType == 'normal_meeting'){
        $formLink = "/timeslots";
        $reserveLink = "/reserveMeeting";

    }

    if ($viewType == 'sg_join_meeting'){
        $sgId = $params['request']['supportGroupId'];
        $formLink = "/loadJoinRequestTimeSlots";
        $reserveLink = '/completeSgJoinRequest';
    }

    //print_r($params['timeSlots']);

    if (array_key_exists('chances', $params) ||
        array_key_exists(CommonConstants::VIEW_TYPE, $params) && $params[CommonConstants::VIEW_TYPE] == 'sg_join_meeting'){

        if (array_key_exists('chances', $params)){
            ?>
            <div class="col-s-12 col-m-12 col-l-12 normal-card text-center">
                <h2 class="heading color-5">You have
                    <?php echo $params['chances']?> meeting reservations left.</h2>
            </div>
            <?php
        }
        ?>


        <div class="col-l-12 col-m-12 col-s-12 bg-color-4">

            <div class="col-s-12 col-m-12 col-l-12 normal-card shadow-2 card-align-center">
                <h1 class="col-s-12 col-m-12 col-l-12 heading-text-center color-1 text-shadow">Select Date</h1>
                <?php
                if ($viewType === "sg_join_meeting"){
                    ?>
                    <p class="text-center color-1 normal-text">You must select date and time for your preliminary to complete your support group join request.</p>
                    <?php
                }
                ?>

                <form action="<?php echo $formLink?>"
                      method="post"
                      class="col-s-12 col-m-12 col-l-12">
                    <b><p id="dateError" class="col-s-12 col-m-12 col-l-12 color-6 normal-text text-center hide">Please enter a future date</p></b>
                    <div class="col-s-0 col-m-2 col-l-3 text-hidden">.</div>
                    <input type="date"
                           id="appointment_date"
                           name="date"
                           class="col-s-12 col-m-8 col-l-6 form-field text-center border-color-1"
                           value="<?php if (0 != strcmp($dateSearched, 'not_set')) echo $dateSearched; else echo date('Y-m-d', strtotime($today . ' +1 day'))?>" \
                           min="<?php echo date('Y-m-d', strtotime($today . ' +1 day'))?>"
                           max="<?php echo $params['schedule'][0]['endDate']?>">
                    <div class="col-s-0 col-m-2 col-l-3 text-hidden">.</div>

                    <p class="col-s-12 col-m-12 col-l-12 color-1 normal-text text-center">Please select your preferred meeting type.</p>
                    <div class="col-s-0 col-m-2 col-l-3 text-hidden">.</div>
                    <select class="col-s-12 col-m-8 col-l-6 border-color-1" name="meetingType" id="type" required>
                        <?php
                        if(!strcmp($meetingType, 'not_set')){
                            ?>
                            <option class="bg-color-1 color-4 heading text-center" disabled selected value>Select meeting type</option>
                            <?php
                        }
                        ?>

                        <?php


                        foreach (CommonConstants::MEETING_TYPES_ARRAY as $item){
                            ?>
                            <option class="bg-color-1 color-4 heading text-center"
                                    value="<?php echo $item?>"
                                <?php if (!strcmp($meetingType, $item)) echo 'selected='.'"'.'selected'.'"'?>>
                                <?php echo $item?>
                            </option>
                            <?php
                        }

                        ?>
                    </select>
                    <div class="col-s-0 col-m-2 col-l-3 text-hidden">.</div>

                    <input type="hidden" name="callerId" value="<?php echo $callerId?>">
                    <?php
                    if ($viewType === "sg_join_meeting"){
                        ?>
                        <input type="hidden" name="supportGroupId" value="<?php echo $sgId?>">
                        <?php
                    }
                    ?>
                    <input type="hidden" name="state" value="<?php echo $state?>">

                    <div class="col-s-0 col-m-4 col-l-4 text-hidden">.</div>
                    <input type="button"
                           id="submitBtn"
                           value="Search"
                           class="col-s-12 col-m-4 col-l-4 searchButton bg-color-1 color-4"
                           onclick="isFutureDate('appointment_date', 'dateError', 'submitBtn')">
                    <div class="col-s-0 col-m-4 col-l-4 text-hidden">.</div>
                </form>
            </div>






            <?php
            if (array_key_exists('timeSlots', $params)){
            $timeSlots = $params['timeSlots'];
            ?>

            <h1 class="col-s-12 col-m-12 col-l-12 heading-text-center color-1 text-shadow">Select Time Slot</h1>

            <div class="col-s-12 col-m-12 col-l-12">

                <?php
                foreach ($timeSlots as $values){
                    ?>
                    <div class="col-s-12 col-m-12 col-l-12 normal-card shadow-2 bg-color-3 list-card">
                        <div class="col-s-1 col-m-1 col-l-1">
                            <div class="col-s-12 col-m-12 col-l-12 bg-color-5 listDateCard">
                                <?php
                                $dateArr = explode("-", $values['date']);
                                ?>
                                <p class="heading color-4 text-center">
                                    <?php echo $dateArr[2]?>
                                </p>
                                <p class="heading color-4 text-center">
                                    <?php
                                    //echo date("j M",$values['date']);
                                    $month = $dateArr[1];
                                    if ($month === '01') {$month = "Jan"; echo $month;};
                                    if ($month === '02') {$month = "Feb"; echo $month;};
                                    if ($month === '03') {$month = "Mar"; echo $month;};
                                    if ($month === '04') {$month = "Apr"; echo $month;};
                                    if ($month === '05') {$month = "May"; echo $month;};
                                    if ($month === '06') {$month = "Jun"; echo $month;};
                                    if ($month === '07') {$month = "Jul"; echo $month;};
                                    if ($month === '08') {$month = "Aug"; echo $month;};
                                    if ($month === '09') {$month = "Sep"; echo $month;};
                                    if ($month === '10') {$month = "Oct"; echo $month;};
                                    if ($month === '11') {$month = "Nov"; echo $month;};
                                    if ($month === '12') {$month = "Dec"; echo $month;};
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
                                            <?php echo $dateArr[0]."-".$month.'-'.$dateArr[2]?>
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
                                            From: <?php echo date("H:i", strtotime($values['startTime']))?>
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
                                            To:<?php echo date("H:i", strtotime($values['endTime']))?></p>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-s-12 col-m-12 col-l-2">
                            <div class="col-s-12 col-m-12 col-l-12">
                                <form action="<?php echo $reserveLink?>" method="post">
                                    <input type="hidden" name="reserveDate" value="<?php echo  $today?>">
                                    <input type="hidden" name="reserveTime" value="<?php echo $timeToday?>">
                                    <input type="hidden" name="state" value="<?php echo $state?>">
                                    <input type="hidden" name="timeslotId" value="<?php echo $values['timeslotId']?>">
                                    <input type="hidden" name="callerId" value="<?php echo $callerId?>">
                                    <input type="hidden" name="meetingType" value="<?php echo $meetingType?>">
                                    <?php
                                    if ($viewType == 'sg_join_meeting'){
                                        ?>
                                        <input type="hidden" name="supportGroupId" value="<?php echo $sgId?>">
                                        <?php
                                    }
                                    ?>

                                    <input class="col-s-12 col-m-12 col-l-12 bannerButton bg-color-1 color-4  heading"
                                           type="submit" value="Select Time Slot">
                                </form>
                            </div>
                        </div>
                    </div>
                    <?php
                }
                }

                if (array_key_exists('searchedDate',$params) && sizeof($params['timeSlots']) == 0) {

                    //No time slots found
                    ?>
                    <div class="col-s-12 col-m-12 col-l-12 normal-card shadow-2 bg-color-3 list-card">
                        <h3 class="heading color-1 text-center">Timeslots are not available in <?php echo $params['searchedDate']?>.
                            Please try again with another date.
                        </h3>
                    </div>


                    <?php
                }
                ?>

            </div>



        </div>
<?php
    } else {
        ?>

        <div class="col-s-12 col-m-12 col-l-12 normal-card shadow-2 bg-color-6 list-card">
            <h3 class="color-4 heading text-center">
                All of your appointment chances are used. You cannot place more appointments until complete or cancel one of your appointment.
            </h3>
        </div>

        <div class="col-s-1 col-m-3 col-l-4 color-0">.</div>
        <a href="/appointments">
            <input type="button"
                   value="Appointments"
                   class="col-s-10 col-m-6 col-l-4 bannerButton bg-color-5 color-4">
        </a>
        <div class="col-s-1 col-m-3 col-l-4 color-0">.</div>
        <?php
    }
?>
