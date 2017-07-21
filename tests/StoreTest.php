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
          $test_student = new Store($store_name, $address);
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



    }
?>
