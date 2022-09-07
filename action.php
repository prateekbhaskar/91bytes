<?php require('connect.php');
/***********************************Register SECTION*************************************************/
//adding new user
if (isset($_POST['register'])) {
    //checking for form keys
    $keys = ['name', 'email', 'password', 'term', 'register'];
    attacker($keys);
    //cheking if term key is aceepted or not
    if ($_POST['term'] != 'accepted') {
        header('HTTP/1.1 307 Temporary Redirect');
        header('location:index.php');
        exit;
    }
    //hashing the password with md5
    $password = hash('md5', $_POST['password']);
    //validating email correct format 
    $email = $_POST["email"];
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header('HTTP/1.1 307 Temporary Redirect');
        header('location:index.php?msg=emailformat');
        exit;
    } else {
        $email = safe($_POST['email']);
    }
    $data = [
        'email' => $email
    ];
    //checking the existing of user with same email, if exists no entry to be made in database
    $query = "SELECT * from `user` where email=:email";
    $x = getmeresult($query, $data);
    //entering data to database if the email doesn't exist in database
    if (exists($x) == 'no') {
        $data = [
            'name' => safe($_POST['name']),
            'email' => $email,
            'password' => $password,
        ];
        $query = "INSERT INTO `user`(`name`,`email`,`password`,`created`) VALUES (:name,:email,:password,now())";
        getmeresult($query, $data);
        header('location:index.php?msg=success');
    }
    //if email already exits in the database then redirecting the form with data to the index
    else {
        header('HTTP/1.1 307 Temporary Redirect');
        header('location:index.php?msg=exists');
    }
    exit;
}
//if the form is submitted without register button
else {
    header('HTTP/1.1 307 Temporary Redirect');
    header('location:index.php?msg=error');
}
