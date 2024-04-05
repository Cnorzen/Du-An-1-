
<main class="h-full">
								<div class="page-container relative h-full flex flex-auto flex-col px-4 sm:px-6 md:px-8 py-4 sm:py-6">
                                    <div class="container mx-auto">
                                    <?php
                                        if(isset($error)){
                                            foreach($error as $key => $value){
                                        ?>
                                        <div class="alert alert-danger">
                                        <div class="alert-content">
                                            <span class="alert-icon">
                                                <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 20 20" aria-hidden="true" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path>
                                                </svg>
                                            </span>
                                            <div><?php echo $value ?></div>
                                        </div>
                                    </div>
                                <?php
                                            }
                                        }   
                                ?>
                                        <h3 class="mb-4">Thêm mã giảm giá mới</h3>
                                        <form action="admin.php?act=addcuppon" method="POST">
                                            <div class="form-container vertical">
                                                <div class="grid grid-cols-1 lg:grid-cols-3 gap-4">
                                                    <div class="lg:col-span-2">
                                                        <div class="card adaptable-card !border-b pb-6 py-4 rounded-br-none rounded-bl-none">
                                                            <div class="card-body">
                                                                <h5>Mã giảm giá</h5>
                                                                <div class="form-item vertical">
                                                                    <label class="form-label mb-2">Tên Mã Giảm Giá</label>
                                                                    <input
                                                                        class="input"
                                                                        type="text"
                                                                        name="name_giam_gia" 
                                                                        autocomplete="off"
                                                                        placeholder="Nhập tên mã giảm giá"
                                                                        value=""
                                                                        
                                                                    >
                                                                </div>
                                                                <div class="form-item vertical">
                                                                    <label class="form-label mb-2">Nội dung giảm giá</label>
                                                                    <input
                                                                        class="input"
                                                                        type="text"
                                                                        name="noi_dung_cuppon" 
                                                                        autocomplete="off"
                                                                        placeholder="Nhập nội dung mã giảm giá"
                                                                        value=""
                                                                        
                                                                    >
                                                                </div>
                                                                <div class="form-item vertical">
                                                                    <label class="form-label mb-2">Số tiền giảm</label>
                                                                    <input
                                                                        class="input"
                                                                        type="number"
                                                                        name="so_tien_giam" 
                                                                        autocomplete="off"
                                                                        value=""
                                                                        
                                                                    >
                                                                </div>
                                                                <div class="form-item vertical">
                                                                    <label class="form-label mb-2">Ngày hết hạn</label>
                                                                    <input
                                                                        class="input"
                                                                        type="date"
                                                                        name="ngay_het_han" 
                                                                        autocomplete="off"
                                                                        value=""
                                                                        
                                                                    >
                                                                </div>
                                                                </div>                                                                
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                                <div id="stickyFooter" class="sticky -bottom-1 -mx-8 px-8 flex items-center justify-end py-4">
                                                    <div class="md:flex items-center">
                                                        <a href="admin.php"><button class="btn btn-default btn-sm ltr:mr-2 rtl:ml-2" type="button"  name="back">Quay lại</button></a>
                                                        <button class="btn btn-solid btn-sm" type="submit" name="submit">
                                                            <span class="flex items-center justify-center">
                                                                <span class="text-lg">
                                                                    <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 1024 1024" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                                                                        <path d="M893.3 293.3L730.7 130.7c-7.5-7.5-16.7-13-26.7-16V112H144c-17.7 0-32 14.3-32 32v736c0 17.7 14.3 32 32 32h736c17.7 0 32-14.3 32-32V338.5c0-17-6.7-33.2-18.7-45.2zM384 184h256v104H384V184zm456 656H184V184h136v136c0 17.7 14.3 32 32 32h320c17.7 0 32-14.3 32-32V205.8l136 136V840zM512 442c-79.5 0-144 64.5-144 144s64.5 144 144 144 144-64.5 144-144-64.5-144-144-144zm0 224c-44.2 0-80-35.8-80-80s35.8-80 80-80 80 35.8 80 80-35.8 80-80 80z"></path>
                                                                    </svg>
                                                                </span>
                                                                <span class="ltr:ml-1 rtl:mr-1">Save</span>
                                                            </span>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                        
                                    </div>                                       
                                </div>  
                                                            
</main>