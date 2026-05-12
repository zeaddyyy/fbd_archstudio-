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

    background:#090909;
}

.projects-page video{
    position:absolute;

    inset:0;

    width:100%;
    height:100%;

    object-fit:cover;

    filter:
    blur(8px)
    brightness(0.18);

    transform:scale(1.1);
}

.projects-overlay{
    position:absolute;
    inset:0;

    background:
    rgba(0,0,0,0.55);

    backdrop-filter:blur(10px);
}

.projects-container{
    position:relative;

    z-index:2;
}

.projects-header{
    margin-bottom:70px;
}

.projects-header h1{
    font-size:90px;

    font-weight:200;

    color:#f3e7d6;

    margin-bottom:20px;
}

.projects-header p{
    color:#bca991;

    font-size:17px;
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

    height:240px;

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

/* VIEWER */

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

.image-viewer img{
    width:82vw;

    height:74vh;

    object-fit:cover;

    border-radius:26px;

    transition:0.8s;
}

/* CLOSE */

.close-viewer{
    position:absolute;

    top:28px;
    right:40px;

    font-size:70px;

    color:white;

    cursor:pointer;
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