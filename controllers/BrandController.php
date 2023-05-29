<?php
require_once 'models/Brand.php';
class BrandController
{
    // Hien thi danh sach records => table
    public function index()
    {
        $brands = Brand::all();
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
        require_once 'views/brands/index.php';
    }
    // Hien thi form them moi
    public function create()
    {
        require_once 'views/brands/create.php';
    }
    // Xu ly them moi
    public function store()
    {   $errors = array();
        // $data = array();
            // Lấy dữ liệu
            $name = isset($_POST['name']) ? $_POST['name'] : '';
            if (empty($name)){
                $errors['name'] = 'Bạn chưa nhập tên';
            }
            // Lưu dữ liệu
            if (count($errors) == 0){
               // Goi model
               Brand::store($_POST);
                // Chuyen huong ve trang danh sach
                header("Location: index.php?controller=brand&action=index&success=1");
            }else{
                $brands1 = Brand::create();
                require_once 'views/brands/create.php';
            }
        
    }
    // Hien thi form chinh sua
    public function edit()
    {
        $id = $_GET['id'];
        $r = Brand::find($id);
        // Truyen xuong view
        require_once 'views/brands/edit.php';
    }
    // Xu ly chinh sua
    public function update()
    {
        $id = $_GET['id'];
        Brand::update($id, $_POST);
        // Chuyen huong ve trang danh sach
        header("Location: index.php?controller=brand&action=index&success=2");
    }

    // Xoa
    public function destroy()
    {
        $id = $_GET['id'];
        Brand::delete($id);
        // Chuyen huong ve trang danh sach
        header("Location: index.php?controller=brand&action=index&success=3");
    }
    // Xem chi tiet
    public function show()
    {
        $id = $_GET['id'];
        $r = Brand::find($id);

        // Truyen xuong view
        require_once 'views/brands/show.php';
    }
}
