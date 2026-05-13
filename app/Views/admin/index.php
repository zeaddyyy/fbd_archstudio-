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
href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600&family=Cormorant+Garamond:wght@300;400;500;600;700&display=swap"
rel="stylesheet"
>

<style>

/* RESET */

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
}

html{
    scroll-behavior:smooth;
}

body{
    background:#f5f1ea;
    color:#111;

    font-family:'Outfit',sans-serif;

    overflow-x:hidden;
}

/* BACKGROUND GLOW */

body::before{
    content:"";

    position:fixed;
    inset:0;

    background:
    radial-gradient(
        circle at top left,
        rgba(0,0,0,0.04),
        transparent 35%
    ),
    radial-gradient(
        circle at bottom right,
        rgba(201,169,110,0.12),
        transparent 35%
    );

    pointer-events:none;

    z-index:-1;
}

/* HEADER */

.admin-header{
    position:fixed;

    top:0;
    left:0;

    width:100%;

    padding:22px 5%;

    display:flex;

    justify-content:space-between;

    align-items:center;

    z-index:99999;

    backdrop-filter:blur(24px);

    background:
    rgba(255,255,255,0.55);

    border-bottom:
    1px solid rgba(0,0,0,0.05);

    transition:0.5s;
}

/* LOGO */

.admin-logo{
    display:flex;
    flex-direction:column;
}

.admin-logo span{
    font-size:12px;

    letter-spacing:0.42em;

    color:#777;
}

.admin-logo h1{
    font-size:32px;

    font-family:
    'Cormorant Garamond',
    serif;

    font-weight:400;

    color:#111;
}

/* HEADER BUTTONS */

.header-actions{
    display:flex;
    gap:14px;
}

/* BUTTON */

.action-btn-top{
    height:54px;

    padding:0 28px;

    border-radius:100px;

    border:none;

    display:flex;

    align-items:center;
    justify-content:center;

    gap:10px;

    cursor:pointer;

    text-decoration:none;

    font-size:11px;

    letter-spacing:0.25em;

    text-transform:uppercase;

    transition:
    0.6s cubic-bezier(.19,1,.22,1);

    position:relative;

    overflow:hidden;
}

/* SHINE */

.action-btn-top::before{
    content:"";

    position:absolute;

    top:0;
    left:-120%;

    width:100%;
    height:100%;

    background:
    linear-gradient(
        90deg,
        transparent,
        rgba(255,255,255,0.3),
        transparent
    );

    transition:0.8s;
}

.action-btn-top:hover::before{
    left:120%;
}

/* PRIMARY */

.primary-btn{
    background:#111;
    color:white;
}

.primary-btn:hover{
    transform:
    translateY(-4px);

    background:#1c1c1c;
}

/* LIGHT */

.light-btn{
    background:
    rgba(255,255,255,0.55);

    color:#111;

    border:
    1px solid rgba(0,0,0,0.05);
}

.light-btn:hover{
    transform:
    translateY(-4px);
}

/* LOGOUT */

.logout-btn{
    background:#d94b4b;
    color:white;
}

.logout-btn:hover{
    background:#b93b3b;

    transform:
    translateY(-4px);
}

/* CONTAINER */

.container{
    width:92%;

    max-width:1500px;

    margin:auto;

    padding-top:140px;
    padding-bottom:80px;
}

/* GRID */

.projects-grid{
    display:grid;

    grid-template-columns:
    repeat(
        auto-fit,
        minmax(380px,1fr)
    );

    gap:34px;
}

/* CARD */

.project-card{
    position:relative;

    border-radius:34px;

    overflow:hidden;

    background:
    rgba(255,255,255,0.65);

    backdrop-filter:blur(20px);

    border:
    1px solid rgba(255,255,255,0.5);

    transition:
    0.8s cubic-bezier(.19,1,.22,1);

    box-shadow:
    0 15px 50px rgba(0,0,0,0.04);
}

/* GLOW */

.project-card::before{
    content:"";

    position:absolute;
    inset:0;

    background:
    linear-gradient(
        135deg,
        rgba(255,255,255,0.45),
        transparent
    );

    opacity:0;

    transition:0.6s;

    pointer-events:none;
}

.project-card:hover::before{
    opacity:1;
}

.project-card:hover{
    transform:
    translateY(-10px);

    box-shadow:
    0 30px 80px rgba(0,0,0,0.08);
}

/* IMAGE */

.project-image{
    width:100%;
    height:340px;

    overflow:hidden;
}

