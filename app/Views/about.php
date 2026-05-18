<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<section class="about-page">

    <!-- BACKGROUND VIDEO -->

    <video
    class="bg-video"
    autoplay
    muted
    loop
    playsinline
    >

        <source
        src="<?= base_url('assets/videos/hero.mp4') ?>"
        type="video/mp4">

    </video>

    <!-- OVERLAY -->

    <div class="about-overlay"></div>

    <div class="about-container">

        <!-- HEADER -->

        <div class="about-header">

            <span class="mini-label">
                FB DESIGN STUDIO
            </span>

            <h1>
                About Studio
            </h1>

            <p>
                Architecture beyond space.
            </p>

        </div>

        <!-- STORY -->

        <div class="studio-story">

            <!-- TEXT -->

            <div class="story-text">

                <h2>
                    FB Design Studio
                </h2>

                <p>
                    FB Design Studio is a multidisciplinary architecture and interior design practice founded with a vision to create spaces that transcend the ordinary.
                </p>

                <p>
                    We believe architecture is not only about structures — it is about emotion, storytelling, atmosphere, and timeless spatial experiences.
                </p>

                <p>
                    Every project is approached with cinematic attention to detail, balancing luxury, minimalism, warmth, and material sensitivity.
                </p>

            </div>

            <!-- VIDEO -->

            <div class="story-image">

                <div class="founder-video-container">

                    <video
                    class="founder-video"
                    id="founderVideo"
                    autoplay
                    muted
                    loop
                    playsinline
                    >

                        <source
                        src="<?= base_url('assets/videos/founder.mp4') ?>"
                        type="video/mp4">

                    </video>

                    <!-- CONTROLS -->

                    <div class="founder-video-controls">

                        <button
                        onclick="toggleFounderPlay()"
                        id="playBtn"
                        >

                            <i class="ri-pause-line"></i>

                        </button>

                        <button
                        onclick="toggleFounderMute()"
                        id="muteBtn"
                        >

                            <i class="ri-volume-mute-line"></i>

                        </button>

                    </div>

                </div>

            </div>

        </div>

        <!-- PHILOSOPHY -->

        <div class="philosophy-section">

            <h3>
                Our Philosophy
            </h3>

            <div class="philosophy-grid">

                <div class="philosophy-card">

                    <i class="ri-leaf-line"></i>

                    <h4>
                        Material Sensitivity
                    </h4>

                    <p>
                        Carefully curated textures and materials that create warmth and timeless elegance.
                    </p>

                </div>

                <div class="philosophy-card">

                    <i class="ri-pen-nib-line"></i>

                    <h4>
                        Spatial Composition
                    </h4>

                    <p>
                        Harmonious spaces designed with movement, light, depth, and emotional balance.
                    </p>

                </div>

                <div class="philosophy-card">

                    <i class="ri-crown-line"></i>

                    <h4>
                        Elevated Aesthetics
                    </h4>

                    <p>
                        Luxury minimalism blended with cinematic visual storytelling and refined architecture.
                    </p>

                </div>

            </div>

        </div>

        <!-- FOUNDER -->

        <div class="founder-section">

            <h3>
                Founder
            </h3>

            <div class="founder-card">

                <!-- LEFT -->

                <div class="founder-image-wrap">

                    <!-- VIDEO -->

                    <video
                    class="founder-card-video"
                    autoplay
                    muted
                    loop
                    playsinline
                    >

                        <source
                        src="<?= base_url('assets/videos/founder.mp4') ?>"
                        type="video/mp4">

                    </video>

                    <!-- IMAGE -->

                    <img
                    src="<?= base_url('assets/images/founder.png') ?>"
                    alt="Founder"
                    class="founder-overlay-image"
                    >

                </div>

                <!-- RIGHT -->

                <div class="founder-content">

                    <span class="founder-label">
                        FB DESIGN STUDIO
                    </span>

                    <h2>
                        Faiyaz Bhayji
                    </h2>

                    <div class="founder-role">

                        Founder & Principal Architect

                    </div>

                    <p>

                        Founded with a passion for timeless architecture and immersive interiors, FB Design Studio reflects a design language rooted in elegance, spatial harmony, luxury minimalism, and cinematic storytelling.

                    </p>

                    <div class="founder-social">

                        <a href="#">
                            <i class="ri-instagram-line"></i>
                        </a>

                        <a href="#">
                            <i class="ri-linkedin-line"></i>
                        </a>

                        <a href="#">
                            <i class="ri-global-line"></i>
                        </a>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>

