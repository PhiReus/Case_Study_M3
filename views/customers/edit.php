<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-header">
                        <form method="post" action="?controller=customer&action=update&id=<?= $r['id']; ?>" enctype="multipart/form-data">
                            <input type="hidden" name="id" value="<?php echo $r['id']; ?>" />
                            <div class="mb-3">
                                <label class="form-label">NAME</label>
                                <input type="text" value="<?php echo $r['name']; ?>" name="name" class="form-control">
                                <?php if (isset($errors['name'])) : ?>
                                    <p class="text-danger"><?php echo $errors['name'] ?></p>
                                <?php endif; ?>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">PHONE</label>
                                <input type="text" value="<?php echo $r['phone']; ?>" class="form-control" name="phone">
                                <?php if (isset($errors['phone'])) : ?>
                                    <p class="text-danger"><?php echo $errors['phone'] ?></p>
                                <?php endif; ?>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">ADDRESS</label>
                                <input type="text" value="<?php echo $r['address']; ?>" class="form-control" name="address">
                                <?php if (isset($errors['address'])) : ?>
                                    <p class="text-danger"><?php echo $errors['address'] ?></p>
                                <?php endif; ?>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">IMAGE</label>
                                <?php if ($r['image']) : ?>
                                    <img src="<?= ROOT_URL . $r['image']; ?>" alt="<?= ROOT_URL . $r['name']; ?>" style="max-width: 200px;">
                                <?php endif; ?>
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
    <!-- @include('includes.footer') -->