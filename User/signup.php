<?php
 
// get database connection
include_once '../config/usersdb.php';
 
// instantiate user object
include_once '../user.php';
 
$database = new Database();
$db = $database->getConnection();
 
$user = new User($db);
 
// set user property values
$user->username = $_POST['username'];
$user->password = $_POST['password'];
 
// create the user
if($user->username!=null && $user->signup()){
//    $user_arr=array(
//        "status" => true,
//        "message" => "Successfully Signup!",
//        "id" => $user->id,
//        "username" => $user->username
//    );

    echo "<script>";
    echo "alert('Successfully signed up! Please log in');";
    echo "window.location = '../index.php';";
    echo "</script>";
    exit;
}
else{
//    $user_arr=array(
//        "status" => false,
//        "message" => "Username already exists!"
//    );
    
    echo "<script>";
    echo "alert('Please enter a different username');";
    echo "window.location = '../index.php';";
    echo "</script>";
    exit;
}
//print_r(json_encode($user_arr));
?>