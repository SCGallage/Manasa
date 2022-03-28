<link rel="stylesheet" href="<?php echo $_ENV['BASE_URL']?>/assets/css/befriender/appointments.css">
<main>
    <div class="table-container">
        <div class="main-heading">
            <h4 class="title">Appointments</h4>
            <div class="search-bar">
                <form method="post" action="./deletemeeting?befid=41">
                    <button type="submit" class="search-btn">I am sick</button>
                </form>
            </div>
        </div>
        <table class="upcoming-sessions">
            <thead class="table-head">
            <tr>
                <th></th>
                <th>ID</th>
                <th>Username</th>
                <th>Date</th>
                <th>Time</th>
                <th>Type</th>
                <th></th>
            </tr>
            </thead>
            <tbody class="table-body">
            <?php
                foreach ($meetingList as $meeting) {
                    echo "
                    <tr>
                        <td><img  alt='' class='profile-icon' /></td>
                        <td>{$meeting['id']}</td>
                        <td>{$meeting['username']}</td>
                        <td>{$meeting['appointment_date']}</td>
                        <td>{$meeting['startTime']} - {$meeting['endTime']}</td>
                        <td>{$meeting['meeting_type']}</td>
                        <td class='details-link'>Details</td>
                    </tr>";
                }
            ?>
            </tbody>
        </table>

</main>