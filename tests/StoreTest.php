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
        // protected function tearDown()
        //        {
        //          Author::deleteAll();
        //          Book::deleteAll();
        //        }

        function testGetStoreName()
        {
            //Arrange
            $store_name = "Shoes";
            $test_store = new Store($store_name);
            //Act
            $result = $test_store->getStoreName();
            //Assert
            $this->assertEquals($store_name, $result);
        }

        function testGetId()
        {
            //Arrange
            $store_name = "Shoe";
            $test_store = new Store($store_name);
            $test_store->save();
            //Act
            $result = $test_store->getId();
            //Assert
            $this->assertEquals(true, is_numeric($result));
        }
