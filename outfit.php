<?php
session_start();
if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit;
}


$folder = __DIR__ . "/images/outfit/";
$files = array_diff(scandir($folder), array('.', '..')); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Outfit Suggestions</title>
  <link rel="stylesheet" href="outfit.css"> 
</head>
<body>

<div class="container">
  <h1 class="page-title">Outfit Suggestions</h1>

  <div class="grid">
  <?php foreach($files as $file): ?>
    <?php if(preg_match('/\.(jpg|jpeg|png|gif)$/i',$file)): ?>
      <div class="card">
        <img src="images/outfit/<?php echo $file; ?>" alt="Outfit">
        <div class="buttons">
          <form method="post" action="add_favorite.php" style="margin:0;">
            <input type="hidden" name="outfit_img" value="<?php echo $file; ?>">
            <button type="submit" class="fav-btn">❤️ Favorite</button>
          </form>
          <form method="post" action="wardrobe.php" style="margin:0;">
            <input type="hidden" name="outfit_img" value="<?php echo $file; ?>">
            <button type="submit" class="wardrobe-btn">👕 Wardrobe</button>
          </form>
        </div>
      </div>
    <?php endif; ?>
  <?php endforeach; ?>
  </div>
</div>

</body>
</html>
