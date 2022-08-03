<div class="table-responsive">
  <!-- Kiem tra dang ky chua-->
<?php
if(!isset($_SESSION['makh'])||count($_SESSION['cart'])==0)
{
  echo '<script>alert("Ban chua dang nhap")</script>';
   echo '<meta http-equiv="refresh" content="0;url=index.php?action=login"/>';
}
else{

?> 
    <form action="" method="post">
      <table class="table table-bordered" border="0">
      <?php
        $hd=new HoaDon();
        if(isset($_SESSION['sohd']))
        {
          $result=$hd->getOrder($_SESSION['sohd']);
        }
      ?>
                        
       <tr>
          <td colspan="4">
            <h2 style="color: red;">HÓA ĐƠN</h2>
          </td>
        </tr>
      <tr>
          <td colspan="2">Số Hóa đơn: <?php echo $result[0];?></td>
          <td colspan="2"> Ngày lập: <?php echo $result[4];?></td>
        </tr>
       <tr>
          <td colspan="2">Họ và tên: <?php echo $result[1];?></td>
          <td colspan="2"></td>
        </tr>
       <tr>
          <td colspan="2">Địa chỉ: <?php echo $result[2];?> </td>
          <td colspan="2"></td>
        </tr>
        <tr>
          <td colspan="2">Số điện thoại: <?php echo $result[3];?></td>
          <td colspan="2"></td>
        </tr>
        <br>
      </table>
      <!-- Thông tin sản phầm -->
      <table class="table table-bordered">
        <thead>

          <tr class="table-success">
            <th>Tên Sản Phẩm</th>
            <th>Thông Tin Sản Phẩm</th>
            <th>Tùy Chọn Của Bạn</th>
            <th>Giá</th>
          </tr>
        </thead>
        <tbody>
             <?php 
               $resultct=$hd->getOrderDetail($_SESSION['sohd']);
               // do trả về nhiều hàng hóa, nên dùng while
               while($set=$resultct->fetch()):
             ?>

            <tr>
              <td><?php echo $set['tenhh']?></td>
              <td><img src="<?php echo 'Content/imagetourdien/'.$set['hinh'];?>" class="img-fluid" width="100px" height="100px"><?php echo $set['mota']?>
            </td>
              <td>Màu: <?php echo $set['mausac']?>  Size: <?php echo $set['size']?> </td>
              <td>Đơn Giá:<?php echo $set['dongia']?>  - Số Lượng:<?php echo $set['soluongmua']?> <br />
              </td>
            </tr>
            <?php
             endwhile;
            ?>
          <tr>
            <td colspan="3">
              <b>Tổng Tiền</b>
            </td>
            <td style="float: right;">
              <b><?php echo get_tongtien(); ?> <sup><u>đ</u></sup></b>
            </td>
           
          </tr>
        </tbody>
      </table>
    </form>
  <?php 
  }
  ?>
</div>
</div>