<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<?php

$projects =
$projects ?? [];

?>

<link
href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@300;400;500;600&family=Outfit:wght@200;300;400;500;600&display=swap"
rel="stylesheet"
>

<link
rel="stylesheet"
href="https://cdn.jsdelivr.net/npm/remixicon/fonts/remixicon.css"
>

<!-- HERO -->

<section class="lux-hero">

<!-- VIDEO -->

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

<div class="hero-mini">

FB DESIGN STUDIO

</div>

<h1>

Architecture <br>
Beyond Space

</h1>

<!-- SLOGAN SECTION -->
<div class="hero-slogan">
    <div class="achievement-badge">
        <i class="ri-award-line"></i>
        <span>15+ Years of Excellence</span>
    </div>
    <div class="slogan-text">
        <span class="highlight">150+ Projects Delivered</span> 
        <span class="divider">|</span>
        <span>10 International Awards</span>
        <span class="divider">|</span>
        <span>98% Client Satisfaction</span>
    </div>
</div>

<p>

Crafting cinematic luxury interiors,
minimal architecture and emotionally
immersive spatial experiences.

</p>

<div class="hero-buttons">
    <a
    href="#projects"
    class="hero-btn"
    >

    VIEW PROJECTS

    </a>
    
    <!-- ACHIEVEMENT BUTTON -->
    <a
    href="/achievements"
    class="achievement-btn"
    >

    OUR ACHIEVEMENTS
    <i class="ri-trophy-line"></i>

    </a>
</div>

</div>

<!-- SCROLL -->

<div class="scroll-indicator">

SCROLL

</div>

</section>

<!-- PROJECTS -->

<section
class="projects-section"
id="projects"
>

<div class="section-top">

<div class="section-mini">

CURATED WORKS

</div>

<h2>

Selected Projects

</h2>

</div>

<!-- GRID -->

<div class="projects-grid">

<?php if(!empty($projects)): ?>

<?php foreach($projects as $project): ?>

<?php

$gallery =
is_array($project['gallery'])
? $project['gallery']
: json_decode(
    $project['gallery'] ?? '[]',
    true
);

$gallery =
is_array($gallery)
? $gallery
: [];

$image =
!empty($project['thumbnail'])
? $project['thumbnail']
: (
    !empty($gallery[0])
    ? $gallery[0]
    : ''
);

$class =
!empty($project['layout_type'])
? $project['layout_type']
: '';

?>

<!-- ITEM -->

<div
class="project-item <?= esc((string)$class) ?>"
data-project='<?= json_encode([

"title" =>
(string)$project['title'],

"description" =>
(string)$project['description'],

"location" =>
(string)$project['location'],

"year" =>
(string)($project['year'] ?? ''),

"designer" =>
(string)($project['designer'] ?? ''),

"team" =>
(string)($project['team'] ?? ''),

"area" =>
(string)($project['area'] ?? ''),

"category" =>
(string)($project['category'] ?? ''),

"gallery" =>
$gallery

]) ?>'
>

<img
src="<?= base_url('uploads/homepage/' . (string)$image) ?>"
alt="<?= esc((string)$project['title']) ?>"
>

<!-- OVERLAY -->

<div class="project-overlay">

<div class="project-details">

<h3>

<?= esc((string)$project['title']) ?>

</h3>

<span>

<?= esc((string)$project['location']) ?>

</span>

</div>

</div>

</div>

<?php endforeach; ?>

<?php endif; ?>

</div>

</section>

<!-- ABOUT -->

<section class="about-section">

<div class="about-left">

<div class="section-mini">

ABOUT

</div>

<h2>

Luxury Design <br>
With Emotional <br>
Storytelling

</h2>

</div>

<div class="about-right">

<p>

FB Design Studio creates timeless
architecture and cinematic interiors
through material sensitivity, spatial
composition and elevated aesthetics.

Every project is crafted with detail,
light and emotional depth.

</p>

<a
href="/contact"
class="about-btn"
>

CONTACT STUDIO

</a>

</div>

</section>

<!-- LIGHTBOX -->

<div
class="project-lightbox"
id="projectLightbox"
>

