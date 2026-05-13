<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta
name="viewport"
content="width=device-width, initial-scale=1.0"
>

<title>
FB Design Studio Admin
</title>

<link
rel="stylesheet"
href="https://cdn.jsdelivr.net/npm/remixicon/fonts/remixicon.css"
>

<link
href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600&family=Cormorant+Garamond:wght@300;400;500;600;700&display=swap"
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
    color:#111;
    font-family:'Outfit',sans-serif;
    overflow-x:hidden;
}

.container{
    width:92%;
    max-width:1500px;
    margin:auto;
    padding:50px 0;
    transition: all 0.3s ease;
}

/* HEADER STYLES */
.admin-header {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    z-index: 9999;
    padding: 20px 5%;
    display: flex;
    justify-content: space-between;
    align-items: center;
    transition: 0.5s;
    backdrop-filter: blur(18px);
    background: rgba(244, 241, 236, 0.55);
    border-bottom: 1px solid rgba(0, 0, 0, 0.05);
}

.admin-header h1 {
    font-size: 20px;
    font-weight: 300;
    font-family: 'Cormorant Garamond', serif;
    letter-spacing: 0.03em;
    color: #1a1a1a;
}

/* Menu Button - 3 Lines (Hidden on Desktop, Visible on Mobile) */
.menu-btn {
    width: 56px;
    height: 56px;
    display: none;
    justify-content: center;
    align-items: center;
    border-radius: 50%;
    cursor: pointer;
    border: 1px solid rgba(0, 0, 0, 0.08);
    transition: 0.4s;
    background: transparent;
    position: relative;
    z-index: 10001;
}

.menu-btn:hover {
    transform: rotate(90deg);
    background: rgba(0, 0, 0, 0.02);
}

.menu-btn i {
    font-size: 24px;
    color: #111;
}

/* LEFT SIDEBAR - Compact */
.sidebar {
    position: fixed;
    top: 0;
    left: 0;
    width: 320px;
    height: 100vh;
    background: rgba(245, 242, 236, 0.98);
    backdrop-filter: blur(18px);
    z-index: 10000;
    transform: translateX(-100%);
    transition: transform 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: flex-start;
    padding: 80px 40px;
    gap: 30px;
    box-shadow: 2px 0 20px rgba(0, 0, 0, 0.05);
}

.sidebar.active {
    transform: translateX(0);
}

/* Sidebar Links */
.sidebar a, .sidebar button {
    text-decoration: none;
    color: #111;
    font-size: 22px;
    font-family: 'Outfit', sans-serif;
    font-weight: 400;
    transition: 0.3s;
    background: none;
    border: none;
    cursor: pointer;
    padding: 12px 20px;
    text-align: left;
    width: 100%;
    letter-spacing: 0.05em;
    border-radius: 12px;
    opacity: 0;
    transform: translateX(-20px);
    transition: all 0.3s ease;
}

.sidebar.active a, 
.sidebar.active button {
    opacity: 1;
    transform: translateX(0);
}

.sidebar a:nth-child(1) { transition-delay: 0.05s; }
.sidebar a:nth-child(2) { transition-delay: 0.1s; }
.sidebar button:nth-child(3) { transition-delay: 0.15s; }
.sidebar a:nth-child(4) { transition-delay: 0.2s; }

.sidebar a:hover, .sidebar button:hover {
    background: rgba(0, 0, 0, 0.05);
    transform: translateX(5px);
}

.sidebar a:last-child {
    color: #d94b4b;
}

.sidebar a:last-child:hover {
    background: rgba(217, 75, 75, 0.1);
}

/* Close Button in Sidebar */
.close-sidebar {
    position: absolute;
    top: 20px;
    right: 20px;
    cursor: pointer;
    width: 40px;
    height: 40px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 50%;
    transition: 0.3s;
    background: rgba(0, 0, 0, 0.03);
}

.close-sidebar:hover {
    transform: rotate(90deg);
    background: rgba(0, 0, 0, 0.08);
}

.close-sidebar i {
    font-size: 24px;
    color: #111;
}

/* Desktop Buttons - Visible on Desktop */
.desktop-buttons {
    display: flex;
    gap: 16px;
    align-items: center;
}

/* Main Content */
.main-content {
    margin-top: 100px;
    transition: all 0.3s ease;
}

/* GRID */
.projects-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(360px, 1fr));
    gap: 34px;
}

