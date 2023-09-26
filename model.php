<?php
    class Model {
        private $db;
        public $dataArrays = [];

        public function __construct($db) {
            $this->db = $db;
        }

        public function updateOrInsert($tableName, $incrementField) {
            $conn = $this->db->conn;
            $currentDate = date("Y-m-d H:i:s");
            $checkQuery = "SELECT * FROM $tableName WHERE id = 1";
            $result = $conn->query($checkQuery);

            if ($result !== FALSE && $result->num_rows > 0) {
                $updateQuery = "UPDATE $tableName SET $incrementField = $incrementField + 1, date_time = '$currentDate' WHERE id = 1";
                if ($conn->query($updateQuery) === FALSE) {
                    error_log("Erreur lors de la mise à jour de $tableName : " . $conn->error, 0);
                }
            } else {
                $insertQuery = "INSERT INTO $tableName (id, $incrementField, date_time) VALUES (1, 1, '$currentDate')";
                if ($conn->query($insertQuery) === FALSE) {
                    error_log("Erreur lors de l'ajout de la ligne : " . $conn->error, 0);
                }
            }
        }

        public function getDataByTable($tableName) {
            global $model;
            $query = "SELECT * FROM $tableName WHERE id = 1";
            $result = $model->db->conn->query($query);

            if ($result !== FALSE && $result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $this->dataArrays[] = array(
                    'table' => $tableName,
                    'total' => $row['total'], 
                    'date' => $row['date_time'], 
                );
            }
        }

        public function getTotalByTable($tableName) {
            global $model;
            $query = "SELECT total FROM $tableName WHERE id = 1";
            $result = $model->db->conn->query($query);
        
            if ($result !== FALSE && $result->num_rows > 0) {
                $row = $result->fetch_assoc(); 
                return (string)$row['total'];
            }
            return 0;
        }


        public function sortData() {
            usort($this->dataArrays, function($a, $b) {
                return strtotime($b['date']) - strtotime($a['date']);
            });
        }
        
    }
?>