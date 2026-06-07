<?php

require_once 'config.php';


$success = '';
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
    if ($_POST['action'] === 'add') {
        $author = trim($_POST['author'] ?? '');
        $text = trim($_POST['text'] ?? '');
        if ($author === '' || $text === '') {
            $error = 'Заполните все поля';
        } elseif (mb_strlen($author) > 100) {
            $error = 'Имя не должно превышать 100 символов';
        } elseif (mb_strlen($text) > 2000) {
            $error = 'Сообщение не должно превышать 2000 символов';
        } else {
            $stmt = $pdo->prepare('INSERT INTO messages (author, text) VALUES (:author, :text)');
            $stmt->execute([
                'author' => $author,
                'text' => $text,
            ]);
            $success = 'Сообщение добавлено!';
            // Редирект, чтобы избежать повторной отправки (PRG)
            header('Location: ' . $_SERVER['REQUEST_URI']);
            exit;
        }
    }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">

    <title>guestbook</title>
</head>
<body>

    <div class="container">
        <header class="header">
            <h1>guestbook</h1>
            <p class="subtitle">Leave your message</p>
        </header>
        <?php if($success ?? false): ?>

            <div class="alert alert-success"><?= $success ?></div>
        <?php endif; ?>


        <form class="form" method="POST" id="guestbookForm">
            <input type="hidden" name="action" value="add">
                <div class="form-group">
                    <label for="author">Ваше имя</label>
                    <input type="text" id="author" name="author" maxlength="100" required placeholder="Введите имя...">
                </div>

                <div class="form-group">
                    <label for="text">Сообщение</label>
                    <textarea id="text" name="text" maxlength="2000" rows="4" required placeholder="Напишите что-нибудь..."></textarea>
                    <small class="counter"><span id="charCount">0</span>/2000</small>
                </div>

                <button type="submit" class="btn">Отправить</button>
        </form>
    </div>

</body>
</html>