.project-image img{
    width:100%;
    height:100%;

    object-fit:cover;

    transition:
    1.3s cubic-bezier(.19,1,.22,1);
}

.project-card:hover .project-image img{
    transform:
    scale(1.08);
}

/* CONTENT */

.project-content{
    padding:30px;
}

/* TITLE */

.project-content h2{
    font-size:44px;

    line-height:0.95;

    margin-bottom:14px;

    font-family:
    'Cormorant Garamond',
    serif;

    font-weight:400;

    color:#111;
}

/* LOCATION */

.location{
    display:flex;

    align-items:center;

    gap:8px;

    margin-bottom:18px;

    font-size:11px;

    letter-spacing:0.28em;

    text-transform:uppercase;

    color:#777;
}

/* DESCRIPTION */

.description{
    color:#555;

    line-height:2;

    font-size:15px;
}

/* GALLERY */

.gallery-preview{
    margin-top:24px;

    display:flex;

    gap:10px;

    overflow-x:auto;

    padding-bottom:4px;
}

.gallery-preview::-webkit-scrollbar{
    height:4px;
}

.gallery-preview::-webkit-scrollbar-thumb{
    background:#bbb;
    border-radius:20px;
}

.gallery-preview img{
    width:95px;
    height:95px;

    object-fit:cover;

    border-radius:18px;

    flex-shrink:0;

    transition:0.5s;

    cursor:pointer;
}

.gallery-preview img:hover{
    transform:
    translateY(-4px)
    scale(1.04);
}

/* ACTIONS */

.project-actions{
    margin-top:26px;

    display:flex;

    gap:12px;
}

.project-actions a{
    flex:1;

    height:52px;

    display:flex;

    justify-content:center;
    align-items:center;

    border-radius:18px;

    text-decoration:none;

    font-size:11px;

    letter-spacing:0.2em;

    text-transform:uppercase;

    transition:0.4s;
}

/* EDIT */

.edit-btn{
    background:
    rgba(0,0,0,0.05);

    color:#111;
}

.edit-btn:hover{
    background:#111;
    color:white;
}

/* DELETE */

.delete-btn{
    background:
    rgba(255,0,0,0.08);

    color:#d94b4b;
}

.delete-btn:hover{
    background:#d94b4b;
    color:white;
}

/* EMPTY */

.empty-state{
    text-align:center;

    padding:140px 20px;
}

.empty-state i{
    font-size:90px;

    color:#111;

    margin-bottom:20px;
}

.empty-state h2{
    font-size:60px;

    font-family:
    'Cormorant Garamond',
    serif;

    font-weight:400;

    margin-bottom:12px;
}

.empty-state p{
    color:#666;
}

/* MOBILE */

@media(max-width:900px){

.header-actions{
    display:none;
}

.projects-grid{
    grid-template-columns:1fr;
}

.project-content h2{
    font-size:34px;
}

.admin-logo h1{
    font-size:24px;
}

}

</style>

</head>

<body>

<!-- HEADER -->

<header class="admin-header">

<div class="admin-logo">

<span>
FB DESIGN STUDIO
</span>

<h1>
Admin Panel
</h1>

</div>

<div class="header-actions">

<a
href="/admin/create"
class="action-btn-top primary-btn"
>

<i class="ri-add-line"></i>

Add Project

</a>

<a href="/admin/logo"
class="action-btn-top light-btn"
>

<i class="ri-image-line"></i>

Change Logo

</a>
<a href="/admin/logout"
class="action-btn-top logout-btn"
>

<i class="ri-logout-box-line"></i>

Logout

</a>

</div>

</header>

<!-- MAIN -->

<div class="container">

<?php if(!empty($projects)): ?>

<div class="projects-grid">

<?php foreach($projects as $project): ?>

<div class="project-card">

<!-- IMAGE -->

<?php if(!empty($project['image'])): ?>

<div class="project-image">

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
href="/admin/edit/<?= $project['id'] ?>"
class="edit-btn"
>

Edit

</a>

<a
href="/admin/delete/<?= $project['id'] ?>"
class="delete-btn"
onclick="return confirm('Delete this project?')"
>

Delete

</a>

</div>

</div>

</div>

<?php endforeach; ?>

</div>

<?php else: ?>

<div class="empty-state">

<i class="ri-gallery-line"></i>

<h2>
No Projects
</h2>

<p>
Upload your first architecture project.
</p>

</div>

<?php endif; ?>

</div>

</body>

</html>