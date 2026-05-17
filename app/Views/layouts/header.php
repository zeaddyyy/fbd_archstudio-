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
href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@300;400;500;600&family=Outfit:wght@200;300;400;500;600&display=swap"
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

html{
    scroll-behavior:smooth;
}

body{
    background:#0b0b0b;

    font-family:'Outfit',sans-serif;

    overflow-x:hidden;
}

/* HEADER */

.main-header{
    position:fixed;

    top:0;
    left:0;

    width:100%;

    z-index:999999;

    padding:30px 5%;

    display:flex;

    justify-content:space-between;

    align-items:center;

    transition:
    0.7s cubic-bezier(.19,1,.22,1);

    background:transparent;

    border:none;

    backdrop-filter:none;
}

/* SCROLL GLASS */

.main-header.scrolled{

    background:
    rgba(0,0,0,0.28);

    backdrop-filter:blur(20px);

    border-bottom:
    1px solid rgba(255,255,255,0.06);

    box-shadow:
    0 10px 40px rgba(0,0,0,0.12);
}

/* LIGHT EFFECT */

.main-header::before{
    content:"";

    position:absolute;

    inset:0;

    background:
    linear-gradient(
        to right,
        rgba(255,255,255,0.04),
        transparent
    );

    pointer-events:none;
}

/* LOGO */

.logo{
    position:relative;

    z-index:10;

    display:flex;

    align-items:center;

    text-decoration:none;

    color:white;

    transition:0.5s;
}

/* LOGO IMAGE */

.site-logo{
    width:72px;
    height:72px;

    object-fit:contain;

    display:block;

    border-radius:50%;

    padding:8px;

    background:
    rgba(255,255,255,0.06);

    backdrop-filter:blur(18px);

    border:
    1px solid rgba(255,255,255,0.08);

    transition:
    0.7s cubic-bezier(.19,1,.22,1);

    box-shadow:
    0 10px 30px rgba(0,0,0,0.12);
}

/* HOVER */

.logo:hover .site-logo{
    transform:
    translateY(-4px)
    scale(1.04);

    background:
    rgba(255,255,255,0.12);

    box-shadow:
    0 20px 40px rgba(0,0,0,0.18);
}

/* LOGO TEXT */

.logo-text-wrap{
    display:flex;

    flex-direction:column;

    justify-content:center;

    margin-left:16px;
}

/* TITLE */

.logo-title{
    font-size:18px;

    font-weight:500;

    letter-spacing:0.12em;

    color:white;

    line-height:1;
}

/* SUBTITLE */

.logo-subtitle{
    margin-top:8px;

    font-size:10px;

    letter-spacing:0.28em;

    text-transform:uppercase;

    color:
    rgba(255,255,255,0.58);
}

/* NAVBAR */

.navbar{
    display:flex;

    align-items:center;

    gap:28px;

    position:relative;

    z-index:10;
}

/* NAV LINKS */

.navbar a{
    text-decoration:none;

    color:white;

    font-size:11px;

    letter-spacing:0.35em;

    text-transform:uppercase;

    position:relative;

    transition:0.5s;
}

/* UNDERLINE */

.nav-link::after{
    content:"";

    position:absolute;

    left:0;
    bottom:-8px;

    width:0%;

    height:1px;

    background:white;

    transition:
    0.6s cubic-bezier(.19,1,.22,1);
}

/* HOVER */

.nav-link:hover::after{
    width:100%;
}

/* CONTACT BUTTON */

.contact-btn{
    width:190px;
    height:58px;

    display:flex;

    justify-content:center;
    align-items:center;

    border:
    1px solid rgba(255,255,255,0.16);

    border-radius:100px;

    backdrop-filter:blur(18px);

    background:
    rgba(255,255,255,0.04);

    overflow:hidden;

    position:relative;
}

/* BUTTON SHINE */

.contact-btn::before{
    content:"";

    position:absolute;

    top:0;
    left:-120%;

    width:100%;
    height:100%;

    background:
    linear-gradient(
        120deg,
        transparent,
        rgba(255,255,255,0.22),
        transparent
    );

    transition:1s;
}

.contact-btn:hover::before{
    left:120%;
}

/* BUTTON HOVER */

.contact-btn:hover{
    transform:
    translateY(-4px);

    background:
    rgba(255,255,255,0.1);
}

/* MENU */

.menu-btn{
    width:58px;
    height:58px;

    border-radius:50%;

    display:none;

    justify-content:center;
    align-items:center;

    cursor:pointer;

    border:
    1px solid rgba(255,255,255,0.08);

    backdrop-filter:blur(14px);

    background:
    rgba(255,255,255,0.04);

    transition:0.5s;

    position:relative;

    z-index:10;
}

/* MENU HOVER */

