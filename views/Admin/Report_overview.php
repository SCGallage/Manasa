<?php $params ?>


<link rel="stylesheet" href="http://localhost/assets/css/main.css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/all.min.js" integrity="sha512-6PM0qYu5KExuNcKt5bURAoT6KCThUmHRewN3zUFNaoI6Di7XJPTMoT6K0nsagZKk2OB4L7E3q1uQKHNHd4stIQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


<report>
    <div class="col-l-12 col-m-12 col-s-12 noprint positionR printer-card ">
        <button onclick="window.print()" class="print-button">
            <i class="fa-solid fa-print"></i>
        </button>
    </div>
    <div class="col-l-12 col-m-12 col-s-12">

        <div class="col-l-12 col-m-12 col-s-12 primary-card report_margin" id="report">

            <div class="row flex-container margin-right">
                <div class="col-l-12 col-m-12 col-s-12 padding-top">
                    <div class="col-l-8 col-m-6 col-s-6 padding-left position-bottom"> <span class="Report-Head-text">Overview Report</span><br>
                        <span class="Report-sub-text "><?php echo $data['StartDate'].' - '.$data['EndDate']?> </span>
                    </div>
                    <div class="col-l-2 col-m-6 col-s-6 positionR">
                        <img src="/assets/img/icon.png">
                    </div>
                </div>
            </div>

            <div class="row padding-top margin-right">
                <hr>
            </div>

            <div class="col-l-12 report_margin padding-top-1">
                <div class="col-l-12"><span class="Report-sub-text ">User Overview</span> <br></div>
            </div>

            <div class="row report_margin margin-right">
                <div class="col-l-12 padding-top-1">
                    <table class="report-table">
                        <tr>
                            <?php foreach ($newCallers as $key1){?>
                                <td class="Report-text">
                                    Registered callers for the duration:
                                </td>
                                <td class="Report-text">
                                    <?php echo $key1['Count']?>
                                </td>
                            <?php }?>
                        </tr>

                        <tr>
                            <?php foreach ($newvolunteers as $key1){?>
                                <td class="Report-text">
                                    Registered volunteers for the duration:
                                </td>
                                <td class="Report-text">
                                    <?php echo $key1['Count']?>
                                </td>
                            <?php }?>
                        </tr>

                        <tr>
                            <?php foreach ($newbefrienders as $key1){?>
                                <td class="Report-text">
                                    Registered befrienders for the duration:
                                </td>
                                <td class="Report-text">
                                    <?php echo $key1['Count']?>
                                </td>
                            <?php }?>
                        </tr>

                        <tr>
                            <td class="Report-text">
                                Total Number of events participated:
                            </td>
                            <td class="Report-text">
                                <?php echo $viewVolunteerParticipateCount;?>
                            </td>
                        </tr>

                    </table>
                </div>


            </div>

            <div class="col-l-12 report_margin padding-top-1">
                <div class="col-l-12"><span class="Report-sub-text ">Donation Overview</span> </div>
            </div>

            <div class="row report_margin report-table-margin margin-right ">
                <div class="col-l-12 col-m-12 col-s-12 margin-top">


                    <table class="custom-table">
                        <tr>
                            <th></th>
                            <th>Duration Total</th>
                            <th>Current Year Total</th>
                            <th>Past Year Duration Total</th>
                            <th>Past Year  Total</th>
                        </tr>
                        <tr>
                            <td>Donations Recieved</td>
                            <?php foreach ($totalDonationsDuration as $key1){?>
                                <td><?php echo $key1['Total']?>.00</td>
                            <?php }?>

                            <?php foreach ($totalDonationsCurrentYear as $key1){?>
                                <td><?php echo $key1['Total']?>.00</td>
                            <?php }?>

                            <?php foreach ($totalDonationLastYearDuration as $key1){?>
                                <td><?php echo $key1['Total']?>.00</td>
                            <?php }?>

                            <?php foreach ($totalDonationsLastYear as $key1){?>
                                <td><?php echo $key1['Total']?>.00</td>
                            <?php }?>
                        </tr>
                    </table>

                    <div class="margin-bottom-1"></div>

                    <div class="row padding-top flex-container line-report margin-right  float-center margin-top">
                        <canvas id="progress"></canvas>
                    </div>
                </div>

            <div class="col-l-12 margin-top">
                <div class="col-l-12"><span class="Report-sub-text ">Meeting Overview</span> </div>
            </div>

                <div class="row report_margin margin-right">
                    <div class="col-l-12 padding-top-1">
                        <table class="report-table">
                            <tr>
                                <td class="Report-text">
                                    Total number of meetings held for the duration:
                                </td>
                                <td class="Report-text">
                                    <?php echo $meetingsForDuration; ?>
                                </td>
                            </tr>

                            <tr>
                                <td class="Report-text">
                                    Total number of befrienders handling meetings:
                                </td>
                                <td class="Report-text">
                                    <?php echo $numBefrienderForAllMeeting; ?>
                                </td>
                            </tr>

                            <tr>
                                <td class="Report-text">
                                    Total number of reports submitted:
                                </td>
                                <td class="Report-text">
                                    <?php echo $sessionProblemAmount; ?>
                                </td>
                            </tr>

                        </table>
                    </div>
                </div>


            <div class="col-l-12 padding-top">
                <div class="col-l-12"><span class="Report-graph-text ">Problems Encountered Based on Reports</span> </div>
            </div>

            <div class="row padding-top margin-right float-center margin-top flex-container">
                <div class="col-l-6">
                    <div class="padding-top flex-container margin-right bar float-center margin-top">
                        <canvas id="problemOverviewChart"></canvas>
                    </div>
                </div>
                <div class="col-l-6 margin-top-4"><table class="custom-table">
                        <?php if ($sessionProblemCount!=null){?>
                            <tr>
                                <th>Problem Type</th>
                                <th>Count</th>
                            </tr>
                            <?php
                            foreach($sessionProblemCount as $row){ ?>
                                <tr>
                                    <td><?php echo $row['problemName']?></td>
                                    <td><?php echo $row['Count']?></td>
                                </tr>
                            <?php }?>
                        <?php } ?>
                    </table>
                </div>
            </div>
