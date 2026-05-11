<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta
name="viewport"
content="width=device-width, initial-scale=1.0"
>

<title>
FB Design Studio Admin
</title>

<link
rel="stylesheet"
href="https://cdn.jsdelivr.net/npm/remixicon/fonts/remixicon.css"
>

<link
href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600&display=swap"
rel="stylesheet"
>

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
}

body{
    background:#0f0d0b;

    color:white;

    font-family:'Outfit',sans-serif;

    overflow-x:hidden;
}

.container{
    width:92%;

    max-width:1500px;

    margin:auto;

    padding:50px 0;
}

/* TOP BAR */

.top-bar{
    display:flex;

    justify-content:space-between;

    align-items:center;

    margin-bottom:60px;
}

.top-bar h1{
    font-size:56px;

    font-weight:300;

    color:#f3e7d6;
}

.add-btn{
    background:
    linear-gradient(
        135deg,
        #d9b078,
        #9f7c45
    );

    color:#111;

    padding:18px 32px;

    text-decoration:none;

    border-radius:100px;

    font-weight:600;

    transition:0.4s;
}

.add-btn:hover{
    transform:translateY(-4px);
}

/* GRID */

.projects-grid{
    display:grid;

    grid-template-columns:
    repeat(
        auto-fit,
        minmax(360px,1fr)
    );

    gap:34px;
}

/* CARD */

.project-card{
    background:
    rgba(20,18,15,0.72);

    border:
    1px solid rgba(255,255,255,0.05);

    border-radius:30px;

    overflow:hidden;

    transition:0.4s;

    backdrop-filter:blur(20px);
}

.project-card:hover{
    transform:
    translateY(-8px);

    box-shadow:
    0 20px 50px rgba(0,0,0,0.35);
}

/* MAIN IMAGE */

.project-main-image{
    width:100%;

    height:320px;

    overflow:hidden;
}

.project-main-image img{
    width:100%;

    height:100%;

    object-fit:cover;

    display:block;
}

/* CONTENT */

.project-content{
    padding:28px;
}

.project-content h2{
    font-size:34px;

    margin-bottom:14px;

    color:#f3e7d6;

    font-weight:400;
}

.location{
    color:#c2af95;

    margin-bottom:16px;

    font-size:15px;
}

.description{
    color:#8f8f8f;

    line-height:1.9;

    font-size:15px;
}

/* GALLERY */

.gallery-preview{
    margin-top:24px;

    display:flex;

    gap:10px;

    overflow-x:auto;

    padding-bottom:5px;
}

.gallery-preview::-webkit-scrollbar{
    height:4px;
}

.gallery-preview::-webkit-scrollbar-thumb{
    background:#444;

    border-radius:20px;
}

.gallery-preview img{
    width:90px;

    height:90px;

    object-fit:cover;

    border-radius:16px;

    flex-shrink:0;

    border:
    1px solid rgba(255,255,255,0.05);
}

/* ACTIONS */

.project-actions{
    margin-top:24px;

    display:flex;

    gap:14px;
}

.action-btn{
    flex:1;

    padding:14px;

    border-radius:18px;

    text-align:center;

    text-decoration:none;

    transition:0.4s;

    font-size:15px;
}

.delete-btn{
    background:
    rgba(255,0,0,0.08);

    color:#ff8d8d;

    border:
    1px solid rgba(255,0,0,0.08);
}

.delete-btn:hover{
    background:
    rgba(255,0,0,0.14);
}

/* EMPTY */

.empty-state{
    text-align:center;

    padding:120px 20px;

    color:#777;
}

.empty-state i{
    font-size:70px;

    margin-bottom:20px;

    color:#9f7c45;
}

.empty-state h2{
    font-size:42px;

    font-weight:300;

    margin-bottom:12px;

    color:#f3e7d6;
}

/* MOBILE */

@media(max-width:768px){

.top-bar{
    flex-direction:column;

    align-items:flex-start;

    gap:24px;
}

.top-bar h1{
    font-size:42px;
}

.projects-grid{
    grid-template-columns:1fr;
}

.project-content h2{
    font-size:28px;
}

}

</style>

</head>

<body>

<div class="container">

<!-- TOP BAR -->

<div class="top-bar">

<h1>
FB Design Studio
</h1>

<a
href="/admin/create"
class="add-btn"
>
Add Project
</a>
<a href="/admin/logo" class="btn btn-primary">
    Change Logo
</a>

</div>


<!-- PROJECTS -->

<?php if(!empty($projects)): ?>

<div class="projects-grid">

<?php foreach($projects as $project): ?>

<div class="project-card">

<!-- MAIN IMAGE -->

<?php if(!empty($project['image'])): ?>

<div class="project-main-image">

<img
src="<?= base_url('uploads/projects/' . basename($project['image'])) ?>"
alt=""
>

</div>

<?php endif; ?>

<!-- CONTENT -->

<div class="project-content">

<h2>
<?= esc((string)$project['title']) ?>
</h2>

<div class="location">

<i class="ri-map-pin-line"></i>

<?= esc((string)$project['location']) ?>

</div>

<p class="description">

<?= esc((string)$project['description']) ?>

</p>

<!-- GALLERY -->

<?php if(!empty($project['gallery'])): ?>

<div class="gallery-preview">

<?php

$gallery =
json_decode(
    $project['gallery'],
    true
);

if(is_array($gallery)):

foreach($gallery as $image):

?>

<img
src="<?= base_url('uploads/projects/' . basename($image)) ?>"
alt=""
>

<?php endforeach; endif; ?>

</div>

<?php endif; ?>

<!-- ACTIONS -->

<div class="project-actions">

<a
href="/admin/delete/<?= $project['id'] ?>"
class="action-btn delete-btn"
onclick="return confirm('Delete this project?')"
>

Delete

</a>
<a
href="/admin/edit/<?= $project['id'] ?>"
class="action-btn"
style="
background:rgba(255,255,255,0.06);
color:#f3e7d6;
border:1px solid rgba(255,255,255,0.06);
"
>
Edit
</a>

</div>


</div>

</div>

<?php endforeach; ?>

</div>

<?php else: ?>

<!-- EMPTY STATE -->

<div class="empty-state">

<i class="ri-gallery-line"></i>

<h2>
No Projects Found
</h2>

<p>
Upload your first architecture project.
</p>

</div>

<?php endif; ?>

</div>

</body>
</html>