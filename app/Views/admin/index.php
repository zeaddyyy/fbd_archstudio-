<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta
name="viewport"
content="width=device-width, initial-scale=1.0"
>

<title>
FB Design Studio Admin
</title>

<link
rel="stylesheet"
href="https://cdn.jsdelivr.net/npm/remixicon/fonts/remixicon.css"
>

<link
href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600&display=swap"
rel="stylesheet"
>

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
}

body{
    background:#f4f1ec;

    color:#111;

    font-family:'Outfit',sans-serif;

    overflow-x:hidden;
}

.container{
    width:92%;

    max-width:1500px;

    margin:auto;

    padding:50px 0;
}

/* TOP BAR */

.top-bar{
    display:flex;

    justify-content:space-between;

    align-items:center;

    margin-bottom:60px;
}

.top-bar h1{
    font-size:56px;

    font-weight:300;

    color:#1a1a1a;
     font-family:
    'Cormorant Garamond',
    serif;

    letter-spacing:0.03em;
}

.add-btn{
    background:#111;

    color:white;

    padding:18px 34px;

    text-decoration:none;

    border-radius:100px;

    font-weight:500;

    letter-spacing:0.18em;

    transition:0.4s;

    border:none;

    font-size:11px;

    text-transform:uppercase;

    display:flex;
    justify-content:center;
    align-items:center;
}

.add-btn:hover{
    transform:translateY(-4px);

    background:#2a2a2a;
}

/* GRID */

.projects-grid{
    display:grid;

    grid-template-columns:
    repeat(
        auto-fit,
        minmax(360px,1fr)
    );

    gap:34px;
}

/* CARD */

.project-card{
    background:
    rgba(255,255,255,0.72);

    border:
    1px solid rgba(0,0,0,0.05);

    border-radius:30px;

    overflow:hidden;

    transition:0.5s;

    backdrop-filter:blur(18px);
}

.project-card:hover{
    transform:
    translateY(-8px);

    box-shadow:
    0 20px 50px rgba(0,0,0,0.08);
}

/* MAIN IMAGE */

.project-main-image{
    width:100%;

    height:320px;

    overflow:hidden;
}

.project-main-image img{
    width:100%;

    height:100%;

    object-fit:cover;

    display:block;

    transition:1s cubic-bezier(.19,1,.22,1);
}

.project-card:hover
.project-main-image img{
    transform:scale(1.04);
}

/* CONTENT */

.project-content{
    padding:28px;
}

.project-content h2{
    font-size:38px;

    margin-bottom:14px;

    color:#1a1a1a;

    font-weight:300;

     font-family:
    'Cormorant Garamond',
    serif;
}


.location{
    color:#777;

    margin-bottom:16px;

    font-size:13px;

    letter-spacing:0.18em;

    text-transform:uppercase;
}

.description{
    color:#555;

    line-height:2;

    font-size:15px;
}

/* GALLERY */

.gallery-preview{
    margin-top:24px;

    display:flex;

    gap:10px;

    overflow-x:auto;

    padding-bottom:5px;
}
.gallery-preview::-webkit-scrollbar{
    height:4px;
}

.gallery-preview::-webkit-scrollbar-thumb{
    background:#bbb;

    border-radius:20px;
}

.gallery-preview img{
    width:90px;

    height:90px;

    object-fit:cover;

    border-radius:16px;

    flex-shrink:0;

    border:
    1px solid rgba(0,0,0,0.04);
}

/* ACTIONS */

.project-actions{
    margin-top:24px;

    display:flex;

    gap:14px;
}

.action-btn{
    flex:1;

    padding:14px;

    border-radius:18px;

    text-align:center;

    text-decoration:none;

    transition:0.4s;

    font-size:12px;

    letter-spacing:0.14em;

    text-transform:uppercase;
}

.delete-btn{
    background:
    rgba(255,0,0,0.05);

    color:#d94b4b;

    border:
    1px solid rgba(255,0,0,0.08);
}

.delete-btn:hover{
    background:
    rgba(255,0,0,0.1);
}


/* EMPTY */

.empty-state{
    text-align:center;

    padding:120px 20px;

    color:#666;
}

.empty-state i{
    font-size:70px;

    margin-bottom:20px;

    color:#111;
}

.empty-state h2{
    font-size:42px;

    font-weight:300;

    margin-bottom:12px;

    color:#1a1a1a;

    font-family:
    'Cormorant Garamond',
    serif;
}


/* MOBILE */

@media(max-width:768px){

.top-bar{
    flex-direction:column;

    align-items:flex-start;

    gap:24px;
}

.top-bar h1{
    font-size:42px;
}

.projects-grid{
    grid-template-columns:1fr;
}

.project-content h2{
    font-size:30px;
}

}@media(max-width:768px){

.top-bar{
    flex-direction:column;

    align-items:flex-start;

    gap:24px;
}

.top-bar h1{
    font-size:42px;
}

.projects-grid{
    grid-template-columns:1fr;
}

.project-content h2{
    font-size:30px;
}

}

</style>

</head>

<body>

<div class="container">

<!-- TOP BAR -->

<div class="top-bar">

<h1>
FB Design Studio
</h1>

<a
href="/admin/create"
class="add-btn"
>
Add Project
</a>
<button
class="add-btn"
onclick="openLogoPopup()"
style="
border:none;
cursor:pointer;
"
>
Change Logo
</button>

</div>


<!-- PROJECTS -->

<?php if(!empty($projects)): ?>

<div class="projects-grid">

