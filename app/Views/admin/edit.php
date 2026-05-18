<?php

// Ensure $project is defined, fallback to empty array if not passed
$project = $project ?? [];

$gallery =
isset($project['gallery'])
? json_decode(
$project['gallery'],
true
)
: [];

?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta
name="viewport"
content="width=device-width, initial-scale=1.0"
>

<title>
Luxury Project Editor
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

body{
    background:#f5f1ea;

    font-family:'Outfit',sans-serif;

    color:#111;

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
        rgba(201,169,110,0.14),
        transparent 35%
    );

    z-index:-1;
}

/* CONTAINER */

.editor-container{
    width:94%;

    max-width:1500px;

    margin:auto;

    background:
    rgba(255,255,255,0.62);

    border:
    1px solid rgba(255,255,255,0.5);

    backdrop-filter:blur(30px);

    border-radius:42px;

    padding:60px;

    box-shadow:
    0 30px 80px rgba(0,0,0,0.06);
}

/* TOP */

.top-bar{
    display:flex;

    justify-content:space-between;

    align-items:center;

    margin-bottom:50px;
}

/* BACK */

.back-btn{
    display:inline-flex;

    align-items:center;

    gap:12px;

    text-decoration:none;

    height:58px;

    padding:0 28px;

    border-radius:100px;

    background:
    rgba(255,255,255,0.72);

    color:#111;

    font-size:11px;

    letter-spacing:0.25em;

    text-transform:uppercase;

    border:
    1px solid rgba(0,0,0,0.05);

    transition:0.5s;
}

.back-btn:hover{
    transform:
    translateY(-4px);

    background:#111;

    color:white;
}

/* HEADER */

.page-heading span{
    display:block;

    margin-bottom:14px;

    font-size:11px;

    letter-spacing:0.35em;

    color:#777;

    text-transform:uppercase;
}

.page-heading h1{
    font-size:90px;

    line-height:0.9;

    font-weight:300;

    font-family:
    'Cormorant Garamond',
    serif;

    margin-bottom:20px;
}

.page-heading p{
    max-width:720px;

    line-height:2;

    color:#666;
}

/* FORM */

.editor-form{
    margin-top:70px;
}

/* GRID */

.form-grid{
    display:grid;

    grid-template-columns:
    1fr 1fr;

    gap:34px;

    margin-bottom:34px;
}

/* INPUT */

.input-group{
    margin-bottom:30px;
}

.input-group label{
    display:block;

    margin-bottom:14px;

    font-size:11px;

    letter-spacing:0.24em;

    text-transform:uppercase;

    color:#666;
}

.input-wrap{
    position:relative;
}

.input-wrap i{
    position:absolute;

    left:24px;
    top:24px;

    color:#999;

    font-size:20px;
}

input,
textarea{
    width:100%;

    border:none;

    outline:none;

    border-radius:26px;

    background:
    rgba(255,255,255,0.75);

    border:
    1px solid rgba(0,0,0,0.05);

    padding:24px 24px 24px 64px;

    font-size:15px;

    font-family:'Outfit',sans-serif;

    transition:0.4s;
}

textarea{
    min-height:220px;

    resize:none;
}

input:focus,
textarea:focus{
    transform:
    translateY(-2px);

    box-shadow:
    0 15px 40px rgba(0,0,0,0.05);
}

/* GALLERY */

.gallery{
    display:grid;

    grid-template-columns:
    repeat(
        auto-fit,
        minmax(400px,1fr)
    );

    gap:34px;

    margin-top:20px;
}

/* CARD */

.gallery-item{
    overflow:hidden;

    border-radius:36px;

    background:
    rgba(255,255,255,0.82);

    border:
    1px solid rgba(0,0,0,0.05);

    backdrop-filter:blur(20px);

    box-shadow:
    0 25px 60px rgba(0,0,0,0.05);

    transition:
    0.8s cubic-bezier(.19,1,.22,1);
}

