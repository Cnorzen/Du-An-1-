<?php
session_start();
ob_start();
include "../module/PDO.php";
include "../module/order.php";
include "../module/static.php";

if (isset($_GET['ma_don_hang'])) {
    $ma_don_hang = $_GET['ma_don_hang'];
    $shop_data = admin_get_contract();
    foreach ($shop_data as $shop) {
        extract($shop);
    }
    $don_hang_ct = donhang_get_chi_tiet($ma_don_hang);
    $toalf = donhang_toal_finnal($ma_don_hang);
    $toal = donhang_get_toal_chi_tiet($ma_don_hang);
    if (empty($don_hang_ct) && empty($toal)) {
        echo "Không có đơn hàng";
        die;
    } else {
        foreach ($don_hang_ct as $value) {
            extract($value);
        }
        foreach ($toalf as $value) {
            extract($value);
        }
        foreach ($toal as $value) {
            extract($value);
        }
        // ShowArray($shop_data);
        // ShowArray($toal);
    }
} else {
    echo "Không có mã đơn hàng";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>In hóa đơn</title>
    <link rel="icon" href="../image/logo.png">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

     .nav-bar {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 20px;
    }
    .navinfo {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 20px;
    background-color: #f8f9fa;
    }
    .shop-info {
        flex-grow: 1;
        text-align: right;
        margin-right: 20px; /* hoặc thay đổi giá trị phù hợp */
    }

    .cus-info {
        text-align: right;
        margin-left: 20px; /* hoặc thay đổi giá trị phù hợp */
    }

        .logo img {
            max-width: 200px;
            max-height: 100px;
        }

        .shop-info {
            flex-grow: 1;
            text-align: right;
        }

        .cus-info {
            text-align: right;
        }

        .ct_dh table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .ct_dh table, .ct_dh th, .ct_dh td {
            border: 1px solid #dee2e6;
        }

        .ct_dh th, .ct_dh td {
            padding: 10px;
            text-align: left;
        }
    </style>
</head>
<body>
    <div class="container">
    <div class="nav-bar">
            <a href="../index.php?act=account">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" class="w-6 h-6"height=30px>
            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 12h-15m0 0l6.75 6.75M4.5 12l6.75-6.75"></path>
            </svg>
            <span>Trở lại</span>
            </a>
            <button onclick="window.print()" class="btn btn-primary">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" class="w-6 h-6"height=30px>
           <path stroke-linecap="round" stroke-linejoin="round" d="M6.72 13.829c-.24.03-.48.062-.72.096m.72-.096a42.415 42.415 0 0110.56 0m-10.56 0L6.34 18m10.94-4.171c.24.03.48.062.72.096m-.72-.096L17.66 18m0 0l.229 2.523a1.125 1.125 0 01-1.12 1.227H7.231c-.662 0-1.18-.568-1.12-1.227L6.34 18m11.318 0h1.091A2.25 2.25 0 0021 15.75V9.456c0-1.081-.768-2.015-1.837-2.175a48.055 48.055 0 00-1.913-.247M6.34 18H5.25A2.25 2.25 0 013 15.75V9.456c0-1.081.768-2.015 1.837-2.175a48.041 48.041 0 011.913-.247m10.5 0a48.536 48.536 0 00-10.5 0m10.5 0V3.375c0-.621-.504-1.125-1.125-1.125h-8.25c-.621 0-1.125.504-1.125 1.125v3.659M18 10.5h.008v.008H18V10.5zm-3 0h.008v.008H15V10.5z"></path>
           </svg>
            <span>In hóa đơn</span>
        
            </button>


    </div>
        <div class="navinfo">
            <div class="logo">
                <img src="../image/logo.png" alt="">
            </div>
            <div class="shop-info">
                <h3>Thông tin người gửi</h3>
               <?php foreach($shop_data as $shop) : ?>
                <p><?=$shop['ten_doanh_nghiep']?></p>
                <p><?=$shop['dia_chi']?></p>
                <p><?=$shop['sdt']?></p>
                <p><?=$shop['email']?></p>
                <?php endforeach; ?>
            </div>
           
            <div class="cus-info">
                <h3>Thông tin người nhận</h3>
                <p><?=$ten_khach_hang?></p>
                <p><?=$dia_chi?></p>
                <p><?=$sdt?></p>
                <p><?=$email?></p>
            </div>
        </div> 

        <div class="text-center">
            <h3>Thông tin hóa đơn #<?php echo $ma_don_hang ?></h3>
            <h3>Trạng thái:
                <?php
                if ($trang_thai_don == 0) {
                    echo "Cần xác thực";
                } elseif ($trang_thai_don == 1) {
                    echo "Đã thanh toán";
                } elseif ($trang_thai_don == 2) {
                    echo "Chưa thanh toán";
                } else {
                    echo "Đã hủy";
                }
                ?>
            </h3>
        </div>

        <div class="ct_dh">
            <table class="table">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Tên sản phẩm</th>
                        <th>Số lượng</th>
                        <th>Đơn giá</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($don_hang_ct as $key => $value) : ?>
                        <tr>
                            <td><?php echo $key + 1 ?></td>
                            <td><?php echo $value['ten_san_pham']; ?> (Cỡ: <?php echo $value['size']; ?>)</td>

                            <td><?php echo $value['so_luong'] ?></td>
                            <td><?php echo number_format($value['don_gia']) ?></td>
                        </tr>
                    <?php endforeach; ?>
                    <tr>
                        <td colspan="3">Tổng tiền:</td>
                        <td><?php echo number_format($tong_gia_don_hang) ?></td>
                    </tr>
                    <tr>
                        <td colspan="3">Giảm Giá:</td>
                        <td>- <?php echo number_format($ma_giam_gia) ?></td>
                    </tr>
                    <tr>
                        <td colspan="3">Tổng tiền thanh toán:</td>
                        <td><?php echo number_format($tong_gia_don_hang_giam) ?></td>
                    </tr>
                    <tr>
                        <td colspan="3">Phương thức thanh toán:</td>
                        <td>
                            <?php 
                                if($phuong_thuc_thanh_toan == 0){
                                    echo "Thanh toán khi nhận hàng";
                                } elseif($phuong_thuc_thanh_toan == 1){
                                    echo "Thanh toán qua thẻ";
                                } else{
                                    echo "Thanh toán qua ví điện tử VNPay";
                                }
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3">Thanh toán bằng:</td>
                        <td><?php if(empty($brand)){
                            echo "Thanh toán khi nhận hàng";
                        } else{
                            echo $brand;
                        
                        }?></td>
                    </tr>
                    <tr>
                        <td colspan="3">Ghi chú:</td>
                        <td><?php echo $ghi_chu_kh ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
<script>
    onload = function() {
        window.print();
    }
</script>