<style>

/* PAGE */

.about-page{
    position:relative;

    min-height:100vh;

    padding:140px 6% 120px;

    overflow:hidden;

    background:#f4f1ec;
}

/* BG VIDEO */

.bg-video{
    position:absolute;

    inset:0;

    width:100%;
    height:100%;

    object-fit:cover;

    filter:
    blur(12px)
    brightness(0.4);

    transform:scale(1.08);
}

/* OVERLAY */

.about-overlay{
    position:absolute;

    inset:0;

    background:
    rgba(244,241,236,0.72);

    backdrop-filter:blur(14px);
}

/* CONTAINER */

.about-container{
    position:relative;

    z-index:2;
}

/* HEADER */

.about-header{
    margin-bottom:100px;
}

.mini-label{
    display:inline-block;

    margin-bottom:20px;

    font-size:11px;

    letter-spacing:0.35em;

    text-transform:uppercase;

    color:#777;
}

.about-header h1{
    font-size:110px;

    line-height:0.9;

    font-weight:300;

    margin-bottom:20px;

    color:#111;

    font-family:
    'Cormorant Garamond',
    serif;
}

.about-header p{
    font-size:15px;

    letter-spacing:0.2em;

    text-transform:uppercase;

    color:#666;
}

/* STORY */

.studio-story{
    display:grid;

    grid-template-columns:
    1fr 1fr;

    gap:80px;

    align-items:center;

    margin-bottom:120px;
}

/* TEXT */

.story-text h2{
    font-size:58px;

    line-height:0.95;

    font-weight:300;

    margin-bottom:30px;

    color:#111;

    font-family:
    'Cormorant Garamond',
    serif;
}

.story-text p{
    font-size:15px;

    line-height:2;

    color:#555;

    margin-bottom:22px;
}

/* STORY VIDEO */

.story-image{
    position:relative;

    height:720px;

    border-radius:40px;

    overflow:hidden;

    background:#e9e4dc;
}

/* VIDEO */

.founder-video-container{
    position:relative;

    width:100%;
    height:100%;
}

.founder-video{
    position:absolute;

    inset:0;

    width:100%;
    height:100%;

    object-fit:contain;

    background:#e9e4dc;

    border-radius:40px;

    transition:
    1.2s cubic-bezier(.19,1,.22,1);
}

.story-image:hover .founder-video{
    transform:scale(1.02);
}

/* CONTROLS */

.founder-video-controls{
    position:absolute;

    bottom:24px;
    left:24px;

    display:flex;

    gap:14px;

    z-index:20;
}

.founder-video-controls button{
    width:58px;
    height:58px;

    border:none;

    border-radius:50%;

    background:
    rgba(255,255,255,0.14);

    backdrop-filter:blur(18px);

    border:
    1px solid rgba(255,255,255,0.15);

    color:white;

    display:flex;

    justify-content:center;
    align-items:center;

    cursor:pointer;

    transition:0.4s;
}

.founder-video-controls button:hover{
    transform:
    translateY(-4px)
    scale(1.06);

    background:
    rgba(255,255,255,0.24);
}

.founder-video-controls i{
    font-size:24px;
}

/* PHILOSOPHY */

.philosophy-section{
    margin-bottom:120px;
}

.philosophy-section h3{
    text-align:center;

    font-size:52px;

    font-weight:300;

    margin-bottom:60px;

    color:#111;

    font-family:
    'Cormorant Garamond',
    serif;
}

.philosophy-grid{
    display:grid;

    grid-template-columns:
    repeat(3,1fr);

    gap:34px;
}

.philosophy-card{
    padding:42px 34px;

    border-radius:34px;

    background:
    rgba(255,255,255,0.45);

    border:
    1px solid rgba(255,255,255,0.45);

    backdrop-filter:blur(26px);

    transition:0.5s;
}

.philosophy-card:hover{
    transform:
    translateY(-10px);

    box-shadow:
    0 30px 80px rgba(0,0,0,0.08);
}

.philosophy-card i{
    font-size:54px;

    color:#c9a03d;

    margin-bottom:24px;

    display:inline-block;
}

.philosophy-card h4{
    font-size:30px;

    margin-bottom:18px;

    color:#111;

    font-family:
    'Cormorant Garamond',
    serif;
}

.philosophy-card p{
    font-size:14px;

    line-height:1.9;

    color:#666;
}

/* FOUNDER */

.founder-section{
    margin-bottom:40px;
}

