<?php

function add_item($mahh,$quantity,$mycolor,$size)
{
    $pros=new HangHoa();
    $pro=$pros->chitiethanghoa($mahh);
    if(isset($_SESSION['cart'][$mahh]))
    {
      $quantity+=$_SESSION['cart'][$mahh]['qty'];
      update_item($mahh,$quantity);
      return;
    }
    $cost=$pro['dongia'];
    $ten=$pro['tenhh'];
    $hinh=$pro['hinh'];
    $total=$cost*$quantity;
    // tạo 1 đối tượng bao có các thuộc tính mahh,hinh,name,mycolor,size,cost,quantity,total
    $item=array(
        'mahh'=>$mahh,// key=>value
      'hinh'=>$hinh,
      'name'=>$ten,
      'mau'=>$mycolor,
      'size'=>$size,
      'cost'=>$cost,
      'qty'=>$quantity,
      'total'=>$total
    );
    $_SESSION['cart'][$mahh]=$item;
}
function get_tongtien(){
     $tongtien=0;
     foreach($_SESSION['cart'] as $item)
     {
       $tongtien+= $item['total'];
     }
     $tongtien=number_format($tongtien,2);
     return $tongtien;
}
function update_item($mahh,$quantity){
  if($quantity<=0)
  {
    unset($_SESSION['cart'][$mahh]);
  }
  else
  {
   $_SESSION['cart'][$mahh]['qty']=$quantity;
   $totalnew=$_SESSION['cart'][$mahh]['qty']*$_SESSION['cart'][$mahh]['cost'];
   $_SESSION['cart'][$mahh]['total']=$totalnew;
  }
}
?>