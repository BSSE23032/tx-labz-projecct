<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BSSE23032_A</title>
</head>
<body>
<?php
$name_of_server = "localhost";
$name_of_user = "root";
$password_of_user = "";

// PHP Connection of Server
$create_conection = mysqli_connect($name_of_server, $name_of_user, $password_of_user);
if (!$create_conection) {
    die("Failed to connect: " . mysqli_connect_error());
}

// php create database
$new_sql = "CREATE DATABASE IF NOT EXISTS db_lab6";
if (mysqli_query($create_conection, $new_sql)) {
    echo "<b>Database created successfully</b><br>";
} else {
  echo "Error creating database: " . mysqli_error($create_conection) . "<br>";
}

// php select database
mysqli_select_db($create_conection, "db_lab6");

// php create table 
$tabel = "CREATE TABLE IF NOT EXISTS ITUSTUDENT (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    yourname VARCHAR(30) NOT NULL,
    rollno VARCHAR(30) NOT NULL UNIQUE, 
    email VARCHAR(50) NOT NULL UNIQUE
)";

if (mysqli_query($create_conection, $tabel)) {
    echo "Table created successfully<br>";
} else {
    echo "Error creating table: " . mysqli_error($create_conection) . "<br>";
}

// php insert data in table
$new_sql = "INSERT INTO ITUSTUDENT (yourname, rollno, email)
SELECT * FROM (SELECT 'Umar Ahmad', 'BSSE23032', 'bsse23032@itu.edu.pk') AS tmp
WHERE NOT EXISTS (
    SELECT rollno FROM ITUSTUDENT WHERE rollno = 'BSSE23032'
) LIMIT 1";

if ($create_conection->query($new_sql) === TRUE) {
    echo "New record created successfully<br>";
} else {
    echo "Error: " . $create_conection->error . "<br>";
}

$new_sql = "INSERT INTO ITUSTUDENT (yourname, rollno, email)
SELECT * FROM (SELECT 'Ali Hasnain', 'BSSE23066', 'bsse23066@itu.edu.pk') AS tmp
WHERE NOT EXISTS (
    SELECT rollno FROM ITUSTUDENT WHERE rollno = 'BSSE23066'
) LIMIT 1";

if ($create_conection->query($new_sql) === TRUE) {
    echo "New record created successfully<br>";
} else {
    echo "Error: " . $create_conection->error . "<br>";
}

// php select
$new_sql = "SELECT id, yourname, rollno, email FROM ITUSTUDENT";
$result = $create_conection->query($new_sql);

if ($result->num_rows > 0) {
    echo "<h3>Student Records:</h3>";
    while ($row = $result->fetch_assoc()) {
        echo $row["id"] . ". Name: " . $row["yourname"] . ", Roll No: " . $row["rollno"] . ", Email: " . $row["email"] . "<br>";
    }
} else {
    echo "No results<br>";
}
$new_sql = "UPDATE ITUSTUDENT SET yourname='Umar Aftab' 
WHERE rollno='BSSE23032' AND yourname <> 'Umar Aftab'";

if ($create_conection->query($new_sql) === TRUE) {
    if ($create_conection->affected_rows > 0) {
        echo "Record updated successfully<br>";
    } else {
        echo "No update needed<br>";
    }
} else {
    echo "Error updating record: " . $create_conection->error . "<br>";
}

// php delete data
$new_sql = "DELETE FROM ITUSTUDENT WHERE rollno='BSSE23066'";

if ($create_conection->query($new_sql) === TRUE) {
    echo "Record deleted successfully<br>";
} else {
    echo "Error deleting record: " . $create_conection->error . "<br>";
}
$reset_auto_increment = "ALTER TABLE ITUSTUDENT AUTO_INCREMENT = 1";
mysqli_query($create_conection, $reset_auto_increment);

// php close connection
mysqli_close($create_conection);
?>

</body>
</html>