.gallery-item:hover{
    transform:
    translateY(-10px);

    box-shadow:
    0 35px 90px rgba(0,0,0,0.12);
}

/* THUMB */

.gallery-thumb{
    position:relative;

    height:340px;

    overflow:hidden;
}

.gallery-thumb img,
.gallery-thumb video{
    width:100%;
    height:100%;

    object-fit:cover;

    transition:
    1.2s cubic-bezier(.19,1,.22,1);
}

.gallery-item:hover img,
.gallery-item:hover video{
    transform:scale(1.06);
}

/* OVERLAY */

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
}

.gallery-item:hover .replace-overlay{
    opacity:1;
}

/* BUTTON */

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
}

.replace-btn:hover{
    transform:scale(1.05);

    background:#111;

    color:white;
}

/* DETAILS */

.media-details{
    padding:28px;
}

.media-details input,
.media-details textarea{
    padding-left:24px;

    background:
    rgba(245,241,234,0.6);

    margin-bottom:16px;
}

.media-details textarea{
    min-height:140px;
}

/* UPLOAD */

.upload-box{
    position:relative;

    border:
    2px dashed rgba(0,0,0,0.08);

    border-radius:34px;

    padding:70px 30px;

    text-align:center;

    background:
    rgba(255,255,255,0.55);

    overflow:hidden;

    transition:0.4s;
}

.upload-box:hover{
    transform:
    translateY(-4px);

    border-color:#111;
}

.upload-box i{
    font-size:70px;

    margin-bottom:18px;

    display:block;
}

.upload-box h3{
    font-size:34px;

    font-weight:300;

    font-family:
    'Cormorant Garamond',
    serif;

    margin-bottom:12px;
}

.upload-box p{
    color:#777;
}

.upload-box input{
    position:absolute;

    inset:0;

    opacity:0;

    cursor:pointer;
}

/* NEW MEDIA */

#newMediaInputs{
    display:grid;

    grid-template-columns:
    repeat(
        auto-fit,
        minmax(340px,1fr)
    );

    gap:24px;

    margin-top:40px;
}

/* NEW CARD */

.new-media-card{
    background:white;

    border-radius:28px;

    padding:24px;

    box-shadow:
    0 10px 30px rgba(0,0,0,0.05);
}

.new-media-card h4{
    margin-bottom:18px;

    font-size:18px;
}

/* SUBMIT */

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

    margin-top:50px;

    transition:0.5s;
}

.submit-btn:hover{
    transform:
    translateY(-6px);

    box-shadow:
    0 30px 60px rgba(0,0,0,0.14);
}

/* MOBILE */

@media(max-width:1024px){

.form-grid{
    grid-template-columns:1fr;
}

.gallery{
    grid-template-columns:1fr;
}

.page-heading h1{
    font-size:62px;
}

}

@media(max-width:768px){

.editor-container{
    padding:34px 22px;
}

.page-heading h1{
    font-size:52px;
}

.gallery{
    grid-template-columns:1fr;
}

.gallery-thumb{
    height:260px;
}

}

</style>

</head>

<body>

<div class="editor-container">

<div class="top-bar">

<a
href="/admin"
class="back-btn"
>

<i class="ri-arrow-left-line"></i>

Dashboard

</a>

</div>

<div class="page-heading">

<span>
FB DESIGN STUDIO
</span>

<h1>
Edit Project
</h1>

<p>
Manage cinematic project visuals, luxury presentation media,
architectural storytelling and immersive gallery experiences.
</p>

</div>

<form
action="/admin/update/<?= esc((string)$project['id']) ?>"
method="POST"
enctype="multipart/form-data"
class="editor-form"
>

<div class="form-grid">

<div class="input-group">

<label>
Project Title
</label>

<div class="input-wrap">

<i class="ri-building-line"></i>

<input
type="text"
name="title"
value="<?= esc((string)$project['title']) ?>"
required
>

</div>

</div>

<div class="input-group">

<label>
Location
</label>

