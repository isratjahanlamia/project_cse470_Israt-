<?php
session_start();
if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Fashion Shopping Links</title>
  <link rel="stylesheet" href="ecommerce.css">
</head>
<body>

<div class="container">
  <h1 class="page-title">🛍️ Fashion E-Commerce</h1>
  <p class="subtitle">Discover top fashion stores — from global brands to Bangladeshi favorites</p>

  
  <h2 class="section-title">🌍 Global Big Brands</h2>
  <div class="grid">
    <div class="card">
      <h2>Amazon Fashion</h2>
      <p>Trendy & affordable fashion for everyone</p>
      <a href="https://www.amazon.com/fashion" target="_blank" class="btn">Shop Now</a>
    </div>

    <div class="card">
      <h2>Zara</h2>
      <p>Latest fashion trends & seasonal collections</p>
      <a href="https://www.zara.com/" target="_blank" class="btn">Shop Now</a>
    </div>

    <div class="card">
      <h2>H&M</h2>
      <p>Modern fashion at great prices</p>
      <a href="https://www.hm.com/" target="_blank" class="btn">Shop Now</a>
    </div>

    <div class="card">
      <h2>Shein</h2>
      <p>Affordable & trendy fashion</p>
      <a href="https://www.shein.com/" target="_blank" class="btn">Shop Now</a>
    </div>
  </div>

  
  <h2 class="section-title">🇧🇩 Bangladeshi Fashion Brands</h2>
  <div class="grid">
    <div class="card">
      <h2>Aarong</h2>
      <p>Heritage, crafts & modern fashion</p>
      <a href="https://www.aarong.com/" target="_blank" class="btn">Shop Now</a>
    </div>

    <div class="card">
      <h2>Yellow</h2>
      <p>Trendy fashion by Beximco</p>
      <a href="https://yellowclothing.net/" target="_blank" class="btn">Shop Now</a>
    </div>

    <div class="card">
      <h2>Vogue</h2>
      <p>Contemporary Bangladeshi fashion</p>
      <a href="https://voguefashionbd.com/" target="_blank" class="btn">Shop Now</a>
    </div>

    <div class="card">
      <h2>Le Reve</h2>
      <p>Trendy lifestyle fashion</p>
      <a href="https://lerevecraze.com/" target="_blank" class="btn">Shop Now</a>
    </div>

    <div class="card">
      <h2>Sailor</h2>
      <p>Modern fashion & casual wear</p>
      <a href="https://sailor.clothing/" target="_blank" class="btn">Shop Now</a>
    </div>

    <div class="card">
      <h2>Daraz</h2>
      <p>Local & international brands</p>
      <a href="https://www.daraz.com/" target="_blank" class="btn">Shop Now</a>
    </div>
  </div>

</div>

</body>
</html>
