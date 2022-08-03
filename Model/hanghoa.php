<?php
class HangHoa
{
  //thuộc tính
  var $mahh=null;
  var $tenhh=null;// thuộc tính kiểu chuỗi
  var $dongia=0;// thuộc tính kiểu số
  var $giamgia=0;
  var $hinh="imagetourdien/";
  var $maloai=null;
  var $dacbiet=0;
  var $nhom=0;
  var $soluotxem=0;
  var $ngaylap=null;
  var $mota=null;
  var $soluonton=0;
  var $mausac=null;
  var $size=0;
  // hàm tạo
  function __construct()
  {
  }
  //pt lấy về 8 sản phẩm mới nhất 
  function getListHangHoaNew()
  {
    //b1: kết nối đc với database tức là mysql
    $db=new connect();
    // b2 muốn lấy đc 8 sản phẩm thì yêu cầu đối tượng đó thực thi câu truy vấn gì?
    // select
    $select="SELECT * FROM hanghoa ORDER by mahh DESC limit 8 ";
    $result=$db->getList($select);
    return $result;// trả về đc 8 sản phẩm mới nhất

  }
  // vì là return tức là getListHangHangNew chứa 8 sản phẩm
  // pt trả về 4 sản phẩm giảm giá
  function getListSale()
  {
    $db=new connect();
    // b2 muốn lấy đc 8 sản phẩm thì yêu cầu đối tượng đó thực thi câu truy vấn gì?
    // select
    $select="select * from hanghoa WHERE giamgia >0 ORDER by mahh limit 4  ";
    $result=$db->getList($select);
    return $result;// trả về đc 8 sản phẩm mới nhấ
  }
  // pt lấy hết tất cả sản phẩm về
  function getListHangHoa()
  {
    $db=new connect();
    $select="select * from hanghoa where giamgia=0";
    // yếu cầu bên lớp connect thực thi và trả về nhiều row
    $result=$db->getList($select);
    return $result;

  }
  // getListHangHoa trả về tất cả sp
  // pt lấy tất cả sp khuyến mãi
  function getListHangHoaSaleAll()
  {
    $db=new connect();
    $select="select * from hanghoa where giamgia>0";
    // yếu cầu bên lớp connect thực thi và trả về nhiều row
    $result=$db->getList($select);
    return $result;
  }
  function chitiethanghoa($id){
    
    $db=new connect();
    $select="select * from hanghoa where mahh=$id";
    $result=$db->getInstance($select);
    return $result;
  }
// de xem
   function getColor($nhom){
    $db=new connect();
    $select="select distinct mausac from hanghoa where nhom=$nhom";
    $result=$db->getList($select);
    return $result;
   }
   function getsize($nhom){
    $db=new connect();
    $select="select distinct size from hanghoa where nhom=$nhom order by size" ;
    $result=$db->getList($select);
    return $result;
   }
   function getListImageGroup($nhom){
    $db=new connect();
    $select="select * from hanghoa where nhom=$nhom";
    $result=$db->getList($select);
    return $result;
   }
   //phan trang hien thi so san pham
   function getListHanghoaPage($start,$limit){
    $db=new connect();
    $select="select * from hanghoa where giamgia=0 limit ".$start.",".$limit."";
    // yếu cầu bên lớp connect thực thi và trả về nhiều row
    $result=$db->getList($select);
    return $result;
   }
   function TimKiem($name){
    $db=new connect();
    $select="select * from hanghoa where giamgia=0 and tenhh like '%$name%'";
    // yếu cầu bên lớp connect thực thi và trả về nhiều row
    $result=$db->getList($select);
    return $result;
   }
   //tim kiem dung prepare
   function getSearch($name){
    $db=new connect();
    $select="select * from hanghoa where giamgia=0 and tenhh like :tenhh";
    // yếu cầu bên lớp connect thực thi và trả về nhiều row
    $stm=$db->execP($select);
    $stm->bindValue(':tenhh',"%".$name."%");
    $stm->execute();
    return $stm;
   }
}
?>