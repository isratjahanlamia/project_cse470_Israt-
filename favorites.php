<?php
session_start();
if (!isset($_SESSION['favorites'])) {
    $_SESSION['favorites'] = [];
}


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['remove_img'])) {
    $img = $_POST['remove_img'];
    $_SESSION['favorites'] = array_diff($_SESSION['favorites'], [$img]);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>My Favorites</title>
  <link rel="stylesheet" href="favorites.css">
</head>
<body>

<div class="container">
  <h1 class="page-title">💖 My Favorite Outfits</h1>

  <?php if (empty($_SESSION['favorites'])): ?>
    <p class="empty">You haven’t added any favorites yet. Go to <a href="outfit.php">Outfit Suggestions</a> and add some!</p>
  <?php else: ?>
    <div class="grid">
      <?php foreach ($_SESSION['favorites'] as $fav): ?>
        <div class="card">
          <img src="images/outfit/<?php echo htmlspecialchars($fav); ?>" alt="Favorite Outfit">
          <form method="post" style="margin:0;">
            <input type="hidden" name="remove_img" value="<?php echo $fav; ?>">
            <button type="submit" class="remove-btn">❌ Remove</button>
          </form>
        </div>
      <?php endforeach; ?>
    </div>
  <?php endif; ?>
</div>

</body>
</html>
