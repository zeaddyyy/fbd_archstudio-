<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>FB Design Studio</title>

<link rel="stylesheet"
href="https://cdn.jsdelivr.net/npm/remixicon/fonts/remixicon.css">

<link rel="stylesheet"
href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
}

body{
    background:#0f0f0f;
    color:white;
    font-family:Arial,sans-serif;
    overflow-x:hidden;
}

/* NAVBAR */

.navbar{
    position:fixed;
    top:0;
    width:100%;
    z-index:1000;
    padding:25px 5%;
    display:flex;
    justify-content:space-between;
    align-items:center;
    backdrop-filter:blur(10px);
}

.logo{
    font-size:28px;
    font-weight:300;
    letter-spacing:2px;
}

.nav-links{
    display:flex;
    gap:30px;
}

.nav-links a{
    color:white;
    text-decoration:none;
}

/* HERO */

.hero{
    height:100vh;
    position:relative;
    overflow:hidden;
}

.hero video{
    width:100%;
    height:100%;
    object-fit:cover;
}

.hero-overlay{
    position:absolute;
    inset:0;
    background:rgba(0,0,0,0.45);

    display:flex;
    flex-direction:column;
    justify-content:center;
    align-items:center;
}

.hero-overlay h1{
    font-size:90px;
    font-weight:300;
    text-align:center;
}

.hero-overlay p{
    margin-top:20px;
    color:#ddd;
}

/* PROJECTS */

.projects{
    width:90%;
    margin:auto;
    padding:100px 0;
}

.section-title{
    font-size:50px;
    margin-bottom:60px;
    font-weight:300;
}

.projects-grid{
    columns:3 300px;
    column-gap:20px;
}

.project-card{
    position:relative;
    margin-bottom:20px;
    overflow:hidden;
    border-radius:20px;
    cursor:pointer;
}

.project-card img{
    width:100%;
    transition:0.5s;
}

.project-card:hover img{
    transform:scale(1.08);
}

.project-overlay{
    position:absolute;
    inset:0;
    background:linear-gradient(to top,
    rgba(0,0,0,0.7),
    transparent);

    display:flex;
    align-items:flex-end;
    padding:20px;
}

.project-overlay h3{
    font-size:24px;
    font-weight:300;
}

/* WHATSAPP */

.whatsapp-btn{
    position:fixed;
    bottom:25px;
    right:25px;

    width:65px;
    height:65px;

    background:#25D366;
    border-radius:50%;

    display:flex;
    justify-content:center;
    align-items:center;

    color:white;
    font-size:30px;

    text-decoration:none;

    z-index:9999;
}

/* INSTAGRAM */

.instagram-btn{
    position:fixed;
    bottom:100px;
    right:25px;

    width:65px;
    height:65px;

    background:#E1306C;
    border-radius:50%;

    display:flex;
    justify-content:center;
    align-items:center;

    color:white;
    font-size:30px;

    text-decoration:none;

    z-index:9999;
}

/* MOBILE */

@media(max-width:768px){

.hero-overlay h1{
    font-size:45px;
}

.section-title{
    font-size:35px;
}

.projects-grid{
    columns:1;
}

}

</style>

</head>

<body>

<!-- NAVBAR -->

<nav class="navbar">

<div class="logo">
FB Design Studio
</div>

<div class="nav-links">

<a href="#">Home</a>
<a href="#projects">Projects</a>
<a href="#">Contact</a>

</div>

</nav>

<!-- HERO -->

<section class="hero">

<video autoplay muted loop>

<source
src="/assets/videos/hero.mp4"
type="video/mp4"
>

</video>

<div class="hero-overlay">

<h1>
Architecture <br>
& Interiors
</h1>

<p>
Designing Timeless Luxury Spaces
</p>

</div>

</section>

<!-- PROJECTS -->

<section class="projects" id="projects">

<h2 class="section-title">
Selected Projects
</h2>

<div class="projects-grid">

<?php foreach($projects ?? [] as $project): ?>

<div class="project-card">

<img
src="/uploads/<?= $project['image'] ?>"
alt=""
>

<div class="project-overlay">

<h3><?= $project['title'] ?></h3>

</div>

</div>

<?php endforeach; ?>

</div>

</section>

<!-- WHATSAPP -->

<a
href="https://wa.me/917359129662"
target="_blank"
class="whatsapp-btn"
>

<i class="ri-whatsapp-line"></i>

</a>

<!-- INSTAGRAM -->

<a
href="https://www.instagram.com/fbdesign.studio"
target="_blank"
class="instagram-btn"
>

<i class="ri-instagram-line"></i>

</a>

<script src="https://cdn.jsdelivr.net/npm/gsap@3/dist/gsap.min.js"></script>

<script>

gsap.from(".hero-overlay h1",{
    y:100,
    opacity:0,
    duration:1.5
});

gsap.from(".hero-overlay p",{
    y:50,
    opacity:0,
    duration:1.5,
    delay:0.4
});

</script>

</body>
</html>