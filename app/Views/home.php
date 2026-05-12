<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<link
href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@300;400;500;600&family=Outfit:wght@200;300;400;500;600&display=swap"
rel="stylesheet"
>

<!-- HERO -->

<section class="lux-hero">

<!-- VIDEO BG -->

<div class="hero-video">

<video
autoplay
muted
loop
playsinline
>

<source
src="<?= base_url('assets/videos/hero.mp4') ?>"
type="video/mp4"
>

</video>

</div>

<!-- OVERLAY -->

<div class="hero-overlay"></div>

<!-- CONTENT -->

<div class="hero-content">

<div class="hero-top-line">

<div class="line"></div>

<span>
ARCHITECTURE & INTERIOR DESIGN
</span>

</div>

<div class="hero-small">

FB

</div>

<h1>

Design
Studio

</h1>

<div class="hero-est">

EST. 2026

</div>

<h2>

TIMELESS LUXURY SPACES

</h2>

<p>

Crafting immersive architecture and cinematic
interiors through minimal forms, natural textures,
luxury spatial composition and emotionally
elevated experiences.

</p>

<a
href="/projects"
class="hero-btn"
>

VIEW PROJECTS

<span></span>

</a>

</div>

<!-- STATS -->

<div class="hero-stats">

<div class="stat-box">

<h3>
20+
</h3>

<span>
PROJECTS
</span>

</div>

<div class="stat-box">

<h3>
3+
</h3>

<span>
YEARS
</span>

</div>

<div class="stat-box">

<h3>
5+
</h3>

<span>
CITIES
</span>

</div>

</div>

<!-- SCROLL -->

<div class="scroll-text">

SCROLL

</div>

</section>

<!-- GALLERY -->

<section class="gallery-section">

<div class="masonry-grid">

<div class="masonry-item tall">
<img src="<?= base_url('assets/images/project.jpg') ?>">
</div>

<div class="masonry-item">
<img src="<?= base_url('assets/images/project.jpg') ?>">
</div>

<div class="masonry-item large">
<img src="<?= base_url('assets/images/project.jpg') ?>">
</div>

<div class="masonry-item">
<img src="<?= base_url('assets/images/project.jpg') ?>">
</div>

<div class="masonry-item small">
<img src="<?= base_url('assets/images/project.jpg') ?>">
</div>

<div class="masonry-item">
<img src="<?= base_url('assets/images/project.jpg') ?>">
</div>

<div class="masonry-item tall">
<img src="<?= base_url('assets/images/project.jpg') ?>">
</div>

<div class="masonry-item">
<img src="<?= base_url('assets/images/project.jpg') ?>">
</div>

<div class="masonry-item wide">
<img src="<?= base_url('assets/images/project.jpg') ?>">
</div>

<div class="masonry-item">
<img src="<?= base_url('assets/images/project.jpg') ?>">
</div>

</div>

</section>

<!-- ABOUT -->

<section class="about-section">

<div class="about-left">

<div class="about-mini">

ABOUT FB DESIGN STUDIO

</div>

<h2>

Architecture
Beyond Aesthetics

</h2>

</div>

<div class="about-right">

<p>

FB Design Studio creates emotionally immersive
spaces inspired by cinematic storytelling,
modern architecture and timeless luxury.
Each project is designed through light,
texture, proportion and spatial emotion.

</p>

<a
href="/contact"
class="about-btn"
>

GET IN TOUCH

</a>

</div>

</section>

<!-- FOOTER -->

<section class="minimal-footer">

<div class="footer-logo">

FB DESIGN STUDIO

</div>

<div class="footer-links">

<a href="/projects">
PROJECTS
</a>

<a href="/contact">
CONTACT
</a>

<a href="#">
INSTAGRAM
</a>

</div>

<div class="footer-bottom">

© <?= date('Y') ?> FB DESIGN STUDIO

</div>

</section>

<!-- FLOATING SOCIALS -->

