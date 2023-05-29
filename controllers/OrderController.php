<?php
require_once 'models/Order.php';
require_once 'models/Phone.php';
require_once 'models/Customer.php';
class OrderController
{
    // Hien thi danh sach records => table
    public function index()
    {
        $orders = Order::all();
        if (isset($_GET['success']) && $_GET['success'] == 1) {
            $successMessage = 'THÊM THÀNH CÔNG!';
        } else if (isset($_GET['success']) && $_GET['success'] == 2) {
            $successMessage1 = 'CẬP NHẬT THÀNH CÔNG!';
        } else if (isset($_GET['success']) && $_GET['success'] == 3) {
            $successMessage2 = 'XÓA THÀNH CÔNG!';
        }

        // Truyen data xuong view
        require_once 'views/orders/index.php';
    }
    // Hien thi form them moi
    public function create()
    {
        $orders = Order::create();
        $phones = Phone::create();
        $customers = Customer::create();
        // var_dump($teams1);
        // die();
        require_once 'views/orders/create.php';
    }
    // Xu ly them moi
    public function store()
    {
        $errors = array();
        // $data = array();

        // Lấy dữ liệu
        $order_date = isset($_POST['order_date']) ? $_POST['order_date'] : '';
        if (empty($order_date)) {
            $errors['order_date'] = 'Bạn chưa nhập ngày';
        }
        $total_amount = isset($_POST['total_amount']) ? $_POST['total_amount'] : '';
        if (empty($total_amount)) {
            $errors['total_amount'] = 'Bạn chưa nhập số tiền';
        }

        // Lưu dữ liệu
        if (count($errors) == 0) {
            // Goi model
            Order::store($_POST);

            // Chuyen huong ve trang danh sach
            header("Location: index.php?controller=order&action=index&success=1");
            exit();
        } else {
            require_once 'views/orders/create.php';
        }
    }
    // Hien thi form chinh sua
    public function edit()
    {
        $id = $_GET['id'];
        $r = Order::find($id);
        $phones = Phone::create();
        $customers = Customer::create();

        // var_dump($teams1);
        // die();
        // Truyen xuong view
        require_once 'views/orders/edit.php';
    }
    // Xu ly chinh sua
    public function update()
    {
        $id = $_GET['id'];
        Order::update($id, $_POST);

        // Xử lý yêu cầu Ajax để lấy giá trị total_amount cho phone_id
        if (isset($_GET['phone_id'])) {
            $phoneId = $_GET['phone_id'];
            $phone = Phone::find($phoneId);
            $totalAmount = $phone['total_amount'];
            echo $totalAmount;
            exit; // Dừng việc thực thi để chỉ trả về giá trị total_amount
        }

        // Chuyển hướng về trang danh sách
        header("Location: index.php?controller=order&action=index&success=2");
    }

    // Xoa
    public function destroy()
    {
        $id = $_GET['id'];
        Order::delete($id);
        // Chuyen huong ve trang danh sach
        header("Location: index.php?controller=order&action=index&success=3");
    }
    // Xem chi tiet
    public function show()
    {
        $id = $_GET['id'];
        $r = Order::find($id);

        // Truyen xuong view
        require_once 'views/orders/show.php';
    }
}
