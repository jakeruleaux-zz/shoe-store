<?php
    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */
    require_once "src/Brand.php";
    require_once "src/Store.php";

    $server = 'mysql:host=localhost:8889;dbname=shoes_test';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);

    class BrandTest extends PHPUnit_Framework_TestCase
    {
        protected function tearDown()
               {
                 Brand::deleteAll();
                 Store::deleteAll();
               }

        function testGetBrandName()
        {
            //Arrange
            $brand_name = "Nike";
            $price = "11";
            $test_store = new Brand($brand_name, $price);
            //Act
            $result = $test_store->getBrandName();
            //Assert
            $this->assertEquals($brand_name, $result);
        }

        function testGetPrice()
        {
            //Arrange
            $brand_name = "Nike";
            $price = "11";
            $test_brand = new Brand($brand_name, $price);
            //Act
            $result = $test_brand->getPrice();
            //Assert
            $this->assertEquals($price, $result);
        }

        function testGetId()
        {
            //Arrange
            $brand_name = "Nike";
            $price = "11";
            $test_brand = new Store($brand_name, $price);
            $test_brand->save();
            //Act
            $result = $test_brand->getId();
            //Assert
            $this->assertEquals(true, is_numeric($result));
        }

        function testSave()
       {
           //Arrange
           $brand_name = "Nike";
           $price = "11";
           $test_brand = new Brand($brand_name, $price);
           //Act
           $executed = $test_brand->save();
           //Assert
           $this->assertTrue($executed, "Theres no shoe brands in database!!!!");
       }

        function testGetAll()
        {
          //Arrange
            $brand_name = "Price";
            $price = "12";
            $test_brand = new Brand($brand_name, $price);
            $test_brand->save();

            $brand_name_2 = "Puma";
            $price_2 = "11";
            $test_brand_2 = new Brand($brand_name_2, $price_2);
            $test_brand_2->save();
            //Act
            $result = Brand::getAll();
            //Assert
            $this->assertEquals([$test_brand, $test_brand_2], $result);
        }

        function testDeleteAll()
        {
            //Arrange
            $brand_name = "Nike";
            $price = "11";
            $test_brand = new Brand($brand_name, $price);
            $test_brand->save();

            $brand_name_2 = "Puma";
            $price_2 = "12";
            $test_brand_2 = new Brand($brand_name_2, $price_2);
            $test_brand_2->save();
            //Act
            Brand::deleteAll();
            $result = Brand::getAll();
            //Assert
            $this->assertEquals([], $result);
        }

        function testFind()
        {
            //Arrange
            $brand_name = "Nike";
            $price = "11";
            $test_brand = new Brand($brand_name, $price);
            $test_brand->save();

            $brand_name_2 = "Puma";
            $price_2 = "12";
            $test_brand_2 = new Brand($brand_name_2, $price_2);
            $test_brand_2->save();
            //Act
            $result = Brand::find($test_brand->getId());
            //Assert
            $this->assertEquals($test_brand, $result);
        }

        function testUpdate()
        {
            //Arrange
            $brand_name = "Nike";
            $price = "11";
            $test_brand = new Brand($brand_name, $price);
            $test_brand->save();
            $new_brand_name = "Puma";
            //Act
            $test_brand->update($new_brand_name);
            //Assert
            $this->assertEquals("Puma", $test_brand->getBrandName());
        }

        function testDelete()
        {
            //Arrange
            $brand_name = "Nike";
            $price = "11";
            $test_brand = new Brand($brand_name, $price);
            $test_brand->save();

            $brand_name_2 = "Puma";
            $price_2 = "12";
            $test_brand_2 = new Brand($brand_name_2, $price_2);
            $test_brand_2->save();
            //Act
            $test_brand->delete();
            //Assert
            $this->assertEquals([$test_brand_2], Brand::getAll());
        }

        function testGetStores()
        {
           //Arrange
           $brand_name = "Nike";
           $price = "12";
           $id = null;
           $test_brand = new Brand($brand_name, $price, $id);
           $test_brand->save();

           $store_name = "Shoe";
           $address = "10 nw";
           $id = null;
           $test_store = new Store($store_name, $address, $id);
           $test_store->save();

           $store_name_2 = "Shoes two";
           $address_2 = "12 nw";
           $id_2 = null;
           $test_store_2 = new Store($store_name_2, $address_2, $id_2);
           $test_store_2->save();
           //Act
           $test_brand->addStore($test_store);
           $test_brand->addStore($test_store_2);
           //Assert
           $this->assertEquals($test_brand->getStores(), [$test_store, $test_store_2]);
        }

        function testAddStore()
        {
            //Arrange
            $brand_name = "Nike";
            $price = "11";
            $id = null;
            $test_brand = new Brand($brand_name, $price, $id);
            $test_brand->save();

            $store_name = "Shoe";
            $address = "10 nw";
            $id = null;
            $test_store = new Store($store_name, $address, $id);
            $test_store->save();
            //Act
            $test_brand->addStore($test_store);
            //Assert
            $this->assertEquals($test_brand->getStores(), [$test_store]);
        }



    }
?>
