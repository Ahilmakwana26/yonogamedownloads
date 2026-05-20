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