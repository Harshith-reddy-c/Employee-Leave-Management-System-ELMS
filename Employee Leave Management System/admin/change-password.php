<?php
session_start();
include('../includes/dbconn.php');

if(isset($_POST['change_password'])) {
    $current_password = $_POST['current_password'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    // Validate the current password (you may need to fetch the current password from the database)
    $user_id = $_SESSION['user_id']; // Assuming user_id is stored in the session
    $current_password_from_db = getPasswordFromDatabase($user_id); // Replace with your function to fetch the password
    if(!password_verify($current_password, $current_password_from_db)) {
        $_SESSION['error'] = "Current password is incorrect.";
        header('Location: change-password.php');
        exit();
    }

    // Validate the new password
    if($new_password !== $confirm_password) {
        $_SESSION['error'] = "New password and confirm password do not match.";
        header('Location: change-password.php');
        exit();
    }

    // Update the password in the database
    $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
    updatePasswordInDatabase($user_id, $hashed_password); // Replace with your function to update the password

    $_SESSION['success'] = "Password changed successfully.";
    header('Location: dashboard.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>
</head>

<body>
    <h2>Change Password</h2>

    <?php
    if(isset($_SESSION['error'])) {
        echo '<p style="color: red;">' . $_SESSION['error'] . '</p>';
        unset($_SESSION['error']);
    }

    if(isset($_SESSION['success'])) {
        echo '<p style="color: green;">' . $_SESSION['success'] . '</p>';
        unset($_SESSION['success']);
    }
    ?>

    <form method="post" action="">
        <label for="current_password">Current Password:</label>
        <input type="password" name="current_password" required>

        <label for="new_password">New Password:</label>
        <input type="password" name="new_password" required>

        <label for="confirm_password">Confirm Password:</label>
        <input type="password" name="confirm_password" required>

        <button type="submit" name="change_password">Change Password</button>
        
    </form>
    <button type="submit" href="dashboard.php">Exit</button>
</body>

</html>
