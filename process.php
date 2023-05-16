<?php
// Establish database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "faq";
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve user input
$userInput = $_POST['userInput'];

// Query the database to find the answer
$sql = "SELECT answer FROM faq WHERE question = '$userInput'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Answer found in the database
    $row = $result->fetch_assoc();
    $answer = $row['answer'];
    echo $answer;
} else {
    // Answer not found
    echo "I'm sorry, but I couldn't find an answer to your question.";
}

// Close the database connection
$conn->close();
?>
