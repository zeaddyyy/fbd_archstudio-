<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta
name="viewport"
content="width=device-width, initial-scale=1.0"
>

<title>
Homepage Projects CMS
</title>

<link
href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600&family=Cormorant+Garamond:wght@300;400;500;600&display=swap"
rel="stylesheet"
>

<link
rel="stylesheet"
href="https://cdn.jsdelivr.net/npm/remixicon/fonts/remixicon.css"
>

<style>

/* RESET */

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
}

/* BODY */

body{

    background:#f5f1ea;

    font-family:'Outfit',sans-serif;

    color:#111;

    overflow-x:hidden;

    min-height:100vh;

    padding:60px 0;
}

/* BACKGROUND */

body::before{

    content:'';

    position:fixed;

    inset:0;

    background:
    radial-gradient(
        circle at top left,
        rgba(0,0,0,0.02),
        transparent 35%
    ),

    radial-gradient(
        circle at bottom right,
        rgba(201,169,110,0.05),
        transparent 35%
    );

    z-index:-1;
}

/* WRAPPER */

.wrapper{

    width:92%;

    max-width:1700px;

    margin:auto;
}

/* TOP */

.top-bar{

    display:flex;

    justify-content:space-between;

    align-items:flex-start;

    gap:30px;

    margin-bottom:70px;
}

/* TITLE */

.page-title span{

    display:block;

    margin-bottom:18px;

    font-size:11px;

    letter-spacing:0.35em;

    text-transform:uppercase;

    color:#888;
}

.page-title h1{

    font-size:92px;

    line-height:0.9;

    font-weight:300;

    font-family:
    'Cormorant Garamond',
    serif;

    margin-bottom:24px;
}

.page-title p{

    max-width:760px;

    line-height:2;

    color:#555;

    font-size:15px;
}

/* BUTTON */

.create-btn{

    height:64px;

    padding:0 36px;

    border-radius:100px;

    background:#111;

    color:white;

    text-decoration:none;

    display:flex;

    align-items:center;

    gap:12px;

    font-size:11px;

    letter-spacing:0.25em;

    text-transform:uppercase;

    transition:0.4s;
}

.create-btn:hover{

    transform:
    translateY(-4px);

    box-shadow:
    0 20px 40px rgba(0,0,0,0.15);
}

/* GRID */

.projects-grid{

    display:grid;

    grid-template-columns:
    repeat(
        auto-fit,
        minmax(390px,1fr)
    );

    gap:38px;

    opacity:1 !important;

    visibility:visible !important;
}

/* CARD */

.project-card{

    position:relative;

    overflow:hidden;

    border-radius:38px;

    background:#ffffff;

    border:
    1px solid #ececec;

    box-shadow:
    0 20px 60px rgba(0,0,0,0.06);

    transition:
    0.6s cubic-bezier(.19,1,.22,1);

    opacity:1 !important;

    visibility:visible !important;

    filter:none !important;

    backdrop-filter:none !important;
}

.project-card:hover{

    transform:
    translateY(-10px);

    box-shadow:
    0 35px 90px rgba(0,0,0,0.10);
}

/* IMAGE */

.project-image{

    position:relative;

    width:100%;

    height:320px;

    overflow:hidden;

    background:#ddd;
}

.project-image img{

    width:100%;

    height:100%;

    object-fit:cover;

    display:block;

    transition:1.2s;

    opacity:1 !important;

    filter:none !important;
}

.project-card:hover img{

    transform:scale(1.08);
}

/* BADGE */

.project-badge{

    position:absolute;

    top:22px;
    left:22px;

    padding:12px 18px;

    border-radius:100px;

    background:white;

    font-size:10px;

    letter-spacing:0.24em;

    text-transform:uppercase;

    color:#111;

    box-shadow:
    0 10px 25px rgba(0,0,0,0.08);
}

/* CONTENT */

.project-content{

    padding:34px;

    opacity:1 !important;

    visibility:visible !important;
}

/* CATEGORY */

.category{

    display:inline-block;

    margin-bottom:18px;

    font-size:10px;

    letter-spacing:0.24em;

    text-transform:uppercase;

    color:#999;
}

/* TITLE */

.project-content h2{

    font-size:52px;

    line-height:0.95;

    font-weight:400;

    font-family:
    'Cormorant Garamond',
    serif;

    color:#111;

    margin-bottom:20px;
}

/* DESC */

.project-content p{

    color:#444;

    line-height:2;

    margin-bottom:32px;
}

/* META */

.meta-grid{

    display:grid;

    grid-template-columns:
    repeat(2,1fr);

    gap:16px;

    margin-bottom:34px;
}

.meta-box{

    background:#f7f7f7;

    border-radius:20px;

    padding:18px;
}

.meta-box span{

    display:block;

    margin-bottom:10px;

    font-size:10px;

    letter-spacing:0.2em;

    text-transform:uppercase;

    color:#999;
}

.meta-box h4{

    font-size:15px;

    font-weight:500;

    color:#111;
}

/* ACTIONS */

.actions{

    display:flex;

    gap:16px;
}

/* BTN */