/* CARD */
.project-card {
    background: rgba(255, 255, 255, 0.72);
    border: 1px solid rgba(0, 0, 0, 0.05);
    border-radius: 30px;
    overflow: hidden;
    transition: 0.5s;
    backdrop-filter: blur(18px);
}

.project-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 20px 50px rgba(0, 0, 0, 0.08);
}

/* MAIN IMAGE */
.project-main-image {
    width: 100%;
    height: 320px;
    overflow: hidden;
}

.project-main-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
    transition: 1s cubic-bezier(.19, 1, .22, 1);
}

.project-card:hover .project-main-image img {
    transform: scale(1.04);
}

/* CONTENT */
.project-content {
    padding: 28px;
}

.project-content h2 {
    font-size: 38px;
    margin-bottom: 14px;
    color: #1a1a1a;
    font-weight: 300;
    font-family: 'Cormorant Garamond', serif;
}

.location {
    color: #777;
    margin-bottom: 16px;
    font-size: 13px;
    letter-spacing: 0.18em;
    text-transform: uppercase;
}

.description {
    color: #555;
    line-height: 2;
    font-size: 15px;
}

/* GALLERY */
.gallery-preview {
    margin-top: 24px;
    display: flex;
    gap: 10px;
    overflow-x: auto;
    padding-bottom: 5px;
}

.gallery-preview::-webkit-scrollbar {
    height: 4px;
}

.gallery-preview::-webkit-scrollbar-thumb {
    background: #bbb;
    border-radius: 20px;
}

.gallery-preview img {
    width: 90px;
    height: 90px;
    object-fit: cover;
    border-radius: 16px;
    flex-shrink: 0;
    border: 1px solid rgba(0, 0, 0, 0.04);
}

/* ACTIONS */
.project-actions {
    margin-top: 24px;
    display: flex;
    gap: 14px;
}

.action-btn {
    flex: 1;
    padding: 14px;
    border-radius: 18px;
    text-align: center;
    text-decoration: none;
    transition: 0.4s;
    font-size: 12px;
    letter-spacing: 0.14em;
    text-transform: uppercase;
}

.delete-btn {
    background: rgba(255, 0, 0, 0.05);
    color: #d94b4b;
    border: 1px solid rgba(255, 0, 0, 0.08);
}

.delete-btn:hover {
    background: rgba(255, 0, 0, 0.1);
}

/* EMPTY */
.empty-state {
    text-align: center;
    padding: 120px 20px;
    color: #666;
}

.empty-state i {
    font-size: 70px;
    margin-bottom: 20px;
    color: #111;
}

.empty-state h2 {
    font-size: 42px;
    font-weight: 300;
    margin-bottom: 12px;
    color: #1a1a1a;
    font-family: 'Cormorant Garamond', serif;
}

/* Desktop Buttons Styling */
.add-btn {
    background: #111;
    color: white;
    padding: 14px 28px;
    text-decoration: none;
    border-radius: 100px;
    font-weight: 500;
    letter-spacing: 0.18em;
    transition: 0.4s;
    border: none;
    font-size: 11px;
    text-transform: uppercase;
    display: flex;
    justify-content: center;
    align-items: center;
    cursor: pointer;
}

.add-btn:hover {
    transform: translateY(-3px);
    background: #2a2a2a;
}

.logout-btn {
    background: #d94b4b;
}

.logout-btn:hover {
    background: #c03939;
}

/* Overlay when sidebar is open */
.overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.3);
    z-index: 9998;
    opacity: 0;
    visibility: hidden;
    transition: all 0.3s ease;
}

.overlay.active {
    opacity: 1;
    visibility: visible;
}

/* MOBILE RESPONSIVE - Show 3-line menu only on mobile */
@media (max-width: 900px) {
    /* Hide desktop buttons on mobile */
    .desktop-buttons {
        display: none;
    }
    
    /* Show mobile menu button on mobile */
    .menu-btn {
        display: flex;
    }
    
    .admin-header h1 {
        font-size: 16px;
    }
    
    .container {
        padding: 30px 0;
    }
    
    .main-content {
        margin-top: 90px;
    }
    
    .projects-grid {
        grid-template-columns: 1fr;
    }
    
    .project-content h2 {
        font-size: 30px;
    }
    
    .sidebar {
        width: 280px;
        padding: 70px 25px;
    }
    
    .sidebar a, .sidebar button {
        font-size: 18px;
        padding: 10px 16px;
    }
}

