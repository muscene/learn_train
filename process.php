<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Form validation
    $errors = array();

    // Validate name
    if (empty($_POST['name'])) {
        $errors[] = 'Name is required';
    }

    // Validate email
    if (empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Valid email address is required';
    }

    // Validate telephone
    if (empty($_POST['telephone']) || !preg_match("/^[0-9]{10}$/", $_POST['telephone'])) {
        $errors[] = 'Valid telephone number is required (10 digits)';
    }

    // Validate address
    if (empty($_POST['address'])) {
        $errors[] = 'Address is required';
    }

    // Validate major
    if (empty($_POST['major'])) {
        $errors[] = 'Major is required';
    }

    // Validate internship area
    $valid_areas = array('IOT', 'Machine Learning', 'SolidWORKs', 'Firmware Development', 'Python Programming', 'PCB Design');
    if (empty($_POST['internship_area']) || !in_array($_POST['internship_area'], $valid_areas)) {
        $errors[] = 'Please select a valid internship area';
    }

    // Validate interest reason
    if (empty($_POST['interest_reason'])) {
        $errors[] = 'Interest reason is required';
    }

    // Validate how did you know
    if (empty($_POST['how_did_you_know'])) {
        $errors[] = 'How did you know is required';
    }

    // If there are no validation errors, proceed with sending email
    if (empty($errors)) {
        // Gather form data
        $name = $_POST['name'];
        $email = $_POST['email'];
        $telephone = $_POST['telephone'];
        $address = $_POST['address'];
        $major = $_POST['major'];
        $laptop = isset($_POST['laptop']) ? $_POST['laptop'] : 'no';
        $internship_area = $_POST['internship_area'];
        $interest_reason = $_POST['interest_reason'];
        $how_did_you_know = $_POST['how_did_you_know'];

        // Prepare email message
        $to = "your_email@example.com"; // Change this to your email address
        $subject = "New Internship Application";
        $message = "New Internship Application:\n\n";
        $message .= "Name: $name\n";
        $message .= "Email: $email\n";
        $message .= "Telephone: $telephone\n";
        $message .= "Address: $address\n";
        $message .= "Major: $major\n";
        $message .= "Laptop: $laptop\n";
        $message .= "Internship Area: $internship_area\n";
        $message .= "Interest Reason: $interest_reason\n";
        $message .= "How did you know: $how_did_you_know\n";

        // Send email
        $headers = "From: $email\r\n";
        if (mail($to, $subject, $message, $headers)) {
            // Redirect back to the form with a success message
            header("Location: index.php?status=success");
            exit;
        } else {
            // Redirect back to the form with an error message if mail could not be sent
            header("Location: index.php?status=mail_error");
            exit;
        }
    } else {
        // Redirect back to the form with validation errors
        header("Location: index.php?status=validation_error&errors=" . urlencode(implode(',', $errors)));
        exit;
    }
} else {
    // Redirect back to the form with an error message if accessed directly
    header("Location: index.php?status=error");
    exit;
}
?>
