<?php $params ?>

    <link rel="stylesheet" href="http://localhost/assets/css/main.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,200;0,300;0,400;0,500;0,700;1,200&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
          rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
          rel="stylesheet"/>

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
                <canvas id="supportGroupChart"></canvas>
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
                        <td> <a href="/admin/SGRequestsUpdate?id=<?php echo $req['id'] ?>&capacity=<?php echo $req['capacity'] ?>&type=<?php echo $req['type']?>&name=<?php echo $req['name'] ?>" class="button1">Accept</a></td>
                        <td> <a href="/admin/SGRequestsDelete?id=<?php echo $req['id'] ?>" class="cancel-button">Reject</a></td>
                    </tr>

                    <?php
                    }
                    ?>

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
                            <td><a onclick="document.getElementById('deleteSG<?php echo $row['id']?>').style.display='block'" ><span class="material-icons">delete</span></a></td>

                            <!--Supoort Group Delete Confirmation ----------------------------------------------------------------------------------------->

                            <div id="deleteSG<?php echo $row['id']?>" class="modal">
                                    <div class="modal-content modal-container">
                                        <span onclick="document.getElementById('deleteSG<?php echo $row['id']?>').style.display='none'" class="close" title="Close">×</span>
                                        <span class="modal-head-text">Delete Support Group</span><br><br>
                                        <span class="modal-text">Are you sure you want to delete the Support Group?</span>

                                        <div class="clearfix padding-top">
                                            <button type="button" onclick="document.getElementById('deleteSG<?php echo $row['id']?>').style.display='none'" class="cancelbtn modal-button">Cancel</button>
                                            <a onclick="document.getElementById('deleteSG<?php echo $row['id']?>').style.display='none'"
                                               class="deletebtn modal-button"
                                               href="/admin/deleteSG?id=<?php echo $row['id'] ?>" >Delete</a>
                                        </div>
                                    </div>
                            </div>

                            <!------------------------------------------------------------------------------------------------------------------------->

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
<script src="http://localhost/assets/js/admin/AdminBackEnd.js" ></script>


<script>
    var ctx = document.getElementById('supportGroupChart');
    var myChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: [<?php foreach ($graphData as $data) {
                echo('"'.$data['type'] . '",');
            }?>],
            datasets: [{
                label: 'Number of Support Groups',
                data: [<?php foreach ($graphData as $data) {
                    echo('"'.$data['amount'] . '",');
                }?>],
                backgroundColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255,1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {

            }
        }
    });
</script>
