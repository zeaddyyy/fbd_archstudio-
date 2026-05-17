<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta
name="viewport"
content="width=device-width, initial-scale=1.0"
>

<title>Add Project</title>

<link
rel="stylesheet"
href="https://cdn.jsdelivr.net/npm/remixicon/fonts/remixicon.css"
>

<link
href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@300;400;500;600&family=Outfit:wght@300;400;500;600&display=swap"
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

    font-family:'Outfit',sans-serif;

    color:#111;

    min-height:100vh;

    display:flex;
    justify-content:center;
    align-items:center;

    padding:60px 20px;

    overflow-x:hidden;

    position:relative;
}

/* DARK OVERLAY */

body::after{
    content:"";

    position:fixed;

    inset:0;

    background:
    rgba(0,0,0,0.28);

    backdrop-filter:blur(14px);

    z-index:-1;
}

/* CONTAINER */

.form-container{
    width:100%;
    max-width:1100px;

    background:
    rgba(255,255,255,0.58);

    border:
    1px solid rgba(255,255,255,0.35);

    backdrop-filter:blur(30px);

    border-radius:36px;

    padding:60px;

    box-shadow:
    0 20px 80px rgba(0,0,0,0.12);

    position:relative;
}

/* HEADER */

.form-header{
    margin-bottom:50px;
}

.form-header h1{
    font-size:64px;

    font-weight:300;

    margin-bottom:16px;

    color:#1a1a1a;

    font-family:
    'Cormorant Garamond',
    serif;

    line-height:0.95;
}

.form-header p{
    color:#666;

    line-height:2;

    font-size:15px;

    letter-spacing:0.08em;
}

/* CLOSE */

.close-popup{
    position:absolute;

    top:24px;
    right:24px;

    width:54px;
    height:54px;

    border-radius:50%;

    background:
    rgba(255,255,255,0.6);

    backdrop-filter:blur(10px);

    display:flex;
    justify-content:center;
    align-items:center;

    text-decoration:none;

    color:#111;

    transition:0.4s;

    border:
    1px solid rgba(0,0,0,0.05);

    box-shadow:
    0 10px 30px rgba(0,0,0,0.08);
}

.close-popup:hover{
    transform:
    rotate(90deg)
    scale(1.05);

    background:white;
}

.close-popup i{
    font-size:30px;
}

/* INPUTS */

.input-group{
    margin-bottom:30px;
}

.input-group label{
    display:block;

    margin-bottom:14px;

    color:#555;

    font-size:13px;

    letter-spacing:0.15em;

    text-transform:uppercase;
}

.input-box{
    position:relative;
}

.input-box i{
    position:absolute;

    left:22px;
    top:22px;

    color:#777;

    font-size:20px;
}

input,
textarea{
    width:100%;

    background:
    rgba(255,255,255,0.7);

    border:
    1px solid rgba(0,0,0,0.06);

    outline:none;

    color:#111;

    padding:22px 22px 22px 60px;

    border-radius:24px;

    font-size:15px;

    font-family:'Outfit',sans-serif;

    transition:0.4s;
}

input:focus,
textarea:focus{
    border-color:#111;

    background:white;
}

textarea{
    min-height:180px;

    resize:none;
}

/* FILE */
.file-upload{
    position:relative;

    background:
    rgba(255,255,255,0.45);

    border:
    2px dashed rgba(0,0,0,0.12);

    border-radius:30px;

    padding:70px 30px;

    text-align:center;

    cursor:pointer;

    transition:0.4s;

    display:block;

    overflow:hidden;
}

.file-upload:hover{
    transform:translateY(-3px);

    background:white;
}

.file-upload i{
    font-size:60px;

    color:#111;

    margin-bottom:20px;

    display:block;
}

.file-upload p{
    color:#555;

    letter-spacing:0.12em;

    text-transform:uppercase;

    font-size:12px;
}
.file-upload input{
    position:absolute;

    inset:0;

    width:100%;
    height:100%;

    opacity:0;

    cursor:pointer;
}

/* HORIZONTAL MEDIA MANAGER */

.media-preview{
    margin-top:34px;

    display:flex;

    gap:24px;

    overflow-x:auto;

    padding-bottom:12px;

    scroll-behavior:smooth;
}

/* SCROLLBAR */

.media-preview::-webkit-scrollbar{
    height:8px;
}

.media-preview::-webkit-scrollbar-thumb{
    background:#ccc;

    border-radius:20px;
}

/* CARD */

.media-card{
    position:relative;

    min-width:420px;

    max-width:420px;

    background:
    rgba(255,255,255,0.72);

    border:
    1px solid rgba(0,0,0,0.06);

    border-radius:28px;

    padding:24px;

    display:flex;

    flex-direction:column;

    gap:20px;

    overflow:hidden;

    box-shadow:
    0 10px 30px rgba(0,0,0,0.05);
}

/* REMOVE BUTTON */

.remove-media{
    position:absolute;

    top:18px;
    right:18px;

    width:42px;
    height:42px;

    border:none;

    border-radius:50%;

    background:#111;

    color:white;

    cursor:pointer;

    display:flex;

    justify-content:center;
    align-items:center;

    transition:0.4s;

    z-index:5;
}

.remove-media:hover{
    transform:
    rotate(90deg)
    scale(1.08);

    background:#e53935;
}

/* THUMB */

.media-thumb{
    width:100%;
    height:240px;

    border-radius:20px;

    overflow:hidden;

    background:#eee;
}

