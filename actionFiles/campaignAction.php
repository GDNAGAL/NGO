<?php
require_once("../include/session.php");

try {
    if (isset($_GET['ACTION']) && isset($_GET['campaignID'])) {
        $action = intval($_GET['ACTION']); // Ensure the action is an integer
        $campaignID = intval($_GET['campaignID']); // Ensure the campaign ID is an integer

        // Prepare the update query
        $query = "UPDATE `campaigns` SET `Status` = ? WHERE `ID` = ?";
        $stmt = $conn->prepare($query);
        if (!$stmt) {
            throw new Exception("Database error: Failed to prepare the statement.");
        }

        $stmt->bind_param("ii", $action, $campaignID);

        // Execute the update
        if (!$stmt->execute()) {
            throw new Exception("Database error: Failed to execute the statement. " . $stmt->error);
        }

        // Set a success message
        $_SESSION['success'] = "Status Updated Successfully.";

        // Redirect to the return URL if provided
        if (isset($_GET['returnURL'])) {
            $returnURL = filter_var($_GET['returnURL'], FILTER_SANITIZE_URL);
            header("Location: " . $returnURL);
        } else {
            header("Location: ../Dashboard");
        }

    } else {
        throw new Exception("Invalid request: Missing required parameters.");
    }
} catch (Exception $e) {
    // Log the error (you can replace this with a logging mechanism of your choice)
    error_log($e->getMessage(), 3, "../logs/error.log");

    // Set an error message for the session
    $_SESSION['error'] = "An error occurred: " . $e->getMessage();

    // Redirect to an error page or the dashboard
    header("Location: ../Dashboard");
} finally {
    // Ensure resources are always closed
    if (isset($stmt) && $stmt instanceof mysqli_stmt) {
        $stmt->close();
    }
    $conn->close();
}
?>
