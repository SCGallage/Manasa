<?php $params
?>

    <link rel="stylesheet" href="http://localhost/assets/css/main.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,200;0,300;0,400;0,500;0,700;1,200&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
          rel="stylesheet"/>

<main>

    <div class="row flex-gap">
        <div class="col-l-12">
            <div class="col-l-6">
                <span class="head-text2">Schedule</span>
            </div>
            <div class="col-l-6">
                <span class="add-text padding-top"><a href="/mod/upcomingSchedule"> Upcoming Schedule  </a></span>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-l-12 col-m-12 col-s-12 upper-box card-content ">
            <div class="col-l-12 col-m-12 col-s-12 ">
                <div class="col-l-11 col-m-12 col-s-12 padding-top">
                    <span class="head-text">Current Schedule</span>
                </div>
                <?php foreach ($scheduleInfo as $scheduleData) {
                }?>
                <div class="col-l-1 col-m-12 col-s-12 padding-top">
                    <?php if ($scheduleData['state']==1){?>
                    <form method="post" action="/mod/unlockSchedule" name="unlockForm" id="unlockForm">
                    <label class="switch">
                        <input type="hidden" class="button1" value="<?php echo $scheduleData['scheduleId']?>" name="scheduleId">
                        <input type="checkbox" name="state" id="state" onclick="document.forms.unlockForm.submit();" checked />
                        <span class="slider"></span>
                    </label>
                    </form>
                    <?php }else{?>
                    <form method="post" action="/mod/lockSchedule">
                        <label class="switch">
                            <input type="submit">
                            <input type="hidden" class="button1" value="<?php echo $scheduleData['scheduleId']?>" name="scheduleId">
                            <span class="slider"></span>
                        </label>
                    </form>
                    <?php } ?>
                </div>
            </div>

            <div class="col-l-12 col-m-12 col-s-13 ">
                <span class="duration"><?php echo $scheduleData['startDate']?> TO <?php echo $scheduleData['endDate']?></span>
            </div>

            <div class="col-l-12 col-m-12 col-s-12 card2">
                    <div class="grid-container-01 col-l-12">
                        <div></div>
<!--                        Display Dates from 1-7 -->
                        <?php
                        for ($i=0;$i<7;$i++){
                            $dt = $array[$i];
                            ?>

                        <div class="grid-item-day">
                            <span class="day"><?php echo date('l', strtotime($dt)); ?></span>
                            <span class="date"><?php echo date('Y-m-d', strtotime($dt)); ?></span>
                        </div>

                        <?php }?>
                    </div>
                    <div class="grid-container-02">
                        <div class="grid-item-time">
                            <span class="time-start">8.00</span>
                            <span class="time-end">12.00</span>
                        </div>
                    <?php foreach ($morningShifts1 as $data) { ?>
                        <div class="grid-item-slot">
                            <span class="slot-id">Slot <?php echo $data['shiftId']?></span>
                            <span class="slot-remain">Remaining: <?php echo (5 - $data['num_of_befrienders']); ?></span>
                            <div class="lables">
                                <?php if ($data['state']==1){?>
                                <span class="label-closed">CLOSED</span>
                                <?php }elseif (5 - $data['num_of_befrienders'] == 0){ ?>
                                <span class="label-reserved">RESERVED</span>
                                <?php }else{ ?>
                                <span class="label-available">AVAILABLE</span>
                                <?php } ?>
                            </div>
                            <button class="view-btn"><a href="/mod/ScheduleSelect?id=<?php echo $data['shiftId']?>&scheduleId=<?php echo $scheduleData['scheduleId']?>">VIEW</a></button>
                        </div>
                    <?php }?>
                        <div class="grid-item-time">
                            <span class="time-start">13.00</span>
                            <span class="time-end">15.00</span>
                        </div>
                        <?php foreach ($eveningShifts1 as $data) { ?>
                            <div class="grid-item-slot">
                                <span class="slot-id">Slot <?php echo $data['shiftId']?></span>
                                <span class="slot-remain">Remaining: <?php echo (5 - $data['num_of_befrienders']); ?></span>
                                <div class="lables">
                                    <?php if ($data['state']==1){?>
                                        <span class="label-closed">CLOSED</span>
                                    <?php }elseif (5 - $data['num_of_befrienders'] == 0){ ?>
                                        <span class="label-reserved">RESERVED</span>
                                    <?php }else{ ?>
                                        <span class="label-available">AVAILABLE</span>
                                    <?php } ?>
                                </div>
                                <button class="view-btn"><a href="/mod/ScheduleSelect?id=<?php echo $data['shiftId']?>&scheduleId=<?php echo $scheduleData['scheduleId']?>">VIEW</a></button>
                            </div>
                        <?php }?>
            </div>
            </div>
            <div class="col-l-12 col-m-12 col-s-12 card2">
                    <div class="grid-container-01 col-l-12">
                        <div></div>
