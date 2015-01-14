<?php
$servername = "localhost";
$username = "nim";
$password = "bogaboga123";
$db = "clubmap";

// Create connection
$conn = new mysqli($servername, $username, $password,$db);

// Check connection
if ($conn->connect_error) {
	echo "nonono";
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";


// sql to create placeinfo store
// only for places stored in google places
$sqlPlaceInfo = "CREATE TABLE placeInfo (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(100) NOT NULL,
place_id VARCHAR(100) NOT NULL,
url VARCHAR(100),
geocoord_lat VARCHAR(20),
geocoord_long VARCHAR(20),
address VARCHAR(100),
mon_closing_time VARCHAR(50),
tues_closing_time VARCHAR(50),
wed_closing_time VARCHAR(50),
thurs_closing_time VARCHAR(50),
fri_closing_time VARCHAR(50),
sat_closing_time VARCHAR(50),
sun_closing_time VARCHAR(50),
rating FLOAT(6),
classification VARCHAR(60)
)";



// stores all queries
// will add time stamp, tag and ordering
$sqlQueryStore = "CREATE TABLE queryStore (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(100) NOT NULL,
address VARCHAR(100) NOT NULL,
tag VARCHAR(100) NOT NULL,
ordering INT(6) NOT NULL,
place_id VARCHAR(100) NOT NULL
)";

if ($conn->query($sqlPlaceInfo) === TRUE) {
    echo "Table placeInfo created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}


if ($conn->query($sqlQueryStore) === TRUE) {
    echo "Table queryStore created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}
$conn->close();

?> 