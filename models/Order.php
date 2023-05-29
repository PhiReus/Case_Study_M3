<?php
// Ket noi voi database
class Order
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
                $conditions[] = "(orders.order_date LIKE '%$s%' OR orders.total_amount LIKE '%$s%' OR orders.phone_id LIKE '%$s%' OR orders.customer_id LIKE '%$s%')";
            }

            if (!empty(trim($s1))) {
                $conditions[] = "orders.id LIKE '%$s1%'";
            }

            $conditionsString = implode(" OR ", $conditions);

            $sql = "SELECT orders.*, customers.name AS customer_name, phones.name AS phone_name
                    FROM orders
                    JOIN customers ON orders.customer_id = customers.id
                    JOIN phones ON orders.phone_id = phones.id";

            if (!empty($conditionsString)) {
                $sql .= " WHERE $conditionsString";
            }

            $sql .= " ORDER BY orders.id DESC";
        } else {
            $sql = "SELECT orders.*, customers.name AS customer_name, phones.name AS phone_name
                    FROM orders
                    JOIN customers ON orders.customer_id = customers.id
                    JOIN phones ON orders.phone_id = phones.id
                    ORDER BY orders.id DESC";
        }





        $ordersPerPage = 4;
        $current_page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $start_index = ($current_page - 1) * $ordersPerPage;

        $sql_count = "SELECT COUNT(*) AS total_records FROM orders";
        $stmt_count = $conn->query($sql_count);
        $total_records = $stmt_count->fetch(PDO::FETCH_ASSOC)['total_records'];

        $sql .= " LIMIT $start_index, $ordersPerPage";
        $stmt = $conn->query($sql);
        $orders = $stmt->fetchAll(PDO::FETCH_OBJ);

        $data = [
            'orders' => $orders,
            'total_records' => $total_records,
            'current_page' => $current_page,
            'orders_per_page' => $ordersPerPage
        ];

        // Trả về cho Model
        return $data;
    }


    // lay chi tiet 1 du lieu
    public static function find($id)
    {
        global $conn;
        $sql = "SELECT orders.*, customers.name AS customer_name, phones.name AS phone_name
                FROM orders
                JOIN customers ON orders.customer_id = customers.id
                JOIN phones ON orders.phone_id = phones.id
                WHERE orders.id = $id
                ORDER BY orders.id DESC";

        $stmt = $conn->query($sql);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $row = $stmt->fetch();
        return $row;

        // $sql = "SELECT orders.*, customers.name AS customer_name, phones.name AS phone_name
        // FROM orders
        // JOIN customers ON orders.customer_id = customers.id
        // JOIN phones ON orders.phone_id = phones.id
        // WHERE orders.id = :id
        // ORDER BY orders.id DESC";

        // $stmt = $conn->prepare($sql);
        // $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        // $stmt->execute();

        // $row = $stmt->fetch(PDO::FETCH_ASSOC);
        // return $row;
    }

    // Them moi du lieu
    public static function store($data)
    {

        global $conn;
        $order_date = $data['order_date'];
        $total_amount = $data['total_amount'];
        $phone_id = $data['phone_id'];
        $customer_id  = $data['customer_id'];

        $sql = "INSERT INTO `orders` 
            ( `order_date`, `total_amount`, `phone_id`,`customer_id`) 
            VALUES 
            ('$order_date','$total_amount','$phone_id','$customer_id')";
        //Thuc hien truy van
        $conn->exec($sql);
        return true;
    }

    public static function create()
    {
        global $conn;
        $sql = "SELECT * FROM `orders`";
        $stmt = $conn->query($sql);
        $row = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $row;
    }
    // Cap nhat du lieu
    public static function update($id, $data)
    {
        global $conn;
        $order_date = $data['order_date'];
        $total_amount = $data['total_amount'];
        $phone_id = $data['phone_id'];
        $customer_id  = $data['customer_id'];



        $sql = "UPDATE `orders` SET `order_date` = :order_date, `total_amount` = :total_amount, `phone_id` = :phone_id, `customer_id` = :customer_id WHERE `id` = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':order_date', $order_date);
        $stmt->bindParam(':total_amount', $total_amount);
        $stmt->bindParam(':phone_id', $phone_id);
        $stmt->bindParam(':customer_id', $customer_id);
        $stmt->bindParam(':id', $id);

        $stmt->execute();
        return true;
    }


    //Xoa du lieu
    public static function delete($id)
    {
        global $conn;
        $sql = "DELETE FROM `orders` WHERE `id` = $id";
        // Thuc thi SQL
        $conn->exec($sql);
        return true;
    }
}
