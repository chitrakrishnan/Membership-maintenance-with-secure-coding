# Membership-maintenance-with-secure-coding

Step 1: Setup new database 

New database named service_members created to identify a service member and the member’s posting.
Create new database service_members using “setupdatabase.php”
Verify from phpMyAdmin console if the database got created successfully.

Step 2: Create the member and post tables

Within the service_members database, tables named member and post are created.
Verify the table structure by giving the query DESCRIBE <table>;
  
Step 3: Create the memberlist.php, connect.php files
  
A php script is created in the file called memberlist.php. This will allow us to collect user entered data from the browser. 
  
Step 4: Populate data
  
Click the submit button to populate the data.
Similarly, multiple users’ information can be submitted. 
  
Step 5: Verify that the records are being inserted
  
Step 6: SQL injection
  
In the given name field Robert'); DROP TABLE member;#
Below screenshot shows that the data has been successfully accepted in the form but we need to verify this.
  
Step 7: Verify if the member table was dropped
  
Notice that the member table has been dropped as a result of the SQL injection in the given name field.
How and why the injected code works. 
The problem with SQL injection is that data entered by users and SQL code are allowed to blend together, without anything to separate them. This makes it possible for the user to write not only data but also code that will be executed on the database. 
Below is the sample code that is vulnerable.
Here, when an SQL injection gets inserted, the code gets altered according to the hacker’s manipulated code. If the given name field is filled as, Robert'); DROP TABLE member;# 
  
The query will be altered as follows:
$query = "INSERT INTO member(`SN`,`rank`,`surname`,`givenname`) VALUES ('$sn','$rank','$surname','$givenname') ; INSERT INTO post(`SN`,`unit`) VALUES ('$sn', '$unit')";
  
Here, when an SQL injection gets inserted, the code gets altered according to the hacker’s manipulated code. If the given name field is filled as, Robert'); DROP TABLE member;# 
  
The query will be altered as follows:
$query = "INSERT INTO member(`SN`,`rank`,`surname`,`givenname`) VALUES ('225438','1','White',' Robert'); DROP TABLE member;# ') ; INSERT INTO post(`SN`,`unit`) VALUES ('225438', '11')";
  
The INSERT command has been altered in such a way that DROP TABLE member has been added and the # character allows the rest of the command to be ignored. Thus, the member table gets dropped because of the SQL injection into the code.
How the exploit can be used to drop an entire database or tables in another database.
  
Here, the SQL injection would be as below:
  
The value in the givenname field of the form can be altered by a hacker to exploit a vulnerable system.
  
Example: 
Given Name = Robert'); DROP database service_members;#
Given Name = Robert'); DROP table mysql.mytable;#
The system will interpret the above data as a command and execute it. Thus, the hacker is able to successfully exploit the vulnerability.
  
Further analysis: We can achieve similar vulnerability by manipulating the value in the field unit as well.
  
Reasons for the vulnerability:
  
•	The injected code works because there is no data sanitization. 
•	The data can be interpreted as Code.
  
The recommended way to avoid SQL Injections:
  
> Apply Sanitization to data.
> Separate all user inputs from the SQL code. This is achieved by using prepared statements.
  
Step 8: Validate the updatedmemberlist.php
  
Notice that the givenname value has been taken as string.
  


