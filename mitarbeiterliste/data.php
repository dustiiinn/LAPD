<?php
$verify = $_GET["verify"];


if ($verify === "true") {
    $servername = "localhost";
    $username = "lapd";
    $password = "KiArA2010!";
    $dbname = "lapd";
    
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    
    
    
    $sql = "SELECT * FROM pdler";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["userid"]. "</td>";
            echo "<td>" . $row["name"]. "</td>";
            echo "<td>" . $row["xp"]. "</td>";
            echo "<td>" . $row["level"]. "</td>";
            echo "<td>" . secondsToTime($row["time"]). "</td>";
            echo "<td>" . secondsToTime($row["car_time"]). "</td>";
            echo "<td>" . $row["role"]. "</td>";
            if ($row["status"] == "on") {
                echo "<td class='on'>Im Dienst</td>";
            } else {
                echo "<td class='off'>Außer Dienst</td>";
            }
            echo "</tr>";
        }
    }
    $conn->close();
} else {
    echo "perms";
}



function secondsToTime($seconds) {
    $hours = floor($seconds / 3600);
    $minutes = floor(($seconds / 60) % 60);
    $seconds = $seconds % 60;
    return sprintf('%02d:%02d:%02d', $hours, $minutes, $seconds);
}

?>