<div class="floating-socials">

<a
href="https://instagram.com"
target="_blank"
class="instagram-btn"
>

<i class="ri-instagram-line"></i>

</a>

<a
href="https://wa.me/917359129662"
target="_blank"
class="whatsapp-btn"
>

<i class="ri-whatsapp-line"></i>

</a>

</div>

<style>

/* GLOBAL */

html{
    scroll-behavior:smooth;
}

body{
    background:#f4f1ec;
    color:#111;
    overflow-x:hidden;
    font-family:'Outfit',sans-serif;
}

/* HERO */

.lux-hero{
    position:relative;
    width:100%;
    height:100vh;
    overflow:hidden;
}

/* VIDEO */

.hero-video{
    position:absolute;
    inset:0;
}

.hero-video video{
    width:100%;
    height:100%;

    object-fit:cover;

    filter:
    brightness(0.82);
}

/* OVERLAY */

.hero-overlay{
    position:absolute;
    inset:0;

    background:
    linear-gradient(
        to right,
        rgba(244,241,236,0.95),
        rgba(244,241,236,0.15)
    );
}

/* CONTENT */

.hero-content{
    position:relative;
    z-index:5;

    width:90%;
    height:100%;

    margin:auto;

    display:flex;
    flex-direction:column;
    justify-content:center;

    max-width:760px;
}

/* TOP LINE */

.hero-top-line{
    display:flex;
    align-items:center;
    gap:18px;

    margin-bottom:36px;
}

.line{
    width:70px;
    height:1px;

    background:#777;
}

.hero-top-line span{
    font-size:11px;
    letter-spacing:0.45em;
    color:#555;
}

/* SMALL */

.hero-small{
    font-size:18px;
    letter-spacing:0.5em;
    color:#444;
}

/* TITLE */

.hero-content h1{
    font-family:
    'Cormorant Garamond',
    serif;

    font-size:10vw;

    line-height:0.85;

    font-weight:300;

    color:#1a1a1a;
}

/* EST */

.hero-est{
    margin-top:24px;

    font-size:11px;

    letter-spacing:0.35em;

    color:#666;
}

/* SUBTITLE */

.hero-content h2{
    margin-top:24px;

    font-size:38px;

    font-weight:300;

    letter-spacing:0.08em;
}

/* TEXT */

.hero-content p{
    margin-top:34px;

    max-width:620px;

    line-height:2;

    color:#555;

    font-size:16px;
}

/* BUTTON */

.hero-btn{
    margin-top:42px;

    width:260px;
    height:72px;

    border:
    1px solid rgba(0,0,0,0.15);

    display:flex;
    align-items:center;
    justify-content:space-between;

    padding:0 30px;

    text-decoration:none;

    color:#111;

    background:white;

    letter-spacing:0.28em;

    font-size:11px;

    transition:
    1s cubic-bezier(.19,1,.22,1);
}

.hero-btn span{
    width:50px;
    height:1px;

    background:#111;
}

.hero-btn:hover{
    background:#111;
    color:white;
}

/* STATS */

.hero-stats{
    position:absolute;

    right:7%;
    bottom:80px;

    display:flex;

    gap:50px;

    z-index:5;
}

.stat-box{
    text-align:center;
}

.stat-box h3{
    font-size:38px;
    font-weight:300;
}

.stat-box span{
    font-size:10px;

    letter-spacing:0.35em;

    color:#666;
}

/* SCROLL */

.scroll-text{
    position:absolute;

    bottom:20px;
    left:50%;

    transform:translateX(-50%);

    font-size:10px;

    letter-spacing:0.5em;

    color:#777;

    z-index:10;
}

/* GALLERY */

.gallery-section{
    padding:30px 3% 100px;
    background:#f4f1ec;
}

/* MASONRY */

.masonry-grid{
    column-count:4;
    column-gap:16px;
}

/* ITEMS */

