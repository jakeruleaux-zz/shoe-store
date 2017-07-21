<?php

    class Store
    {

        private $store_name;
        private $address;
        private $id;

        function __construct($store_name, $address, $id = null)
        {
            $this->store_name = $store_name;
            $this->address = $address;
            $this->id = $id;
        }

        function getStoreName()
        {
            return $this->store_name;
        }

        function setStoreName($new_store_name)
        {
            $this->store_name = (string) $new_store_name;
        }

        function getAddress()
        {
            return $this->address;
        }
        function setAddress($new_address)
        {
            $this->address = (string) $new_address;
        }
        function getId()
        {
            return $this->id;
        }

        function save()
       {
           $executed = $GLOBALS['DB']->exec("INSERT INTO store (store_name, address) VALUES ('{$this->getStoreName()}', '{$this->getAddress()}');");
           if ($executed) {
               $this->id = $GLOBALS['DB']->lastInsertId();
               return true;
           } else {
               return false;
           }
       }

        static function getAll()
        {
            $returned_stores = $GLOBALS['DB']->query("SELECT * FROM store;");
            $stores = array();
            foreach($returned_stores as $store) {
                $store_name = $store['store_name'];
                $address = $store['address'];
                $id = $store['id'];
                $new_store =  new Store($store_name, $address, $id);
                array_push($stores, $new_store);
            }
            return $stores;
        }

        static function deleteAll()
        {
            $executed = $GLOBALS['DB']->exec("DELETE FROM store;");
            if ($executed) {
                return true;
            } else {
                return false;
            }
        }
    }
 ?>
