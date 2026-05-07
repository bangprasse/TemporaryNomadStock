<?php

$page = $_GET['page'] ?? 'home';

switch ($page) {

    case 'inventory':

        require '../app/controllers/InventoryController.php';

        $controller = new InventoryController();
        $controller->index();

        break;

    default:

        require '../app/controllers/HomeController.php';

        $controller = new HomeController();
        $controller->index();

        break;
}
