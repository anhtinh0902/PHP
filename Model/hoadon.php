<?php
class HoaDon{
    //thuoc tinh
    public function __construct()
    {
        
    }
    public function insertOrder($makh){
      $date=new DateTime("now");
      $ngay=$date->format("y-m-d");
      $db=new connect();
      $query="insert into hoadon1(masohd,makh,ngaydat,tongtien) values(null,$makh,'$ngay',0)";
      $db->exec($query);
      $select="select masohd from hoadon1 order by masohd desc limit 1";
      $result=$db->getInstance($select);
      return $result[0];
    }
    public function insertchitiethoadon($masohd,$mahh,$soluong,$mausac,$size,$thanhtien){
        $db=new connect();
        $query="insert into cthoadon1(masohd,mahh,soluongmua,mausac,size,thanhtien,tinhtrang)
        values($masohd,$mahh,$soluong,'$mausac',$size,$thanhtien,0)";
        $db->exec($query);
    }
    function updateOrderTotal($masohd,$total)
    {
        $db=new connect();
        $query="update hoadon1 set tongtien=$total where masohd=$masohd";
        $db->exec($query);
    }
    // update hanghoa set loaihang='nu' where loaihang='nu'
    function getOrder($sohdid){
        $db=new connect();
        $select="select b.masohd, a.tenkh,a.diachi,a.sodienthoai,b.ngaydat from khachhang1 a 
        inner join hoadon1 b on a.makh=b.makh where masohd=$sohdid";
        $result=$db->getInstance($select);
        return $result;
    }
    function getOrderDetail($sohdid)
    {
    $db=new connect();
    $select="select a.tenhh,a.dongia,b.mausac,b.size,b.soluongmua,b.thanhtien,a.hinh,a.mota from hanghoa a inner join cthoadon1 b on a.mahh=b.mahh where  masohd=$sohdid";
    // kết quả trả về nhiều món hàng mà khách hàng mua
    $result=$db->getList($select);
    return $result;
    }
}
?>