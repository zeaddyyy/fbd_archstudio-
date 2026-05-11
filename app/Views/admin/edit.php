<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta
name="viewport"
content="width=device-width, initial-scale=1.0"
>

<title>Edit Project</title>

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
    padding:50px;
}

.form-container{
    max-width:850px;
    margin:auto;

    background:
    rgba(20,18,15,0.72);

    border:
    1px solid rgba(255,255,255,0.05);

    border-radius:34px;

    padding:55px;
}

.form-header{
    margin-bottom:40px;
}

.form-header h1{
    font-size:52px;
    font-weight:300;
    color:#f3e7d6;
}

.input-group{
    margin-bottom:28px;
}

.input-group label{
    display:block;
    margin-bottom:14px;
    color:#d5c3ac;
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

    padding:20px;

    border-radius:22px;

    font-size:16px;

    font-family:'Outfit',sans-serif;
}

textarea{
    min-height:180px;
    resize:none;
}

.gallery{
    display:grid;

    grid-template-columns:
    repeat(
        auto-fit,
        minmax(90px,1fr)
    );

    gap:12px;

    margin-bottom:25px;
}

.gallery img{
    width:100%;

    aspect-ratio:1/1;

    object-fit:cover;

    border-radius:16px;

    border:
    1px solid rgba(255,255,255,0.06);
}
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
}

</style>

</head>

<body>

<div class="form-container">

<div class="form-header">

<h1>
Edit Project
</h1>

</div>

<form
action="/admin/update/<?= $project['id'] ?>"
method="POST"
enctype="multipart/form-data"
>

<div class="input-group">

<label>
Project Title
</label>

<input
type="text"
name="title"
value="<?= esc($project['title']) ?>"
required
>

</div>

<div class="input-group">

<label>
Description
</label>

<textarea
name="description"
required
><?= esc($project['description']) ?></textarea>

</div>

<div class="input-group">

<label>
Location
</label>

<input
type="text"
name="location"
value="<?= esc($project['location']) ?>"
required
>

</div>

<div class="input-group">

<label>
Current Gallery
</label>

<div class="gallery">

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
>

<?php endforeach; endif; ?>

</div>

</div>

<div class="input-group">

<label>
Add More Images
</label>

<input
type="file"
name="project_files[]"
multiple
accept="image/*"
>

</div>

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