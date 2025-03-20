<?php
session_start();
require_once "settings.php";

// prevent direct access
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: apply.php");
    exit();
}

// sanitise input function
function sanitise_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// retrieve input
$job_ref = $_POST["job_reference"];
$first_name = $_POST["first_name"];
$last_name = $_POST["last_name"];
$birthday = $_POST["birthday"];
$gender = $_POST["gender"];
$street_address = $_POST["street_address"];
$suburb_town = $_POST["suburb_town"];
$state = $_POST["state"];
$postcode = $_POST["postcode"];
$email_address = $_POST["email_address"];
$phone_number = $_POST["phone_number"];
$other_skills = $_POST["other_skills"];

if (isset($_POST["FTD23_skill1"])) {
    $FTD23_skill1 = $_POST["FTD23_skill1"];
} else {
    $FTD23_skill1 = null;
}

if (isset($_POST["FTD23_skill2"])) {
    $FTD23_skill2 = $_POST["FTD23_skill2"];
} else {
    $FTD23_skill2 = null;
}

if (isset($_POST["FTD23_skill3"])) {
    $FTD23_skill3 = $_POST["FTD23_skill3"];
} else {
    $FTD23_skill3 = null;
}

if (isset($_POST["FTD23_skill4"])) {
    $FTD23_skill4 = $_POST["FTD23_skill4"];
} else {
    $FTD23_skill4 = null;
}

if (isset($_POST["FTD23_skill5"])) {
    $FTD23_skill5 = $_POST["FTD23_skill5"];
} else {
    $FTD23_skill5 = null;
}

if (isset($_POST["FTD23_skill6"])) {
    $FTD23_skill6 = $_POST["FTD23_skill6"];
} else {
    $FTD23_skill6 = null;
}

if (isset($_POST["FTD23_skill7"])) {
    $FTD23_skill7 = $_POST["FTD23_skill7"];
} else {
    $FTD23_skill7 = null;
}

if (isset($_POST["FTD23_skill8"])) {
    $FTD23_skill8 = $_POST["FTD23_skill8"];
} else {
    $FTD23_skill8 = null;
}

if (isset($_POST["FTD23_skill9"])) {
    $FTD23_skill9 = $_POST["FTD23_skill9"];
} else {
    $FTD23_skill9 = null;
}

if (isset($_POST["AIE45_skill1"])) {
    $AIE45_skill1 = $_POST["AIE45_skill1"];
} else {
    $AIE45_skill1 = null;
}

if (isset($_POST["AIE45_skill2"])) {
    $AIE45_skill2 = $_POST["AIE45_skill2"];
} else {
    $AIE45_skill2 = null;
}

if (isset($_POST["AIE45_skill3"])) {
    $AIE45_skill3 = $_POST["AIE45_skill3"];
} else {
    $AIE45_skill3 = null;
}

if (isset($_POST["AIE45_skill4"])) {
    $AIE45_skill4 = $_POST["AIE45_skill4"];
} else {
    $AIE45_skill4 = null;
}

if (isset($_POST["AIE45_skill5"])) {
    $AIE45_skill5 = $_POST["AIE45_skill5"];
} else {
    $AIE45_skill5 = null;
}

if (isset($_POST["AIE45_skill6"])) {
    $AIE45_skill6 = $_POST["AIE45_skill6"];
} else {
    $AIE45_skill6 = null;
}

if (isset($_POST["AIE45_skill7"])) {
    $AIE45_skill7 = $_POST["AIE45_skill7"];
} else {
    $AIE45_skill7 = null;
}

// sanitize input
$job_ref = sanitise_input($job_ref);
$first_name = sanitise_input($first_name);
$last_name = sanitise_input($last_name);
$birthday = sanitise_input($birthday);
$street_address = sanitise_input($street_address);
$suburb_town = sanitise_input($suburb_town);
$state = sanitise_input($state);
$postcode = sanitise_input($postcode);
$email_address = sanitise_input($email_address);
$phone_number = sanitise_input($phone_number);
$other_skills = sanitise_input($other_skills);

// initialize error messages
$errMsg = "";

if ($job_ref == "") {
    $errMsg .= "You must enter your job reference number.";
} else if (!preg_match('/^[A-Za-z0-9]{5}$/', $job_ref)) {
    $errMsg .= "Job reference number must be exactly 5 alphanumeric characters.";
}

if ($first_name == "") {
    $errMsg .= "You must enter your first name.";
} else if (!preg_match('/^[A-Za-z]{1,20}$/', $first_name)) {
    $errMsg .= "First name must be alphabetic and up to 20 characters.";
}

