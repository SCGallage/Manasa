<!--<h1>Hello</h1>-->
<!--<h1>Start Date:--><?php //echo $startDate ?><!--</h1>-->
<!--<h1>End Date:--><?php //echo $endDate ?><!--</h1>-->
<input type="date" id="scheduleDate" min="<?php echo $startDate ?>" max="<?php echo $endDate ?>">

    <input type="text" id="befrienderId" value="51">
    <select id="shifts" name="shifts">
        <option>----------------</option>
    </select>
<button id="submitBtn">Submit</button>
<h4>Transfers:<?php print_r($transfers) ?></h4>
<h4>You Requested</h4>
<li id="transfer-list">
<?php
    foreach ($transfers as $transfer)
        echo "<ul>".$transfer["date"]." ".$transfer["startTime"]." ".$transfer["endTime"]." ".$transfer["fname"]." ".$transfer["lname"]." <button value='".$transfer['id']."'>Delete</button> </ul>";
?>
</li>
<h4>Requested From You</h4>
<h4>Requested Transfers:<?php print_r($requestedTransfers) ?></h4>
<li id="requested-transfer-list">
<?php
foreach ($requestedTransfers as $requestedTransfer)
    echo "<ul>".$requestedTransfer["date"]." ".$requestedTransfer["startTime"]." ".$requestedTransfer["endTime"]." ".$requestedTransfer["fname"]." ".$requestedTransfer["lname"]." <button name='accept' id='accept' value='".$requestedTransfer['id']."'>Accept</button> <button name='decline' value='".$requestedTransfer['id']."'>Decline</button> </ul>";
?>
</li>
<h4>Available Shifts:<?php print_r($availableShifts) ?></h4>
<div id="availableShiftList">
<?php
    foreach ($availableShifts as $availableShift){
        echo "<input type='radio' value='".$availableShift['shiftId']."' name='availableShifts' >".$availableShift['shiftId']." ".$availableShift["date"]." ".$availableShift['startTime']." ".$availableShift['endTime']."<br>";
    }
?>
</div>
<div id="checkbox-list">
    <input type="checkbox" name="select-all" id="select-all">
    <label>Select All</label>
</div>
<h4>Reserved Slots:<?php print_r($reservedSlots) ?></h4>
<div id="reservedShiftList">
<?php
foreach ($reservedSlots as $reservedSlot){
    echo "<input type='radio' value='".$reservedSlot['shiftId']."' name='reservedShifts' >".$reservedSlot['shiftId']." ".$reservedSlot["date"]." ".$reservedSlot['startTime']." ".$reservedSlot['endTime']."<br>";
}
?>
</div>
<button id="createRequest">Create Request</button>
<script src="<?php echo $_ENV['BASE_URL']?>/assets/js/befriender/shift_transfer.js"></script>

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
                <div class="befriender-row">
                    <input class="radio-btn" type="checkbox" name="availableShift" id="">
                    <span class="shift-id">Sanka Gallage</span>
                </div>
                <div class="befriender-row">
                    <input class="radio-btn" type="checkbox" name="availableShift" id="">
                    <span class="shift-id">Wusitha Madeewa</span>
                </div>
                <div class="btn-row">
                    <button class="reserver-btn">Reserve</button>
                </div>
            </div>
        </div>
        <div class="reserved-shift">
            <h5 class="shift-title">
                Reserved Shifts
            </h5>
            <div class="reserved-shift-list">
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
            <div class="available-shift-list">
                <div class="request-header">
                    <span class="header">Shift ID</span>
                    <span class="header">Date</span>
                    <span class="header">Start Time</span>
                    <span class="header">End Time</span>
                    <span class="header"></span>
                    <span class="header"></span>
                </div>
                <div class="request-row">
                    <span class="shift-id">0001</span>
                    <span class="shift-date">2022-01-25</span>
                    <span class="shift-start-time">11:00</span>
                    <span class="shift-end-time">13:00</span>
                    <button class="common-btn accept-btn">Accept</button>
                    <button class="common-btn decline-btn">Decline</button>
                </div>
            </div>
        </div>
    </div>
</main>