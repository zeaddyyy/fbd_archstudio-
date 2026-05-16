<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<link
href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@300;400;500;600&family=Outfit:wght@200;300;400;500;600&display=swap"
rel="stylesheet"
>

<link
rel="stylesheet"
href="https://cdn.jsdelivr.net/npm/remixicon/fonts/remixicon.css"
>

<!-- HERO -->

<section class="lux-hero">

<!-- VIDEO BG -->

<div class="hero-video">

<video
autoplay
muted
loop
playsinline
>

<source
src="<?= base_url('assets/videos/hero.mp4') ?>"
type="video/mp4"
>

</video>

</div>

<!-- OVERLAY -->

<div class="hero-overlay"></div>

<!-- CONTENT -->

<div class="hero-content">

<div class="hero-top-line">

<div class="line"></div>

<span>
ARCHITECTURE & INTERIOR DESIGN
</span>

</div>

<div class="hero-heading">
    <div class="hero-big">FB</div>
    <div class="hero-big-text">DESIGN STUDIO</div>
</div>

<div class="hero-est">

EST. 2026

</div>

<h2>

TIMELESS LUXURY SPACES

</h2>

<p>

Crafting immersive architecture and cinematic
interiors through minimal forms, natural textures,
luxury spatial composition and emotionally
elevated experiences.

</p>

<a
href="/projects"
class="hero-btn"
>

VIEW PROJECTS

<span></span>

</a>

</div>

<!-- STATS -->

<div class="hero-stats">

<div class="stat-box">

<h3>
20+
</h3>

<span>
PROJECTS
</span>

</div>

<div class="stat-box">

<h3>
3+
</h3>

<span>
YEARS
</span>

</div>

<div class="stat-box">

<h3>
5+
</h3>

<span>
CITIES
</span>

</div>

</div>

<!-- SCROLL -->

<div class="scroll-text">

SCROLL

</div>

</section>

<!-- GALLERY SECTION -->

<section class="gallery-section">

<div class="gallery-container">

<!-- Project 1 - Luxury Living Room -->
<div class="gallery-item tall" 
     data-project-id="project1"
     data-project-data='{
        "title": "Luxury Living Room",
        "images": [
            {"src": "img1.jpeg", "title": "Main Living Area", "desc": "The main living area featuring premium Italian leather furniture, custom marble coffee table, and floor-to-ceiling windows that flood the space with natural light.", "category": "Living Room", "location": "Mumbai", "year": "2024", "designer": "Sarah Johnson", "team": "Arjun Mehta, Priya Sharma", "area": "850 sq. ft."},
            {"src": "img1_2.jpg", "title": "Seating Corner", "desc": "A cozy seating corner with handcrafted armchairs, ambient lighting, and curated art pieces that add character to the space.", "category": "Living Room", "location": "Mumbai", "year": "2024", "designer": "Sarah Johnson", "team": "Arjun Mehta, Priya Sharma", "area": "320 sq. ft."},
            {"src": "img1_3.jpg", "title": "Entertainment Wall", "desc": "The entertainment wall features a 85-inch OLED TV, custom cabinetry, and integrated sound system for the ultimate cinematic experience.", "category": "Entertainment", "location": "Mumbai", "year": "2024", "designer": "Sarah Johnson", "team": "Arjun Mehta, Priya Sharma", "area": "450 sq. ft."}
        ]
     }'>
    <img src="<?= base_url('assets/images/img1.jpeg') ?>" alt="">
</div>

<!-- Project 2 - Modern Kitchen -->
<div class="gallery-item" 
     data-project-id="project2"
     data-project-data='{
        "title": "Modern Kitchen",
        "images": [
            {"src": "img2.jpeg", "title": "Main Kitchen Area", "desc": "State-of-the-art kitchen with minimalist cabinetry, quartz countertops, and premium German appliances.", "category": "Kitchen", "location": "Delhi", "year": "2024", "designer": "Vikram Mehta", "team": "Neha Sharma, Raj Patel", "area": "450 sq. ft."},
            {"src": "img2_2.jpg", "title": "Island Counter", "desc": "The center island features a built-in cooktop, wine cooler, and seating for four, perfect for casual dining.", "category": "Kitchen Island", "location": "Delhi", "year": "2024", "designer": "Vikram Mehta", "team": "Neha Sharma, Raj Patel", "area": "120 sq. ft."},
            {"src": "img2_3.jpg", "title": "Storage Solution", "desc": "Smart storage solutions including pull-out pantry, soft-close drawers, and organized compartments for utensils.", "category": "Storage", "location": "Delhi", "year": "2024", "designer": "Vikram Mehta", "team": "Neha Sharma, Raj Patel", "area": "180 sq. ft."}
        ]
     }'>
    <img src="<?= base_url('assets/images/img2.jpeg') ?>" alt="">
</div>

