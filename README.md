Shoe Store

Shoe Store App, 07/21/17

By Jacob Ruleaux

Description;

The Shoe Store app will allow a user to enter a new store name as well as a shoe brand name. This data will be stored and viewed. The user will be able to add, edit, or delete either of these datatypes.

Setup/Installation Requirements

Open GitHub site on your browser: https://github.com/jakeruleaux/shoe-store

Select the dropdown (green box) "Clone or download"

Copy the link for the GitHub repository

Open Terminal on your computer

In Terminal, perform the following steps:

Type 'cd desktop' and press enter.

Type 'git clone' then copy the repository link and press enter.

Type 'cd shoe-store' to access the path on your terminal.

Type 'localhost:8888/phpmyadmin' and select the import tab near the top of the screen. In the import tab browse for 'shoes.sql.zip'.

Select this file and click the 'go' button at the bottom.

In Terminal type /Applications/MAMP/Library/bin/mysql --host=localhost -uroot -proot.

In mysql type 'SHOW DATABASES;' to confirm that you have the 'shoes' database.

In mysql type 'USE shoes;'.

In your Address Bar type 'localhost:8888' to view app.

The paths in MAMP may need to be adjusted. In MAMP click the 'web server' tab. Make sure you have the appropriate document root path, ex: 'User/File-directory/file/web'.

Known Bugs

The program requires a localhost to function. It was designed with MAMP in mind. Similar programs may support it.

Support and contact details

Feel free to contact the author with questions or concerns at jakeruleaux@hotmail.com

Technologies Used
The application relies on MAMP, PHP, Silex, Twig with some Bootstrap for styling and basic HTML for display.

License
MIT

Copyright (c) 2017 Jacob Ruleaux
