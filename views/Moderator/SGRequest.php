<?php $params ?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Search User</title>
    <link rel="stylesheet" href="http://localhost/assets/css/main.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,200;0,300;0,400;0,500;0,700;1,200&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
          rel="stylesheet"/>

</head>
<body>
<main>

    <div class="row flex-container">
        <div class="col-l-12 col-m-12 col-s-12 flex-gap">
            <span class="head-text2">User Requests</span>
            <span class="head-text2">Hello</span>
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
                        <th>Befriender Name</th>
                        <th>Support Group Name</th>
                        <th>Type</th>
                        <th>Participants</th>
                        <th>Reason</th>
                        <th></th>
                        <th></th>
                    </tr>

                    <?php
                    foreach ($viewSGRequest as $row) { ?>
                        <tr>
                            <td><?php echo $row['fname']." ".$row['lname']?></td>
                            <td><?php echo $row['name']?></td>
                            <td><?php echo $row['type']?></td>
                            <td><?php echo $row['capacity']?></td>
                            <td><?php echo $row['reason']?></td>
                            <td> <a href="/admin/SGRequestsUpdate?id=<?php echo $row['id'] ?>" class="button1">Accept</a></td>
                            <td> <a href="/admin/SGRequestsPageDelete?id=<?php echo $row['id'] ?>" class="cancel-button">Reject</a></td>
                        </tr>
                    <?php } ?>
                </table>
            </div>
        </div>
    </div>

</main>



</body>
</html>
