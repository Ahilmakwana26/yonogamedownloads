<?php
session_start();
require_once '../../includes/config.php';
require_once '../../includes/db.php';
require_once '../../includes/functions.php';

if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header('Location: ../index.php');
    exit;
}

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    header('Location: games.php');
    exit;
}

$gameId = (int)$_GET['id'];
$stmt = $pdo->prepare("SELECT * FROM games WHERE id = :id");
$stmt->execute([':id' => $gameId]);
$game = $stmt->fetch();

if (!$game) {
    header('Location: games.php');
    exit;
}

$success = '';
$error = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = sanitizeInput($_POST['title']);
    $slug = generateSlug($title);
    $description = sanitizeInput($_POST['description']);
    $bonus = sanitizeInput($_POST['bonus']);
    $withdraw = sanitizeInput($_POST['withdraw']);
    $category_id = isset($_POST['category_id']) ? (int)$_POST['category_id'] : null;
    $download_link = sanitizeInput($_POST['download_link']);
    $version = sanitizeInput($_POST['version']);
    $size = sanitizeInput($_POST['size']);
    $downloads = isset($_POST['downloads']) ? (int)$_POST['downloads'] : 0;
    $meta_title = sanitizeInput($_POST['meta_title']);
    $meta_description = sanitizeInput($_POST['meta_description']);
    $meta_keyword = sanitizeInput($_POST['meta_keyword']);
    $rating = isset($_POST['rating']) ? sanitizeInput($_POST['rating']) : '4.5';
    
    $image = $game['image'];
    
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $uploadDir = '../../uploads/';
        if (!file_exists($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }
        
        $fileName = uniqid() . '_' . basename($_FILES['image']['name']);
        $targetFile = $uploadDir . $fileName;
        
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
        $allowedTypes = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
        
        if (in_array($imageFileType, $allowedTypes)) {
            if (move_uploaded_file($_FILES['image']['tmp_name'], $targetFile)) {
                $image = SITE_URL . '/uploads/' . $fileName;
            }
        }
    }
    
    try {
        $stmt = $pdo->prepare("UPDATE games SET title = :title, slug = :slug, description = :description, image = :image, bonus = :bonus, withdraw = :withdraw, category_id = :category_id, download_link = :download_link, version = :version, size = :size, downloads = :downloads, meta_title = :meta_title, meta_description = :meta_description, meta_keyword = :meta_keyword, rating = :rating WHERE id = :id");
        $stmt->execute([
            ':title' => $title,
            ':slug' => $slug,
            ':description' => $description,
            ':image' => $image,
            ':bonus' => $bonus,
            ':withdraw' => $withdraw,
            ':category_id' => $category_id,
            ':download_link' => $download_link,
            ':version' => $version,
            ':size' => $size,
            ':downloads' => $downloads,
            ':meta_title' => $meta_title,
            ':meta_description' => $meta_description,
            ':meta_keyword' => $meta_keyword,
            ':rating' => $rating,
            ':id' => $gameId
        ]);
        $success = 'Game updated successfully!';
        $stmt = $pdo->prepare("SELECT * FROM games WHERE id = :id");
        $stmt->execute([':id' => $gameId]);
        $game = $stmt->fetch();
    } catch(PDOException $e) {
        $error = 'Error: ' . $e->getMessage();
    }
}

$categories = getCategories();

