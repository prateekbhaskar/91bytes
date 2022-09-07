<?php
error_reporting(0); //turning off Error Reporting
//function to connect db
function db()
{
global $con;
//connection for database;
$dbHost="localhost";  
$dbName="91bytes";  
$dbUser="91bytes";      //user name.  
$dbPassword="";     //password  
try{  
    $con= new PDO("mysql:host=$dbHost;dbname=$dbName",$dbUser,$dbPassword);  
} catch(Exception $e){  
safe("OOPS!!!, there was an ERROR! Please contact your Administrator");  
}
}
//function for PDO query and result
function getmeresult($a,$b=null)
{
    db();
    global $con;
    $xx=$con->prepare($a);
    $xx->execute($b);
    return $xx;
}
//function to check for desired inputs in the formdata
function attacker($keys)
{
    if(array_diff($keys,array_keys($_POST)))
    {
    //taking to index page when there is any field required is missing from the form
    header('location:index.php?msg=error');
    exit;
    }
    else
    {
        foreach($keys as $key)
        {
            if(empty($_POST[$key]))
            {
                //redirecting the form if any field is empty
                header('HTTP/1.1 307 Temporary Redirect');
	            header ('location:index.php?msg=error');
                exit;
            }
        }
    }
}
//checking for single existence of any data
function exists($data){if($data->rowCount()!=1){return "no";}else{return "yes";}}
//returning special chars
function safe($a)
{
    return htmlspecialchars($a);
}
