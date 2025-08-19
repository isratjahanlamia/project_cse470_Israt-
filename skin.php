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
  <title>Skin Tone Detector</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: linear-gradient(to right, #fbc2eb, #a6c1ee);
      text-align: center;
      padding: 20px;
    }
    h1 {
      margin-bottom: 20px;
      color: #333;
    }
    canvas {
      margin-top: 20px;
      cursor: crosshair;
      border: 2px solid #444;
      border-radius: 10px;
    }
    .result {
      margin-top: 20px;
      font-size: 20px;
      font-weight: bold;
      color: #222;
    }
    .back {
      margin-top: 30px;
      display: inline-block;
      padding: 10px 20px;
      border-radius: 20px;
      background: #ff6ec4;
      color: white;
      text-decoration: none;
    }
    .back:hover {
      background: #7873f5;
    }
  </style>
</head>
<body>
  <h1>Skin Tone Detector</h1>
  <p>Upload your photo and click on your cheek/forehead to detect skin tone.</p>

  <input type="file" id="upload" accept="image/*"><br>
  <canvas id="canvas"></canvas>
  <div class="result" id="result">No skin tone detected yet.</div>

  <a href="dashboard.php" class="back">⬅ Back to Dashboard</a>

  <script>
    const upload = document.getElementById('upload');
    const canvas = document.getElementById('canvas');
    const ctx = canvas.getContext('2d');
    const result = document.getElementById('result');

    let img = new Image();

    // Load uploaded image into canvas
    upload.addEventListener('change', (e) => {
      const file = e.target.files[0];
      if (!file) return;
      const reader = new FileReader();
      reader.onload = function(event) {
        img.onload = function() {
          canvas.width = img.width;
          canvas.height = img.height;
          ctx.drawImage(img, 0, 0);
        }
        img.src = event.target.result;
      }
      reader.readAsDataURL(file);
    });

    // Detect skin tone on click
    canvas.addEventListener('click', (e) => {
      const rect = canvas.getBoundingClientRect();
      const x = e.clientX - rect.left;
      const y = e.clientY - rect.top;
      const pixel = ctx.getImageData(x, y, 1, 1).data;
      const [r, g, b] = pixel;

      // Convert to brightness (simple method)
      const brightness = (r + g + b) / 3;

      let tone = "Unknown";
      if (brightness > 180) {
        tone = "Fair Skin Tone";
      } else if (brightness > 100) {
        tone = "Medium / Olive Skin Tone";
      } else {
        tone = "Dark Skin Tone";
      }

      result.innerHTML = `RGB: (${r}, ${g}, ${b}) → Detected: <span style="color:rgb(${r},${g},${b});">${tone}</span>`;
    });
  </script>
</body>
</html>
