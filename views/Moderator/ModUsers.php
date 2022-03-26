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
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
          rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
          rel="stylesheet"/>
</head>
<body>
<main>
    <div class="row flex-container">

        <div class="col-l-12 col-m-12 col-s-12 flex-gap">

            <div class="col-l-9 col-m-12 col-s-12">
                <span class="head-text2">User Details</span>
            </div>
            <div class="col-l-3 col-m-8 col-s-8 positionR">
                <div class="search">
                    <form action="/mod/ModUsers" method="post">
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
                <div class="col-l-12 col-m-12 col-s-12"> <span class="head-text">Users</span> </div>
            </div>

            <div class="col-l-12 col-m-12 col-s-12 table-overflow">
                <table>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>User Type</th>
                        <th>UserName</th>
                        <th>State</th>
                        <th>CV</th>
                        <th></th>
                        <th></th>
                    </tr>

                    <?php
                    foreach ($viewUser as $row) { ?>
                        <tr>
                            <td><?php echo $row['fname']." ".$row['lname']?></td>
                            <td><?php echo $row['email']?></td>
                            <td><?php echo $row['role']?></td>
                            <td><?php echo $row['username']?></td>
                            <td><?php
                                if ($row['state'] == 1) {
                                    echo 'Active';
                                }
                                elseif ($row['state'] == 0){
                                    echo 'Inactive';
                                }
                                ?></td>
                            <td><a href="/file_storage/cv/<?php echo $row['cv']?>" download>Download CV</a></td>
                        </tr>
                    <?php } ?>
                </table>
            </div>
        </div>
    </div>

</main>


</body>
</html>
