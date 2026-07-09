<?php
require_once 'db.php';

function sanitizeInput($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function generateSlug($string) {
    $string = strtolower(trim($string));
    $string = preg_replace('/[^a-z0-9-]/', '-', $string);
    $string = preg_replace('/-+/', '-', $string);
    return $string;
}

function getGameImageUrl($imagePath) {
    if (empty($imagePath)) {
        return 'https://coresg-normal.trae.ai/api/ide/v1/text_to_image?prompt=modern%20casino%20game%20logo%20dark%20theme&image_size=square_hd';
    }
    
    // Check if it's already a full URL
    if (filter_var($imagePath, FILTER_VALIDATE_URL)) {
        return $imagePath;
    }
    
    // If it's just a filename (e.g., 'image.jpg'), prepend SITE_URL and uploads path
    if (strpos($imagePath, '/') === false) {
        return SITE_URL . '/uploads/' . $imagePath;
    }
    
    // If it's a relative path (e.g., 'uploads/image.jpg'), prepend SITE_URL
    return SITE_URL . '/' . ltrim($imagePath, '/');
}

function getGames($category = null, $limit = null, $offset = 0) {
    global $pdo;
    $sql = "SELECT g.*, c.name as category_name FROM games g LEFT JOIN categories c ON g.category_id = c.id";
    if ($category) {
        $sql .= " WHERE c.name = :category";
    }
    $sql .= " ORDER BY g.id DESC";
    if ($limit) {
        $sql .= " LIMIT " . (int)$limit . " OFFSET " . (int)$offset;
    }
    $stmt = $pdo->prepare($sql);
    if ($category) {
        $stmt->execute([':category' => $category]);
    } else {
        $stmt->execute();
    }
    return $stmt->fetchAll();
}

function getGameBySlug($slug) {
    global $pdo;
    $sql = "SELECT g.*, c.name as category_name FROM games g LEFT JOIN categories c ON g.category_id = c.id WHERE g.slug = :slug";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':slug' => $slug]);
    return $stmt->fetch();
}

function getCategories() {
    global $pdo;
    $stmt = $pdo->query("SELECT * FROM categories ORDER BY id");
    return $stmt->fetchAll();
}

function incrementDownloads($gameId) {
    global $pdo;
    $stmt = $pdo->prepare("UPDATE games SET downloads = downloads + 1 WHERE id = :id");
    $stmt->execute([':id' => $gameId]);
}
?>