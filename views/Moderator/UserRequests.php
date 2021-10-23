<?php $params ?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Search User</title>
    <link rel="stylesheet" href="./assets/css/main.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,200;0,300;0,400;0,500;0,700;1,200&display=swap" rel="stylesheet">

</head>
<body>
<main>

    <div class="row flex-container">
        <div class="col-l-12 col-m-12 col-s-12 flex-gap">
            <span class="head-text2">User Requests</span>
        </div>
    </div>

    <div class="row row-style flex-container">
        <div class="col-l-12 col-m-12 col-s-12 primary-card flex-gap ">
            <div class="col-l-12 col-m-12 col-s-12 padding1">
                <span class="head-text">User Requests</span>
            </div>

            <div class="col-l-12 col-m-12 col-s-12 table-overflow">
                <table>
                    <tr>
                        <th>User Name</th>
                        <th>Email</th>
                        <th>User Type</th>
                        <th>Date of Birth</th>
                        <th>UserName</th>
                        <th>State</th>
                        <th>CV</th>
                        <th></th>
                        <th></th>
                    </tr>

                    <?php
                    foreach ($viewUserRequests as $row) { ?>
                    <tr>
                        <td><?php echo $row['fname']." ".$row['lname']?></td>
                        <td><?php echo $row['email']?></td>
                        <td><?php echo $row['type']?></td>
                        <td><?php echo $row['dob']?></td>
                        <td><?php echo $row['username']?></td>
                        <td><?php
                            if ($row['state'] == 1) {
                                echo 'Active';
                            }
                            elseif ($row['state'] == 0){
                                echo 'Inactive';
                            }
                            ?></td>
                        <td><a href="./uploads/<?php echo $row['cv']?>" download>Download CV</a></td>
                        <td>
                            <form method="post" action="/UserRequests">
                                <input type="submit" class="button1" value="Accept" name="state">
                                <input type="hidden" class="button1" value="<?php echo $row['id']?>" name="id">
                            </form>
                        </td>
                        <td> <a href="/UserRequestsDelete?id=<?php echo $row['id'] ?>" class="button6">Reject</a></td>
                    </tr>
                    <?php } ?>
                </table>
            </div>
        </div>
    </div>

</main>



</body>
</html>