<!--                        Display Dates from 7-8-->
                        <?php for ($i=7;$i<count($array);$i++){
                            $dt = $array[$i];
                            ?>

                            <div class="grid-item-day">
                                <span class="day"><?php echo date('l', strtotime($dt)); ?></span>
                                <span class="date"><?php echo date('Y-m-d', strtotime($dt)); ?></span>
                            </div>

                        <?php }?>
                    </div>
                    <div class="grid-container-02">
                        <div class="grid-item-time">
                            <span class="time-start">8.00</span>
                            <span class="time-end">12.00</span>
                        </div>

                        <?php foreach ($morningShifts2 as $data) { ?>
                            <div class="grid-item-slot">
                                <span class="slot-id">Slot <?php echo $data['shiftId']?></span>
                                <span class="slot-remain">Remaining: <?php echo (5 - $data['num_of_befrienders']); ?></span>
                                <div class="lables">
                                    <?php if ($data['state']==1){?>
                                        <span class="label-closed">CLOSED</span>
                                    <?php }elseif (5 - $data['num_of_befrienders'] == 0){ ?>
                                        <span class="label-reserved">RESERVED</span>
                                    <?php }else{ ?>
                                        <span class="label-available">AVAILABLE</span>
                                    <?php } ?>
                                </div>
                                <button class="view-btn"><a href="/mod/ScheduleSelect?id=<?php echo $data['shiftId']?>&scheduleId=<?php echo $scheduleData['scheduleId']?>">VIEW</a></button>
                            </div>
                        <?php }?>

                        <div class="grid-item-time">
                            <span class="time-start">13.00</span>
                            <span class="time-end">15.00</span>
                        </div>
                        <?php foreach ($eveningShifts2 as $data) { ?>
                            <div class="grid-item-slot">
                                <span class="slot-id">Slot <?php echo $data['shiftId']?></span>
                                <span class="slot-remain">Remaining: <?php echo (5 - $data['num_of_befrienders']); ?></span>
                                <div class="lables">
                                    <?php if ($data['state']==1){?>
                                        <span class="label-closed">CLOSED</span>
                                    <?php }elseif (5 - $data['num_of_befrienders'] == 0){ ?>
                                        <span class="label-reserved">RESERVED</span>
                                    <?php }else{ ?>
                                        <span class="label-available">AVAILABLE</span>
                                    <?php } ?>
                                </div>
                                <button class="view-btn"><a href="/mod/ScheduleSelect?id=<?php echo $data['shiftId']?>&scheduleId=<?php echo $scheduleData['scheduleId']?>">VIEW</a></button>
                            </div>
                        <?php }?>
                    </div>
            </div>

            <div class="col-l-12 col-m-12 col-s-12 padding1">
                <span class="button1">
                    <a href="/mod/FixSchedule?scheduleId=<?php echo $scheduleData['scheduleId']?>">
                        Set Schedule
                    </a>
                </span>
            </div>

        </div>
    </div>


</main>


