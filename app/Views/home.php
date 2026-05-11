<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta
name="viewport"
content="width=device-width, initial-scale=1.0"
>

<title>
FB Design Studio
</title>

<link
href="https://fonts.googleapis.com/css2?family=Outfit:wght@200;300;400;500;600;700&display=swap"
rel="stylesheet"
>

<link
rel="stylesheet"
href="https://cdn.jsdelivr.net/npm/remixicon/fonts/remixicon.css"
>

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
}

body{
    background:#090909;
    color:white;
    font-family:'Outfit',sans-serif;
    overflow-x:hidden;
}

/* NAVBAR */

.navbar{
    position:fixed;
    top:0;
    left:0;
    width:100%;
    padding:28px 6%;
    display:flex;
    justify-content:space-between;
    align-items:center;
    z-index:9999;

    backdrop-filter:blur(18px);

    background:
    rgba(0,0,0,0.18);

    border-bottom:
    1px solid rgba(255,255,255,0.04);
}

.logo{
    font-size:15px;
    letter-spacing:0.42em;
    color:#f3e7d6;
}

.nav-links{
    display:flex;
    gap:14px;
}

.nav-links a{
    text-decoration:none;
    color:#f3e7d6;
    font-size:13px;
    padding:12px 24px;
    border-radius:100px;
    transition:0.4s;

    background:
    rgba(255,255,255,0.03);

    border:
    1px solid rgba(255,255,255,0.04);
}

.nav-links a:hover{
    transform:
    translateY(-2px);

    background:
    rgba(217,176,120,0.12);
}

/* HERO */

.hero{
    position:relative;
    width:100%;
    height:100vh;
    overflow:hidden;
}

.hero video{
    width:100%;
    height:100%;
    object-fit:cover;
}

.hero::after{
    content:"";
    position:absolute;
    inset:0;

    background:
    linear-gradient(
        to bottom,
        rgba(0,0,0,0.18),
        rgba(5,5,5,0.9)
    );
}

/* HERO CONTENT */

.hero-content{
    position:absolute;
    inset:0;
    z-index:2;

    display:flex;
    flex-direction:column;
    justify-content:center;

    padding:0 7%;
}

.hero-content h1{
    font-size:9vw;
    line-height:0.9;
    font-weight:200;
    color:#f7ede1;

    animation:
    reveal 1.2s ease;
}

.hero-content p{
    margin-top:34px;
    max-width:620px;
    line-height:2;
    color:#d9c7b8;
    font-size:17px;

    animation:
    fadeUp 1s ease;
}

/* BUTTONS */

.hero-buttons{
    margin-top:44px;
    display:flex;
    gap:18px;
}

.hero-buttons a{
    text-decoration:none;
    padding:18px 36px;
    border-radius:100px;
    transition:0.4s;
}

.primary-btn{
    background:
    linear-gradient(
        135deg,
        #d9b078,
        #9f7c45
    );

    color:#111;
    font-weight:600;
}

.secondary-btn{
    background:
    rgba(255,255,255,0.04);

    border:
    1px solid rgba(255,255,255,0.05);

    color:#f3e7d6;
}

.hero-buttons a:hover{
    transform:
    translateY(-4px);
}

/* ABOUT */

.about{
    width:88%;
    margin:auto;
    padding:160px 0;

    display:grid;
    grid-template-columns:1fr 1fr;
    gap:80px;
}

.about h2{
    font-size:72px;
    font-weight:200;
    line-height:0.95;
    color:#f3e7d6;
}

.about p{
    line-height:2.2;
    color:#c7b59e;
    font-size:17px;
}

/* PROJECT BUTTON */

.projects-section{
    display:flex;
    justify-content:center;
    padding-bottom:160px;
}

.projects-btn{
    padding:22px 46px;
    border:none;
    border-radius:100px;

    background:
    linear-gradient(
        135deg,
        #d9b078,
        #9f7c45
    );

    color:#111;
    font-weight:600;
    letter-spacing:0.2em;

    cursor:pointer;
    transition:0.5s;
}

.projects-btn:hover{
    transform:
    translateY(-4px);

    box-shadow:
    0 20px 50px rgba(217,176,120,0.25);
}

/* PROJECT POPUP */

.projects-popup{
    position:fixed;
    inset:0;

    display:none;

    z-index:999999;
}

.projects-popup video{
    position:absolute;
    inset:0;

    width:100%;
    height:100%;

    object-fit:cover;

    filter:
    blur(8px)
    brightness(0.35);

    transform:scale(1.1);
}

