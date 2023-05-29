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
            <h3 class="page-title">Quản lý đơn hàng</h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Trang chủ</a></li>
                    <li class="breadcrumb-item active" aria-current="page"> Quản lý đơn hàng</li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-header">
                        <form action="index.php?controller=order&action=index.php" method="get">
                            <div class="row mb-2">
                                <div class="col">
                                    <a href="index.php?controller=order&action=create" class="btn btn-primary"> Thêm mới </a>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <input type="text" placeholder="Nhập ID" class="form-control" name="s1" />
                                    <input type="hidden" name="controller" value="order"> <!-- Thêm dòng này để truyền tham số controller -->
                                    <input type="hidden" name="action" value="index"> <!-- Thêm dòng này để truyền tham số action -->
                                </div>
                                <div class="col">
                                    <input type="text" placeholder="Nhập thông tin" class="form-control" name="s" />
                                    <input type="hidden" name="controller" value="order"> <!-- Thêm dòng này để truyền tham số controller -->
                                    <input type="hidden" name="action" value="index"> <!-- Thêm dòng này để truyền tham số action -->
                                </div>

                                <div class="col">
                                    <button type="submit" class="btn btn-secondary "> Tìm </button>
                                    <a href="index.php?controller=order&action=index" class="btn btn-info"> Đặt lại </a>
                                    <!-- <button  type="button" class="btn btn-info"> Đặt lại </button> -->
                                </div>
                            </div>
                        </form>

                        <!-- <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0" action="list.php" method="get">
                            <div class="input-group">
                                <input class="form-control" type="text" placeholder="Search for..." name="s" />
                                <button class="btn btn-primary" id="btnNavbarSearch" type="submit"><i class="fas fa-search"></i></button>
                            </div>
                        </form> -->

                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                    <tr>
                                        <th>STT</th>
                                        <th>ORDER DATE</th>
                                        <th>TOTAL AMOUNT</th>
                                        <th>PHONE NAME</th>
                                        <th>CUSTOMER NAME</th>
                                        <th>ATC</th>
                                    </tr>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($orders['orders'] as $r) : ?>
                                        <tr>
                                            <td><?php echo $r->id ?></td>
                                            <td><?php echo $r->order_date ?></td>
                                            <td><?php echo $r->total_amount ?></td>
                                            <td><?php echo $r->phone_name ?></td>
                                            <td><?php echo $r->customer_name  ?></td>
                                            <td><a href="?controller=order&action=destroy&id=<?php echo $r->id; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Bạn chắc chắn muốn xoá?')">Delete</a>
                                                <a href="?controller=order&action=show&id=<?php echo $r->id; ?>" class="btn btn-info btn-sm">See</a>
                                                <a href="?controller=order&action=edit&id=<?php echo $r->id; ?>" class="btn btn-primary btn-sm">Edit</a>
                                            </td>
                                        <?php endforeach; ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <?php if ($orders['total_records'] > $orders['orders_per_page']) : ?>
                        <div class="pagination justify-content-center">
                            <?php
                            $total_pages = ceil($orders['total_records'] / $orders['orders_per_page']);
                            $visible_pages = min($total_pages, 3);
                            $start_page = max(1, $orders['current_page'] - 1);
                            $end_page = min($start_page + $visible_pages - 1, $total_pages);
                            ?>

                            <?php if ($orders['current_page'] > 1) : ?>
                                <a class="page-link" href="?controller=order&action=index&page=<?php echo $orders['current_page'] - 1; ?>" aria-label="Trang trước">
                                    <span aria-hidden="true">&laquo;</span>
                                </a>
                            <?php endif; ?>

                            <?php for ($i = $start_page; $i <= $end_page; $i++) : ?>
                                <?php if ($i == $orders['current_page']) : ?>
                                    <a class="page-link active" href="?controller=order&action=index&page=<?php echo $i; ?>"><?php echo $i; ?></a>
                                <?php else : ?>
                                    <a class="page-link" href="?controller=order&action=index&page=<?php echo $i; ?>"><?php echo $i; ?></a>
                                <?php endif; ?>
                            <?php endfor; ?>

                            <?php if ($orders['current_page'] < $total_pages) : ?>
                                <a class="page-link" href="?controller=order&action=index&page=<?php echo $orders['current_page'] + 1; ?>" aria-label="Trang sau">
                                    <span aria-hidden="true">&raquo;</span>
                                </a>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>