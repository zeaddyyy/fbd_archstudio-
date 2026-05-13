<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta
name="viewport"
content="width=device-width, initial-scale=1.0"
>

<title>
Edit Project
</title>

<link
rel="stylesheet"
href="https://cdn.jsdelivr.net/npm/remixicon/fonts/remixicon.css"
>

<link
href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600&family=Cormorant+Garamond:wght@300;400;500;600&display=swap"
rel="stylesheet"
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
    background:#f5f1ea;

    font-family:'Outfit',sans-serif;

    color:#111;

    min-height:100vh;

    overflow-x:hidden;

    padding:50px 0;
}

/* BG */

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
        rgba(201,169,110,0.14),
        transparent 35%
    );

    pointer-events:none;

    z-index:-1;
}

/* CONTAINER */

.form-container{
    width:92%;
    max-width:980px;

    margin:auto;

    background:
    rgba(255,255,255,0.62);

    border:
    1px solid rgba(255,255,255,0.5);

    backdrop-filter:
    blur(26px);

    border-radius:40px;

    padding:55px;

    box-shadow:
    0 25px 70px rgba(0,0,0,0.05);

    position:relative;

    overflow:hidden;
}

/* SHINE */

.form-container::before{
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

.form-header{
    margin-bottom:50px;
}

.top-nav{
    margin-bottom:34px;
}

/* BACK */

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

.back-btn i{
    font-size:18px;
}

.back-btn:hover{
    transform:
    translateY(-4px);

    background:#111;

    color:white;

    box-shadow:
    0 20px 40px rgba(0,0,0,0.12);
}

/* HEADER */

.form-header span{
    font-size:12px;

    letter-spacing:0.35em;

    color:#777;

    text-transform:uppercase;
}

.form-header h1{
    font-size:74px;

    line-height:0.9;

    font-weight:400;

    font-family:
    'Cormorant Garamond',
    serif;

    color:#111;

    margin-top:10px;
}

.form-header p{
    margin-top:20px;

    color:#666;

    line-height:1.9;

    max-width:620px;
}

/* GROUP */

.input-group{
    margin-bottom:34px;
}

.input-group label{
    display:block;

    margin-bottom:14px;

    font-size:12px;

    letter-spacing:0.24em;

    text-transform:uppercase;

    color:#666;
}

/* INPUT */

.input-wrap{
    position:relative;
}

.input-wrap i{
    position:absolute;

    top:50%;
    left:22px;

    transform:translateY(-50%);

    font-size:20px;

    color:#999;
}

input,
textarea{
    width:100%;

    border:none;

    outline:none;

    background:
    rgba(255,255,255,0.6);

    border:
    1px solid rgba(0,0,0,0.05);

    border-radius:24px;

    padding:22px 24px 22px 62px;

    font-size:15px;

    font-family:'Outfit',sans-serif;

    color:#111;

    transition:0.4s;
}

textarea{
    min-height:220px;

    resize:none;

    padding-top:28px;
}

input:focus,
textarea:focus{
    border-color:
    rgba(0,0,0,0.18);

    transform:
    translateY(-2px);

    box-shadow:
    0 12px 35px rgba(0,0,0,0.05);
}

/* GALLERY */

.gallery{
    display:grid;

    grid-template-columns:
    repeat(
        auto-fit,
        minmax(160px,1fr)
    );

    gap:18px;
}

/* ITEM */

.gallery-item{
    position:relative;

    overflow:hidden;

    border-radius:26px;

    background:white;

    aspect-ratio:1/1;

    cursor:pointer;

    transition:
    0.8s cubic-bezier(.19,1,.22,1);

    box-shadow:
    0 10px 30px rgba(0,0,0,0.05);
}

.gallery-item img{
    width:100%;
    height:100%;

    object-fit:cover;

    transition:
    1.2s cubic-bezier(.19,1,.22,1);
}

.gallery-item::after{
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

    transition:0.5s;
}

.gallery-item:hover{
    transform:
    translateY(-6px);
}

.gallery-item:hover img{
    transform:
    scale(1.08);
}

.gallery-item:hover::after{
    opacity:1;
}

/* REPLACE OVERLAY */

.replace-overlay{
    position:absolute;

    inset:0;

    display:flex;

    justify-content:center;
    align-items:center;

    background:
    rgba(0,0,0,0.45);

    opacity:0;

    transition:0.5s;

    z-index:10;
}

.gallery-item:hover .replace-overlay{
    opacity:1;
}

/* REPLACE BUTTON */

.replace-btn{
    display:flex;

    align-items:center;

    gap:10px;

    background:white;

    color:#111;

    padding:14px 24px;

    border-radius:100px;

    cursor:pointer;

    font-size:11px;

    letter-spacing:0.24em;

    text-transform:uppercase;

    transition:0.4s;

    font-weight:500;
}

.replace-btn i{
    font-size:18px;
}

.replace-btn:hover{
    transform:
    scale(1.05);

    background:#111;

    color:white;
}

/* FILE */

.file-upload{
    position:relative;

    border:
    2px dashed rgba(0,0,0,0.08);

    border-radius:30px;

    background:
    rgba(255,255,255,0.45);

    padding:55px 30px;

    text-align:center;

    overflow:hidden;

    transition:0.4s;
}

.file-upload:hover{
    border-color:#111;

    transform:
    translateY(-3px);
}

.file-upload i{
    font-size:60px;

    color:#111;

    margin-bottom:18px;

    display:block;
}

.file-upload h3{
    font-size:24px;

    font-weight:400;

    font-family:
    'Cormorant Garamond',
    serif;

    margin-bottom:10px;
}

.file-upload p{
    color:#777;

    font-size:14px;
}

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

    transition:
    0.7s cubic-bezier(.19,1,.22,1);

    position:relative;

    overflow:hidden;
}

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
        rgba(255,255,255,0.2),
        transparent
    );

    transition:0.8s;
}

