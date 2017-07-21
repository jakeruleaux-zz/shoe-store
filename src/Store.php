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
           $executed = $GLOBALS['DB']->exec("INSERT INTO stores (store_name, address) VALUES ('{$this->getStoreName()}', '{$this->getAddress()}');");
           if ($executed) {
               $this->id = $GLOBALS['DB']->lastInsertId();
               return true;
           } else {
               return false;
           }
       }

        static function getAll()
        {
            $returned_stores = $GLOBALS['DB']->query("SELECT * FROM stores;");
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
            $executed = $GLOBALS['DB']->exec("DELETE FROM stores;");
            if ($executed) {
                return true;
            } else {
                return false;
            }
        }

        static function find($search_id)
        {
            $returned_stores = $GLOBALS['DB']->prepare("SELECT * FROM stores WHERE id = :id");
            $returned_stores->bindParam(':id', $search_id, PDO::PARAM_STR);
            $returned_stores->execute();
            foreach ($returned_stores as $store) {
             $store_name = $store['store_name'];
             $address = $store['address'];
             $id = $store['id'];
             if ($id == $search_id) {
                 $found_store = new Store($store_name, $address, $id);
                }
            }
            return $found_store;
        }

        function update($new_store_name)
        {
            $executed = $GLOBALS['DB']->exec("UPDATE stores SET store_name = '{$new_store_name}' WHERE id = {$this->getId()};");
            if ($executed) {
            $this->setStoreName($new_store_name);
            return true;
            } else {
            return false;
            }
        }

       function delete()
       {
           $executed = $GLOBALS['DB']->exec("DELETE FROM stores WHERE id = {$this->getId()};");
           if (!$executed) {
               return false;
           }
           $executed = $GLOBALS['DB']->exec("DELETE FROM stores_brands WHERE store_id = {$this->getId()};");
           if (!$executed) {
               return false;
           } else {
               return true;
           }
       }
       function getBrands()
       {
           $returned_brands = $GLOBALS['DB']->query("SELECT brands.* FROM stores
               JOIN stores_brands ON (stores_brands.store_id = stores.id)
               JOIN brands ON (brands.id = stores_brands.brand_id)
               WHERE stores.id = {$this->getId()};");
           $brands = array();
           foreach ($returned_brands as $brand) {
               $brand_name = $brand['brand_name'];
               $price = $brand['price'];
               $id = $brand['id'];
               $new_brand = new Brand($brand_name, $price, $id);
               array_push($brands, $new_brand);
           }
           return $brands;
       }
       function addBrand($brand)
       {
           $executed = $GLOBALS['DB']->exec("INSERT INTO stores_brands (store_id, brand_id) VALUES ({$this->getId()}, {$brand->getId()});");
           if ($executed) {
               return true;
           } else {
               return false;
           }
       }
    }
 ?>
