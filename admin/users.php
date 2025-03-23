<?php
include("top.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registered Users</title>
    <link rel="stylesheet" href="..\css\style5.css"> <!-- Linking the external CSS file -->
    <style>
        /* Define a CSS class for the delete button */
        .delete-button {
            background-color: #f44336; /* Red background color */
            color: white; /* White text color */
            border: none;
            padding: 8px 12px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 14px;
            cursor: pointer;
            border-radius: 4px;
        }
    </style>
</head>
<body>

<?php
include("connection.php");

// Function to delete a record by ID
function deleteRecord($con, $id) {
    $query = "DELETE FROM `registered_users` WHERE id = $id";
    $result = mysqli_query($con, $query);
    return $result;
}

// Check if the delete button is clicked
if (isset($_POST['delete_id'])) {
    $delete_id = $_POST['delete_id'];
    if (deleteRecord($con, $delete_id)) {
        echo "<script>alert('Record deleted successfully');</script>";
    } else {
        echo "<script>alert('Error deleting record');</script>";
    }
}

// Select all data from the 'registered_users' table
$query = "SELECT * FROM `registered_users`";
$result = mysqli_query($con, $query);

// Check if the query was successful
if ($result) {
    echo '<table>';
    echo '<tr><th>Full Name</th><th>User Name</th><th>Email</th><th>Account created at</th><th>Action</th></tr>';

    // Loop through the result set and display data
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<tr>';
        echo '<td>' . $row['full_name'] . '</td>';
        echo '<td>' . $row['username'] . '</td>';
        echo '<td>' . $row['email'] . '</td>';
        echo '<td>' . $row['created_at'] . '</td>';
        echo '<td>';
        echo '<form method="POST" onsubmit="return confirm(\'Are you sure you want to delete this record?\');">';
        echo '<input type="hidden" name="delete_id" value="' . $row['id'] . '">';
        echo '<button type="submit" class="delete-button">Delete</button>'; // Added class for styling
        echo '</form>';
        echo '</td>';
        echo '</tr>';
    }

    echo '</table>';
} else {
    echo "Error in fetching data: " . mysqli_error($con);
}

// Close the connection
mysqli_close($con);
?>

<?php
include("bottom.php");
?>

</body>
</html>
