<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta
name="viewport"
content="width=device-width, initial-scale=1.0"
>

<title>
Create Homepage Project
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

    color:#111;

    overflow-x:hidden;

    position:relative;

    padding:50px 0;
}

/* BACKGROUND */

body::before{
    content:'';

    position:fixed;

    inset:0;

    background:
    radial-gradient(
        circle at top left,
        rgba(0,0,0,0.03),
        transparent 35%
    ),

    radial-gradient(
        circle at bottom right,
        rgba(201,169,110,0.10),
        transparent 35%
    );

    z-index:-2;

    pointer-events:none;
}

/* GRAIN */

.grain{
    position:fixed;

    inset:0;

    opacity:0.03;

    pointer-events:none;

    z-index:99999;

    background-image:
    url("https://grainy-gradients.vercel.app/noise.svg");
}

/* BLUR */

.blur{
    position:fixed;

    width:400px;
    height:400px;

    border-radius:50%;

    background:#c9a96e;

    filter:blur(140px);

    opacity:0.12;

    top:-120px;
    right:-120px;

    z-index:-1;
}

/* WRAPPER */

.form-wrapper{
    width:92%;

    max-width:1500px;

    margin:auto;

    background:
    rgba(255,255,255,0.68);

    backdrop-filter:blur(24px);

    border:
    1px solid rgba(0,0,0,0.05);

    border-radius:42px;

    overflow:hidden;

    box-shadow:
    0 30px 80px rgba(0,0,0,0.06);
}

/* HEADER */

.top{
    display:flex;

    justify-content:space-between;

    align-items:flex-start;

    padding:50px 60px;

    border-bottom:
    1px solid rgba(0,0,0,0.05);
}

/* LEFT */

.top-left span{
    display:inline-block;

    margin-bottom:18px;

    font-size:11px;

    letter-spacing:0.35em;

    color:#777;
}

.top-left h1{
    font-size:82px;

    line-height:0.9;

    font-family:'Cormorant Garamond',serif;

    font-weight:300;

    letter-spacing:-0.05em;

    margin-bottom:20px;
}

.top-left p{
    max-width:620px;

    line-height:2;

    color:#666;

    font-size:15px;
}

/* BUTTON */

.back-btn{
    height:58px;

    padding:0 30px;

    border-radius:100px;

    background:#111;

    color:white;

    display:flex;

    align-items:center;

    gap:12px;

    text-decoration:none;

    font-size:10px;

    letter-spacing:0.25em;

    text-transform:uppercase;

    transition:0.4s;

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
        rgba(255,255,255,0.25),
        transparent
    );

    transition:0.8s;
}

.back-btn:hover::before{
    left:120%;
}

.back-btn:hover{
    transform:
    translateY(-4px);
}

/* FORM */

.project-form{
    padding:60px;
}

/* GRID */

.form-grid{
    display:grid;

    grid-template-columns:
    repeat(2,1fr);

    gap:30px;
}

/* GROUP */

.input-group{
    display:flex;

    flex-direction:column;
}

.input-group.full{
    grid-column:span 2;
}

/* LABEL */

label{
    margin-bottom:14px;

    font-size:11px;

    letter-spacing:0.24em;

    color:#666;
}

/* INPUT */

input,
textarea,
select{
    width:100%;

    border:none;

    background:
    rgba(244,241,236,0.8);

    padding:22px;

    border-radius:24px;

    font-size:15px;

    font-family:'Outfit',sans-serif;

    outline:none;

    transition:0.4s;

    border:
    1px solid transparent;
}

input:focus,
textarea:focus,
select:focus{
    border-color:
    rgba(0,0,0,0.08);

    transform:
    translateY(-2px);

    background:white;
}

textarea{
    min-height:220px;

    resize:none;
}

/* UPLOAD */

.upload-box{
    position:relative;

    background:
    rgba(248,246,242,0.8);

    border:
    2px dashed rgba(0,0,0,0.08);

    border-radius:34px;

    padding:70px;

    text-align:center;

    overflow:hidden;

    transition:0.4s;
}

.upload-box:hover{
    transform:
    translateY(-4px);

    border-color:
    rgba(0,0,0,0.12);
}

.upload-box::before{
    content:'';

    position:absolute;

    inset:0;

    background:
    linear-gradient(
        135deg,
        rgba(255,255,255,0.4),
        transparent
    );

    pointer-events:none;
}

/* ICON */

.upload-box i{
    font-size:68px;

    color:#999;

    margin-bottom:18px;
}

.upload-box h3{
    font-size:34px;

    font-family:'Cormorant Garamond',serif;

    font-weight:300;

    margin-bottom:12px;
}

.upload-box p{
    color:#777;

    line-height:1.8;

    margin-bottom:30px;
}

/* FILE */

.file-input{
    position:relative;

    display:inline-flex;

    align-items:center;

    justify-content:center;

    gap:12px;

    padding:18px 34px;

    border-radius:100px;

    background:#111;

    color:white;

    font-size:10px;

    letter-spacing:0.22em;

    text-transform:uppercase;

    overflow:hidden;
}

.file-input input{
    position:absolute;

    inset:0;

    opacity:0;

    cursor:pointer;
}

/* PREVIEW */

.preview-grid{
    display:grid;

    grid-template-columns:
    repeat(auto-fill,minmax(140px,1fr));

    gap:18px;

    margin-top:30px;
}

.preview-item{
    position:relative;

    border-radius:24px;

    overflow:hidden;

    height:140px;

    background:#eee;
}

