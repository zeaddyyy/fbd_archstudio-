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

/* LIGHT BG EFFECT */

/* DARK BLUR OVERLAY */

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
    max-width:920px;

    background:
    rgba(255,255,255,0.58);

    border:
    1px solid rgba(255,255,255,0.35);

    backdrop-filter:blur(30px);

    -webkit-backdrop-filter:blur(30px);

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
/* CLOSE BUTTON */

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

    -webkit-backdrop-filter:blur(10px);

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

}
.form-header p{
    color:#666;

    line-height:2;

    font-size:15px;

    letter-spacing:0.08em;
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
    background:
    rgba(255,255,255,0.45);

    border:
    2px dashed rgba(0,0,0,0.12);

    border-radius:30px;

    padding:70px 30px;

    text-align:center;

    cursor:pointer;

    transition:0.4s;
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
    display:none;
}
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

<div class="input-group">

<label>
Upload Images
</label>

<label class="file-upload">

<i class="ri-folder-upload-line"></i>

<p id="uploadText">
Upload Project Folder
</p>

<input
type="file"
name="project_files[]"
id="folderInput"

webkitdirectory
directory
multiple

required 
>
</label>

</div>

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

folderInput.addEventListener(
'change',
function()
{
    uploadText.innerHTML =
    this.files.length +
    ' files selected';
});

</script>

</body>
</html>