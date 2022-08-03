<?php 
     $action="loaihang";
     if(isset($_GET['act']))
     {
         $action=$_GET['act'];
     }
     switch ($action) {
         case 'loaihang':
             include "View/editloaisanpham.php";
             break;
         
         case "import_loaihang":
            if(isset($_POST['submit'])){
                $file=$_FILES["file"]["tmp_name"];
                $file_put_content($file,str_replace("\xEF\xBB\xBF","",file_get_contents($file)));
                $file_open=fopen($file,"r");
                while($csv=fgetcsv($file_open,1000,',')){
                    $maloai=$csv[0];
                    $tenloai=$csv[1];
                    $idmenu=$csv[2];
                    $hh=new hanghoa();
                    $hh->insertLoaiHang($maloai,$tenloai,$idmenu);

                }
                echo "<script> alert('thành công')</script>";
                include "View/hanghoa.php";
            }
            break;
        }
         ?>