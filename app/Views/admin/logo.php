<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta
name="viewport"
content="width=device-width, initial-scale=1.0"
>

<title>
Studio Settings
</title>

<link
href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600&family=Cormorant+Garamond:wght@300;400;500;600&display=swap"
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

body{
    background:#f5f1ea;

    color:#111;

    font-family:'Outfit',sans-serif;

    min-height:100vh;

    overflow-x:hidden;

    padding:60px 0;
}

/* BACKGROUND */

body::before{
    content:"";

    position:fixed;
    inset:0;

    background:
    radial-gradient(
        circle at top left,
        rgba(0,0,0,0.04),
        transparent 35%
    ),
    radial-gradient(
        circle at bottom right,
        rgba(201,169,110,0.12),
        transparent 35%
    );

    z-index:-1;

    pointer-events:none;
}

/* CONTAINER */

.container{
    width:92%;
    max-width:850px;

    margin:auto;
}

/* CARD */

.card{
    position:relative;

    background:
    rgba(255,255,255,0.62);

    backdrop-filter:
    blur(26px);

    border:
    1px solid rgba(255,255,255,0.5);

    border-radius:42px;

    padding:60px;

    overflow:hidden;

    box-shadow:
    0 25px 70px rgba(0,0,0,0.05);
}

/* SHINE */

.card::before{
    content:"";

    position:absolute;
    inset:0;

    background:
    linear-gradient(
        135deg,
        rgba(255,255,255,0.35),
        transparent
    );

    pointer-events:none;
}

/* HEADER */

.header{
    margin-bottom:50px;
}

.header span{
    font-size:12px;

    letter-spacing:0.35em;

    text-transform:uppercase;

    color:#777;
}

.header h1{
    font-size:74px;

    line-height:0.9;

    font-family:
    'Cormorant Garamond',
    serif;

    font-weight:400;

    margin-top:10px;

    color:#111;
}

.header p{
    margin-top:22px;

    color:#666;

    line-height:1.9;

    max-width:620px;
}

/* LOGO PREVIEW */

.logo-preview{
    margin-bottom:40px;

    display:flex;

    justify-content:center;
    align-items:center;
}

/* LOGO BOX */

.logo-box{
    width:260px;
    height:260px;

    border-radius:36px;

    background:
    rgba(255,255,255,0.65);

    border:
    1px solid rgba(0,0,0,0.05);

    display:flex;

    justify-content:center;
    align-items:center;

    overflow:hidden;

    position:relative;

    transition:
    0.7s cubic-bezier(.19,1,.22,1);

    box-shadow:
    0 18px 50px rgba(0,0,0,0.06);
}

/* HOVER */

.logo-box:hover{
    transform:
    translateY(-6px);

    box-shadow:
    0 28px 70px rgba(0,0,0,0.08);
}

/* IMAGE */

.logo-box img{
    max-width:80%;
    max-height:80%;

    object-fit:contain;

    transition:
    1s cubic-bezier(.19,1,.22,1);
}

.logo-box:hover img{
    transform:
    scale(1.08);
}

/* EMPTY */

.empty-logo{
    display:flex;

    flex-direction:column;

    justify-content:center;
    align-items:center;

    text-align:center;

    color:#888;
}

.empty-logo i{
    font-size:70px;

    margin-bottom:14px;
}

/* FILE UPLOAD */

.file-upload{
    position:relative;

    border:
    2px dashed rgba(0,0,0,0.08);

    border-radius:34px;

    background:
    rgba(255,255,255,0.48);

    padding:60px 30px;

    text-align:center;

    overflow:hidden;

    transition:0.4s;

    margin-bottom:35px;
}

/* HOVER */

.file-upload:hover{
    border-color:#111;

    transform:
    translateY(-4px);
}

/* ICON */

.file-upload i{
    font-size:68px;

    color:#111;

    margin-bottom:18px;

    display:block;
}

/* TITLE */

