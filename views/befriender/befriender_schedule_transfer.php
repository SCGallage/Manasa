<main>
    <link rel="stylesheet" href="<?php echo $_ENV['BASE_URL']?>/assets/css/befriender/transferShift.css">
    <div class="shift-list-container">
        <div class="available-shift">
            <h5 class="shift-title">
                Available Shifts
            </h5>
            <div class="available-shift-list" id="availableShiftList">
                <div class="shift-header">
                    <span class="header"></span>
                    <span class="header">Shift ID</span>
                    <span class="header">Date</span>
                    <span class="header">Start Time</span>
                    <span class="header">End Time</span>
                </div>
                <!--<div class="shift-row">
                    <input class="radio-btn" type="radio" name="availableShift" id="">
                    <span class="shift-id">0001</span>
                    <span class="shift-date">2022-01-25</span>
                    <span class="shift-start-time">11:00</span>
                    <span class="shift-end-time">13:00</span>
                </div>-->
                <?php
                    foreach ($availableShifts as $availableShift) {
                        echo "
                        <div class=\"shift-row\">
                            <input value='{$availableShift['shiftId']}' class=\"radio-btn\" type=\"radio\" name=\"availableShift\" id=\"\">
                            <span class=\"shift-id\">{$availableShift['shiftId']}</span>
                            <span class=\"shift-date\">{$availableShift['date']}</span>
                            <span class=\"shift-start-time\">{$availableShift['startTime']}</span>
                            <span class=\"shift-end-time\">{$availableShift['endTime']}</span>
                        </div>";
                    }
                ?>
            </div>
        </div>
        <div class="shift-befriender">
            <h5 class="shift-title">
                Befriender List
            </h5>
            <div class="shift-befriender-list">
                <div class="befriender-header">
                    <input class="radio-btn" type="checkbox" name="" id="">
                    <span class="header">Select All</span>
                </div>
                <div id="checkbox-list">

                </div>
                <!--<div class="befriender-row">
                    <input class="radio-btn" type="checkbox" name="availableShift" id="">
                    <span class="shift-id">Sanka Gallage</span>
                </div>
                <div class="befriender-row">
                    <input class="radio-btn" type="checkbox" name="availableShift" id="">
                    <span class="shift-id">Wusitha Madeewa</span>
                </div>-->
                <div class="btn-row">
                    <button id="submitBtn" class="reserver-btn">Reserve</button>
                </div>
            </div>
        </div>
        <div class="reserved-shift">
            <h5 class="shift-title">
                Reserved Shifts
            </h5>
            <div class="reserved-shift-list" id="reservedShiftList">
                <div class="shift-header">
                    <span class="header"></span>
                    <span class="header">Shift ID</span>
                    <span class="header">Date</span>
                    <span class="header">Start Time</span>
                    <span class="header">End Time</span>
                </div>
                <!--<div class="shift-row">
                    <input class="radio-btn" type="radio" name="availableShift" id="">
                    <span class="shift-id">0001</span>
                    <span class="shift-date">2022-01-25</span>
                    <span class="shift-start-time">11:00</span>
                    <span class="shift-end-time">13:00</span>
                </div>-->
                <?php
                foreach ($reservedSlots as $reservedSlot) {
                    echo "
                        <div class=\"shift-row\">
                            <input value='{$reservedSlot['shiftId']}' class=\"radio-btn\" type=\"radio\" name=\"availableShift\" id=\"\">
                            <span class=\"shift-id\">{$reservedSlot['shiftId']}</span>
                            <span class=\"shift-date\">{$reservedSlot['date']}</span>
                            <span class=\"shift-start-time\">{$reservedSlot['startTime']}</span>
                            <span class=\"shift-end-time\">{$reservedSlot['endTime']}</span>
                        </div>";
                }
                ?>
            </div>
        </div>
    </div>
    <div class="shift-list-container">
        <div class="available-shift">
            <h5 class="shift-title">
                Available Requests
            </h5>
            <div class="available-shift-list" id="transfer-list">
                <div class="request-header">
                    <span class="header">Shift ID</span>
                    <span class="header">Date</span>
                    <span class="header">Start Time</span>
                    <span class="header">End Time</span>
                    <span class="header"></span>
                    <span class="header"></span>
                </div>
                <!--<div class="request-row">
                    <span class="shift-id">0001</span>
                    <span class="shift-date">2022-01-25</span>
                    <span class="shift-start-time">11:00</span>
                    <span class="shift-end-time">13:00</span>
                    <button value='$transfer['id']' class="common-btn accept-btn">Accept</button>
                    <button class="common-btn decline-btn">Decline</button>
                </div>-->
                <?php
                    foreach ($transfers as $transfer)
                        echo "
                        <div class=\"request-row\">
                            <span class=\"shift-id\">{$transfer['shiftId']}</span>
                            <span class=\"shift-date\">{$transfer["date"]}</span>
                            <span class=\"shift-start-time\">{$transfer["startTime"]}</span>
                            <span class=\"shift-end-time\">{$transfer["endTime"]}</span>
                            <button name='accept' value='{$transfer['shiftId']}' class=\"common-btn accept-btn\">Accept</button>
                            <button name='decline' value='{$transfer['shiftId']}' class=\"common-btn decline-btn\">Decline</button>
                        </div>";
                ?>
            </div>
        </div>
    </div>
</main>
<script src="<?php echo $_ENV['BASE_URL']?>/assets/js/befriender/shift_transfer.js"></script>