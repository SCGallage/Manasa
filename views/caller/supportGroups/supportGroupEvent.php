<?php

use util\CommonConstants;

//print_r($params['event'][0]);

//set timezoon
date_default_timezone_set("Asia/Colombo");
$today = date("Y-m-d");
$timeToday = date("H:i:s");
?>

<div class="col-s-12 col-m-12 col-l-12 list-card bg-color-3 shadow-2">\

    <h1 class="col-s-12 col-m-12 col-l-12 heading text-center color-1">
        <?php echo $params['event'][0]['name']?>
    </h1>

    <div class="col-s-0 col-m-1 col-l-2 color-0">.</div>

    <div class="col-s-12 col-m-10 col-l-8">

        <p class="col-s-6 col-m-6 col-l-6 heading margin-r text-right color-1">
            Participants:
        </p>
        <p class="col-s-5 col-m-5 col-l-5 heading margin-l text color-1">
            <?php echo $params['participants']?>
        </p>

        <!--p class="col-s-6 col-m-6 col-l-6 heading margin-r text-right color-1">
            Agenda:
        </p>
        <p class="col-s-5 col-m-5 col-l-5 heading margin-l text color-1">
            <?php echo $params['event'][0]['agenda']?>
        </p-->

        <p class="col-s-6 col-m-6 col-l-6 heading margin-r text-right color-1">
            Date:
        </p>
        <p class="col-s-5 col-m-5 col-l-5 heading margin-l text color-1">
            <?php echo $params['event'][0]['eventDate']?>
        </p>

        <p class="col-s-6 col-m-6 col-l-6 heading margin-r text-right color-1">
            Start Time:
        </p>
        <p class="col-s-5 col-m-5 col-l-5 heading margin-l text color-1">
            <?php echo $params['event'][0]['time_from']?>
        </p>

        <p class="col-s-6 col-m-6 col-l-6 heading margin-r text-right color-1">
            End Time:
        </p>
        <p class="col-s-5 col-m-5 col-l-5 heading margin-l text color-1">
            <?php echo $params['event'][0]['time_to']?>
        </p>

        <!--p class="col-s-6 col-m-6 col-l-6 heading margin-r text-right color-1">
            Event type:
        </p>
        <p class="col-s-5 col-m-5 col-l-5 heading margin-l text color-1">
            <?php echo $params['event'][0]['type']?>
        </p-->

        <?php
        if ($params['event'][0]['type'] == CommonConstants::SG_EVENT_TYPE_VIRTUAL  &&
            array_key_exists('callerId', $params['event'][0]) &&
            !empty($params['event'][0]['join_url']) &&
            $today == $params['event'][0]['eventDate']){
            //load virtual meeting data
            ?>
            <p class="col-s-6 col-m-6 col-l-6 heading margin-r text-right color-1">
                Meeting ID:
            </p>
            <p class="col-s-5 col-m-5 col-l-5 heading margin-l text color-1">
                <?php echo $params['event'][0]['meetingId']?>
            </p>

            <p class="col-s-6 col-m-6 col-l-6 heading margin-r text-right color-1">
                Password:
            </p>
            <p class="col-s-5 col-m-5 col-l-5 heading margin-l text color-1">
                <?php echo $params['event'][0]['password']?>
            </p>

            <p class="col-s-6 col-m-6 col-l-6 heading margin-r text-right color-1">
                Link:
            </p>
            <p class="col-s-5 col-m-5 col-l-5 heading margin-l text color-1">
                <a href="<?php echo $params['event'][0]['join_url']?>"
                   class="link-text color-4 searchButton bg-color-5">Open Link</a>
            </p>


            <?php

        } elseif ($params['event'][0]['type'] == CommonConstants::SG_EVENT_TYPE_PHYSICAL){
            ?>
            <p class="col-s-6 col-m-6 col-l-6 heading margin-r text-right color-1">
                Location:
            </p>
            <p class="col-s-5 col-m-5 col-l-5 heading margin-l text color-1">
                <?php echo $params['event'][0]['location']?>
            </p>
            <?php
        }
        ?>

        <?php
        if (array_key_exists('callerId', $params['event'][0])){
            ?>
            <div class="col-s-12 col-m-12 col-l-12">
                <input class="col-s-12 col-m-12 col-l-12 normal-card bannerButton color-4 bg-color-6"
                       type="button"
                       value="Cancel Participation"
                       onclick="popup('popup', <?php echo \util\CommonConstants::POPUP_SHOW; ?>)">
            </div>
            <?php
        } else {
            ?>
            <form class="col-s-12 col-m-12 col-l-12" action="/participateSgEvent" method="post">
                <input type="hidden" name="eventId" value="<?php echo $params['request']['eventId']?>">
                <input type="hidden" name="sgId" value="<?php echo $params['request']['sgId']?>">
                <input class="col-s-12 col-m-12 col-l-12 bannerButton bg-color-1 color-4 heading"
                       type="submit" value="Participate">
            </form>
            <?php
        }
        ?>


    </div>

    <div class="col-s-0 col-m-1 col-l-2 color-0">.</div>

    <!--Cancel participation message popup----------------------------------------------------------------------------------->
    <div id="popup" class="col-s-7 col-m-8 col-l-6 popup-card list-card shadow-2 border-color-1 bg-color-4">
        <h2 class="col-s-12 col-m-12 col-l-12 text-center heading color-6">
            Your participation will be canceled!!
        </h2>
        <h4 class="col-s-12 col-m-12 col-l-12 text-center heading color-1">
            Do you really want to continue?<br>
            Your participation data will be deleted once you click "Continue" button.<br>
            You can cancel this process by clicking "Cancel" button.
        </h4>

        <div class="col-s-0 col-m-1 col-l-2 color-0">.</div>
        <input class="col-s-12 col-m-5 col-l-4 bannerButton color-4 normal-text bg-color-5"
               type="button"
               onclick="popup('popup', <?php echo \util\CommonConstants::POPUP_HIDE; ?>)"
               value="Cancel">

        <a href="/cancelSgEventParticipation?eventId=<?php echo $params['event'][0]['id']?>&sgId=<?php echo $params['sgId']?>">
            <input class="col-s-12 col-m-5 col-l-4 bannerButton color-4 normal-text bg-color-6"
                   type="button"
                   onclick="popup('popup', <?php echo \util\CommonConstants::POPUP_HIDE; ?>)"
                   value="Continue">
        </a>
        <div class="col-s-0 col-m-1 col-l-2 color-0">.</div>

    </div>
    <!--/Cancel participation message popup--------------------------------------------------------------------------------->

</div>

