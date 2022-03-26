
    <link rel="stylesheet" href="http://localhost/assets/css/main.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,200;0,300;0,400;0,500;0,700;1,200&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
          rel="stylesheet"/>


<main>

    <div class="row flex-gap">
        <div class="col-l-12">
            <span class="head-text2">Create Schedule</span>
        </div>
    </div>
    <div class="row flex-container">


        <div class="col-l-6 col-m-12 col-s-12 flex-gap1 primary-card card-content">
            <div class="col-l-12 col-m-12 col-s-12 padding1">
                <span class="head-text">Upcoming Schedule</span>
            </div>

            <div class="col-l-12 col-m-12 col-s-12 card2">
                <form action="/admin/CreateSchedule" class="form1" method="post">

                    <div class="col-l-12 col-m-12 col-s-12 ">
                        <p class="text-style3">
                            Schedule should be created for an upcoming duration only.
                        </p>
                    </div>

                    <div class="col-l-12 col-m-12 col-s-12 flex-container padding-top">
                        <div class="col-l-6 col-m-12 col-s-12 padding-right flex-container2">
                            <div class="col-l-12 col-m-12 col-s-12">
                                <label for="email" class="text-style3">To:</label>
                            </div>
                            <div class="col-l-12 col-m-12 col-s-12">
                                <input type="Date" name="startDate" value="" required>
                                <span class="required-text">*Required</span>
                            </div>
                        </div>
                        <div class="col-l-6 col-m-12 col-s-12 padding-left flex-container2">
                            <div class="col-l-12 col-m-12 col-s-12">
                                <label for="Date" class="text-style3">From:</label>
                            </div>
                            <div class="col-l-12 col-m-12 col-s-12">
                                <input type="date"  name="endDate" value="" required>
                                <span class="required-text">*Required</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-l-12 col-m-12 col-s-12 padding-top">
                        <input type="submit" value="Submit" class="button2">
                    </div>

                </form>
            </div>
        </div>
    </div>


</main>

