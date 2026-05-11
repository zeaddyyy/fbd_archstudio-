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
    background:#0f0d0b;

    font-family:'Outfit',sans-serif;

    color:white;

    min-height:100vh;

    display:flex;
    justify-content:center;
    align-items:center;

    padding:50px;
}

/* BG */

body::before{
    content:"";

    position:fixed;
    inset:0;

    background:
    radial-gradient(
        circle at top left,
        rgba(201,169,110,0.08),
        transparent 40%
    );

    z-index:-1;
}

/* CONTAINER */

.form-container{
    width:100%;
    max-width:850px;

    background:
    rgba(20,18,15,0.72);

    border:
    1px solid rgba(255,255,255,0.05);

    backdrop-filter:blur(26px);

    border-radius:34px;

    padding:55px;
}

/* HEADER */

.form-header{
    margin-bottom:45px;
}

.form-header h1{
    font-size:58px;

    font-weight:300;

    margin-bottom:18px;

    color:#f3e7d6;
}

.form-header p{
    color:#bca991;

    line-height:1.9;
}

/* INPUTS */

.input-group{
    margin-bottom:28px;
}

.input-group label{
    display:block;

    margin-bottom:14px;

    color:#d5c3ac;
}

.input-box{
    position:relative;
}

.input-box i{
    position:absolute;

    left:20px;
    top:22px;

    color:#9f7c45;

    font-size:20px;
}

input,
textarea{
    width:100%;

    background:
    rgba(255,255,255,0.03);

    border:
    1px solid rgba(255,255,255,0.04);

    outline:none;

    color:white;

    padding:20px 20px 20px 58px;

    border-radius:22px;

    font-size:16px;

    font-family:'Outfit',sans-serif;
}

textarea{
    min-height:180px;

    resize:none;
}

/* FILE */

.file-upload{
    background:
    rgba(255,255,255,0.02);

    border:
    2px dashed rgba(217,199,184,0.28);

    border-radius:24px;

    padding:60px 30px;

    text-align:center;

    cursor:pointer;

    transition:0.4s;
}

.file-upload:hover{
    border-color:#D9C7B8;
}

.file-upload i{
    font-size:56px;

    color:#D9C7B8;

    margin-bottom:18px;

    display:block;
}

.file-upload input{
    display:none;
}

/* BUTTON */

.submit-btn{
    width:100%;

    border:none;

    background:
    linear-gradient(
        135deg,
        #d9b078,
        #9f7c45
    );

    color:#111;

    padding:22px;

    border-radius:60px;

    font-size:16px;

    font-weight:600;

    cursor:pointer;

    transition:0.4s;
}

.submit-btn:hover{
    transform:translateY(-4px);
}

</style>

</head>

<body>

<div class="form-container">

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