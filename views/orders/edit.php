<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-header">
                        <form method="post" action="?controller=order&action=update&id=<?= $r['id']; ?>" enctype="multipart/form-data">
                            <input type="hidden" name="id" value="<?php echo $r['id']; ?>" />
                            <div class="mb-3">
                                <label class="form-label">DATE</label>
                                <input type="date" value="<?php echo $r['order_date']; ?>" name="order_date" class="form-control">
                                <?php if (isset($errors['order_date'])) : ?>
                                    <p class="text-danger"><?php echo $errors['order_date'] ?></p>
                                <?php endif; ?>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">PHONE NAME</label>
                                <select name="phone_id" id="phoneSelect" class="form-control">
                                    <?php foreach ($phones as $phone) : ?>
                                        <option value="<?php echo $phone->id; ?>" <?php if ($phone->id == $r['phone_id']) echo 'selected'; ?>>
                                            <?php echo $phone->name; ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                                <?php if (isset($errors['phone_id'])) : ?>
                                    <p class="text-danger"><?php echo $errors['phone_id'] ?></p>
                                <?php endif; ?>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">TOTAL AMOUNT</label>
                                <input type="text" id="totalAmount" value="<?php echo $r['total_amount']; ?>" class="form-control" name="total_amount">
                                <?php if (isset($errors['total_amount'])) : ?>
                                    <p class="text-danger"><?php echo $errors['total_amount'] ?></p>
                                <?php endif; ?>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">CUSTOMER NAME</label>
                                <select name="customer_id" class="form-control">
                                    <?php foreach ($customers as $customer) : ?>
                                        <option value="<?php echo $customer->id; ?>" <?php if ($customer->id == $r['customer_id']) echo 'selected'; ?>>
                                            <?php echo $customer->name; ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                                <?php if (isset($errors['customer_id'])) : ?>
                                    <p class="text-danger"><?php echo $errors['customer_id'] ?></p>
                                <?php endif; ?>
                            </div>

                            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                            <script>
                                $(document).ready(function() {
                                    // Lấy giá trị của trường total_amount và trường phone_id
                                    var totalAmountField = document.getElementById('totalAmount');
                                    var phoneSelectField = document.getElementById('phoneSelect');

                                    // Xử lý sự kiện thay đổi của trường phone_id
                                    phoneSelectField.addEventListener('change', function() {
                                        // Lấy giá trị được chọn trong trường phone_id
                                        var selectedPhoneId = this.value;

                                        // Gửi yêu cầu Ajax để lấy thông tin về giá trị total_amount từ server
                                        $.ajax({
                                            url: '?controller=order&action=update', // Đường dẫn tới phương thức xử lý getTotalAmount trong controller
                                            type: 'GET',
                                            data: {
                                                phone_id: selectedPhoneId
                                            },
                                            success: function(response) {
                                                // Cập nhật giá trị của trường total_amount
                                                totalAmountField.value = response;
                                            },
                                            error: function() {
                                                // Xử lý lỗi (nếu có)
                                            }
                                        });
                                    });
                                });
                            </script>
                            <button type="submit" class="btn btn-primary">SAVE</button>
                            <a type="button" href="?controller=order&action=index" class="btn btn-secondary">BACK</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- END: @yield('content') -->
    </div>
    <!-- @include('includes.footer') -->