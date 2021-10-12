<?php

?>

<h1>Registration</h1>
<form action="" method="post" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">First Name</label>
        <input type="text" name="firstname" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
    </div>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Last Name</label>
        <input type="text" name="lastname" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
    </div>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">UserName</label>
        <input type="text" name="username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
    </div>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Email</label>
        <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
    </div>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Password</label>
        <input type="password" name="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
    </div>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Password</label>
        <input type="password" name="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
    </div>
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
<div class="mb-3">
    <div id="emailHelp" class="form-text"><a href="<?=$auth_url ?>">Sign Up Google</a></div>
</div>
