<?php $params ?>


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

<main>
    <div class="col-l-12">
        <div class="flex-container">
            <div class="col-l-7">
                <div class="head-text3 col-l-12 col-m-12 col-s-12 flex-gap">
                    <span>Update Event</span>
                </div>

                <?php foreach ($viewUpdateEvent as $key => $data){?>

                <div class="col-l-12 col-m-12 col-s-12 flex-gap1">
                    <div class="primary-card card-content">
                        <form name="createEventForm" action="/admin/updateVolunteerEvent" class="form1" method="post"  onsubmit="return createVolEventForm()">
                            <div class="col-l-12 col-m-12 col-s-12 flex-container3 ">
                                <div class="col-l-4 col-m-4 col-s-4">
                                    <label for="reportType" class="text-style3">Event Type</label>
                                </div>
                                <div class="col-l-8 col-m-8 col-s-8">
                                    <input type="hidden" name="EventId" id="EventId" value="<?php echo $data['id'] ?>">
                                    <select name="type" id="reportType" class="select1" required>
                                        <option value="<?php echo $data['type']?>"><?php
                                            if ($data['type'] == 1) {
                                                echo 'Open Event';
                                            }
                                            elseif ($data['type'] == 0){
                                                echo 'Exclusive Event';
                                            }
                                            ?></option>
                                        <option value="1">Open</option>
                                        <option value="0">Exclusive</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-l-12 col-m-12 col-s-12 padding-top">
                                <div class="col-l-10 col-m-10 col-s-10 ">
                                    <label for="name" class="text-style3">Event Name:</label>
                                </div>
                                <div class="col-l-2 col-m-2 col-s-2">
                                    <div class="tooltip-icon  positionR " data-tooltip="Enter event name. Ex: Annual General meeting"></div>
                                </div>
                            </div>
                            <div class="col-l-12 col-m-12 col-s-12 ">
                                <input type="text" name="val" value="<?php echo $data['name']?>" required>
                                <span class="required-text">*Required</span>
                            </div>

                            <div class="col-l-12 col-m-12 col-s-12 padding-top">
                                <div class="col-l-10 col-m-10 col-s-10 ">
                                    <label for="name" class="text-style3">Date:</label>
                                </div>
                                <div class="col-l-2 col-m-2 col-s-2">
                                    <div class="tooltip-icon  positionR " data-tooltip="Date of the event"></div>
                                </div>
                            </div>
                            <div class="col-l-12 col-m-12 col-s-12 ">
                                <input type="date" name="startDate" value="<?php echo $data['startDate']?>" required>
                                <span class="required-text">*Required</span>
                            </div>

                            <div class="col-l-12 col-m-12 col-s-12 padding-top">
                                <div class="col-l-10 col-m-10 col-s-10 ">
                                    <label for="name" class="text-style3">Location:</label>
                                </div>
                                <div class="col-l-2 col-m-2 col-s-2">
                                    <div class="tooltip-icon  positionR " data-tooltip="Place of the event"></div>
                                </div>
                            </div>

                            <div class="col-l-12 col-m-12 col-s-12 ">
                                <input type="text" name="location" value="<?php echo $data['location']?>" required>
                                <span class="required-text">*Required</span>
                            </div>

                            <div class="col-l-12 col-m-12 col-s-12 padding-top">
                                <div class="col-l-10 col-m-10 col-s-10 ">
                                    <label for="name" class="text-style3">Moderator:</label>
                                </div>
                                <div class="col-l-2 col-m-2 col-s-2">
                                    <div class="tooltip-icon  positionR " data-tooltip="Place of the event"></div>
                                </div>
                            </div>

                            <div class="col-l-12 col-m-12 col-s-12 ">
                                <select name="moderator" class="select2 custom-font" required>
                                    <option value="<?php echo $data['moderator']?>" class="custom-font" selected><?php echo $data['staffFname']." ".$data['staffLname']?></option>
                                    <?php
                                    foreach ($viewModerator as $select) {?>
                                        <option class="custom-font" value="<?php echo $select['id'] ?>" ><?php echo $select['fname']." ".$select['lname']?> </option>
                                    <?php } ?>
                                </select>
                                <span class="required-text">*Required</span>
                            </div>

                            <div class="col-l-12 col-m-12 col-s-12 padding-top">
                                <div class="col-l-10 col-m-10 col-s-10 ">
                                    <label for="name" class="text-style3">Capacity:</label>
                                </div>
                                <div class="col-l-2 col-m-2 col-s-2">
                                    <div class="tooltip-icon  positionR " data-tooltip="Place of the event"></div>
                                </div>
                            </div>

                            <div class="col-l-12 col-m-12 col-s-12 ">
                                <input type="text" name="capacity" value="<?php echo $data['capacity'] ?>" required>
                                <span class="required-text">*Required</span>
                            </div>

                            <div class="col-l-12 col-m-12 col-s-12 flex-container padding-top">
                                <div class="col-l-6 col-m-12 col-s-12 padding-right flex-container2">
                                    <div class="col-l-12 col-m-12 col-s-12">
                                        <div class="col-l-10 col-m-10 col-s-10 ">
                                            <label for="email" class="text-style3">From:</label>
                                        </div>
                                        <div class="col-l-2 col-m-2 col-s-2">
                                            <div class="tooltip-icon  positionR " data-tooltip="Starting time of the event"></div>
                                        </div>
                                    </div>
                                    <div class="col-l-12 col-m-12 col-s-12">
                                        <input type="time" name="startTime" value="<?php echo $data['startTime'] ?>" min="05:00" max="20:00" required>
                                        <span class="required-text">*Required</span>
                                    </div>
                                </div>
                                <div class="col-l-6 col-m-12 col-s-12 padding-left flex-container2">
                                    <div class="col-l-12 col-m-12 col-s-12">
                                        <div class="col-l-10 col-m-10 col-s-10 ">
                                            <label for="Date" class="text-style3">To:</label>
                                        </div>
                                        <div class="col-l-2 col-m-2 col-s-2">
                                            <div class="tooltip-icon  positionR " data-tooltip="Ending time of the event"></div>
                                        </div>
                                    </div>
                                    <div class="col-l-12 col-m-12 col-s-12">
                                        <input type="time" name="endTime" value="<?php echo $data['endTime'] ?>" min="05:00" max="20:00" required>
                                        <span class="required-text">*Required</span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-l-12 col-m-12 col-s-12 padding-top">
                                <label for="name" class="text-style3">Description:</label>
                            </div>
                            <div class="col-l-12 col-m-12 col-s-12 ">
                                <textarea id="" name="description" rows="4" cols="50"><?php echo $data['description'] ?></textarea>
                            </div>

                            <div class="col-l-12 col-m-12 col-s-12 padding-top">
                                <input type="submit" value="Submit" class="button2">
                            </div>

                        </form>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>


<script src="http://localhost/assets/js/admin/AdminBackEnd.js" ></script>
<script src="http://localhost/assets/js/admin/formValidation.js" ></script>
