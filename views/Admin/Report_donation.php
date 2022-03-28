<?php $params ?>

<link rel="stylesheet" href="http://localhost/assets/css/main.css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">



<report>
    <div class="col-l-12 col-m-12 col-s-12 noprint positionR printer-card ">
        <button onclick="window.print()" class="print-button">
            <i class="fa-solid fa-print"></i>
        </button>
    </div>
    <div class="col-l-12 col-m-12 col-s-12">
        <div class="col-l-12 col-m-12 col-s-12 primary-card ">

            <div class="row flex-container margin-right">
                <div class="col-l-12 col-m-12 col-s-12 padding-top">
                    <div class="col-l-8 col-m-6 col-s-6 padding-left position-bottom"> <span class="Report-Head-text">Donation Report</span><br>
                        <span class="Report-sub-text "><?php echo $data['StartDate'].' - '.$data['EndDate']?> </span>
                    </div>
                    <div class="col-l-2 col-m-6 col-s-6 positionR">
                        <img src="/assets/img/icon.png">
                    </div>
                </div>
            </div>

            <div class="row padding-top flex-container margin-right">
                <hr>
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

                <div class="col-l-12 report_margin">
                    <div class="col-l-12"><span class="Report-sub-text ">Donations received</span> </div>
                </div>

            <div class="row report_margin report-table-margin margin-right ">
                <div class="col-l-12 col-m-12 col-s-12 margin-top">


                    <table class="custom-table">
                        <?php if ($donateData!=null){?>
                            <tr>
                                <th>Transaction ID</th>
                                <th>E-mail</th>
                                <th>Date</th>
                                <th>Amount</th>
                            </tr>
                            <?php
                            foreach($donateData as $row){ ?>
                                <tr>
                                    <td><?php echo $row['id']?></td>
                                    <td><?php echo $row['email']?></td>
                                    <td><?php echo $row['date']?></td>
                                    <td><?php echo $row['amount']?></td>
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