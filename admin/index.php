 <?php
    require_once '/xampp/htdocs/duanmau/ketnoi/ketnoi.php';
    require_once '/xampp/htdocs/duanmau/view/admin/header.php';
    require_once "/xampp/htdocs/duanmau/model/danhmuc.php";
    require_once "/xampp/htdocs/duanmau/model/sanpham.php";
    if (isset($_GET['act'])) {
        $act = $_GET['act'];
        switch ($act) {
            case 'showdm':
                $cates = showdm();
                include_once "/xampp/htdocs/duanmau/view/admin/danhmuc/list_danhmuc.php";
                break;
            case 'adddm':
                if (isset($_POST['them'])) {
                    $cate_name = $_POST['cate_name'];
                    add($cate_name);
                    $thongbao = "Thêm thành công";
                }
                require_once "/xampp/htdocs/duanmau/view/admin/danhmuc/add.php";
                break;
            case 'delete':
                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                    delete($id);
                }

                $cates = showdm();
                require_once "/xampp/htdocs/duanmau/view/admin/danhmuc/list_danhmuc.php";
                break;
            case 'edit':
                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                    $cate = edit($id);
                }
                require_once "/xampp/htdocs/duanmau/view/admin/danhmuc/edit.php";
                break;
            case 'updatedm':
                if (isset($_POST['update'])) {
                    $cate_name = $_POST['cate_name'];
                    $cate_id = $_POST['cate_id'];
                    updatedm($cate_id, $cate_name);
                    $thongbao = "Sửa thành công";
                }
                $cates = showdm();
                require_once "/xampp/htdocs/duanmau/view/admin/danhmuc/list_danhmuc.php";
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
                require_once "/xampp/htdocs/duanmau/view/admin/sanpham/list_sp.php";

                break;

            case "addsp":
                $cates = showdm();
                if (isset($_POST['them'])) {
                    $product_name = $_POST['product_name'];
                    $price = $_POST['price'];
                    $description = $_POST['description'];
                    $cate_id = $_POST['cate_id'];
                    $file = $_FILES['img'];
                    $file2 = $_FILES['img2'];
                    $file3 = $_FILES['img3'];
                    $file4 = $_FILES['img4'];
                    addsp($product_name,$price,$description,$file,$file2,$file3,$file4,$cate_id);
                }
                require_once "/xampp/htdocs/duanmau/view/admin/sanpham/add.php";
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
                require_once "/xampp/htdocs/duanmau/view/admin/sanpham/list_sp.php";

                break;
            case "editsp":
                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                    $product = editsp($id);
                    $cates = showdm();
                }
                require_once "/xampp/htdocs/duanmau/view/admin/sanpham/edit.php";
               
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
                    $img2 = $_POST['oldImg2'];
                    $file2 = $_FILES['img2'];
                    $img3 = $_POST['oldImg3'];
                    $file3 = $_FILES['img3'];
                    $img4 = $_POST['oldImg4'];
                    $file4 = $_FILES['img4'];
                    updatesp($product_id,$product_name,$price,$file,$file2,$file3,$file4,$img,$img2,$img3,$img4,$description,$cate_id);
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
                require_once "/xampp/htdocs/duanmau/view/admin/sanpham/list_sp.php";

                break;
            default:
                require_once "/xampp/htdocs/duanmau/view/admin/home.php";
                break;
        }
    } else {
        require_once "/xampp/htdocs/duanmau/view/admin/home.php";
    }
    require_once "/xampp/htdocs/duanmau/view/admin/footer.php";
    ?>
 