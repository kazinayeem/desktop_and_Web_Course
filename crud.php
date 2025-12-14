<?php
require_once 'db_config.php';


$message = '';


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['action'])) {
        $action = $_POST['action'];
        
       
        if ($action == 'create') {
            $name = mysqli_real_escape_string($conn, $_POST['name']);
            $email = mysqli_real_escape_string($conn, $_POST['email']);
            $phone = mysqli_real_escape_string($conn, $_POST['phone']);
            
            $sql = "INSERT INTO users (name, email, phone) VALUES ('$name', '$email', '$phone')";
            if (mysqli_query($conn, $sql)) {
                $message = "<div class='alert alert-success'>Record created successfully!</div>";
            } else {
                $message = "<div class='alert alert-error'>Error: " . mysqli_error($conn) . "</div>";
            }
        }
        
      
        if ($action == 'update') {
            $id = $_POST['id'];
            $name = mysqli_real_escape_string($conn, $_POST['name']);
            $email = mysqli_real_escape_string($conn, $_POST['email']);
            $phone = mysqli_real_escape_string($conn, $_POST['phone']);
            
            $sql = "UPDATE users SET name='$name', email='$email', phone='$phone' WHERE id=$id";
            if (mysqli_query($conn, $sql)) {
                $message = "<div class='alert alert-success'>Record updated successfully!</div>";
            } else {
                $message = "<div class='alert alert-error'>Error: " . mysqli_error($conn) . "</div>";
            }
        }
        
       
        if ($action == 'delete') {
            $id = $_POST['id'];
            $sql = "DELETE FROM users WHERE id=$id";
            if (mysqli_query($conn, $sql)) {
                $message = "<div class='alert alert-success'>Record deleted successfully!</div>";
            } else {
                $message = "<div class='alert alert-error'>Error: " . mysqli_error($conn) . "</div>";
            }
        }
    }
}


$editUser = null;
if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $result = mysqli_query($conn, "SELECT * FROM users WHERE id=$id");
    $editUser = mysqli_fetch_assoc($result);
}


$sql = "SELECT * FROM users ORDER BY id DESC";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Application - PHP & MySQL</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            padding: 20px;
            min-height: 100vh;
        }
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
            background: white;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.3);
        }
        
        h1 {
            text-align: center;
            color: #667eea;
            margin-bottom: 30px;
            font-size: 2.5rem;
        }
        
        .alert {
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 5px;
            font-weight: bold;
        }
        
        .alert-success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }
        
        .alert-error {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
        
        .form-container {
            background: #f8f9fa;
            padding: 25px;
            border-radius: 8px;
            margin-bottom: 30px;
        }
        
        .form-container h2 {
            color: #333;
            margin-bottom: 20px;
        }
        
        .form-group {
            margin-bottom: 15px;
        }
        
        label {
            display: block;
            margin-bottom: 5px;
            color: #555;
            font-weight: 600;
        }
        
        input[type="text"],
        input[type="email"],
        input[type="tel"] {
            width: 100%;
            padding: 12px;
            border: 2px solid #ddd;
            border-radius: 5px;
            font-size: 14px;
            transition: border-color 0.3s;
        }
        
        input[type="text"]:focus,
        input[type="email"]:focus,
        input[type="tel"]:focus {
            outline: none;
            border-color: #667eea;
        }
        
        button {
            padding: 12px 30px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            font-weight: bold;
            transition: all 0.3s;
        }
        
        .btn-primary {
            background: #667eea;
            color: white;
        }
        
        .btn-primary:hover {
            background: #5568d3;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.4);
        }
        
        .btn-warning {
            background: #ffc107;
            color: #333;
            padding: 8px 15px;
            font-size: 14px;
        }
        
        .btn-warning:hover {
            background: #e0a800;
        }
        
        .btn-danger {
            background: #dc3545;
            color: white;
            padding: 8px 15px;
            font-size: 14px;
        }
        
        .btn-danger:hover {
            background: #c82333;
        }
        
        .btn-cancel {
            background: #6c757d;
            color: white;
            margin-left: 10px;
        }
        
        .btn-cancel:hover {
            background: #5a6268;
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background: white;
        }
        
        table thead {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
        }
        
        table th {
            padding: 15px;
            text-align: left;
            font-weight: 600;
        }
        
        table td {
            padding: 12px 15px;
            border-bottom: 1px solid #ddd;
        }
        
        table tbody tr:hover {
            background-color: #f8f9fa;
        }
        
        table tbody tr:last-child td {
            border-bottom: none;
        }
        
        .actions {
            display: flex;
            gap: 10px;
        }
        
        .no-records {
            text-align: center;
            padding: 40px;
            color: #999;
            font-size: 18px;
        }
        
        @media (max-width: 768px) {
            table {
                font-size: 14px;
            }
            
            .actions {
                flex-direction: column;
            }
            
            h1 {
                font-size: 2rem;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>📋 CRUD Application</h1>
        
        <?php echo $message; ?>
        
        <div class="form-container">
            <h2><?php echo $editUser ? '✏️ Edit User' : '➕ Add New User'; ?></h2>
            <form method="POST" action="crud.php">
                <input type="hidden" name="action" value="<?php echo $editUser ? 'update' : 'create'; ?>">
                <?php if ($editUser): ?>
                    <input type="hidden" name="id" value="<?php echo $editUser['id']; ?>">
                <?php endif; ?>
                
                <div class="form-group">
                    <label for="name">Full Name:</label>
                    <input type="text" id="name" name="name" value="<?php echo $editUser ? htmlspecialchars($editUser['name']) : ''; ?>" required>
                </div>
                
                <div class="form-group">
                    <label for="email">Email Address:</label>
                    <input type="email" id="email" name="email" value="<?php echo $editUser ? htmlspecialchars($editUser['email']) : ''; ?>" required>
                </div>
                
                <div class="form-group">
                    <label for="phone">Phone Number:</label>
                    <input type="tel" id="phone" name="phone" value="<?php echo $editUser ? htmlspecialchars($editUser['phone']) : ''; ?>" required>
                </div>
                
                <button type="submit" class="btn-primary">
                    <?php echo $editUser ? 'Update User' : 'Add User'; ?>
                </button>
                <?php if ($editUser): ?>
                    <a href="crud.php"><button type="button" class="btn-cancel">Cancel</button></a>
                <?php endif; ?>
            </form>
        </div>
        
      
        <h2>Users List</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (mysqli_num_rows($result) > 0): ?>
                    <?php while($row = mysqli_fetch_assoc($result)): ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo htmlspecialchars($row['name']); ?></td>
                            <td><?php echo htmlspecialchars($row['email']); ?></td>
                            <td><?php echo htmlspecialchars($row['phone']); ?></td>
                            <td>
                                <div class="actions">
                                    <a href="crud.php?edit=<?php echo $row['id']; ?>">
                                        <button class="btn-warning">Edit</button>
                                    </a>
                                    <form method="POST" action="crud.php" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this record?');">
                                        <input type="hidden" name="action" value="delete">
                                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                        <button type="submit" class="btn-danger">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5" class="no-records">No records found. Add your first user above!</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>
</html>

<?php
mysqli_close($conn);
?>