/* Tablet */
@media (min-width: 901px) and (max-width: 1024px) {
    .projects-grid {
        grid-template-columns: repeat(2, 1fr);
    }
}

/* Desktop - 3-line menu hidden */
@media (min-width: 901px) {
    .menu-btn {
        display: none !important;
    }
    
    .desktop-buttons {
        display: flex !important;
    }
}

</style>

</head>

<body>

<!-- Overlay -->
<div class="overlay" id="overlay" onclick="closeSidebar()"></div>

<!-- LEFT SIDEBAR - Compact -->
<div class="sidebar" id="sidebar">
    <!-- Close Button -->
    <div class="close-sidebar" onclick="closeSidebar()">
        <i class="ri-close-line"></i>
    </div>
    
    <!-- Menu Items -->
    <a href="/admin/create" onclick="closeSidebar()">
        <i class="ri-add-line" style="margin-right: 12px;"></i> Add Project
    </a>
    <button onclick="openLogoPopup(); closeSidebar();" style="background:none; border:none; cursor:pointer; text-align:left;">
        <i class="ri-image-line" style="margin-right: 12px;"></i> Change Logo
    </button>
    <a href="/admin/logout" onclick="closeSidebar()" style="color:#d94b4b;">
        <i class="ri-logout-box-line" style="margin-right: 12px;"></i> Logout
    </a>
</div>

<!-- FIXED HEADER -->
<header class="admin-header">
    <h1>FB DESIGN STUDIO / ADMIN</h1>
    
    <!-- Desktop Buttons (visible on large screens) -->
    <div class="desktop-buttons">
        <a href="/admin/create" class="add-btn">Add Project</a>
        <button class="add-btn" onclick="openLogoPopup()" style="border:none; cursor:pointer;">Change Logo</button>
        <a href="/admin/logout" class="add-btn logout-btn">Logout</a>
    </div>
    
    <!-- Menu Button (3 lines) - Only shows on mobile -->
    <div class="menu-btn" onclick="openSidebar()">
        <i class="ri-menu-3-line"></i>
    </div>
</header>

<!-- MAIN CONTENT -->
<div class="main-content">
<div class="container">

<!-- PROJECTS -->
<?php if(!empty($projects)): ?>

<div class="projects-grid">

<?php foreach($projects as $project): ?>

<div class="project-card">

<!-- MAIN IMAGE -->
<?php if(!empty($project['image'])): ?>
<div class="project-main-image">
    <img src="<?= base_url('uploads/projects/' . basename($project['image'])) ?>" alt="">
</div>
<?php endif; ?>

<!-- CONTENT -->
<div class="project-content">
    <h2><?= esc((string)$project['title']) ?></h2>
    <div class="location">
        <i class="ri-map-pin-line"></i>
        <?= esc((string)$project['location']) ?>
    </div>
    <p class="description"><?= esc((string)$project['description']) ?></p>

    <!-- GALLERY -->
    <?php if(!empty($project['gallery'])): ?>
    <div class="gallery-preview">
        <?php
        $gallery = json_decode($project['gallery'], true);
        if(is_array($gallery)):
            foreach($gallery as $image):
        ?>
        <img src="<?= base_url('uploads/projects/' . basename($image)) ?>" alt="">
        <?php endforeach; endif; ?>
    </div>
    <?php endif; ?>

    <!-- ACTIONS -->
    <div class="project-actions">
        <a href="/admin/delete/<?= $project['id'] ?>" class="action-btn delete-btn" onclick="return confirm('Delete this project?')">Delete</a>
        <a href="/admin/edit/<?= $project['id'] ?>" class="action-btn" style="background:rgba(0,0,0,0.04); color:#111; border:1px solid rgba(0,0,0,0.05);">Edit</a>
    </div>
</div>

</div>

<?php endforeach; ?>

</div>

<?php else: ?>

<!-- EMPTY STATE -->
<div class="empty-state">
    <i class="ri-gallery-line"></i>
    <h2>No Projects Found</h2>
    <p>Upload your first architecture project.</p>
</div>

<?php endif; ?>

</div>
</div>

<!-- LOGO POPUP -->
<?php
use App\Models\SettingModel;
$settingModel = new SettingModel();
$setting = $settingModel->first();
?>

