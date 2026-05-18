<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<?php helper('text'); ?>

<section class="projects-page">

    <!-- BACKGROUND VIDEO -->

    <video autoplay muted loop playsinline class="bg-video">

        <source
        src="<?= base_url('assets/videos/hero.mp4') ?>"
        type="video/mp4"
        >

    </video>

    <div class="projects-overlay"></div>

    <div class="projects-container">

        <!-- HEADER -->

        <div class="projects-header">

            <span class="mini-title">
                FB DESIGN STUDIO
            </span>

            <h1>
                Selected<br>Projects
            </h1>

            <p>
                Minimal luxury architecture and cinematic interiors crafted with timeless spatial experiences.
            </p>

        </div>

        <!-- GRID -->

        <div class="projects-grid">

            <?php foreach(($projects ?? []) as $index => $project): ?>

            <?php

            $gallery =
            json_decode(
                $project['gallery'] ?? '[]',
                true
            );

            $mainImage = '';

            if(isset($gallery[0]))
            {
                if(is_array($gallery[0]))
                {
                    $mainImage =
                    $gallery[0]['file'] ?? '';
                }
                else
                {
                    $mainImage =
                    $gallery[0];
                }
            }

            $extension =
            pathinfo(
                $mainImage,
                PATHINFO_EXTENSION
            );

            $isVideo =
            in_array(
                strtolower($extension),
                ['mp4','mov','webm','ogg']
            );

            ?>

            <div class="project-card">

                <!-- NUMBER -->

                <div class="project-number">

                    <?= str_pad((string)($index + 1),2,'0',STR_PAD_LEFT) ?>

                </div>

                <!-- IMAGE -->

                <div
                class="main-project-image"
                onclick='openViewer(
                <?= json_encode($gallery) ?>
                )'
                >

                    <?php if($isVideo): ?>

                    <video
                    autoplay
                    muted
                    loop
                    playsinline
                    >

                        <source
                        src="<?= base_url('uploads/' . $mainImage) ?>"
                        type="video/mp4"
                        >

                    </video>

                    <?php else: ?>

                    <img
                    src="<?= base_url('uploads/' . $mainImage) ?>"
                    alt=""
                    >

                    <?php endif; ?>

                    <div class="project-gradient"></div>

                </div>

                <!-- CONTENT -->

                <div class="project-info">

                    <div class="project-top">

                        <span class="project-location">

                            <?= esc((string)$project['location']) ?>

                        </span>

                        <span class="project-year">

                            <?= esc((string)($project['year'] ?? '2026')) ?>

                        </span>

                    </div>

                    <h3>

                        <?= esc((string)$project['title']) ?>

                    </h3>

                    <p>

                        <?= character_limiter(
                            (string)$project['description'],
                            140
                        ) ?>

                    </p>

                    <div class="project-footer">

                        <div class="view-project">

                            View Project

                            <i class="ri-arrow-right-up-line"></i>

                        </div>

                    </div>

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
class="viewer-info"
id="viewerInfo"
>

    <h3 id="viewerTitle">
        Project Media
    </h3>

    <p id="viewerDescription">
        Description
    </p>

</div>

<div
class="viewer-thumbnails"
id="viewerThumbnails"
>
</div>
</div>

<style>

/* PAGE */

.projects-page{
    position:relative;

    min-height:100vh;

    padding:140px 6% 100px;

    overflow:hidden;

    background:#f4f1ec;
}

/* BG VIDEO */

.bg-video{
    position:absolute;

    inset:0;

    width:100%;
    height:100%;

    object-fit:cover;

    filter:
    blur(12px)
    brightness(0.3);

    transform:scale(1.1);
}

/* OVERLAY */

.projects-overlay{
    position:absolute;

    inset:0;

    background:
    rgba(244,241,236,0.72);

    backdrop-filter:blur(14px);
}

/* CONTAINER */

.projects-container{
    position:relative;

    z-index:2;
}

/* HEADER */

.projects-header{
    margin-bottom:100px;

    max-width:820px;
}

.mini-title{
    display:inline-block;

    margin-bottom:22px;

    padding:10px 22px;

    border-radius:100px;

    background:
    rgba(255,255,255,0.55);

    backdrop-filter:blur(10px);

    font-size:11px;

    letter-spacing:0.3em;

    text-transform:uppercase;

    color:#444;
}