<div
class="lightbox-overlay"
onclick="closeProjectPopup()"
></div>

<div class="lightbox-content">

<button
class="lightbox-close"
onclick="closeProjectPopup()"
>

<i class="ri-close-line"></i>

</button>

<!-- LEFT -->

<div class="lightbox-left">

<img
id="popupImage"
src=""
alt=""
>

<div
class="popup-thumbnails"
id="popupThumbnails"
></div>

</div>

<!-- RIGHT -->

<div class="lightbox-right">

<div class="lightbox-mini">

PROJECT DETAILS

</div>

<h2 id="popupTitle"></h2>

<div class="popup-location">

<i class="ri-map-pin-line"></i>

<span id="popupLocation"></span>

</div>

<!-- META -->

<div class="popup-meta">

<div class="meta-item">

<span>YEAR</span>

<p id="popupYear"></p>

</div>

<div class="meta-item">

<span>DESIGNER</span>

<p id="popupDesigner"></p>

</div>

<div class="meta-item">

<span>TEAM</span>

<p id="popupTeam"></p>

</div>

<div class="meta-item">

<span>AREA</span>

<p id="popupArea"></p>

</div>

<div class="meta-item">

<span>CATEGORY</span>

<p id="popupCategory"></p>

</div>

</div>

<p id="popupDescription"></p>

</div>

</div>

</div>

<!-- FLOATING SOCIAL -->

<div class="floating-social">

<!-- INSTAGRAM -->

<a
href="https://www.instagram.com/fbdesign.studio"
target="_blank"
class="social-btn instagram"
>

<div class="social-tooltip">

Instagram

</div>

<i class="ri-instagram-line"></i>

</a>

<!-- WHATSAPP -->

<a
href="https://wa.me/917359129662"
target="_blank"
class="social-btn whatsapp"
>

<div class="social-tooltip">

WhatsApp

</div>

<i class="ri-whatsapp-line"></i>

</a>

</div>

<style>

/* RESET */

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
}

body{
    background:#f5f1ea;
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
    brightness(0.65);

    transform:scale(1.08);
}

/* OVERLAY */

.hero-overlay{
    position:absolute;
    inset:0;

    background:
    linear-gradient(
        to right,
        rgba(245,241,234,0.92),
        rgba(245,241,234,0.08)
    );
}

/* CONTENT */

.hero-content{
    position:relative;
    z-index:5;

    width:90%;
    max-width:780px;

    height:100%;

    margin:auto;

    display:flex;

    flex-direction:column;

    justify-content:center;
    
    padding-top: 80px;
}

/* MINI - Bigger Font */
.hero-mini{
    font-size:24px;
    letter-spacing:0.35em;
    color:#666;
    margin-bottom:15px;
    font-weight:600;
    text-transform:uppercase;
}

/* TITLE - Smaller Font */
.hero-content h1{
    font-family:'Cormorant Garamond', serif;
    font-size:clamp(42px, 5vw, 64px);
    line-height:1.15;
    font-weight:300;
    margin-bottom:25px;
    letter-spacing:-0.02em;
}

/* SLOGAN STYLES */
.hero-slogan {
    margin-top: 20px;
    margin-bottom: 20px;
}

.achievement-badge {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    background: rgba(0,0,0,0.05);
    backdrop-filter: blur(10px);
    padding: 6px 16px;
    border-radius: 100px;
    margin-bottom: 16px;
    font-size: 11px;
    letter-spacing: 0.1em;
    border: 1px solid rgba(0,0,0,0.1);
}

.achievement-badge i {
    font-size: 14px;
    color: #c9a03d;
}

.achievement-badge span {
    color: #333;
    font-weight: 500;
}

.slogan-text {
    display: flex;
    flex-wrap: wrap;
    gap: 12px;
    align-items: center;
    font-size: 12px;
    letter-spacing: 0.08em;
    color: #555;
}

.slogan-text .highlight {
    color: #c9a03d;
    font-weight: 600;
}

.slogan-text .divider {
    color: #ccc;
}

/* TEXT */

.hero-content p{
    margin-top: 20px;
    max-width:560px;
    line-height:1.8;
    color:#555;
    font-size:15px;
}