.menu-btn:hover{
    transform:
    rotate(90deg);

    background:
    rgba(255,255,255,0.08);
}

/* ICON */

.menu-btn i{
    color:white;

    font-size:24px;
}

/* MOBILE NAV */

.mobile-nav{
    position:fixed;

    inset:0;

    background:
    rgba(8,8,8,0.94);

    backdrop-filter:blur(24px);

    z-index:99999999;

    display:flex;

    flex-direction:column;

    justify-content:center;
    align-items:center;

    gap:36px;

    transform:
    translateY(-100%);

    transition:
    1s cubic-bezier(.19,1,.22,1);
}

/* ACTIVE */

.mobile-nav.active{
    transform:
    translateY(0%);
}

/* MOBILE LINKS */

.mobile-nav a{
    text-decoration:none;

    color:white;

    font-size:46px;

    font-family:
    'Cormorant Garamond',
    serif;

    font-weight:300;

    transition:0.5s;
}

/* HOVER */

.mobile-nav a:hover{
    transform:
    translateY(-4px);

    opacity:0.6;
}

/* CLOSE */

.close-mobile{
    position:absolute;

    top:34px;
    right:34px;

    cursor:pointer;
}

/* CLOSE ICON */

.close-mobile i{
    font-size:58px;

    color:white;
}

/* MOBILE */

@media(max-width:900px){

.navbar{
    display:none;
}

.menu-btn{
    display:flex;
}

.main-header{
    padding:24px 6%;
}

.site-logo{
    width:58px;
    height:58px;
}

.logo-title{
    font-size:15px;
}

.logo-subtitle{
    font-size:8px;
}

}

/* SMALL */

@media(max-width:500px){

.mobile-nav a{
    font-size:36px;
}

.site-logo{
    width:52px;
    height:52px;
}

.contact-btn{
    width:170px;
    height:54px;
}

.logo-text-wrap{
    margin-left:12px;
}

.logo-title{
    font-size:13px;
}

.logo-subtitle{
    display:none;
}

}

</style>

</head>

<body>

<!-- HEADER -->

<header class="main-header">

<!-- LOGO -->

<?php

use App\Models\SettingModel;

$settingModel =
new SettingModel();

$settings =
$settingModel->first();

?>

<a href="/" class="logo">

<?php if(!empty($settings['site_logo'])): ?>

<img
src="<?= base_url('uploads/' . $settings['site_logo']) ?>"
alt="Logo"
class="site-logo"
>

<?php endif; ?>

<div class="logo-text-wrap">

<h2 class="logo-title">

FB Design Studio

</h2>

<span class="logo-subtitle">

Architecture & Interiors

</span>

</div>

</a>

<!-- NAVBAR -->

<nav class="navbar">

<a
href="/"
class="nav-link"
>

HOME

</a>

<a
href="/projects"
class="nav-link"
>

PROJECTS

</a>

<a
href="/admin"
class="nav-link"
>

ADMIN

</a>

<a
href="/contact"
class="contact-btn"
>

GET IN TOUCH

</a>

</nav>

<!-- MENU -->

<div
class="menu-btn"
onclick="toggleMenu()"
>

<i class="ri-menu-3-line"></i>

</div>

</header>

<!-- MOBILE NAV -->

<div
class="mobile-nav"
id="mobileNav"
>

<!-- CLOSE -->

<div
class="close-mobile"
onclick="toggleMenu()"
>

<i class="ri-close-line"></i>

</div>

<!-- LINKS -->

<a
href="/"
onclick="toggleMenu()"
>

Home

</a>

<a
href="/projects"
onclick="toggleMenu()"
>

Projects

</a>

<a
href="/contact"
onclick="toggleMenu()"
>

Contact

</a>

<a
href="/admin"
onclick="toggleMenu()"
>

Admin

</a>

</div>

<script>

/* MOBILE MENU */

function toggleMenu()
{
    document.getElementById(
    'mobileNav'
    ).classList.toggle(
    'active'
    );
}

/* HEADER SCROLL EFFECT */

window.addEventListener(
'scroll',
function()
{
    const header =
    document.querySelector(
    '.main-header'
    );

    if(window.scrollY > 40)
    {
        header.classList.add(
        'scrolled'
        );

        header.style.padding =
        '22px 5%';
    }
    else
    {
        header.classList.remove(
        'scrolled'
        );

        header.style.padding =
        '30px 5%';
    }
});

/* HERO PARALLAX */

window.addEventListener(
'mousemove',
(e)=>
{
    const x =
    (window.innerWidth / 2 - e.pageX)
    / 90;

    const y =
    (window.innerHeight / 2 - e.pageY)
    / 90;

    document.querySelector(
    '.main-header'
    ).style.transform =
    `translate(${x}px, ${y}px)`;
});

</script>

</body>

</html>