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
        </div>

    </div>

    <div class="row row-style flex-container">
        <div class="col-l-12 col-m-12 col-s-12 primary-card flex-gap">

            <div class="col-l-12 col-m-12 col-s-12 padding1">
                <div class="col-l-8 col-m-6 col-s-6"> <span class="head-text">Users</span> </div>
                <div class="col-l-4 col-m-6 col-s-6">
                </div>
            </div>

            <div class="col-l-12 col-m-12 col-s-12 table-overflow">
                <table>
                    <?php if ($viewUser == null){?>
                        <tr><td class="no-record">No Inactive users</td></tr>
                    <?php }else{?>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>User Type</th>
                        <th>CV</th>
                        <th></th>
                        <th></th>
                    </tr>

                   <?php foreach ($viewUser as $row) { ?>
                        <tr>
                            <td><?php echo $row['fname']." ".$row['lname']?></td>
                            <td><?php echo $row['email']?></td>
                            <td><?php echo $row['role']?></td>
                            <td><a href="/file_storage/cv/<?php echo $row['cv']?>" download>Download CV</a></td>
                            <td><a href="/admin/updateUser?StaffId=<?php echo $row['id'] ?>"><span class="material-icons" id="updateUser" >edit</span></a> </td>
                            <td><a onclick="document.getElementById('deleteUser').style.display='block'"" ><span class="material-icons">delete</span></a></td>
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
<script>
    var modal = document.getElementById('deleteUser');

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>


