<?php
header('Access-Control-Allow-Origin: *'); 
$host = 'localhost';
$username = 'lab5_user';
$password = 'password123';
$dbname = 'world';
$country =$_GET['country'];
$context =$_GET['context'];

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
if ($context=='none'){
  $stmt = $conn->query("SELECT * FROM countries WHERE NAME LIKE '%$country%'");
}else if($context=='cities'){
  $stmt = $conn->query("SELECT cities.name,cities.district,cities.population FROM countries JOIN cities ON countries.code=cities.country_code WHERE countries.name LIKE '%$country%'");

}
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