.projects-header h1{
    font-size:120px;

    line-height:0.9;

    font-weight:300;

    color:#111;

    margin-bottom:28px;

    font-family:
    'Cormorant Garamond',
    serif;
}

.projects-header p{
    font-size:16px;

    line-height:2;

    color:#666;

    max-width:620px;
}

/* GRID */

.projects-grid{
    display:grid;

    grid-template-columns:
    repeat(
        auto-fit,
        minmax(380px,1fr)
    );

    gap:42px;

    align-items:start;
}

/* CARD */

.project-card{
    position:relative;

    overflow:hidden;

    border-radius:36px;

    background:
    rgba(255,255,255,0.52);

    border:
    1px solid rgba(255,255,255,0.45);

    backdrop-filter:blur(30px);

    box-shadow:
    0 30px 80px rgba(0,0,0,0.08);

    transition:
    0.8s cubic-bezier(.19,1,.22,1);
}

.project-card:hover{
    transform:
    translateY(-12px);

    box-shadow:
    0 50px 120px rgba(0,0,0,0.12);
}

/* NUMBER */

.project-number{
    position:absolute;

    top:24px;
    left:24px;

    z-index:20;

    font-size:13px;

    letter-spacing:0.35em;

    color:white;

    mix-blend-mode:difference;
}

/* IMAGE */

.main-project-image{
    position:relative;

    width:100%;

    height:420px;

    overflow:hidden;

    cursor:pointer;
}

.main-project-image img,
.main-project-image video{
    width:100%;
    height:100%;

    object-fit:cover;

    transition:1.2s cubic-bezier(.19,1,.22,1);
}

.project-card:hover img,
.project-card:hover video{
    transform:scale(1.08);
}

/* GRADIENT */

.project-gradient{
    position:absolute;

    inset:0;

    background:
    linear-gradient(
        to top,
        rgba(0,0,0,0.78),
        rgba(0,0,0,0.08),
        transparent
    );
}

/* INFO */

.project-info{
    padding:36px;
}

.project-top{
    display:flex;

    justify-content:space-between;

    align-items:center;

    margin-bottom:22px;
}

.project-location,
.project-year{
    font-size:10px;

    letter-spacing:0.32em;

    text-transform:uppercase;

    color:#777;

    padding:10px 18px;

    border-radius:100px;

    background:
    rgba(0,0,0,0.04);

    backdrop-filter:blur(10px);
}

.project-info h3{
    font-size:52px;

    line-height:0.92;

    font-weight:300;

    color:#111;

    margin-bottom:18px;

    font-family:
    'Cormorant Garamond',
    serif;
}

.project-info p{
    color:#666;

    line-height:2;

    font-size:15px;

    margin-top:18px;

    max-width:90%;
}

/* FOOTER */

.project-footer{
    margin-top:30px;
}

.view-project{
    display:flex;

    align-items:center;

    gap:12px;

    font-size:11px;

    letter-spacing:0.25em;

    text-transform:uppercase;

    color:#111;

    transition:0.4s;
}

.project-card:hover .view-project{
    transform:translateX(8px);
}

.view-project i{
    font-size:18px;
}

/* VIEWER */

.image-viewer{
    position:fixed;

    inset:0;

    background:
    rgba(10,10,10,0.88);

    z-index:9999999;

    display:flex;

    justify-content:center;
    align-items:center;

    flex-direction:column;

    opacity:0;

    visibility:hidden;

    transition:0.6s;

    backdrop-filter:blur(30px);
}

.image-viewer.active{
    opacity:1;

    visibility:visible;
}

.image-viewer img,
.image-viewer video{
    width:84vw;

    height:78vh;

    object-fit:cover;

    border-radius:34px;

    box-shadow:
    0 40px 120px rgba(0,0,0,0.45);
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
    rgba(255,255,255,0.08);

    backdrop-filter:blur(10px);

    display:flex;
    justify-content:center;
    align-items:center;

    font-size:42px;

    color:white;

    cursor:pointer;

    transition:0.4s;
}

.close-viewer:hover{
    transform:
    rotate(90deg)
    scale(1.05);
}

/* COUNTER */

.image-counter{
    position:absolute;

    top:34px;
    left:50%;

    transform:translateX(-50%);

    background:
    rgba(255,255,255,0.08);

    padding:14px 28px;

    border-radius:100px;

    font-size:12px;

    letter-spacing:0.2em;

    color:white;
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
    rgba(255,255,255,0.08);

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

    width:84vw;

    display:flex;

    gap:14px;

    overflow-x:auto;

    padding-bottom:10px;
}

