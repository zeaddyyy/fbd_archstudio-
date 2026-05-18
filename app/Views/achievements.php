<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<section class="achievements-page">

<!-- BG VIDEO -->

<video autoplay muted loop playsinline>

<source
src="<?= base_url('assets/videos/hero.mp4') ?>"
type="video/mp4"
>

</video>

<div class="achievements-overlay"></div>

<div class="achievements-container">

<!-- TITLE -->

<div class="achievements-header">

<h1>
Achievements &<br>Milestones
</h1>

<p>
Celebrating a decade of excellence in architectural innovation and design excellence.
</p>

</div>

<!-- STATS SECTION -->

<div class="stats-section">

<div class="stats-grid">

<div class="stat-card">

<div class="stat-icon">

<i class="ri-building-line"></i>

</div>

<div class="stat-number">150+</div>

<div class="stat-label">PROJECTS COMPLETED</div>

</div>

<div class="stat-card">

<div class="stat-icon">

<i class="ri-award-line"></i>

</div>

<div class="stat-number">10</div>

<div class="stat-label">INTERNATIONAL AWARDS</div>

</div>

<div class="stat-card">

<div class="stat-icon">

<i class="ri-user-smile-line"></i>

</div>

<div class="stat-number">98%</div>

<div class="stat-label">CLIENT SATISFACTION</div>

</div>

<div class="stat-card">

<div class="stat-icon">

<i class="ri-global-line"></i>

</div>

<div class="stat-number">15+</div>

<div class="stat-label">YEARS OF EXCELLENCE</div>

</div>

</div>

</div>

<!-- AWARDS SECTION -->

<div class="awards-section">

<h3>
International Awards
</h3>

<div class="awards-grid">

<div class="award-card">

<div class="award-image">

<img src="<?= base_url('uploads/awards/award-2024.jpg') ?>" alt="International Architecture Award 2024">

</div>

<div class="award-content">

<span class="award-year">2024</span>

<h4>International Architecture Award</h4>

<p>Best Luxury Residential Project for "The Infinity Villa"</p>

<span class="award-project">Mumbai, India</span>

</div>

</div>

<div class="award-card">

<div class="award-image">

<img src="<?= base_url('uploads/awards/award-2023.jpg') ?>" alt="World Architecture Festival 2023">

</div>

<div class="award-content">

<span class="award-year">2023</span>

<h4>World Architecture Festival</h4>

<p>Winner - Interior Design Category</p>

<span class="award-project">Barcelona, Spain</span>

</div>

</div>

<div class="award-card">

<div class="award-image">

<img src="<?= base_url('uploads/awards/award-2022.jpg') ?>" alt="Dezeen Awards 2022">

</div>

<div class="award-content">

<span class="award-year">2022</span>

<h4>Dezeen Awards</h4>

<p>Studio of the Year - Finalist</p>

<span class="award-project">London, UK</span>

</div>

</div>

<div class="award-card">

<div class="award-image">

<img src="<?= base_url('uploads/awards/award-2021.jpg') ?>" alt="Asian Design Awards 2021">

</div>

<div class="award-content">

<span class="award-year">2021</span>

<h4>Asian Design Awards</h4>

<p>Best Emerging Design Studio</p>

<span class="award-project">Singapore</span>

</div>

</div>

<div class="award-card">

<div class="award-image">

<img src="<?= base_url('uploads/awards/award-2020.jpg') ?>" alt="IDEA Awards 2020">

</div>

<div class="award-content">

<span class="award-year">2020</span>

<h4>IDEA Awards</h4>

<p>Gold Medal - Residential Architecture</p>

<span class="award-project">New York, USA</span>

</div>

</div>

<div class="award-card">

<div class="award-image">

<img src="<?= base_url('uploads/awards/award-2019.jpg') ?>" alt="Architecture MasterPrize 2019">

</div>

<div class="award-content">

<span class="award-year">2019</span>

<h4>Architecture MasterPrize</h4>

<p>Honorable Mention - Sustainable Design</p>

<span class="award-project">Los Angeles, USA</span>

</div>

</div>

</div>

</div>

</div>

</section>

<style>

.achievements-page{
    position:relative;

    min-height:100vh;

    padding:140px 6% 100px;

    overflow:hidden;

    background:#f4f1ec;
}

/* VIDEO BG */

.achievements-page video{
    position:absolute;

    inset:0;

    width:100%;
    height:100%;

    object-fit:cover;

    filter:
    blur(10px)
    brightness(0.45);

    transform:scale(1.08);
}

/* OVERLAY */

.achievements-overlay{
    position:absolute;
    inset:0;

    background:
    rgba(244,241,236,0.62);

    backdrop-filter:blur(12px);
}

/* CONTAINER */

.achievements-container{
    position:relative;

    z-index:2;
}

/* HEADER */

.achievements-header{
    margin-bottom:80px;
}

.achievements-header h1{
    font-size:96px;

    font-weight:300;

    color:#1a1a1a;

    margin-bottom:18px;

    font-family:
    'Cormorant Garamond',
    serif;

    line-height:0.95;
}

.achievements-header p{
    color:#666;

    font-size:14px;

    letter-spacing:0.18em;

    text-transform:uppercase;
}

/* STATS SECTION */

