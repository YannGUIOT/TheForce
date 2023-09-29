<?php
    class Model {
        private $db;
        public $dataArrays = [];

        public function __construct($db) {
            $this->db = $db;
        }

        public function insertData($tableName) {
            $conn = $this->db->conn;
            $currentDate = date("Y-m-d H:i:s");
            $insertQuery = "INSERT INTO $tableName (date_time) VALUES ('$currentDate')";
        
            if ($conn->query($insertQuery) === FALSE) {
                error_log("Erreur lors de l'ajout de la ligne : " . $conn->error, 0);
            }
        }
        
        public function getDataByTable($tableName) {
            global $model;
            $query = "SELECT * FROM $tableName";
            $result = $model->db->conn->query($query);
        
            if ($result !== FALSE && $result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $this->dataArrays[] = array(
                        'table' => $tableName,
                        'id' => $row['id'], 
                        'date' => $row['date_time'], 
                    );
                }
            }
        }
        
        public function getTotalByTable($tableName) {
            global $model;
            $query = "SELECT COUNT(*) as total FROM $tableName";
            $result = $model->db->conn->query($query);
        
            if ($result !== FALSE) {
                $row = $result->fetch_assoc();
                return $row['total'];
            }
        }

        public function sortData() {
            usort($this->dataArrays, function($a, $b) {
                return strtotime($b['date']) - strtotime($a['date']);
            });
        }
        
    }
?>