<?php $params ?>

<!--View all volunteer events-->
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
                <span class="head-text2">Volunteer Events</span>
            </div>

            <div class="col-l-3 col-m-8 col-s-8 positionR">
                <div class="search">
                    <form action="/admin/viewVolunteerEvent" method="post">
                    <input type="text" class="searchTerm" placeholder="Search" name="search">
                    <button type="submit" class="searchButton">
                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="currentColor"><path d="M0 0h24v24H0z" fill="none"/><path d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"/></svg>
                    </button>
                    </form>
                </div>
            </div>

            </div>
        </div>

    </div>

    <div class="row row-style flex-container">
        <div class="col-l-12 col-m-12 col-s-12 primary-card flex-gap">

            <div class="col-l-12 col-m-12 col-s-12 table-overflow">
                <table>
                    <tr>
                        <th>Event Name</th>
                        <th>Location</th>
                        <th>Date</th>
                        <th>Duration</th>
                        <th>Moderator</th>
                        <th>Event Type</th>
                        <th>Description</th>
                    </tr>

                    <?php
                    foreach ($eventDetails as $row) { ?>
                        <tr>
                            <td><?php echo $row['name']?></td>
                            <td><?php echo $row['location']?></td>
                            <td><?php echo $row['startDate']?></td>
                            <td><?php echo $row['startTime'] ." - " .$row['endTime']?></td>
                            <td><?php echo $row['fname']." ".$row['lname']?></td>
                            <td><?php
                                if ($row['type'] == 1) {
                                    echo 'Open Event';
                                }
                                elseif ($row['type'] == 0){
                                    echo 'Exclusive Event';
                                }
                                ?></td>
                            <td><?php echo $row['description']?></td>
                            <!--                            <td><a href="/admin/deleteVolunteerEvent?id=--><?php //echo $row['id'] ?><!--" ><span class="material-icons">delete</span></a></td>-->
                        </tr>
                    <?php } ?>
                </table>
            </div>
        </div>
    </div>

</main>

</body>
</html>
