<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<section class="about-page">

<!-- BG VIDEO -->

<video autoplay muted loop playsinline>

<source
src="<?= base_url('assets/videos/hero.mp4') ?>"
type="video/mp4"
>

</video>

<div class="about-overlay"></div>

<div class="about-container">

<!-- TITLE -->

<div class="about-header">

<h1>
About Studio
</h1>

<p>
Architecture beyond space.
</p>

</div>

<!-- STUDIO STORY -->

<div class="studio-story">

<div class="story-text">

<h2>
FB Design Studio
</h2>

<p>
FB Design Studio is a multidisciplinary architecture and interior design practice founded with a vision to create spaces that transcend the ordinary. We believe that great design is not just about aesthetics—it's about creating emotional connections, telling stories through spaces, and crafting environments that inspire and elevate the human experience.
</p>

<p>
Our approach combines material sensitivity, spatial composition, and elevated aesthetics to produce timeless architecture that resonates with its inhabitants. Every project, whether residential, commercial, or cultural, is approached with the same level of dedication, creativity, and attention to detail.
</p>

</div>

<div class="story-image">

<img
src="<?= base_url('assets/images/studio.jpg') ?>"
alt="FB Design Studio"
>

</div>

</div>

<!-- PHILOSOPHY -->

<div class="philosophy-section">

<h3>
Our Philosophy
</h3>

<div class="philosophy-grid">

<div class="philosophy-card">

<i class="ri-leaf-line"></i>

<h4>
Material Sensitivity
</h4>

<p>
We carefully select and craft materials to create spaces that feel authentic, warm, and deeply connected to their environment.
</p>

</div>

<div class="philosophy-card">

<i class="ri-pen-nib-line"></i>

<h4>
Spatial Composition
</h4>

<p>
Our designs focus on the harmony between spaces, light, and movement to create seamless and intuitive experiences.
</p>

</div>

<div class="philosophy-card">

<i class="ri-crown-line"></i>

<h4>
Elevated Aesthetics
</h4>

<p>
We pursue timeless elegance that transcends trends, creating spaces that remain beautiful and relevant for years to come.
</p>

</div>

</div>

</div>

<!-- TEAM SECTION -->

<div class="team-section">

<h3>
Meet Our Team
</h3>

<div class="team-grid">

<div class="team-card">

<div class="team-image">

<img
src="https://randomuser.me/api/portraits/men/32.jpg"
alt="Faiyaz Bhayji"
>

</div>

<h4>
Faiyaz Bhayji
</h4>

<span class="team-role">
FOUNDER & PRINCIPAL DESIGNER
</span>

<div class="team-social">

<a href="#">
<i class="ri-linkedin-line"></i>
</a>

<a href="#">
<i class="ri-instagram-line"></i>
</a>

</div>

</div>

<div class="team-card">

<div class="team-image">

<img
src="https://randomuser.me/api/portraits/women/68.jpg"
alt="Priya Sharma"
>

</div>

<h4>
Priya Sharma
</h4>

<span class="team-role">
SENIOR ARCHITECT
</span>

<div class="team-social">

<a href="#">
<i class="ri-linkedin-line"></i>
</a>

<a href="#">
<i class="ri-instagram-line"></i>
</a>

</div>

</div>

<div class="team-card">

<div class="team-image">

<img
src="https://randomuser.me/api/portraits/men/45.jpg"
alt="Rajiv Mehta"
>

</div>

<h4>
Rajiv Mehta
</h4>

<span class="team-role">
INTERIOR DESIGN DIRECTOR
</span>

<div class="team-social">

<a href="#">
<i class="ri-linkedin-line"></i>
</a>

<a href="#">
<i class="ri-instagram-line"></i>
</a>

</div>

</div>

<div class="team-card">

<div class="team-image">

<img
src="https://randomuser.me/api/portraits/women/89.jpg"
alt="Anita Desai"
>

</div>

<h4>
Anita Desai
</h4>

<span class="team-role">
PROJECT MANAGER
</span>

<div class="team-social">

<a href="#">
<i class="ri-linkedin-line"></i>
</a>

<a href="#">
<i class="ri-instagram-line"></i>
</a>

