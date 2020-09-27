# catalyst-test
There are three script available in this repository namely user_upload.php, dlovescatalystclass.php and foobar.php. These all scripts are made according to use by the comaand line interface.

The aim of user_upload.php file is parsing the CSV file and inserting data into the database. The dlovescatalystclass contains all the methods to perform csv parsing, database operation and email validation.

Assumptions:

For windows: XAMPP server with PHP 7.2 or higher, PHP MySQL extension, Create Database "catalyst_test" Using PhpMyAdmin.

For Ubuntu Instance:

Install web server: sudo apt-get install apache2
Install PHP: sudo apt-get install php7.2 libapache2-mod-php7.2
Install PHP MySQL extension: sudo apt-get install php7.2-mysql
Restart Server: sudo service apache2 restart
Login to MySQL and create database "catalyst_test": mysql -u root -p

Below is the simple usage example.

Options:

-f "Name of the CSV file to be parsed with full path"
-h "MySQL Host"
-u "MySQL User"
-p "MySQL Password"
--file "Parse the CSV and inserts data into database"
--create_table "Create MySQL users table"
--dry_run "Run script without inserting into database"
--help "Help"

Example: php user_upload.php --file -f CSVFilePath -h MySQL Host -u MySQL User -p MySQL Password
Example: php user_upload.php --dry_run -f CSVFilePath -h MySQL Host -u MySQL User -p MySQL Password
Example: php user_upload.php --create_table -h MySQL Host -u MySQL User -p MySQL Password
Example: php user_upload.php --help