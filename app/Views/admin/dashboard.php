<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta
name="viewport"
content="width=device-width, initial-scale=1.0"
>

<title>
FB Design Studio Admin Dashboard
</title>

<link
href="https://fonts.googleapis.com/css2?family=Outfit:wght@200;300;400;500;600&display=swap"
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

body{
    background:#f5f3ef;

    font-family:'Outfit',sans-serif;

    color:#111;

    overflow-x:hidden;

    position:relative;
}

/* PREMIUM BACKGROUND */

body::before{
    content:'';

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

/* BLURS */

.dashboard-blur{
    position:fixed;

    border-radius:50%;

    filter:blur(120px);

    z-index:-1;

    opacity:0.12;

    pointer-events:none;
}

.blur-1{
    width:420px;
    height:420px;

    background:#c9a96e;

    top:-120px;
    right:-120px;
}

.blur-2{
    width:320px;
    height:320px;

    background:#000;

    bottom:-120px;
    left:-120px;
}

/* NOISE */

.noise{
    position:fixed;

    inset:0;

    opacity:0.03;

    pointer-events:none;

    z-index:999999;
}

/* MAIN */

.main{
    width:92%;

    max-width:1600px;

    margin:auto;

    padding:60px 0 100px;
}

/* HERO */

.dashboard-hero{
    width:100%;

    display:flex;

    justify-content:space-between;

    align-items:flex-end;

    gap:40px;

    margin-bottom:50px;
}

/* LEFT */

.hero-left{
    max-width:760px;
}

.hero-mini{
    display:inline-block;

    margin-bottom:18px;

    font-size:11px;

    letter-spacing:0.32em;

    color:#777;
}

.hero-left h1{
    font-size:86px;

    font-weight:200;

    line-height:0.92;

    letter-spacing:-0.05em;

    margin-bottom:24px;
}

.hero-left p{
    color:#666;

    line-height:2;

    font-size:15px;

    max-width:620px;
}

/* RIGHT */

.hero-right{
    display:flex;

    gap:18px;
}

/* HERO CARD */

.hero-stat{
    min-width:190px;

    padding:34px;

    border-radius:34px;

    background:
    rgba(255,255,255,0.6);

    backdrop-filter:blur(24px);

    border:
    1px solid rgba(0,0,0,0.04);

    box-shadow:
    0 20px 60px rgba(0,0,0,0.04);
}

.hero-stat h2{
    font-size:58px;

    font-weight:200;

    margin-bottom:12px;
}

.hero-stat span{
    font-size:10px;

    letter-spacing:0.22em;

    color:#777;
}

/* TOPBAR */

.topbar{
    display:flex;

    justify-content:space-between;
    align-items:center;

    margin-bottom:34px;
}

.topbar h2{
    font-size:30px;

    font-weight:300;

    letter-spacing:-0.02em;
}

/* BUTTON */

.add-btn{
    text-decoration:none;

    background:#111;

    color:white;

    padding:18px 34px;

    border-radius:100px;

    display:flex;

    align-items:center;

    gap:12px;

    letter-spacing:0.18em;

    font-size:10px;

    transition:0.45s;

    position:relative;

    overflow:hidden;
}

.add-btn::before{
    content:'';

    position:absolute;

    top:0;
    left:-120%;

    width:100%;
    height:100%;

    background:
    linear-gradient(
        90deg,
        transparent,
        rgba(255,255,255,0.25),
        transparent
    );

    transition:0.8s;
}

.add-btn:hover::before{
    left:120%;
}

.add-btn:hover{
    transform:
    translateY(-5px);
}

/* SECTION TITLE */

.section-title{
    margin:40px 0 30px;
}

.section-title span{
    font-size:11px;

    letter-spacing:0.3em;

    color:#777;
}

.section-title h3{
    margin-top:10px;

    font-size:44px;

    font-weight:200;

    letter-spacing:-0.03em;
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

    background:
    rgba(255,255,255,0.72);

    backdrop-filter:blur(18px);

    border-radius:36px;

    overflow:hidden;

    border:
    1px solid rgba(0,0,0,0.05);

    transition:
    0.7s cubic-bezier(.19,1,.22,1);
}

.project-card:hover{
    transform:
    translateY(-12px);

    box-shadow:
    0 35px 90px rgba(0,0,0,0.08);
}

/* IMAGE */

.project-image{
    width:100%;
    height:320px;

    overflow:hidden;

    position:relative;
}

.project-image img{
    width:100%;
    height:100%;

    object-fit:cover;

    transition:1s;
}

.project-card:hover img{
    transform:
    scale(1.08);
}

.project-image::after{
    content:'';

    position:absolute;

    inset:0;

    background:
    linear-gradient(
        to top,
        rgba(0,0,0,0.22),
        transparent
    );
}

/* CONTENT */

.project-content{
    padding:30px;
}

.project-content h3{
    font-size:44px;

    font-weight:200;

    line-height:1;

    margin-bottom:18px;

    letter-spacing:-0.03em;
}

.project-content p{
    color:#666;

    line-height:1.9;

    font-size:14px;

    margin-bottom:22px;
}

/* TAG */

.project-tag{
    display:inline-flex;

    align-items:center;

    gap:8px;

    padding:12px 20px;

    background:
    rgba(255,255,255,0.7);

    backdrop-filter:blur(10px);

    border-radius:100px;

    font-size:10px;

    letter-spacing:0.22em;

    margin-bottom:22px;

    color:#555;

    border:
    1px solid rgba(0,0,0,0.05);
}

/* LOCATION */

.location{
    display:flex;

    align-items:center;

    gap:10px;

    font-size:12px;

    color:#888;

    letter-spacing:0.14em;

    margin-bottom:24px;
}

/* META */

.project-meta{
    display:grid;

    grid-template-columns:
    repeat(2,1fr);

    gap:16px;

    margin-bottom:24px;
}

.meta-item span{
    display:block;

    font-size:10px;

    letter-spacing:0.2em;

    color:#888;

    margin-bottom:8px;
}

.meta-item p{
    font-size:14px;

    color:#111;
}

/* ACTIONS */

.project-actions{
    display:grid;

    grid-template-columns:
    repeat(2,1fr);

    gap:12px;
}

.project-actions a{
    text-decoration:none;

    text-align:center;

    padding:16px;

    border-radius:100px;

    font-size:10px;

    letter-spacing:0.22em;

    transition:0.45s;

    display:flex;

    align-items:center;

    justify-content:center;

    gap:8px;

    position:relative;

    overflow:hidden;
}

.project-actions a::before{
    content:'';

    position:absolute;

    top:0;
    left:-120%;

    width:100%;
    height:100%;

    background:
    linear-gradient(
        90deg,
        transparent,
        rgba(255,255,255,0.35),
        transparent
    );

    transition:0.7s;
}

.project-actions a:hover::before{
    left:120%;
}

.project-actions a:hover{
    transform:
    translateY(-3px);
}

/* BUTTONS */

.edit-btn{
    background:#111;
    color:white;
}

.view-btn{
    background:#111;
    color:white;
}

.gallery-btn{
    background:#ece6dc;
    color:#111;
}

.delete-btn{
    background:#f2f2f2;
    color:#111;
}

/* EMPTY */

.empty-box{
    width:100%;

    padding:80px;

    text-align:center;

    border-radius:34px;

    background:
    rgba(255,255,255,0.6);

    backdrop-filter:blur(20px);

    border:
    1px solid rgba(0,0,0,0.04);
}

.empty-box i{
    font-size:70px;

    color:#bbb;

    margin-bottom:20px;
}

.empty-box h3{
    font-size:34px;

    font-weight:300;

    margin-bottom:12px;
}

.empty-box p{
    color:#777;
}

/* MOBILE */

@media(max-width:900px){

.dashboard-hero{
    flex-direction:column;
    align-items:flex-start;
}

.hero-left h1{
    font-size:58px;
}

.hero-right{
    width:100%;

    flex-direction:column;
}

.topbar{
    flex-direction:column;
    align-items:flex-start;
    gap:20px;
}

.projects-grid{
    grid-template-columns:1fr;
}

}

</style>

</head>

<body>

<div class="noise"></div>

<div class="dashboard-blur blur-1"></div>
<div class="dashboard-blur blur-2"></div>

<div class="main">

<!-- HERO -->

<div class="dashboard-hero">

<div class="hero-left">

<span class="hero-mini">

FB DESIGN STUDIO CMS

</span>

<h1>

Admin Dashboard

</h1>

<p>

Manage homepage projects, cinematic galleries,
luxury architecture showcase and dynamic website
content from one centralized studio dashboard.

</p>

</div>

<div class="hero-right">

<div class="hero-stat">

<h2>

<?= count($projects ?? []) ?>

</h2>

<span>
TOTAL PROJECTS
</span>

</div>

<div class="hero-stat">

<h2>

LIVE

</h2>

<span>
SYSTEM STATUS
</span>

</div>

</div>

</div>

<!-- TOPBAR -->

<div class="topbar">

<h2>

Project Management

</h2>

<a
href="/admin/home-projects/create"
class="add-btn"
>

<i class="ri-add-line"></i>

CREATE NEW

</a>

</div>

<!-- SECTION -->

<div class="section-title">

<span>

HOMEPAGE CMS

</span>

<h3>

All Homepage Projects

</h3>

</div>

<!-- GRID -->

<div class="projects-grid">

<?php if(!empty($projects)): ?>

<?php foreach($projects as $project): ?>

<div class="project-card">

<!-- IMAGE -->

<div class="project-image">

<img
src="<?= base_url('uploads/homepage/' . (string)$project['thumbnail']) ?>"
alt="<?= esc((string)$project['title']) ?>"
>

</div>

<!-- CONTENT -->

<div class="project-content">

<h3>

<?= esc((string)$project['title']) ?>

</h3>

<p>

<?= substr(
    esc((string)$project['description']),
    0,
    120
) ?>...

</p>

<!-- TAG -->

<div class="project-tag">

<i class="ri-star-smile-line"></i>

<?= esc((string)$project['category']) ?>

</div>

<!-- LOCATION -->

<div class="location">

<i class="ri-map-pin-line"></i>

<?= esc((string)$project['location']) ?>

</div>

<!-- META -->

<div class="project-meta">

<div class="meta-item">

<span>YEAR</span>

<p>

<?= esc((string)$project['year']) ?>

</p>

</div>

<div class="meta-item">

<span>DESIGNER</span>

<p>

<?= esc((string)$project['designer']) ?>

</p>

</div>

<div class="meta-item">

<span>TEAM</span>

<p>

<?= esc((string)$project['team']) ?>

</p>

</div>

<div class="meta-item">

<span>AREA</span>

<p>

<?= esc((string)$project['area']) ?>

</p>

</div>

</div>

<!-- ACTIONS -->

<div class="project-actions">

<a
href="/admin/home-projects/edit/<?= $project['id'] ?>"
class="edit-btn"
>

<i class="ri-pencil-line"></i>

EDIT

</a>

<a
href="/project/<?= $project['id'] ?>"
class="view-btn"
target="_blank"
>

<i class="ri-eye-line"></i>

VIEW

</a>

<a
href="/admin/home-projects/gallery/<?= $project['id'] ?>"
class="gallery-btn"
>

<i class="ri-image-line"></i>

GALLERY

</a>

<a
href="/admin/home-projects/delete/<?= $project['id'] ?>"
class="delete-btn"
onclick="return confirm('Delete this homepage project?')"
>

<i class="ri-delete-bin-line"></i>

DELETE

</a>

</div>

</div>

</div>

<?php endforeach; ?>

<?php else: ?>

<div class="empty-box">

<i class="ri-gallery-line"></i>

<h3>

No Homepage Projects Yet

</h3>

<p>

Create your first cinematic architecture showcase project.

</p>

</div>

<?php endif; ?>

</div>

</div>

<!-- GSAP -->

<script
src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js"
></script>

<script>

gsap.from(
'.dashboard-hero',
{
    y:60,
    opacity:0,
    duration:1.2,
    ease:'power4.out'
}
);

gsap.from(
'.topbar',
{
    y:40,
    opacity:0,
    delay:0.2,
    duration:1,
    ease:'power4.out'
}
);

gsap.from(
'.project-card',
{
    y:100,
    opacity:0,
    stagger:0.08,
    duration:1.2,
    delay:0.3,
    ease:'power4.out'
}
);

</script>

</body>

</html>