<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Settings</title>

<style>

body{
    background:#0f0d0b;
    color:white;
    font-family:Arial;
    padding:40px;
}

.container{
    max-width:700px;
    margin:auto;
}

.card{
    background:#1a1714;
    padding:40px;
    border-radius:24px;
}

img{
    width:180px;
    margin-bottom:30px;
    border-radius:12px;
}

input{
    width:100%;
    margin-bottom:20px;
    padding:10px;
}

button{
    background:#d9b078;
    border:none;
    padding:16px 30px;
    border-radius:50px;
    cursor:pointer;
    font-weight:bold;
}

</style>

</head>

<body>

<div class="container">

<div class="card">

<h1>Website Logo</h1>

<br>

<?php if (!empty($setting['site_logo'])): ?>

    <img src="<?= base_url('uploads/projects/' . $setting['site_logo']) ?>">

<?php else: ?>

    <p>No logo uploaded yet</p>

<?php endif; ?>

<form action="<?= base_url('admin/logo/update') ?>" method="POST" enctype="multipart/form-data">

    <input type="file" name="site_logo" accept="image/*" required>

    <button type="submit">Update Logo</button>

</form>

</div>

</div>

</body>

</html>