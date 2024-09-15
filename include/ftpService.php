<?php 
function uploadToFtp($ftp_server, $ftp_username, $ftp_password, $local_file, $remote_file) {
    $conn_id = ftp_connect($ftp_server);
    $login_result = ftp_login($conn_id, $ftp_username, $ftp_password);

    if ((!$conn_id) || (!$login_result)) {
        die("FTP connection failed!");
    }

    // Enable passive mode (optional, depending on your server configuration)
    ftp_pasv($conn_id, true);

    if (ftp_put($conn_id, $remote_file, $local_file, FTP_BINARY)) {
        ftp_close($conn_id);
        return true;
    } else {
        ftp_close($conn_id);
        return false;
    } 
}

function deleteFromFtp($ftp_server, $ftp_username, $ftp_password, $remote_file) {
    $conn_id = ftp_connect($ftp_server);
    if (!$conn_id) {
        die("Could not connect to FTP server: $ftp_server");
    }
    $login_result = ftp_login($conn_id, $ftp_username, $ftp_password);

    if (!$login_result) {
        ftp_close($conn_id);
        die("FTP login failed with username: $ftp_username");
    }

    // Enable passive mode (optional, depending on your server configuration)
    ftp_pasv($conn_id, true);

    // Delete the file
    if (ftp_delete($conn_id, $remote_file)) {
        // Close the connection
        ftp_close($conn_id);
        return true;
    } else {
        // Close the connection
        ftp_close($conn_id);
        return false;
    }
}

?>