.projects-overlay{
    position:absolute;
    inset:0;

    background:
    rgba(0,0,0,0.55);

    backdrop-filter:blur(10px);
}

.projects-content{
    position:relative;

    z-index:2;

    width:94%;
    max-width:1600px;

    height:92vh;

    margin:4vh auto;

    overflow-y:auto;

    padding:60px;

    border-radius:34px;

    background:
    rgba(15,15,15,0.18);

    backdrop-filter:blur(24px);

    border:
    1px solid rgba(255,255,255,0.05);
}

/* CLOSE */

.close-btn{
    position:absolute;
    top:24px;
    right:34px;

    font-size:60px;

    cursor:pointer;

    color:#f3e7d6;
}

/* TITLE */

.projects-title{
    text-align:center;

    font-size:82px;

    letter-spacing:0.08em;

    text-transform:uppercase;

    font-weight:200;

    margin-bottom:70px;

    color:#f3e7d6;
}

/* GRID */

.projects-grid{
    display:grid;

    grid-template-columns:
    repeat(
        auto-fit,
        minmax(320px,1fr)
    );

    gap:34px;
}

/* CARD */

.project-card{
    position:relative;

    cursor:pointer;

    transition:0.5s;
}

.project-card:hover{
    transform:
    translateY(-6px);
}

/* IMAGE */

.main-project-image{
    position:relative;

    width:100%;

    height:230px;

    overflow:hidden;

    border-radius:24px;
}

.main-project-image::after{
    content:"";

    position:absolute;
    inset:0;

    background:
    linear-gradient(
        to top,
        rgba(0,0,0,0.82),
        rgba(0,0,0,0.15)
    );
}

.main-project-image img{
    width:100%;
    height:100%;

    object-fit:cover;

    transition:1s;
}

.project-card:hover .main-project-image img{
    transform:scale(1.06);
}

/* INFO */

.project-info{
    position:absolute;
    top:24px;
    left:24px;
    z-index:5;
}

.project-info h3{
    font-size:24px;
    line-height:1.1;
    text-transform:uppercase;
    font-weight:700;
    color:white;
    margin-bottom:8px;
}

.project-info span{
    font-size:10px;

    letter-spacing:0.22em;

    text-transform:uppercase;

    color:
    rgba(255,255,255,0.7);
}

/* FULLSCREEN VIEWER */

.image-viewer{
    position:fixed;
    inset:0;

    background:
    rgba(0,0,0,0.92);

    z-index:9999999;

    display:flex;
    justify-content:center;
    align-items:center;
    flex-direction:column;

    opacity:0;
    visibility:hidden;

    transition:0.5s;

    backdrop-filter:blur(20px);
}

.image-viewer.active{
    opacity:1;
    visibility:visible;
}

/* MAIN IMAGE */

.image-viewer img{
    width:82vw;
    height:74vh;

    object-fit:cover;

    border-radius:26px;

    transform:
    scale(0.86);

    transition:0.8s;

    box-shadow:
    0 40px 120px rgba(0,0,0,0.55);
}

.image-viewer.active img{
    transform:scale(1);
}

/* CLOSE */

.close-viewer{
    position:absolute;

    top:28px;
    right:40px;

    font-size:70px;

    color:white;

    cursor:pointer;

    z-index:5;
}

/* COUNTER */

.image-counter{
    position:absolute;

    top:34px;
    left:50%;

    transform:translateX(-50%);

    background:
    rgba(255,255,255,0.08);

    padding:12px 24px;

    border-radius:100px;

    font-size:15px;

    letter-spacing:0.15em;

    z-index:5;
}

/* ARROWS */

.nav-arrow{
    position:absolute;

    top:50%;

    transform:translateY(-50%);

    width:70px;
    height:70px;

    border-radius:50%;

    background:
    rgba(255,255,255,0.08);

    backdrop-filter:blur(10px);

    display:flex;
    justify-content:center;
    align-items:center;

    cursor:pointer;

    z-index:5;

    transition:0.4s;
}

.nav-arrow:hover{
    background:
    rgba(255,255,255,0.16);

    transform:
    translateY(-50%)
    scale(1.08);
}

.nav-arrow i{
    font-size:42px;
    color:white;
}

.left-arrow{
    left:28px;
}

.right-arrow{
    right:28px;
}

/* THUMBNAILS */

.viewer-thumbnails{
    margin-top:24px;

    width:82vw;

    display:flex;

    gap:14px;

    overflow-x:auto;

    padding-bottom:10px;

    scrollbar-width:none;
}

