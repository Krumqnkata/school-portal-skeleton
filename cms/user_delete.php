<?php
require_once __DIR__ . "/private/db.php";
require_once "roles.php";
session_start();

// Проверка дали е логнат администратор
if (!isset($_SESSION['username'], $_SESSION['session_key'], $_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

// Вземаме permissions за текущия потребител
$current_user_id = $_SESSION['user_id'];
$stmt = $conn->prepare("SELECT * FROM permissions WHERE user_id = ?");
$stmt->bind_param("i", $current_user_id);
$stmt->execute();
$row = $stmt->get_result()->fetch_assoc();
$stmt->close();

// Създаваме инстанция на User
$user = new User($row);

// Проверка дали има право да изтрива
if (!$user->user_delete()) {
    die("<script>alert('Нямате право да изтривате потребители!'); window.history.back();</script>");
}

// Проверка дали е изпратено ID чрез POST
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $userId = (int)$_POST['id']; // принуждаваме към int за безопасност

    // Пропускаме изтриването на себе си
    if ($userId === $_SESSION['user_id']) {
        die("<script>alert('Не може да изтриете себе си!'); window.history.back();</script>");
    }

    // Подготвяме заявка за изтриване
    $stmt = $conn->prepare("DELETE FROM users WHERE id = ?");
    if (!$stmt) {
        die("<script>alert('Грешка при подготовка на заявката: " . $conn->error . "'); window.history.back();</script>");
    }
    
    $stmt->bind_param('i', $userId);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        $stmt->close();
        header("Location: users.php?deleted=1");
        exit();
    } else {
        $stmt->close();
        die("<script>alert('Потребителят не съществува или вече е изтрит.'); window.history.back();</script>");
    }

} else {
    die("<script>alert('Невалидна заявка.'); window.history.back();</script>");
}
