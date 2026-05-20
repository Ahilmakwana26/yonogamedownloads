<?php
session_start();
require_once '../../includes/config.php';
require_once '../../includes/db.php';
require_once '../../includes/functions.php';

if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header('Location: ../index.php');
    exit;
}

if (isset($_GET['delete']) && is_numeric($_GET['delete'])) {
    $stmt = $pdo->prepare("DELETE FROM games WHERE id = :id");
    $stmt->execute([':id' => $_GET['delete']]);
    header('Location: games.php');
    exit;
}

$games = getGames();

require_once '../includes/header.php';
?>
<div class="admin-container">
    <div class="admin-sidebar">
        <h2>Admin Panel</h2>
        <a href="dashboard.php">Dashboard</a>
        <a href="games.php" class="active">Manage Games</a>
        <a href="categories.php">Categories</a>
        <a href="logout.php">Logout</a>
    </div>
    <div class="admin-content">
        <div class="admin-header">
            <h1>Manage Games</h1>
            <a href="add-game.php" class="btn btn-primary">Add New Game</a>
        </div>
        
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Downloads</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($games as $game): ?>
                    <tr>
                        <td><?php echo $game['id']; ?></td>
                        <td><?php echo htmlspecialchars($game['title']); ?></td>
                        <td><?php echo htmlspecialchars($game['category_name'] ?? '-'); ?></td>
                        <td><?php echo htmlspecialchars($game['downloads'] ?? '0'); ?></td>
                        <td>
                            <a href="edit-game.php?id=<?php echo $game['id']; ?>" class="btn btn-secondary" style="padding:6px 12px;font-size:14px;">Edit</a>
                            <a href="games.php?delete=<?php echo $game['id']; ?>" class="btn btn-danger" style="padding:6px 12px;font-size:14px;" onclick="return confirm('Are you sure?')">Delete</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php require_once '../includes/footer.php'; ?>