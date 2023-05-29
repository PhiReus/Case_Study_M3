<?php
// Ket noi voi database
class Customer
{
    // lay ta ca du lieu
    public static function all()
    {
        global $conn;

        if (isset($_GET["s"]) || isset($_GET["s1"])) {
            $s = isset($_GET["s"]) ? $_GET["s"] : "";
            $s1 = isset($_GET["s1"]) ? $_GET["s1"] : "";
            $conditions = [];

            if (!empty(trim($s))) {
                $conditions[] = "(customers.name LIKE '%$s%' OR customers.address LIKE '%$s%' OR customers.phone LIKE '%$s%')";
            }

            if (!empty(trim($s1))) {
                $conditions[] = "customers.id LIKE '%$s1%'";
            }

            $conditionsString = implode(" OR ", $conditions);

            $sql = "SELECT * FROM `customers`";

            if (!empty($conditionsString)) {
                $sql .= " WHERE $conditionsString";
            }

            $sql .= " ORDER BY id DESC";
        } else {
            $sql = "SELECT * FROM `customers` ORDER BY id DESC";
        }




        $customersPerPage = 4;
        $current_page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $start_index = ($current_page - 1) * $customersPerPage;

        $sql_count = "SELECT COUNT(*) AS total_records FROM customers";
        $stmt_count = $conn->query($sql_count);
        $total_records = $stmt_count->fetch(PDO::FETCH_ASSOC)['total_records'];

        $sql .= " LIMIT $start_index, $customersPerPage";
        $stmt = $conn->query($sql);
        $customers = $stmt->fetchAll(PDO::FETCH_OBJ);

        $data = [
            'customers' => $customers,
            'total_records' => $total_records,
            'current_page' => $current_page,
            'customers_per_page' => $customersPerPage
        ];

        // Trả về cho Model
        return $data;
    }


    // lay chi tiet 1 du lieu
    public static function find($id)
    {
        global $conn;
        $sql = "SELECT * FROM `customers` WHERE id = $id";
        $stmt = $conn->query($sql);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $row = $stmt->fetch();
        return $row;
    }

    // Them moi du lieu
    public static function store($data)
    {

        global $conn;
        $name = $data['name'];
        $phone = $data['phone'];
        $address = $data['address'];

        if (isset($_FILES['image'])) {
            if (!$_FILES['image']['error']) {
                move_uploaded_file($_FILES['image']['tmp_name'], ROOT_DIR . '/public/uploads/' . $_FILES['image']['name']);
                $image = '/public/uploads/' . $_FILES['image']['name'];
            }
        }

        $sql = "INSERT INTO `customers` 
            ( `name`, `phone`, `address`,`image`) 
            VALUES 
            ('$name','$phone','$address','$image')";
        //Thuc hien truy van
        $conn->exec($sql);
        return true;
    }

    public static function create()
    {
        global $conn;
        $sql = "SELECT * FROM `customers`";
        $stmt = $conn->query($sql);
        $row = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $row;
    }

    // Cap nhat du lieu
    public static function update($id, $data)
    {
        global $conn;
        $name = $data['name'];
        $phone = $data['phone'];
        $address = $data['address'];

        // Kiểm tra xem đã tải lên ảnh mới hay chưa
        if (isset($_FILES['image']) && is_uploaded_file($_FILES['image']['tmp_name'])) {
            // Đường dẫn thư mục tải lên
            $uploadDir = ROOT_DIR . '/public/uploads/';

            // Xóa ảnh cũ nếu có
            $sql = "SELECT `image` FROM `customers` WHERE `id` = $id";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $oldImage = $stmt->fetchColumn();

            if ($oldImage && file_exists($uploadDir . $oldImage)) {
                unlink($uploadDir . $oldImage);
            }

            // Di chuyển ảnh mới vào thư mục đích
            $newImage = $uploadDir . $_FILES['image']['name'];
            move_uploaded_file($_FILES['image']['tmp_name'], $newImage);
            $image = '/public/uploads/' . $_FILES['image']['name'];
        } else {
            // Không có ảnh mới được tải lên, giữ nguyên ảnh cũ
            $sql = "SELECT `image` FROM `customers` WHERE `id` = $id";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $image = $stmt->fetchColumn();
        }

        $sql = "UPDATE `customers` SET `name` = :name, `phone` = :phone, `address` = :address, `image` = :image WHERE `id` = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':name',$name);
        $stmt->bindParam(':phone',$phone);
        $stmt->bindParam(':address',$address);
        $stmt->bindParam(':image',$image);
        $stmt->bindParam(':id',$id);

        $stmt->execute();
        return true;
    }


    //Xoa du lieu
    public static function delete($id)
    {
        global $conn;
        $sql = "DELETE FROM `customers` WHERE `id` = $id";
        // Thuc thi SQL
        $conn->exec($sql);
        return true;
    }
}
