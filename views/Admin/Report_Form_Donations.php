

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
        <div class="col-l-4">
            <span class="head-text2">Generate Reports</span>
        </div>
        <div class="col-l-8">
            <ul class="RG-nav" style="list-style-type:none;">
                <li class="RG-nav"><a href="/admin/GenReport">Overview Report</a></li>
                <li class="RG-nav"><a class="" href="/admin/volReport">Volunteer Report</a></li>
                <li class="RG-nav"><a href="/admin/befrienderReport">Befriender Report</a></li>
                <li class="RG-nav"><a href="/admin/donationReport">Donation Report</a></li>
            </ul>
        </div>
    </div>
    <div class="row flex-container">

        <div class="col-l-6 col-m-12 col-s-12 flex-gap1 primary-card card-content">
            <div class="col-l-12 col-m-12 col-s-12 padding1">
                <span class="head-text">Donation Report</span>
            </div>

            <div class="col-l-12 col-m-12 col-s-12 card2">
                <form action="/admin/donationReport" class="form1" method="post" name="reportGenForm" onsubmit="return reportGenValidation()">
                    <div class="col-l-12 col-m-12 col-s-12 ">
                        <p class="text-style3">
                        Donation report displays the total amount received in donations and the donors for the entered time duration
                        </p>
                    </div>

                    <div class="col-l-12 col-m-12 col-s-12 flex-container padding-top">
                        <div class="col-l-6 col-m-12 col-s-12 padding-right flex-container2">
                            <div class="col-l-12 col-m-12 col-s-12">
                                <div class="col-l-10 col-m-10 col-s-10 ">
                                    <label for="email" class="text-style3">From:</label>
                                </div>
                                <div class="col-l-2 col-m-2 col-s-2">
                                    <div class="tooltip-icon  positionR " data-tooltip="Start Date of Report Duration"></div>
                                </div>
                            </div>
                            <div class="col-l-12 col-m-12 col-s-12">
                                <input type="Date" id="email" name="StartDate" value="" required>
                                <span class="required-text">*Required</span>
                            </div>
                        </div>
                        <div class="col-l-6 col-m-12 col-s-12 padding-left flex-container2">
                            <div class="col-l-12 col-m-12 col-s-12">
                                <div class="col-l-10 col-m-10 col-s-10 ">
                                    <label for="email" class="text-style3">To:</label>
                                </div>
                                <div class="col-l-2 col-m-2 col-s-2">
                                    <div class="tooltip-icon  positionR " data-tooltip="End Date of Report Duration"></div>
                                </div>
                            </div>
                            <div class="col-l-12 col-m-12 col-s-12">
                                <input type="date" id="date" name="EndDate" value="" required>
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
<script src="http://localhost/assets/js/admin/formValidation.js"></script>