.file-upload h3{
    font-size:32px;

    font-family:
    'Cormorant Garamond',
    serif;

    font-weight:400;

    margin-bottom:10px;
}

/* TEXT */

.file-upload p{
    color:#777;

    line-height:1.8;
}

/* FILE */

.file-upload input{
    position:absolute;

    inset:0;

    opacity:0;

    cursor:pointer;
}

/* BUTTON */

.submit-btn{
    width:100%;

    height:74px;

    border:none;

    border-radius:100px;

    background:#111;

    color:white;

    font-size:12px;

    letter-spacing:0.35em;

    text-transform:uppercase;

    cursor:pointer;

    position:relative;

    overflow:hidden;

    transition:
    0.7s cubic-bezier(.19,1,.22,1);
}

/* SHINE */

.submit-btn::before{
    content:"";

    position:absolute;

    top:0;
    left:-120%;

    width:100%;
    height:100%;

    background:
    linear-gradient(
        90deg,
        transparent,
        rgba(255,255,255,0.22),
        transparent
    );

    transition:0.8s;
}

.submit-btn:hover::before{
    left:120%;
}

/* HOVER */

.submit-btn:hover{
    transform:
    translateY(-5px);

    background:#1d1d1d;

    box-shadow:
    0 25px 60px rgba(0,0,0,0.15);
}

/* MOBILE */

@media(max-width:768px){

.card{
    padding:38px 24px;
}

.header h1{
    font-size:54px;
}

.logo-box{
    width:220px;
    height:220px;
}

.file-upload{
    padding:42px 20px;
}

}
/* TOP NAV */

.top-nav{
    margin-bottom:34px;
}

/* BACK BUTTON */

.back-btn{
    display:inline-flex;

    align-items:center;

    gap:10px;

    text-decoration:none;

    background:
    rgba(255,255,255,0.65);

    border:
    1px solid rgba(0,0,0,0.05);

    height:52px;

    padding:0 24px;

    border-radius:100px;

    color:#111;

    font-size:11px;

    letter-spacing:0.24em;

    text-transform:uppercase;

    transition:
    0.6s cubic-bezier(.19,1,.22,1);

    backdrop-filter:blur(20px);
}

/* ICON */

.back-btn i{
    font-size:18px;
}

/* HOVER */

.back-btn:hover{
    transform:
    translateY(-4px);

    background:#111;

    color:white;

    box-shadow:
    0 20px 40px rgba(0,0,0,0.12);
}
</style>

</head>

<body>

<div class="container">

<div class="card">

<!-- HEADER -->
<div class="header">

<div class="top-nav">

<a
href="/admin"
class="back-btn"
>

<i class="ri-arrow-left-line"></i>

Back to Dashboard

</a>

</div>

<span>
FB DESIGN STUDIO
</span>

<h1>

Studio
Settings

</h1>

<p>

Manage your website identity, update branding visuals
and maintain the premium studio experience.

</p>

</div>

<!-- LOGO -->

<div class="logo-preview">

<div class="logo-box">

<?php if (!empty($setting['site_logo'])): ?>

<img
src="<?= base_url('uploads/' . $setting['site_logo']) ?>"
alt="Logo"
>

<?php else: ?>

<div class="empty-logo">

<i class="ri-image-line"></i>

<p>
No Logo Uploaded
</p>

</div>

<?php endif; ?>

</div>

</div>

<!-- FORM -->

<form
action="<?= base_url('admin/logo/update') ?>"
method="POST"
enctype="multipart/form-data"
>

<!-- FILE -->

<div class="file-upload">

<i class="ri-upload-cloud-2-line"></i>

<h3>
Upload Studio Logo
</h3>

<p>

Drag & drop your logo or click here
to upload a new brand identity

</p>

<input
type="file"
name="site_logo"
accept="image/*"
required
>

</div>

<!-- BUTTON -->

<button
type="submit"
class="submit-btn"
>

Update Logo

</button>

</form>

</div>

</div>

</body>

</html>