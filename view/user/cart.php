<div class="content">
    
    <div class="bang">
            <form action="">
                <table class="table_cart" border="1">
                    <tr>
                        <th>Ảnh</th>
                        <th>Tên sản phẩm</th>
                        <th>Giá</th>
                        <th>Số lượng</th>
                        <th>Thành tiền</th>
                    </tr>
                    <?php foreach($cart as $cart):?>
                        
                        <tr>
                            <td><img height="100px" src="/duanmau/view/img/<?= $cart['img'] ?>"" alt=""></td>
                            <td><?= $cart['product_name']?></td>
                            <td><?= $cart['price']?></td>
                            <td><?= $cart['quantity']?></td>
                            <td><?= $cart['quantity'] * $cart['price']?> </td>
                        </tr>

                    <?php endforeach?>
                </table>
            </form>
        </div>
        

</div>