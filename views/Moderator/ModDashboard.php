<?php $params
?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Moderator Dashboard</title>
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
                    <a href="/admin/UserRequests" class="button1">Review</a>
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
<!--                    <tr>-->
<!--                        <td>Peter Griffin</td>-->
<!--                        <td>Befriender</td>-->
<!--                        <td>Pending</td>-->
<!--                    </tr>-->
<!--                    <tr>-->
<!--                        <td>Peter Griffin</td>-->
<!--                        <td>Befriender</td>-->
<!--                        <td>Pending</td>-->
<!--                    </tr>-->
<!--                    <tr>-->
<!--                        <td>Peter Griffin</td>-->
<!--                        <td>Befriender</td>-->
<!--                        <td>Pending</td>-->
<!--                    </tr>-->
<!---->
<!--                    <tr>-->
<!--                        <td>Peter Griffin</td>-->
<!--                        <td>Befriender</td>-->
<!--                        <td>Pending</td>-->
<!--                    </tr>-->
<!---->
<!--                    <tr>-->
<!--                        <td>Peter Griffin</td>-->
<!--                        <td>Befriender</td>-->
<!--                        <td>Pending</td>-->
<!--                    </tr>-->
<!--                    <tr>-->
<!--                        <td>Peter Griffin</td>-->
<!--                        <td>Befriender</td>-->
<!--                        <td>Pending</td>-->
<!--                    </tr>-->
<!---->
<!--                    <tr>-->
<!--                        <td>Peter Griffin</td>-->
<!--                        <td>Befriender</td>-->
<!--                        <td>Pending</td>-->
<!--                    </tr>-->
<!---->
<!--                    <tr>-->
<!--                        <td>Peter Griffin</td>-->
<!--                        <td>Befriender</td>-->
<!--                        <td>Pending</td>-->
<!--                    </tr>-->

                </table>
            </div>
        </div>

        <div class="col-l-6 col-m-12 col-s-12 flex-gap primary-card card-content">
            <div class="col-l-12 col-m-12 col-s-12">
                <span class="head-text">Upcoming Events</span>
            </div>

            <div class="col-l-12 col-m-12 col-s-12 scroll1">
                <div class="upper-box-details card1">
                    <div class="col-l-12 col-m-12 col-s-12 text-style3">Annual Meeting</div>
                    <div class="col-l-12 col-m-12 col-s-12">
                        <span>Date: 2021/09/08</span><br>
                        <span>Time: 9.00 AM </span><br>
                        <span>Place: Virtual</span>
                    </div>
                </div>

                <div class="upper-box-details card1">
                    <div class="col-l-12 col-m-12 col-s-12 text-style3">Annual Meeting</div>
                    <div class="col-l-12 col-m-12 col-s-12">
                        <span>Date: 2021/09/08</span><br>
                        <span>Time: 9.00 AM </span><br>
                        <span>Place: Virtual</span>
                    </div>
                </div>

                <div class="upper-box-details card1">
                    <div class="col-l-12 col-m-12 col-s-12 text-style3">Annual Meeting</div>
                    <div class="col-l-12 col-m-12 col-s-12">
                        <span>Date: 2021/09/08</span><br>
                        <span>Time: 9.00 AM </span><br>
                        <span>Place: Virtual</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row row-style flex-container">
        <div class="col-l-12 col-m-12 col-s-12 primary-card flex-gap ">
            <div class="col-l-12 col-m-12 col-s-12 card-content">
                <span class="head-text">Active Befrienders</span>
            </div>

            <div class="col-l-12 col-m-12 col-s-12 table-overflow">
                <table>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Contact</th>
                        <th>Start Date</th>
                        <th>Type</th>
                        <th> </th>
                        <th> </th>
                    </tr>
                    <tr>
                        <td>Ben Affleck</td>
                        <td>BenAffleck@gmail.com</td>
                        <td>0771268920</td>
                        <td>2017/09/10</td>
                        <td>Befrinder</td>
                    </tr>
                    <tr>
                        <td>Peter Griffin</td>
                        <td>PeterGriffin@gmail.com</td>
                        <td>077229667</td>
                        <td>2017/09/10</td>
                        <td>Befrinder</td>
                    </tr>
                    <tr>
                        <td>Carla Bruni</td>
                        <td>CarlaBruni@gmail.com</td>
                        <td>077146278</td>
                        <td>2017/09/10</td>
                        <td>Befrinder</td>
                    </tr>
                    <tr>
                        <td>David Arquette</td>
                        <td>DavidArquette@gmail.com</td>
                        <td>0772678924</td>
                        <td>2017/09/10</td>
                        <td>Befrinder</td>
                    </tr>
                    <tr>
                        <td>Ben Affleck</td>
                        <td>BenAffleck@gmail.com</td>
                        <td>0771268920</td>
                        <td>2017/09/10</td>
                        <td>Befrinder</td>
                    </tr>
                    <tr>
                        <td>Peter Griffin</td>
                        <td>PeterGriffin@gmail.com</td>
                        <td>077229667</td>
                        <td>2017/09/10</td>
                        <td>Befrinder</td>
                    </tr>
                    <tr>
                        <td>Carla Bruni</td>
                        <td>CarlaBruni@gmail.com</td>
                        <td>077146278</td>
                        <td>2017/09/10</td>
                        <td>Befrinder</td>
                    </tr>
                    <tr>
                        <td>David Arquette</td>
                        <td>DavidArquette@gmail.com</td>
                        <td>0772678924</td>
                        <td>2017/09/10</td>
                        <td>Befrinder</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</main>

</body>
</html>
