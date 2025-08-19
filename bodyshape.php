<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Body Shape Detector</title>
    <link rel="stylesheet" href="bodyshape.css">
</head>
<body>
    <div class="container">
        <h1>Find Your Body Shape</h1>
        <form method="POST">
            <label for="bust">Bust (in inches):</label>
            <input type="number" name="bust" required>

            <label for="waist">Waist (in inches):</label>
            <input type="number" name="waist" required>

            <label for="hips">Hips (in inches):</label>
            <input type="number" name="hips" required>

            <button type="submit" name="submit">Detect Body Shape</button>
        </form>

        <?php
        if (isset($_POST['submit'])) {
            $bust = $_POST['bust'];
            $waist = $_POST['waist'];
            $hips = $_POST['hips'];
            $shape = "";
            $image = "";

             if (abs($bust - $hips) <= 2 && ($bust - $waist) >= 7) {
                $shape = "Hourglass";
                $image = "images/bodyshapes/hourglass.png";
            } elseif ($hips >= $bust + 3) {
                $shape = "Pear";
                $image = "images/bodyshapes/pear.png";
            } elseif ($bust >= $hips + 3) {
                $shape = "Inverted Triangle";
                $image = "images/bodyshapes/inverted.png";
            } elseif (abs($bust - $hips) <= 2 && ($bust - $waist) < 7 && ($hips - $waist) < 7) {
                $shape = "Rectangle";
                $image = "images/bodyshapes/rectangle.jpg";
            } elseif (($waist >= $bust - 1 && $waist <= $bust + 2) || ($waist >= $hips - 1 && $waist <= $hips + 2)) {
                $shape = "Apple";
                $image = "images/bodyshapes/apple.png";
            } else {
                $shape = "Undefined";
            }

            echo "<div class='result'>";
            echo "<h2>Your Body Shape: $shape</h2>";
            if ($image != "") {
                echo "<img src='$image' alt='$shape'>";
            }
            echo "</div>";
            echo "<div class='back-btn'>";
            echo "<a href='dashboard.php'>← Back to Dashboard</a>";
            echo "</div>";
            echo "<a href='dress.php?shape=$shape'>See Dress Ideas</a>";

        }
        ?>
    </div>
</body>
</html>
