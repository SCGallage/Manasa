<?php

?>

<h1>Contact Page</h1>
<form action="" method="post">
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Subject</label>
        <input type="text" name="subject" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Email</label>
        <input type="email" name="email" class="form-control" id="exampleInputPassword1">
    </div>
    <div class="mb-3">
        <label for="body" class="form-label">Body</label>
        <textarea name="body" class="form-control" id="body"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
