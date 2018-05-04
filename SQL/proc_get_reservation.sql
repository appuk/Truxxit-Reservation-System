DROP PROCEDURE get_reservation;

DELIMITER //
 CREATE PROCEDURE get_reservation( 
 IN login_id VARCHAR(25),
 OUT reservation_id INT )
BEGIN

DECLARE input_login_id varchar(45);

SET input_login_id = login_id;

SELECT  c.reservation_id 
FROM user a, customer b, reservation c -- , customer d, driver_truck e, truck f, reservation g, plan_details h
where a.sys_id = b.cust_id
and b.cust_id = c.cust_id
and a.login_id = input_login_id;

END //
DELIMITER ;

CALL get_reservation('a', @reservation_id);