.preview-item img{
    width:100%;
    height:100%;

    object-fit:cover;
}

/* BUTTON */

.submit-btn{
    width:100%;

    height:78px;

    border:none;

    border-radius:100px;

    background:#111;

    color:white;

    margin-top:50px;

    font-size:11px;

    letter-spacing:0.3em;

    text-transform:uppercase;

    cursor:pointer;

    transition:0.5s;

    position:relative;

    overflow:hidden;
}

.submit-btn::before{
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
        rgba(255,255,255,0.25),
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

    box-shadow:
    0 20px 40px rgba(0,0,0,0.12);
}

/* RESPONSIVE */

@media(max-width:900px){

body{
    padding:20px 0;
}

.top{
    flex-direction:column;

    gap:30px;

    padding:40px 30px;
}

.top-left h1{
    font-size:54px;
}

.project-form{
    padding:30px;
}

.form-grid{
    grid-template-columns:1fr;
}

.input-group.full{
    grid-column:span 1;
}

.upload-box{
    padding:40px 20px;
}

}

</style>

</head>

<body>

<div class="grain"></div>

<div class="blur"></div>

<!-- WRAPPER -->

<div class="form-wrapper">

<!-- HEADER -->

<div class="top">

<div class="top-left">

<span>

FB DESIGN STUDIO CMS

</span>

<h1>

Create <br>
Homepage Project

</h1>

<p>

Upload cinematic architecture projects,
luxury interiors and dynamic homepage
showcases with a premium studio workflow.

</p>

</div>

<a
href="/admin/"
class="back-btn"
>

<i class="ri-arrow-left-line"></i>

Dashboard

</a>

</div>

<!-- FORM -->

<form
action="/admin/home-projects/store"
method="POST"
enctype="multipart/form-data"
class="project-form"
>

<div class="form-grid">

<!-- TITLE -->

<div class="input-group">

<label>
PROJECT TITLE
</label>

<input
type="text"
name="title"
placeholder="Modern Luxury Residence"
required
>

</div>

<!-- LOCATION -->

<div class="input-group">

<label>
LOCATION
</label>

<input
type="text"
name="location"
placeholder="Ahmedabad, India"
required
>

</div>

<!-- YEAR -->

<div class="input-group">

<label>
YEAR
</label>

<input
type="text"
name="year"
placeholder="2026"
required
>

</div>

<!-- CATEGORY -->

<div class="input-group">

<label>
CATEGORY
</label>

<input
type="text"
name="category"
placeholder="Residential"
required
>

</div>

<!-- DESIGNER -->

<div class="input-group">

<label>
DESIGNER
</label>

<input
type="text"
name="designer"
placeholder="FB Design Studio"
required
>

</div>

<!-- TEAM -->

<div class="input-group">

<label>
TEAM
</label>

<input
type="text"
name="team"
placeholder="Architects & Interiors"
required
>

</div>

<!-- AREA -->

<div class="input-group">

<label>
AREA
</label>

<input
type="text"
name="area"
placeholder="3500 sq.ft"
required
>

</div>

<!-- LAYOUT -->

<div class="input-group">

<label>
LAYOUT TYPE
</label>

<select
name="layout_type"
required
>

<option value="">
Select Layout
</option>

<option value="large">
Large
</option>

<option value="wide">
Wide
</option>

<option value="tall">
Tall
</option>

<option value="normal">
Normal
</option>

</select>

</div>

<!-- DESCRIPTION -->

<div class="input-group full">

<label>
PROJECT DESCRIPTION
</label>

<textarea
name="description"
placeholder="Write project concept, design philosophy, materials, lighting, architecture details..."
required
></textarea>

</div>

<!-- UPLOAD -->

<div class="input-group full">

<label>
PROJECT IMAGES
</label>

<div class="upload-box">

<i class="ri-image-add-line"></i>

<h3>

Upload Cinematic Gallery

</h3>

<p>

Select multiple luxury architecture images
for homepage showcase and immersive gallery experience.

</p>

<label class="file-input">

<i class="ri-upload-cloud-2-line"></i>

Choose Images

<input
type="file"
name="project_images[]"
multiple
accept="image/*"
required
id="imageInput"
>

</label>

<div class="preview-grid" id="previewGrid"></div>

</div>

</div>

</div>

<button
type="submit"
class="submit-btn"
>

Create Homepage Project

</button>

</form>

</div>

<script>

/* IMAGE PREVIEW */

const imageInput =
document.getElementById(
'imageInput'
);

const previewGrid =
document.getElementById(
'previewGrid'
);

imageInput.addEventListener(
'change',
function(){

previewGrid.innerHTML = '';

Array.from(this.files).forEach(file => {

const reader =
new FileReader();

reader.onload = function(e){

const item =
document.createElement('div');

item.classList.add(
'preview-item'
);

item.innerHTML =
`<img src="${e.target.result}">`;

previewGrid.appendChild(item);

};

reader.readAsDataURL(file);

});

}
);

/* GSAP */

const elements =
document.querySelectorAll(
'.input-group'
);

elements.forEach((el,index)=>{

el.style.opacity = 0;
el.style.transform = 'translateY(40px)';

setTimeout(()=>{

el.style.transition =
'1s cubic-bezier(.19,1,.22,1)';

el.style.opacity = 1;
el.style.transform = 'translateY(0px)';

},150 * index);

});

</script>

</body>

</html>