<!-- Project 3 - Grand Villa Exterior -->
<div class="gallery-item large" 
     data-project-id="project3"
     data-project-data='{
        "title": "Grand Villa Exterior",
        "images": [
            {"src": "img3.jpeg", "title": "Front Facade", "desc": "Spectacular villa exterior featuring contemporary architecture, floor-to-ceiling glass panels, and dramatic evening lighting.", "category": "Exterior", "location": "Bangalore", "year": "2023", "designer": "Arjun Kapoor", "team": "Sanjay Singh, Anjali Desai", "area": "5,200 sq. ft."},
            {"src": "img3_2.jpg", "title": "Entrance Pathway", "desc": "Grand entrance pathway with natural stone paving, water features, and lush tropical landscaping.", "category": "Landscape", "location": "Bangalore", "year": "2023", "designer": "Arjun Kapoor", "team": "Sanjay Singh, Anjali Desai", "area": "1,200 sq. ft."},
            {"src": "img3_3.jpg", "title": "Night View", "desc": "Mesmerizing night view showing the villa's architectural lighting design and reflection on the pool.", "category": "Exterior", "location": "Bangalore", "year": "2023", "designer": "Arjun Kapoor", "team": "Sanjay Singh, Anjali Desai", "area": "5,200 sq. ft."}
        ]
     }'>
    <img src="<?= base_url('assets/images/img3.jpeg') ?>" alt="">
</div>

<!-- Project 4 - Minimalist Bedroom -->
<div class="gallery-item" 
     data-project-id="project4"
     data-project-data='{
        "title": "Minimalist Bedroom",
        "images": [
            {"src": "img4.jpeg", "title": "Master Bedroom", "desc": "Peaceful master bedroom with neutral tones, soft textures, and custom upholstered headboard.", "category": "Bedroom", "location": "Pune", "year": "2024", "designer": "Priya Sharma", "team": "Rohit Verma, Sneha Reddy", "area": "380 sq. ft."},
            {"src": "img4_2.jpg", "title": "Walk-in Closet", "desc": "Luxurious walk-in closet with custom cabinetry, LED lighting, and organized storage for clothing and accessories.", "category": "Closet", "location": "Pune", "year": "2024", "designer": "Priya Sharma", "team": "Rohit Verma, Sneha Reddy", "area": "150 sq. ft."},
            {"src": "img4_3.jpg", "title": "Bedside Detail", "desc": "Elegant bedside setup with designer lamps, curated books, and minimalist decor elements.", "category": "Bedroom", "location": "Pune", "year": "2024", "designer": "Priya Sharma", "team": "Rohit Verma, Sneha Reddy", "area": "380 sq. ft."}
        ]
     }'>
    <img src="<?= base_url('assets/images/img4.jpeg') ?>" alt="">
</div>

<!-- Project 5 - Cozy Reading Nook -->
<div class="gallery-item small" 
     data-project-id="project5"
     data-project-data='{
        "title": "Cozy Reading Nook",
        "images": [
            {"src": "img5.jpeg", "title": "Reading Corner", "desc": "A intimate corner designed for relaxation with comfortable seating, warm lighting, and curated bookshelf.", "category": "Reading", "location": "Chennai", "year": "2024", "designer": "Anjali Desai", "team": "Karthik S, Meera Nair", "area": "180 sq. ft."},
            {"src": "img5_2.jpg", "title": "Bookshelf Detail", "desc": "Custom-built bookshelf with integrated reading light and display niches for art pieces.", "category": "Furniture", "location": "Chennai", "year": "2024", "designer": "Anjali Desai", "team": "Karthik S, Meera Nair", "area": "60 sq. ft."},
            {"src": "img5_3.jpg", "title": "Window Seat", "desc": "Comfortable window seat with cushions and throw pillows, perfect for afternoon reading sessions.", "category": "Seating", "location": "Chennai", "year": "2024", "designer": "Anjali Desai", "team": "Karthik S, Meera Nair", "area": "80 sq. ft."}
        ]
     }'>
    <img src="<?= base_url('assets/images/img5.jpeg') ?>" alt="">
</div>

<!-- Project 6 - Dining Space -->
<div class="gallery-item" 
     data-project-id="project6"
     data-project-data='{
        "title": "Dining Space",
        "images": [
            {"src": "img6.jpeg", "title": "Main Dining Area", "desc": "Elegant dining area with statement chandelier, premium dining table, and comfortable seating for eight.", "category": "Dining", "location": "Hyderabad", "year": "2023", "designer": "Rahul Khanna", "team": "Aishwarya P, Vikram R", "area": "520 sq. ft."},
            {"src": "img6_2.jpg", "title": "Bar Corner", "desc": "Stylish bar corner with marble counter, glass shelving, and LED-lit display for bottles and glassware.", "category": "Bar", "location": "Hyderabad", "year": "2023", "designer": "Rahul Khanna", "team": "Aishwarya P, Vikram R", "area": "120 sq. ft."},
            {"src": "img6_3.jpg", "title": "Table Setting", "desc": "Elegant table setting with fine china, crystal glassware, and artistic centerpiece arrangement.", "category": "Dining", "location": "Hyderabad", "year": "2023", "designer": "Rahul Khanna", "team": "Aishwarya P, Vikram R", "area": "520 sq. ft."}
        ]
     }'>
    <img src="<?= base_url('assets/images/img6.jpeg') ?>" alt="">
