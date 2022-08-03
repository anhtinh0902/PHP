<?php 

$action="giohang";
// neu 
if(!isset($_SESSION['cart']))
{
  $_SESSION['cart']=array();// giỏ hàng chứa nhiều món hàng 
  // a[10,12,13,14]
  // $_SESSION['cart][10,12,13,14]
  
}
if(isset($_GET['act'])){
    $action=$_GET['act'];
}
switch ($action) {
    case 'giohang':
        include 'View/cart.php';
        break;
    
    case 'add_cart' :
        if($_SERVER['REQUEST_METHOD']=='POST')
    {
      $mahh=$_POST['mahh'];//16
      $mausac=$_POST['mymausac'];//hồng đạm
      $soluong=$_POST['soluong'];//1
      $size=$_POST['size'];//37
      // lấy đc thì đem nó add vào giỏ hàng, mà ai làm nhiệm vụ thêm vào giỏ hàng -> là model
      // do giỏ hàng bên Model ko tạo class nên khi gọi pt chỉ cần tên pt
      // $mahh,$quantity,$mycolor,$size
      add_item($mahh,$soluong,$mausac,$size);
      echo '<meta http-equiv="refresh" content="0;url=index.php?action=giohang"/>';
    }
    break;
    case 'delete_item' :
      if(isset($_GET['id']))
      {
        $key=$_GET['id'];
        unset($_SESSION['cart'][$key]);
        echo '<meta http-equiv="refresh" content="0;url=index.php?action=giohang"/>';
      }
    break;
    case 'update_cart' :
      //can chnh sua so luong
      $soluongnew=$_POST['newqty'];
      foreach($soluongnew as $key=>$qty)
      {
        if($_SESSION['cart'][$key]['qty']!=$qty)
        {
          update_item($key,$qty);
        }
      }
      echo '<meta http-equiv="refresh" content="0;url=index.php?action=giohang"/>';
      
    break;   

}

?>