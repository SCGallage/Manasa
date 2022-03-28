<?php $params ?>

    <link rel="stylesheet" href="http://localhost/assets/css/main.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,200;0,300;0,400;0,500;0,700;1,200&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
          rel="stylesheet"/>

<main>

    <?php foreach ($shiftData as $shiftData) {
    }?>
    <div class="row flex-gap">
        <div class="col-l-12">
            <span class="head-text2">Befrienders for Slot <?php echo $data['id']?></span>
        </div>
        <?php if($shiftData['state'] == 1){?>
            <div class="col-l-12">
                <form method="post" action="/admin/openSlot">
                    <input type="submit" class="button1" name="state" value="Open Slot">
                    <input type="hidden" class="button1" value="<?php echo $data['id']?>" name="shiftId">
                    <input type="hidden" class="button1" value="<?php echo $data['scheduleId']?>" name="scheduleId">
                </form>
            </div>
            <div class="col-l-12 padding-top text-align-center" >
                <span class="slot-close">This Slot has been closed</span>
            </div>
        <?php }else{?>
        <div class="col-l-12">
            <form method="post" action="/admin/closeSlot">
                <input type="submit" class="cancel-button" name="state" value="Close Slot">
                <input type="hidden" class="button1" value="<?php echo $data['id']?>" name="shiftId">
                <input type="hidden" class="button1" value="<?php echo $data['scheduleId']?>" name="scheduleId">
            </form>
        </div>

    </div>

    <div class="row row-style flex-container">
        <div class="col-l-6 col-m-12 col-s-12 primary-card flex-gap1 card-content ">

            <div class="col-l-12 col-m-12 col-s-12">
                <div class="col-l-12 col-m-12 col-s-12">
                    <div class="col-l-10 col-m-10 col-s-10">
                        <span class="head-text">Scheduled Befrienders</span>
                    </div>
                </div>

                <div class="col-l-12 col-m-12 col-s-12 scroll3">

                    <?php foreach ($befrienderParticipate as $selectedParticipants){?>
                    <div class="upper-box-details card1 margin-top">
                        <div class="col-l-12 col-m-12 col-s-12">
                            <span class="select-text"><?php echo $selectedParticipants['fname']." ".$selectedParticipants['lname']?></span><br>
                            <td> <a href="/admin/removeBefriender?id=<?php echo $selectedParticipants['befrienderId'] ?>&shiftId=<?php echo $data['id']?>&scheduleId=<?php echo $data['scheduleId']?>" class="cancel-button-1">Remove</a></td>
                        </div>
                    </div>
                    <?php }?>
                </div>
            </div>

        </div>

        <div class="col-l-6 col-m-12 col-s-12 primary-card flex-gap1 card-content">



            <div class="col-l-12 col-m-12 col-s-12">
                <span class="head-text">Assign Befriender</span>
            </div>
            <div class="col-l-12 col-m-12 col-s-12">
                <span class="head-text">Total Requests:<?php echo $_ENV['bef_limit']?></span>
            </div>
            <div class="col-l-12 col-m-12 col-s-12 scroll3 margin-top">

                <table class="custom-table">
                    <?php if ($befrienderParticipateCount == $_ENV['bef_limit']){?>
                        <tr>
                            <td class="no-record">Time slot Reserved</td>
                        </tr>
                        <tr>
                            <td class="no-record">Remove participant to assign befriender</td>
                        </tr>
                    <?php }else{?>
                    <tr>
                        <th>Befrienders</th>
                        <th></th>
                        <th></th>
                    </tr>
                    <?php
                    foreach ($availableBefriender as $req) {
                        ?>
                        <tr>
                            <td><?php echo $req['fname']." ".$req['lname']?></td>
                            <td></td>
                            <td>
                                <form method="post" action="/admin/assignBefriender">
                                    <input type="hidden" class="button1" value="<?php echo $req['id']?>" name="befrienderId">
                                    <input type="hidden" class="button1" value="<?php echo $data['id']?>" name="shiftId">
                                    <input type="hidden" class="button1" value="<?php echo $data['scheduleId']?>" name="scheduleId">
                                    <input type="submit" class="button1" value="Assign" name="state">
                                </form>
                            </td>
                        </tr>

                    <?php }}?>
                </table>
            </div>
        </div>
    </div>

    <?php }?>
</main>


