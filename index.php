<?php
session_start();
include '/xampp/htdocs/duanmau/ketnoi/ketnoi.php';
include '/xampp/htdocs/duanmau/view/user/header.php';
include "/xampp/htdocs/duanmau/model/sanpham.php";
include "/xampp/htdocs/duanmau/model/danhmuc.php";
include "/xampp/htdocs/duanmau/model/taikhoan.php";
include '/xampp/htdocs/duanmau/model/binhluan.php';
include '/xampp/htdocs/duanmau/model/cart.php';
$products = showsp_trangchu();
      $categories =  showdm();
      $top10sp = show_top10_sp();

if (isset($_GET['act'])) {
  $act = $_GET['act'];
  switch ($act) {
    case 'guibinhluan':
      if (isset($_POST['gui'])) {
        if (isset($_SESSION['user'])) {
          if (isset($_GET['id'])) {
            extract($_SESSION['user']);
            $id = $_GET['id'];
            $noidung = $_POST['noidungbl'];
            gui_binhluan($user_id, $id, $noidung);

            $feedbacks = show_feedback($id);
            $product = chitiet_sp($id);
            $binhluan = show_binhluan($id);
            include_once '/xampp/htdocs/duanmau/view/user/detail_product.php';
          }
        }
      }
      break;
    case 'sanpham':
      if (isset($_GET['iddm'])) {
        $iddm = $_GET['iddm'];
        $products = showsp("", $iddm);
      }
      include '/xampp/htdocs/duanmau/view/user/home.php';
      break;
    case 'trangchu':
      
      include '/xampp/htdocs/duanmau/view/user/home.php';
      break;
    case 'chitiet_sanpham':
      if (isset($_GET['id'])) {
       if(isset($_GET['iddm'])){
        $id = $_GET['id'];
        $iddm= $_GET['iddm'];
        $binhluan = show_binhluan($id);
        $product = chitiet_sp($id);
        $feedbacks = show_feedback($id);
        $products_lienquan=sanpham_lienquan($id,$iddm);
        view($id);
       }
      }
      include_once '/xampp/htdocs/duanmau/view/user/detail_product.php';
      break;
    case 'vao_trang_dangnhap':
      include_once '/xampp/htdocs/duanmau/view/user/login.php';
      $_SESSION['thongbao'] = "";
      break;
    case 'vao_trang_dangky':
      include_once '/xampp/htdocs/duanmau/view/user/sign_up.php';
      $_SESSION['thongbao'] = "";
      break;
    case 'dangnhap':
      if (isset($_POST['dangnhap'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $checkuser = checkuser($username, $password);
        if (is_array($checkuser)) {
          $_SESSION['user'] = $checkuser;
          header('location: index.php');
        } else {
          $_SESSION['thongbao'] = "Tài khoản hoặc mật khẩu không đúng";
          header('location: index.php?act=vao_trang_dangnhap');
        }
      }
      break;
    case 'dangkytk':
      if (isset($_POST['dangky'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $repassword = $_POST['repassword'];
        $hovaten = $_POST['hovaten'];
        $email = $_POST['email'];
        $sdt = $_POST['sdt'];
        $address = $_POST['address'];
        $file = $_FILES['img'];
        dangky($username, $password, $repassword, $hovaten, $email, $address, $sdt, $file);
      }

      include_once '/xampp/htdocs/duanmau/view/user/sign_up.php';
      break;
    case 'dangxuat':
      session_unset();
      header('location: index.php');
      break;
    case 'vao_trang_quenmk':
      include_once '/xampp/htdocs/duanmau/view/user/forget_password.php';
      break;
    case 'quen_mat_khau':
      if (isset($_POST['gui'])) {
        $email = $_POST['email'];
        quenmatkhau($email);
      }
      include '/xampp/htdocs/duanmau/view/user/forget_password.php';
      break;
    case 'delete_binhluan':
      if (isset($_GET['id'])) {
        $id = $_GET['id'];
        if (isset($_GET['id_binhluan'])) {
          $id_binhluan = $_GET['id_binhluan'];
          delete_binhluan2($id_binhluan);
          delete_binhluan($id_binhluan);
          $feedbacks = show_feedback($id);
          $product = chitiet_sp($id);
          $binhluan = show_binhluan($id);
          include_once '/xampp/htdocs/duanmau/view/user/detail_product.php';
        }
      }
      break;
    case 'guifeedback':
      if (isset($_POST['guifeedback'])) {
        if (isset($_SESSION['user'])) {
          if (isset($_GET['id_binhluan'])) {
            if (isset($_GET['id'])) {
              extract($_SESSION['user']);
              $id = $_GET['id'];
              $id_binhluan = $_GET['id_binhluan'];
              $noidungfb = $_POST['feedback'];
              guifeedback($user_id, $id, $noidungfb, $id_binhluan);
              $binhluan = show_binhluan($id);
              $product = chitiet_sp($id);
              $feedbacks = show_feedback($id);
              include_once '/xampp/htdocs/duanmau/view/user/detail_product.php';
            }
          }
        }
      }
      break;
    case 'delete_feedback':
      if (isset($_GET['id'])) {
        if (isset($_GET['feedback_id'])) {
          $id = $_GET['id'];
          $feedback_id = $_GET['feedback_id'];
          delete_feedback($feedback_id);
          $feedbacks = show_feedback($id);
          $product = chitiet_sp($id);
          $binhluan = show_binhluan($id);
          include_once '/xampp/htdocs/duanmau/view/user/detail_product.php';
        }
      }
      break;
      case 'cart':
        if (isset($_SESSION['user'])) {
          extract($_SESSION['user']); 
          $cart = show_cart($user_id);
        }
        
        require_once '/xampp/htdocs/duanmau/view/user/cart.php';
        break;
      case 'add_cart';
        if(isset($_POST['add_cart'])){
          if (isset($_SESSION['user'])) {
            extract($_SESSION['user']); 
            $product_id = $_POST['product_id'];
            $soluong = $_POST['soluong'];
            add_cart($user_id,$product_id,$soluong);
            }
        }
      break;
    default:
      include '/xampp/htdocs/duanmau/view/user/home.php';
  }
} else {
  include '/xampp/htdocs/duanmau/view/user/home.php';
}
include '/xampp/htdocs/duanmau/view/user/footer.php';
