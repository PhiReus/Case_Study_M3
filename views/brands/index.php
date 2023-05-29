<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.0/dist/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.0/dist/sweetalert2.min.js"></script>


<div class="main-panel">
    <div class="content-wrapper">
        <?php
        // Kiểm tra xem có thông báo thành công hay không
        if (isset($successMessage)) {
            echo '<script>
            Swal.fire({
                title: "<h6>THÊM THÀNH CÔNG!</h6>",
                icon: "success",
                showConfirmButton: false,
                timer: 2000,
                width: "300px"
            });
          </script>';
        } else if (isset($successMessage1)) {
            echo '<script>
            Swal.fire({
                title: "<h6>CẬP NHẬT THÀNH CÔNG!</h6>",
                icon: "success",
                showConfirmButton: false,
                timer: 2000,
                width: "300px"
            });
          </script>';
        } else if (isset($successMessage2)) {
            echo '<script>
            Swal.fire({
                title: "<h6>XÓA THÀNH CÔNG!</h6>",
                icon: "success",
                showConfirmButton: false,
                timer: 2000,
                width: "300px"
            });
          </script>';
        }
        ?>
        <!-- @yield('content') -->
        <div class="page-header">
            <h3 class="page-title">Quản lý thương hiệu</h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Trang chủ</a></li>
                    <li class="breadcrumb-item active" aria-current="page"> Quản lý thương hiệu </li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-header">
                        <form action="index.php?controller=brand&action=index.php" method="get">
                            <div class="row mb-2">
                                <div class="col">
                                    <a href="index.php?controller=brand&action=create" class="btn btn-primary"> Thêm mới </a>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <input type="text" placeholder="Nhập ID" class="form-control" name="a1" />
                                    <input type="hidden" name="controller" value="brand"> <!-- Thêm dòng này để truyền tham số controller -->
                                    <input type="hidden" name="action" value="index"> <!-- Thêm dòng này để truyền tham số action -->
                                </div>
                                <div class="col">
                                    <input type="text" placeholder="Nhập thông tin" class="form-control" name="a" />
                                    <input type="hidden" name="controller" value="brand"> <!-- Thêm dòng này để truyền tham số controller -->
                                    <input type="hidden" name="action" value="index"> <!-- Thêm dòng này để truyền tham số action -->
                                </div>

                                <div class="col">
                                    <button type="submit" class="btn btn-secondary "> Tìm </button>
                                    <a href="index.php?controller=brand&action=index" class="btn btn-info"> Đặt lại </a>
                                    <!-- <button  type="button" class="btn btn-info"> Đặt lại </button> -->
                                </div>
                            </div>
                        </form>



                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>NAME</th>
                                        <th>ATC</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($brands['brands'] as $r) : ?>
                                        <tr>
                                            <td><?php echo $r->id ?></td>
                                            <td><?php echo $r->name ?></td>
                                            <td><a href="?controller=brand&action=destroy&id=<?php echo $r->id; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Bạn chắc chắn muốn xoá?')">Delete</a>
                                                <a href="?controller=brand&action=show&id=<?php echo $r->id; ?>" class="btn btn-info btn-sm">See</a>
                                                <a href="?controller=brand&action=edit&id=<?php echo $r->id; ?>" class="btn btn-primary btn-sm">Edit</a>
                                            </td>
                                        <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <?php if ($brands['total_records'] > $brands['brands_per_page']) : ?>
                        <div class="pagination justify-content-center">
                            <?php
                            $total_pages = ceil($brands['total_records'] / $brands['brands_per_page']);
                            $visible_pages = min($total_pages, 3);
                            $start_page = max(1, $brands['current_page'] - 1);
                            $end_page = min($start_page + $visible_pages - 1, $total_pages);
                            ?>

                            <?php if ($brands['current_page'] > 1) : ?>
                                <a class="page-link" href="?controller=brand&action=index&page=<?php echo $brands['current_page'] - 1; ?>" aria-label="Trang trước">
                                    <span aria-hidden="true">&laquo;</span>
                                </a>
                            <?php endif; ?>

                            <?php for ($i = $start_page; $i <= $end_page; $i++) : ?>
                                <?php if ($i == $brands['current_page']) : ?>
                                    <a class="page-link active" href="?controller=brand&action=index&page=<?php echo $i; ?>"><?php echo $i; ?></a>
                                <?php else : ?>
                                    <a class="page-link" href="?controller=brand&action=index&page=<?php echo $i; ?>"><?php echo $i; ?></a>
                                <?php endif; ?>
                            <?php endfor; ?>

                            <?php if ($brands['current_page'] < $total_pages) : ?>
                                <a class="page-link" href="?controller=brand&action=index&page=<?php echo $brands['current_page'] + 1; ?>" aria-label="Trang sau">
                                    <span aria-hidden="true">&raquo;</span>
                                </a>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>