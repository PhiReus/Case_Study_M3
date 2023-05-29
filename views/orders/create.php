
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-header">
                        <form action="?controller=order&action=store" method="post" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label class="form-label">ORDER DATE</label>
                                <input type="date" name="order_date" class="form-control">
                                <?php if (isset($errors['order_date'])) : ?>
                                    <p class="text-danger"><?php echo $errors['order_date'] ?></p>
                                <?php endif; ?>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">TOTAL AMOUNT</label>
                                <input type="text" class="form-control" name="total_amount">
                                <?php if (isset($errors['total_amount'])) : ?>
                                    <p class="text-danger"><?php echo $errors['total_amount'] ?></p>
                                <?php endif; ?>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">PHONE NAME</label>
                                <select name="phone_id" class="form-control">
                                    <?php foreach ($phones as $phone) : ?>
                                        <option value="<?php echo $phone->id; ?>"><?php echo $phone->name; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">BRAND</label>
                                <select name="customer_id" class="form-control">
                                    <?php foreach ($customers as $customer) : ?>
                                        <option value="<?php echo $customer->id; ?>"><?php echo $customer->name; ?></option>
                                    <?php endforeach; ?>
                                </select>
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
</div> 
<!-- @include('includes.footer') -->