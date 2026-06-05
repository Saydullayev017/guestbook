<?php

require_once 'config.php';

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