.stats-section{
    margin-bottom:100px;
}

.stats-grid{
    display:grid;

    grid-template-columns:repeat(4,1fr);

    gap:30px;
}

.stat-card{
    background:
    rgba(255,255,255,0.45);

    border:
    1px solid rgba(255,255,255,0.4);

    border-radius:28px;

    padding:40px 20px;

    text-align:center;

    backdrop-filter:blur(24px);

    transition:0.5s;
}

.stat-card:hover{
    transform:
    translateY(-10px);

    box-shadow:
    0 30px 80px rgba(0,0,0,0.12);
}

.stat-icon{
    font-size:48px;

    color:#c9a03d;

    margin-bottom:20px;
}

.stat-number{
    font-family:'Arial',sans-serif;

    font-size:4rem;

    font-weight:700;

    color:#1a1a1a;

    margin-bottom:10px;

    letter-spacing:normal;
}

.stat-label{
    font-size:11px;

    letter-spacing:0.2em;

    color:#666;

    text-transform:uppercase;
}

/* AWARDS SECTION */

.awards-section{
    margin-bottom:0;
}

.awards-section h3{
    font-size:42px;

    font-weight:300;

    color:#1a1a1a;

    margin-bottom:50px;

    font-family:
    'Cormorant Garamond',
    serif;

    text-align:center;
}

.awards-grid{
    display:grid;

    grid-template-columns:repeat(3,1fr);

    gap:34px;
}

.award-card{
    background:
    rgba(255,255,255,0.45);

    border:
    1px solid rgba(255,255,255,0.4);

    border-radius:28px;

    overflow:hidden;

    backdrop-filter:blur(24px);

    transition:0.5s;
}

.award-card:hover{
    transform:
    translateY(-10px);

    box-shadow:
    0 30px 80px rgba(0,0,0,0.12);
}

.award-image{
    width:100%;

    height:250px;

    overflow:hidden;
}

.award-image img{
    width:100%;
    height:100%;

    object-fit:cover;

    transition:1.2s cubic-bezier(.19,1,.22,1);
}

.award-card:hover .award-image img{
    transform:scale(1.08);
}

.award-content{
    padding:28px;
}

.award-year{
    font-size:11px;

    letter-spacing:0.2em;

    color:#c9a03d;

    margin-bottom:10px;

    display:block;
}

.award-card h4{
    font-size:22px;

    font-weight:500;

    color:#1a1a1a;

    margin-bottom:15px;

    font-family:
    'Cormorant Garamond',
    serif;
}

.award-content p{
    font-size:14px;

    line-height:1.6;

    color:#666;

    margin-bottom:15px;
}

.award-project{
    font-size:11px;

    letter-spacing:0.1em;

    color:#999;
}

/* MOBILE */

@media(max-width:1024px){
    .stats-grid{
        grid-template-columns:repeat(2,1fr);
    }
    
    .awards-grid{
        grid-template-columns:repeat(2,1fr);
    }
}

@media(max-width:768px){

.achievements-page{
    padding:120px 20px 80px;
}

.achievements-header h1{
    font-size:58px;
}

.stats-grid{
    grid-template-columns:1fr;
    
    gap:20px;
}

.stat-number{
    font-size:3rem;
}

.awards-section h3{
    font-size:34px;
}

.awards-grid{
    grid-template-columns:1fr;
}

.award-image{
    height:200px;
}

.award-card h4{
    font-size:20px;
}

}

@media(max-width:480px){
    .stat-number{
        font-size:2.5rem;
    }
}

</style>

<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/ScrollTrigger.min.js"></script>

<script>
gsap.registerPlugin(ScrollTrigger);

// Hero animations
gsap.from('.achievements-header h1', {
    y: 80,
    opacity: 0,
    duration: 1.5,
    ease: 'power4.out'
});

gsap.from('.achievements-header p', {
    y: 40,
    opacity: 0,
    duration: 1.2,
    delay: 0.3
});

// Stats animation
gsap.utils.toArray('.stat-card').forEach((card, i) => {
    gsap.from(card, {
        scrollTrigger: {
            trigger: card,
            start: 'top 85%'
        },
        y: 60,
        opacity: 0,
        duration: 1,
        delay: i * 0.1
    });
});

// Awards animation
gsap.utils.toArray('.award-card').forEach((card, i) => {
    gsap.from(card, {
        scrollTrigger: {
            trigger: card,
            start: 'top 85%'
        },
        y: 50,
        opacity: 0,
        duration: 0.8,
        delay: i * 0.1
    });
});

// Number counter animation
function animateNumbers() {
    const statNumbers = document.querySelectorAll('.stat-number');
    statNumbers.forEach(stat => {
        const target = parseInt(stat.innerText);
        let current = 0;
        const increment = target / 50;
        const updateNumber = () => {
            if (current < target) {
                current += increment;
                stat.innerText = Math.ceil(current) + (stat.innerText.includes('+') ? '+' : '');
                setTimeout(updateNumber, 20);
            } else {
                stat.innerText = target + (stat.innerText.includes('+') ? '+' : '');
            }
        };
        
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    updateNumber();
                    observer.unobserve(entry.target);
                }
            });
        });
        observer.observe(stat.parentElement);
    });
}

animateNumbers();
</script>

<?= $this->endSection() ?>