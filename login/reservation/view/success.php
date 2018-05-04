<!DOCTYPE html>
<html>
<head>
    <title>TruxxIt!!!</title>
    <link rel="stylesheet" type="text/css" href="main.css" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
</head>
<body>
<header>
    <h1>My Reservations</h1>
</header>
<main>
  

	 <table border="1">
	 <tr>
		<th>Reservation_ID</th>
		<th>Customer_Name</th>
		<th>Source</th>
		<th>Destination</th>
		<th>Driver_Name</th>
		<th>Truck_Type</th>
		<th>Plan_Name</th>
	 </tr>
	 
	   <?php

define('DB_SERVER1', 'localhost');
   define('DB_USERNAME1', 'root');
   define('DB_PASSWORD1', 'root');
   define('DB_DATABASE1', 'truxxit');

$mysqli = new mysqli(DB_SERVER1,DB_USERNAME1,DB_PASSWORD1,DB_DATABASE1);
$res = $mysqli->multi_query("select reservation_id,Customer_Name,source,destination,Driver_Name, truck_type,plan_name from reservation_details where login_id = '$login_session' ");
$reservation_id_ = 0;
	   
		if( $res ) { 
  $results = 0; 

  do { 
    if ($result = $mysqli->store_result()) { 
      printf( "<br/>", ++$results );
	
   		
	while( $row = $result->fetch_row() ) {
		
		echo "<tr>";
			
        foreach( $row as $cell1 )
		{	
		echo "<td>";
				
		echo $cell1, "&nbsp;";
		echo "<br/>";
	} } echo "</td>";
			echo "</tr>";
			
      $result->close(); 
      if( $mysqli->more_results() ) { echo "<br/>";}
		else break;
	  
	  //{ if ($mysqli->more_results()) break; echo "***<br/>"; echo $results;} 
	  
    } 
  } while( $mysqli->next_result() ); 
} 	
?>


</main>

    <p class="copyright">
         </p>

</body>
</html>