</div>

</div>

</div>

</div>

<!-- VALUES -->

<div class="values-section">

<h3>
Core Values
</h3>

<div class="values-grid">

<div class="value-card">

<i class="ri-heart-line"></i>

<h4>
Passion
</h4>

<p>
We pour our hearts into every project, driven by a genuine love for design and creation.
</p>

</div>

<div class="value-card">

<i class="ri-lightbulb-line"></i>

<h4>
Innovation
</h4>

<p>
We constantly explore new ideas, materials, and techniques to push the boundaries of design.
</p>

</div>

<div class="value-card">

<i class="ri-hand-heart-line"></i>

<h4>
Integrity
</h4>

<p>
We build trust through honest communication, transparency, and delivering on our promises.
</p>

</div>

<div class="value-card">

<i class="ri-group-line"></i>

<h4>
Collaboration
</h4>

<p>
We believe the best results come from working closely with clients, artisans, and craftsmen.
</p>

</div>

</div>

</div>

</div>

</section>

<style>

.about-page{
    position:relative;

    min-height:100vh;

    padding:140px 6% 100px;

    overflow:hidden;

    background:#f4f1ec;
}

/* VIDEO BG */

.about-page video{
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

.about-overlay{
    position:absolute;
    inset:0;

    background:
    rgba(244,241,236,0.62);

    backdrop-filter:blur(12px);
}

/* CONTAINER */

.about-container{
    position:relative;

    z-index:2;
}

/* HEADER */

.about-header{
    margin-bottom:80px;
}

.about-header h1{
    font-size:96px;

    font-weight:300;

    color:#1a1a1a;

    margin-bottom:18px;

    font-family:
    'Cormorant Garamond',
    serif;

    line-height:0.95;
}

.about-header p{
    color:#666;

    font-size:14px;

    letter-spacing:0.18em;

    text-transform:uppercase;
}

/* STUDIO STORY */

.studio-story{
    display:grid;

    grid-template-columns:1fr 1fr;

    gap:60px;

    margin-bottom:100px;
}

.story-text h2{
    font-size:48px;

    font-weight:300;

    color:#1a1a1a;

    margin-bottom:30px;

    font-family:
    'Cormorant Garamond',
    serif;
}

.story-text p{
    font-size:16px;

    line-height:1.9;

    color:#555;

    margin-bottom:25px;
}

.story-image{
    border-radius:28px;

    overflow:hidden;

    height:450px;
}

.story-image img{
    width:100%;
    height:100%;

    object-fit:cover;

    transition:1.2s cubic-bezier(.19,1,.22,1);
}

.story-image:hover img{
    transform:scale(1.05);
}

/* PHILOSOPHY SECTION */

.philosophy-section{
    margin-bottom:100px;
}

.philosophy-section h3{
    font-size:42px;

    font-weight:300;

    color:#1a1a1a;

    margin-bottom:50px;

    font-family:
    'Cormorant Garamond',
    serif;

    text-align:center;
}

.philosophy-grid{
    display:grid;

    grid-template-columns:repeat(3,1fr);

    gap:34px;
}

.philosophy-card{
    background:
    rgba(255,255,255,0.45);

    border:
    1px solid rgba(255,255,255,0.4);

    border-radius:28px;

    padding:40px 30px;

    text-align:center;

    backdrop-filter:blur(24px);

    transition:0.5s;
}

.philosophy-card:hover{
    transform:
    translateY(-10px);

    box-shadow:
    0 30px 80px rgba(0,0,0,0.12);
}

.philosophy-card i{
    font-size:54px;

    color:#c9a03d;

    margin-bottom:25px;

    display:inline-block;
}

.philosophy-card h4{
    font-size:24px;

    font-weight:500;

    color:#1a1a1a;

    margin-bottom:20px;

    font-family:
    'Cormorant Garamond',
    serif;
}

.philosophy-card p{
    font-size:14px;

    line-height:1.7;

    color:#666;
}

/* TEAM SECTION */

.team-section{
    margin-bottom:100px;
}

.team-section h3{
    font-size:42px;

    font-weight:300;

    color:#1a1a1a;

    margin-bottom:50px;

    font-family:
    'Cormorant Garamond',
    serif;

    text-align:center;
}

.team-grid{
    display:grid;

    grid-template-columns:repeat(4,1fr);

    gap:30px;
}

.team-card{
    background:
    rgba(255,255,255,0.45);

    border:
    1px solid rgba(255,255,255,0.4);

    border-radius:28px;

    padding:30px 25px;

    text-align:center;

    backdrop-filter:blur(24px);

    transition:0.5s;
}

.team-card:hover{
    transform:
    translateY(-10px);

    box-shadow:
    0 30px 80px rgba(0,0,0,0.12);
}

.team-image{
    width:180px;
    height:180px;

    margin:0 auto 20px;

    border-radius:50%;

    overflow:hidden;
}

.team-image img{
    width:100%;
    height:100%;

    object-fit:cover;

    transition:0.5s;
}

.team-card:hover .team-image img{
    transform:scale(1.08);
}

.team-card h4{
    font-size:22px;

    font-weight:500;

    color:#1a1a1a;

    margin-bottom:8px;

    font-family:
    'Cormorant Garamond',
    serif;
}

.team-role{
    font-size:10px;

    letter-spacing:0.2em;

    color:#c9a03d;

    text-transform:uppercase;

    display:block;

    margin-bottom:18px;
}

.team-social{
    display:flex;

    justify-content:center;

    gap:15px;
}

.team-social a{
    width:38px;
    height:38px;

    border-radius:50%;

    background:
    rgba(255,255,255,0.45);

    display:flex;

    justify-content:center;
    align-items:center;

    color:#1a1a1a;

    text-decoration:none;

    transition:0.3s;
}

.team-social a:hover{
    background:#c9a03d;

    color:white;

    transform:translateY(-3px);
}

.team-social i{
    font-size:18px;
}

/* VALUES SECTION */

.values-section{
    margin-bottom:0;
}

.values-section h3{
    font-size:42px;

    font-weight:300;

    color:#1a1a1a;

    margin-bottom:50px;

    font-family:
    'Cormorant Garamond',
    serif;

    text-align:center;
}

.values-grid{
    display:grid;

    grid-template-columns:repeat(4,1fr);

    gap:30px;
}

.value-card{
    background:
    rgba(255,255,255,0.45);

    border:
    1px solid rgba(255,255,255,0.4);

    border-radius:28px;

    padding:35px 25px;

    text-align:center;

    backdrop-filter:blur(24px);

    transition:0.5s;
}

.value-card:hover{
    transform:
    translateY(-8px);

    box-shadow:
    0 30px 80px rgba(0,0,0,0.12);
}

.value-card i{
    font-size:48px;

    color:#c9a03d;

    margin-bottom:20px;

    display:inline-block;
}

.value-card h4{
    font-size:22px;

    font-weight:500;

    color:#1a1a1a;

    margin-bottom:15px;

    font-family:
    'Cormorant Garamond',
    serif;
}

.value-card p{
    font-size:13px;

    line-height:1.7;

    color:#666;
}

/* MOBILE */

@media(max-width:1024px){
    .philosophy-grid{
        grid-template-columns:repeat(2,1fr);
    }
    
    .values-grid{
        grid-template-columns:repeat(2,1fr);
    }
    
    .team-grid{
        grid-template-columns:repeat(2,1fr);
    }
}

@media(max-width:768px){

.about-page{
    padding:120px 20px 80px;
}

.about-header h1{
    font-size:58px;
}

.studio-story{
    grid-template-columns:1fr;
    
    gap:40px;
}

.story-text h2{
    font-size:38px;
}

.story-image{
    height:350px;
}

.philosophy-section h3{
    font-size:34px;
}

.philosophy-grid{
    grid-template-columns:1fr;
}

.team-section h3{
    font-size:34px;
}

.team-grid{
    grid-template-columns:1fr;
}

.team-image{
    width:160px;
    height:160px;
}

.values-section h3{
    font-size:34px;
}

.values-grid{
    grid-template-columns:1fr;
}

.philosophy-card{
    padding:30px 25px;
}

.value-card{
    padding:30px 25px;
}

}

</style>

<?= $this->endSection() ?>