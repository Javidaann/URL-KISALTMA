<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>URL Kısaltma</title>
</head>
<body>
    <div style="text-align:center; margin-top:50px;">
        <form action="shorten.php" method="post">
            <input type="text" name="url" placeholder="URL'yi yapıştırın" required>
            <button type="submit">Kısalt</button>
        </form>
        <?php if (isset($error)): ?>
            <p style="color:red;"><?= htmlspecialchars($error) ?></p>
        <?php endif; ?>
        <?php if (isset($shortUrl)): ?>
            <p>Kısaltılmış URL: <a href="<?= htmlspecialchars($shortUrl) ?>"><?= htmlspecialchars($shortUrl) ?></a></p>
        <?php endif; ?>
    </div>
</body>
</html>
