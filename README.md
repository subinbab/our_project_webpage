# our_project_webpage

this is the code for a dynamic website for accessing patients health details and prescription tablets details .

MySQL database with xamp local webserver
database name : vitals
1)patients details uploading table structure :
        table name : patientsdata 
                    table structure 
                                   id-name-regnumber-age-disease-contact-email-status
2)priscription details entry table cotresponding to each patient :
       table name : priscription 
                   table structure 
                                  id-regnumber-name-time 
                   nb: name means tablet's name
                   
3)health data uploading from microcontroller to mysql database 
uploading table :
                table name : temphumid
                           table structure : id-time-temperature-humidity-reference
                           
actualy this is not actual web design of our project , only in a priliminary stage .here sensor used were DHT11 sothe table contain humidity . instead of DHT11 use temperature sensor,
pressure and spo2 sensor.

4)user data details entrying table :
                                    table name :userdata 
                                                table structure : id-name-role-contact-email-pass
                                    nb: pass means password
                                    


