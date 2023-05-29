<?php
require_once 'models/Customer.php';
class CustomerController {
    // Hien thi danh sach records => table
    public function index(){
        $customers = Customer::all();
        if (isset($_GET['success']) && $_GET['success'] == 1) {
            $successMessage = 'THÊM THÀNH CÔNG!';
        }
        else if (isset($_GET['success']) && $_GET['success'] == 2) {
            $successMessage1 = 'CẬP NHẬT THÀNH CÔNG!';
        }
        else if (isset($_GET['success']) && $_GET['success'] == 3) {
            $successMessage2 = 'XÓA THÀNH CÔNG!';
        }
       
        // Truyen data xuong view
        require_once 'views/customers/index.php';
       
    }
    // Hien thi form them moi
    public function create(){
        $customers = Customer::create();

        // var_dump($teams1);
        // die();
        require_once 'views/customers/create.php';
    }
    // Xu ly them moi
    public function store(){

        $errors = array();
        // $data = array();
      
            // Lấy dữ liệu
            $name = isset($_POST['name']) ? $_POST['name'] : '';
            if (empty($name)){
                $errors['name'] = 'Bạn chưa nhập tên';
            }
            $phone = isset($_POST['phone']) ? $_POST['phone'] : '';
            if (empty($phone)){
                $errors['phone'] = 'Bạn chưa nhập số điện thoại';
            }
            $address = isset($_POST['address']) ? $_POST['address'] : '';
            if (empty($address)){
                $errors['address'] = 'Bạn chưa nhập địa chỉ';
            }
        
            // Lưu dữ liệu
            if (count($errors) == 0){
               // Goi model
               Customer::store($_POST);
                // Chuyen huong ve trang danh sach
                header("Location: index.php?controller=customer&action=index&success=1");
            }else{
                require_once 'views/customers/create.php';
            }
        
        

    }
    // Hien thi form chinh sua
    public function edit(){
        $id = $_GET['id'];
        $r = Customer::find($id);
         // var_dump($teams1);
        // die();
        // Truyen xuong view
        require_once 'views/customers/edit.php';
    }
    // Xu ly chinh sua
    public function update(){
        $id = $_GET['id'];
        Customer::update( $id, $_POST );
        // Chuyen huong ve trang danh sach
        header("Location: index.php?controller=customer&action=index&success=2");
    }

    // Xoa
    public function destroy(){
        $id = $_GET['id'];
        Customer::delete($id);
        // Chuyen huong ve trang danh sach
        header("Location: index.php?controller=customer&action=index&success=3");
    }
    // Xem chi tiet
    public function show(){
        $id = $_GET['id'];
        $r = Customer::find($id);

        // Truyen xuong view
        require_once 'views/customers/show.php';
    }
}