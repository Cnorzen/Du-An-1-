<?php
function insert_ma_giam_gia($ten_ma_gg,$noi_dung_ma_gg,$tien_gg,$ngay_het_han){
    $sql = "INSERT INTO `ma_giam_gia` ( `ma_giam_gia`, `noi_dung`, `so_tien_giam`, `ngay_het_han`,`trang_thai`) VALUES ('$ten_ma_gg', '$noi_dung_ma_gg', '$tien_gg', '$ngay_het_han',0)";
    pdo_query($sql);
}
function cuppon_list(){
    $sql = "SELECT * FROM ma_giam_gia WHERE trang_thai=0";
    $cuppon = pdo_query($sql);
    return $cuppon;
}
function cuppon_list_het_han(){
    $sql = "SELECT * FROM ma_giam_gia WHERE trang_thai=1";
    $cuppon = pdo_query($sql);
    return $cuppon;
}
function del_ma_giam_gia($id_gg){
    $sql="UPDATE `ma_giam_gia` SET `trang_thai` = '1' WHERE `ma_giam_gia`.id_giam_gia='$id_gg'";
    pdo_execute($sql);
}
function get_ma_giam_gia($ma_giam_gia){
    $sql = "SELECT * FROM ma_giam_gia WHERE ma_giam_gia='$ma_giam_gia'";
    $data = pdo_execute_single($sql);
    return $data;
}

function check_vaild_date($ma_giam_gia){
    $sql = "SELECT ma_giam_gia, ngay_het_han >= CURDATE() AS con_han FROM ma_giam_gia WHERE ma_giam_gia = '$ma_giam_gia'"; //0 là hết hạn, 1 là còn hạn
    $data = pdo_execute_single($sql);
    return $data;
}   

?>