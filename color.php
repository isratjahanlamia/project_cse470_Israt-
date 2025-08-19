<?php
session_start();
if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit();
}

// Expanded color suggestions (20+ shades each)
$colorSuggestions = [
    "Fair" => [
        "Blush Pink" => "#FFC0CB",
        "Baby Blue" => "#89CFF0",
        "Lavender" => "#E6E6FA",
        "Peach" => "#FFDAB9",
        "Soft Grey" => "#D3D3D3",
        "Mint Green" => "#98FF98",
        "Sky Blue" => "#87CEEB",
        "Rose Quartz" => "#F7CAC9",
        "Champagne" => "#F7E7CE",
        "Navy Blue" => "#000080",
        "Emerald" => "#50C878",
        "Sapphire" => "#0F52BA",
        "Burgundy" => "#800020",
        "Plum" => "#673147",
        "Coral" => "#FF7F50",
        "Baby Yellow" => "#FFFFE0",
        "Powder Blue" => "#B0E0E6",
        "Silver" => "#C0C0C0",
        "Forest Green" => "#228B22",
        "Ruby Red" => "#9B111E"
    ],
    "Medium" => [
        "Coral Red" => "#FF4040",
        "Teal" => "#008080",
        "Olive Green" => "#808000",
        "Mustard" => "#FFDB58",
        "Terracotta" => "#E2725B",
        "Camel" => "#C19A6B",
        "Chocolate" => "#7B3F00",
        "Turquoise" => "#40E0D0",
        "Copper" => "#B87333",
        "Emerald Green" => "#228B22",
        "Burnt Orange" => "#CC5500",
        "Sea Green" => "#2E8B57",
        "Gold" => "#FFD700",
        "Maroon" => "#800000",
        "Aqua" => "#00FFFF",
        "Khaki" => "#C3B091",
        "Sand" => "#F4A460",
        "Warm Beige" => "#E6C9A8",
        "Rust" => "#B7410E",
        "Indigo" => "#4B0082"
    ],
    "Dark" => [
        "Crimson" => "#DC143C",
        "Royal Blue" => "#4169E1",
        "Gold" => "#FFD700",
        "Ivory" => "#FFFFF0",
        "Fuchsia" => "#FF00FF",
        "Emerald Green" => "#2E8B57",
        "Violet" => "#8A2BE2",
        "Burnt Orange" => "#CC5500",
        "Lemon Yellow" => "#FFF44F",
        "Magenta" => "#FF00FF",
        "Bright Red" => "#FF2400",
        "Cobalt Blue" => "#0047AB",
        "Copper" => "#B87333",
        "Jade Green" => "#00A36C",
        "Bright White" => "#FFFFFF",
        "Bronze" => "#CD7F32",
        "Deep Purple" => "#301934",
        "Coral Pink" => "#FF6F61",
        "Electric Blue" => "#7DF9FF",
        "Bright Orange" => "#FF681F"
    ]
];

// Get selected tone
$tone = isset($_POST['tone']) ? $_POST['tone'] : null;
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Color Suggestions</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: linear-gradient(to right, #374a5eff, #bdc3c7);
      text-align: center;
      padding: 30px;
    }
    h1 {
      color: #333;
      margin-bottom: 10px;
    }
    .form-box {
      margin: 20px auto;
      padding: 20px;
      background: rgba(255, 255, 255, 0.8);
      border-radius: 15px;
      width: 350px;
      box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    }
    select, button {
      padding: 10px;
      margin-top: 10px;
      border-radius: 8px;
      border: none;
      font-size: 16px;
      cursor: pointer;
    }
    button {
      background: linear-gradient(90deg, #ff6ec4, #7873f5);
      color: white;
      font-weight: bold;
    }
    button:hover {
      opacity: 0.9;
    }
    .swatches {
      display: flex;
      justify-content: center;
      gap: 20px;
      flex-wrap: wrap;
      margin-top: 20px;
    }
    .swatch {
      width: 140px;
      height: 140px;
      border-radius: 15px;
      display: flex;
      justify-content: center;
      align-items: center;
      color: #fff;
      font-weight: bold;
      text-align: center;
      padding: 10px;
      text-shadow: 1px 1px 3px rgba(0,0,0,0.6);
      box-shadow: 0 5px 15px rgba(0,0,0,0.2);
    }
    .back {
      margin-top: 30px;
      display: inline-block;
      padding: 10px 20px;
      border-radius: 20px;
      background: #ff6ec4;
      color: white;
      text-decoration: none;
      font-weight: bold;
    }
    .back:hover {
      background: #7873f5;
    }
  </style>
</head>
<body>
  <h1>Color Suggestions</h1>
  <p>Select your skin tone to see recommended shades:</p>

  <form method="POST" class="form-box">
    <label for="tone">Choose Skin Tone:</label><br>
    <select name="tone" id="tone" required>
      <option value="">-- Select --</option>
      <option value="Fair" <?php if($tone=="Fair") echo "selected"; ?>>Fair</option>
      <option value="Medium" <?php if($tone=="Medium") echo "selected"; ?>>Medium</option>
      <option value="Dark" <?php if($tone=="Dark") echo "selected"; ?>>Dark</option>
    </select><br>
    <button type="submit">Show Suggestions</button>
  </form>

  <?php if ($tone && isset($colorSuggestions[$tone])): ?>
    <h2>Best Shades for <span style="color:#ff6ec4;"><?php echo $tone; ?> Skin Tone</span></h2>
    <div class="swatches">
      <?php foreach ($colorSuggestions[$tone] as $name => $hex): ?>
        <div class="swatch" style="background: <?php echo $hex; ?>">
          <?php echo $name; ?>
        </div>
      <?php endforeach; ?>
    </div>
  <?php endif; ?>

  <a href="dashboard.php" class="back">⬅ Back to Dashboard</a>
</body>
</html>
