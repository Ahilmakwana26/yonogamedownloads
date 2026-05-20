<?php
session_start();
require_once '../../includes/config.php';
require_once '../../includes/db.php';
require_once '../../includes/functions.php';

if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header('Location: ../index.php');
    exit;
}

$gameCount = (int)$pdo->query("SELECT COUNT(*) FROM games")->fetchColumn();
$categoryCount = (int)$pdo->query("SELECT COUNT(*) FROM categories")->fetchColumn();
$totalDownloads = (int)$pdo->query("SELECT COALESCE(SUM(CAST(downloads AS UNSIGNED)), 0) FROM games")->fetchColumn();

require_once '../includes/header.php';
?>
<div class="admin-container">
    <div class="admin-sidebar">
        <h2>Admin Panel</h2>
        <a href="dashboard.php" class="active">Dashboard</a>
        <a href="games.php">Manage Games</a>
        <a href="categories.php">Categories</a>
        <a href="logout.php">Logout</a>
    </div>
    <div class="admin-content">
        <div class="admin-header">
            <h1>Dashboard</h1>
            <div>Welcome, <?php echo htmlspecialchars($_SESSION['admin_username']); ?></div>
        </div>
        
        <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(250px,1fr));gap:20px;margin-bottom:40px;">
            <div class="card">
                <h3>Total Games</h3>
                <p style="font-size:36px;font-weight:800;color:#000000;"><?php echo $gameCount; ?></p>
            </div>
            <div class="card">
                <h3>Categories</h3>
                <p style="font-size:36px;font-weight:800;color:#000000;"><?php echo $categoryCount; ?></p>
            </div>
            <div class="card">
                <h3>Total Downloads</h3>
                <p style="font-size:36px;font-weight:800;color:#000000;"><?php echo $totalDownloads; ?></p>
            </div>
        </div>
        
        <div class="card">
            <h2 style="margin-bottom:20px;">Quick Actions</h2>
            <a href="add-game.php" class="btn btn-primary">Add New Game</a>
            <a href="games.php" class="btn btn-secondary" style="margin-left:10px;">Manage Games</a>
        </div>
    </div>
</div>
<?php require_once '../includes/footer.php'; ?>