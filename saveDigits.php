<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Get the posted digits
    $digits = "";
    for ($i = 1; $i <= 6; $i++) {
        $inputName = "digit" . $i;
        $digits .= isset($_POST[$inputName]) ? $_POST[$inputName] : "0";
    }

    // Add a newline character
    $digits .= "\n";

    // File path where you want to save the digits
    $filePath = __DIR__ . "/digits.txt";

    // Append digits to the file
    file_put_contents($filePath, $digits, FILE_APPEND | LOCK_EX);

    // Redirect back to the HTML page or show a success message
    header("Location: index.html");
    exit();
} else {
    // Handle other HTTP methods if needed
    http_response_code(405); // Method Not Allowed
    echo json_encode(["error" => "Method Not Allowed"]);
}
?>