</div>

<!-- Project 7 - Luxury Bathroom -->
<div class="gallery-item tall" 
     data-project-id="project7"
     data-project-data='{
        "title": "Luxury Bathroom",
        "images": [
            {"src": "img7.jpeg", "title": "Main Bathroom", "desc": "Spa-inspired bathroom with freestanding tub, rain shower, and premium marble finishes.", "category": "Bathroom", "location": "Mumbai", "year": "2024", "designer": "Sarah Johnson", "team": "Rohit Verma, Neha Sharma", "area": "320 sq. ft."},
            {"src": "img7_2.jpg", "title": "Vanity Area", "desc": "Double vanity with designer mirrors, under-cabinet lighting, and ample storage for toiletries.", "category": "Vanity", "location": "Mumbai", "year": "2024", "designer": "Sarah Johnson", "team": "Rohit Verma, Neha Sharma", "area": "80 sq. ft."},
            {"src": "img7_3.jpg", "title": "Shower Area", "desc": "Spacious walk-in shower with rainfall showerhead, body jets, and steam function.", "category": "Shower", "location": "Mumbai", "year": "2024", "designer": "Sarah Johnson", "team": "Rohit Verma, Neha Sharma", "area": "100 sq. ft."}
        ]
     }'>
    <img src="<?= base_url('assets/images/img7.jpeg') ?>" alt="">
</div>

<!-- Project 8 - Home Office -->
<div class="gallery-item" 
     data-project-id="project8"
     data-project-data='{
        "title": "Home Office",
        "images": [
            {"src": "img8.jpeg", "title": "Workspace", "desc": "Productive workspace designed for focus with ergonomic furniture and inspiring aesthetics.", "category": "Office", "location": "Bangalore", "year": "2024", "designer": "Vikram Mehta", "team": "Raj Patel, Sneha Reddy", "area": "280 sq. ft."},
            {"src": "img8_2.jpg", "title": "Meeting Area", "desc": "Small meeting area with comfortable seating and whiteboard for brainstorming sessions.", "category": "Meeting", "location": "Bangalore", "year": "2024", "designer": "Vikram Mehta", "team": "Raj Patel, Sneha Reddy", "area": "120 sq. ft."},
            {"src": "img8_3.jpg", "title": "Storage Wall", "desc": "Custom storage wall with filing cabinets, bookshelves, and display niches.", "category": "Storage", "location": "Bangalore", "year": "2024", "designer": "Vikram Mehta", "team": "Raj Patel, Sneha Reddy", "area": "80 sq. ft."}
        ]
     }'>
    <img src="<?= base_url('assets/images/img8.jpeg') ?>" alt="">
</div>

<!-- Project 9 - Outdoor Terrace -->
<div class="gallery-item wide" 
     data-project-id="project9"
     data-project-data='{
        "title": "Outdoor Terrace",
        "images": [
            {"src": "img9.jpeg", "title": "Main Terrace", "desc": "Beautiful outdoor living space with comfortable seating, greenery, and stunning city views.", "category": "Outdoor", "location": "Pune", "year": "2023", "designer": "Anjali Desai", "team": "Karthik S, Meera Nair", "area": "1,200 sq. ft."},
            {"src": "img9_2.jpg", "title": "Dining Area", "desc": "Al fresco dining area with weather-resistant furniture and ambient lighting for evening meals.", "category": "Dining", "location": "Pune", "year": "2023", "designer": "Anjali Desai", "team": "Karthik S, Meera Nair", "area": "300 sq. ft."},
            {"src": "img9_3.jpg", "title": "Lounge Corner", "desc": "Relaxing lounge corner with daybeds and fire pit for cozy evening gatherings.", "category": "Lounge", "location": "Pune", "year": "2023", "designer": "Anjali Desai", "team": "Karthik S, Meera Nair", "area": "400 sq. ft."}
        ]
     }'>
    <img src="<?= base_url('assets/images/img9.jpeg') ?>" alt="">
</div>

