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
                                <select name="phone_id" class="form-control" onchange="updateTotalAmount(this)">
                                    <?php foreach ($phones as $phone) : ?>
                                        <option value="<?php echo $phone->id; ?>" data-price="<?php echo $phone->price; ?>" <?php if ($phone->id == $r['phone_id']) echo 'selected'; ?>>
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
                                <input type="text" value="<?php echo $r['total_amount']; ?>" class="form-control" name="total_amount" id="total_amount">
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
    <script>
        function updateTotalAmount(selectElement) {
            var selectedOption = selectElement.options[selectElement.selectedIndex];
            var price = selectedOption.getAttribute('data-price');
            document.getElementById('total_amount').value = price;
        }
    </script>