/* BUTTON CONTAINER */
.hero-buttons {
    display: flex;
    gap: 20px;
    margin-top: 35px;
    flex-wrap: wrap;
}

/* ORIGINAL BUTTON */
.hero-btn{
    width:220px;
    height:60px;

    display:flex;
    justify-content:center;
    align-items:center;

    text-decoration:none;

    border-radius:100px;

    background:#111;

    color:white;

    letter-spacing:0.28em;

    font-size:10px;

    transition:0.5s;
}

.hero-btn:hover{
    transform:
    translateY(-4px);
}

/* ACHIEVEMENT BUTTON */
.achievement-btn{
    width:240px;
    height:60px;

    display:flex;
    justify-content:center;
    align-items:center;
    gap: 10px;

    text-decoration:none;

    border-radius:100px;

    background: transparent;

    color:#111;

    letter-spacing:0.28em;

    font-size:10px;

    font-weight: 600;

    border: 1.5px solid #111;

    transition: 0.5s;
}

.achievement-btn i {
    font-size: 16px;
    transition: 0.3s;
}

.achievement-btn:hover{
    transform:
    translateY(-4px);
    
    background: #111;
    color: white;
}

.achievement-btn:hover i {
    transform: scale(1.1);
}

/* SCROLL */

.scroll-indicator{
    position:absolute;

    bottom:26px;
    left:50%;

    transform:translateX(-50%);

    font-size:10px;

    letter-spacing:0.5em;

    color:#777;

    z-index:10;
}

/* PROJECTS */

.projects-section{
    padding:100px 5%;
}

/* TOP */

.section-top{
    margin-bottom:50px;
}

.section-mini{
    font-size:11px;

    letter-spacing:0.38em;

    color:#777;

    margin-bottom:15px;
}

.section-top h2{
    font-family:
    'Cormorant Garamond',
    serif;

    font-size:clamp(42px, 6vw, 72px);

    font-weight:300;
}

/* GRID */

.projects-grid{
    display:grid;

    grid-template-columns:
    repeat(4,1fr);

    grid-auto-rows:260px;

    gap:18px;

    grid-auto-flow:dense;
}

/* ITEM */

.project-item{
    position:relative;

    overflow:hidden;

    border-radius:28px;

    cursor:pointer;

    opacity:0;

    transform:
    translateY(80px);
}

.project-item img{
    width:100%;
    height:100%;

    object-fit:cover;

    transition:
    1.2s cubic-bezier(.19,1,.22,1);
}

.project-item:hover img{
    transform:
    scale(1.08);
}

/* OVERLAY */

.project-overlay{
    position:absolute;
    inset:0;

    background:
    linear-gradient(
        to top,
        rgba(0,0,0,0.65),
        transparent
    );

    display:flex;

    align-items:flex-end;

    padding:25px;

    opacity:0;

    transition:0.5s;
}

.project-item:hover .project-overlay{
    opacity:1;
}

.project-details h3{
    color:white;

    font-size:24px;

    font-weight:300;

    margin-bottom:8px;
}

.project-details span{
    color:
    rgba(255,255,255,0.75);

    font-size:10px;

    letter-spacing:0.25em;
}

/* SIZES */

.project-item.tall{
    grid-row:span 2;
}

.project-item.wide{
    grid-column:span 2;
}

.project-item.large{
    grid-column:span 2;
    grid-row:span 2;
}

/* ABOUT */

.about-section{
    width:88%;

    margin:auto;

    padding:100px 0;

    display:grid;

    grid-template-columns:1fr 1fr;

    gap:80px;
}

.about-left h2{
    font-family:
    'Cormorant Garamond',
    serif;

    font-size:clamp(36px, 5vw, 60px);

    line-height:0.95;

    font-weight:300;
}

.about-right p{
    line-height:2;

    color:#555;

    font-size:16px;

    margin-bottom:35px;
}

.about-btn{
    width:220px;
    height:60px;

    display:flex;

    justify-content:center;
    align-items:center;

    text-decoration:none;

    background:#111;

    color:white;

    border-radius:100px;

    letter-spacing:0.28em;

    font-size:10px;

    transition:0.5s;
}

