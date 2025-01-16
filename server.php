<!-- 

### CODE EXAMPLES ###

------------------- Keyframe Animation -------------------

.class {
    animation: wobble 15s ease-in-out alternate infinite;
}
@keyframes wobble {
    50% {
        border-radius: 92% 8% 94% 6% / 5% 96% 4% 95%;
    }
    100% {
        border-radius: 97% 3% 97% 3% / 3% 97% 3% 97%;
    }
}

------------- Border Radius (blob / drawn) -------------

------A--B-----------
-                   -
a                   -
-                   -
d                   -
-                   b
-                   -
-                   c
-                   -
-----------D--C------

Forming a diagonal oval

border-radius: 26% 64% 22% 71% / 24% 67% 25% 68%;
                            A - a
border-top-left-radius:     26% 24%;
                            B - b
border-top-right-radius:    64% 67%;
                            C - c
border-bottom-right-radius: 22% 25%;
                            D - d
border-bottom-left-radius:  71% 68%;

------------------------------------------------------------
                       
### COLOR CODES ###

------------------- General -------------------
    og-red:                     #d5251e,
    og-green:                   #478f54,
    og-blue:                    #3f48cc,
    og-yellow:                  #d9a800,

    box-shadow:                 #0000001a 0px 0px 50px 10px,

------------------- Text -------------------
    og-red:                     #d5251e,
    og-blue:                    #3f48cc,

    white:                      #ffffff,
    dark-yellow:                #997602,
    red:                        #ff0000,

    text-shadow-black:          1px 1px 1px #202020,
    text-shadow-blue:           1px 1px 2px #000d7e;

------------------- Backgrounds -------------------
    og-yellow:                  #d9a800,
    
    light-green:                #ccd6bc,
    green:                      #478f54cc,
    light-orange:               #c750004d,
    dark-overlay:               linear-gradient(
                                    to bottom,
                                    #0202024d 0%,
                                    #0000004d 100%
                                );
    yellow-to-transparent:      linear-gradient(
                                    to bottom, 
                                    #ecd9ae 0%,
                                    #e9d5abcc 10%,
                                    #e2cfa699 35%,
                                    #e2cfa666 50%,
                                    #e2cfa633 70%,
                                    #e2cfa600 90%,
                                    #e2cfa600 100%
                                );
    yellow-to-white:            linear-gradient(
                                    to bottom,
                                    #f1deb1 0%, 
                                    #f1e4c4 10%, 
                                    #f8efd6 35%, 
                                    #f8f0df 50%, 
                                    #f8f5ee 70%, 
                                    #ffffff 90%, 
                                    #ffffff 100%
                                );

------------------- Borders / Padding -------------------
    og-red:                     #d5251e,
    og-green:                   #478f54,
    og-blue:                    #3f48cc,

    dark-brown:                 #565a4d,
    middle-brown (dotted):      #8b8167,
    light-brown:                #b4bb9f,
    dark-orange:                #ec7e00,
    light-grey:                 #d4d2d2,
    fat-green:                  #025f02,
    black:                      #000000,
    red:                        #e20303,

    og-red-outline:             #d5251e,
    og-green-outline:           #478f54,

------------------- Buttons -------------------
- prev and next (slider)
    background:                 #3f48cc4d,
    border:                     #3a7545,
    og-blue-text-color:         #3f48cc,
    hover-bg:                   #3f48cc80,
- add buttons
    background:                 #478f54cc,
    og-green-border:            #478f54,
    og-green-hover-bg:          #478f54,
    og-red-outline:             #d5251e,
- back button
    background:                 #243a9499,
    border:                     #243a94,
    hover-bg:                   #243a94,
- default button settings
    background:                 #008000,
    hover-bg:                   #025f02,
- delete buttons
    background:                 #dd0000,
    hover-bg:                   #c70303,
- update buttons
    background:                 #fd9c1d,
    hover-bg:                   #df8a1b,

------------------------------------------------------------

### DATABASES AND TABLES ###

------------------- Home Database -------------------

$serverName = "localhost";
$dbName = "potebandens_dyreservice_db";
$dbusername = "root";
$dbpassword = "";


------------------- Laptop Database -------------------

$serverName = "localhost";
---- CHECK THIS ----
$dbName = "potebandens_dyreservice_db";
$dbusername = "root";
$dbpassword = "";


