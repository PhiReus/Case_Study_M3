<?php
// Ket noi voi DB
require_once 'db.php';
?>
<?php include_once 'includes/header.php'; ?>

        
        <?php
        // Client gui yeu cau den  ProductController, toi PT index, de lay toan bo du lieu ra

        /*
        index.php?controller=product&action=index
        index.php?controller=product&action=create
        index.php?controller=product&action=edit&id=5
        index.php?controller=product&action=show&id=5

        index.php?controller=customer&action=index
        */
        
        $action = isset($_GET['action']) ? $_GET['action'] : 'index';
        $controller = isset($_GET['controller']) ? $_GET['controller'] : 'phone';

        switch ($controller) {
            case 'phone':
                require_once 'controllers/PhoneController.php';
                $objController = new PhoneController();
                break;
            case 'brand':
                require_once 'controllers/BrandController.php';
                $objController = new BrandController();
                break;
            case 'customer':
                require_once 'controllers/CustomerController.php';
                $objController = new CustomerController();
                break;
            case 'order':
                require_once 'controllers/OrderController.php';
                $objController = new OrderController();
                break;    
            default:
                # code...
                break;
        }
        switch ($action) {
            case 'index':
                $objController->index();
                break;
            case 'create':
                $objController->create();
                break;
            case 'store':
                $objController->store();
                break;
            case 'edit':
                $objController->edit();
                break;
            case 'update':
                $objController->update();
                break;
            case 'show':
                $objController->show();
                break;
            case 'destroy':
                $objController->destroy();
                break;
            default:
                # code...
                break;
        }
        ?>



<?php include_once 'includes/footer.php'; ?>