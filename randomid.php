<?php
// Establish connection to the database
include('condb.php');

// Function to generate an ID with a fixed character and a random number
function generateID($fixedCharacter, $length) {
    $characters = '0123456789';
    $randomString = '';

    // Generate a random number
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, strlen($characters) - 1)];
    }

    // Concatenate the fixed character and random number
    $generatedID = $fixedCharacter . $randomString;

    return $generatedID;
}


?>