.viewer-thumbnails::-webkit-scrollbar{
    display:none;
}

.viewer-thumbnails img{
    width:150px;
    height:90px;

    object-fit:cover;

    border-radius:16px;

    cursor:pointer;

    flex-shrink:0;

    opacity:0.5;

    transition:0.4s;

    border:
    2px solid transparent;
}

.viewer-thumbnails img.active-thumb{
    opacity:1;

    border:
    2px solid white;
}

.viewer-thumbnails img:hover{
    opacity:1;

    transform:
    translateY(-4px);
}

/* SOCIALS */

.socials{
    position:fixed;

    right:24px;
    bottom:24px;

    display:flex;
    flex-direction:column;

    gap:14px;

    z-index:999;
}

.socials a{
    width:64px;
    height:64px;

    border-radius:50%;

    display:flex;
    justify-content:center;
    align-items:center;

    font-size:28px;

    text-decoration:none;

    color:white;

    transition:0.4s;
}

.instagram{
    background:
    radial-gradient(
        circle at 30% 107%,
        #fdf497 0%,
        #fd5949 45%,
        #d6249f 60%,
        #285AEB 90%
    );
}

.whatsapp{
    background:#25D366;
}

.instagram:hover{
    transform:
    translateY(-4px)
    scale(1.08);

    box-shadow:
    0 0 20px rgba(214,36,159,0.8);
}

.whatsapp:hover{
    transform:
    translateY(-4px)
    scale(1.08);

    box-shadow:
    0 0 20px rgba(37,211,102,0.85);
}

/* ANIMATIONS */

@keyframes reveal{

from{
    opacity:0;

    transform:
    translateY(100px);

    filter:blur(10px);
}

to{
    opacity:1;

    transform:
    translateY(0);

    filter:blur(0);
}

}

@keyframes fadeUp{

from{
    opacity:0;

    transform:
    translateY(40px);
}

to{
    opacity:1;

    transform:
    translateY(0);
}

}

/* MOBILE */

@media(max-width:768px){

.hero-content h1{
    font-size:72px;
}

.about{
    grid-template-columns:1fr;
}

.about h2{
    font-size:52px;
}

.projects-grid{
    grid-template-columns:1fr;
}

.main-project-image{
    height:210px;
}

.project-info h3{
    font-size:20px;
}

.projects-title{
    font-size:52px;
}

.image-viewer img{
    width:94vw;
    height:58vh;
}

.viewer-thumbnails{
    width:94vw;
}

.viewer-thumbnails img{
    width:100px;
    height:70px;
}

.nav-arrow{
    width:54px;
    height:54px;
}

.nav-arrow i{
    font-size:32px;
}

.nav-links{
    display:none;
}

}

</style>

</head>

<body>

<!-- NAVBAR -->

<nav class="navbar">

<div class="logo">

<?php if (!empty($setting['site_logo'])): ?>

    <img
        src="<?= base_url('uploads/projects/' . $setting['site_logo']) ?>"
        style="height:40px; object-fit:contain;"
        alt="Logo"
    >

<?php else: ?>

    FB DESIGN STUDIO

<?php endif; ?>

</div>

<div class="nav-links">

<a href="#">
Home
</a>

<a
href="javascript:void(0)"
onclick="openProjects()"
>
Projects
</a>

<a href="/contact">
Contact
</a>

</div>

</nav>

<!-- HERO -->

<section class="hero">

<video autoplay muted loop playsinline>

<source
src="/assets/videos/hero.mp4"
type="video/mp4"
>

</video>

<div class="hero-content">

<h1>
Architecture <br>
& Interiors
</h1>

<p>
Crafting timeless luxury spaces through
minimal architecture, cinematic storytelling
and emotionally driven interiors.
</p>

<div class="hero-buttons">

<a
href="javascript:void(0)"
onclick="openProjects()"
class="primary-btn"
>
View Projects
</a>

<a
href="/contact"
class="secondary-btn"
>
Contact Studio
</a>

</div>

</div>

</section>

<!-- ABOUT -->

<section class="about">

<div>

<h2>
Designing <br>
Experiences
</h2>

</div>

<div>

<p>
FB Design Studio creates emotionally immersive
spaces inspired by cinematic architecture,
minimal luxury and timeless spatial storytelling.
Every project is crafted with material sensitivity,
light composition and elevated aesthetics.
</p>

</div>

</section>

<!-- BUTTON -->

<section class="projects-section">

<button
class="projects-btn"
onclick="openProjects()"
>

VIEW PROJECTS

</button>

</section>

<!-- PROJECT POPUP -->

