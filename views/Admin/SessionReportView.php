<?php $params?>

    <link rel="stylesheet" href="http://localhost/assets/css/main.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,200;0,300;0,400;0,500;0,700;1,200&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
          rel="stylesheet"/>


<main>

    <div class="row flex-gap">
        <div class="col-l-12">
            <span class="head-text2">Session Report</span>
        </div>
    </div>
    <div class="row flex-container">

        <?php foreach ($sessionReportDetails as $row) {?>
        <div class="col-l-6 col-m-12 col-s-12 flex-gap1 primary-card card-content">
            <div class="col-l-12 col-m-12 col-s-12 padding-top-1 padding-bottom">
                <span class="session-text-heading bold">Befriender Name: <?php echo $row['befrienderFname']." ".$row['befrienderlname']?></span>
            </div>

            <div class="col-l-12 col-m-12 col-s-12 padding-bottom">
                <span class="session-text bold">Date: </span>
                <span class="session-text"><?php echo $row['date']?></span>
            </div>
            <div class="col-l-12 col-m-12 col-s-12 padding-bottom">
                <span class="session-text bold">Problem Type: </span>
                <span class="session-text"><?php echo $row['problemType']?></span>
            </div>
            <div class="col-l-12 col-m-12 col-s-12 padding-bottom">
                <span class="session-text bold">Session Type:</span>
                <span class="session-text"><?php echo $row['sessionType']?></span>
            </div>
            <div class="col-l-12 col-m-12 col-s-12 padding-bottom">
                <span class="session-text bold padding-bottom">Remarks:</span> <br>
                <p class="session-text">
                    <?php echo $row['remarks']?>
                </p>
            </div>

               <?php } ?>

        </div>
    </div>


</main>