if ($last_name == "") {
    $errMsg .= "You must enter your last name.";
} else if (!preg_match('/^[A-Za-z]{1,20}$/', $last_name)) {
    $errMsg .= "Last name must be alphabetic and up to 20 characters.";
}

// validate birthday (dd/mm/yyyy format and age between 15-80)
$dob_parts = explode("/", $birthday);
if (count($dob_parts) === 3 && checkdate($dob_parts[1], $dob_parts[0], $dob_parts[2])) {
    $birthDate = DateTime::createFromFormat("d/m/Y", $birthday);
    $age = $birthDate->diff(new DateTime())->y;
    if ($age < 15 || $age > 80) {
        $errMsg .= "Age must be between 15 and 80.";
    }
} else {
    $errMsg .= "Invalid date format. Use dd/mm/yyyy.";
}


if (empty($gender)) {
    $errMsg .= "Please select a gender.";
}

if (strlen($street_address) > 40) {
    $errMsg .= "Street address must not exceed 40 characters.";
}

if (strlen($suburb_town) > 40) {
    $errMsg .= "Suburb/town must not exceed 40 characters.";
}

// state validation
$valid_states = ["VIC", "NSW", "QLD", "NT", "WA", "SA", "TAS", "ACT"];
if (!in_array($state, $valid_states)) {
    $errMsg .= "Invalid state selected.";
}

// postcode validation 
if ($postcode == "") {
    $errMsg .= "You must enter your state postcode.";
} else if (!preg_match('/^\d{4}$/', $postcode)) {
    $errMsg .= "Postcode must be exactly 4 digits.";
} else {
    $state_postcodes = [
        "VIC" => "/^3\d{3}$/",
        "NSW" => "/^2\d{3}$/",
        "QLD" => "/^4\d{3}$/",
        "NT"  => "/^0\d{3}$/",
        "WA"  => "/^6\d{3}$/",
        "SA"  => "/^5\d{3}$/",
        "TAS" => "/^7\d{3}$/",
        "ACT" => "/^0\d{3}$/"
    ];
    if (!preg_match($state_postcodes[$state], $postcode)) {
        $errMsg .= "Postcode does not match the selected state.";
    }
}

// email validation
if ($email_address == "") {
    $errMsg .= "You must enter your email address";
} else if (!filter_var($email_address, FILTER_VALIDATE_EMAIL)) {
    $errMsg .= "Invalid email format.";
}

// phone number validation (8-12 digits, spaces allowed)
if ($phone_number == "") {
    $errMsg .= "You must enter your phone number";
} else if (!preg_match('/^[0-9 ]{8,12}$/', $phone_number)) {
    $errMsg .= "Phone number must be between 8 to 12 digits.";
}

// other skills validation
if ($skills_checked && empty($other_skills)) {
    $errMsg .= "Please enter other skills if the checkbox is selected.";
}

// if there are error messages, show them
if (!empty($errMsg)) {
    echo $errMsg;
}

// database Insertion
$mysqli = new mysqli($host, $user, $pwd, $sql_db);

$sql = "INSERT INTO eoi (job_reference, first_name, last_name, gender, street_address, suburb, state, postcode, email, phone_number, status, FTD23_skill1, FTD23_skill2, FTD23_skill3, FTD23_skill4, FTD23_skill5, FTD23_skill6, FTD23_skill7, FTD23_skill8, FTD23_skill9, AIE45_skill1, AIE45_skill2, AIE45_skill3, AIE45_skill4, AIE45_skill5, AIE45_skill6, AIE45_skill7, other_skills) 
        VALUES ('$job_ref', '$first_name', '$last_name', '$gender', '$street_address', '$suburb_town', '$state', '$postcode', '$email_address', '$phone_number', 'New', '$FTD23_skill1', '$FTD23_skill2', '$FTD23_skill3', '$FTD23_skill4', '$FTD23_skill5', '$FTD23_skill6', '$FTD23_skill7', '$FTD23_skill8', '$FTD23_skill9', '$AIE45_skill1', '$AIE45_skill2', '$AIE45_skill3', '$AIE45_skill4', '$AIE45_skill5', '$AIE45_skill6', '$AIE45_skill7', '$other_skills')";

if ($mysqli->query($sql)) {
    // show confirmation page
    echo "<h2>Application Submitted Successfully</h2>";
} else {
    die("Database error: " . $mysqli->error);
}

$mysqli->close();
