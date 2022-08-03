<?php
class User {
    var $makh=0;
        var $tenkh=null;
        var $user=null;
        var $email=null;
        var $pas=null;
        var $diachi=null;
        var $sodt=null;
        var $vaitro=0;
    public function __construct()
    {
        
    }
    public function insertUser($tenkh,$username,$matkhau,$email,$diachi,$dt){
         $db=new connect();
         $query="insert into khachhang1(makh,tenkh,username,matkhau,email,diachi,sodienthoai,vaitro)
         values(Null,'$tenkh','$username','$matkhau','$email','$diachi','$dt',default)
         ";
         $result=$db->exec($query);
    }
    public function insertUser2($tenkh,$username,$matkhau,$email,$diachi,$dt)
    {
         $db=new connect();
         $query="insert into khachhang1(makh,tenkh,username,matkhau,email,diachi,sodienthoai,vaitro)
            values(Null,?,?,?,?,?,?,default)";
        $result=$db->execP($query);
        $result->execute([$tenkh,$username,$matkhau,$email,$diachi,$dt]);
    }
    public function InsertUser3($tenkh,$username,$matkhau,$email,$diachi,$dt)
        {
            $db=new connect();
            $query="insert into khachhang1(makh,tenkh,username,matkhau,email,diachi,sodienthoai,vaitro)
            values(Null,:tenkh,:username,:matkhau,:email,:diachi,:sodienthoai,default)";
            $stm=$db->execP($query); //Sử dụng prepare
            //Gán giá trị hoặc thuộc tính bindValue hoặc bindParam
            $stm->bindValue(':tenkh',$tenkh);
            $stm->bindValue(':username',$username);
            $stm->bindValue(':matkhau',$matkhau);
            $stm->bindValue(':email',$email);
            $stm->bindValue(':diachi',$diachi);
            $stm->bindValue(':sodienthoai',$dt); 
            //bindParam sẽ nhận giá trị thông qua 1 tham số để mà tham chiếu 
            //Muốn prepare được thì execute
            $stm->execute();
        }
    public function getListUser($username,$password){
        $db= new connect();
        $select="select * from khachhang1 where username='$username' and matkhau='$password'";
        $result=$db->getList($select);
        $set=$result->fetch();
        return $set;
    }
    //phuong thuc dem cac binh luan
    public function dembinhluan($id){
        $db= new connect();
        $select="select count(mabl) from binhluan1 where mahh=$id";
        $result=$db->getInstance($select);
        return $result[0];
    }
    function insertBinhluan($mahh,$makh,$noidung){
        $db= new connect();
        $date=new DateTime("now");
        $ngay=$date->format("Y-m-d");
        $select="insert into binhluan1(mabl,mahh,makh,ngaybl,noidung) values (NULL,$mahh,$makh,'$ngay','$noidung')";
        $result=$db->exec($select);
        
    }
    function hienthibinhluan($mahh){
        $db=new connect();
        $select="select a.tenkh,b.noidung from khachhang1 a inner join binhluan1 b on a.makh=b.makh 
        where b.mahh=$mahh";
        $result=$db->getList($select);
        return $result;
    }
}
?>