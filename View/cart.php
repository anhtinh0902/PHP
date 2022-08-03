
<div class="table-responsive">
<?php
  if(!isset($_SESSION['cart'])||count($_SESSION['cart'])==0):
    echo '<script> alert("Giỏ hàng của bạn chưa có món hàng nào");</script>';
    echo '<meta http-equiv="refresh" content="0;url=index.php?action=home"/>';
    
?>
  <?php
  else:
  ?>
    <form action="index.php?action=giohang&act=update_cart" method="post">
      <table class="table table-bordered">
        <thead>
          <tr><td colspan="5"><h2 style="color: red;">THÔNG TIN GIỎ HÀNG</h2></td></tr>
          <tr class="table-success">
            <th>Số TT</th>
            <th>Thông Tin Sản Phẩm</th>
            <th>Tùy Chọn Của Bạn</th>
            <th colspan="2">Giá</th>
          </tr>
        </thead>
        <tbody>
        <?php
          $i=0;
          foreach($_SESSION['cart'] as $key=>$item):
            $i++;
            // $_SESSION['cart][12,10]
        ?>
            <tr>
              <td><?php echo $i; ?></td>
              <td><img width="50px" height="50px" src="Content/imagetourdien/<?php echo $item['hinh'];?>">
              <?php echo $item['name'];?>
            </td>
              <td>Màu: <?php echo $item['mau'];?> Size: <?php echo $item['size'];?> </td>
              <td>Đơn Giá: <?php echo number_format($item['cost']);?>- Số Lượng: <input type="number" name="newqty[<?php echo $item['mahh']?>]" value="<?php echo $item['qty'];?>" /><br />
                <p style="float: right;"> Thành Tiền <?php echo number_format($item['total']);?><sup><u>đ</u></sup></p>
              </td>
              <td><a href="index.php?action=giohang&act=delete_item&id=<?php echo $item['mahh'];?>"><button type="button" class="btn btn-danger">Xóa</button></a>
              
                  <a href=""><button type="submit" class="btn btn-secondary">Sửa</button></a>

              </td>
            </tr>
          <?php
            endforeach;
          ?>
          <tr>
            <td colspan="3">
              <b>Tổng Tiền</b>
            </td>
            <td style="float: right;">
              <b><?php echo get_tongtien(); ?> <sup><u>đ</u></sup></b>
            </td>
            <td><a href="index.php?action=order&act=order_detail">Thanh toán</a></td>
          </tr>
        </tbody>
      </table>
    </form>
    <?php
     endif;
    ?>
</div>
</div>