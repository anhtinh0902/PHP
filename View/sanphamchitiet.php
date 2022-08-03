<script type="text/javascript">
    function chonsize(a) {
        document.getElementById("size").value = a;
        
    }
</script>
<section>
    <div class="row">
        <div class="col-lg-12 text-center">
            <h3 class="mb-5 font-weight-bold">CHI TIẾT SẢN PHẨM</h3>
        </div>

    </div>
    <article class="col-12">
        <!-- <div class="card"> -->
        <div class="container-fliud">
            <div class="wrapper row">
                <form action="index.php?action=giohang&act=add_cart" method="post">
                    <!-- <input type="hidden" name="action" value="giohang&add_cart"/> -->

                    <div class="preview col-md-6">
                        <div class="tab-content">
                           
                        <?php
                        if(isset($_GET['id']))
                        {
                            $mahh=$_GET['id'];
                            $hh=new HangHoa();
                            $sp=$hh->chitiethanghoa($mahh);
                            $tenhh=$sp['tenhh'];
                            $dongia=$sp['dongia'];
                            $giamgia=$sp['giamgia'];
                            $hinh=$sp['hinh'];
                            $mota=$sp['mota'];
                            $size=$sp['size'];
                            $nhom=$sp['Nhom'];

                        }
                        ?>
                            <div class="tab-pane active" id=""><img src="<?php echo 'Content/imagetourdien/'.$hinh;?>" alt="" width="200px" height="350px">
                            </div>
                           
                        </div>
                        <ul class="preview-thumbnail nav nav-tabs">
                         
                        <?php
                           $hinhanh=$hh->getListImageGroup($nhom);
                           
                             while($set=$hinhanh->fetch()){
                        ?>
                        
                        <li class='active'><img src="<?php echo 'Content/imagetourdien/'.$set['hinh'];?>" alt=""></li>
                        <?php
                            }
                        ?>
                        </ul>
                    </div>
                    
                    <div class="details col-md-6">
                        <input type="hidden" name="mahh" value="<?php echo $mahh;?>" />
                        <h3 class="product-title"><?php echo $tenhh ?> </h3>
                        <?php 
                          $_start=new Start();
                          $tb=$_start->avg(); 
                          if(isset($_SESSION['username'])){
                            $uid=$_SESSION['username'];
                        }
                        if(isset($uid)){
                            if(isset($_POST['pid'])&&isset($_POST['stars']))
                            {
                               $pid=$_POST['pid'];
                               $star=$_POST['stars'];
                               $_start->updateRating($pid,$uid,$star);
                            }
                            $rating=$_start->getRating($uid,$mahh);
                        }
                        
                        ?>
                        <p style="color: gray;">Rating:<?php 
                        if(isset($tb[$mahh])){
                            echo $tb[$mahh];
                        }
                        ?></p>
                        <div class="rating" >
                            <!-- rating -->
                            <div class="pstars" data-pid="<?=$mahh?>"> 
                            Your rating:
                            <?php 
                              if(isset($_SESSION['makh'])&&isset($_SESSION['tenkh'])):
                            ?>
                            <?php
                               for($i=1;$i<=5;$i++)
                               {
                                   $img=$i<=$rating?"star":"star-blank";
                                   echo "<img src='Content/imagetourdien/$img.png' style='width:30px;
                                   cursor:pointer;' data-set='$i'>";
                               }
                            ?>
                            <?php else: ?>
                              <button class="btn btn-"><a href="index.php?action=login">Dang nhap</a></button>
                            <?php endif; ?>
                            </div>
                        </div>
                        <p class="product-description">
                         <?php  echo $mota; ?>
                        </p>
                        <h4 class="price">Giá bán:<?php  echo number_format($dongia) ?> đ</h4>
                        
                        <h5 class="colors">Màu:
                            <select name="mymausac" class="form-control" style="width:150px;">
                           <?php 
                           $mau=$hh->getColor($nhom);
                           while($set=$mau->fetch()){
                           ?>
                         
                           <option value="<?php echo $set['mausac']; ?>"><?php echo $set['mausac']; ?></option>
                           <?php
                           }
                            ?>
                            </select><br>
                           <?php
                           
                           ?>
                            <input type="hidden" name="size" id="size" value="0" />
                            Kích Thước:
                           <?php
                           $kt=$hh->getsize($nhom);
                           while($set=$kt->fetch()){
                           ?>
                           <button type="button" onclick="chonsize(<?php echo $set['size']?>)" class="btn btn-default-hong btn-circle"><?php echo $set['size']?></button>
                           <?php
                           }
                           ?>
                            </br></br>
                            Số Lượng:

                            <input type="number" id="soluong" name="soluong" min="1" max="100" value="1" size="10" />


                        </h5>
                        
                        <div class="action">

                            <button class="add-to-cart btn btn-default" type="submit" data-toggle="modal" data-target="#myModal">MUA NGAY
                            </button>

                            <a href="http://hocwebgiare.com/" target="_blank"> <button class="like btn btn-default" type="button"><span class="fa fa-heart"></span></button> </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- </div> -->
    </article>
    <!-- tao form hiden-->
    <div class="hidden_form">
       <form action="" id="ninForm_2" name="ninForm_2" method="post" target="_self">
           <input type="hidden" name="pid" id="ninpid">
           <input type="hidden" name="stars" id="ninStar">
       </form>
    </div>
</section>
<?php
    if(isset($_SESSION['makh'])):
?>
    <section>
        <div class="col-12">
            <div class="row">
                <?php
                    if(isset($_GET['id']))
                    {
                        $id=$_GET['id'];
                        $dt=new User;
                        $result=$dt->dembinhluan($id);

                    }
                ?>
                <p class="float-left"><b>Bình luận <?php echo $result; ?></b></p>
                <hr>
            </div>
            <form action="index.php?action=home&act=binhluan&id=<?php echo $id;?>" method="post">
            <div class="row">
              
                    <input type="hidden" name="txtmahh" value="<?php echo $id;?>" />
                    <img src="Content/imagetourdien/people.png" width="50px" height="50px"; />
                    <textarea class="input-field" type="text" name="comment" rows="2" cols="70" id="comment" placeholder="Thêm bình luận">  </textarea>
                    <input type="submit" class="btn btn-primary" id="submitButton" style="float:right;" value="Bình Luận" />
                                
            </div>
            
            </form>
            <div class="row">
                <p class="float-left"><b>Các bình luận</b></p>
                <hr>
            </div>
            <div class="row">
                <?php
                $result=$dt->hienthibinhluan($id);
                while($set=$result->fetch()):
                ?>
                
              <b><?php echo $set['tenkh'] ?></b><br>
              <?php echo $set['noidung'];?>
                <br>
                
              
                <?php
                endwhile;
                ?>
               <br>
            </div>

        </div>
       </div>
    </div>
    </section>
<?php
   endif;
?>
<script>
    var stars={
        init:function(){
           for(let docket of document.getElementsByClassName('pstars'))
           {
               for(let star of docket.getElementsByTagName('img'))
               {
                   star.addEventListener("click",stars.click)
               }
           }
        },
        click:function(){
            let all=this.parentElement.getElementsByTagName("img"),
            set=this.dataset.set,
            i=1;
            for(let star of all){
                star.src=i<=set?"star.png":"star-blank.png";
                i++;
            }

            document.getElementById("ninpid").value=this.parentElement.dataset.pid;
            document.getElementById("ninStar").value=this.dataset.set;
            document.getElementById("ninForm_2").submit();
        }
    }
    window.addEventListener("DOMContentLoaded",stars.init);
</script>