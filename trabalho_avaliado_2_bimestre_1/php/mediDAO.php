<?php
    include_once 'medi.php';
    class MediDao {
        private function dbconnect() {
            $banco = 'port=5432 dbname=farm user=postgres password=postgres';
            return pg_connect($banco);
        }
        public function add($medi) {
            $db = $this->dbconnect();
            $sql = 'insert into "medi" ("name", "producer", "control", "quant", "price") values ($1, $2, $3, $4, $5)';
            pg_query_params($db, $sql, array($medi->getName(), $medi->getProducer(), $medi->getControl(), $medi->getQuant(), $medi->getPrice()));
            pg_close($db);
            header('Location: ../');
        }
        public function delete($id) {
            $db = $this->dbconnect();
            $sql = 'delete from "medi" where id = $1';
            pg_query_params($db, $sql, array($id));
            pg_close($db);
            header('Location: ../');
        }
        public function alt($medi) {
            $db = $this->dbconnect();
            $sql = 'update "medi" set "name" = $1, "producer" = $2, "control" = $3, "quant" = $4, "price" = $5 where id = '.$medi->getId();
            pg_query_params($db, $sql, array($medi->getName(), $medi->getProducer(), $medi->getcontrol(), $medi->getquant(), $medi->getPrice())); 
            pg_close($db);
            header('Location: ../');
        }
        public function search($id){
            $db = $this->dbconnect();
            $sql = 'select * from "medi" where "id" = $1';
            $res = pg_query_params($db, $sql, array($id));
            $medi = array();
            while($mt = pg_fetch_assoc($res)) {
                $med = new Medi($mt['name'], $mt['producer'], $mt['control'], $mt['quant'], $mt['price']);
                $med->setId($mt['id']);
                array_push($medi, $med);
            }
            pg_close($db);
            return $medi[0];
        }
        public function list($name, $type = 0, $order = 0){
            $db = $this->dbconnect();
            $sql = 'select * from "medi" where "name" ILIKE '."'%".$name."%'";
            if ($type == "1") {
                $sql = $sql.' and "control" = '."'S'";
            }
            if ($type == "2") {
                $sql = $sql.' and "quant" < 5';
            }
            if ($order == "1") {
                $sql = $sql.' ORDER BY "price" ASC';
            }
            if ($order == "2") {
                $sql = $sql.' ORDER BY "quant" ASC';
            }
            $res = pg_query_params($db, $sql, array());
            $medi = array();
            while($mt = pg_fetch_assoc($res)) {
                $med = new Medi($mt['name'], $mt['producer'], $mt['control'], $mt['quant'], $mt['price']);
                $med->setId($mt['id']);
                array_push($medi, $med);
            }
            pg_close($db);
            return $medi;
        }
    }
?>