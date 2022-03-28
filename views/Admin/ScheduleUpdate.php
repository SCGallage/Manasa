<?php $params
?>

    <link rel="stylesheet" href="http://localhost/assets/css/main.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,200;0,300;0,400;0,500;0,700;1,200&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
          rel="stylesheet"/>

<main>

    <div class="row flex-gap">
        <div class="head-text2 col-l-12 col-m-12 col-s-12 flex-gap">
            <span>Finalize Schedule</span>
        </div>
    </div>

    <div class="row row-style flex-container">
        <div class="col-l-12 col-m-12 col-s-12 primary-card flex-gap1 card-content ">

            <div class="col-l-12 col-m-12 col-s-12">
                <div class="col-l-12 col-m-12 col-s-12 padding1">
                    <span class="head-text">Empty Timeslots</span>
                </div>

                <div class="col-l-12 col-m-12 col-s-12">
                    <table>

                    <?php foreach ($emptySlots as $emptySlot){?>
                        <tr>
                           <td><span class="select-text">Shift ID: <?php echo $emptySlot['shiftId']?></span></td>
                           <td><span class="select-text">Date: <?php echo $emptySlot['date']?></span></td>
                            <td> <span class="select-text">Time: <?php echo $emptySlot['startTime']." - ".$emptySlot['endTime']?> </span></td>
                            <td><span class="select-text">No. of empty slots: <?php echo ($_ENV['bef_limit']-$emptySlot['num_of_befrienders'])?></span></td>
                            <td><a href="/admin/ScheduleSelect?id=<?php echo $emptySlot['shiftId']?>&scheduleId=<?php echo $data['scheduleId']?>"><input type="button" class="button1" value="Assign" name="state"> </a></td>
                        <tr>
                        </div>
                    <?php }?>
                    </table>

            </div>

        </div>
    </div>


</main>


