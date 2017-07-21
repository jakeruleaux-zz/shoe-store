<?php
    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */
    require_once "src/Store.php";
    // require_once "src/Brand.php";

    $server = 'mysql:host=localhost:8889;dbname=shoe_store_test';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);

    class StoreTest extends PHPUnit_Framework_TestCase
    {
        protected function tearDown()
               {
                 Store::deleteAll();
                //  Brand::deleteAll();
               }

        function testGetStoreName()
        {
            //Arrange
            $store_name = "Shoes";
            $address = "13 nw";
            $test_store = new Store($store_name, $address);
            //Act
            $result = $test_store->getStoreName();
            //Assert
            $this->assertEquals($store_name, $result);
        }

        function testGetAddress()
        {
            //Arrange
            $store_name = "Shoes";
            $address = "13 nw";
            $test_store = new Store($store_name, $address);
            //Act
            $result = $test_store->getAddress();
            //Assert
            $this->assertEquals($address, $result);
        }

        function testGetId()
        {
            //Arrange
            $store_name = "Shoe";
            $address = "13 nw";
            $test_store = new Store($store_name, $address);
            $test_store->save();
            //Act
            $result = $test_store->getId();
            //Assert
            $this->assertEquals(true, is_numeric($result));
        }

        function testSave()
       {
           //Arrange
           $store_name = "Shoes";
           $address = "13 nw";
           $test_store = new Store($store_name, $address);
           //Act
           $executed = $test_store->save();
           //Assert
           $this->assertTrue($executed, "Theres no store in database!!!!");
       }

        function testGetAll()
        {
          //Arrange
            $store_name = "Shoe";
            $address = "12";
            $test_store = new Store($store_name, $address);
            $test_store->save();

            $store_name_2 = "Shoes two";
            $address_2 = "11";
            $test_store_2 = new Store($store_name_2, $address_2);
            $test_store_2->save();
            //Act
            $result = Store::getAll();
            //Assert
            $this->assertEquals([$test_store, $test_store_2], $result);
        }

        function testDeleteAll()
        {
            //Arrange
            $store_name = "Shoe";
            $address = "12";
            $test_store = new Store($store_name, $address);
            $test_student->save();

            $store_name_2 = "Shoes two";
            $address_2 = "11";
            $test_student_2 = new Store($store_name_2, $address_2);
            $test_student_2->save();
            //Act
            Store::deleteAll();
            $result = Store::getAll();
            //Assert
            $this->assertEquals([], $result);
        }

        function testFind()
        {
            //Arrange
            $store_name = "Shoe";
            $address = "12";
            $test_store = new Store($store_name, $address);
            $test_store->save();

            $store_name_2 = "Shoes two";
            $address_2 = "11";
            $test_store_2 = new Store($store_name_2, $address_2);
            $test_store_2->save();
            //Act
            $result = Store::find($test_store->getId());
            //Assert
            $this->assertEquals($test_store, $result);
        }

        function testUpdate()
        {
            //Arrange
            $store_name = "Shoe";
            $address = "12";
            $test_store = new Store($store_name, $address);
            $test_store->save();
            $new_store_name = "Shoes two";
            //Act
            $test_store->update($new_store_name);
            //Assert
            $this->assertEquals("Shoes two", $test_store->getStoreName());
        }

        function testDelete()
        {
            //Arrange
            $store_name = "Shoe";
            $address = "12";
            $test_store = new Store($store_name, $address);
            $test_store->save();

            $store_name_2 = "Shoes two";
            $address_2 = "11";
            $test_store_2 = new Store($store_name_2, $address_2);
            $test_store_2->save();
            //Act
            $test_store->delete();
            //Assert
            $this->assertEquals([$test_store_2], Store::getAll());
        }

        function testGetBrands()
        {
           //Arrange
           $store_name = "Shoe";
           $address = "12"
           $id = null;
           $test_store = new Store($name, $address, $id);
           $test_store->save();

           $brand_name = "Nike";
           $price = "10";
           $id = null;
           $test_brand = new Brand($brand_name, $price, $id);
           $test_brand->save();

           $brand_name2 = "Puma";
           $price_2 = "12";
           $id_2 = null;
           $test_brand2 = new Brand($brand_name2, $price_2, $id_2);
           $test_brand2->save();
           //Act
           $test_store->addBrand($test_brand);
           $test_store->addBrand($test_brand2);
           //Assert
           $this->assertEquals($test_store->getBrands(), [$test_brand, $test_brand2]);
        }

        function testAddBrand()
        {
            //Arrange
            $store_name = "Shoe";
            $id = null;
            $test_store = new Store($store_name, $id);
            $test_store->save();

            $brand_name = "Bio";
            $price = "B101";
            $id = null;
            $test_brand = new Brand($course_name, $price, $id);
            $test_brand->save();
            //Act
            $test_store->addBrand($test_brand);
            //Assert
            $this->assertEquals($test_store->getBrands(), [$test_brand]);
        }



    }
?>
