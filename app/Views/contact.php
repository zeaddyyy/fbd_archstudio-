<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport"
content="width=device-width, initial-scale=1.0">

<title>Contact — FB Design Studio</title>

<link rel="stylesheet"
href="https://cdn.jsdelivr.net/npm/remixicon/fonts/remixicon.css">

<link rel="preconnect"
href="https://fonts.googleapis.com">

<link rel="preconnect"
href="https://fonts.gstatic.com"
crossorigin>

<link
href="https://fonts.googleapis.com/css2?family=Outfit:wght@200;300;400;500&display=swap"
rel="stylesheet">

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
}

body{
    background:#0a0a0a;
    color:white;

    font-family:'Outfit',sans-serif;

    min-height:100vh;

    overflow-y:auto;
    overflow-x:hidden;

    scroll-behavior:smooth;
}

/* VIDEO BG */

.bg-video{
    position:fixed;
    inset:0;

    width:100%;
    height:100%;

    object-fit:cover;

    filter:
    blur(12px)
    brightness(0.42);

    transform:scale(1.08);

    z-index:-2;
}

/* OVERLAY */

.overlay{
    position:fixed;
    inset:0;

    background:
    rgba(0,0,0,0.32);

    backdrop-filter:blur(6px);

    -webkit-backdrop-filter:blur(6px);

    z-index:-1;
}

/* NAVBAR */

.navbar{
    position:fixed;

    top:0;
    left:0;

    width:100%;

    padding:28px 6%;

    display:flex;
    justify-content:space-between;
    align-items:center;

    z-index:100;

    background:
    rgba(0,0,0,0.12);

    backdrop-filter:blur(18px);

    -webkit-backdrop-filter:blur(18px);
}

.logo{
    font-size:20px;

    letter-spacing:0.25em;

    font-weight:300;
}

.back-btn{
    color:white;

    text-decoration:none;

    padding:14px 26px;

    border-radius:100px;

    background:
    rgba(255,255,255,0.05);

    border:
    1px solid rgba(255,255,255,0.08);

    backdrop-filter:blur(20px);

    transition:0.4s;
}

.back-btn:hover{
    background:
    rgba(255,255,255,0.08);
}

/* CONTACT WRAPPER */

.contact-wrapper{
    position:relative;

    z-index:2;

    width:100%;
    min-height:100vh;

    display:flex;
    justify-content:center;
    align-items:center;

    padding:140px 20px 80px;
}

/* CONTACT CARD */

.contact-card{
    width:100%;
    max-width:560px;

    background:
    rgba(255,255,255,0.02);

    border:
    1px solid rgba(255,255,255,0.06);

    backdrop-filter:blur(24px);

    -webkit-backdrop-filter:blur(24px);

    border-radius:34px;

    padding:42px;

    box-shadow:
    0 10px 40px rgba(0,0,0,0.18);

    margin:auto;
}

/* TEXT */

.small-text{
    font-size:12px;

    letter-spacing:0.28em;

    color:#c8b5a4;

    margin-bottom:16px;
}

.contact-card h1{
    font-size:54px;

    font-weight:300;

    line-height:1;
}

.contact-card p{
    margin-top:18px;

    color:#bcbcbc;

    line-height:1.8;
}

/* FORM */

.contact-form{
    margin-top:35px;
}

.input-group{
    margin-bottom:18px;
}

input,
textarea,
select{
    width:100%;

    background:
    rgba(255,255,255,0.03);

    border:
    1px solid rgba(255,255,255,0.05);

    border-radius:18px;

    padding:18px;

    color:white;

    outline:none;

    font-size:15px;

    font-family:'Outfit',sans-serif;

    backdrop-filter:blur(10px);

    -webkit-backdrop-filter:blur(10px);
}

textarea{
    min-height:140px;

    resize:none;
}

input:focus,
textarea:focus,
select:focus{
    border-color:
    rgba(217,199,184,0.3);
}

/* BUTTON */

.submit-btn{
    width:100%;
    height:58px;

    border:none;

    border-radius:100px;

    background:#d9c7b8;

    color:black;

    font-size:13px;

    letter-spacing:0.18em;

    text-transform:uppercase;

    cursor:pointer;

    margin-top:10px;

    transition:0.4s;
}

.submit-btn:hover{
    transform:translateY(-2px);
}

/* SCROLLBAR */

::-webkit-scrollbar{
    width:8px;
}

::-webkit-scrollbar-track{
    background:#111;
}

::-webkit-scrollbar-thumb{
    background:#444;
    border-radius:20px;
}

::-webkit-scrollbar-thumb:hover{
    background:#666;
}

/* MOBILE */

@media(max-width:768px){

.contact-card{
    padding:30px;
}

.contact-card h1{
    font-size:42px;
}

.navbar{
    padding:20px;
}

.logo{
    font-size:16px;
}

.back-btn{
    padding:12px 18px;
    font-size:14px;
}

}

</style>

</head>

<body>

<!-- VIDEO BG -->

<video
class="bg-video"
autoplay
muted
loop
playsinline
>

<source
src="/assets/videos/hero.mp4"
type="video/mp4"
>

</video>

<!-- OVERLAY -->

<div class="overlay"></div>

<!-- NAVBAR -->

<nav class="navbar">

<div class="logo">
FB Design Studio
</div>

<a
href="/"
class="back-btn"
>

Back Home

</a>

</nav>

<!-- CONTACT -->

<div class="contact-wrapper">

<div class="contact-card">

<div class="small-text">
FB DESIGN STUDIO
</div>

<h1>
Let's Build <br>
Something Beautiful
</h1>

<p>
Architecture, interiors, luxury residences,
commercial spaces and premium design consultation.
</p>

<form
action="/contact/send"
method="POST"
class="contact-form"
>

<?= csrf_field() ?>

<div class="input-group">

<input
type="text"
name="name"
placeholder="Your Name"
required
>

</div>

<div class="input-group">

<input
type="text"
name="phone"
placeholder="Phone Number"
required
>

</div>

<div class="input-group">

<input
type="email"
name="email"
placeholder="Email Address"
required
>

</div>

<div class="input-group">

<select
name="service"
required
>

<option value="">
Select Service
</option>

<option>
Architecture Design
</option>

<option>
Interior Design
</option>

<option>
3D Visualization
</option>

<option>
Landscape Design
</option>

<option>
Renovation
</option>

</select>

</div>

<div class="input-group">

<textarea
name="message"
placeholder="Tell us about your project..."
required
></textarea>

</div>

<button
type="submit"
class="submit-btn"
>

Send Inquiry

</button>

</form>

</div>

</div>

</body>
</html>