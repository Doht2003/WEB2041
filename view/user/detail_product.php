<div class="content">
    <script>
        var i = 0;
        var mang = [];
        mang[0] = "/duanmau/view/img/<?= $product['img'] ?>"
        mang[1] = "/duanmau/view/img/<?= $product['img_2'] ?>"
        mang[2] = "/duanmau/view/img/<?= $product['img_3'] ?>"
        mang[3] = "/duanmau/view/img/<?= $product['img_4'] ?>"

        var hop = document.getElementsByClassName("anhphu");

        function show() {
            for (var j = 0; j < hop.length; j++) {
                hop[j].style.border = "1px solid #cccccc";
            }
            i++;
            if (i > mang.length - 1) {
                i = 0;
            }

            hop[i].style.border = "1px solid red";
            document.getElementById("anh2").src = mang[i];
            time = setTimeout(show, 2000)

        }
        <?php if (isset($product['img_4']) && isset($product['img_3']) && isset($product['img_2'])) : ?>
            window.onload = function() {

                time = setTimeout(show, 2000)
            }
        <?php endif ?>


        function chon(h) {
            for (var j = 0; j < hop.length; j++) {
                hop[j].style.border = "1px solid #cccccc";
            }
            hop[h].style.border = "3px solid red";
            document.getElementById("anh2").src = mang[h]
        }

     

        function tru() {
            document.getElementById("soluon").value--;
            if (document.getElementById("soluon").value <= 0) {
                alert("Số lượng phải lớn hơn 0");
                document.getElementById("soluon").value = 1;
            }
            
        }
        function plus() {
            document.getElementById("soluon").value++;
            if (document.getElementById("soluon").value <= 0) {
                alert("Số lượng phải lớn hơn 0");
                document.getElementById("soluon").value = 1;
            }
            
        }

        function hien() {
            const btnForm = document.querySelectorAll('.sangdi')
            btnForm.forEach((item, index) => {
                item.onclick = function(e) {
                    console.log(item.classList)
                    //document.querySelector(".formtraloi.formactive").classList.remove("formactive")
                    let a = document.querySelectorAll(".formtraloi")
                    a.forEach(data => {
                        if (data.classList.contains('formactive')) {
                            return data.classList.remove("formactive")
                        } else {
                            return 0
                        }
                    })
                    a[index].classList.add('formactive')
                }


            })
        }
    </script>
    <h1>Chi tiết sản phẩm</h1>
    <div class="ctsp">
        <div class="anhcon">

            <img class="anhphu" onclick="chon(0)" src="/duanmau/view/img/<?= $product['img'] ?>" alt="">

            <img class="anhphu" onclick="chon(1)" src="/duanmau/view/img/<?= $product['img_2'] ?>" alt="">

            <img class="anhphu" onclick="chon(2)" src="/duanmau/view/img/<?= $product['img_3'] ?>" alt="">

            <img class="anhphu" onclick="chon(3)" src="/duanmau/view/img/<?= $product['img_4'] ?>" alt="">



        </div>
        <div class="anhlon">
            <?php if (isset($product['img_4']) && isset($product['img_3']) && isset($product['img_2'])) : ?>
                <img id="anh2" onclick="show()" src="/duanmau/view/img/<?= $product['img'] ?>" alt="">
            <?php endif ?>
            <?php if (!isset($product['img_4']) && !isset($product['img_3']) && !isset($product['img_2'])) : ?>
                <img id="anh2" src="/duanmau/view/img/<?= $product['img'] ?>" alt="">
            <?php endif ?>
        </div>
        <div class="tt">

            <div class="tt_tensp">
                <h3><?= $product['product_name'] ?></h3>
            </div>
            <div class="tt_gia"><?= format_currency($product['price'])  ?><u>đ</u></div>
            <div class="tt_icon">
                <i class="fa-solid fa-heart"></i> 200 người thích sản phẩm này
            </div>
            <div class="mota"> <?= $product['description'] ?></div>

            <form action="index.php?act=add_cart" method="post">
                <div class="chucnang">
                    <div class="soluong">
                        <button id="cong" type="button" onclick="tru()">-</button>
                        <input id="soluon"  name="soluong" type="number" value="1" min="1">
                        <button id="cong" type="button" onclick="plus()">+</button>

                    </div>
                    <input type="hidden" name="product_id" value="<?= $product['product_id'] ?>">
                        <div class="giohang">
                        <button type="submit" name="add_cart" >ADD TO CART</button>
                        </div>           
                </div>
            </form>
           
            <div class="dm">
                <h4>Danh mục: </h4>
            </div>

        </div>
        <aside class="topsp">
            <div class="tieude">
                <h3>Top 10 yêu thích </h3>
            </div>
            <ul>
                <li><a href="#">produtcs</a></li>
                <li><a href="#">produtcs</a></li>
                <li><a href="#">produtcs</a></li>
                <li><a href="#">produtcs</a></li>
                <li><a href="#">produtcs</a></li>
                <li><a href="#">produtcs</a></li>
                <li><a href="#">produtcs</a></li>
            </ul>

        </aside>

    </div>
    <div class="binhluan">
        <hr>
        <h2>Bình luận</h2>
        <form action="index.php?act=guibinhluan&id=<?= $product['product_id'] ?>" method="post">
            <textarea name="noidungbl" id="" cols="30" rows="10"></textarea>
            <div class="guibl">
                <button type="submit" name="gui">Gửi bình luận</button>
            </div>
        </form>
        <?php foreach ($binhluan as $binhluan) : ?>
            <div class="doituongbl">
                <img src="/duanmau/view/img/<?= $binhluan['img'] ?>" alt="">
                <div class="doituongbl2">
                    <div class="ten">
                        <?= $binhluan['username'] ?>
                        <div class="ngay">
                            <?= $binhluan['ngaybl'] ?>
                        </div>
                    </div>
                    <div class="noidungbl">
                        <?= $binhluan['noidung'] ?>
                        <?php if (isset($_SESSION['user'])) : ?>
                            <?php if ($binhluan['user_id'] == $user_id) : ?>
                                <div class="xoa">
                                    <a href="index.php?act=delete_binhluan&id_binhluan=<?= $binhluan['binhluan_id'] ?>&id=<?= $product['product_id'] ?>"">Xóa</a>
                                </div>
                            <?php endif ?>
                         <?php endif ?>
                        <?php if(isset($_SESSION['user'])):?>
                            <?php if ($binhluan['user_id'] != $user_id) : ?>
                            <div class=" sangdi">
                                        <button class="traloi" type="button" onclick="hien()">Trả lời</button>
                                </div>
                            <?php endif ?>
                        <?php endif?>

                    </div>
                    <form class="formtraloi" action="index.php?act=guifeedback&id=<?= $product['product_id'] ?>&id_binhluan=<?= $binhluan['binhluan_id'] ?>" method="post">
                        <textarea id="traloi" name="feedback" cols="30" rows="10"></textarea>
                        <button type="submit" name="guifeedback" id="nhan">Gửi</button>
                    </form>
                    <?php foreach ($feedbacks as $feedback) : ?>
                        <?php if ($feedback['binhluan_id'] == $binhluan['binhluan_id']) : ?>
                            <div class=" feedback">
                                <img src="/duanmau/view/img/<?= $feedback['img'] ?>" alt="">
                                <div class="doituongbl2">
                                    <div class="ten">
                                        <?= $feedback['username'] ?>
                                        <div class="ngay">
                                            <?= $feedback['ngay_traloi'] ?>
                                        </div>
                                    </div>
                                    <div class="noidungbl">
                                        <?= $feedback['noidung'] ?>
                                        <?php if (isset($_SESSION['user'])) : ?>
                                            <?php if ($feedback['user_id'] == $user_id) : ?>
                                                <div class="xoa">
                                                    <a href="index.php?act=delete_feedback&feedback_id=<?= $feedback['feedback_id'] ?>&id=<?= $product['product_id'] ?>">Xóa</a>
                                                </div>
                                            <?php endif ?>
                                        <?php endif ?>
                                    </div>
                                    <form class="formtraloi" action="index.php?act=guifeedback&id=<?= $product['product_id'] ?>&id_binhluan=<?= $binhluan['binhluan_id'] ?>" method="post">
                                        <textarea id="traloi" name="feedback" cols="30" rows="10"></textarea>
                                        <button type="submit" name="guifeedback" id="nhan">Gửi</button>
                                    </form>
                                </div>
                            </div>
                        <?php endif ?>
                    <?php endforeach ?>

                </div>
            </div>
        <?php endforeach ?>
    </div>
    <div class=" spkhac">      
    <hr>
    <h2>Sản phẩm liên quan</h2>     
    <section>
                <?php foreach($products_lienquan as $product) :?>
                    <div class="sp">
                    <div class="anhsp">
                        <a href="index.php?act=chitiet_sanpham&id=<?= $product['product_id'] ?>&iddm=<?= $product['cate_id'] ?>"><img src="/duanmau/view/img/<?= $product['img'] ?>" alt=""></a>
                        <div class="nut">
                            <button><a href="index.php?act=chitiet_sanpham&id=<?= $product['product_id'] ?>&iddm=<?= $product['cate_id'] ?>">CHI TIẾT</a></button>
                            <button><a href=""><i class="fa-solid fa-cart-plus"></i></a></button>
                            <button><a href=""><i class="fa-solid fa-heart"></i></a></button>
                        </div>
                    </div>
                    <div class="tensp"><a href="index.php?act=chitiet_sanpham&id=<?= $product['product_id'] ?>"><h5><?=$product['product_name']?></h5></a></div>
                    <div class="gia"><?= format_currency($product['price'])  ?><u>đ</u></div>
                   
                </div>
                   <?php endforeach?> 
            </section>                                       
    </div>


</div>