.about-btn:hover{
    transform:
    translateY(-4px);
}

/* LIGHTBOX */

.project-lightbox{
    position:fixed;

    inset:0;

    z-index:999999;

    display:none;

    justify-content:center;
    align-items:center;
}

.lightbox-overlay{
    position:absolute;
    inset:0;

    background:
    rgba(0,0,0,0.86);

    backdrop-filter:blur(18px);
}

.lightbox-content{
    position:relative;

    width:92%;
    max-width:1400px;

    height:88vh;

    background:#f5f1ea;

    border-radius:34px;

    overflow:hidden;

    display:grid;

    grid-template-columns:1.2fr 0.8fr;

    z-index:10;
}

/* CLOSE */

.lightbox-close{
    position:absolute;

    top:24px;
    right:24px;

    width:54px;
    height:54px;

    border:none;

    border-radius:50%;

    background:#111;

    color:white;

    cursor:pointer;

    z-index:20;
}

.lightbox-close i{
    font-size:28px;
}

/* LEFT */

.lightbox-left{
    padding:24px;

    display:flex;
    flex-direction:column;

    gap:16px;
}

.lightbox-left img{
    width:100%;
    height:100%;

    object-fit:cover;

    border-radius:22px;
}

/* THUMB */

.popup-thumbnails{
    display:flex;

    gap:12px;

    overflow-x:auto;
}

.popup-thumbnails img{
    width:90px;
    height:90px;

    border-radius:14px;

    cursor:pointer;

    opacity:0.75;

    transition:0.4s;
}

.popup-thumbnails img:hover{
    opacity:1;

    transform:scale(1.05);
}

/* RIGHT */

.lightbox-right{
    padding:60px 40px;

    overflow-y:auto;
}

.lightbox-mini{
    font-size:11px;

    letter-spacing:0.35em;

    color:#777;

    margin-bottom:20px;
}

.lightbox-right h2{
    font-family:
    'Cormorant Garamond',
    serif;

    font-size:clamp(36px, 5vw, 58px);

    font-weight:300;

    line-height:1;

    margin-bottom:20px;
}

/* LOCATION */

.popup-location{
    display:flex;

    align-items:center;

    gap:10px;

    margin-bottom:25px;

    color:#777;

    letter-spacing:0.15em;

    font-size:11px;
}

/* META */

.popup-meta{
    display:grid;

    grid-template-columns:
    repeat(2,1fr);

    gap:20px;

    margin-bottom:35px;
}

.meta-item span{
    display:block;

    font-size:10px;

    letter-spacing:0.25em;

    color:#888;

    margin-bottom:8px;
}

.meta-item p{
    font-size:14px;

    color:#111;

    line-height:1.6;
}

/* DESC */

.lightbox-right p{
    color:#555;

    line-height:1.9;

    font-size:15px;
}

/* FLOATING SOCIAL */

.floating-social{
    position:fixed;

    right:25px;
    bottom:25px;

    z-index:999999;

    display:flex;

    flex-direction:column;

    gap:15px;
}

/* BUTTON */

.social-btn{
    position:relative;

    width:65px;
    height:65px;

    border-radius:50%;

    display:flex;

    justify-content:center;
    align-items:center;

    text-decoration:none;

    overflow:hidden;

    backdrop-filter:blur(18px);

    border:
    1px solid rgba(255,255,255,0.18);

    box-shadow:
    0 20px 50px rgba(0,0,0,0.18);

    transition:
    0.6s cubic-bezier(.19,1,.22,1);
}

/* GLOW */

.social-btn::before{
    content:'';

    position:absolute;

    inset:0;

    background:
    linear-gradient(
        135deg,
        rgba(255,255,255,0.35),
        transparent
    );

    pointer-events:none;

    z-index:1;
}

/* ICON */

.social-btn i{
    position:relative;

    z-index:2;

    font-size:28px;

    transition:0.5s;
}

/* INSTAGRAM */

.instagram{
    background:
    linear-gradient(
        135deg,
        #fd5949,
        #d6249f,
        #285AEB
    );

    color:white;
}

/* WHATSAPP */

