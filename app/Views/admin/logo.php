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

html{
    scroll-behavior:smooth;
}

body{
    background:#f5f1ea;

    color:#111;

    font-family:'Outfit',sans-serif;

    min-height:100vh;

    overflow-x:hidden;

    padding:60px 0;

    position:relative;
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

    z-index:-2;

    pointer-events:none;
}

/* GRAIN */

.grain{
    position:fixed;

    inset:0;

    opacity:0.025;

    pointer-events:none;

    z-index:99999;

    background:
    repeating-radial-gradient(
        circle at 0 0,
        transparent 0,
        rgba(0,0,0,0.03) 1px,
        transparent 2px
    );
}

/* BLUR */

.blur{
    position:fixed;

    width:420px;
    height:420px;

    border-radius:50%;

    background:#c9a96e;

    filter:blur(140px);

    opacity:0.14;

    top:-120px;
    right:-120px;

    z-index:-1;
}

/* CONTAINER */

.container{
    width:92%;

    max-width:980px;

    margin:auto;
}

/* CARD */

.card{
    position:relative;

    background:
    rgba(255,255,255,0.65);

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

    height:56px;

    padding:0 26px;

    border-radius:100px;

    color:#111;

    font-size:11px;

    letter-spacing:0.24em;

    text-transform:uppercase;

    transition:
    0.6s cubic-bezier(.19,1,.22,1);

    backdrop-filter:blur(20px);

    position:relative;

    overflow:hidden;
}

.back-btn::before{
    content:'';

    position:absolute;

    top:0;
    left:-120%;

    width:100%;
    height:100%;

    background:
    linear-gradient(
        90deg,
        transparent,
        rgba(255,255,255,0.3),
        transparent
    );

    transition:0.8s;
}

.back-btn:hover::before{
    left:120%;
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

.header{
    margin-bottom:60px;
}

.header span{
    font-size:12px;

    letter-spacing:0.35em;

    text-transform:uppercase;

    color:#777;
}

.header h1{
    font-size:82px;

    line-height:0.9;

    font-family:
    'Cormorant Garamond',
    serif;

    font-weight:400;

    margin-top:12px;

    color:#111;
}

.header p{
    margin-top:24px;

    color:#666;

    line-height:1.9;

    max-width:640px;
}

/* SIMPLE LOGO */

.simple-logo-section{
    margin-bottom:50px;

    display:flex;

    flex-direction:column;

    align-items:center;
}

/* BOX */

.simple-logo-box{
    width:240px;
    height:240px;

    border-radius:32px;

    background:
    rgba(255,255,255,0.72);

    border:
    1px solid rgba(0,0,0,0.06);

    display:flex;

    justify-content:center;
    align-items:center;

    overflow:hidden;

    box-shadow:
    0 20px 50px rgba(0,0,0,0.05);

    margin-bottom:18px;

    transition:0.4s;

    padding:20px;

    text-align:center;
}

.simple-logo-box:hover{
    transform:
    translateY(-4px);
}

/* IMAGE */

.simple-logo-box img{
    width:72%;
    height:72%;

    object-fit:contain;
}

/* EMPTY */

.simple-empty{
    display:flex;

    flex-direction:column;

    align-items:center;

    gap:12px;

    color:#888;

    word-break:break-word;
}

.simple-empty i{
    font-size:54px;
}

/* TEXT */

.logo-text{
    font-size:12px;

    color:#777;

    letter-spacing:0.08em;
}

/* FILE UPLOAD */

.file-upload{
    position:relative;

    border:
    2px dashed rgba(0,0,0,0.08);

    border-radius:36px;

    background:
    rgba(255,255,255,0.48);

    padding:70px 30px;

    text-align:center;

    overflow:hidden;

    transition:0.4s;

    margin-bottom:38px;
}

.file-upload:hover{
    border-color:#111;

    transform:
    translateY(-4px);
}

.file-upload::before{
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
}

/* ICON */

.file-upload i{
    font-size:72px;

    color:#111;

    margin-bottom:20px;

    display:block;
}

/* TITLE */

.file-upload h3{
    font-size:38px;

    font-family:
    'Cormorant Garamond',
    serif;

    font-weight:400;

    margin-bottom:12px;
}

/* TEXT */

.file-upload p{
    color:#777;

    line-height:1.8;

    max-width:520px;

    margin:auto;
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

    height:78px;

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
    font-size:58px;
}

.simple-logo-box{
    width:200px;
    height:200px;
}

.file-upload{
    padding:50px 20px;
}

}

</style>

</head>

<body>

<div class="grain"></div>

<div class="blur"></div>

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

Manage your website identity,
update branding visuals and
maintain the premium studio experience.

</p>

</div>

<!-- LOGO -->

<div class="simple-logo-section">

<div class="simple-logo-box">

<?php if (!empty($setting['site_logo'])): ?>

<?php

$filePath =
'uploads/' .
$setting['site_logo'];

$fileExtension =
pathinfo(
$setting['site_logo'],
PATHINFO_EXTENSION
);

$imageExtensions = [

'jpg',
'jpeg',
'png',
'gif',
'webp',
'svg'

];

?>

<?php if(in_array(strtolower($fileExtension), $imageExtensions)): ?>

<img
id="previewImage"
src="<?= base_url($filePath) ?>"
alt="Logo"
>

<?php else: ?>

<div class="simple-empty">

<i class="ri-file-line"></i>

<span>

<?=  esc((string)$setting['site_logo']) ?>

</span>

</div>

<?php endif; ?>

<?php else: ?>

<div class="simple-empty">

<i class="ri-image-line"></i>

<span>

No File Uploaded

</span>

</div>

<?php endif; ?>

</div>

<p class="logo-text">

Upload logo, SVG, AI, PSD, PDF or any file type

</p>

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

Upload Studio File

</h3>

<p>

Drag & drop your logo,
branding asset or any studio file here

</p>

<input
type="file"
name="site_logo"
required
id="logoInput"
>

</div>

<!-- BUTTON -->

<button
type="submit"
class="submit-btn"
>

Upload File

</button>

</form>

</div>

</div>

<script>

/* LIVE FILE PREVIEW */

const logoInput =
document.getElementById(
'logoInput'
);

logoInput.addEventListener(
'change',
function(e){

const file =
e.target.files[0];

if(file){

const previewBox =
document.querySelector(
'.simple-logo-box'
);

if(
file.type.startsWith(
'image/'
)
){

const reader =
new FileReader();

reader.onload =
function(event){

previewBox.innerHTML =
`
<img
src="${event.target.result}"
style="
width:72%;
height:72%;
object-fit:contain;
"
>
`;

};

reader.readAsDataURL(file);

}
else{

previewBox.innerHTML =
`
<div class="simple-empty">

<i class="ri-file-line"></i>

<span>

${file.name}

</span>

</div>
`;

}

}

}
);

</script>

</body>

</html>