------------------- Work Database -------------------

$serverName = "local.potebandens-dyreservice.dk";
$dbName = "potebandens_dyreservice_db";
$dbusername = "root";
$dbpassword = "root";


------------------- Tables -------------------

about
- id (INT AUTO_INCREMENT)           ------ NOT NULL
- about_image_link (VARCHAR 255)    ------ NOT NULL
- about_name (VARCHAR 100)          ------ NOT NULL
- about_work_title (VARCHAR 100)
- about_text_one (VARCHAR 255)      ------ NOT NULL
- about_text_two (VARCHAR 255)
- about_text_three (VARCHAR 255)
- about_text_four (VARCHAR 255)
- about_text_five (VARCHAR 255)
- about_text_six (VARCHAR 255)
- about_text_seven (VARCHAR 255)

blue
- id (INT AUTO_INCREMENT)   ------ NOT NULL
- visibility (VARCHAR 50)
- title (VARCHAR 100)------ NOT NULL
- subtitle (VARCHAR 100)
- text_one (VARCHAR 255)
- text_two (VARCHAR 255)
- text_three (VARCHAR 255)
- text_link (VARCHAR 100)
- link_url (VARCHAR 255)

contact
- id (INT AUTO_INCREMENT)   ------ NOT NULL
- name (VARCHAR 100)        ------ NOT NULL
- work_title (VARCHAR 100)
- phone (INT 100)           ------ NOT NULL
- email (VARCHAR 255)       ------ NOT NULL

gallery
- id (INT AUTO_INCREMENT)   ------ NOT NULL
- image_link (VARCHAR 255)  ------ NOT NULL
- image_alt (VARCHAR 255)   ------ NOT NULL
- image_text (VARCHAR 40)   ------ NOT NULL

inbox
- id (INT AUTO_INCREMENT)           ------ NOT NULL
- message_date (DATE)
- message_time (TIME)
- message_name (VARCHAR 100)        ------ NOT NULL
- message_subject	 (VARCHAR 50)   ------ NOT NULL
- message_msg (VARCHAR 255)         ------ NOT NULL
- message_contact (VARCHAR 50)      ------ NOT NULL
- message_phone (VARCHAR 15)
- message_email (VARCHAR 255)
- message_read (VARCHAR 50)

openinghours
- id (INT AUTO_INCREMENT)       ------ NOT NULL
- mondayfrom (VARCHAR 100)      ------ NOT NULL
- mondayto (VARCHAR 100)
- tuesdayfrom (VARCHAR 100)     ------ NOT NULL
- tuesdayto (VARCHAR 100)
- wednesdayfrom (VARCHAR 100)   ------ NOT NULL
- wednesdayto (VARCHAR 100)
- thursdayfrom (VARCHAR 100)    ------ NOT NULL
- thursdayto (VARCHAR 100)
- fridayfrom (VARCHAR 100)      ------ NOT NULL
- fridayto (VARCHAR 100)
- saturdayfrom (VARCHAR 100)    ------ NOT NULL
- saturdayto (VARCHAR 100)
- sundayfrom (VARCHAR 100)      ------ NOT NULL
- sundayto (VARCHAR 100)

rules
- id (INT AUTO_INCREMENT)       ------ NOT NULL
- rules (VARCHAR 100)           ------ NOT NULL
- rules_point_one (VARCHAR 255) ------ NOT NULL
- rules_point_two (VARCHAR 255)
- rules_point_three (VARCHAR 255)
- rules_point_four (VARCHAR 255)
- rules_point_five (VARCHAR 255)
- rules_point_six (VARCHAR 255)
- rules_point_seven (VARCHAR 255)
- rules_point_eight (VARCHAR 255)
- rules_point_nine (VARCHAR 255)
- rules_point_ten (VARCHAR 255)

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

white
- id (INT AUTO_INCREMENT)   ------ NOT NULL
- visibility (VARCHAR 50)
- title (VARCHAR 100)------ NOT NULL
- subtitle (VARCHAR 100)
- text_one (VARCHAR 255)
- text_two (VARCHAR 255)
- text_three (VARCHAR 255)
- text_link (VARCHAR 100)
- link_url (VARCHAR 255)


-->