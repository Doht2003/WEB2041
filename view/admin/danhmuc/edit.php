<div class="nen">
<div class="edit">
    <form action="index.php?act=updatedm" method="post">
        <table class="form">
            <h1>Sửa danh mục</h1>
            <tr>
                <td>Mã danh mục</td>
                
                <input type="hidden" name="cate_id" value="<?=$cate['cate_id']?>">
            </tr>
            <tr>
            <td><input type="text"  disabled></td>
            </tr>
            <tr>
                <td>Tên danh mục</td>
                
            </tr>
            <tr>
            <td><input type="text" name="cate_name" value="<?=$cate['cate_name']?>"></td>
            </tr>
            <tr>
                <td><button type="submit" name="update">Sửa</button></td>
            </tr>
            <tr>
            <td>
            <?php if(isset($thongbao) && $thongbao != ""):?>
                 <div class="tb">
                 <?=$thongbao?>
                 </div>
            <?php endif ?>
            </td>
           </tr>

            
        </table>
    </form>
</div>
</div>