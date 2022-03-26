<?php $params
?>

<link rel="stylesheet" href="http://localhost/assets/css/main.css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,200;0,300;0,400;0,500;0,700;1,200&display=swap" rel="stylesheet">
<link rel="preconnect" href="https://fonts.googleapis.com" />
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
      rel="stylesheet"/>

<main>

    <div class="row flex-container padding-top margin-top">
        <?php
        foreach($volunteerData as $data){ ?>
        <div class="col-l-12 col-s-12 col-m-12 flex-container">
            <div class="col-l-2 col-s-12 col-m-12">
                <img src="http://localhost/assets/img/user/<?php echo $data['profile_pic'] ?>" class="profile-pic-vol">

            </div>
            <div class="col-l-10 col-s-12 col-m-12">

                <div class="col-l-10 col-s-12 col-m-12 padding-top padding-bottom">
                    <span class="vol-text">Name: <?php echo $data['fname']." ".$data['lname']?></span><br>
                </div>
                <div class="col-l-10 col-s-12 col-m-12 padding-bottom">
                    <span class="vol-text ">Email: <?php echo $data['email']?></span><br>
                </div>
                <div class="col-l-10 col-s-12 col-m-12 padding-bottom">
                    <span class="vol-text">Gender: <?php if ($data['gender'] == 'M'){echo 'Male';}
                                                                    elseif ($data['gender'] == 'F'){echo 'Female';}
                                                                    else{echo 'Has not mentioned';}?></span>
                </div>
                    <?php }?>
            </div>

        </div>
    </div>

    <div class="row row-style flex-container padding-top">
        <div class="col-l-12 col-m-12 col-s-12 primary-card flex-gap ">
            <div class="col-l-12 col-m-12 col-s-12 flex-container2 padding1">
                <span class="head-text">Participated Events</span>
            </div>

            <div class="col-l-12 col-m-12 col-s-12 table-overflow">
                <table>
                    <?php if ($viewVolunteerParticipateCount==0){?>
                        <tr><td class="no-record">Volunteer has not participated any events</td></tr>
                    <?php }else{ ?>
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
                        foreach($viewVolunteerParticipate as $row){ ?>
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
            </div>
        </div>
    </div>
    </div>

</main>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.5.1/chart.min.js"></script>
<!--<script src="http://localhost/assets/js/admin/Graph.js" ></script>-->
