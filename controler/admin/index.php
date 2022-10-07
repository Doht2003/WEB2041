 <?php
    include '/xampp/htdocs/duanmau/ketnoi/ketnoi.php';
    include '/xampp/htdocs/duanmau/view/admin/header.php';
    include "/xampp/htdocs/duanmau/model/danhmuc.php";
    include "/xampp/htdocs/duanmau/model/sanpham.php";
    if (isset($_GET['act'])) {
        $act = $_GET['act'];
        switch ($act) {
            case 'showdm':
                $cates = showdm();
                include "/xampp/htdocs/duanmau/view/admin/danhmuc/list_danhmuc.php";

                break;
            case 'adddm':
                if (isset($_POST['them'])) {
                    $cate_name = $_POST['cate_name'];
                    add($cate_name);
                    $thongbao = "Thêm thành công";
                }
                include "/xampp/htdocs/duanmau/view/admin/danhmuc/add.php";
                break;
            case 'delete':
                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                    delete($id);
                }

                $cates = showdm();
                include "/xampp/htdocs/duanmau/view/admin/danhmuc/list_danhmuc.php";
                break;
            case 'edit':
                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                    $cate = edit($id);
                }
                include "/xampp/htdocs/duanmau/view/admin/danhmuc/edit.php";
                break;
            case 'updatedm':
                if (isset($_POST['update'])) {
                    $cate_name = $_POST['cate_name'];
                    $cate_id = $_POST['cate_id'];
                    updatedm($cate_id, $cate_name);
                    $thongbao = "Sửa thành công";
                }
                $cates = showdm();
                include "/xampp/htdocs/duanmau/view/admin/danhmuc/list_danhmuc.php";
                break;

            case "showsp":
                if (isset($_POST['tim'])) {
                    $kyw = $_POST['kyw'];
                    $cate_id = $_POST['cate_id'];
                } else {
                    $kyw = "";
                    $cate_id = 0;
                }
                $cates = showdm();
                $products = showsp($kyw, $cate_id);
                include "/xampp/htdocs/duanmau/view/admin/sanpham/list_sp.php";

                break;

            case "addsp":
                $cates = showdm();
                if (isset($_POST['them'])) {
                    $product_name = $_POST['product_name'];
                    $price = $_POST['price'];
                    $description = $_POST['description'];
                    $cate_id = $_POST['cate_id'];
                    $file = $_FILES['img'];
                    addsp($product_name,$price,$description,$file,$cate_id);
                }
                include "sanpham/add.php";
                break;

            case "delete_sp":
                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                   
                }
                deletesp($id);
                if (isset($_POST['tim'])) {
                    $kyw = $_POST['kyw'];
                    $cate_id = $_POST['cate_id'];
                } else {
                    $kyw = "";
                    $cate_id = 0;
                }
                $cates = showdm();
                $products = showsp($kyw, $cate_id);
                include "/xampp/htdocs/duanmau/view/admin/sanpham/list_sp.php";

                break;
            case "editsp":
                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                    $product = editsp($id);
                    $cates = showdm();
                }
                include "/xampp/htdocs/duanmau/view/admin/sanpham/edit.php";
               
                break;
            case "updatesp":
                if (isset($_POST['update'])) {
                    $product_id = $_POST['product_id'];
                    $product_name = $_POST['product_name'];
                    $price = $_POST['price'];
                    $description = $_POST['description'];
                    $cate_id = $_POST['cate_id'];
                    $img = $_POST['oldImg'];
                    $file = $_FILES['img'];
                    
                    updatesp($product_id,$product_name , $price,$file,$img,$description,$cate_id);
                }
                if (isset($_POST['tim'])) {
                    $kyw = $_POST['kyw'];
                    $cate_id = $_POST['cate_id'];
                } else {
                    $kyw = "";
                    $cate_id = 0;
                }
                $cates = showdm();
                $products = showsp($kyw, $cate_id);
                include "/xampp/htdocs/duanmau/view/admin/sanpham/list_sp.php";

                break;
            default:
                require_once "/xampp/htdocs/duanmau/view/admin/home.php";
                break;
        }
    } else {
        require_once "/xampp/htdocs/duanmau/view/admin/home.php";
    }
    include "/xampp/htdocs/duanmau/view/admin/footer.php";
    ?>
 