.action-btn{

    flex:1;

    height:58px;

    border-radius:18px;

    display:flex;

    justify-content:center;
    align-items:center;

    gap:10px;

    text-decoration:none;

    font-size:11px;

    letter-spacing:0.18em;

    text-transform:uppercase;

    transition:0.4s;
}

/* EDIT */

.edit-btn{

    background:#111;

    color:white;
}

/* DELETE */

.delete-btn{

    background:
    rgba(255,0,0,0.08);

    color:#c0392b;
}

.action-btn:hover{

    transform:
    translateY(-4px);
}

/* EMPTY */

.empty-state{

    padding:140px 40px;

    border-radius:40px;

    text-align:center;

    background:white;

    box-shadow:
    0 20px 60px rgba(0,0,0,0.05);
}

.empty-state i{

    font-size:90px;

    margin-bottom:24px;

    display:block;

    color:#bbb;
}

.empty-state h2{

    font-size:64px;

    font-weight:300;

    font-family:
    'Cormorant Garamond',
    serif;

    margin-bottom:18px;
}

.empty-state p{

    color:#666;

    line-height:2;

    margin-bottom:36px;
}

/* MOBILE */

@media(max-width:1000px){

.top-bar{

    flex-direction:column;

    align-items:flex-start;
}

.page-title h1{

    font-size:64px;
}

}

@media(max-width:768px){

.projects-grid{

    grid-template-columns:1fr;
}

.project-content h2{

    font-size:42px;
}

.meta-grid{

    grid-template-columns:1fr;
}

}

/* FORCE FIX */

*{

    opacity:1;

    visibility:visible;
}
/* =========================================
   HARD RESET FIX
========================================= */

html,
body,
.wrapper,
.projects-grid,
.project-card,
.project-content,
.project-image,
.project-image img,
.meta-box,
.action-btn,
.create-btn{

    opacity:1 !important;

    visibility:visible !important;

    filter:none !important;

    mix-blend-mode:normal !important;

    backdrop-filter:none !important;

    -webkit-backdrop-filter:none !important;
}

/* REMOVE ANY WHITE OVERLAY */

body::after{
    display:none !important;
}

/* FORCE TEXT COLORS */

body,
h1,
h2,
h3,
h4,
p,
span,
a{
    color:#111 !important;
}

/* FORCE IMAGE VISIBILITY */

img{
    opacity:1 !important;

    filter:none !important;
}

/* FORCE CARD BG */

.project-card{
    background:#fff !important;
}

/* FORCE BUTTONS */

.edit-btn{
    background:#111 !important;

    color:#fff !important;
}

.delete-btn{
    background:
    rgba(255,0,0,0.08) !important;

    color:#c0392b !important;
}
</style>

</head>

<body>

<div class="wrapper">

<!-- TOP -->

<div class="top-bar">

<div class="page-title">

<span>
FB DESIGN STUDIO CMS
</span>

<h1>
Homepage <br>
Projects
</h1>

<p>
Manage cinematic homepage architecture showcases,
luxury interiors, immersive media and immersive
project storytelling experiences.
</p>

</div>

<a
href="/admin/home-projects/create"
class="create-btn"
>

<i class="ri-add-line"></i>

Create Project

</a>

</div>

<!-- PROJECTS -->

<?php if(!empty($projects)): ?>

<div class="projects-grid">

<?php foreach($projects as $project): ?>

<?php

$images =
json_decode(
$project['images'],
true
);

$cover =
!empty($images[0])
? $images[0]
: 'default.jpg';

?>

<div class="project-card">

<!-- IMAGE -->

<div class="project-image">

<img
src="<?= base_url('uploads/home_projects/' . $cover) ?>"
alt=""
>

<div class="project-badge">

<?= esc($project['category']) ?>

</div>

</div>

<!-- CONTENT -->

<div class="project-content">

<span class="category">

Homepage Showcase

</span>

<h2>

<?= esc($project['title']) ?>

</h2>

<p>

<?= esc(substr($project['description'],0,150)) ?>...

</p>

<!-- META -->

<div class="meta-grid">

<div class="meta-box">

<span>
Location
</span>

<h4>

<?= esc($project['location']) ?>

</h4>

</div>

<div class="meta-box">

<span>
Year
</span>

<h4>

<?= esc($project['year']) ?>

</h4>

</div>

<div class="meta-box">

<span>
Designer
</span>

<h4>

<?= esc($project['designer']) ?>

</h4>

</div>

<div class="meta-box">

<span>
Area
</span>

<h4>

<?= esc($project['area']) ?>

</h4>

</div>

</div>

<!-- ACTIONS -->

<div class="actions">

<a
href="/admin/home-projects/edit/<?= $project['id'] ?>"
class="action-btn edit-btn"
>

<i class="ri-edit-line"></i>

Edit

</a>

<a
href="/admin/home-projects/delete/<?= $project['id'] ?>"
class="action-btn delete-btn"
onclick="return confirm('Delete this project?')"
>

<i class="ri-delete-bin-line"></i>

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
No Projects Yet
</h2>

<p>
Create your first cinematic homepage project showcase.
</p>

<a
href="/admin/home-projects/create"
class="create-btn"
style="
display:inline-flex;
"
>

<i class="ri-add-line"></i>

Create First Project

</a>

</div>

<?php endif; ?>

</div>

</body>

</html>