<?php
$action="home";
if(isset($_GET['act']))
{
  $action=$_GET['act'];//$action=khuyenmai
}
switch($action)
{
  case 'home':
    include 'View/home.php';
    break;
  case 'sanpham':
    include 'View/sanpham.php';
    break;
  case 'khuyenmai':
    include 'View/sanpham.php';
    break;
  case 'detail':
  include 'View/sanphamchitiet.php';
  break;
  case 'timkiem':
    include 'View/sanpham.php';
  break;
  case 'binhluan':
    if($_SERVER['REQUEST_METHOD']=='POST')
    {
      $mahh=$_POST['txtmahh'];
      $noidung=$_POST['comment'];
      $makh=$_SESSION['makh'];
      $u=new User();
      $u->insertBinhluan($mahh,$makh,$noidung);
      include 'View/sanphamchitiet.php';
    }
  break;
}
?>