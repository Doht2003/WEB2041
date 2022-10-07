<div class="nen">
<div class="add">
    <form action="index.php?act=adddm" method="post">
        <h1>Thêm danh mục</h1>    
    <table class="form" >
            <tr>
                <td>Mã danh mục</td>
            </tr>
            <tr>
            <td><input type="text" disabled></td>
            </tr>
            <tr>
                <td>Tên danh mục</td>
            </tr>
            <tr>
            <td><input type="text" name="cate_name"></td>
            </tr>
            <tr>
                <td><button type="submit" name="them">Thêm</button></td>
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