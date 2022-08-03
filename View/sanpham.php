  <!-- quảng cáo -->
  <?php
    include "quangcao.php";
    ?>
  <!-- end quảng cáo -->
   <?php
   
   $hh=new HangHoa();
   $results=$hh->getListHangHoa();
   $count=$results->rowCount();//14
   //Quy định mỗi trang là bao nhiêu sản phẩm
   $limit=8;
   $p=new Page();
   $current_page=isset($_GET['page'])?$_GET['page']:1;
   $page=$p->findPage($count,$limit);
   $start=$p->findStart($limit);
   
   
   ?>

  <!-- end số lượt xem san phẩm -->
  <!-- sản phẩm-->
  <?php

    if (isset($_GET['act'])) //khuyenmai
    {
        if ($_GET['act'] == "sanpham") {
            $ac = "sanpham";
            

        } else if ($_GET['act'] == "khuyenmai") {

            $ac = "khuyenmai";

        } else if ($_GET['act'] == "timkiem") {
        $ac = "timkiem";
        }
    } else {
        $ac = "";
    }
    ?>

  <!--Section: Examples-->
  <section id="examples" class="text-center">

      <!-- Heading -->
      <div class="row">
          <div class="col-lg-8 text-right">
              <?php
                if ($ac == "sanpham") {
                    echo '<h3 class="mb-5 font-weight-bold">SẢN PHẨM</h3>';
                } else if ($ac == "khuyenmai") {
                    echo '<h3 class="mb-5 font-weight-bold">SẢN PHẨM KHUYẾN MÃI</h3>';
                }
                else if ($ac == "timkiem") {
                    echo '<h3 class="mb-5 font-weight-bold">SẢN PHẨM TIM KIEM</h3>';
                 } else {
                    echo '<h3 class="mb-5 font-weight-bold">KHÔNG CÓ SẢN PHẨM NÀO</h3>';
                }
                ?>

          </div>

      </div>
      <!--Grid row-->
      <div class="row">
          <?php
            $hh = new HangHoa();
            if ($ac == "sanpham") {
                $results=$hh->getListHanghoaPage($start,$limit); // trả về nhiều đối tượng 
            } else if ($ac == "khuyenmai") {
                $results = $hh->getListHangHoaSaleAll();
            }else if ($ac == "timkiem") {
                if(isset($_POST['txtsearch'])){
                    $tentk=$_POST['txtsearch'];
                    $results = $hh->getSearch($tentk);
                }
                
            }

            while ($set = $results->fetch()) :
            ?>
              <!--Grid column-->
              <div class="col-lg-3 col-md-4 mb-3 text-left">

                  <div class="view overlay z-depth-1-half">
                      <img src="<?php echo 'Content/imagetourdien/' . $set['hinh']; ?>" class="img-fluid" alt="">
                      <div class="mask rgba-white-slight"></div>
                  </div>
                  <?php
                    if ($ac == "sanpham") {
                        echo '<h5 class="my-4 font-weight-bold" style="color: red;">' . number_format($set['dongia']) . '<sup><u>đ</u></sup></br>';
                    } else if ($ac == "khuyenmai") {
                        echo '
                        <h5 class="my-4 font-weight-bold">
                        <font color="red">' . number_format($set['giamgia']) . '<sup><u>đ</u></sup></font>
                        <strike>' . number_format($set['dongia']) . '</strike><sup><u>đ</u></sup>
                        </h5>
                        ';
                    }
                    ?>

                  <a href="index.php?action=home&act=detail&id=<?php echo $set['mahh']; ?>">
                      <span><?php echo $set['tenhh'] . '-' . $set['mausac']; ?></span></br></a>
                  <button class="btn btn-danger" id="may4" value="lap 4">New</button>
                  <h5>Số lượt xem:<?php echo $set['soluotxem']; ?></h5>

              </div>
          <?php
            endwhile;
            ?>

      </div>

      <!--Grid row-->

  </section>


  <!-- end sản phẩm mới nhất -->


  <div class="col-md-6 div col-md-offset-3">
      <ul class="pagination">
          <?php
            // click vao trang 2 thi moi xuat hien nut lui
            if($current_page>1&& $page>1)
            {
                echo '<li><a href="index.php?action=home&act=sanpham&page='.($current_page-1).'"><?php echo $i; ?>Prev</a></li>';
            }
            for ($i = 1; $i <= $page; $i++) {
            ?>
              <li><a href="index.php?action=home&act=sanpham&page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
          <?php
            }
            if($current_page<$page&&$page>1)
            {
                echo '<li><a href="index.php?action=home&act=sanpham&page='.($current_page+1).'"><?php echo $i; ?>Next</a></li>';
            }
            ?>
      </ul>
  </div>