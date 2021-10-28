<?php $params ?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Support Group</title>
    <link rel="stylesheet" href="http://localhost/assets/css/main.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,200;0,300;0,400;0,500;0,700;1,200&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
          rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
          rel="stylesheet"/>
</head>
<body>
<main>

    <div class="row flex-container">

        <div class="col-l-12 col-m-12 col-s-12 flex-gap">
            <div class="col-l-6 col-m-12 col-s-12">
                <span class="head-text2">Support Groups</span>
            </div>
            <div class="col-l-6 col-m-12 col-s-12">
                <a href="/admin/createSG"><button class="button1 " id="createSG" >Create Support Group</button></a>
            </div>
        </div>
    </div>

    <div class="row flex-container">
        <div class="col-l-6 col-m-12 col-s-12 flex-gap1 primary-card card-content">
            <div class="col-l-12 col-m-12 col-s-12">
                <span class="head-text">Types of Support Groups</span>
            </div>

            <div class="col-l-12 col-m-12 col-s-12 doughnut">
                <canvas id="avarage"></canvas>
            </div>
        </div>

        <div class="col-l-6 col-m-12 col-s-12 flex-gap1 primary-card card-content">
            <div class="col-l-12 col-m-12 col-s-12">
            <div class="col-l-8 flex-container2">
                <div class="col-l-12"><span class="head-text">Support Group Requests</span></div>
            </div>
            <div class="col-l-4">
                <a href="/admin/SGRequests" class="button1">Review</a>
            </div>
            </div>

            <div class="col-l-12 col-m-12 col-s-12 scroll1 padding-top">
                <table class="custom-table">
                    <tr>
                        <th>Befriender</th>
                        <th>Type</th>
                        <th>Capacity</th>
                        <th></th>
                        <th></th>
                    </tr>
                    <?php
                    foreach ($viewSGRequest as $req) {
                    ?>
                    <tr>
                        <td><?php echo $req['fname']." ".$req['lname']?></td>
                        <td><?php echo $req['type']?></td>
                        <td><?php echo $req['capacity']?></td>
                        <td> <a href="/admin/SGRequestsUpdate?id=<?php echo $req['id'] ?>" class="button1">Accept</a></td>
                        <td> <a href="/admin/SGRequestsDelete?id=<?php echo $req['id'] ?>" class="cancel-button">Reject</a></td>
                    </tr>

                    <?php
                    }
                    ?>
<!--                    <tr>-->
<!--                        <td>Peter Griffin</td>-->
<!--                        <td>Cancer</td>-->
<!--                        <td> <button class="button1 createSG" id="update">Accept</button></td>-->
<!--                        <td> <a href="#" class="button6">Reject</a></td>-->
<!--                    </tr>-->
<!---->
<!--                    <tr>-->
<!--                        <td>Peter Griffin</td>-->
<!--                        <td>Cancer</td>-->
<!--                        <td> <a href="#" class="button1 createSG">Accept</a></td>-->
<!--                        <td> <a href="#" class="button6">Reject</a></td>-->
<!--                    </tr>-->
<!---->
<!--                    <tr>-->
<!--                        <td>Peter Griffin</td>-->
<!--                        <td>Cancer</td>-->
<!--                        <td> <a href="#" class="button1">Accept</a></td>-->
<!--                        <td> <a href="#" class="button6">Reject</a></td>-->
<!--                    </tr>-->
<!---->
<!--                    <td>Peter Griffin</td>-->
<!--                    <td>Cancer</td>-->
<!--                    <td> <a href="#" class="button1">Accept</a></td>-->
<!--                    <td> <a href="#" class="button6">Reject</a></td>-->
<!--                    </tr>-->
<!---->
<!--                    <tr>-->
<!--                        <td>Peter Griffin</td>-->
<!--                        <td>Cancer</td>-->
<!--                        <td> <button class="button1" id="update">Accept</button></td>-->
<!--                        <td> <a href="#" class="button6">Reject</a></td>-->
<!--                    </tr>-->
<!---->
<!--                    <tr>-->
<!--                        <td>Peter Griffin</td>-->
<!--                        <td>Cancer</td>-->
<!--                        <td> <a href="#" class="button1">Accept</a></td>-->
<!--                        <td> <a href="#" class="button6">Reject</a></td>-->
<!--                    </tr>-->
<!---->
<!--                    <tr>-->
<!--                        <td>Peter Griffin</td>-->
<!--                        <td>Cancer</td>-->
<!--                        <td> <a href="#" class="button1">Accept</a></td>-->
<!--                        <td> <a href="#" class="button6">Reject</a></td>-->
<!--                    </tr>-->

                </table>
            </div>
        </div>
    </div>

    <div class="row row-style flex-container">
        <div class="col-l-12 col-m-12 col-s-12 primary-card flex-gap ">
            <div class="col-l-12 col-m-12 col-s-12 card-content">
                <span class="head-text">Support Groups</span>
            </div>

            <div class="col-l-12 col-m-12 col-s-12 table-overflow">

                <table>
                    <tr>
                        <th>Support Group Name</th>
                        <th>Facilitator</th>
                        <th>Co-Facilitator</th>
                        <th>Participants</th>
                        <th>Type</th>
                        <th>State</th>
                        <th></th>
                        <th></th>
                    </tr>
                    <?php
                    foreach ($viewSG as $row) {?>

                        <tr>
                            <td><?php echo $row['name'] ?></td>
                            <td><?php echo $row['facilitatorfname']." ".$row['facilitatorlname'] ?></td>
                            <td><?php echo $row['co_facilitatorfname']." ".$row['co_facilitatorlname'] ?></td>
                            <td><?php echo $row['participants'] ?></td>
                            <td><?php echo $row['type'] ?></td>
                            <td><?php
                                    if ($row['state'] == 1) {
                                        echo 'Active';
                                    }
                                    elseif ($row['state'] == 0){
                                        echo 'Inactive';
                                    }
                                ?></td>
                            <td><a href="/admin/updateSG?SupportGroupId=<?php echo $row['id'] ?>"><span class="material-icons" id="updateSG">edit</span></a></td>
                            <td><a href="/admin/deleteSG?id=<?php echo $row['id'] ?>" ><span class="material-icons">delete</span></a></td>
                        </tr>
                        <?php
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>

</main>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.5.1/chart.min.js"></script>
<script src="http://localhost/assets/js/admin/Graph.js" ></script>
<script src="http://localhost/assets/js/admin/AdminBackEnd.js" ></script>
<script src="http://localhost/assets/js/admin/formValidation.js" ></script>
</body>
</html>