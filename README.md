* <h1>Shoe Store</h1>

* Shoe Store App, 07/21/17

* By Jacob Ruleaux

* <h2>Description;</h2>

The Shoe Store app will allow a user to enter a new store name as well as a shoe brand name. This data will be stored and viewed. The user will be able to add, edit, or delete either of these datatypes.

* <h2>CRUD for the php model;</h2>

* <h4>C:</h4> ...$executed = $GLOBALS['DB']->exec("INSERT INTO brands (brand_name, price) VALUES ('{$this->getBrandName()}',...

* <h4>R:</h4> ...$returned_stores = $GLOBALS['DB']->query("SELECT stores.* FROM brands...

* <h4>U:</h4> ...$executed = $GLOBALS['DB']->exec("UPDATE brands SET brand_name = '{$new_brand_name}' WHERE id = {$this->getId()};");...

* <h4>D:</h4> ...  $executed = $GLOBALS['DB']->exec("DELETE FROM brands WHERE id = {$this->getId()};");...

* <h2>Setup/Installation Requirements</h2>

* The program requires MAMP or a similair program to run.

* The program requires Composer.

* Open GitHub site on your browser: https://github.com/jakeruleaux/shoe-store

* Select the dropdown (green box) "Clone or download"

* Copy the link for the GitHub repository

* Open Terminal on your computer

* In Terminal, perform the following steps:

* Type 'cd desktop' and press enter.

* Type 'git clone' then copy the repository link and press enter.

* Type 'cd shoe-store' to access the path on your terminal.

* To install Composer type 'composer install' into your terminal.

* Type 'localhost:8888/phpmyadmin' and select the import tab near the top of the screen. In the import tab browse for 'shoes.sql.zip'.

* Select this file and click the 'go' button at the bottom.

* In Terminal type /Applications/MAMP/Library/bin/mysql --host=localhost -uroot -proot.

* In mysql type 'SHOW DATABASES;' to confirm that you have the 'shoes' database.

* In mysql type 'USE shoes;'.

* In your Address Bar type 'localhost:8888' to view app.

* The paths in MAMP may need to be adjusted. In MAMP click the 'web server' tab. Make sure you have the appropriate document root path, ex: 'User/File-directory/file/web'.

* <h2>Known Bugs</h2>

The program requires a localhost to function. It was designed with MAMP in mind. Similar programs may support it.

* <h2>Support and contact details</h2>

Feel free to contact the author with questions or concerns at jakeruleaux@hotmail.com

* <h2>Technologies Used</h2>
The application relies on MAMP, PHP, Silex, Twig with some Bootstrap for styling and basic HTML for display.

* <h2>License</h2>
MIT

* Copyright (c) 2017 Jacob Ruleaux