<!---------------------------------------------------------------->
                <div class="col-l-12 padding-top">
                    <div class="col-l-12"><span class="Report-graph-text ">Types of meetings held</span> </div>
                </div>

                <div class="row padding-top margin-right float-center margin-top flex-container">
                    <div class="col-l-6">
                        <div class="padding-top flex-container margin-right bar float-center margin-top">
                            <canvas id="meetingOverviewChart"></canvas>
                        </div>
                    </div>
                    <div class="col-l-6 margin-top-4"><table class="custom-table">
                            <?php if ($meetingTypes!=null){?>
                                <tr>
                                    <th>Meeting Type</th>
                                    <th>Count</th>
                                </tr>
                                <?php
                                foreach($meetingTypes as $row){ ?>
                                    <tr>
                                        <td><?php echo $row['meeting_type']?></td>
                                        <td><?php echo $row['Count']?></td>
                                    </tr>
                                <?php }?>
                            <?php } ?>
                        </table>
                    </div>
                </div>
<!--------------------------------------------------------------------                -->

                <div class="col-l-12 margin-top">
                    <div class="col-l-12"><span class="Report-sub-text ">Volunteer Overview</span> </div>
                </div>

                <div class="row report_margin margin-right">
                    <div class="col-l-12 padding-top-1">
                        <table class="report-table">
                            <tr>
                                <td class="Report-text">
                                    Total Number of events held for the duration:
                                </td>
                                <td class="Report-text">
                                    <?php echo $allVolEvents; ?>
                                </td>
                            </tr>

                            <tr>
                                <td class="Report-text">
                                    Total Number of exclusive events held for the duration:
                                </td>
                                <td class="Report-text">
                                    <?php echo $allExclusiveVolEvents; ?>
                                </td>
                            </tr>

                            <tr>
                                <td class="Report-text">
                                    Total Number of open events held for the duration:
                                </td>
                                <td class="Report-text">
                                    <?php echo $allopenVolEvents; ?>
                                </td>
                            </tr>


                            <tr>
                                <?php foreach ($avgParticipation as $key){?>
                                    <td class="Report-text">
                                        Average volunteer event participation for the duration:
                                    </td>
                                    <td class="Report-text">
                                        <?php echo (round($key['Average'],0)) ; ?>
                                    </td>
                                <?php }?>
                            </tr>

                            <tr>
                                <?php foreach ($HighestParticipation as $key){?>
                                    <td class="Report-text">
                                        Highest volunteer event participation for the duration:
                                    </td>
                                    <td class="Report-text">
                                        <?php echo$key['highest']; ?>
                                    </td>
                                <?php }?>
                            </tr>
                        </table>
                    </div>


                </div>


            <div class="row padding-top flex-container margin-right bar-report float-center margin-top">
               <canvas id="eventType"></canvas>
            </div>
            <div class="col-l-12 padding-top-1 margin-top">
                <div class="col-l-12"><span class="Report-sub-text ">Events Held </span> </div>
            </div>

            <div class="row report_margin report-table-margin margin-right ">
                <div class="col-l-12 col-m-12 col-s-12 margin-top">


                    <table class="custom-table">
                        <?php if ($volEvents!=null){?>
                            <tr>
                                <th>Event ID</th>
                                <th>Event Name</th>
                                <th>Date of the event</th>
                                <th>Moderator</th>
                                <th>Location</th>
                                <th>Event Type</th>
                                <th>Description</th>
                            </tr>
                            <?php
                            foreach($volEvents as $row){ ?>
                                <tr>
                                    <td><?php echo $row['id']?></td>
                                    <td><?php echo $row['name']?></td>
                                    <td><?php echo $row['startDate']?></td>
                                    <td><?php echo $row['modFname']." ".$row['modLname']?></td>
                                    <td><?php echo $row['location']?></td>
                                    <td><?php
                                        if ($row['type'] == 1) {
                                            echo 'Open Event';
                                        }
                                        elseif ($row['type'] == 0){
                                            echo 'Exclusive Event';
                                        }
                                        ?></td>
                                    <td><?php echo $row['description']?></td>
                                </tr>
                            <?php }?>
                        <?php } ?>
                    </table>

                    <div class="margin-bottom-2"></div>
                </div>

            </div>






        </div>
    </div>

