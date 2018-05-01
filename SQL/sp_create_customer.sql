use truxxit;

drop procedure if exists Create_Customer;

DELIMITER //
 CREATE PROCEDURE Create_Customer( 
 IN lgnid VARCHAR(25),
 IN fname VARCHAR(25),
 IN lname VARCHAR(25),
 IN email VARCHAR(25),
 IN pwd VARCHAR(25),
 IN strt VARCHAR(25),
 IN city VARCHAR(25),
 IN state VARCHAR(25),
 IN zip VARCHAR(25),
 IN dob VARCHAR(25),
 IN sex VARCHAR(25),
 IN membership VARCHAR(25),
 IN cardno VARCHAR(25),
 IN cardcvv VARCHAR(25),
 IN cardexp VARCHAR(25) )

   BEGIN
   declare cust_id int;
   DECLARE exit handler for sqlexception
	  BEGIN
		-- ERROR
	  ROLLBACK;
	END;
   START TRANSACTION;
   INSERT INTO user (login_id,first_name,last_name,email_id,password,street,city,state,zip,dob,sex) VALUES (lgnid,fname,lname,email,pwd,strt,city,state,zip,dob,sex);
	select max(sys_id) into cust_id from user;
    INSERT INTO customer VALUES (cust_id,membership);
    INSERT INTO card_details VALUES (cust_id,cardno,cardcvv,cardexp); 
    COMMIT;
   END //
 DELIMITER ;
 
 CALL Create_Customer('aabb','aa','aa','aa','aa','aa','aa','aa','aa','2006-07-18','Male','Gold','1111','111','11/2030');


select * from user;
select * from customer;
select * from card_details;