.viewer-thumbnails img{
    width:170px;
    height:110px;

    object-fit:cover;

    border-radius:18px;

    cursor:pointer;

    opacity:0.45;

    transition:0.5s;

    border:
    2px solid transparent;

    transform:scale(0.96);
}

.viewer-thumbnails img:hover{
    opacity:1;

    transform:scale(1);
}

.viewer-thumbnails img.active-thumb{
    opacity:1;

    border:
    2px solid white;
}
/* VIEWER INFO */

.viewer-info{
    width:84vw;

    margin-top:28px;

    margin-bottom:24px;

    padding:28px 34px;

    border-radius:28px;

    background:
    rgba(255,255,255,0.08);

    backdrop-filter:blur(20px);

    border:
    1px solid rgba(255,255,255,0.08);

    color:white;
}

.viewer-info h3{
    font-size:42px;

    font-weight:300;

    margin-bottom:12px;

    font-family:
    'Cormorant Garamond',
    serif;
}

.viewer-info p{
    font-size:15px;

    line-height:2;

    color:
    rgba(255,255,255,0.72);

    max-width:900px;
}

/* MOBILE */

@media(max-width:768px){

.projects-page{
    padding:120px 20px 80px;
}

.projects-header h1{
    font-size:62px;
}

.projects-grid{
    grid-template-columns:1fr;
}

.project-info h3{
    font-size:36px;
}

.main-project-image{
    height:320px;
}

.image-viewer img,
.image-viewer video{
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
    let current =
    currentGallery[currentIndex];

    let filePath = '';

    let mediaTitle =
    'Project Media';

    let mediaDescription =
    'Luxury architectural presentation.';

    /*
    |--------------------------------------------------------------------------
    | MEDIA OBJECT
    |--------------------------------------------------------------------------
    */

    if(typeof current === 'object')
    {
        filePath =
        current.file || '';

        mediaTitle =
        current.title ||
        'Project Media';

        mediaDescription =
        current.description ||
        'Luxury architectural presentation.';
    }

    else
    {
        filePath = current;
    }

    /*
    |--------------------------------------------------------------------------
    | TYPE
    |--------------------------------------------------------------------------
    */

    const extension =
    filePath
    .split('.')
    .pop()
    .toLowerCase();

    const isVideo =
    ['mp4','mov','webm','ogg']
    .includes(extension);

    const viewer =
    document.getElementById(
    'viewerImage'
    );

    /*
    |--------------------------------------------------------------------------
    | VIDEO
    |--------------------------------------------------------------------------
    */

    if(isVideo)
    {

        viewer.outerHTML =
        `
        <video
        id="viewerImage"
        controls
        autoplay
        style="
        width:84vw;
        height:78vh;
        object-fit:cover;
        border-radius:34px;
        "
        >
        <source
        src="/uploads/${filePath}"
        type="video/mp4"
        >
        </video>
        `;

    }

    /*
    |--------------------------------------------------------------------------
    | IMAGE
    |--------------------------------------------------------------------------
    */

    else
    {

        viewer.outerHTML =
        `
        <img
        id="viewerImage"
        src="/uploads/${filePath}"
        style="
        width:84vw;
        height:78vh;
        object-fit:cover;
        border-radius:34px;
        "
        >
        `;

    }

    /*
    |--------------------------------------------------------------------------
    | COUNTER
    |--------------------------------------------------------------------------
    */

    document.getElementById(
    'currentImage'
    ).innerText =
    currentIndex + 1;

    document.getElementById(
    'totalImages'
    ).innerText =
    currentGallery.length;

    /*
    |--------------------------------------------------------------------------
    | INFO
    |--------------------------------------------------------------------------
    */

    document.getElementById(
    'viewerTitle'
    ).innerText =
    mediaTitle;

    document.getElementById(
    'viewerDescription'
    ).innerText =
    mediaDescription;

    /*
    |--------------------------------------------------------------------------
    | THUMBNAILS
    |--------------------------------------------------------------------------
    */

    let thumbs = '';

    currentGallery.forEach(
    (media,index)=>
    {

        let thumbPath = '';

        if(typeof media === 'object')
        {
            thumbPath =
            media.file || '';
        }
        else
        {
            thumbPath =
            media;
        }

        thumbs += `
        <img
        src="/uploads/${thumbPath}"

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
    ).innerHTML =
    thumbs;
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