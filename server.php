<!-- 

# HOME DATABASE

$serverName = "localhost";
$dbName = "potebandens_dyreservice_db";
$dbusername = "root";
$dbpassword = "";

# LAPTOP DATABASE

$serverName = "localhost";
---- CHECK THIS ----
$dbName = "potebandens_dyreservice_db";
$dbusername = "root";
$dbpassword = "";

# WORK DATABASE

$serverName = "local.potebandens-dyreservice.dk";
$dbName = "potebandens_dyreservice_db";
$dbusername = "root";
$dbpassword = "root";

# DATABASE - TABLES

gallery
- id (INT AUTO_INCREMENT)
- image_link (VARCHAR 255)
- image_alt (VARCHAR 50)
- image_text (VARCHAR 100)

services
- id (INT AUTO_INCREMENT)
- service_name (VARCHAR 100)
- service_short_description (VARCHAR 100)
- service_description (VARCHAR 255)

users
- id (INT AUTO_INCREMENT)
- name (VARCHAR 50)
- username (VARCHAR 50)
- email (VARCHAR 100)
- password (VARCHAR 255)

-->