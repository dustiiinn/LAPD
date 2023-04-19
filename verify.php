<?php
$servername = "localhost";
$username = "lapd";
$password = "KiArA2010!";
$dbname = "lapd";

$lieutenant = "921142977072627801";
$captain = "921142977089396766";
$commander = "921142977089396768";
$deputy = "946901942603505715";
$assistant = "921142977089396769";
$chief = "921142977089396770";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$id = $_GET["id"];

// $sql = "SELECT * FROM pdler where userid='" + $id + "'";

$sql = "SELECT * FROM pdler where userid='$id'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // echo "test2";
    while($row = $result->fetch_assoc()) {
        // echo "test3";
        if ($row["role"] == $lieutenant || $row["role"] == $captain || $row["role"] == $commander || $row["role"] == $deputy || $row["role"] == $assistant || $row["role"] == $chief) {
            print("true");
        } else {
            print("false");
        }
    }
}

$conn->close();
?>