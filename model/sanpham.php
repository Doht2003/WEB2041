<?php
    function showsp($kyw,$cate_id)
    {
            include '/xampp/htdocs/duanmau/ketnoi/ketnoi.php';

        $sql = "SELECT * FROM products where 1";
        if($kyw !=""){
            $sql.= " and product_name like '%".$kyw."%'";
        }
        if($cate_id >0){
            $sql.= " and cate_id = '$cate_id'";
        }
        $sql.=" order by product_id desc";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $products;
    }
    
    function showsp_trangchu()
    {
        include '/xampp/htdocs/duanmau/ketnoi/ketnoi.php';

        $sql = "SELECT * FROM products where 1 order by product_id desc limit 0,9";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $products;
    }
    function show_top10_sp()
    {
        include '/xampp/htdocs/duanmau/ketnoi/ketnoi.php';

        $sql = "SELECT * FROM products where 1 order by view desc limit 0,9";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $products;
    }
    function view($id){
        include '/xampp/htdocs/duanmau/ketnoi/ketnoi.php';

        $sql = " UPDATE products SET view = view + 1 where  product_id = '$id'";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
    }
    function chitiet_sp($id){
        include '/xampp/htdocs/duanmau/ketnoi/ketnoi.php';

        $sql = "SELECT * FROM products where  product_id = '$id'";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $product = $stmt->fetch(PDO::FETCH_ASSOC);
        return $product;
    }
    function addsp($product_name,$price,$description,$file,$file2,$file3,$file4,$cate_id){
            include '/xampp/htdocs/duanmau/ketnoi/ketnoi.php';
        $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
        $ext = strtolower($ext);
        $img2 = $file2['name'];
        $img3 = $file3['name'];
        $img4 = $file4['name'];
        if ($file['size'] > 0) {
            if ($ext != "png" && $ext != "jpeg" && $ext != "jpg" && $ext != "gif") {
                $error_img = "Không đúng định dạnh ảnh";
            } else {
                $img = $file['name'];
            }
        }
        if ($product_name == "") {
            $error_product_name = "Bạn chưa nhập tên sản phẩm";
        }
        if ($price == "") {
            $error_price = "Bạn chưa nhập giá sản phẩm";
        } else if ($price <= 0) {
            $error_price = "Giá phải là số dương";
        }
        if (!isset($error_img) && !isset($error_product_name) && !isset($error_price)) {
            $sql = "INSERT INTO products(product_name,price,img,img_2,img_3,img_4,description,cate_id) VALUES ('$product_name','$price','$img','$img2','$img3','$img4','$description',' $cate_id')";
            // chuẩn bị
            $stmt = $conn->prepare($sql);
            //Thực thi
            $stmt->execute();
            move_uploaded_file($file['tmp_name'], '/xampp/htdocs/duanmau/view/img/' . $img);
            move_uploaded_file($file2['tmp_name'], '/xampp/htdocs/duanmau/view/img/' . $img2);
            move_uploaded_file($file3['tmp_name'], '/xampp/htdocs/duanmau/view/img/' . $img3);
            move_uploaded_file($file4['tmp_name'], '/xampp/htdocs/duanmau/view/img/' . $img4);
  
        }
    }
    function deletesp($id){
            include '/xampp/htdocs/duanmau/ketnoi/ketnoi.php';

        $sql = "DELETE FROM products WHERE product_id = '$id' ";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
    }
    function editsp($id){
            include '/xampp/htdocs/duanmau/ketnoi/ketnoi.php';
            
        $sql = "SELECT * FROM  products  WHERE product_id = '$id'";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $product = $stmt->fetch(PDO::FETCH_ASSOC);
         return $product;
    }
    function updatesp($product_id,$product_name,$price,$file,$file2,$file3,$file4,$img,$img2,$img3,$img4,$description,$cate_id){
            include '/xampp/htdocs/duanmau/ketnoi/ketnoi.php';

        if ($file['size'] > 0) {
            $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
            $ext = strtolower($ext);
            if ($ext != "png" && $ext != "jpeg" && $ext != "jpg" && $ext != "gif") {
                $error_img = "Không đúng định dạnh ảnh";
            } else {
                $img = $file['name'];
            }
        }
        if ($file2['size'] > 0) {
           
                $img2 = $file2['name'];
            
        }
        if ($file3['size'] > 0) {
           
            $img3 = $file3['name'];
        
        }
        if ($file4['size'] > 0) {
           
        $img4 = $file4['name'];
    
        }
        if ($product_name == "") {
            $error_product_name = "Bạn chưa nhập tên sản phẩm";
        }
        if ($price == "") {
            $error_price = "Bạn chưa nhập giá sản phẩm";
        } else if ($price <= 0) {
            $error_price = "Giá phải là số dương";
        }
        if (!isset($error_img) && !isset($error_product_name) && !isset($error_price)) {
            $sql = "UPDATE  products SET product_id = '$product_id' , product_name = '$product_name' ,price = '$price',img = '$img',img_2 = '$img2',img_3 = '$img3',img_4 = '$img4',description = '$description' ,cate_id =  ' $cate_id'  WHERE product_id = '$product_id'";
            // chuẩn bị
            $stmt = $conn->prepare($sql);
            //Thực thi
            $stmt->execute();
            move_uploaded_file($file['tmp_name'], '/xampp/htdocs/duanmau/view/img/' . $img);
            move_uploaded_file($file2['tmp_name'], '/xampp/htdocs/duanmau/view/img/' . $img2);
            move_uploaded_file($file3['tmp_name'], '/xampp/htdocs/duanmau/view/img/' . $img3);
            move_uploaded_file($file4['tmp_name'], '/xampp/htdocs/duanmau/view/img/' . $img4);
        }
    }
    function sanpham_lienquan($id,$iddm){
        include '/xampp/htdocs/duanmau/ketnoi/ketnoi.php';
        $sql = " SELECT * FROM products WHERE cate_id = '$iddm' AND product_id != '$id' order by RAND() limit 4";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $products_lienquan = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $products_lienquan;
    }