<!-- Project 10 - Entryway Design -->
<div class="gallery-item" 
     data-project-id="project10"
     data-project-data='{
        "title": "Entryway Design",
        "images": [
            {"src": "img10.jpeg", "title": "Main Entry", "desc": "Welcoming entrance with statement art, premium finishes, and thoughtful storage solutions.", "category": "Entry", "location": "Delhi", "year": "2024", "designer": "Rahul Khanna", "team": "Aishwarya P, Vikram R", "area": "250 sq. ft."},
            {"src": "img10_2.jpg", "title": "Console Detail", "desc": "Elegant console table with decorative mirror, vase, and curated accessories.", "category": "Decor", "location": "Delhi", "year": "2024", "designer": "Rahul Khanna", "team": "Aishwarya P, Vikram R", "area": "50 sq. ft."},
            {"src": "img10_3.jpg", "title": "Shoe Storage", "desc": "Custom shoe storage cabinet with seating and mirror, maximizing functionality.", "category": "Storage", "location": "Delhi", "year": "2024", "designer": "Rahul Khanna", "team": "Aishwarya P, Vikram R", "area": "80 sq. ft."}
        ]
     }'>
    <img src="<?= base_url('assets/images/img10.jpeg') ?>" alt="">
</div>

</div>

</section>

<!-- IMAGE POPUP LIGHTBOX WITH THUMBNAILS -->
<div class="lightbox" id="lightbox">
    <div class="lightbox-overlay" onclick="closeLightbox()"></div>
    <div class="lightbox-container">
        <button class="lightbox-close" onclick="closeLightbox()">
            <i class="ri-close-line"></i>
        </button>
        <div class="lightbox-content">
            <div class="lightbox-image-section">
                <div class="lightbox-main-image">
                    <img id="lightbox-img" src="" alt="">
                </div>
                <div class="lightbox-thumbnails" id="lightbox-thumbnails">
                    <!-- Thumbnails will be dynamically added here -->
                </div>
            </div>
            <div class="lightbox-info">
                <h2 id="lightbox-title">Project Title</h2>
                <div class="lightbox-meta">
                    <span class="meta-category" id="lightbox-category">
                        <i class="ri-price-tag-3-line"></i> Interior Design
                    </span>
                    <span class="meta-location" id="lightbox-location">
                        <i class="ri-map-pin-line"></i> Mumbai
                    </span>
                    <span class="meta-year" id="lightbox-year">
                        <i class="ri-calendar-line"></i> 2024
                    </span>
                </div>
                <p id="lightbox-desc">Project description goes here...</p>
                <div class="lightbox-divider"></div>
                <div class="lightbox-extra">
                    <div class="extra-item">
                        <i class="ri-user-star-line"></i>
                        <div>
                            <strong>Design Director</strong>
                            <span id="lightbox-designer">Sarah Johnson</span>
                        </div>
                    </div>
                    <div class="extra-item">
                        <i class="ri-team-line"></i>
                        <div>
                            <strong>Project Team</strong>
                            <span id="lightbox-team">Arjun Mehta, Priya Sharma</span>
                        </div>
                    </div>
                    <div class="extra-item">
                        <i class="ri-ruler-2-line"></i>
                        <div>
                            <strong>Area</strong>
                            <span id="lightbox-area">2,500 sq. ft.</span>
                        </div>
                    </div>
                </div>
                <div class="lightbox-btn-container">
                    <a href="/projects" class="lightbox-btn">View All Projects <i class="ri-arrow-right-line"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- ABOUT -->

<section class="about-section">

<div class="about-left">

<div class="about-mini">

ABOUT FB DESIGN STUDIO

</div>

<h2>

Architecture
Beyond Aesthetics

</h2>

</div>

<div class="about-right">

<p>

FB Design Studio creates emotionally immersive
spaces inspired by cinematic storytelling,
modern architecture and timeless luxury.
Each project is designed through light,
texture, proportion and spatial emotion.

</p>

<a
href="/contact"
class="about-btn"
>

GET IN TOUCH

</a>

</div>

</section>


<!-- FLOATING SOCIALS -->

<div class="floating-socials">

<a
href="https://instagram.com"
target="_blank"
class="instagram-btn"
>

<i class="ri-instagram-line"></i>

</a>

<a
href="https://wa.me/917359129662"
target="_blank"
class="whatsapp-btn"
>

<i class="ri-whatsapp-line"></i>

</a>

</div>

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
    color:#111;
    overflow-x:hidden;
    font-family:'Outfit',sans-serif;
}

/* HERO */

.lux-hero{
    position:relative;
    width:100%;
    height:100vh;
    overflow:hidden;
}

/* VIDEO */

.hero-video{
    position:absolute;
    inset:0;
}

.hero-video video{
    width:100%;
    height:100%;
    object-fit:cover;
    filter: brightness(0.78);
    transform:scale(1.04);
}

/* OVERLAY */

.hero-overlay{
    position:absolute;
    inset:0;
    background: linear-gradient(to right, rgba(244,241,236,0.96), rgba(244,241,236,0.12));
}

/* CONTENT */

