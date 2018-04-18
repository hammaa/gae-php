<?php
// Create the PDO object for CloudSQL MySQL.
$dsn = getenv('MYSQL_DSN');
$user = getenv('MYSQL_USER');
$password = getenv('MYSQL_PASSWORD');
$pdo = new PDO($dsn, $user, $password);

// Create the database if it doesn't exist
/* $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$pdo->query('CREATE TABLE IF NOT EXISTS visits ' .
		'(time_stamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP, user_ip CHAR(64))');


$insert = $pdo->prepare('INSERT INTO visits (user_ip) values (:user_ip)');
$insert->execute(['user_ip' => $user_ip]);

// Look up the last 10 visits
$select = $pdo->prepare(
		'SELECT * FROM visits ORDER BY time_stamp DESC LIMIT 10');
$select->execute();
$visits = ["Last 10 visits:"];
while ($row = $select->fetch(PDO::FETCH_ASSOC)) {
	array_push($visits, sprintf('Time: %s Addr: %s', $row['time_stamp'],
			$row['user_ip']));
}

var_dump($visits); */


// Look up the last 10 visits
$select = $pdo->prepare(
		'SELECT * FROM test01 LIMIT 10');
$select->execute();
$visits = ["Last 10 visits:"];
while ($row = $select->fetch(PDO::FETCH_ASSOC)) {
	array_push($visits, $row['name']);
}

var_dump($visits);


?>