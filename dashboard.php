<?php
session_start();
if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Virtual Fashion Stylist</title>
    <link rel="stylesheet" href="dashboard.css">
</head>
<body>
    <!-- Hero Section with Background Image -->
    <div class="hero">
        <nav class="navbar">
            <div class="logo">Virtual Fashion Stylist</div>
            <ul class="nav-links">
                <li><a href="skin.php">Skin Tone Detection</a></li>
                <li><a href="color.php">Color Suggestions</a></li>
                <li><a href="bodyshape.php">Body Shape Detector</a></li>
                <li><a href="dress.php">Dress Ideas</a></li>
                <li><a href="wardrobe.php">Virtual Wardrobe</a></li>
                <li><a href="outfit.php">Outfit Suggestions</a></li>
                <li><a href="ecommerce.php">E-Commerce Platforms</a></li>
                <li><a href="favorites.php">Favorite Outfits</a></li>
                <li><a href="logout.php" class="logout">Logout</a></li>
            </ul>
        </nav>

        <div class="hero-content">
            <h1>Empower Your Style</h1>
            <p>Welcome <?php echo $_SESSION['email']; ?>, discover your personalized fashion experience</p>
        </div>
    </div>
</body>
</html>