.founder-section h3{
    text-align:center;

    font-size:58px;

    margin-bottom:70px;

    font-weight:300;

    color:#111;

    font-family:
    'Cormorant Garamond',
    serif;
}

/* CARD */

.founder-card{
    display:grid;

    grid-template-columns:
    460px 1fr;

    gap:80px;

    align-items:center;

    padding:50px;

    border-radius:42px;

    background:
    rgba(255,255,255,0.45);

    border:
    1px solid rgba(255,255,255,0.5);

    backdrop-filter:blur(30px);

    box-shadow:
    0 30px 90px rgba(0,0,0,0.08);
}

/* IMAGE WRAP */

.founder-image-wrap{
    position:relative;

    width:100%;

    height:720px;

    border-radius:36px;

    overflow:hidden;

    background:#000;
}

/* VIDEO */

.founder-card-video{
    position:absolute;

    inset:0;

    width:100%;
    height:100%;

    object-fit:cover;

    z-index:1;

    transition:1.2s;
}

/* IMAGE */

.founder-overlay-image{
    position:absolute;

    inset:0;

    width:100%;
    height:100%;

    object-fit:cover;

    z-index:2;

    mix-blend-mode:lighten;

    opacity:0.92;

    pointer-events:none;

    transition:1.2s;
}

/* HOVER */

.founder-image-wrap:hover .founder-card-video{
    transform:scale(1.04);
}

.founder-image-wrap:hover .founder-overlay-image{
    transform:scale(1.02);
}

/* CONTENT */

.founder-label{
    display:inline-block;

    margin-bottom:22px;

    font-size:11px;

    letter-spacing:0.35em;

    text-transform:uppercase;

    color:#888;
}

.founder-content h2{
    font-size:92px;

    line-height:0.88;

    margin-bottom:28px;

    font-weight:300;

    color:#111;

    font-family:
    'Cormorant Garamond',
    serif;
}

.founder-role{
    display:inline-flex;

    align-items:center;

    padding:12px 24px;

    border-radius:100px;

    background:
    rgba(0,0,0,0.05);

    font-size:11px;

    letter-spacing:0.24em;

    text-transform:uppercase;

    color:#444;

    margin-bottom:34px;
}

.founder-content p{
    font-size:15px;

    line-height:2.1;

    color:#555;

    margin-bottom:38px;

    max-width:620px;
}

/* SOCIAL */

.founder-social{
    display:flex;

    gap:16px;
}

.founder-social a{
    width:58px;
    height:58px;

    border-radius:50%;

    background:
    rgba(255,255,255,0.45);

    border:
    1px solid rgba(0,0,0,0.05);

    display:flex;

    justify-content:center;
    align-items:center;

    text-decoration:none;

    color:#111;

    transition:0.4s;
}

.founder-social a:hover{
    transform:
    translateY(-6px);

    background:#111;

    color:white;
}

.founder-social i{
    font-size:22px;
}

/* MOBILE */

@media(max-width:1024px){

.studio-story{
    grid-template-columns:1fr;
}

.philosophy-grid{
    grid-template-columns:1fr 1fr;
}

.founder-card{
    grid-template-columns:1fr;
}

.founder-content h2{
    font-size:62px;
}

}

@media(max-width:768px){

.about-page{
    padding:120px 20px 80px;
}

.about-header h1{
    font-size:64px;
}

.story-image{
    height:540px;
}

.philosophy-grid{
    grid-template-columns:1fr;
}

.founder-card{
    padding:30px;
}

.founder-image-wrap{
    height:560px;
}

.founder-content h2{
    font-size:52px;
}

}

</style>

<script>

const founderVideo =
document.getElementById(
'founderVideo'
);

const playBtn =
document.getElementById(
'playBtn'
);

const muteBtn =
document.getElementById(
'muteBtn'
);

/* PLAY / PAUSE */

function toggleFounderPlay()
{
    if(founderVideo.paused)
    {
        founderVideo.play();

        playBtn.innerHTML =
        '<i class="ri-pause-line"></i>';
    }
    else
    {
        founderVideo.pause();

        playBtn.innerHTML =
        '<i class="ri-play-line"></i>';
    }
}

/* MUTE / UNMUTE */

function toggleFounderMute()
{
    founderVideo.muted =
    !founderVideo.muted;

    if(founderVideo.muted)
    {
        muteBtn.innerHTML =
        '<i class="ri-volume-mute-line"></i>';
    }
    else
    {
        muteBtn.innerHTML =
        '<i class="ri-volume-up-line"></i>';
    }
}

</script>

<?= $this->endSection() ?>