.media-thumb img,
.media-thumb video{
    width:100%;
    height:100%;

    object-fit:cover;
}

/* CONTENT */

.media-content h4{
    margin-bottom:18px;

    font-size:18px;

    font-weight:500;

    padding-right:60px;
}

.media-content input,
.media-content textarea{
    margin-bottom:16px;

    padding-left:24px;
}

/* SUBMIT */

.submit-btn{
    width:100%;

    border:none;

    background:#111;

    color:white;

    padding:22px;

    border-radius:100px;

    font-size:12px;

    font-weight:500;

    letter-spacing:0.25em;

    text-transform:uppercase;

    cursor:pointer;

    transition:0.4s;

    margin-top:30px;
}

.submit-btn:hover{
    transform:translateY(-4px);

    background:#2a2a2a;
}

/* MOBILE */

@media(max-width:768px){

.form-container{
    padding:34px 24px;
}

.form-header h1{
    font-size:48px;
}

.close-popup{
    width:48px;
    height:48px;

    top:18px;
    right:18px;
}

.close-popup i{
    font-size:26px;
}

.media-card{
    min-width:320px;
}

}

</style>

</head>

<body>

<div class="form-container">

<a
href="/admin"
class="close-popup"
>

<i class="ri-close-line"></i>

</a>

<div class="form-header">

<h1>

Add New Project

</h1>

<p>

Upload architecture and interior projects.

</p>

</div>

<form
action="/admin/store"
method="POST"
enctype="multipart/form-data"
>

<!-- TITLE -->

<div class="input-group">

<label>

Project Title

</label>

<div class="input-box">

<i class="ri-building-line"></i>

<input
type="text"
name="title"
required
>

</div>

</div>

<!-- DESCRIPTION -->

<div class="input-group">

<label>

Description

</label>

<div class="input-box">

<i class="ri-file-text-line"></i>

<textarea
name="description"
required
></textarea>

</div>

</div>

<!-- LOCATION -->

<div class="input-group">

<label>

Location

</label>

<div class="input-box">

<i class="ri-map-pin-line"></i>

<input
type="text"
name="location"
required
>

</div>

</div>

<!-- MEDIA -->

<div class="input-group">

<label>

Upload Project Media

</label>

<label class="file-upload">

<i class="ri-gallery-upload-line"></i>

<p id="uploadText">

Upload Images & Videos

</p>
<input
type="file"
name="project_files[]"
id="folderInput"
multiple
accept="image/*,video/*"
>
</label>

<!-- PREVIEW -->

<div
class="media-preview"
id="mediaPreview"
>

</div>

</div>

<!-- BUTTON -->

<button
type="submit"
class="submit-btn"
>

Upload Project

</button>

</form>

</div>
<script>

const folderInput =
document.getElementById(
'folderInput'
);

const uploadText =
document.getElementById(
'uploadText'
);

const mediaPreview =
document.getElementById(
'mediaPreview'
);

/*
|--------------------------------------------------------------------------
| STORE FILES
|--------------------------------------------------------------------------
*/

let allFiles = [];

/*
|--------------------------------------------------------------------------
| ADD FILES
|--------------------------------------------------------------------------
*/

folderInput.addEventListener(
'change',
function(e)
{

const selectedFiles =
Array.from(e.target.files);

/* APPEND */

allFiles = [
...allFiles,
...selectedFiles
];

/* SYNC REAL INPUT */

syncFiles();

/* RENDER */

renderMedia();

});

/*
|--------------------------------------------------------------------------
| SYNC INPUT
|--------------------------------------------------------------------------
*/

function syncFiles()
{

const dataTransfer =
new DataTransfer();

allFiles.forEach(file =>
{
    dataTransfer.items.add(file);
});

/* UPDATE INPUT */

folderInput.files =
dataTransfer.files;

/* UPDATE TEXT */

uploadText.innerHTML =
allFiles.length +
' FILES SELECTED';

}

/*
|--------------------------------------------------------------------------
| RENDER
|--------------------------------------------------------------------------
*/

function renderMedia()
{

mediaPreview.innerHTML = '';

allFiles.forEach(
(file,index)=>
{

const card =
document.createElement('div');

card.classList.add(
'media-card'
);

let preview = '';

/* IMAGE */

if(
file.type.startsWith('image/')
){

preview =
`
<img
src="${URL.createObjectURL(file)}"
>
`;

}

/* VIDEO */

else if(
file.type.startsWith('video/')
){

preview =
`
<video
src="${URL.createObjectURL(file)}"
muted
autoplay
loop
></video>
`;

}

card.innerHTML =
`
<button
type="button"
class="remove-media"
data-index="${index}"
>

<i class="ri-close-line"></i>

</button>

<div class="media-thumb">

${preview}

</div>

<div class="media-content">

<h4>

${file.name}

</h4>

<input
type="text"
name="media_titles[]"
placeholder="Media Title"
>

<textarea
name="media_descriptions[]"
placeholder="Write media description..."
></textarea>

</div>
`;

mediaPreview.appendChild(card);

});

/*
|--------------------------------------------------------------------------
| REMOVE
|--------------------------------------------------------------------------
*/

document.querySelectorAll(
'.remove-media'
).forEach(btn =>
{

btn.addEventListener(
'click',
function()
{

const index =
parseInt(
this.dataset.index
);

/* REMOVE */

allFiles.splice(index,1);

/* SYNC INPUT */

syncFiles();

/* RERENDER */

renderMedia();

});
});

}

</script>

</body>

</html>