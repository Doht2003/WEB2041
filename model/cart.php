<?php
    function add_cart($user_id,$product_id,$soluong){
        include '/xampp/htdocs/duanmau/ketnoi/ketnoi.php';

        $sql = "SELECT * FROM cart WHERE product_id =' $product_id' ";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $cart = $stmt -> fetch(PDO::FETCH_ASSOC);

        if(!$cart){
           
           
                $sql = "INSERT INTO cart(user_id,product_id,quantity) VALUES('$user_id','$product_id','$soluong')";
                $stmt = $conn->prepare($sql);
                $stmt->execute();
               
        }
        else{
            $sql = "UPDATE cart SET quantity= quantity+'$soluong' WHERE product_id =$product_id ";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
        }

       

    }
    function show_cart($user_id){
        include '/xampp/htdocs/duanmau/ketnoi/ketnoi.php';
        $sql = "SELECT cart_id,user_id,products.product_id,products.product_name,products.img,products.price,quantity FROM cart JOIN products ON products.product_id=cart.product_id  WHERE user_id = '$user_id'";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $cart = $stmt -> fetchAll(PDO::FETCH_ASSOC);
        return $cart;
    }
?>