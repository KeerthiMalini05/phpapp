<?php
echo '<h4> Welcome!, This site is up and running. </h4>';
$dbhost = db_host;
$dbname = 'keerthidb';
$username = mysql_user;
$password = mysql_password;

$conn = new mysqli($dbhost, $username, $password, $dbname);
if($conn->connect_error) {
                die('Could not connect: ' . $conn->connect_error);
}
echo '--------- MySQL Connected successfully -------<br>';

$sql1 = "CREATE TABLE IF NOT EXISTS books( id INT AUTO_INCREMENT PRIMARY KEY, name VARCHAR(50), city VARCHAR(50));";
if ($conn->query($sql1) === TRUE) {
          echo "\nTable Books created successfully <br>";
              
              $sql = "insert into books (name,author) values ('Alice in wonderland','chetan');";
              $sql .= "insert into books (name,author) values ('Brevis-world','Maria');";
              $sql .= "insert into books (name,author) values ('Milne-monarch','steven');";
              if ($conn->query($sql) === TRUE) {
              echo "\n New record created successfully <br>";
              } 
                  else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                    }

} else {
          echo "Error creating table: " . $conn->error;
}

echo 'List of Books with authors <br>';
$sql = "SELECT * FROM books;";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
          // output data of each row
           while($row = $result->fetch_assoc()) {
               echo " Name: " . $row["name"]. " City: " . $row["author"]. "<br>";
                 }
            } else {
                   echo "0 results";
                   }
$conn->close();
?>
