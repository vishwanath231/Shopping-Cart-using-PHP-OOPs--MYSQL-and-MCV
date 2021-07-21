<?php

    class Database {

        private $DB_HOST = 'localhost';
        private $DB_USERNAME = 'root';
        private $DB_PASSWORD = '';
        private $DB_NAME = 'shopping_cart';
        private $db_conn;

        public function connect() {

            $this->db_conn = null;

            // set DNS --> Data Source Name
            $DNS = 'mysql:host=' . $this->DB_HOST . '; dbname=' . $this->DB_NAME;

            // set PDO --> PHP Data Object
            try {
                $this->db_conn = new PDO($DNS, $this->DB_USERNAME, $this->DB_PASSWORD);
                $this->db_conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            } catch (PDOException $e) {
                echo "Connection Error :" .$e->getMessage();
            }

            return $this->db_conn;
        }

    }
    

?>