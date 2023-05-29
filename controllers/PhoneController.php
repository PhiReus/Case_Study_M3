<?php
require_once 'models/Phone.php';
require_once 'models/Brand.php';
class PhoneController {
    // Hien thi danh sach records => table
    public function index(){
        $phones = Phone::all();
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
        require_once 'views/phones/index.php';
       
    }
    // Hien thi form them moi
    public function create(){
        $brands1 = Brand::create();

        // var_dump($teams1);
        // die();
        require_once 'views/phones/create.php';
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
            $date = isset($_POST['price']) ? $_POST['price'] : '';
            if (empty($date)){
                $errors['price'] = 'Bạn chưa nhập ngày sinh';
            }
            $color = isset($_POST['color']) ? $_POST['color'] : '';
            if (empty($color)){
                $errors['color'] = 'Bạn chưa nhập quốc gia';
            }
        
            // Lưu dữ liệu
            if (count($errors) == 0){
               // Goi model
               Phone::store($_POST);
                // Chuyen huong ve trang danh sach
                header("Location: index.php?controller=phone&action=index&success=1");
            }else{
                $brands1 = Brand::create();
                require_once 'views/phones/create.php';
            }
        
        

    }
    // Hien thi form chinh sua
    public function edit(){
        $id = $_GET['id'];
        $r = Phone::find($id);
        $brands1 = Brand::create();
         // var_dump($teams1);
        // die();
        // Truyen xuong view
        require_once 'views/phones/edit.php';
    }
    // Xu ly chinh sua
    public function update(){
        $id = $_GET['id'];
        Phone::update( $id, $_POST );
        // Chuyen huong ve trang danh sach
        header("Location: index.php?controller=phone&action=index&success=2");
    }

    // Xoa
    public function destroy(){
        $id = $_GET['id'];
        Phone::delete($id);
        // Chuyen huong ve trang danh sach
        header("Location: index.php?controller=phone&action=index&success=3");
    }
    // Xem chi tiet
    public function show(){
        $id = $_GET['id'];
        $r = Phone::find($id);

        // Truyen xuong view
        require_once 'views/phones/show.php';
    }
}