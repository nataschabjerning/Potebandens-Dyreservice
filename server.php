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
- id (INT AUTO_INCREMENT)           ------ NOT NULL
- about_image_link (VARCHAR 255)    ------ NOT NULL
- about_name (VARCHAR 100)          ------ NOT NULL
- about_work_title (VARCHAR 100)
- about_text_one (VARCHAR 100)      ------ NOT NULL
- about_text_two (VARCHAR 255)
- about_text_three (VARCHAR 255)
- about_text_four (VARCHAR 255)
- about_text_five (VARCHAR 255)
- about_text_six (VARCHAR 255)
- about_text_seven (VARCHAR 255)

contact
- id (INT AUTO_INCREMENT)   ------ NOT NULL
- name (VARCHAR 100)        ------ NOT NULL
- work_title (VARCHAR 100)
- phone (INT 100)           ------ NOT NULL
- email (VARCHAR 255)       ------ NOT NULL
- adress_street (VARCHAR 255)
- adress_postal_code (INT 100)
- adress_city (VARCHAR 255)

gallery
- id (INT AUTO_INCREMENT)   ------ NOT NULL
- image_link (VARCHAR 255)  ------ NOT NULL
- image_alt (VARCHAR 50)    ------ NOT NULL
- image_text (VARCHAR 100)

inbox
- id (INT AUTO_INCREMENT)           ------ NOT NULL
- message_name (VARCHAR 100)        ------ NOT NULL
- message_subject	 (VARCHAR 50)   ------ NOT NULL
- message_msg (VARCHAR 255)         ------ NOT NULL
- message_contact (VARCHAR 50)      ------ NOT NULL
- message_phone (VARCHAR 15)
- message_email (VARCHAR 255)
- message_read (VARCHAR 50)

openinghours
- id (INT AUTO_INCREMENT)   ------ NOT NULL
- mondayfrom (VARCHAR 100)
- mondayto (VARCHAR 100)
- tuesdayfrom (VARCHAR 100)
- tuesdayto (VARCHAR 100)
- wednesdayfrom (VARCHAR 100)
- wednesdayto (VARCHAR 100)
- thursdayfrom (VARCHAR 100)
- thursdayto (VARCHAR 100)
- fridayfrom (VARCHAR 100)
- fridayto (VARCHAR 100)
- saturdayfrom (VARCHAR 100)
- saturdayto (VARCHAR 100)
- sundayfrom (VARCHAR 100)
- sundayto (VARCHAR 100)

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