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
    }
 ?>
