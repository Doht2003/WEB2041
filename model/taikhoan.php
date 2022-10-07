<?php
    function checkuser($username,$password){
        include '/xampp/htdocs/duanmau/ketnoi/ketnoi.php';
        $sql = "SELECT * FROM taikhoan WHERE username = '$username' AND password = '$password'";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $account = $stmt->fetch(PDO::FETCH_ASSOC);
        return $account;
    }
    function dangky($username,$password,$repassword,$hovaten,$email,$address,$sdt,$file){
        include '/xampp/htdocs/duanmau/ketnoi/ketnoi.php';
        $errors = [];
        if ($file['size'] > 0) {
            $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
            $ext = strtolower($ext);
            if ($ext != "png" && $ext != "jpeg" && $ext != "jpg" && $ext != "gif") {
                $errors['img'] = "Không đúng định dạnh ảnh";
            } else {
                $img = $file['name'];
            }
        }
        else{
            $errors['img'] = "Ảnh không được để trống";
        }
        if($username== ""){
            $errors['username'] = "Bạn chưa nhập username";
        } 
        else{
            $sql = "SELECT * FROM taikhoan ";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $account = $stmt->fetchAll(PDO::FETCH_ASSOC);
            foreach($account as $check){
                if($username==$check['username']){
                    $errors['username'] = "Username đã tồn tại";
                }
            }
        }
        if($password == ""){
            $errors['password'] = "Bạn chưa nhập password";
        }
        else if( strlen($password) < 10){
            $errors['password'] = "Password phải lớn hơn 10 ký tự";
        }
        else if($password != $repassword){
            $errors['repassword'] = "Mật khẩu không trùng khớp";
        }
        if($email == ""){
            $errors['email'] = "Email không được để trống";
        }
        else if(!filter_var(trim($email), FILTER_VALIDATE_EMAIL)){
            $errors['email'] = "Email không đúng định dạng";
        }
        if($hovaten == ""){
            $errors['hovaten'] = "Họ và tên không được để trống";
        }
        if($address == ""){
            $errors['address'] = "Họ và tên không được để trống";
        }
        if($sdt == ""){
            $errors['sdt'] = "Số điện thoại không được để trống";
        }
        $_SESSION['errors'] =  $errors;
       if(! $errors ){
        $sql = "INSERT INTO taikhoan(username,password,hovaten,email,address,tel,img) VALUES ('$username','$password','$hovaten','$email','$address','$sdt','$img') ";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        move_uploaded_file($file['tmp_name'], '/xampp/htdocs/duanmau/view/img/' . $img);
       }
        
    }
    function quenmatkhau($email){
        include '/xampp/htdocs/duanmau/ketnoi/ketnoi.php';
        $sql = "SELECT * FROM taikhoan ";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $account = $stmt->fetchAll(PDO::FETCH_ASSOC);
            foreach($account as $check){
                if($email == $check['email']){
                    $_SESSION['thongbao']  = $check['password'];
                     break;
                }
                else{
                    $_SESSION['thongbao'] = "Email không tồn tại";
                }
            }
    }