.submit-btn:hover::before{
    left:120%;
}

.submit-btn:hover{
    transform:
    translateY(-5px);

    background:#1f1f1f;

    box-shadow:
    0 25px 60px rgba(0,0,0,0.15);
}

/* MOBILE */

@media(max-width:768px){

.form-container{
    padding:34px 24px;
}

.form-header h1{
    font-size:52px;
}

.gallery{
    grid-template-columns:
    repeat(
        2,
        1fr
    );
}

input,
textarea{
    padding-left:58px;
}

}

</style>

</head>

<body>

<div class="form-container">

<!-- HEADER -->

<div class="form-header">

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

Edit
Project

</h1>

<p>

Update project information, manage gallery visuals
and refine the architecture showcase experience.

</p>

</div>

<!-- FORM -->

<form
action="/admin/update/<?= isset($project['id']) ? esc((string)$project['id']) : '' ?>"
method="POST"
enctype="multipart/form-data"
>

<!-- TITLE -->

<div class="input-group">

<label>
Project Title
</label>

<div class="input-wrap">

<i class="ri-building-line"></i>

<input
type="text"
name="title"
value="<?= isset($project['title']) ? esc((string)$project['title']) : '' ?>"
required
>

</div>

</div>

<!-- DESCRIPTION -->

<div class="input-group">

<label>
Description
</label>

<div class="input-wrap">

<i class="ri-file-text-line"></i>

<textarea
name="description"
required
><?= isset($project['description']) ? esc((string)$project['description']) : '' ?></textarea>

</div>

</div>

<!-- LOCATION -->

<div class="input-group">

<label>
Location
</label>

<div class="input-wrap">

<i class="ri-map-pin-line"></i>

<input
type="text"
name="location"
value="<?= isset($project['location']) ? esc((string)$project['location']) : '' ?>"
required
>

</div>

</div>

<!-- GALLERY -->

<div class="input-group">

<label>
Current Gallery
</label>

<div class="gallery">

<?php

$gallery =
isset($project['gallery'])
? json_decode(
$project['gallery'],
true
)
: [];

if(is_array($gallery)):

foreach($gallery as $image):

?>

<div class="gallery-item">

<img
src="<?= base_url('uploads/projects/' . basename($image)) ?>"
alt=""
>

<!-- OVERLAY -->

<div class="replace-overlay">

<label
for="replace<?= md5($image) ?>"
class="replace-btn"
>

<i class="ri-image-edit-line"></i>

Replace

</label>

<input
type="file"
id="replace<?= md5($image) ?>"
name="replace_images[<?= $image ?>]"
accept="image/*"
hidden
>

</div>

</div>

<?php endforeach; endif; ?>

</div>

</div>

<!-- ADD MORE -->

<div class="input-group">

<label>
Add More Images
</label>

<div class="file-upload">

<i class="ri-image-add-line"></i>

<h3>
Upload More Images
</h3>

<p>
Drag & drop or click to upload new visuals
</p>

<input
type="file"
name="project_files[]"
multiple
accept="image/*"
>

</div>

</div>

<!-- BUTTON -->

<button
type="submit"
class="submit-btn"
>

Update Project

</button>

</form>

</div>

</body>

</html>