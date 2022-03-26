<?php $params ?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="http://localhost/assets/css/main.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,200;0,300;0,400;0,500;0,700;1,200&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
          rel="stylesheet"/>
</head>
<body>
<main>

    <?php foreach ($viewEvent as $key => $data){?>
    <div class="row flex-gap">
        <div class="col-l-12">
            <span class="head-text2">Select Volunteers</span>
        </div>
        <div class="col-l-12 padding-top">
            <span class="head-text4">Event Name: <?php echo $data['name']?></span>
        </div>
        <div class="col-l-12">
            <span class="head-text4">Event capacity: <?php echo $data['capacity']?></span>
        </div>
    </div>

    <div class="row row-style flex-container">
        <div class="col-l-6 col-m-12 col-s-12 primary-card flex-gap1 card-content ">

            <div class="col-l-12 col-m-12 col-s-12">
                <div class="col-l-12 col-m-12 col-s-12">
                    <div class="col-l-10 col-m-10 col-s-10">
                        <span class="head-text">Participating Volunteers</span>
                    </div>
                    <div class="col-l-2 col-m-2 col-s-2">
                        <a href="/admin/volParticipateReport?id=<?php echo $data['id']?>&name=<?php echo $data['name']?>"> <button class="button1">Report</button></a>
                    </div>
                </div>

                <div class="col-l-12 col-m-12 col-s-12">
                    <span class="head-text">Total Participants: <?php echo $participantsCount?></span>
                </div>

                <div class="col-l-12 col-m-12 col-s-12 scroll1">

                    <?php foreach ($participants as $key => $selectedParticipants){?>
                    <div class="upper-box-details card1 margin-top">
                        <div class="col-l-12 col-m-12 col-s-12">
                            <span><?php echo $selectedParticipants['fname']." ".$selectedParticipants['lname'];?></span><br>
                            <td> <a href="/mod/rejectVolunteer?id=<?php echo $selectedParticipants['volunteerId'] ?>" class="cancel-button-1">Reject</a></td>
                        </div>
                    </div>
                    <?php }?>
                </div>
            </div>

        </div>

        <div class="col-l-6 col-m-12 col-s-12 primary-card flex-gap1 card-content">



            <div class="col-l-12 col-m-12 col-s-12">
                <span class="head-text">Requests</span>
            </div>
            <div class="col-l-12 col-m-12 col-s-12">
                <span class="head-text">Total Requests:<?php echo $participantRequestsCount?></span>
            </div>

            <div class="col-l-12 col-m-12 col-s-12 scroll2 margin-top">

                <table class="custom-table">
                    <tr>
                        <th>Volunteer</th>
                        <th></th>
                        <th></th>
                    </tr>
                    <?php
                    foreach ($participantRequests as $req) {
                        ?>
                        <tr>
                            <td><?php echo $req['fname']." ".$req['lname']?></td>

                            <!--                                    Hide accept button if participant capacity is filled -->
                            <?php  if ($participantsCount == $data['capacity'] ){ ?>
                            <td> <a href="/mod/rejectVolunteer?id=<?php echo $req['volunteerId'] ?>" class="cancel-button">Reject</a></td>
                            <?php }else{ ?>
                            <td>
                                <form method="post" action="/mod/acceptVolunteer">
                                    <input type="submit" class="button1" value="Accept" name="state">
                                    <input type="hidden" class="button1" value="<?php echo $req['volunteerId']?>" name="id">
                                </form>
                            </td>
                            <td> <a href="/mod/rejectVolunteer?id=<?php echo $req['volunteerId'] ?>" class="cancel-button">Reject</a></td>
                            <?php }?>
                        </tr>

                        <?php
                    }
                    ?>


            </div>
        </div>
    </div>
<?php }?>

</main>

<script src="http://localhost/assets/js/admin/calendar.js" ></script>

</body>
</html>
