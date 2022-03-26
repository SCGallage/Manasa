
<?php $params ?>


    <link rel="stylesheet" href="http://localhost/assets/css/main.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,200;0,300;0,400;0,500;0,700;1,200&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
          rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
          rel="stylesheet">

<main>
    <div class="col-l-12">
        <div class="flex-container">
        <div class="col-l-7">
            <div class="head-text3 col-l-12 col-m-12 col-s-12 flex-gap">
                <span>Update Support Group</span>
            </div>

            <div class="col-l-12 col-m-12 col-s-12 flex-gap1">
                <div class="primary-card card-content">
                    <?php
                    if (is_array($viewUpdateSG) || is_object($viewUpdateSG)){
                    foreach ($viewUpdateSG as $key => $data) {?>
                    <form name="createSGForm" action="/admin/updatedSGform" class="form1" method="post"  onsubmit="return validateCreateSG()">
                        <div class="col-l-12 col-m-12 col-s-12 padding-top">
                            <div class="col-l-10 col-m-10 col-s-10 ">
                                <label for="name" class="text-style3">Support Group Name:</label>
                            </div>
                            <div class="col-l-2 col-m-2 col-s-2">
                                <div class="tooltip-icon  positionR " data-tooltip="Assign name to support group"></div>
                            </div>
                        </div>

                        <div class="col-l-12 col-m-12 col-s-12">

                            <input type="text" name="name" value="<?php echo $data['name'] ?>" required>
                            <input type="hidden" name="SupportGroupId" id="SupportGroupId" value="<?php echo $data['id'] ?>">
                            <span class="required-text">*Required</span>
                        </div>

                        <div class="col-l-12 col-m-12 col-s-12 padding-top">
                            <div class="col-l-10 col-m-10 col-s-10 ">
                                <label for="name" class="text-style3">Facilitator:</label>
                            </div>
                            <div class="col-l-2 col-m-2 col-s-2">
                                <div class="tooltip-icon  positionR " data-tooltip="A Befriender must be appointed as facilitator of Support group"></div>
                            </div>
                        </div>

                        <div class="col-l-12 col-m-12 col-s-12">
                            <select name="facilitator" class="select2 custom-font" required>
                                <option class="custom-font" value="<?php echo $data['facilitator'] ?>" selected ><?php echo $data['facilitatorfname']." ".$data['facilitatorlname'] ?></option>
                                <?php
                                foreach ($viewBefriender as $select) {?>
                                    <option  class="custom-font" value="<?php echo $select['id'] ?>" ><?php echo $select['fname']." ".$select['lname']?> </option>
                                <?php } ?>
                            </select>
                            <span class="required-text">*Required</span>
                        </div>

                        <div class="col-l-12 col-m-12 col-s-12 padding-top">
                            <div class="col-l-10 col-m-10 col-s-10 ">
                                <label for="name" class="text-style3">Co-Facilitator:</label>
                            </div>
                            <div class="col-l-2 col-m-2 col-s-2">
                                <div class="tooltip-icon  positionR " data-tooltip="A Befriender must be appointed as facilitator of Support group. NOTE: Facilitator and Co-facilitator should be different"></div>
                            </div>
                        </div>

                        <div class="col-l-12 col-m-12 col-s-12 ">
                            <select name="co_facilitator" class="select2 custom-font" required>
                                <option class="custom-font" value="<?php echo $data['co_facilitator'] ?>" selected><?php echo $data['co_facilitatorfname']." ".$data['co_facilitatorlname'] ?></option>
                                <?php
                                foreach ($viewBefriender as $select) {?>
                                    <option class="custom-font" value="<?php echo $select['id'] ?>" ><?php echo $select['fname']." ".$select['lname'] ?></option>
                                <?php } ?>
                            </select>
                            <span class="required-text">*Required</span>
                        </div>

                        <div class="col-l-12 col-m-12 col-s-12 padding-top">
                            <div class="col-l-10 col-m-10 col-s-10 ">
                                <label for="name" class="text-style3">Number of Participants:</label>
                            </div>
                            <div class="col-l-2 col-m-2 col-s-2">
                                <div class="tooltip-icon  positionR " data-tooltip="Assign number of participants of the support group"></div>
                            </div>
                        </div>

                        <div class="col-l-12 col-m-12 col-s-12 ">
                            <input type="text" id="participants" name="participants" value="<?php echo $data['participants'] ?>" required>
                            <span class="required-text">*Required</span>
                        </div>

                        <div class="col-l-12 col-m-12 col-s-12 flex-container padding-top">
                            <div class="col-l-6 col-m-12 col-s-12 padding-right flex-container2">
                                <div class="col-l-12 col-m-12 col-s-12">
                                    <label for="Date" class="text-style3">State:</label>
                                </div>
                                <div class="col-l-12 col-m-12 col-s-12">
                                    <select name="state" id="reportType" class="select2 custom-font" required>
                                        <option value="1" class="custom-font">Active</option>
                                        <option value="0" class="custom-font">Inactive</option>
                                        <option value="<?php echo $data['state'] ?>" selected>
                                            <?php
                                                if ($data['state'] == 1) {
                                                    echo 'Active';
                                                }
                                                elseif ($data['state'] == 0){
                                                    echo 'Inactive';
                                                }
                                            ?>
                                        </option>
                                    </select>
                                    <span class="required-text">*Required</span>
                                </div>
                            </div>
                            <div class="col-l-6 col-m-12 col-s-12 padding-left flex-container2">
                                <div class="col-l-12 col-m-12 col-s-12">
                                    <div class="col-l-10 col-m-10 col-s-10 ">
                                        <label for="name" class="text-style3">Type:</label>
                                    </div>
                                    <div class="col-l-2 col-m-2 col-s-2">
                                        <div class="tooltip-icon  positionR " data-tooltip="Support group category (Ex: cancer, anxiety)"></div>
                                    </div>
                                </div>

                                <div class="col-l-12 col-m-12 col-s-12">
                                    <input type="text" name="type" value="<?php echo $data['type'] ?>" required>
                                    <span class="required-text">*Required</span>
                                </div>
                            </div>
                        </div>

                        <div class="col-l-12 col-m-12 col-s-12 padding-top">
                            <div class="col-l-10 col-m-10 col-s-10 ">
                                <label for="name" class="text-style3">Information:</label>
                            </div>
                            <div class="col-l-2 col-m-2 col-s-2">
                                <div class="tooltip-icon  positionR " data-tooltip="Additional details about the support group"></div>
                            </div>
                        </div>
                        <div class="col-l-12 col-m-12 col-s-12 ">
                            <textarea id="description" name="description" rows="4" cols="50" value="<?php echo $data['description'] ?>"></textarea>
                        </div>

                        <div class="col-l-12 col-m-12 col-s-12 padding-top">
                            <input type="submit" value="Submit">
                        </div>

                    </form>
                    <?php }
                    } ?>
                </div>
            </div>
        </div>
        </div>
    </div>
</main>


<script type="text/javascript">

</script>

<script src="http://localhost/assets/js/admin/AdminBackEnd.js" ></script>
<script src="http://localhost/assets/js/admin/formValidation.js" ></script>

