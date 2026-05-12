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
    background:#f4f1ec;
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

    padding:28px 5%;

    display:flex;

    justify-content:space-between;

    align-items:center;

    transition:0.5s;

    backdrop-filter:blur(18px);

    background:
    rgba(244,241,236,0.55);

    border-bottom:
    1px solid rgba(0,0,0,0.05);
}

/* LOGO */

.logo{
    text-decoration:none;

    color:#111;

    font-size:13px;

    letter-spacing:0.45em;

    font-weight:400;

    transition:0.4s;
}

.logo:hover{
    opacity:0.6;
}

/* NAVBAR */

.navbar{
    display:flex;

    align-items:center;

    gap:16px;
}

/* LINKS */

.navbar a{
    text-decoration:none;

    color:#111;

    font-size:11px;

    letter-spacing:0.32em;

    text-transform:uppercase;

    transition:0.4s;
}

/* SIMPLE LINKS */

.nav-link{
    position:relative;

    padding-bottom:6px;
}

.nav-link::after{
    content:"";

    position:absolute;

    left:0;
    bottom:0;

    width:0%;
    height:1px;

    background:#111;

    transition:0.5s;
}

.nav-link:hover::after{
    width:100%;
}

/* BUTTON */

.contact-btn{
    width:170px;
    height:54px;

    display:flex;
    justify-content:center;
    align-items:center;

    background:#111;

    color:white !important;

    letter-spacing:0.28em;

    transition:0.5s;
}

.contact-btn:hover{
    background:#2a2a2a;

    transform:
    translateY(-3px);
}

/* MENU */

.menu-btn{
    width:56px;
    height:56px;

    display:none;

    justify-content:center;
    align-items:center;

    border-radius:50%;

    cursor:pointer;

    border:
    1px solid rgba(0,0,0,0.08);

    transition:0.4s;
}

.menu-btn:hover{
    transform:rotate(90deg);
}

.menu-btn i{
    font-size:24px;

    color:#111;
}

/* MOBILE NAV */

.mobile-nav{
    position:fixed;

    inset:0;

    background:
    rgba(245,242,236,0.98);

    z-index:9999999;

    display:flex;

    flex-direction:column;

    justify-content:center;
    align-items:center;

    gap:34px;

    transform:
    translateY(-100%);

    transition:
    0.8s cubic-bezier(.19,1,.22,1);
}

/* ACTIVE */

.mobile-nav.active{
    transform:
    translateY(0%);
}

/* MOBILE LINKS */

.mobile-nav a{
    text-decoration:none;

    color:#111;

    font-size:42px;

    font-family:
    'Cormorant Garamond',
    serif;

    font-weight:400;

    transition:0.4s;
}

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

.close-mobile i{
    font-size:52px;

    color:#111;
}

/* GLASS EFFECT */

.main-header::before{
    content:"";

    position:absolute;

    inset:0;

    background:
    linear-gradient(
        to right,
        rgba(255,255,255,0.2),
        rgba(255,255,255,0.04)
    );

    pointer-events:none;
}

/* MOBILE */

@media(max-width:900px){

.navbar{
    display:none;
}

.menu-btn{
    display:flex;
}

.logo{
    font-size:11px;
    letter-spacing:0.32em;
}

.main-header{
    padding:22px 6%;
}

}

/* SMALL MOBILE */

@media(max-width:500px){

.mobile-nav a{
    font-size:34px;
}

.logo{
    font-size:10px;
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

$settingModel = new SettingModel();
$settings = $settingModel->first();

?>

<a href="/" class="logo">

<?php if(!empty($settings['site_logo'])): ?>

<img
src="<?= base_url('uploads/' . $settings['site_logo']) ?>"
alt="Logo"
style="
height:55px;
width:auto;
object-fit:contain;
display:block;
"
>

<?php else: ?>

FB DESIGN STUDIO

<?php endif; ?>

</a>


<!-- NAVIGATION -->

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
        header.style.padding =
        '20px 5%';

        header.style.background =
        'rgba(244,241,236,0.82)';
    }
    else
    {
        header.style.padding =
        '28px 5%';

        header.style.background =
        'rgba(244,241,236,0.55)';
    }
});

</script>

</body>
</html>