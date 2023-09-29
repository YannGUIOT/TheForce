<?php
    include_once 'database.php';
    include_once 'model.php';
    include_once 'view.php';

    class Controller {
        private $db;
        private $model;
        private $view;

        public $totalDS;
        public $totalJ;

        public function __construct($db, $model, $view) {
            $this->db = $db;
            $this->model = $model;
            $this->view = $view;
        }

        public function addData($dataType) {
            $this->model->insertData($dataType);
        }
        
        public function close() {
            $this->db->closeConnection();
        }

        public function processRequest() {  
            $this->model->getDataByTable("DarkSide");
            $this->model->getDataByTable("Jedi");
            
            $this->totalDS = $this->model->getTotalByTable('DarkSide');
            $this->totalJ = $this->model->getTotalByTable('Jedi');
        }

        public function globalPage() {
            $this->model->sortData();
            $this->view->displayGlobalPage($this->totalDS, $this->totalJ, $this->model->dataArrays);
        }

        public function getTotalArray() {
            return array('totalDS' => $this->totalDS, 'totalJ' => $this->totalJ);
        }
    }
?>



