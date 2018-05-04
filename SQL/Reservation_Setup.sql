/******************************* RESERVATION table **************************************/

DROP TABLE IF EXISTS `reservation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;

CREATE TABLE `reservation` (
  `reservation_id` int(11) NOT NULL,
  `truck_id` int(11) DEFAULT NULL,
  `cust_id` int(11) DEFAULT NULL,
  `driver_id` int(11) DEFAULT NULL,
  `plan_id` int(11) DEFAULT NULL,
  `source` varchar(20) DEFAULT NULL,
  `destination` varchar(20) DEFAULT NULL,
 -- `toll_amount` int(11) DEFAULT NULL,
 -- `parking_charge` int(11) DEFAULT NULL,
 -- `load_size` int(11) DEFAULT NULL,
 -- `travel_date` date DEFAULT NULL,
 -- `travel_time` time DEFAULT NULL,
 -- `estimated_trip_duration` int(11) DEFAULT NULL,
 -- `actual_trip_duration` int(11) DEFAULT NULL,
 -- `time_to_load_unload` int(11) DEFAULT NULL,
 -- `estimated_cost` int(11) DEFAULT NULL,
 -- `actual_total_cost` int(11) DEFAULT NULL,
 -- `actual_distance` int(11) DEFAULT NULL,
  `reservation_status` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`reservation_id`),
  KEY `truck_id` (`truck_id`,`driver_id`),
  KEY `cust_id` (`cust_id`),
  KEY `plan_id` (`plan_id`),
  CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`truck_id`, `driver_id`) REFERENCES `driver_truck` (`truck_id`, `driver_id`),
  CONSTRAINT `reservation_ibfk_2` FOREIGN KEY (`cust_id`) REFERENCES `customer` (`cust_id`),
  CONSTRAINT `reservation_ibfk_3` FOREIGN KEY (`plan_id`) REFERENCES `plan_details` (`plan_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;


/* Reservation setup*/

-- DELETE FROM RESERVATION WHERE RESERVATION_ID <> 0;

INSERT INTO RESERVATION VALUES (1, 1, 2, 1, 1, 'CHARLOTTE', 'NEW YORK', 'PENDING');
INSERT INTO RESERVATION VALUES (2, 3, 2, 3, 2, 'NEW YORK', 'CHARLOTTE', 'PENDING');
INSERT INTO RESERVATION VALUES (3, 7, 2, 5, 1, 'MIAMI', 'DALLAS', 'PENDING');
INSERT INTO RESERVATION VALUES (4, 9, 2, 7, 2, 'SAN FRANSICO', 'CARY', 'PENDING');
INSERT INTO RESERVATION VALUES (5, 1, 2, 11, 2, 'RALEIGH', 'GREENS BORO', 'PENDING');
INSERT INTO RESERVATION VALUES (6, 9, 2, 13, 2, 'BATHESDA', 'TRENTON', 'PENDING');
INSERT INTO RESERVATION VALUES (7, 3, 2, 15, 1, 'CHICAGO', 'BOSTON', 'PENDING');
INSERT INTO RESERVATION VALUES (8, 9, 2, 17, 1, 'DALLAS', 'MIAMI', 'PENDING');
INSERT INTO RESERVATION VALUES (9, 7, 2, 19, 2, 'RALEIGH', 'GREENS BORO', 'PENDING');

