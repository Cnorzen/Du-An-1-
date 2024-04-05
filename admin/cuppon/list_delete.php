<main class="h-full">
								<div class="page-container relative h-full flex flex-auto flex-col px-4 sm:px-6 md:px-8 py-4 sm:py-6">
                                    <div class="container mx-auto">
                                        <div class=" mb-4">
                                            <h3>Danh sách mã giảm giá đã xóa</h3>
                                        </div>
                                        <div class="card adaptable-card">
                                            <div class="card-body">
                                            <table id="product-list-data-table" class="table-default table-hover data-table">
                                            <thead>
                                                <tr>
                                                    <th></th>
                                                    <th>id</th>
                                                    <th>Mã giảm giá</th>
                                                    <th>Nội dung </th>
                                                    <th>Số tiền giảm</th>
                                                    <th>Ngày hết hạn</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <?php
                                                 extract($data);
                                                 foreach ($data as $cuppon){
                                                     extract($cuppon);
                                                     
                                                    ?>
                                                
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                                <label class="checkbox-label mb-0">
                                                                    <input class="checkbox order-checkbox" type="checkbox" value="">
                                                                </label>
                                                        </td>
                                                        <td>
                                                             <span class="cursor-pointer select-none font-semibold hover:text-indigo-600"><?=$id_giam_gia?></span>
                                                        </td>
                                                        <td>
                                                            <span><?=$ma_giam_gia?></span>
                                                        </td>
                                                        <td>
                                                                <?=$noi_dung?>
                                                        </td>
                                                        <td>
                                                            <span class="font-semibold"><?php echo number_format($so_tien_giam, 0, ',', '.').'đ' ?></span>  
                                                        </td>
                                                        <td>
                                                            <span class="font-semibold"><?=$ngay_het_han?></span>  
                                                        </td>   
                                                        <td>
                                                        
                                                        </td>
                                                    </tr>
                                                <?php }
                                                ?>
                                                </tbody>
                                                    </thead>
                                                </table>
                                            
                                            </div>
                                        </div>
                                    </div>    
                                </div>
							</main>
<!-- Other Vendors JS -->
<script src="vendors/datatables/jquery.dataTables.min.js"></script>
<script src="vendors/datatables/dataTables.custom-ui.min.js"></script>

<!-- Page js -->
<script src="js/pages/product-list.js"></script>
<script>
    function confirmDelete() {
        return confirm('Bạn có chắc chắn muốn xóa không?');
    }
</script>