<?php
session_start();
if (!isset($_SESSION['wardrobe'])) {
    $_SESSION['wardrobe'] = [];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['wardrobe_img'])) {
    $targetDir = "images/wardrobe/";
    if (!file_exists($targetDir)) {
        mkdir($targetDir, 0777, true);
    }
    $fileName = time() . "_" . basename($_FILES['wardrobe_img']['name']);
    $targetFile = $targetDir . $fileName;

    if (move_uploaded_file($_FILES['wardrobe_img']['tmp_name'], $targetFile)) {
        $_SESSION['wardrobe'][] = $fileName;
    }
    header("Location: wardrobe.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['image_url'])) {
    $url = $_POST['image_url'];
    $imgData = file_get_contents($url);
    if ($imgData !== false) {
        $fileName = time() . "_urlimg.jpg";
        $targetDir = "images/wardrobe/";
        if (!file_exists($targetDir)) {
            mkdir($targetDir, 0777, true);
        }
        file_put_contents($targetDir . $fileName, $imgData);
        $_SESSION['wardrobe'][] = $fileName;
    }
    header("Location: wardrobe.php");
    exit;
}


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['remove_img'])) {
    $remove = $_POST['remove_img'];
    $_SESSION['wardrobe'] = array_diff($_SESSION['wardrobe'], [$remove]);
    header("Location: wardrobe.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Virtual Wardrobe</title>
  <link rel="stylesheet" href="wardrobe.css">
</head>
<body>

<div class="container">
  <h1 class="page-title">👗 My Virtual Wardrobe</h1>

 
  <form method="post" enctype="multipart/form-data" class="upload-box">
    <label>Upload from your device:</label>
    <input type="file" name="wardrobe_img" required>
    <button type="submit">Upload</button>
  </form>

 
  <form method="post" class="upload-box">
    <label>Or add from Google/Image URL:</label>
    <input type="text" name="image_url" placeholder="Paste image URL" required>
    <button type="submit">Add</button>
  </form>

  <?php if (empty($_SESSION['wardrobe'])): ?>
    <p class="empty">Your wardrobe is empty. Upload some clothes to get started!</p>
  <?php else: ?>
    <div class="grid">
      <?php foreach ($_SESSION['wardrobe'] as $img): ?>
        <div class="card">
          <img src="images/wardrobe/<?php echo htmlspecialchars($img); ?>" alt="Wardrobe Item">
          <form method="post" style="margin:0;">
            <input type="hidden" name="remove_img" value="<?php echo $img; ?>">
            <button type="submit" class="remove-btn">❌ Remove</button>
          </form>
        </div>
      <?php endforeach; ?>
    </div>
  <?php endif; ?>
</div>

</body>
</html>
