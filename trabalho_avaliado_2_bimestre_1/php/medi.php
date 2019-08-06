<?php
    class Medi{
        private $id;
        private $name;
        private $producer;
        private $control;
        private $quant;
        private $price;
        public function __construct($name, $producer, $control, $quant, $price){
            $this->name = $name;
            $this->producer = $producer;
            $this->control = $control;
            $this->quant = $quant;
            $this->price = $price;
        }
        public function getId(){
            return $this->id;
        }
        public function getName(){
            return $this->name;
        }
        public function getProducer(){
            return $this->producer;
        }
        public function getControl(){
            return $this->control;
        }
        public function getQuant(){
            return $this->quant;
        }
        public function getPrice(){
            return $this->price;
        }
        public function setProducer($producer){
            $this->producer = $producer;
        }
        public function setControl($control){
            $this->control = $control;
        }
        public function setName($name){
            $this->name = $name;
        }
        public function setId($id){
            $this->id = $id;
        }
        public function setQuant($quant){
            $this->quant = $quant;
        }
        public function setPrice($price){
            $this->price = $price;
        }
    }
?>