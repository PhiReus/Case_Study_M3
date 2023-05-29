<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-header">
                        <form action="index.php?action=store" method="post" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label class="form-label">NAME</label>
                                <input type="text" name="name" class="form-control">
                                <?php if (isset($errors['name'])) : ?>
                                    <p class="text-danger"><?php echo $errors['name'] ?></p>
                                <?php endif; ?>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">PRICE</label>
                                <input type="text" class="form-control" name="price">
                                <?php if (isset($errors['price'])) : ?>
                                    <p class="text-danger"><?php echo $errors['price'] ?></p>
                                <?php endif; ?>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">COLOR</label>
                                <input type="text" class="form-control" name="color">
                                <?php if (isset($errors['color'])) : ?>
                                    <p class="text-danger"><?php echo $errors['color'] ?></p>
                                <?php endif; ?>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">IMAGE</label>
                                <input type="file" class="form-control" name="image">
                                <?php if (isset($errors['image'])) : ?>
                                    <p class="text-danger"><?php echo $errors['image'] ?></p>
                                <?php endif; ?>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">BRAND</label>
                                <select name="brand_id" class="form-control">
                                    <?php foreach ($brands1 as $brand) : ?>
                                        <option value="<?php echo $brand->id; ?>"><?php echo $brand->name; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">SAVE</button>
                            <a type="button" href="index.php" class="btn btn-secondary">BACK</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- END: @yield('content') -->
    </div>
</div> 
<!-- @include('includes.footer') -->