<div class="content">
           <div class="dau">
            <div class="search">
                <div class="tieude">
                    Chào mừng tới <br> X-shop!
                </div>
                <form action="">
                    <input type="text" placeholder="Nhập sản phẩm bạn đang tìm kiếm">
                    <button type="submit">Tìm kiếm</button>
                </form>
                <p>
                    X-shop có rất nhiều mặt hàng, hãy tìm những thứ bạn muốn và đánh giá khách quan cho chúng tôi.
                </p>
            </div>
            <img class="anh" src="/duanmau/view/img/banner.jpg" alt="">
           </div>
           <div class="cuoi">
           <div class="menucon">
            <aside>
                <div class="tieude">
                    <h3>Danh mục</h3>
                </div>
                <ul>
                    <?php foreach($categories as $cate) :?>

                    <li><a href="index.php?act=sanpham&iddm=<?= $cate['cate_id']?>"><?= $cate['cate_name']?></a></li>
                    
                    <?php endforeach ?>
                </ul>
                
            </aside>
            <aside class="topsp">
                <div class="tieude">
                    <h3>Top 10 yêu thích </h3>
                </div>
                <ul class="yeuthich">
                    <?php foreach( $top10sp as $top10sp) :?>
                        <li><a href="index.php?act=chitiet_sanpham&id=<?= $top10sp['product_id'] ?>"><img src="/duanmau/view/img/<?=$top10sp['img']?>" alt=""> <div class="tensp_yeuthich"><?= $top10sp['product_name']?></div></a></li>
                    <?php endforeach?>          
                </ul>
                
            </aside>
           </div>
            
            <section>
                <?php foreach($products as $product) :?>
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
            
            <div class="banner">
                <div class="tieude">
                    <h2>Chúng tôi bán hàng chính </h2>
                    <p>From multipurpose themes to niche templates,you’ll always find something that catches your eye.</p>
                    <button type="button">Contact us</button>
                </div>
                <div class="minhhoa">
                    <img src="/duanmau/view/img/banner.jpg" alt="">
                </div>
            </div>
           </div>
           
        </div>