</report>


<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.5.1/chart.min.js"></script>
<!--Problem Overview chart-->

<script>
    var ctx = document.getElementById('problemOverviewChart');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: [<?php foreach ($sessionProblemCount as $data) {
                echo('"'.$data['problemName'] . '",');
            }?>],
            datasets: [{
                label: 'Problems Encountered',
                data: [<?php foreach ($sessionProblemCount as $data) {
                    echo('"'.$data['Count'] . '",');
                }?>],
                backgroundColor: [
                    'rgba(255, 99, 132,  1)',
                    'rgba(54, 162, 235,  1)',
                    'rgba(255, 206, 86,  1)',
                    'rgba(75, 192, 192,  1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64,  1)'
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
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>

<!--meeting Overview chart-->

<script>
    var ctx = document.getElementById('meetingOverviewChart');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: [<?php foreach ($meetingTypes as $data) {
                echo('"'.$data['meeting_type'] . '",');
            }?>],
            datasets: [{
                label: 'Meeting Types',
                data: [<?php foreach ($meetingTypes as $data) {
                    echo('"'.$data['Count'] . '",');
                }?>],
                backgroundColor: [
                    'rgba(255, 99, 132,  1)',
                    'rgba(54, 162, 235,  1)',
                    'rgba(255, 206, 86,  1)',
                    'rgba(75, 192, 192,  1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64,  1)'
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
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>

<!--Volunteer overview chart-->
<script>
    var ctx = document.getElementById('eventType');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ["Exclusive Events","Open Events"],
            datasets: [{
                label: 'Types of events',
                data: [<?php foreach ($volEventGraphData as $data) {
                    echo('"'.$data['Data'] . '",');
                }?>],
                backgroundColor: [
                    'rgba(255, 99, 132,  1)',
                    'rgba(54, 162, 235,  1)',
                    'rgba(255, 206, 86,  1)',
                    'rgba(75, 192, 192,  1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64,  1)'
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
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
<!--Donations chart-->

<!--Donations chart-->
<script>
    var ctx = document.getElementById('progress');
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: [<?php foreach ($lastYearCumulativeDonation as $labelData) {
                echo('"'.$labelData['Month'] . '",');
            }?>],
            datasets: [{
                label: 'Current Year',
                data: [<?php foreach ($currentYearCumulativeDonation as $labelData) {
                    echo('"'.$labelData['Total'] . '",');
                }?>],
                backgroundColor: [
                    'rgba(255, 99, 132, 1)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)'
                ],
                borderWidth: 2
            },{
                label: 'Last Year',
                data: [<?php foreach ($lastYearCumulativeDonation as $labelData) {
                    echo('"'.$labelData['Total'] . '",');
                }?>],
                backgroundColor: [
                    'rgba(54, 162, 235,  1)'
                ],
                borderColor: [
                    'rgba(54, 162, 235,  1)'
                ],
                borderWidth: 2
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
