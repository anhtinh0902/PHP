<?php
$action="registration";
if(isset($_GET['act']))
{
    $action=$_GET['act'];
}
switch ($action) {
    case 'registration':
        include 'View/registration.php';
        break;
    
    case 'registration_action':
    
        if($_SERVER['REQUEST_METHOD']=='POST')//if($_POST['nop'])
        {
            $tenkh=$_POST['txttenkh'];
            $diachi=$_POST['txtdiachi'];
            $sodt=$_POST['txtsodt'];
            $username=$_POST['txtusername'];
            $email=$_POST['txtemail'];
            $password=$_POST['txtpass'];
            $cypt=md5($password);
            $ur=new User();
            $ur->InsertUser3($tenkh,$username,$cypt,$email,$diachi,$sodt);
            echo '<script>alert("Đăng ký thành công");</script>';
        }
        include 'View/registration.php';
        break;
}
?>