.masonry-item{
    position:relative;

    margin-bottom:16px;

    overflow:hidden;

    break-inside:avoid;

    cursor:pointer;

    background:white;
}

/* IMAGE */

.masonry-item img{
    width:100%;

    display:block;

    object-fit:cover;

    transition:
    1.2s cubic-bezier(.19,1,.22,1);

    height:420px;
}

/* HEIGHTS */

.masonry-item.tall img{
    height:680px;
}

.masonry-item.large img{
    height:560px;
}

.masonry-item.small img{
    height:300px;
}

.masonry-item.wide img{
    height:500px;
}

/* HOVER */

.masonry-item:hover img{
    transform:scale(1.05);
}

/* OVERLAY */

.masonry-item::after{
    content:"";

    position:absolute;
    inset:0;

    background:
    linear-gradient(
        to top,
        rgba(0,0,0,0.25),
        transparent
    );

    opacity:0;

    transition:0.6s;
}

.masonry-item:hover::after{
    opacity:1;
}

/* ABOUT */

.about-section{
    width:88%;

    margin:auto;

    padding:140px 0;

    display:grid;

    grid-template-columns:1fr 1fr;

    gap:80px;
}

.about-mini{
    font-size:11px;

    letter-spacing:0.35em;

    color:#777;

    margin-bottom:20px;
}

.about-left h2{
    font-family:
    'Cormorant Garamond',
    serif;

    font-size:6vw;

    line-height:0.95;

    font-weight:300;
}

.about-right p{
    line-height:2.1;

    color:#555;

    font-size:17px;

    margin-bottom:40px;
}

/* BUTTON */

.about-btn{
    display:inline-flex;

    align-items:center;
    justify-content:center;

    width:240px;
    height:70px;

    background:#111;

    color:white;

    text-decoration:none;

    letter-spacing:0.28em;

    font-size:11px;

    transition:0.5s;
}

.about-btn:hover{
    transform:translateY(-4px);
}

/* FOOTER */

.minimal-footer{
    border-top:
    1px solid rgba(0,0,0,0.08);

    padding:80px 5% 40px;
}

.footer-logo{
    font-size:32px;

    margin-bottom:50px;

    letter-spacing:0.2em;
}

.footer-links{
    display:flex;

    gap:50px;

    margin-bottom:70px;
}

.footer-links a{
    text-decoration:none;

    color:#111;

    letter-spacing:0.25em;

    font-size:11px;
}

.footer-bottom{
    font-size:11px;

    letter-spacing:0.28em;

    color:#777;
}

/* FLOATING SOCIALS */

.floating-socials{
    position:fixed;

    right:24px;
    bottom:24px;

    display:flex;
    flex-direction:column;

    gap:14px;

    z-index:9999;
}

.floating-socials a{
    width:70px;
    height:70px;

    border-radius:50%;

    display:flex;
    justify-content:center;
    align-items:center;

    color:white;

    text-decoration:none;

    font-size:30px;

    transition:0.4s;
}

.instagram-btn{
    background:
    radial-gradient(
        circle at 30% 107%,
        #fdf497 0%,
        #fd5949 45%,
        #d6249f 60%,
        #285AEB 90%
    );
}

.whatsapp-btn{
    background:#25D366;
}

.floating-socials a:hover{
    transform:
    scale(1.08)
    translateY(-4px);
}

/* MOBILE */

@media(max-width:992px){

.masonry-grid{
    column-count:2;
}

}

@media(max-width:768px){

.hero-content h1{
    font-size:82px;
}

.hero-content h2{
    font-size:26px;
}

.hero-stats{
    position:relative;

    right:auto;
    bottom:auto;

    margin-top:60px;

    justify-content:space-between;
}

.masonry-grid{
    column-count:1;
}

.about-section{
    grid-template-columns:1fr;
}

.about-left h2{
    font-size:58px;
}

.footer-links{
    flex-direction:column;
    gap:20px;
}

}

</style>

<?= $this->endSection() ?>