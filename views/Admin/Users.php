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
    <div class="row flex-container">

        <div class="col-l-12 col-m-12 col-s-12 flex-gap">
            <div class="col-l-9 col-m-12 col-s-12">
                <span class="head-text2">User Details</span>
            </div>

            <div class="col-l-3 col-m-8 col-s-8 positionR">
                <div class="search">
                    <form action="/admin/SearchUsers" method="post">
                        <input type="text" class="searchTerm" placeholder="Search" name="search">
                        <button type="submit" class="searchButton">
                            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="currentColor"><path d="M0 0h24v24H0z" fill="none"/><path d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"/></svg>
                        </button>
                    </form>
                </div>
            </div>
        </div>

    </div>

    <div class="row row-style flex-container">
        <div class="col-l-12 col-m-12 col-s-12 primary-card flex-gap">

            <div class="col-l-12 col-m-12 col-s-12 padding1">
                <div class="col-l-8 col-m-6 col-s-6"> <span class="head-text">Users</span> </div>
                <div class="col-l-4 col-m-6 col-s-6">
                    <div onclick="dropDownButtonUser()">
                        <span class="add-text" >+Add User</span>
                        <div class="sub-button3 padding-top" id="dropdownUser">
                            <a href="/admin/UserRequests" class="button5">User Requests</a>
                            <a href="/admin/addUsers" class="button5">Add user</a>
                            <a href="/admin/inactiveUsers" class="button5">Inactive user</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-l-12 col-m-12 col-s-12 table-overflow">
                <table>
                    <?php if ($viewUser == null){?>
                        <tr><td class="no-record">No users Available</td></tr>
                    <?php }else{?>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>User Type</th>
                        <th>State</th>
                        <th>CV</th>
                        <th></th>
                        <th></th>
                    </tr>

                   <?php foreach ($viewUser as $row) { ?>
                        <tr>
                            <td><?php echo $row['fname']." ".$row['lname']?></td>
                            <td><?php echo $row['email']?></td>
                            <td><?php echo $row['role']?></td>
                            <td><?php
                                if ($row['state'] == 1) {
                                    echo 'Active';
                                }
                                elseif ($row['state'] == 0){
                                    echo 'Inactive';
                                }
                                ?></td>
                            <td><a href="/file_storage/cv/<?php echo $row['cv']?>" download>Download CV</a></td>
                            <td><a href="/admin/updateUser?StaffId=<?php echo $row['id'] ?>"><span class="material-icons" id="updateUser" >edit</span></a> </td>
<!--                            <td><a href="/admin/deleteUser?id=--><?php //echo $row['id'] ?><!--" ><span class="material-icons">delete</span></a></td>-->
                        </tr>
                    <?php } }?>
                </table>
            </div>
        </div>
    </div>

</main>

<!--User Delete Confirmation ----------------------------------------------------------------------------------------->

<div id="deleteUser" class="modal">
    <span onclick="document.getElementById('deleteUser').style.display='none'" class="close" title="Close Modal">×</span>
    <form class="modal-content" action=" ">
        <div class="modal-container">
            <span class="modal-head-text">Delete Volunteer Event</span><br><br>
            <span class="modal-text">Are you sure you want to delete the volunteer event?</span>

            <div class="clearfix">
                <button type="button" onclick="document.getElementById('deleteUser').style.display='none'" class="cancelbtn modal-button">Cancel</button>
                <a onclick="document.getElementById('deleteUser').style.display='none'" class="deletebtn modal-button" href="/admin/deleteUser?id=<?php echo $row['id'] ?>" >Delete</a>
            </div>
        </div>
    </form>
</div>

<!------------------------------------------------------------------------------------------------------------------------->


<script src="http://localhost/assets/js/admin/AdminBackEnd.js" ></script>
<!--<script>-->
<!--    var modal = document.getElementById('deleteUser');-->
<!---->
<!--    // When the user clicks anywhere outside of the modal, close it-->
<!--    window.onclick = function(event) {-->
<!--        if (event.target == modal) {-->
<!--            modal.style.display = "none";-->
<!--        }-->
<!--    }-->
<!--</script>-->


