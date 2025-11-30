<?php
$host = 'localhost';
$username = 'lab5_user';
$password = 'password123';
$dbname = 'world';
$country = isset($_GET['country']) ? $_GET['country'] : '';
$lookup  = isset($_GET['lookup']) ? $_GET['lookup'] : '';

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);

#$stmt = $conn->query("SELECT * FROM countries");

#$newstmt = $conn ->query("SELECT * FROM countries WHERE name LIKE '%$country%'");

#$citystmt = $conn ->query("SELECT * FROM cities WHERE name LIKE '%$country%'");

#$list = $newstmt -> fetchAll(PDO::FETCH_ASSOC);

#$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
  if($lookup === "cities"){
    $stmt = $conn->query(
      "SELECT cities.name AS city_name, cities.district, cities.population
      FROM cities
      JOIN countries ON country_code = countries.code
      WHERE countries.name LIKE '%$country%'
      ");
      
      $list = $stmt->fetchAll(PDO::FETCH_ASSOC);

      echo "<table class='country-table'>
            <tr><th>Name</th><th>District</th><th>Population</th></tr>";
    foreach ($list as $row) {
        echo "<tr>
                <td>{$row['city_name']}</td>
                <td>{$row['district']}</td>
                <td>{$row['population']}</td>
              </tr>";
    }
    echo "</table>";

      
  } else{
    $stmt = $conn->query("SELECT * FROM countries WHERE name LIKE '%$country%'");
    $list = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo "<table class='country-table'>
            <tr><th>Name</th><th>Continent</th><th>Independence</th><th>Head of State</th></tr>";
    foreach ($list as $row) {
        echo "<tr>
                <td>{$row['name']}</td>
                <td>{$row['continent']}</td>
                <td>{$row['independence_year']}</td>
                <td>{$row['head_of_state']}</td>
              </tr>";
    }
    echo "</table>";
}
    
