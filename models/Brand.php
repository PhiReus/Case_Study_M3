<?php
// Ket noi voi database
class Brand
{
    // lay ta ca du lieu
    public static function all()
    {
        global $conn;
        if ((isset($_GET["a"]) && !empty(trim($_GET["a"]))) || (isset($_GET["a1"]) && !empty(trim($_GET["a1"])))) {
            $s = isset($_GET["a"]) ? $_GET["a"] : "";
            $s1 = isset($_GET["a1"]) ? $_GET["a1"] : "";
            $conditions = [];

            if (!empty(trim($s))) {
                $conditions[] = "(brands.name LIKE '%$s%')";
            }

            if (!empty(trim($s1))) {
                $conditions[] = "(brands.id LIKE '%$s1%')";
            }

            $conditionsString = implode(" OR ", $conditions);

            $sql = "SELECT * FROM `brands`";

            if (!empty($conditionsString)) {
                $sql .= " WHERE $conditionsString";
            }

            $sql .= " ORDER BY id DESC";
        } else {
            $sql = "SELECT * FROM `brands` ORDER BY id DESC";
        }

        $brandsPerPage = 4;
        $current_page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $start_index = ($current_page - 1) * $brandsPerPage;

        $sql_count = "SELECT COUNT(*) AS total_records FROM brands";
        $stmt_count = $conn->query($sql_count);
        $total_records = $stmt_count->fetch(PDO::FETCH_ASSOC)['total_records'];

        $sql .= " LIMIT $start_index, $brandsPerPage";
        $stmt = $conn->query($sql);
        $brands = $stmt->fetchAll(PDO::FETCH_OBJ);
        // var_dump($brands);
        $data = [
            'brands' => $brands,
            'total_records' => $total_records,
            'current_page' => $current_page,
            'brands_per_page' => $brandsPerPage
        ];

        // Tra ve cho Model
        return $data;
    }
    public static function create()
    {
        global $conn;
        $sql = "SELECT * FROM `brands`";
        $stmt = $conn->query($sql);
        $row = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $row;
    }
    // lay chi tiet 1 du lieu
    public static function find($id)
    {
        global $conn;
        $sql = "SELECT * FROM `brands` WHERE id = $id";
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
        // $image = $data['image'];

        $sql = "INSERT INTO `brands` 
        ( `name`) 
        VALUES 
        ('$name')";
        //Thuc hien truy van
        $conn->exec($sql);
        return true;
    }

    // Cap nhat du lieu
    public static function update($id, $data)
    {
        global $conn;
        $name = $data['name'];

        $sql = "UPDATE `brands` SET `name` = :name WHERE `id` = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':id', $id);

        $stmt->execute();
        return true;
    }



    //Xoa du lieu
    public static function delete($id)
    {
        global $conn;
        $sql = "DELETE FROM `brands` WHERE `id` = $id";
        // Thuc thi SQL
        $conn->exec($sql);
        return true;
    }
}
