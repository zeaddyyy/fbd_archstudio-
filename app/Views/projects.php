<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<section class="projects-page">

<!-- BG VIDEO -->

<video autoplay muted loop playsinline>

<source
src="<?= base_url('assets/videos/hero.mp4') ?>"
type="video/mp4"
>

</video>

<div class="projects-overlay"></div>

<div class="projects-container">

<!-- TITLE -->

<div class="projects-header">

<h1>
Selected Projects
</h1>

<p>
Minimal luxury architecture and cinematic interiors.
</p>

</div>

<!-- GRID -->

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

<img
src="<?= base_url('uploads/projects/' . basename($mainImage)) ?>"
alt=""
>

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

</section>

<!-- VIEWER -->

<div
class="image-viewer"
id="imageViewer"
>

<span
class="close-viewer"
onclick="closeViewer()"
>
&times;
</span>

<div class="image-counter">

<span id="currentImage">
1
</span>

/

<span id="totalImages">
1
</span>

</div>

<div
class="nav-arrow left-arrow"
onclick="prevImage()"
>

<i class="ri-arrow-left-s-line"></i>

</div>

<div
class="nav-arrow right-arrow"
onclick="nextImage()"
>

<i class="ri-arrow-right-s-line"></i>

</div>

<img
id="viewerImage"
src=""
>

<div
class="viewer-thumbnails"
id="viewerThumbnails"
>
</div>

</div>

<style>

.projects-page{
    position:relative;

    min-height:100vh;

    padding:140px 6% 100px;

    overflow:hidden;

    background:#f4f1ec;
}

/* VIDEO BG */

.projects-page video{
    position:absolute;

    inset:0;

    width:100%;
    height:100%;

    object-fit:cover;

    filter:
    blur(10px)
    brightness(0.45);

    transform:scale(1.08);
}

/* OVERLAY */

.projects-overlay{
    position:absolute;
    inset:0;

    background:
    rgba(244,241,236,0.62);

    backdrop-filter:blur(12px);
}

/* CONTAINER */

.projects-container{
    position:relative;

    z-index:2;
}

/* HEADER */

.projects-header{
    margin-bottom:80px;
}

.projects-header h1{
    font-size:96px;

    font-weight:300;

    color:#1a1a1a;

    margin-bottom:18px;

    font-family:
    'Cormorant Garamond',
    serif;

    line-height:0.95;
}

.projects-header p{
    color:#666;

    font-size:14px;

    letter-spacing:0.18em;

    text-transform:uppercase;
}

/* GRID */

.projects-grid{
    display:grid;

    grid-template-columns:
    repeat(
        auto-fit,
        minmax(340px,1fr)
    );

    gap:34px;
}

/* CARD */

.project-card{
    position:relative;

    cursor:pointer;

    transition:0.5s;

    background:
    rgba(255,255,255,0.45);

    border:
    1px solid rgba(255,255,255,0.4);

    border-radius:32px;

    overflow:hidden;

    backdrop-filter:blur(24px);

    -webkit-backdrop-filter:blur(24px);

    box-shadow:
    0 15px 50px rgba(0,0,0,0.08);
}

.project-card:hover{
    transform:
    translateY(-10px);

    box-shadow:
    0 30px 80px rgba(0,0,0,0.12);
}

/* IMAGE */

.main-project-image{
    position:relative;

    width:100%;

    height:280px;

    overflow:hidden;
}

.main-project-image::after{
    content:"";

    position:absolute;
    inset:0;

    background:
    linear-gradient(
        to top,
        rgba(0,0,0,0.45),
        rgba(0,0,0,0.05)
    );
}

.main-project-image img{
    width:100%;
    height:100%;

    object-fit:cover;

    transition:1.2s cubic-bezier(.19,1,.22,1);
}

.project-card:hover .main-project-image img{
    transform:scale(1.08);
}

/* INFO */

.project-info{
    padding:28px;
}

.project-info h3{
    font-size:38px;

    line-height:1;

    font-weight:300;

    color:#1a1a1a;

    margin-bottom:14px;

    font-family:
    'Cormorant Garamond',
    serif;
}

.project-info span{
    font-size:11px;

    letter-spacing:0.22em;

    text-transform:uppercase;

    color:#666;
}

/* VIEWER */

