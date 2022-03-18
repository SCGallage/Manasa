<?php use util\CommonConstants;

//print_r($params)?>
<div class="col-s-12 col-m-12 col-l-12 list-card shadow-2 bg-color-3">
    <a class="col-s-12 col-m-12 col-l-12" href="/appointments">
        <input class="bannerButton bg-color-5 color-4 card-align-right" type="button" value="Appointment Function">
    </a>
    <h1 class="col-s-12 col-m-12 col-l-12 heading color-1 text-center">Appointment Info</h1>
    <div class="col-s-1 col-m-3 col-l-4 text-hidden">.</div>
    <div class="col-s-10 col-m-6 col-l-4">
        <p class="col-s-5 col-m-5 col-l-5 text-right heading color-1">
            Date
        </p>
        <p class="col-s-1 col-m-1 col-l-1 heading color-1">
            :
        </p>
        <p class="col-s-6 col-m-6 col-l-6 heading color-1">
            <?php echo $params['appointmentInfo'][0]['date']?>
        </p>
        <p class="col-s-5 col-m-5 col-l-5 text-right heading color-1">
            Start
        </p>
        <p class="col-s-1 col-m-1 col-l-1 heading color-1">
            :
        </p>
        <p class="col-s-6 col-m-6 col-l-6 heading color-1">
            <?php echo $params['appointmentInfo'][0]['startTime']?> a.m
        </p>
        <p class="col-s-5 col-m-5 col-l-5 text-right heading color-1">
            End
        </p>
        <p class="col-s-1 col-m-1 col-l-1 heading color-1">
            :
        </p>
        <p class="col-s-6 col-m-6 col-l-6 heading color-1">
            <?php echo $params['appointmentInfo'][0]['endTime']?> a.m
        </p>

        <?php
        if ($params['appointmentInfo'][0]['meeting_type'] == CommonConstants::MEETING_TYPE_ZOOM){
            ?>
            <p class="col-s-5 col-m-5 col-l-5 text-right heading color-1">
                Link
            </p>
            <p class="col-s-1 col-m-1 col-l-1 heading color-1">
                :
            </p>
            <a href="https://zoom.us/">
                <p class="col-s-6 col-m-6 col-l-6 heading color-1">
                    <?php echo $params['appointmentInfo'][0]['virtual_meeting']?>
                </p>
            </a>
            <?php
        }

        if ($params['appointmentInfo'][0]['meeting_type'] == CommonConstants::MEETING_TYPE_PHONE_CALL){
            ?>
            <p class="col-s-5 col-m-5 col-l-5 text-right heading color-1">
                Contact NO
            </p>
            <p class="col-s-1 col-m-1 col-l-1 heading color-1">
                :
            </p>
            <a href="https://zoom.us/">
                <p class="col-s-6 col-m-6 col-l-6 heading color-1">
                    <?php echo $params['appointmentInfo'][0]['virtual_meeting']?>
                </p>
            </a>
            <?php
        }
        ?>


        <form action="/cancelMeeting" method="post">
            <input class="col-s-12 col-m-12 col-l-12 color-4 bg-color-6 bannerButton normal-card"
                   type="button"
                   value="Cancel Appointment"
                   onclick="popup('popup', <?php echo CommonConstants::POPUP_SHOW; ?>)">
            <input type="hidden" name="id" value="<?php echo $params['appointmentInfo'][0]['id']?>">

            <!--Cancel Appointment message popup--------------------------------------------------------------------->
            <div id="popup" class="col-s-7 col-m-8 col-l-6 popup-card list-card shadow-2 border-color-1 bg-color-4">
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
                       onclick="popup('popup', <?php echo CommonConstants::POPUP_HIDE; ?>)"
                       value="Cancel">

                <a href="">
                    <input class="col-s-12 col-m-5 col-l-4 bannerButton color-4 normal-text bg-color-6"
                           type="submit"
                           onclick="popup('popup', <?php echo CommonConstants::POPUP_HIDE; ?>)"
                           value="Confirm">
                </a>
                <div class="col-s-0 col-m-1 col-l-2 color-0">.</div>

            </div>
            <!--/Cancel Appointment message popup-------------------------------------------------------------------->

        </form>


    </div>
    <div class="col-s-1 col-m-3 col-l-4 text-hidden">.</div>


</div>