.hero-content{
    position:relative;
    z-index:5;
    width:90%;
    height:100%;
    margin:auto;
    display:flex;
    flex-direction:column;
    justify-content:center;
    max-width:760px;
}

/* TOP */

.hero-top-line{
    display:flex;
    align-items:center;
    gap:18px;
    margin-bottom:36px;
}

.line{
    width:70px;
    height:1px;
    background:#777;
}

.hero-top-line span{
    font-size:11px;
    letter-spacing:0.45em;
    color:#555;
}

/* HEADING */
.hero-heading{
    margin-bottom:20px;
}

.hero-big{
    font-family: 'Cormorant Garamond', serif;
    font-size: 120px;
    font-weight: 300;
    line-height: 1;
    color: #111;
    letter-spacing: 0.02em;
}

.hero-big-text{
    font-family: 'Cormorant Garamond', serif;
    font-size: 80px;
    font-weight: 300;
    line-height: 1;
    color: #111;
    letter-spacing: 0.02em;
    margin-top: 10px;
}

/* EST */

.hero-est{
    margin-top:24px;
    font-size:11px;
    letter-spacing:0.35em;
    color:#666;
}

/* SUBTITLE */

.hero-content h2{
    margin-top:24px;
    font-size:38px;
    font-weight:300;
    letter-spacing:0.08em;
}

/* TEXT */

.hero-content p{
    margin-top:34px;
    max-width:620px;
    line-height:2;
    color:#555;
    font-size:16px;
}

/* BUTTON */

.hero-btn{
    margin-top:42px;
    width:260px;
    height:72px;
    border: 1px solid rgba(0,0,0,0.1);
    display:flex;
    align-items:center;
    justify-content:space-between;
    padding:0 30px;
    text-decoration:none;
    color:#111;
    background:white;
    letter-spacing:0.28em;
    font-size:11px;
    transition: 1s cubic-bezier(.19,1,.22,1);
    overflow:hidden;
    position:relative;
}

.hero-btn::before{
    content:"";
    position:absolute;
    top:0;
    left:-120%;
    width:100%;
    height:100%;
    background: linear-gradient(120deg, transparent, rgba(255,255,255,0.4), transparent);
    transition:1s;
}

.hero-btn:hover::before{
    left:120%;
}

.hero-btn span{
    width:50px;
    height:1px;
    background:#111;
}

.hero-btn:hover{
    background:#111;
    color:white;
    transform: translateY(-4px);
}

.hero-btn:hover span{
    background:white;
}

/* STATS */

.hero-stats{
    position:absolute;
    right:7%;
    bottom:80px;
    display:flex;
    gap:50px;
    z-index:5;
}

.stat-box{
    text-align:center;
}

.stat-box h3{
    font-size:38px;
    font-weight:300;
}

.stat-box span{
    font-size:10px;
    letter-spacing:0.35em;
    color:#666;
}

/* SCROLL */

.scroll-text{
    position:absolute;
    bottom:20px;
    left:50%;
    transform:translateX(-50%);
    font-size:10px;
    letter-spacing:0.5em;
    color:#777;
    z-index:10;
}

/* GALLERY */
.gallery-section{
    padding: 60px 5%;
}

.gallery-container {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    grid-auto-rows: 280px;
    gap: 20px;
    grid-auto-flow: dense;
}

.gallery-item {
    overflow: hidden;
    border-radius: 24px;
    cursor: pointer;
    position: relative;
}

.gallery-item img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: 1.2s cubic-bezier(.19,1,.22,1);
}

.gallery-item:hover img {
    transform: scale(1.08);
}

.gallery-item::after {
    content: "";
    position: absolute;
    inset: 0;
    background: linear-gradient(to top, rgba(0,0,0,0.28), transparent);
    opacity: 0;
    transition: 0.7s;
    pointer-events: none;
}

.gallery-item:hover::after {
    opacity: 1;
}

/* IMAGE SIZES */
.gallery-item.tall {
    grid-row: span 2;
}

.gallery-item.wide {
    grid-column: span 2;
}

.gallery-item.large {
    grid-row: span 2;
    grid-column: span 2;
}

.gallery-item.small {
    grid-row: span 1;
    grid-column: span 1;
}

/* LIGHTBOX POPUP WITH THUMBNAILS */
.lightbox {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: 999999;
    display: none;
    align-items: center;
    justify-content: center;
}

.lightbox-overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.85);
    backdrop-filter: blur(20px);
}

.lightbox-container {
    position: relative;
    width: 90%;
    max-width: 1400px;
    height: 85%;
    background: rgba(244, 241, 236, 0.95);
    border-radius: 30px;
    overflow: hidden;
    z-index: 1000000;
    animation: lightboxFadeIn 0.4s ease;
}

@keyframes lightboxFadeIn {
    from {
        opacity: 0;
        transform: scale(0.95);
    }
    to {
        opacity: 1;
        transform: scale(1);
    }
}