.whatsapp{
    background:
    linear-gradient(
        135deg,
        #25D366,
        #128C7E
    );

    color:white;
}

/* HOVER */

.social-btn:hover{
    transform:
    translateY(-8px)
    scale(1.08);

    box-shadow:
    0 30px 60px rgba(0,0,0,0.24);
}

.social-btn:hover i{
    transform:scale(1.12);
}

/* TOOLTIP */

.social-tooltip{
    position:absolute;

    right:90px;

    background:#111;

    color:white;

    padding:12px 20px;

    border-radius:100px;

    font-size:10px;

    letter-spacing:0.25em;

    text-transform:uppercase;

    opacity:0;

    visibility:hidden;

    transform:
    translateX(20px);

    transition:0.5s;

    white-space:nowrap;
}

.social-btn:hover .social-tooltip{
    opacity:1;

    visibility:visible;

    transform:
    translateX(0);
}

/* WHATSAPP PULSE */

.whatsapp::after{
    content:'';

    position:absolute;

    width:100%;
    height:100%;

    border-radius:50%;

    border:
    1px solid rgba(37,211,102,0.5);

    animation:
    whatsappPulse 2s infinite;
}

@keyframes whatsappPulse{

0%{
    transform:scale(1);
    opacity:1;
}

100%{
    transform:scale(1.8);
    opacity:0;
}

}

/* INSTAGRAM FLOAT */

.instagram{
    animation:
    instaFloat 4s ease-in-out infinite;
}

@keyframes instaFloat{

0%{
    transform:translateY(0px);
}

50%{
    transform:translateY(-6px);
}

100%{
    transform:translateY(0px);
}

}

/* RESPONSIVE */
@media(max-width:992px){
    .projects-grid{
        grid-template-columns:repeat(2,1fr);
    }
    
    .lightbox-content{
        grid-template-columns:1fr;
        height:95vh;
    }
}

@media(max-width:768px){
    .hero-content{
        padding-top: 100px;
    }
    
    .hero-mini{
        font-size:14px;
        letter-spacing:0.3em;
    }
    
    .hero-content h1{
        font-size:clamp(36px, 8vw, 48px);
    }
    
    .hero-buttons {
        flex-direction: column;
        width: 100%;
    }
    
    .hero-btn, .achievement-btn {
        width: 100%;
        max-width: 260px;
    }
    
    .hero-slogan{
        margin-top:15px;
    }
    
    .slogan-text {
        font-size: 9px;
        gap: 6px;
        flex-direction: column;
        align-items: flex-start;
    }
    
    .slogan-text .divider {
        display: none;
    }
    
    .achievement-badge{
        font-size:9px;
        padding:4px 12px;
    }
    
    .hero-content p{
        font-size:13px;
        line-height:1.6;
    }
    
    .projects-grid{
        grid-template-columns:1fr;
    }
    
    .project-item.large,
    .project-item.wide,
    .project-item.tall{
        grid-column:span 1;
        grid-row:span 1;
    }
    
    .about-section{
        grid-template-columns:1fr;
        gap:50px;
        padding:60px 0;
    }
    
    .about-left h2{
        font-size:clamp(32px, 8vw, 48px);
    }
    
    .about-right p{
        font-size:14px;
    }
    
    .lightbox-right h2{
        font-size:clamp(28px, 6vw, 38px);
    }
    
    .popup-meta{
        grid-template-columns:1fr;
        gap:15px;
    }
    
    .lightbox-right{
        padding:30px 25px;
    }
    
    .floating-social{
        right:15px;
        bottom:15px;
    }
    
    .social-btn{
        width:55px;
        height:55px;
    }
    
    .social-btn i{
        font-size:24px;
    }
    
    .social-tooltip{
        display:none;
    }
}

@media(max-width:480px){
    .hero-content{
        padding-top: 80px;
    }
    
    .hero-mini{
        font-size:12px;
        letter-spacing:0.25em;
    }
    
    .hero-content h1{
        font-size:clamp(32px, 7vw, 42px);
    }
    
    .hero-btn, .achievement-btn, .about-btn{
        height:50px;
        font-size:9px;
    }
    
    .hero-btn{
        width:180px;
    }
    
    .achievement-btn{
        width:200px;
    }
    
    .section-top h2{
        font-size:clamp(32px, 7vw, 42px);
    }
    
    .project-details h3{
        font-size:20px;
    }
}

