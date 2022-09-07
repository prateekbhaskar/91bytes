<!DOCTYPE html>
<?php
require('connect.php');
//check for redirection of the form
if (isset($_POST['register'])) {
    //blank error variables
    $nameE = $mailE = $passE = '';
    //old values of the form
    $name = safe($_POST['name']);
    $email = safe($_POST['email']);
    $password = safe($_POST['password']);
    $term = safe($_POST['term']);
    //error messages
    if ($name == '') {
        $nameE = "Enter Name";
    }
    if ($email == '') {
        $emailE = "Please enter mail id / check correct format";
    }
    if ($password == '') {
        $passE = "Password is required";
    }
}
?>
<html>

<head>
    <title>91Bytes - Bellefit</title>
    <link rel="icon" type="image/x-icon" href="assets/images/logo.png">
    <link href='https://fonts.googleapis.com/css?family=Athiti' rel='stylesheet'>
    <link rel="stylesheet" href="assets/custom.css">
</head>

<body>
    <div class='custompage'>
        <div class='formdiv'>
            <img class='image1' src='assets/images/image1.png'>
            <img class='image2' src='assets/images/image2.png'>
            <div class='formsection'>
                <div class='logo'></div>
                <div class='brandname'>Bellefit</div>
                <div class='formname'>Create Account</div>
                <form method='post' action='action.php'>
                    <div class='form-input' style='top:232.09px'>
                        <i class="icon" style="content: url(https://api.iconify.design/carbon/user-avatar-filled.svg);"></i>
                        <input name='name' placeholder='Full Name' type='text' value='<?php echo $name ?>' required></br>
                        <i class="error" style='top:273px'><?php if ($nameE != '') {
                                                                echo '* ' . $nameE;
                                                            } ?></i>
                    </div>
                    <div class='form-input' style='top:291.22px'>
                        <i class="icon" style="content: url(https://api.iconify.design/ic/outline-alternate-email.svg);"></i>
                        <input name='email' placeholder='Email address' type='email' value='<?php echo $email ?>' required></br>
                        <i class="error" style='top:333px'><?php if ($emailE != '') {
                                                                echo '* ' . $emailE;
                                                            } ?></i>
                    </div>
                    <div class='form-input' style='top:350.36px'>
                        <i class="icon" style="content: url(https://api.iconify.design/ri/lock-password-fill.svg);"></i>
                        <input id="password" name='password' style="width:263px" placeholder='Password' type='password' value='<?php echo $password ?>' required>
                        <i class="icon" style="left:297px;content: url(https://api.iconify.design/ant-design/eye-invisible-filled.svg);" onclick="showpassword(this)"></i></br>
                        <i class="error" style='top:393px'><?php if ($passE != '') {
                                                                echo '* ' . $passE;
                                                            } ?></i>
                    </div>
                    <input name='term' type='radio' <?php if ($term == 'accepted') {
                                                        echo "onclick=uncheckterm(this) checked=true value=accepted ";
                                                    } else {
                                                        echo 'onclick=checkterm(this) ';
                                                    } ?> oninvalid="this.setCustomValidity('Agree with terms and condition before submitting')" oninput="this.setCustomValidity('')" required><span class='term'>I agree with <a href="">Terms</a> and <a href="">Privacy</a></span>
                    <input type='submit' name='register' value='SIGN UP' required>

                </form>
            </div>
        </div>
    </div>
</body>
<!--custom css file-->
<script src="assets/custom.js"></script>
<!--Sweet alert js file-->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<?php
//flashing sweet alert messages
if (isset($_GET['msg'])) {
    if ($_GET['msg'] == 'success') {
        echo "<script>swal('Thanks','You are registered','success');</script>";
    } elseif ($_GET['msg'] == 'error') {
        echo "<script>swal('Sorry','There was some Error','error');</script>";
    } elseif ($_GET['msg'] == 'emailformat') {
        echo "<script>swal('Stop','Enter Email in correct format','warning');</script>";
    } elseif ($_GET['msg'] == 'exists') {
        echo "<script>swal('Try Again','This email is already registered!','info');</script>";
    } else {
        echo "<script>swal('Warning','This is not allowed','warning');</script>";
    }
}
?>

</html>