require_once '../includes/header.php';
?>
<div class="admin-container">
    <div class="admin-sidebar">
        <h2>Admin Panel</h2>
        <a href="dashboard.php">Dashboard</a>
        <a href="games.php">Manage Games</a>
        <a href="categories.php">Categories</a>
        <a href="logout.php">Logout</a>
    </div>
    <div class="admin-content">
        <div class="admin-header">
            <h1>Edit Game</h1>
            <a href="games.php" class="btn btn-secondary">Back to Games</a>
        </div>
        
        <div class="card">
            <?php if ($success): ?>
                <div class="success"><?php echo $success; ?></div>
            <?php endif; ?>
            <?php if ($error): ?>
                <div class="error"><?php echo $error; ?></div>
            <?php endif; ?>
            
            <form method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Game Title</label>
                    <input type="text" name="title" id="gameTitle" value="<?php echo htmlspecialchars($game['title']); ?>" required>
                </div>
                <div class="form-group">
                    <label>Slug (Auto-generated)</label>
                    <input type="text" name="slug" id="gameSlug" value="<?php echo htmlspecialchars($game['slug']); ?>" disabled style="background:#F5F5F5;">
                </div>
                <div class="form-group">
                    <label>Current Game Logo</label>
                    <?php if ($game['image']): ?>
                        <img src="<?php echo htmlspecialchars($game['image']); ?>" style="width:120px;height:120px;object-fit:cover;border-radius:12px;margin-bottom:10px;">
                    <?php endif; ?>
                </div>
                <div class="form-group">
                    <label>Update Game Image</label>
                    <input type="file" name="image" accept="image/*">
                </div>
                <div class="form-group">
                    <label>Description</label>
                    <textarea name="description"><?php echo htmlspecialchars($game['description'] ?? ''); ?></textarea>
                </div>
                <div class="form-group">
                    <label>Sign Up Bonus (₹)</label>
                    <input type="text" name="bonus" value="<?php echo htmlspecialchars($game['bonus'] ?? '500'); ?>">
                </div>
                <div class="form-group">
                    <label>Min. Withdraw (₹)</label>
                    <input type="text" name="withdraw" value="<?php echo htmlspecialchars($game['withdraw'] ?? '100'); ?>">
                </div>
                <div class="form-group">
                    <label>Category</label>
                    <select name="category_id">
                        <option value="">Select Category</option>
                        <?php foreach($categories as $cat): ?>
                            <option value="<?php echo $cat['id']; ?>" <?php echo ($game['category_id'] == $cat['id']) ? 'selected' : ''; ?>><?php echo htmlspecialchars($cat['name']); ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Download Link</label>
                    <input type="url" name="download_link" value="<?php echo htmlspecialchars($game['download_link'] ?? ''); ?>">
                </div>
                <div class="form-group">
                    <label>Version</label>
                    <input type="text" name="version" value="<?php echo htmlspecialchars($game['version'] ?? ''); ?>">
                </div>
                <div class="form-group">
                    <label>Size</label>
                    <input type="text" name="size" value="<?php echo htmlspecialchars($game['size'] ?? ''); ?>">
                </div>
                <div class="form-group">
                    <label>Downloads</label>
                    <input type="number" name="downloads" value="<?php echo htmlspecialchars($game['downloads'] ?? '0'); ?>">
                </div>
                <div class="form-group">
                    <label>Meta Title</label>
                    <input type="text" name="meta_title" value="<?php echo htmlspecialchars($game['meta_title'] ?? ''); ?>">
                </div>
                <div class="form-group">
                    <label>Meta Description</label>
                    <textarea name="meta_description"><?php echo htmlspecialchars($game['meta_description'] ?? ''); ?></textarea>
                </div>
                <div class="form-group">
                    <label>Meta Keywords</label>
                    <input type="text" name="meta_keyword" value="<?php echo htmlspecialchars($game['meta_keyword'] ?? ''); ?>" placeholder="e.g., yono game, rummy, teen patti">
                </div>
                <div class="form-group">
                    <label>Rating (1-5)</label>
                    <input type="text" name="rating" value="<?php echo htmlspecialchars($game['rating'] ?? '4.5'); ?>" placeholder="4.5">
                </div>
                <button type="submit" class="btn btn-primary">Update Game</button>
            </form>
        </div>
    </div>
</div>
<script>
document.getElementById('gameTitle').addEventListener('input', function() {
    const title = this.value.toLowerCase();
    const slug = title.replace(/[^a-z0-9-]/g, '-').replace(/-+/g, '-');
    document.getElementById('gameSlug').value = slug;
});
</script>
<?php require_once '../includes/footer.php'; ?>