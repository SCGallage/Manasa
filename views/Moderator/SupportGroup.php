<?php $params ?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Support Group</title>
    <link rel="stylesheet" href="./assets/css/main.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,200;0,300;0,400;0,500;0,700;1,200&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
          rel="stylesheet">
</head>
<body>
<main>

    <div class="row flex-container">

        <div class="col-l-12 col-m-12 col-s-12 flex-gap">
            <div class="col-l-6 col-m-12 col-s-12">
                <span class="head-text2">Support Groups</span>
            </div>
            <div class="col-l-6 col-m-12 col-s-12">
                <button class="button1 " id="createSG" onclick="createSG()">Create Support Group</button>
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
                <span class="head-text">Support Group Requests</span>
            </div>

            <div class="col-l-12 col-m-12 col-s-12 scroll1">
                <table>
                    <?php
                    foreach ($viewSGRequest as $req) {
                    ?>
                    <tr>
                        <td><?php echo $req['fname']." ".$req['lname']?></td>
                        <td><?php echo $req['type']?></td>
                        <td><?php echo $req['capacity']?></td>
                        <td> <a href="#" class="button1" id="accept-btn">Accept</a></td>
                        <td> <a href="#" class="button6">Reject</a></td>
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
                            <td><a href="/updateSG?SupportGroupId=<?php echo $row['id'] ?>"><span class="material-icons" id="updateSG">edit</span></a></td>
                            <td><span class="material-icons">delete</span></td>
                        </tr>
                        <?php
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>

</main>

<!-- POP-UP Create Support group------------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->
<div class="modal " id="modal-box">
    <div class="modal-content">

        <div class="modal-header padding1">
            <div class="head-text3">
                <span class="close" id="close">&times;</span>
            </div>

            <div class="head-text3 padding-top">
                <span>Create Support Group</span>
            </div>
        </div>

        <div class="modal-body">
            <div class="primary-card card-content">
                <form name="createSGForm" action="/SupportGroup" class="form1" method="post"  onsubmit="return validateCreateSG()">
                    <div class="col-l-12 col-m-12 col-s-12 padding-top">
                        <div class="col-l-10 col-m-10 col-s-10 ">
                            <label for="name" class="text-style3">Support Group Name:</label>
                        </div>
                        <div class="col-l-2 col-m-2 col-s-2">
                            <div class="tooltip-icon  positionR " data-tooltip="Assign name to support group"></div>
                        </div>
                    </div>

                    <div class="col-l-12 col-m-12 col-s-12">
                        <input type="text" name="name" value="" required>
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
                        <select name="facilitator" class="select2" required>
                            <option value="0" >Please select Befriender</option>
                            <?php
                                foreach ($viewBefriender as $select) {?>
                            <option value="<?php echo $select['id'] ?>" ><?php echo $select['fname']." ".$select['lname']?> </option>
                            <?php } ?>
                        </select>
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
                        <select name="co_facilitator" class="select2" required>
                            <option value="0" >Please select Befriender</option>
                            <?php
                            foreach ($viewBefriender as $select) {?>
                                <option value="<?php echo $select['id'] ?>" ><?php echo $select['fname']." ".$select['lname'] ?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="col-l-12 col-m-12 col-s-12 padding-top">
                        <div class="col-l-10 col-m-10 col-s-10 ">
                            <label for="name" class="text-style3">Maximum Participants:</label>
                        </div>
                        <div class="col-l-2 col-m-2 col-s-2">
                            <div class="tooltip-icon  positionR " data-tooltip="Assign number of participants of the support group"></div>
                        </div>
                    </div>

                    <div class="col-l-12 col-m-12 col-s-12 ">
                        <input type="text" id="participants" name="participants" value="" required>
                    </div>

                    <div class="col-l-12 col-m-12 col-s-12 flex-container padding-top">
                        <div class="col-l-6 col-m-12 col-s-12 padding-right flex-container2">
                            <div class="col-l-12 col-m-12 col-s-12">
                                <label for="Date" class="text-style3">State:</label>
                            </div>
                            <div class="col-l-12 col-m-12 col-s-12">
                                <select name="state" id="reportType" class="select2" required>
                                    <option value="1">Active</option>
                                    <option value="0" selected>Inactive</option>
                                </select>
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
                                <input type="text" name="type" value="" required>
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
                        <textarea id="description" name="description" rows="4" cols="50"></textarea>
                    </div>

                    <div class="col-l-12 col-m-12 col-s-12 padding-top">
                        <input type="submit" value="Submit">
                    </div>

                </form>
            </div>
        </div>
        <div class="modal-footer"></div>
    </div>
</div>
<!-- ------------------------------------------------------------------------------------------------------------------------------------------------------------ -->


<script type="text/javascript">
    var modal = document.getElementById("modal-box");
    document.getElementById('accept-btn').addEventListener('click', () => {
        console.log('clicked');
        modal.style.display = "block";
    });

    function createSG(){
        var modal = document.getElementById("modal-box");
        var btn = document.getElementById("createSG");
        var close = document.getElementById("close");

        /*btn.onclick = function(){
            modal.style.display = "block";
        }*/
        modal.style.display = "block";
        close.onclick = function(){
            modal.style.display = "none";
        }

        window.onclick = function(event){
            if (event.target == modal){
                modal.style.display = "none";
            }
        }
    }
</script>

<script type="text/javascript">

</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.5.1/chart.min.js"></script>
<script src="./assets/JS/Graph.js" ></script>
<script src="./assets/JS/AdminBackEnd.js" ></script>
<script src="./assets/JS/formValidation.js" ></script>
</body>
</html>