<?php foreach($projects as $project): ?>

<div class="project-card">

<!-- MAIN IMAGE -->

<?php if(!empty($project['image'])): ?>

<div class="project-main-image">

<img
src="<?= base_url('uploads/projects/' . basename($project['image'])) ?>"
alt=""
>

</div>

<?php endif; ?>

<!-- CONTENT -->

<div class="project-content">

<h2>
<?= esc((string)$project['title']) ?>
</h2>

<div class="location">

<i class="ri-map-pin-line"></i>

<?= esc((string)$project['location']) ?>

</div>

<p class="description">

<?= esc((string)$project['description']) ?>

</p>

<!-- GALLERY -->

<?php if(!empty($project['gallery'])): ?>

<div class="gallery-preview">

<?php

$gallery =
json_decode(
    $project['gallery'],
    true
);

if(is_array($gallery)):

foreach($gallery as $image):

?>

<img
src="<?= base_url('uploads/projects/' . basename($image)) ?>"
alt=""
>

<?php endforeach; endif; ?>

</div>

<?php endif; ?>

<!-- ACTIONS -->

<div class="project-actions">

<a
href="/admin/delete/<?= $project['id'] ?>"
class="action-btn delete-btn"
onclick="return confirm('Delete this project?')"
>

Delete

</a>
<a
href="/admin/edit/<?= $project['id'] ?>"
class="action-btn"
style="
background:rgba(0,0,0,0.04);
color:#111;
border:1px solid rgba(0,0,0,0.05);
"
>
Edit
</a>

</div>


</div>

</div>

<?php endforeach; ?>

</div>

<?php else: ?>

<!-- EMPTY STATE -->

<div class="empty-state">

<i class="ri-gallery-line"></i>

<h2>
No Projects Found
</h2>

<p>
Upload your first architecture project.
</p>

</div>

<?php endif; ?>

</div>

</body>
<!-- LOGO POPUP -->

<?php

use App\Models\SettingModel;

$settingModel = new SettingModel();
$setting = $settingModel->first();

?>

<div
class="logo-popup"
id="logoPopup"
>

<div class="logo-popup-box">

<!-- CLOSE -->

<button
class="close-popup"
onclick="closeLogoPopup()"
>
<i class="ri-close-line"></i>
</button>

<!-- TITLE -->

<h2>
Website Logo
</h2>

<!-- LOGO -->

<?php if(!empty($setting['site_logo'])): ?>

<div class="popup-logo-preview">

<img
src="<?= base_url('uploads/' . $setting['site_logo']) ?>"
alt=""
>

</div>

<?php endif; ?>

<!-- FORM -->

<form
action="<?= base_url('admin/logo/update') ?>"
method="POST"
enctype="multipart/form-data"
>

<input
type="file"
name="site_logo"
required
>

<button
type="submit"
class="popup-save-btn"
>
Update Logo
</button>

</form>



</div>

</div>

<style>

/* POPUP */

.logo-popup{
    position:fixed;

    inset:0;

    background:
    rgba(0,0,0,0.62);

    backdrop-filter:blur(14px);

    display:none;

    justify-content:center;
    align-items:center;

    z-index:999999;
}

/* BOX */

.logo-popup-box{
    width:420px;

    padding:40px;

    border-radius:34px;

    background:
    rgba(20,18,15,0.72);

    border:
    1px solid rgba(255,255,255,0.06);

    backdrop-filter:blur(24px);

    position:relative;

    animation:popupShow 0.4s ease;
}

/* ANIMATION */

@keyframes popupShow{

from{
    opacity:0;

    transform:
    translateY(40px)
    scale(0.95);
}

to{
    opacity:1;

    transform:
    translateY(0)
    scale(1);
}

}

/* CLOSE */

.close-popup{
    position:absolute;

    top:20px;
    right:20px;

    background:none;
    border:none;

    color:white;

    cursor:pointer;
}

.close-popup i{
    font-size:32px;
}

/* TITLE */

.logo-popup-box h2{
    font-size:38px;

    font-weight:300;

    color:#f3e7d6;

    margin-bottom:30px;
}

/* LOGO PREVIEW */

.popup-logo-preview{
    width:130px;
    height:130px;

    border-radius:24px;

    overflow:hidden;

    margin-bottom:28px;

    background:
    rgba(255,255,255,0.04);

    display:flex;
    justify-content:center;
    align-items:center;
}

.popup-logo-preview img{
    width:100%;
    height:100%;

    object-fit:contain;
}

/* INPUT */

.logo-popup-box input{
    width:100%;

    margin-bottom:20px;

    padding:14px;

    border-radius:14px;

    border:none;

    background:
    rgba(255,255,255,0.06);

    color:white;
}

/* BUTTONS */

.popup-save-btn,
.popup-back-btn{
    width:100%;

    padding:16px;

    border:none;

    border-radius:100px;

    cursor:pointer;

    font-weight:600;

    transition:0.4s;
}

/* SAVE */

.popup-save-btn{
    background:
    linear-gradient(
        135deg,
        #d9b078,
        #9f7c45
    );

    color:#111;

    margin-bottom:14px;
}

/* BACK */


.popup-save-btn:hover,
.popup-back-btn:hover{
    transform:translateY(-3px);
}

</style>

<script>

function openLogoPopup()
{
    document.getElementById(
    'logoPopup'
    ).style.display = 'flex';
}

function closeLogoPopup()
{
    document.getElementById(
    'logoPopup'
    ).style.display = 'none';
}

</script>
</html>