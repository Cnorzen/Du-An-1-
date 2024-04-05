<?php
 $ten_khach_hang = $_SESSION['ten_khach_hang'] ;
 $email = $_SESSION['email'];
 $ma_khach_hang = $_SESSION['ma_khach_hang'];    
 $avt = $_SESSION['$avt'];
$data = get_customer_by_id($ma_khach_hang);
$data1=donhang_list_by_customer($ma_khach_hang);     
extract($data);

?>

<style>
    .avatar-img {
    max-width: 200px; /* Điều chỉnh kích thước tối đa theo ý muốn */
    max-height: 200px;
}
  
</style>
<head>
<title>Quản Lí Tài khoản | Crown store</title>
</head>

<main class="h-full">
    <div class="page-container relative h-full flex flex-auto flex-col px-4 sm:px-6 md:px-8 py-4 sm:py-6">

            <div class="flex items-center justify-between mb-4">
                <h3>Quản Lí Tài khoản</h3>
            </div>
            <?php
     if(isset($error)){
        echo "<div class='alert alert-danger' role='alert'>";
        foreach($error as $err){
            echo $err."<br>";
        }
        echo "</div>";
    }
    if(isset ($_SESSION['sussec'])){
        echo "<div class='alert alert-success' role='alert'>";
        echo $_SESSION['sussec'];
        echo "</div>";
        unset($_SESSION['sussec']);
    }
    if(isset ($_SESSION['sussecc'])){
        echo "<div class='alert alert-success' role='alert'>";
        echo $_SESSION['sussecc'];
        echo "</div>";
        unset($_SESSION['sussecc']);
    }
    ?>           
                    <div class="tabs">
                        <div role="tablist" class="tab-list tab-list-underline">
                            <button class="btn btn-primary" >
                            <a  class="active" data-toggle="tab" href="#tab-profile">Thông tin cơ bản</a>
                            </button>
                       <button class="btn btn-primary" >
                            <a data-toggle="tab" href="#tab-password">Mật khẩu</a>
                            </button>
                            <button class="btn btn-primary">
                                <a data-toggle="tab" href="#tab-order">Đơn hàng</a>
                            </button>
                        </div>
             <br>
                <div class="card adaptable-card">
                <div class="card-body">
                        <div class="tab-content px-4 py-6">
                            <div class="tab-pane fade show active" id="tab-profile">
                                <form action="index.php?act=account" method="POST" enctype="multipart/form-data">
                                    <div class="form-container vertical">
                                        <div>
                                            <h5>Thông tin cơ bản</h5>
                                            <p>Thông tin cơ bản, để thiết lập đơn hàng nhanh hơn </p>
                                        </div>
                                <div class="form-group row">
                                    <?php
                                    if($trang_thai == 0){
                                        ?>
                                
                                        <div class="alert alert-danger" role="alert">
                                            <strong>Vui lòng</strong> xác thực tài khoản
                                            <button type="button" class="btn btn-secondary">
                                                <a href="index.php?act=veriacc&email=<?php echo $email?>">
                                                Xác thực ngay  
                                                </a> 
                                            </button>
                                        </div>
                                        <?php
                                    }  else{
                                        echo "";
                                    }
                                    
                                    ?>
                                    <label for="name" class="col-md-3 col-form-label font-weight-bold">Họ Và Tên</label>
                                    <div class="col-md-9">
                                        <div class="input-group">
                                            
                                            <input type="text" class="form-control pl-8" id="name" name="name" autocomplete="off"
                                                placeholder="Họ Và Tên" value="<?php echo $ten_khach_hang?>">
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="form-group row">
                                    <label for="name" class="col-md-3 col-form-label font-weight-bold">Email</label>
                                    <div class="col-md-9">
                                        <div class="input-group">
                                            
                                            <input type="text" class="form-control pl-8" id="email" name="email" autocomplete="off"
                                                placeholder="Email" value="<?php echo $email?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-9">
                                        <div class="input-group">
                                            
                                            <input type="text" class="form-control pl-8" id="email" name="makh" autocomplete="off"
                                                placeholder="Email" value="<?php echo $ma_khach_hang?>" hidden>
                                        </div>
                                    </div>
                                </div>
                                <br>
                               <div class="form-group row">
                                <label for="avt" class="col-md-3 col-form-label font-weight-bold">Avatar</label>
                                <div class="col-md-9">
                                    <div class="upload upload-draggable hover:border-primary-600 min-h-fit">
                                        <input class="form-control-file upload-input draggable" type="file" title="" value="" name="avt"
                                            onchange="previewImagesindex(event)">
                                        
                                        <div class="max-w-full flex flex-col px-4 py-2 justify-center items-center" id="new-upload">
                                            <div id="image-preview-container1"></div>
                                            <div class="my-16 text-center" id="image-preview-container">
                                            
                                            </div>
                                        </div>
                                    </div>
                                    <span class="avatar avatar-circle avatat-lg border-2 border-white dark:border-gray-800 shadow-lg"
                                        data-avatar-size="60">
                                        <img class="avatar-img avatar-circle" src="image/<?php echo $avt?>" loading="lazy">
                                    </span>
                                </div>
                            </div>
                            <br>
                            <div class="form-group row">
                                    <label for="name" class="col-md-3 col-form-label font-weight-bold">Số Điện Thoại</label>
                                    <div class="col-md-9">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                
                                            </div>
                                            <input type="text" class="form-control pl-8"  name="sdt" autocomplete="off"
                                                placeholder="số điện thoại" value="<?php echo $sdt ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="form-group row">
                                    <label for="name" class="col-md-3 col-form-label font-weight-bold">Địa chỉ</label>
                                    <div class="col-md-9">
                                        <div class="input-group">
                                           
                                            <input type="text" class="form-control pl-8"  name="diachi" autocomplete="off"
                                                placeholder="Địa chỉ" value="<?php echo $dia_chi?>">
                                        </div>
                                    </div>
                            </div>
                            <button type="submit" class="btn btn-primary" name="submit">Cập nhật</button>
                            
                                </form>
                            </div>
                        </div>
                    <hr>
                        <div class="tab-content px-4 py-6">
                            <div class="tab-pane fade show active" id="tab-password">
                                <form action="index.php?act=account" method="POST" >
                                    <div class="form-container vertical">
                                        <div>
                                            <h5>Mật khẩu</h5>
                                            <p>Cập nhật mật khẩu </p>
                                        </div>
                                <div class="form-group row">
                                    <label for="name" class="col-md-3 col-form-label font-weight-bold">Mật khẩu cũ</label>
                                    <div class="col-md-9">
                                        <div class="input-group">
                                            
                                            <input type="password" class="form-control pl-8"  name="oldpass" autocomplete="off"
                                                placeholder="Mật khẩu cũ">
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="form-group row">
                                    <label for="name" class="col-md-3 col-form-label font-weight-bold">Mật khẩu mới</label>
                                    <div class="col-md-9">
                                        <div class="input-group">
                                            
                                            <input type="password" class="form-control pl-8"  name="newpass" autocomplete="off"
                                                placeholder="Mật khẩu mới" >
                                        </div>
                                    </div>
                                </div>
                                  <div class="form-group row">
                                    <div class="col-md-9">
                                        <div class="input-group">
                                            
                                            <input type="text" class="form-control pl-8" id="email" name="makh" autocomplete="off"
                                                placeholder="Email" value="<?php echo $ma_khach_hang?>" hidden>
                                        </div>
                                    </div>
                                </div>
                                <br>
                               
                            <div class="form-group row">
                                    <label for="name" class="col-md-3 col-form-label font-weight-bold">Nhập lại mật khẩu mới</label>
                                    <div class="col-md-9">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                
                                            </div>
                                            <input type="password" class="form-control pl-8"  name="repass" autocomplete="off"
                                                placeholder="Mật khẩu mới" >
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <button type="submit" class="btn btn-primary" name="updatepassword">Cập nhật</button>
                            </form>
                        </div>
                        </div>
                        <hr>
                        <div class="tab-content px-4 py-6">
                            <div class="tab-pane fade show active" id="tab-order">
                            </div>
                          
    <div class="row mb-9 align-items-center justify-content-between">
      <div class="col-sm-6 mb-8 mb-sm-0">
        <h2 class="fs-4 mb-0">Lịch sử đơn hàng</h2>
        <p class="mb-0">Lịch sử đơn hàng đã mua</p>
      </div>
    </div>
    <div class="card mb-4 rounded-4 p-7">
      <div class="card-body px-0 pt-7 pb-0">
        <div class="table-responsive">
          <table class="table table-hover align-middle table-nowrap mb-0 table-borderless">
            <thead class="table-light">
              <tr>
                <th class="align-middle" scope="col">Mã đơn hàng </th>
                <th class="align-middle" scope="col">Phương thức thanh toán </th>
                <th class="align-middle" scope="col">tổng </th>
                <th class="align-middle" scope="col">Trạng Thái </th>
                <th class="align-middle" scope="col">Ngày Đặt </th>
                <th class="align-middle text-center" scope="col">Hành Động </th>
              </tr>
            </thead>
            <tbody>
              <?php
                    foreach($data1 as $value){
                        extract($value);
                   
              
              ?>
              <tr>
                <td>
                  <a href="#">#<?php echo $ma_don_hang ?></a>
                </td>
                <?php
                if($phuong_thuc_thanh_toan == 0){
            ?>
            <td>
                                                                                                <div class="flex items-center">
                                                                                                <span>COD</span>
                                                                                                </div>
                                                                                            </td>
                                                                                            <?php
                                                                                        }
                                                                                            elseif($phuong_thuc_thanh_toan == 1){
                                                                                                ?>
                                                                                                <td>
                                                                                                        <div class="flex items-center">
                                                                                                            <span>Thẻ tín Dụng</span>
                                                                                                        </div>
                                                                                                    </td>
                                                                                                    <?php
                                                                                                
                                                                                            } else {
                                                                                                ?>
                                                                                                <td>
                                                                                                <div class="flex items-center">
                                                                                                <span>Ví VNpay</span>
                                                                                                </div>
                                                                                            </td>
                                                                                            <?php
                                                                                            }
                                                                                            ?>
                                                                                        <?php
                                                                                                      $toal = donhang_toal_finnal($ma_don_hang);
                                                                                                      extract($toal);
                                                                                                      foreach($toal as $key => $value){
                                                                                                          extract($value);
                                                                                                      }

                                                                                             ?>
                 <td>
                                                                                            <div class="flex items-center">
                                                                                                <span><?php echo number_format($tong_gia_don_hang_giam, 0, ',', '.').'đ' ?></span>
                                                                                            </div>
                                                                                            </td>
                
<?php
if ($trang_thai_don == 0) {
    ?>
    <td>
        <span class="badge rounded-lg rounded-pill alert py-3 px-4 mb-0 alert-warning border-0 text-capitalize fs-12">Cần Xác thực</span>
    </td>
    <?php
} elseif ($trang_thai_don == 1) {
    ?>
    <td>
        <span class="badge rounded-lg rounded-pill alert py-3 px-4 mb-0 alert-success border-0 text-capitalize fs-12">Đã Thanh Toán</span>
    </td>
    <?php
} elseif ($trang_thai_don == 2) {
    ?>
    <td>
        <span class="badge rounded-lg rounded-pill alert py-3 px-4 mb-0 alert-danger border-0 text-capitalize fs-12">Chưa Thanh toán</span>
    </td>
    <?php
} elseif ($trang_thai_don == 3) {
    ?>
    <td>
        <span class="badge rounded-lg rounded-pill alert py-3 px-4 mb-0 alert-danger border-0 text-capitalize fs-12">Đã Hủy</span>
    </td>
    <?php
}
?>
                <td><?php echo $ngay_dat_hang ?></td>
                <td class="text-center">
                  <div class="d-flex flex-nowrap justify-content-center">
                    <a href="index.php?act=chitietdh&ma_don_hang=<?php echo $ma_don_hang?>" class="btn btn-primary py-4 fs-13px btn-xs me-4">Chi tiết đơn hàng</a>
                    
                  </div>
                </td>
              </tr>
             <?php
                    }
                ?> 
            </tbody>
          </table>
        </div>
      </div>
    </div>
    
  </div>

                        </div>
                </div>
            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<script>
    
    $(document).ready(function () {
        // Khi nút "Thông tin cơ bản" được click
        $("#tab-profile-btn").click(function () {
            // Hiển thị nội dung của tab "Thông tin cơ bản"
            $("#tab-profile").addClass("show active");
            // Ẩn nội dung của các tab khác
            $("#tab-password, #tab-order").removeClass("show active");
        });

        // Khi nút "Mật khẩu" được click
        $("#tab-password-btn").click(function () {
            // Hiển thị nội dung của tab "Mật khẩu"
            $("#tab-password").addClass("show active");
            // Ẩn nội dung của các tab khác
            $("#tab-profile, #tab-order").removeClass("show active");
        });

        // Khi nút "Đơn hàng" được click
        $("#tab-order-btn").click(function () {
            // Hiển thị nội dung của tab "Đơn hàng"
            $("#tab-order").addClass("show active");
            // Ẩn nội dung của các tab khác
            $("#tab-profile, #tab-password").removeClass("show active");
        });
    });

    function previewImagesindex(event) {
    var previewContainer = document.getElementById('image-preview-container');
    previewContainer.innerHTML = ''; // Xóa các xem trước cũ

    var files = event.target.files;

    for (var i = 0; i < Math.min(files.length, 1); i++) {
        var reader = new FileReader();

        reader.onload = function (e) {
            var imgWrapper = document.createElement('div');
            imgWrapper.classList.add('col-md-2', 'mb-1');

            var img = document.createElement('img');
            img.src = e.target.result;
            img.classList.add('img-fluid');
            imgWrapper.appendChild(img);

            previewContainer.appendChild(imgWrapper);
        };

        reader.readAsDataURL(files[i]);
    }
}

</script>