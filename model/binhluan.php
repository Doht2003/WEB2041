<?php

    function gui_binhluan($user_id,$product_id,$noidungbl){
        include '/xampp/htdocs/duanmau/ketnoi/ketnoi.php';
         if($noidungbl == " "){
            $noidungbl_error = "Nội dung bình luận không được để trống";
        }
        if(!isset($noidungbl_error)){
            $sql = "INSERT INTO binhluan(user_id,product_id,noidung) VALUES ('$user_id','$product_id','$noidungbl')";
            // chuẩn bị
            $stmt = $conn->prepare($sql);
            //Thực thi
            $stmt->execute();
        }
    }

    function show_binhluan($id){
        include '/xampp/htdocs/duanmau/ketnoi/ketnoi.php';
        $sql = "SELECT binhluan.binhluan_id,binhluan.user_id, taikhoan.img,taikhoan.username , binhluan.ngaybl ,binhluan.noidung  FROM binhluan  JOIN products ON products.product_id = binhluan.product_id JOIN taikhoan on binhluan.user_id = taikhoan.user_id WHERE products.product_id='$id' order by ngaybl desc";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $binhluan = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $binhluan;
    }
    function delete_binhluan($id_binhluan){
        include '/xampp/htdocs/duanmau/ketnoi/ketnoi.php';
        $sql = "DELETE FROM binhluan WHERE binhluan_id = '$id_binhluan' ";
        $stmt = $conn->prepare($sql);
        $stmt->execute();

        
    }
    function delete_binhluan2($id_binhluan){
        include '/xampp/htdocs/duanmau/ketnoi/ketnoi.php';
        $sql = "DELETE FROM feedback WHERE binhluan_id = '$id_binhluan' ";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
    }

    function delete_feedback($feedback_id){
        include '/xampp/htdocs/duanmau/ketnoi/ketnoi.php';
        $sql = "DELETE FROM feedback WHERE feedback_id = '$feedback_id' ";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
    }
    function guifeedback($user_id,$product_id,$noidungbl,$binhluan_id){
        include '/xampp/htdocs/duanmau/ketnoi/ketnoi.php';
        if($noidungbl == " "){
            $noidungbl_error = "Nội dung bình luận không được để trống";
        }
        if(!isset($noidungbl_error)){
            $sql = "INSERT INTO feedback(binhluan_id,user_id,product_id,noidung) VALUES ('$binhluan_id','$user_id','$product_id','$noidungbl')";
            // chuẩn bị
            $stmt = $conn->prepare($sql);
            //Thực thi
            $stmt->execute();
        }
    }
    function show_feedback($id){
        include '/xampp/htdocs/duanmau/ketnoi/ketnoi.php';
        $sql = "SELECT feedback_id, feedback.binhluan_id,feedback.user_id, taikhoan.img,taikhoan.username , feedback.ngay_traloi , feedback.noidung  FROM feedback  JOIN products ON products.product_id = feedback.product_id JOIN taikhoan on feedback.user_id = taikhoan.user_id  JOIN binhluan on feedback.binhluan_id = binhluan.binhluan_id WHERE products.product_id='$id'";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $feedback = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $feedback;
    }
?>