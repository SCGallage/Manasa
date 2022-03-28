
<?php $params
?>

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
            <span class="head-text2">User Verification</span>
        </div>
        <div class="col-l-8">
        </div>
    </div>
    <div class="row flex-container">

        <div class="col-l-8 col-m-12 col-s-12 flex-gap1 primary-card card-content">
            <div class="col-l-12 col-m-12 col-s-12 padding1">
                <span class="head-text">Allocate Work Phone</span>
            </div>

            <div class="col-l-12 col-m-12 col-s-12">
                <form name="phoneReg" action="/admin/updateUserWorkPhone" method="post" class="form1" onsubmit="return validatePhone()">
                    <div class="col-l-12 flex-container3 margin-top">
                        <div class="col-l-4 padding-top">
                            <label class="text-style3">Befrinder Phone No: </label>
                        </div>
                        <div class="col-l-6 padding-top-1 padding1" >
                            <input type="hidden" name="id" value="<?php echo $data['id']?>" required>
                            <input type="text" name="contact_number" value="" required>
                        </div>
                        <div class="col-l-2 padding-top-1 padding1" >
                            <input type="submit" value="Submit">
                        </div>
                    </div>
                </form>
            </div>


        </div>
    </div>


</main>

<script src="http://localhost/assets/js/admin/formValidation.js"></script>
