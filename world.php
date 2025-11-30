<?php
$host = 'localhost';
$username = 'lab5_user';
$password = 'password123';
$dbname = 'world';
$country = $_GET['country'];

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
$stmt = $conn->query("SELECT * FROM countries");

$newstmt = $conn ->query("SELECT * FROM countries WHERE name LIKE '%$country%'");

$list = $newstmt -> fetchAll(PDO::FETCH_ASSOC);

$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>
<table class="country-table">
  <tr>
    <th>Name</th>
    <th>Continent</th>
    <th>Independence</th>
    <th>Head of State</th>

  </tr>
<?php foreach ($list as $row): ?>
  
  <tr>
    <td><?= $row['name']; ?></td>
    <td><?= $row['continent'];?></td>
    <td><?= $row['independence_year'];?></td>
    <td><?= $row['head_of_state'];?></td>

  </tr>
<?php endforeach; ?>
</table>
