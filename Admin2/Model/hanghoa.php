<?php
 class hanghoa{
     public function __construct()
     {
         
     }
     function getallHanghoa(){
         $db=new connect();
         $select="select * from hanghoa";
         $result=$db->getList($select);
         return $result;
     }
     function getListmaloai(){
        $db=new connect();
        $select="select maloai,tenloai from loai";
        $result=$db->getList($select);
        return $result;
     }
     function inserthanghoa($tenhh,$dongia,$giamgia,$hinh,$Nhom,$maloai,$dacbiet,$soluotxem,$ngaylap,$mota,$soluongton,$mausac,$size){
        $db=new connect();
        $query="insert into hanghoa(mahh,tenhh,dongia,giamgia,hinh,Nhom,maloai,dacbiet,soluotxem,ngaylap,mota,soluongton,mausac,size)
        values(NULL,'$tenhh',$dongia,$giamgia,'$hinh',$Nhom,$maloai,$dacbiet,$soluotxem,'$ngaylap','$mota',$soluongton,'$mausac',$size)";
        $db->exec($query);
     }
     function getHangHoaID($id){
         $db = new connect();
         $query="select * from hanghoa where mahh=$id";
         $result=$db->getInstance($query);
         return $result;
     }
     function updatehanghoa($id,$tenhh,$dongia,$giamgia,$hinh,$Nhom,$maloai,$dacbiet,$soluotxem,$ngaylap,$mota,$soluongton,$mausac,$size){
        $db= new connect();
        $query="update hanghoa
                set tenhh='$tenhh',
                dongia=$dongia,
                giamgia=$giamgia,
                hinh='$hinh',
                Nhom=$Nhom,
                maloai=$maloai,
                dacbiet=$dacbiet,
                soluotxem=$soluotxem,
                ngaylap='$ngaylap',
                mota='$mota',
                soluongton=$soluongton,
                mausac='$mausac',
                size=$size
                where mahh=$id
                ";
        $db->exec($query);
     }
     function deletehanghoa($id){
         $db= new connect();
         $query="delete from hanghoa where mahh=$id";
         $db->exec($query);
     }
     function insertLoaiHang($id,$tenloai,$idmenu){
         $db= new connect();
         $query="insert into loai(maloai,tenloai,idmenu) values($id,'$tenloai',$idmenu)";
         $db->exec($query);
     }
     function getListHangHoa_thongke()

  {

    $db=new connect();

    $select="SELECT a.mahh,a.tenhh,sum(soluongmua) as soluongban from hanghoa a INNER join cthoadon1 b on a.mahh=b.mahh GROUP by a.mahh,a.tenhh";

    $result=$db->getList($select);

    return $result;

  }
 }
?>