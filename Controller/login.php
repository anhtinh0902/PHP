<?php 
$action="login";
if(isset($_GET['act']))
{
    $action=$_GET['act'];
}
switch ($action) {
    case 'login':
        include 'View/login.php';
        break;
    case 'login_action':
        if($_SERVER['REQUEST_METHOD']=='POST')
        {
            $username=$_POST['txtusername'];
            $password=$_POST['txtpassword'];
            $mahoa=md5($password);
            $ur=new User();
            $log=$ur->getListUser($username,$mahoa);
            if($log==true)
            {
                $_SESSION['makh']=$log['makh'];
                $_SESSION['tenkh']=$log['tenkh'];
                $_SESSION['username']=$log['username'];
                $_SESSION['matkhau']=$log['matkhau'];
                $_SESSION['email']=$log['email'];
                $_SESSION['diachi']=$log['diachi'];
                $_SESSION['sodienthoai']=$log['sodienthoai'];
                echo '<script> alert("Đăng nhập thành công");</script>';
        // sau khi đăng nhập thành công muốn quay về trang chủ, tức là trang home
        // thường làm thay đổi trang thì phải refresh mới thấy đc thông tin thay đổi
                echo '<meta http-equiv="refresh" content="0;url=index.php?action=home"/>';
            }
            else{
                echo '<script> alert(" Đăng nhập không thành công");</script>';
                include 'View/login.php';
            }
        }
        break;
        case  'logout' :
        if(isset($_SESSION['makh'])&&isset($_SESSION['tenkh']))
        {
            //unset array=['php','nodejs'] unset($aray[1]) mat di nodejs
            // xóa session name
      unset( $_SESSION['makh']);
      unset( $_SESSION['tenkh']);
      unset( $_SESSION['username']);
      unset( $_SESSION['matkhau']);
      unset( $_SESSION['email']);
      unset( $_SESSION['diachi']);
      unset( $_SESSION['sodienthoai']);
      // xóa hết session
      session_destroy();
        }
        echo '<meta http-equiv="refresh" content="0;url=index.php?action=home"/>';
        break;
        //$GLOBAL
        //function test()
        // unset($GLOBAL['test'])
        // test='jgjgjgjgj'; chi mat trong ham test con o ngoai van dung dc
}
