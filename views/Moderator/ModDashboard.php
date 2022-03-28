<?php $params
?>

    <link rel="stylesheet" href="http://localhost/assets/css/main.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,200;0,300;0,400;0,500;0,700;1,200&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet"/>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
          rel="stylesheet"/>

</head>
<body>
<main>

    <div class="row flex-container">
        <div class="col-l-6 col-m-12 col-s-12 flex-gap primary-card card-content">
            <div class="col-l-12 col-m-12 col-s-12">
                <div class="col-l-8 flex-container2">
                    <div class="col-l-12"><span class="head-text">User Requests</span></div>
                    <div class="col-l-12 text-style3 padding1"><span>Count: <?php echo $viewUserRequestsCount?></span></div>
                </div>
                <div class="col-l-4">
                    <a href="/mod/UserRequests" class="button1">Review</a>
                </div>
            </div>

            <div class="col-l-12 col-m-12 col-s-12 scroll1">
                <table>
                    <tr>
                        <th>Name</th>
                        <th>User Type</th>
                        <th>State</th>
                    </tr>
                    <?php
                    foreach ($viewUserRequests as $row) { ?>
                    <tr>
                        <td><?php echo $row['fname']." ".$row['lname']?></td>
                        <td><?php echo $row['type']?></td>
                        <td><?php
                            if ($row['state'] == 1) {
                                echo 'Active';
                            }
                            elseif ($row['state'] == 0){
                                echo 'Inactive';
                            }
                            ?></td>
                    </tr>
                    <?php } ?>

                </table>
            </div>
        </div>

        <div class="col-l-6 col-m-12 col-s-12 flex-gap primary-card card-content">
            <div class="col-l-12 col-m-12 col-s-12">
                <span class="head-text">Upcoming Events</span>
            </div>

            <div class="col-l-12 col-m-12 col-s-12 scroll1">
                <?php foreach ($events as $row1){?>
                <div class="upper-box-details card1 margin-top">
                    <div class="col-l-12 col-m-12 col-s-12 text-style3"><?php echo $row1['name']?></div>
                    <div class="col-l-12 col-m-12 col-s-12">
                        <span>Date: <?php echo $row1['startDate']?></span><br>
                        <span>Time: <?php echo $row1['startTime']?></span><br>
                        <span>Location: <?php echo $row1['location']?></span>
                    </div>
                </div>
                <?php }?>
            </div>
        </div>
    </div>

    <div class="row row-style flex-container">
        <div class="col-l-12 col-m-12 col-s-12 primary-card flex-gap ">
            <div class="col-l-12 col-m-12 col-s-12 flex-container2 padding1">
                <span class="head-text">Meetings</span>
            </div>

            <div class="col-l-12 col-m-12 col-s-12 table-overflow">
                <table>
                    <?php if ($meetingCount==0){?>
                        <tr><td class="no-record">No meetings for the Date</td></tr>
                    <?php }else{ ?>
                        <tr>

                            <th>Meeting ID</th>
                            <th>Date</th>
                            <th>Duration</th>
                            <th>Meeting Type</th>
                            <th>Befriender</th>
                        </tr>
                        <?php
                        foreach ($meetingDetails as $row) { ?>
                            <tr>
                                <td><?php echo $row['id']?></td>
                                <td><?php echo $row['date']?></td>
                                <td><?php echo $row['startTime']." - ".$row['endTime']?></td>
                                <td><?php echo $row['meeting_type']?></td>
                                <td><?php echo $row['fname']."  ".$row['lname']?></td>
                            </tr>
                        <?php }?>
                    <?php } ?>
                </table>
            </div>
        </div>
    </div>
</main>

</body>
</html>
