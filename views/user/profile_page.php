<h2>Google ID: <?=$google_id ?></h2>
<h2>First Name: <?=$fistname ?></h2>
<h2>Last Name: <?=$lastname ?></h2>
<h2>Email: <?=$email ?></h2>
<form action="" method="post" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="file" class="form-label">Upload Your CV here</label>
        <input type="file" name="file" class="form-control" id="file" aria-describedby="emailHelp">
        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
    </div>
    <!--<div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Confirm Password</label>
        <input type="password" name="confirmpassword" class="form-control" id="exampleInputPassword1">
    </div>-->
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
