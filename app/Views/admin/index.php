<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>FB Design Studio Admin</title>

<link rel="stylesheet"
href="https://cdn.jsdelivr.net/npm/remixicon/fonts/remixicon.css">

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
}

body{
    background:#0f0f0f;
    color:white;
    font-family:Arial, sans-serif;
}

.container{
    width:90%;
    margin:auto;
    padding:50px 0;
}

.top-bar{
    display:flex;
    justify-content:space-between;
    align-items:center;
    margin-bottom:50px;
}

.top-bar h1{
    font-size:45px;
    font-weight:300;
}

.add-btn{
    background:#D9C7B8;
    color:black;
    padding:14px 25px;
    text-decoration:none;
    border-radius:50px;
}

.projects-grid{
    display:grid;
    grid-template-columns:repeat(auto-fit,minmax(350px,1fr));
    gap:30px;
}

.project-card{
    background:#1a1a1a;
    border-radius:20px;
    overflow:hidden;
    transition:0.4s;
}

.project-card:hover{
    transform:translateY(-10px);
}

.project-card img{
    width:100%;
    height:300px;
    object-fit:cover;
}

.project-content{
    padding:20px;
}

.project-content h2{
    margin-bottom:10px;
    font-weight:400;
}

.project-content p{
    color:#999;
}

</style>

</head>

<body>

<div class="container">

<div class="top-bar">

<h1>FB Design Studio</h1>

<a href="/admin/create" class="add-btn">
<i class="ri-add-line"></i>
Add Project
</a>

</div>

<div class="projects-grid">

<?php foreach($projects ?? [] as $project): ?>

<div class="project-card">

<img
src="/uploads/<?= $project['image'] ?>"
alt=""
>

<div class="project-content">

<h2><?= $project['title'] ?></h2>

<p><?= $project['location'] ?></p>

</div>

</div>

<?php endforeach; ?>

</div>

</div>

</body>
</html>