/* Laptop Screen Fix - No Overlap */
@media(min-width:769px) and (max-width:1366px){
    .hero-content{
        padding-top: 100px;
    }
    
    .hero-mini{
        font-size: 16px;
        margin-bottom: 12px;
    }
    
    .hero-content h1{
        font-size: clamp(48px, 4.5vw, 58px);
        margin-bottom: 20px;
    }
}

/* Large Desktop */
@media(min-width:1367px){
    .hero-content{
        padding-top: 80px;
    }
    
    .hero-mini{
        font-size: 18px;
    }
    
    .hero-content h1{
        font-size: clamp(52px, 4.5vw, 64px);
    }
}

</style>

<!-- GSAP -->

<script
src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js"
></script>

<script
src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/ScrollTrigger.min.js"
></script>

<script>

gsap.registerPlugin(
ScrollTrigger
);

/* HERO */

gsap.from(
'.hero-mini',
{
    y:40,
    opacity:0,
    duration:1.2
}
);

gsap.from(
'.hero-content h1',
{
    y:100,
    opacity:0,
    duration:1.5,
    delay:0.2,
    ease:'power4.out'
}
);

gsap.from(
'.hero-slogan',
{
    y:40,
    opacity:0,
    duration:1.2,
    delay:0.4
}
);

gsap.from(
'.hero-content p',
{
    y:40,
    opacity:0,
    duration:1.2,
    delay:0.6
}
);

gsap.from(
'.hero-buttons',
{
    y:30,
    opacity:0,
    duration:1,
    delay:0.8
}
);

/* GALLERY */

gsap.utils.toArray(
'.project-item'
).forEach(
(item,i)=>
{
    gsap.to(
    item,
    {
        scrollTrigger:{
            trigger:item,
            start:'top 92%'
        },

        opacity:1,
        y:0,

        duration:1.2,

        delay:i * 0.05,

        ease:'power4.out'
    }
    );
}
);

/* OPEN POPUP */

document.querySelectorAll(
'.project-item'
).forEach(
(item)=>
{
    item.addEventListener(
    'click',
    ()=>{
        const data =
        JSON.parse(
            item.dataset.project
        );

        openProjectPopup(data);
    }
    );
}
);

/* OPEN */

function openProjectPopup(data)
{
    document.getElementById(
    'projectLightbox'
    ).style.display =
    'flex';

    document.body.style.overflow =
    'hidden';

    document.getElementById(
    'popupTitle'
    ).innerText =
    data.title;

    document.getElementById(
    'popupLocation'
    ).innerText =
    data.location;

    document.getElementById(
    'popupDescription'
    ).innerText =
    data.description;

    document.getElementById(
    'popupYear'
    ).innerText =
    data.year;

    document.getElementById(
    'popupDesigner'
    ).innerText =
    data.designer;

    document.getElementById(
    'popupTeam'
    ).innerText =
    data.team;

    document.getElementById(
    'popupArea'
    ).innerText =
    data.area;

    document.getElementById(
    'popupCategory'
    ).innerText =
    data.category;

    const mainImage =
    document.getElementById(
    'popupImage'
    );

    mainImage.src =
    '/uploads/homepage/' +
    data.gallery[0];

    const thumbs =
    document.getElementById(
    'popupThumbnails'
    );

    thumbs.innerHTML = '';

    data.gallery.forEach(
    (img)=>
    {
        const thumb =
        document.createElement(
            'img'
        );

        thumb.src =
        '/uploads/homepage/' + img;

        thumb.onclick =
        ()=>{
            mainImage.src =
            '/uploads/homepage/' + img;
        };

        thumbs.appendChild(
            thumb
        );
    }
    );
}

/* CLOSE */

function closeProjectPopup()
{
    document.getElementById(
    'projectLightbox'
    ).style.display =
    'none';

    document.body.style.overflow =
    'auto';
}

</script>

<?= $this->endSection() ?>