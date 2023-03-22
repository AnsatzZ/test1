<?php
header("Content-Type: application/json"); // Since we are sending a JSON response here (not an HTML document), set the MIME Type to application/json


session_start();

if (isset($_SESSION["username"])) {
    echo json_encode(array(
        "logged_in" => true
    ));
} else {
    echo json_encode(array(
        "logged_in" => false
    ));
}