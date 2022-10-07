<div class="nen">
    <div class="edit">
        <form action="index.php?act=updatesp" method="post" enctype="multipart/form-data">
            <table class="form">
            <h1>Sửa sản phẩm</h1>
                <tr>
                    <td>Product_id</td>

                    <input type="hidden" name="product_id" value="<?= $product['product_id'] ?>">
                </tr>
                <tr>
                    <td><input type="text" disabled></td>
                </tr>
                <tr>
                    <td>Product_name</td>

                </tr>
                <tr>
                    <td><input type="text" name="product_name" value="<?= $product['product_name'] ?>"></td>
                </tr>
                <tr>
                    <td>Price</td>

                </tr>
                <tr>
                    <td><input type="number" name="price" value="<?= $product['price'] ?>"></td>
                </tr>

                <tr>
                    <td>Img</td>
                </tr>
                <tr>
                    <td><img src="/duanmau/view/img/<?= $product['img'] ?>" height="100px" alt=""></td>
                </tr>
                <input type="hidden" name="oldImg" value="<?=$product['img']?>">
                <tr>
                    <td><input type="file" name="img"></td>
                </tr>

                <tr>
                    <td>Img_2</td>
                </tr>
                <tr>
                    <td><img src="/duanmau/view/img/<?= $product['img_2'] ?>" height="100px" alt=""></td>
                </tr>
                <input type="hidden" name="oldImg2" value="<?=$product['img_2']?>">
                <tr>
                    <td><input type="file" name="img2"></td>
                </tr>

                <tr>
                    <td>Img_3</td>
                </tr>
                <tr>
                    <td><img src="/duanmau/view/img/<?= $product['img_3'] ?>" height="100px" alt=""></td>
                </tr>
                <input type="hidden" name="oldImg3" value="<?=$product['img_3']?>">
                <tr>
                    <td><input type="file" name="img3"></td>
                </tr>

                <tr>
                    <td>Img_4</td>
                </tr>
                <tr>
                    <td><img src="/duanmau/view/img/<?= $product['img_4'] ?>" height="100px" alt=""></td>
                </tr>
                <input type="hidden" name="oldImg4" value="<?=$product['img_4']?>">
                <tr>
                    <td><input type="file" name="img4"></td>
                </tr>
                <tr>
                    <td>description</td>

                </tr>
                <tr>
                    <td><textarea name="description" id="" cols="52" rows="10"><?=$product['description']?></textarea></td>
                </tr>
                <tr>
                    <td>cate_id</td>

                </tr>
                <tr>
                    
                    <td><select class="trong" name="cate_id">
                            <?php foreach ($cates as $cate) : ?>
                        
                                <option value="<?= $cate['cate_id'] ?>" <?=$product['cate_id']?> <?= ($cate['cate_id'] == $product['cate_id'])?"selected":""?>  ><?= $cate['cate_name'] ?></option>
                            <?php endforeach ?>
                        </select></td>
                </tr>
                             
                <tr>
                    <td><button type="submit" name="update">Sửa</button></td>
                </tr>
                <tr>
                    <td>
                        <?php if (isset($thongbao) && $thongbao != "") : ?>
                            <div class="tb">
                                <?= $thongbao ?>
                            </div>
                        <?php endif ?>
                    </td>
                </tr>


            </table>
        </form>
    </div>
</div>