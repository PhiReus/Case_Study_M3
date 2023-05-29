<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-header">
                        <form method="post" action="?controller=brand&action=update&id=<?= $r['id']; ?>" enctype="multipart/form-data">
                            <input type="hidden" name="id" value="<?php echo $r['id']; ?>" />
                            <div class="mb-3">
                                <label class="form-label">NAME</label>
                                <input type="text" value="<?php echo $r['name']; ?>" name="name" class="form-control">
                                <?php if (isset($errors['name'])) : ?>
                                    <p class="text-danger"><?php echo $errors['name'] ?></p>
                                <?php endif; ?>
                            </div>
                            <button type="submit" class="btn btn-primary">SAVE</button>
                            <a type="button" href="?controller=brand&action=index" class="btn btn-secondary">BACK</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- END: @yield('content') -->
    </div>
    <!-- @include('includes.footer') -->