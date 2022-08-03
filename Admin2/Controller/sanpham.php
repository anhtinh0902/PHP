<?php 
     $action="sanpham";
     if(isset($_GET['act']))
     {
         $action=$_GET['act'];
     }
     switch ($action) {
         case 'sanpham':
             include "View/hanghoa.php";
             break;
         case 'insert':
            include "View/edithanghoa.php";
            break;
        case 'insert_action':
            if(isset($_POST['submit']))
            {
                $mahh=$_POST['mahh'];
                $tenhh=$_POST['tenhh'];
                $dongia=$_POST['dongia'];
                $giamgia=$_POST['giamgia'];
                $hinh=$_FILES['image']['name'];
                $Nhom=$_POST['nhom'];
                $maloai=$_POST['maloai'];
                $dacbiet=$_POST['dacbiet'];
                $soluotxem=$_POST['slx'];
                $ngaylap=$_POST['ngaylap'];
                $mota=$_POST['mota'];
                $soluongton=$_POST['slt'];
                $mausac=$_POST['mausac'];
                $size=$_POST['size'];
            }
            $hh=new hanghoa();
            $hh->inserthanghoa($tenhh,$dongia,$giamgia,$hinh,$Nhom,$maloai,$dacbiet,$soluotxem,$ngaylap,$mota,$soluongton,$mausac,$size);
            if(isset($hh)){
                uploadimg();
                echo "<script>alert('Them thanh cong!!!')</script>";
            }
            include "View/hanghoa.php";
            break;
        case "update":
            include "View/edithanghoa.php";
            break;
        case "update_action":
            if(isset($_POST['submit'])){
                $mahh=$_POST['mahh'];
                $tenhh=$_POST['tenhh'];
                $dongia=$_POST['dongia'];
                $giamgia=$_POST['giamgia'];
                $hinh=$_FILES['image']['name'];
                $Nhom=$_POST['nhom'];
                $maloai=$_POST['maloai'];
                $dacbiet=$_POST['dacbiet'];
                $soluotxem=$_POST['slx'];
                $ngaylap=$_POST['ngaylap'];
                $mota=$_POST['mota'];
                $soluongton=$_POST['slt'];
                $mausac=$_POST['mausac'];
                $size=$_POST['size'];
            }
            $hh=new hanghoa();
            $hh->updatehanghoa($mahh,$tenhh,$dongia,$giamgia,$hinh,$Nhom,$maloai,$dacbiet,$soluotxem,$ngaylap,$mota,$soluongton,$mausac,$size);
            if(isset($hh)){
                uploadimg();
                echo "<script>alert('Cap nhat san pham thanh cong!!!')</script>";
            }
            include "View/hanghoa.php";
            break;
        case "delete":

            if(isset($_GET['id']))
            {
                $mahh=$_GET['id'];
                $hh=new hanghoa();
                $hh->deletehanghoa($mahh);
                echo "<script>alert('xoa san pham thanh cong!!!')</script>";
            }
            include "View/hanghoa.php";
            break;
        case "thongke":
            include "View/thongke.php";
            break;
     }
?>