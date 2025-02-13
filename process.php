<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);
    $country = trim($_POST['country']);

    $errors = [];
    
    // Validate name
    if (empty($name)) {
        $errors[] = "Name is required.";
    }
    
    // Validate email
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Valid email is required.";
    }
    
    // Validate phone number
    if (empty($phone) || !preg_match("/^[0-9]{10,15}$/", $phone)) {
        $errors[] = "Valid phone number is required (10-15 digits).";
    }
    
    // Validate country selection
    if (empty($country)) {
        $errors[] = "Please select a preferred country.";
    }
    
    if (empty($errors)) {
        // Process form (e.g., save to database, send email, etc.)
        echo "<p style='color:green;'>Application submitted successfully!</p>";
    } else {
        foreach ($errors as $error) {
            echo "<p style='color:red;'>$error</p>";
        }
    }
} else {
    echo "<p style='color:red;'>Invalid request.</p>";
}
?>
