<?php include 'header.php'; 
require_once('database.php');
$queryCategory1 = 'select max(sys_id) as sys_id from user';

$statement2 = $db->prepare($queryCategory1);
$statement2->execute();
$sys_id_temp = $statement2->fetch();
$sys_id = $sys_id_temp['sys_id'];
$statement2->closeCursor();

?>

<main>
    <h1>Home Page</h1>

	<button type="button" onclick="accountinfo.php">Manage Accounts</button>

        <button type="button" onclick="paymentinfo.php">Manage Payments</button>

	<button type="button" onclick="reservationinfo.php">My Reservations</button>

        <button type="button" onclick="reservation.php">Make Reservations</button>
<p>Your CustomerID is: <?php echo htmlspecialchars($sys_id); ?></p>
</main>
<?php include 'footer.php'; ?>