.lightbox-close {
    position: absolute;
    top: 20px;
    right: 20px;
    width: 45px;
    height: 45px;
    border-radius: 50%;
    background: #111;
    border: none;
    cursor: pointer;
    z-index: 1000001;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: 0.3s;
}

.lightbox-close i {
    color: white;
    font-size: 24px;
}

.lightbox-close:hover {
    transform: rotate(90deg);
    background: #333;
}

.lightbox-content {
    display: flex;
    height: 100%;
    flex-direction: row;
}

.lightbox-image-section {
    flex: 1.2;
    display: flex;
    flex-direction: column;
    padding: 20px;
    gap: 15px;
}

.lightbox-main-image {
    flex: 1;
    overflow: hidden;
    border-radius: 20px;
    background: #1a1a1a;
    display: flex;
    align-items: center;
    justify-content: center;
}

.lightbox-main-image img {
    width: 100%;
    height: 100%;
    object-fit: contain;
}

.lightbox-thumbnails {
    display: flex;
    gap: 12px;
    overflow-x: auto;
    padding-bottom: 8px;
}

.lightbox-thumbnails::-webkit-scrollbar {
    height: 4px;
}

.lightbox-thumbnails::-webkit-scrollbar-track {
    background: rgba(0, 0, 0, 0.1);
    border-radius: 10px;
}

.lightbox-thumbnails::-webkit-scrollbar-thumb {
    background: rgba(0, 0, 0, 0.3);
    border-radius: 10px;
}

.thumbnail-item {
    width: 80px;
    height: 80px;
    border-radius: 12px;
    overflow: hidden;
    cursor: pointer;
    border: 2px solid transparent;
    transition: 0.3s;
    flex-shrink: 0;
}

.thumbnail-item img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.thumbnail-item.active {
    border-color: #111;
    transform: scale(1.05);
}

.thumbnail-item:hover {
    border-color: #888;
    transform: scale(1.02);
}

.lightbox-info {
    flex: 0.8;
    padding: 40px 35px;
    overflow-y: auto;
    background: #f4f1ec;
}

.lightbox-info h2 {
    font-family: 'Cormorant Garamond', serif;
    font-size: 42px;
    font-weight: 300;
    color: #1a1a1a;
    margin-bottom: 20px;
}

.lightbox-meta {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
    margin-bottom: 25px;
    padding-bottom: 20px;
    border-bottom: 1px solid rgba(0, 0, 0, 0.08);
}

.lightbox-meta span {
    display: flex;
    align-items: center;
    gap: 8px;
    font-size: 13px;
    color: #777;
    letter-spacing: 0.05em;
}

.lightbox-meta i {
    font-size: 16px;
}

.lightbox-info p {
    color: #555;
    line-height: 1.8;
    font-size: 16px;
    margin-bottom: 30px;
}

.lightbox-divider {
    height: 1px;
    background: rgba(0, 0, 0, 0.08);
    margin: 25px 0;
}

.lightbox-extra {
    display: flex;
    flex-direction: column;
    gap: 20px;
    margin-bottom: 30px;
}

.extra-item {
    display: flex;
    align-items: flex-start;
    gap: 15px;
}

.extra-item i {
    font-size: 22px;
    color: #111;
    margin-top: 3px;
}

.extra-item div {
    display: flex;
    flex-direction: column;
    gap: 5px;
}

.extra-item strong {
    font-size: 12px;
    letter-spacing: 0.15em;
    text-transform: uppercase;
    color: #999;
    font-weight: 500;
}

.extra-item span {
    font-size: 15px;
    color: #333;
}

.lightbox-btn-container {
    margin-top: 20px;
}

.lightbox-btn {
    display: inline-flex;
    align-items: center;
    gap: 12px;
    padding: 14px 28px;
    background: #111;
    color: white;
    text-decoration: none;
    border-radius: 100px;
    font-size: 11px;
    letter-spacing: 0.2em;
    text-transform: uppercase;
    transition: 0.4s;
}

.lightbox-btn:hover {
    background: #2a2a2a;
    transform: translateY(-3px);
    gap: 15px;
}

/* Custom Scrollbar */
.lightbox-info::-webkit-scrollbar {
    width: 4px;
}

.lightbox-info::-webkit-scrollbar-track {
    background: rgba(0, 0, 0, 0.05);
}

.lightbox-info::-webkit-scrollbar-thumb {
    background: rgba(0, 0, 0, 0.2);
    border-radius: 10px;
}

/* ABOUT */

.about-section{
    width:88%;
    margin:auto;
    padding:140px 0;
    display:grid;
    grid-template-columns:1fr 1fr;
    gap:80px;
}

.about-mini{
    font-size:11px;
    letter-spacing:0.35em;
    color:#777;
    margin-bottom:20px;
}

