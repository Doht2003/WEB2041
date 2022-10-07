<?php
function add($cate_name)
{
    include '/xampp/htdocs/duanmau/ketnoi/ketnoi.php';
    $sql = "INSERT INTO  categories(cate_name) values('$cate_name')";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
}
function delete($id)
{
    include '/xampp/htdocs/duanmau/ketnoi/ketnoi.php';
    $sql = "DELETE FROM categories WHERE cate_id = '$id'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
}
function edit($id)
{
    include '/xampp/htdocs/duanmau/ketnoi/ketnoi.php';
    $sql = "SELECT * FROM  categories  WHERE cate_id = '$id'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $cate = $stmt->fetch(PDO::FETCH_ASSOC);
    return $cate;
}
function updatedm($cate_id, $cate_name)
{
    include '/xampp/htdocs/duanmau/ketnoi/ketnoi.php';
    $sql = "UPDATE   categories set  cate_name = ('$cate_name') WHERE cate_id = '$cate_id '";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
}
function showdm()
{
    include '/xampp/htdocs/duanmau/ketnoi/ketnoi.php';
    $sql = "SELECT * FROM categories order by cate_id desc";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $cates = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $cates;
}