<div class="logo-popup" id="logoPopup">
    <div class="logo-popup-box">
        <button class="close-popup" onclick="closeLogoPopup()">
            <i class="ri-close-line"></i>
        </button>
        <h2>Website Logo</h2>
        <?php if(!empty($setting['site_logo'])): ?>
        <div class="popup-logo-preview">
            <img src="<?= base_url('uploads/' . $setting['site_logo']) ?>" alt="">
        </div>
        <?php endif; ?>
        <form action="<?= base_url('admin/logo/update') ?>" method="POST" enctype="multipart/form-data">
            <input type="file" name="site_logo" required>
            <button type="submit" class="popup-save-btn">Update Logo</button>
        </form>
    </div>
</div>

<style>
/* POPUP */
.logo-popup {
    position: fixed;
    inset: 0;
    background: rgba(0, 0, 0, 0.62);
    backdrop-filter: blur(14px);
    display: none;
    justify-content: center;
    align-items: center;
    z-index: 9999999;
}

.logo-popup-box {
    width: 420px;
    padding: 40px;
    border-radius: 34px;
    background: rgb(220 220 220 / 72%);
    border: 1px solid rgba(255, 255, 255, 0.06);
    backdrop-filter: blur(24px);
    position: relative;
    animation: popupShow 0.4s ease;
}

@keyframes popupShow {
    from {
        opacity: 0;
        transform: translateY(40px) scale(0.95);
    }
    to {
        opacity: 1;
        transform: translateY(0) scale(1);
    }
}

.close-popup {
    position: absolute;
    top: 20px;
    right: 20px;
    width: 46px;
    height: 46px;
    border-radius: 50%;
    background: rgba(0, 0, 0, 0.06);
    border: none;
    color: #111;
    cursor: pointer;
    display: flex;
    justify-content: center;
    align-items: center;
    transition: 0.4s;
}

.close-popup:hover {
    transform: rotate(90deg);
    background: white;
}

.close-popup i {
    font-size: 32px;
}

.logo-popup-box h2 {
    font-size: 38px;
    font-weight: 300;
    color: #f3e7d6;
    margin-bottom: 30px;
}

.popup-logo-preview {
    width: 130px;
    height: 130px;
    border-radius: 24px;
    overflow: hidden;
    margin-bottom: 28px;
    background: rgba(255, 255, 255, 0.04);
    display: flex;
    justify-content: center;
    align-items: center;
}

.popup-logo-preview img {
    width: 100%;
    height: 100%;
    object-fit: contain;
}

.logo-popup-box input {
    width: 100%;
    margin-bottom: 20px;
    padding: 14px;
    border-radius: 14px;
    border: none;
    background: rgba(255, 255, 255, 0.06);
    color: white;
}

.popup-save-btn {
    width: 100%;
    padding: 16px;
    border: none;
    border-radius: 100px;
    cursor: pointer;
    font-weight: 600;
    transition: 0.4s;
    background: linear-gradient(135deg, #5c574f, #f8f4ee);
    color: #111;
    margin-bottom: 14px;
}

.popup-save-btn:hover {
    transform: translateY(-3px);
}

@media (max-width: 550px) {
    .logo-popup-box {
        width: 90%;
        padding: 30px 20px;
    }
    .logo-popup-box h2 {
        font-size: 28px;
    }
}
</style>

<script>
function openLogoPopup() {
    document.getElementById('logoPopup').style.display = 'flex';
}

function closeLogoPopup() {
    document.getElementById('logoPopup').style.display = 'none';
}

function openSidebar() {
    document.getElementById('sidebar').classList.add('active');
    document.getElementById('overlay').classList.add('active');
    document.body.style.overflow = 'hidden';
}

function closeSidebar() {
    document.getElementById('sidebar').classList.remove('active');
    document.getElementById('overlay').classList.remove('active');
    document.body.style.overflow = '';
}

// Close sidebar with Escape key
document.addEventListener('keydown', function(event) {
    if (event.key === 'Escape') {
        closeSidebar();
    }
});

// Header scroll effect
window.addEventListener('scroll', function() {
    const header = document.querySelector('.admin-header');
    if (window.scrollY > 40) {
        header.style.padding = '16px 5%';
        header.style.background = 'rgba(244, 241, 236, 0.82)';
    } else {
        header.style.padding = '20px 5%';
        header.style.background = 'rgba(244, 241, 236, 0.55)';
    }
});
</script>

</body>
</html>