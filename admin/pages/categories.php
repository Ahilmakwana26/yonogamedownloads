<?php
session_start();
require_once '../../includes/config.php';
require_once '../../includes/db.php';
require_once '../../includes/functions.php';

if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header('Location: ../index.php');
    exit;
}

$success = '';
$error = '';
$editingCategory = null;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['add_category'])) {
        $name = sanitizeInput($_POST['name']);
        try {
            $stmt = $pdo->prepare("INSERT INTO categories (name) VALUES (:name)");
            $stmt->execute([':name' => $name]);
            $success = 'Category added successfully!';
        } catch(PDOException $e) {
            $error = 'Error: ' . $e->getMessage();
        }
    } elseif (isset($_POST['edit_category'])) {
        $id = (int)$_POST['category_id'];
        $name = sanitizeInput($_POST['name']);
        try {
            $stmt = $pdo->prepare("UPDATE categories SET name = :name WHERE id = :id");
            $stmt->execute([':name' => $name, ':id' => $id]);
            $success = 'Category updated successfully!';
        } catch(PDOException $e) {
            $error = 'Error: ' . $e->getMessage();
        }
    }
}

if (isset($_GET['delete']) && is_numeric($_GET['delete'])) {
    $stmt = $pdo->prepare("DELETE FROM categories WHERE id = :id");
    $stmt->execute([':id' => $_GET['delete']]);
    header('Location: categories.php');
    exit;
}

if (isset($_GET['edit']) && is_numeric($_GET['edit'])) {
    $stmt = $pdo->prepare("SELECT * FROM categories WHERE id = :id");
    $stmt->execute([':id' => $_GET['edit']]);
    $editingCategory = $stmt->fetch();
}

$categories = getCategories();

require_once '../includes/header.php';
?>
<div class="admin-container">
    <div class="admin-sidebar">
        <h2>Admin Panel</h2>
        <a href="dashboard.php">Dashboard</a>
        <a href="games.php">Manage Games</a>
        <a href="categories.php" class="active">Categories</a>
        <a href="logout.php">Logout</a>
    </div>
    <div class="admin-content">
        <div class="admin-header">
            <h1>Manage Categories</h1>
        </div>
        
        <?php if ($success): ?>
            <div class="success"><?php echo $success; ?></div>
        <?php endif; ?>
        <?php if ($error): ?>
            <div class="error"><?php echo $error; ?></div>
        <?php endif; ?>
        
        <div class="card" style="margin-bottom:30px;">
            <h3 style="margin-bottom:20px;"><?php echo $editingCategory ? 'Edit Category' : 'Add New Category'; ?></h3>
            <form method="POST" style="display:flex;gap:10px;flex-wrap:wrap;">
                <?php if ($editingCategory): ?>
                    <input type="hidden" name="category_id" value="<?php echo $editingCategory['id']; ?>">
                <?php endif; ?>
                <input type="text" name="name" placeholder="Category Name" style="flex:1;min-width:200px;" value="<?php echo $editingCategory ? htmlspecialchars($editingCategory['name']) : ''; ?>" required>
                <button type="submit" name="<?php echo $editingCategory ? 'edit_category' : 'add_category'; ?>" class="btn btn-primary">
                    <?php echo $editingCategory ? 'Update' : 'Add'; ?>
                </button>
                <?php if ($editingCategory): ?>
                    <a href="categories.php" class="btn btn-secondary">Cancel</a>
                <?php endif; ?>
            </form>
        </div>
        
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($categories as $cat): ?>
                    <tr>
                        <td><?php echo $cat['id']; ?></td>
                        <td><?php echo htmlspecialchars($cat['name']); ?></td>
                        <td>
                            <a href="categories.php?edit=<?php echo $cat['id']; ?>" class="btn btn-secondary" style="padding:6px 12px;font-size:14px;">Edit</a>
                            <a href="categories.php?delete=<?php echo $cat['id']; ?>" class="btn btn-danger" style="padding:6px 12px;font-size:14px;" onclick="return confirm('Are you sure?')">Delete</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php require_once '../includes/footer.php'; ?>