<?php 
if(isset($_GET['act'])){
  if($_GET['act']=='insert'){
    $ac=1;
  }
  elseif($_GET['act']=='update'){
    $ac=2;
  }
  else $ac=0;
}
?>
<?php if($ac==1){
  echo "<div class='row col-md-4 col-md-offset-4' >Them san pham</div> ";
}elseif($ac==2){
    echo "<div class='row col-md-4 col-md-offset-4' >Sua san pham</div> ";
}else echo "<div class='row col-md-4 col-md-offset-4' >Khong co san pham</div> ";
?>
<?php
  if (isset($_GET['id'])){
    $mahh=$_GET['id'];
    $hh=new hanghoa();
    $result=$hh->getHangHoaID($_GET['id']);
    $tenhh=$result['tenhh'];
    $dongia=$result['dongia'];
    $giamgia=$result['giamgia'];
    $hinh=$result['hinh'];
    $Nhom=$result['Nhom'];
    $maloai=$result['maloai'];
    $dacbiet=$result['dacbiet'];
    $soluotxem=$result['soluotxem'];
    $ngaylap=$result['ngaylap'];
    $mota=$result['mota'];
    $soluongton=$result['soluongton'];
    $mausac=$result['mausac'];
    $size=$result['size'];
  }
?>

<?php 
  if($ac==1){
    echo '<form action="index.php?action=sanpham&act=insert_action" method="post" enctype="multipart/form-data">';
  }
  elseif($ac==2) echo '<form action="index.php?action=sanpham&act=update_action" method="post" enctype="multipart/form-data">'
?>
    <table class="table" style="border: 0px;">

      <tr>
        <td>Mã hàng</td>
        <td> <input type="text" class="form-control" name="mahh" value="<?php if(isset($mahh)) echo $mahh;?>" readonly/></td>
      </tr>
      <tr>
        <td>Tên hàng</td>
        <td><input type="text" class="form-control" name="tenhh" value="<?php if(isset($mahh)) echo $tenhh;?>" maxlength="100px"></td>
      </tr>
      <tr>
        <td>Đơn giá</td>
        <td><input type="text" class="form-control" value="<?php if(isset($mahh)) echo $dongia;?>" name="dongia" ></td>
      </tr>
      <tr>
        <td>Giảm giá</td>
        <td><input type="text" class="form-control" value="<?php if(isset($mahh)) echo $giamgia;?>" name="giamgia" ></td>
      </tr>
      <tr>
        <td>Hình</td>
        <td>
         
            <label><img width="50px" height="50px" src=""></label>
            Chọn file để upload:
            <input type="file" name="image" id="fileupload">
         
        </td>
      </tr>
      <tr>
        <td>Nhóm</td>

        <td>
          <input type="text" value="<?php if(isset($mahh)) echo $Nhom;?>" class="form-control" name="nhom" >
        </td>
      </tr>
      <tr>
        <td>Mã loại</td>
        <td>
          <select name="maloai" class="form-control" style="width:150px;">
            <?php 
            $selectLoai=-1;
            if(isset($maloai)&& $maloai!=-1){
              $selectLoai=$maloai;

            }
            $hh=new hanghoa();
            $result=$hh->getListmaloai();
            while($set=$result->fetch()):
            ?>
            <option value="<?php echo $set['maloai'] ?>"<?php if($selectLoai==$set['maloai']) echo 'selected="selected"';?>><?php echo $set['tenloai'] ?></option>
            <?php endwhile?>
          </select>
        </td>
      </tr>
      <tr>
        <td>Đặc biệt</td>
        <td><input type="text" class="form-control" value="<?php if(isset($mahh)) echo $dacbiet;?>" name="dacbiet" >
        </td>
      </tr>
      <tr>
        <td>Số lượt xem</td>
        <td><input type="text" class="form-control" value="<?php if(isset($mahh)) echo $soluotxem;?>" name="slx" >
        </td>
      </tr>
      <tr>
        <td>Ngày lập</td>
        <td><input type="text" class="form-control" value="<?php if(isset($mahh)) echo $ngaylap;?>" name="ngaylap">
        </td>
      </tr>
      <tr>
        <td>Mô tả</td>
        <td><input type="text" class="form-control" value="<?php if(isset($mahh)) echo $mota;?>" name="mota">
        </td>
      </tr>
      <tr>
        <td>Số lượng tồn</td>
        <td><input type="text" class="form-control"  value="<?php if(isset($mahh)) echo $soluongton;?>" name="slt" >
        </td>
      </tr>
      <tr>
        <td>Màu sắc</td>
        <td><input type="text" class="form-control" value="<?php if(isset($mahh)) echo $mausac;?>" name="mausac" >
        </td>
      </tr>
      <tr>
        <td>Size</td>
        <td><input type="text" class="form-control"  value="<?php if(isset($mahh)) echo $size;?>" name="size" >
        </td>
      </tr>

      <tr>
        <td colspan="2">
          <input type="submit" value="submit" name="submit">
          

        </td>
      </tr>

    </table>
  </form>
</div>