<div class="input-wrap">

<i class="ri-map-pin-line"></i>

<input
type="text"
name="location"
value="<?= esc((string)$project['location']) ?>"
required
>

</div>

</div>

</div>

<div class="input-group">

<label>
Description
</label>

<div class="input-wrap">

<i class="ri-file-text-line"></i>

<textarea
name="description"
required
><?= esc((string)$project['description']) ?></textarea>

</div>

</div>

<!-- GALLERY -->

<div class="gallery">

<?php if(is_array($gallery)): ?>
<?php foreach($gallery as $media): ?>

<?php

$filePath = '';

$mediaTitle = '';

$mediaDescription = '';

if(is_array($media))
{
    $filePath =
    $media['file'] ?? '';

    $mediaTitle =
    $media['title'] ?? '';

    $mediaDescription =
    $media['description'] ?? '';
}
else
{
    $filePath = $media;
}

$extension =
pathinfo(
$filePath,
PATHINFO_EXTENSION
);

$isVideo =
in_array(
strtolower($extension),
['mp4','webm','mov','ogg']
);

?>

<div class="gallery-item">

<div class="gallery-thumb">

<?php if($isVideo): ?>

<video
controls
muted
playsinline
>

<source
src="<?= base_url('uploads/' . $filePath) ?>"
type="video/mp4"
>

</video>

<?php else: ?>

<img
src="<?= base_url('uploads/' . $filePath) ?>"
alt=""
>

<?php endif; ?>

<div class="replace-overlay">

<label
for="replace<?= md5($filePath) ?>"
class="replace-btn"
>

<i class="ri-image-edit-line"></i>

Replace Media

</label>

<input
type="file"
id="replace<?= md5($filePath) ?>"
name="replace_images[<?= $filePath ?>]"
accept="image/*,video/*"
hidden
>

</div>

</div>

<div class="media-details">

<input
type="text"
name="existing_media_titles[]"
value="<?= esc($mediaTitle) ?>"
placeholder="Media Title"
>

<textarea
name="existing_media_descriptions[]"
placeholder="Media Description"
><?= esc($mediaDescription) ?></textarea>

<input
type="hidden"
name="existing_media_files[]"
value="<?= esc($filePath) ?>"
>

<input
type="hidden"
name="existing_media_types[]"
value="<?= $isVideo ? 'video' : 'image' ?>"
>

</div>

</div>

<?php endforeach; ?>
<?php endif; ?>

</div>

<!-- UPLOAD -->

<div
class="upload-box"
style="margin-top:50px;"
>

<i class="ri-gallery-upload-line"></i>

<h3>
Upload Cinematic Media
</h3>

<p>
Add more architecture visuals, walkthroughs and immersive media.
</p>

<input
type="file"
name="project_files[]"
id="projectFiles"
multiple
accept="image/*,video/*"
>

</div>

<!-- NEW MEDIA DETAILS -->

<div id="newMediaInputs"></div>

<!-- SUBMIT -->

<button
type="submit"
class="submit-btn"
>

Update Project

</button>

</form>

</div>

<script>

const projectFiles =
document.getElementById(
'projectFiles'
);

const newMediaInputs =
document.getElementById(
'newMediaInputs'
);

projectFiles.addEventListener(
'change',
function(e)
{

newMediaInputs.innerHTML = '';

Array
.from(e.target.files)
.forEach((file,index)=>
{

const wrapper =
document.createElement('div');

wrapper.classList.add(
'new-media-card'
);

wrapper.innerHTML =
`
<h4>
${file.name}
</h4>

<input
type="text"
name="media_titles[]"
placeholder="Media Title"

style="
margin-bottom:14px;
padding-left:24px;
"
>

<textarea
name="media_descriptions[]"
placeholder="Media Description"

style="
min-height:140px;
padding-left:24px;
"
></textarea>
`;

newMediaInputs.appendChild(
wrapper
);

});

});

</script>

</body>

</html>