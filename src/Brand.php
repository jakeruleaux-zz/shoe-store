<?php

    class Brand
    {

        private $brand_name;
        private $price;
        private $id;

        function __construct($brand_name, $price, $id = null)
        {
            $this->brand_name = $brand_name;
            $this->price = $price;
            $this->id = $id;
        }

        function getBrandName()
        {
            return $this->ucfirst(strtolower($brand_name);
        }

        function setBrandName($new_brand_name)
        {
            $this->brand_name = $new_brand_name;
        }

        function getPrice()
        {
            return $this->price;
        }

        function setPrice($new_price)
        {
            $this->price = $new_price;
        }

        function getId()
        {
            return $this->id;
        }

        function save()
       {
           $executed = $GLOBALS['DB']->exec("INSERT INTO brands (brand_name, price) VALUES ('{$this->getBrandName()}', '{$this->getPrice()}');");
           if ($executed) {
               $this->id = $GLOBALS['DB']->lastInsertId();
               return true;
           } else {
               return false;
           }
       }

        static function getAll()
        {
            $returned_brands = $GLOBALS['DB']->query("SELECT * FROM brands;");
            $brands = array();
            foreach($returned_brands as $brand) {
                $brand_name = $brand['brand_name'];
                $price = $brand['price'];
                $id = $brand['id'];
                $new_brand =  new Brand($brand_name, $price, $id);
                array_push($brands, $new_brand);
            }
            return $brands;
        }

        static function deleteAll()
        {
            $executed = $GLOBALS['DB']->exec("DELETE FROM brands;");
            if ($executed) {
                return true;
            } else {
                return false;
            }
        }

        static function find($search_id)
        {
            $found_brand = null;
            $returned_brand = $GLOBALS['DB']->prepare("SELECT * FROM brands WHERE id = :id;");
            $returned_brand->bindParam(':id', $search_id, PDO::PARAM_STR);
            $returned_brand->execute();
            foreach ($returned_brand as $brand) {
                $brand_name = $brand['brand_name'];
                $price = $brand['price'];
                $id = $brand['id'];
                if ($id == $search_id) {
                    $found_brand = new Brand($brand_name, $price, $id);
                }
            }
            return $found_brand;
        }

        function update($new_brand_name)
        {
            $executed = $GLOBALS['DB']->exec("UPDATE brands SET brand_name = '{$new_brand_name}' WHERE id = {$this->getId()};");
            if ($executed) {
               $this->setBrandName($new_brand_name);
               return true;
            } else {
               return false;
            }
        }

        function updatePrice($new_price)
        {
            $executed = $GLOBALS['DB']->exec("UPDATE brands SET price = '{$new_price}' WHERE id = {$this->getId()};");
            if ($executed) {
               $this->setPrice($new_price);
               return true;
            } else {
               return false;
            }
        }

        function delete()
        {
            $executed = $GLOBALS['DB']->exec("DELETE FROM brands WHERE id = {$this->getId()};");
             if (!$executed) {
                 return false;
             }
             $executed = $GLOBALS['DB']->exec("DELETE FROM stores_brands WHERE brand_id = {$this->getId()};");
             if (!$executed) {
                 return false;
             } else {
                 return true;
             }
        }

        function getStores()
        {
            $returned_stores = $GLOBALS['DB']->query("SELECT stores.* FROM brands
                JOIN stores_brands ON (stores_brands.brand_id = brands.id)
                JOIN stores ON (stores.id = stores_brands.store_id)
                WHERE brands.id = {$this->getId()};");
            $stores = array();
            foreach ($returned_stores as $store) {
                $store_name = $store['store_name'];
                $address = $store['address'];
                $id = $store['id'];
                $new_store = new Store($store_name, $address, $id);
                array_push($stores, $new_store);
            }
            return $stores;
        }

        function addStore($store)
        {
            $executed = $GLOBALS['DB']->exec("INSERT INTO stores_brands (brand_id, store_id) VALUES ({$this->getId()}, {$store->getId()});");
            if ($executed) {
                return true;
            } else {
                return false;
            }
        }
    }
 ?>
