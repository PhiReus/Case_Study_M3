<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-header">
                        <form action="?controller=customer&action=store" method="post" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label class="form-label">NAME</label>
                                <input type="text" name="name" class="form-control">
                                <?php if (isset($errors['name'])) : ?>
                                    <p class="text-danger"><?php echo $errors['name'] ?></p>
                                <?php endif; ?>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">PHONE</label>
                                <input type="text" class="form-control" name="phone">
                                <?php if (isset($errors['phone'])) : ?>
                                    <p class="text-danger"><?php echo $errors['phone'] ?></p>
                                <?php endif; ?>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">ADDRESS</label>
                                <input type="text" class="form-control" name="address">
                                <?php if (isset($errors['address'])) : ?>
                                    <p class="text-danger"><?php echo $errors['address'] ?></p>
                                <?php endif; ?>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">IMAGE</label>
                                <input type="file" class="form-control" name="image">
                                <?php if (isset($errors['image'])) : ?>
                                    <p class="text-danger"><?php echo $errors['image'] ?></p>
                                <?php endif; ?>
                            </div>
                            <button type="submit" class="btn btn-primary">SAVE</button>
                            <a type="button" href="?controller=customer&action=index" class="btn btn-secondary">BACK</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- END: @yield('content') -->
    </div>
</div> 
<!-- @include('includes.footer') -->