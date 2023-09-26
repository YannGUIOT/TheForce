<?php
    include_once 'database.php';
    include_once 'model.php';
    include_once 'view.php';

    class Controller {
        private $db;
        private $model;

        public $totalDS=0;
        public $totalJ=0;

        public function __construct() {
            $this->db = new Database();
            $this->model = new Model($this->db);
            $this->view = new View();
        }

        public function addData($dataType) {
            $this->model->updateOrInsert($dataType, 'total');
        }
        
        public function close() {
            $this->db->closeConnection();
        }

        public function processRequest() {
            $this->model->getDataByTable("DarkStar");
            $this->model->getDataByTable("Jedi");
        }

        public function displayDataInTable() {
            $this->model->sortData();
            $this->view->displayData($this->model->dataArrays);
            $this->totalDS = $this->model->getTotalByTable('DarkStar');
            $this->totalJ = $this->model->getTotalByTable('Jedi');
        }
    }

    $controller = new Controller();

    if (isset($_POST['addDarkStar']) || isset($_POST['addJedi'])) {
        $dataType = isset($_POST['addDarkStar']) ? 'DarkStar' : 'Jedi';
        $controller->addData($dataType);
        header('Location: index.php');
        exit;
    }

    $controller->close();
?>