.image-viewer{
    position:fixed;

    inset:0;

    background:
    rgba(244,241,236,0.72);

    z-index:9999999;

    display:flex;

    justify-content:center;
    align-items:center;

    flex-direction:column;

    opacity:0;

    visibility:hidden;

    transition:0.5s;

    backdrop-filter:blur(24px);
}

.image-viewer.active{
    opacity:1;

    visibility:visible;
}

.image-viewer img{
    width:82vw;

    height:74vh;

    object-fit:cover;

    border-radius:30px;

    transition:0.8s;

    box-shadow:
    0 30px 80px rgba(0,0,0,0.18);
}

/* CLOSE */

.close-viewer{
    position:absolute;

    top:28px;
    right:40px;

    width:64px;
    height:64px;

    border-radius:50%;

    background:
    rgba(255,255,255,0.5);

    backdrop-filter:blur(12px);

    display:flex;
    justify-content:center;
    align-items:center;

    font-size:42px;

    color:#111;

    cursor:pointer;

    transition:0.4s;

    border:
    1px solid rgba(0,0,0,0.05);
}

.close-viewer:hover{
    transform:
    rotate(90deg)
    scale(1.06);

    background:white;
}

/* COUNTER */

.image-counter{
    position:absolute;

    top:34px;
    left:50%;

    transform:translateX(-50%);

    background:
    rgba(255,255,255,0.45);

    backdrop-filter:blur(10px);

    padding:14px 26px;

    border-radius:100px;

    font-size:12px;

    letter-spacing:0.2em;

    text-transform:uppercase;

    color:#111;
}

/* ARROWS */

.nav-arrow{
    position:absolute;

    top:50%;

    transform:translateY(-50%);

    width:72px;
    height:72px;

    border-radius:50%;

    background:
    rgba(255,255,255,0.45);

    backdrop-filter:blur(12px);

    display:flex;
    justify-content:center;
    align-items:center;

    cursor:pointer;

    transition:0.4s;
}

.nav-arrow:hover{
    transform:
    translateY(-50%)
    scale(1.08);
}

.nav-arrow i{
    font-size:42px;

    color:#111;
}

.left-arrow{
    left:28px;
}

.right-arrow{
    right:28px;
}

/* THUMBS */

.viewer-thumbnails{
    margin-top:24px;

    width:82vw;

    display:flex;

    gap:14px;

    overflow-x:auto;

    padding-bottom:10px;
}

.viewer-thumbnails img{
    width:150px;
    height:90px;

    object-fit:cover;

    border-radius:18px;

    cursor:pointer;

    opacity:0.45;

    transition:0.4s;

    border:
    2px solid transparent;
}

.viewer-thumbnails img.active-thumb{
    opacity:1;

    border:
    2px solid #111;
}

/* MOBILE */

@media(max-width:768px){

.projects-page{
    padding:120px 20px 80px;
}

.projects-header h1{
    font-size:58px;
}

.projects-grid{
    grid-template-columns:1fr;
}

.project-info h3{
    font-size:30px;
}

.image-viewer img{
    width:94vw;
    height:58vh;
}

.nav-arrow{
    width:56px;
    height:56px;
}

.close-viewer{
    width:54px;
    height:54px;

    font-size:34px;
}

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

    display:flex;
    justify-content:center;
    align-items:center;

    cursor:pointer;
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

/* THUMBS */

.viewer-thumbnails{
    margin-top:24px;

    width:82vw;

    display:flex;

    gap:14px;

    overflow-x:auto;
}

.viewer-thumbnails img{
    width:150px;
    height:90px;

    object-fit:cover;

    border-radius:16px;

    cursor:pointer;

    opacity:0.5;
}

.viewer-thumbnails img.active-thumb{
    opacity:1;

    border:
    2px solid white;
}

@media(max-width:768px){

.projects-header h1{
    font-size:52px;
}

.projects-grid{
    grid-template-columns:1fr;
}

.image-viewer img{
    width:94vw;
    height:58vh;
}

}

</style>

<script>

let currentGallery = [];

let currentIndex = 0;

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

function closeViewer()
{
    document.getElementById(
    'imageViewer'
    ).classList.remove(
    'active'
    );

    document.body.style.overflow='auto';
}

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

<?= $this->endSection() ?>