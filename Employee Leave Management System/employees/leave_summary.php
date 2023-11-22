<!-- leave_summary.php -->

<?php
include('../includes/dbconn.php'); // Include the database connection file
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leave Summary</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .leave-summary {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .leave-summary h2 {
            color: #333;
        }

        .leave-summary p {
            margin: 10px 0;
            color: #666;
        }
    </style>
</head>
<body>

<?php
if (isset($_SESSION['emplogin']) && strlen($_SESSION['emplogin']) > 0) {
    $empid = $_SESSION['eid'];

    // Fetch leave data from the database for the logged-in employee
    $sql = "SELECT * FROM tblleaves WHERE empid = :empid";
    $query = $dbh->prepare($sql);
    $query->bindParam(':empid', $empid, PDO::PARAM_INT);
    $query->execute();
    $leaveData = $query->fetchAll(PDO::FETCH_ASSOC);

    // Calculate total leaves taken
    $totalLeaves = count($leaveData);

    // Set the predefined leave quota
    $allowedLeaves = 8; // You can replace this with the actual allowed leaves for each employee

    // Calculate remaining leaves
    $remainingLeaves = $allowedLeaves - $totalLeaves;
    ?>

    <div class="leave-summary">
        <h2>Leave Summary</h2>
        <p>Total Leaves Taken: <?php echo $totalLeaves; ?></p>
        <p>Remaining Leaves: <?php echo $remainingLeaves; ?></p>
    </div>

<?php } ?>

</body>
</html>