.about-left h2{
    font-family: 'Cormorant Garamond', serif;
    font-size:6vw;
    line-height:0.95;
    font-weight:300;
}

.about-right p{
    line-height:2.1;
    color:#555;
    font-size:17px;
    margin-bottom:40px;
}

/* ABOUT BUTTON */

.about-btn{
    display:inline-flex;
    align-items:center;
    justify-content:center;
    width:240px;
    height:70px;
    background:#111;
    color:white;
    text-decoration:none;
    letter-spacing:0.28em;
    font-size:11px;
    transition:0.5s;
}

.about-btn:hover{
    transform: translateY(-4px);
}

/* FLOATING SOCIALS */

.floating-socials{
    position:fixed;
    right:24px;
    bottom:24px;
    display:flex;
    flex-direction:column;
    gap:14px;
    z-index:9999;
}

.floating-socials a{
    width:70px;
    height:70px;
    border-radius:50%;
    display:flex;
    justify-content:center;
    align-items:center;
    color:white;
    text-decoration:none;
    font-size:30px;
    transition:0.5s;
}

.instagram-btn{
    background: radial-gradient(circle at 30% 107%, #fdf497 0%, #fd5949 45%, #d6249f 60%, #285AEB 90%);
}

.whatsapp-btn{
    background:#25D366;
}

.floating-socials a:hover{
    transform: scale(1.08) translateY(-4px);
}

/* MOBILE RESPONSIVE */

@media(max-width:1200px){
    .gallery-container {
        grid-template-columns: repeat(3, 1fr);
    }
    .lightbox-content {
        flex-direction: column;
    }
    .lightbox-image-section {
        flex: 1;
        min-height: 300px;
    }
    .lightbox-info {
        flex: 0.8;
        padding: 25px;
    }
    .lightbox-info h2 {
        font-size: 32px;
    }
}

@media(max-width:900px){
    .gallery-container {
        grid-template-columns: repeat(2, 1fr);
    }
    .lightbox-container {
        width: 95%;
        height: 90%;
    }
}

@media(max-width:768px){

.hero-big{
    font-size: 70px !important;
}

.hero-big-text{
    font-size: 45px !important;
}

.hero-content h2{
    font-size:26px;
}

.hero-stats{
    position:relative;
    right:auto;
    bottom:auto;
    margin-top:60px;
    justify-content:space-between;
}

.about-section{
    grid-template-columns:1fr;
}

.about-left h2{
    font-size:58px;
}

.gallery-container {
    grid-template-columns: repeat(2, 1fr);
    gap: 15px;
}

.gallery-section{
    padding: 40px 4%;
}

.lightbox-container {
    height: 95%;
}

.lightbox-info h2 {
    font-size: 28px;
}

.lightbox-info p {
    font-size: 14px;
}

.lightbox-meta {
    gap: 12px;
}

.lightbox-meta span {
    font-size: 11px;
}

.thumbnail-item {
    width: 60px;
    height: 60px;
}

}

@media(max-width:550px){
    .gallery-container {
        grid-template-columns: 1fr;
        grid-auto-rows: 300px;
    }
    
    .gallery-item.tall {
        grid-row: span 1;
    }
    
    .gallery-item.wide {
        grid-column: span 1;
    }
    
    .gallery-item.large {
        grid-row: span 1;
        grid-column: span 1;
    }
    
    .lightbox-info {
        padding: 20px;
    }
    
    .lightbox-info h2 {
        font-size: 24px;
    }
    
    .lightbox-close {
        top: 10px;
        right: 10px;
        width: 35px;
        height: 35px;
    }
    
    .lightbox-close i {
        font-size: 18px;
    }
    
    .thumbnail-item {
        width: 50px;
        height: 50px;
    }
}

@media(max-width:480px){
    .hero-big{
        font-size: 50px !important;
    }
    
    .hero-big-text{
        font-size: 32px !important;
    }
}

</style>

<!-- GSAP -->

<script
src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js"
></script>

<script
src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/ScrollTrigger.min.js"
></script>

<script>

gsap.registerPlugin(ScrollTrigger);

/* PAGE LOAD */

window.addEventListener('load', () => {

gsap.from('body', {
    opacity:0,
    duration:1.2,
    ease:'power4.out'
});

gsap.from('.hero-video video', {
    scale:1.25,
    opacity:0,
    duration:2.2,
    ease:'power4.out'
});

gsap.from('.hero-top-line', {
    y:80,
    opacity:0,
    duration:1.5,
    delay:0.2,
    ease:'power4.out'
});

gsap.from('.hero-heading', {
    y:100,
    opacity:0,
    duration:1.5,
    delay:0.3,
    ease:'power4.out'
});

gsap.from('.hero-est', {
    y:40,
    opacity:0,
    duration:1.2,
    delay:0.6,
    ease:'power4.out'
});

gsap.from('.hero-content h2', {
    y:60,
    opacity:0,
    duration:1.4,
    delay:0.8,
    ease:'power4.out'
});

gsap.from('.hero-content p', {
    y:60,
    opacity:0,
    duration:1.5,
    delay:1,
    ease:'power4.out'
});

gsap.from('.hero-btn', {
    y:60,
    opacity:0,
    duration:1.4,
    delay:1.2,
    ease:'power4.out'
});

gsap.from('.stat-box', {
    y:80,
    opacity:0,
    stagger:0.15,
    duration:1.4,
    delay:1.4,
    ease:'power4.out'
});

});

/* FLOAT */

gsap.to('.hero-content', {
    y:20,
    duration:5,
    repeat:-1,
    yoyo:true,
    ease:'sine.inOut'
});

/* SCROLL */

gsap.to('.scroll-text', {
    y:15,
    duration:1.5,
    repeat:-1,
    yoyo:true,
    ease:'sine.inOut'
});

/* GALLERY */

gsap.utils.toArray('.gallery-item').forEach((item, i) => {
    gsap.to(item, {
        scrollTrigger: {
            trigger: item,
            start: 'top 92%'
        },
        opacity: 1,
        y: 0,
        duration: 1.4,
        delay: i * 0.05,
        ease: 'power4.out'
    });
});

/* ABOUT */

gsap.from('.about-left', {
    scrollTrigger: {
        trigger: '.about-section',
        start: 'top 80%'
    },
    x: -120,
    opacity: 0,
    duration: 1.6,
    ease: 'power4.out'
});

gsap.from('.about-right', {
    scrollTrigger: {
        trigger: '.about-section',
        start: 'top 80%'
    },
    x: 120,
    opacity: 0,
    duration: 1.6,
    ease: 'power4.out'
});

/* SOCIALS */

gsap.to('.floating-socials', {
    y: -12,
    duration: 2,
    repeat: -1,
    yoyo: true,
    ease: 'sine.inOut'
});

// LIGHTBOX WITH THUMBNAILS FUNCTIONALITY
let currentImageData = null;
let currentThumbnailImages = [];
let currentImageIndex = 0;

function openLightbox(element) {
    const lightbox = document.getElementById('lightbox');
    const item = element.closest('.gallery-item');
    
    // Parse the project data from JSON
    const projectData = JSON.parse(item.dataset.projectData);
    
    // Store the images array
    currentThumbnailImages = projectData.images;
    currentImageIndex = 0;
    
    // Update lightbox with first image
    updateLightboxContent(0);
    
    lightbox.style.display = 'flex';
    document.body.style.overflow = 'hidden';
}

function updateLightboxContent(index) {
    const imageData = currentThumbnailImages[index];
    const basePath = '<?= base_url('assets/images/') ?>';
    
    // Update main image
    document.getElementById('lightbox-img').src = basePath + imageData.src;
    
    // Update text content based on the selected image
    document.getElementById('lightbox-title').textContent = imageData.title;
    document.getElementById('lightbox-category').innerHTML = `<i class="ri-price-tag-3-line"></i> ${imageData.category}`;
    document.getElementById('lightbox-location').innerHTML = `<i class="ri-map-pin-line"></i> ${imageData.location}`;
    document.getElementById('lightbox-year').innerHTML = `<i class="ri-calendar-line"></i> ${imageData.year}`;
    document.getElementById('lightbox-desc').textContent = imageData.desc;
    document.getElementById('lightbox-designer').textContent = imageData.designer;
    document.getElementById('lightbox-team').textContent = imageData.team;
    document.getElementById('lightbox-area').textContent = imageData.area;
    
    // Build thumbnails
    const thumbnailsContainer = document.getElementById('lightbox-thumbnails');
    thumbnailsContainer.innerHTML = '';
    
    currentThumbnailImages.forEach((img, idx) => {
        const thumbnail = document.createElement('div');
        thumbnail.className = 'thumbnail-item';
        if (idx === index) {
            thumbnail.classList.add('active');
        }
        thumbnail.innerHTML = `<img src="${basePath + img.src}" alt="Thumbnail ${idx + 1}">`;
        thumbnail.onclick = () => {
            currentImageIndex = idx;
            updateLightboxContent(idx);
        };
        thumbnailsContainer.appendChild(thumbnail);
    });
}

function closeLightbox() {
    const lightbox = document.getElementById('lightbox');
    lightbox.style.display = 'none';
    document.body.style.overflow = '';
}

// Add click event to all gallery items
document.querySelectorAll('.gallery-item').forEach(item => {
    item.addEventListener('click', function() {
        openLightbox(this);
    });
});

// Close lightbox with Escape key
document.addEventListener('keydown', function(event) {
    if (event.key === 'Escape') {
        closeLightbox();
    }
});

</script>

<?= $this->endSection() ?>