<div
class="projects-popup"
id="projectsPopup"
>

<video autoplay muted loop playsinline>

<source
src="/assets/videos/hero.mp4"
type="video/mp4"
>

</video>

<div class="projects-overlay"></div>

<div class="projects-content">

<span
class="close-btn"
onclick="closeProjects()"
>
&times;
</span>

<h2 class="projects-title">
Projects
</h2>

<div class="projects-grid">

<?php foreach($projects ?? [] as $project): ?>

<?php

$gallery =
json_decode(
$project['gallery'] ?? '[]',
true
);

$mainImage =
isset($gallery[0])
? $gallery[0]
: '';

?>

<div class="project-card">

<div
class="main-project-image"

onclick='openViewer(

<?= json_encode(
array_map(
fn($img)=>
base_url(
"uploads/projects/" .
basename($img)
),
$gallery
)
) ?>

)'
>

<?php if(!empty($mainImage)): ?>

<img
src="<?= base_url('uploads/projects/' . basename($mainImage)) ?>"
alt=""
>

<?php endif; ?>

</div>

<div class="project-info">

<h3>
<?= esc((string)$project['title']) ?>
</h3>

<span>
<?= esc((string)$project['location']) ?>
</span>

</div>

</div>

<?php endforeach; ?>

</div>

</div>

</div>

<!-- FULLSCREEN VIEWER -->

<div
class="image-viewer"
id="imageViewer"
>

<!-- CLOSE -->

<span
class="close-viewer"
onclick="closeViewer()"
>
&times;
</span>

<!-- COUNTER -->

<div class="image-counter">

<span id="currentImage">
1
</span>

/

<span id="totalImages">
1
</span>

</div>

<!-- LEFT -->

<div
class="nav-arrow left-arrow"
onclick="prevImage()"
>
<i class="ri-arrow-left-s-line"></i>
</div>

<!-- RIGHT -->

<div
class="nav-arrow right-arrow"
onclick="nextImage()"
>
<i class="ri-arrow-right-s-line"></i>
</div>

<!-- IMAGE -->

<img
id="viewerImage"
src=""
>

<!-- THUMBNAILS -->

<div
class="viewer-thumbnails"
id="viewerThumbnails"
>
</div>

</div>

<!-- SOCIALS -->

<div class="socials">

<a
href="https://instagram.com"
target="_blank"
class="instagram"
>

<i class="ri-instagram-line"></i>

</a>

<a
href="https://wa.me/917359129662"
target="_blank"
class="whatsapp"
>

<i class="ri-whatsapp-line"></i>

</a>

</div>

<script>

/* PROJECTS */

function openProjects()
{
    document.getElementById(
    'projectsPopup'
    ).style.display='block';

    document.body.style.overflow='hidden';
}

function closeProjects()
{
    document.getElementById(
    'projectsPopup'
    ).style.display='none';

    document.body.style.overflow='auto';
}

/* GALLERY */

let currentGallery = [];

let currentIndex = 0;

/* OPEN */

function openViewer(images,index=0)
{
    currentGallery = images;

    currentIndex = index;

    updateViewer();

    document.getElementById(
    'imageViewer'
    ).classList.add(
    'active'
    );

    document.body.style.overflow='hidden';
}

/* CLOSE */

function closeViewer()
{
    document.getElementById(
    'imageViewer'
    ).classList.remove(
    'active'
    );

    document.body.style.overflow='auto';
}

/* UPDATE */

function updateViewer()
{
    document.getElementById(
    'viewerImage'
    ).src =
    currentGallery[currentIndex];

    document.getElementById(
    'currentImage'
    ).innerText =
    currentIndex + 1;

    document.getElementById(
    'totalImages'
    ).innerText =
    currentGallery.length;

    let thumbs = '';

    currentGallery.forEach(
    (img,index)=>
    {
        thumbs += `
        <img
        src="${img}"

        class="${
        index===currentIndex
        ? 'active-thumb'
        : ''
        }"

        onclick="
        currentIndex=${index};
        updateViewer();
        "
        >
        `;
    });

    document.getElementById(
    'viewerThumbnails'
    ).innerHTML = thumbs;
}

/* NEXT */

function nextImage()
{
    currentIndex++;

    if(
    currentIndex >=
    currentGallery.length
    )
    {
        currentIndex = 0;
    }

    updateViewer();
}

/* PREV */

function prevImage()
{
    currentIndex--;

    if(currentIndex < 0)
    {
        currentIndex =
        currentGallery.length - 1;
    }

    updateViewer();
}

</script>

</body>
</html>