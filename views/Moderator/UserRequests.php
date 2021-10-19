<?php $params ?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Search User</title>
    <link rel="stylesheet" href="./assets/css/main.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,200;0,300;0,400;0,500;0,700;1,200&display=swap" rel="stylesheet">

</head>
<body>
<main>

    <div class="row flex-container">
        <div class="col-l-12 col-m-12 col-s-12 flex-gap">
            <span class="head-text2">User Requests</span>
        </div>
    </div>

    <div class="row row-style flex-container">
        <div class="col-l-12 col-m-12 col-s-12 primary-card flex-gap">
            <div class="col-l-12 col-m-12 col-s-12 padding1">
                <span class="head-text">Berinder</span>
            </div>

            <div class="col-l-12 col-m-12 col-s-12">
                <table>
                    <tr>
                        <th>User Name</th>
                        <th>Email</th>
                        <th>User Type</th>
                        <th>start Date</th>
                        <th>end Date</th>
                        <th></th>
                        <th></th>
                    </tr>

                    <?php
                    foreach ($viewUserRequests as $row) { ?>
                    <tr>
                        <td><?php echo $row['fname']." ".$row['lname']?></td>
                        <td><?php echo $row['email']?></td>
                        <td><?php echo $row['type']?></td>
                        <td><?php echo $row['startDate']?></td>
                        <td><?php echo $row['endDate']?></td>
                        <td> <a href="#" class="button1">Accept</a></td>
                        <td> <a href="#" class="button6">Reject</a></td>
                    </tr>
                    <?php } ?>
<!--                    <tr>-->
<!--                        <td>Peter Griffin</td>-->
<!--                        <td>Peter Griffin@gmail.com</td>-->
<!--                        <td>Male</td>-->
<!--                        <td>077229667</td>-->
<!--                        <td>21</td>-->
<!--                        <td>Male</td>-->
<!--                        <td>Pending</td>-->
<!--                        <td> <a href="#" class="button1">Accept</a></td>-->
<!--                        <td> <a href="#" class="button6">Reject</a></td>-->
<!--                    </tr>-->
<!--                    <tr>-->
<!--                        <td>Peter Griffin</td>-->
<!--                        <td>Peter Griffin@gmail.com</td>-->
<!--                        <td>Male</td>-->
<!--                        <td>077229667</td>-->
<!--                        <td>21</td>-->
<!--                        <td>Male</td>-->
<!--                        <td>Pending</td>-->
<!--                        <td> <a href="#" class="button1">Accept</a></td>-->
<!--                        <td> <a href="#" class="button6">Reject</a></td>-->
<!--                    </tr>-->
<!--                    <tr>-->
<!--                        <td>Peter Griffin</td>-->
<!--                        <td>Peter Griffin@gmail.com</td>-->
<!--                        <td>Male</td>-->
<!--                        <td>077229667</td>-->
<!--                        <td>21</td>-->
<!--                        <td>Male</td>-->
<!--                        <td>Pending</td>-->
<!--                        <td> <a href="#" class="button1">Accept</a></td>-->
<!--                        <td> <a href="#" class="button6">Reject</a></td>-->
<!--                    </tr>-->
                </table>
            </div>
        </div>
    </div>

</main>



</body>
</html>
