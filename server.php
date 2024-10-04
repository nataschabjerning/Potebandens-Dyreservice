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

about
- id (INT AUTO_INCREMENT)   ------ NOT NULL
- about_image_link (VARCHAR 255)
- about_image_alt (VARCHAR 255)
- about_name (VARCHAR 100)  ------ NOT NULL
- about_text_one (VARCHAR 100)  
- about_text_two (VARCHAR 255)
- about_text_three (VARCHAR 255)
- about_text_four (VARCHAR 255)
- about_text_five (VARCHAR 255)
- about_text_six (VARCHAR 255)
- about_text_seven (VARCHAR 255)

gallery
- id (INT AUTO_INCREMENT)   ------ NOT NULL
- image_link (VARCHAR 255)  ------ NOT NULL
- image_alt (VARCHAR 50)    ------ NOT NULL
- image_text (VARCHAR 100)

services
- id (INT AUTO_INCREMENT)                   ------ NOT NULL
- service_name (VARCHAR 100)                ------ NOT NULL
- service_short_description (VARCHAR 100)   ------ NOT NULL
- service_description_one (VARCHAR 255)     ------ NOT NULL
- service_description_two (VARCHAR 255)
- service_description_three (VARCHAR 255)
- service_description_four (VARCHAR 255)
- important_note (VARCHAR 255)

users
- id (INT AUTO_INCREMENT)   ------ NOT NULL
- name (VARCHAR 50)         ------ NOT NULL
- username (VARCHAR 50)     ------ NOT NULL
- email (VARCHAR 100)       ------ NOT NULL
- password (VARCHAR 255)    ------ NOT NULL

-->