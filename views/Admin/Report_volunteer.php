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
        <div class="col-l-12 col-m-12 col-s-12 ">
            <div class="col-l-12 col-m-12 col-s-12 primary-card report_margin">

                <div class="row flex-container margin-right">
                    <div class="col-l-12 col-m-12 col-s-12 padding-top">
                        <div class="col-l-8 col-m-6 col-s-6 padding-left position-bottom"> <span class="Report-Head-text">Volunteer Evaluation Report</span> </div>
                        <div class="col-l-2 col-m-6 col-s-6 positionR">
                            <img src="/assets/img/icon.png">
                        </div>
                    </div>
                 </div>

                <div class="row padding-top flex-container margin-right">
                    <hr>
                </div>

                <div class="row report_margin margin-right">
                    <?php
                    foreach($volunteerData as $voldata){ ?>
                    <div class="col-l-12">
                        <div class="col-l-2"><span class="Report-sub-text ">Name: </span> </div>
                        <div class="col-l-10"><span class="Report-sub-text "><?php echo $voldata['fname']." ".$voldata['lname']?> </span> </div>
                    </div>
                    <div class="col-l-12 padding-top-1">
                        <div class="col-l-2"><span class="Report-sub-text ">E-mail: </span> </div>
                        <div class="col-l-10"><span class="Report-sub-text "><?php echo $voldata['email']?> </span> </div>
                    </div>
                    <div class="col-l-12 padding-top-1">
                        <div class="col-l-2"><span class="Report-sub-text ">Duration: </span> </div>
                        <div class="col-l-10"><span class="Report-sub-text "><?php echo $data['StartDate'].' - '.$data['EndDate']?> </span> </div>
                    </div>
                    <?php }?>
                </div>

                <div class="row padding-top flex-container margin-right">
                    <hr>
                </div>

                <div class="col-l-12">
                    <div class="col-l-12"><span class="Report-sub-text ">Overview </span> </div>
                </div>
                <div class="row report_margin margin-right">
                    <div class="col-l-12 padding-top-1">
                <table class="report-table">
                    <tr>
                        <td class="Report-text">
                            Total Number of events participated:
                        </td>
                        <td class="Report-text">
                            <?php echo $viewVolunteerParticipateCount;?>
                        </td>
                    </tr>

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
                            Total Number of exclusive events participated:
                        </td>
                        <td class="Report-text">
                            <?php echo $ExclusiveEventsParticipated; ?>
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
                        <td class="Report-text">
                            Total Number of open events participated for the duration:
                        </td>
                        <td class="Report-text">
                            <?php echo $openEventsParticipated; ?>
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

                <div class="col-l-12 padding-top-1 margin-top">
                    <div class="col-l-12"><span class="Report-sub-text ">Participated Events </span> </div>
                </div>

                <div class="row report_margin report-table-margin margin-right ">
                    <div class="col-l-12 col-m-12 col-s-12 margin-top">


                        <table class="custom-table">
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

                        <div class="margin-bottom-2"></div>
                </div>

            </div>
        </div>
    </div>

</report>
