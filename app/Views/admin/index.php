<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>FB Design Studio | Admin</title>

<link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@300;400;500;600&family=Outfit:wght@200;300;400;500;600&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon/fonts/remixicon.css">

<style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

html {
    scroll-behavior: smooth;
}

body {
    background: #f4f1ec;
    font-family: 'Outfit', sans-serif;
    overflow-x: hidden;
    color: #111;
}

/* BACKGROUND GLOW */
body::before {
    content: "";
    position: fixed;
    inset: 0;
    background: radial-gradient(circle at top left, rgba(0,0,0,0.02), transparent 35%),
                radial-gradient(circle at bottom right, rgba(201,169,110,0.08), transparent 35%);
    pointer-events: none;
    z-index: -1;
}

/* HEADER */
.admin-header {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    z-index: 999999;
    padding: 28px 5%;
    display: flex;
    justify-content: space-between;
    align-items: center;
    transition: 0.7s cubic-bezier(.19,1,.22,1);
    background: rgba(244, 241, 236, 0.55);
    backdrop-filter: blur(18px);
    border-bottom: 1px solid rgba(0, 0, 0, 0.05);
}

.admin-header.scrolled {
    background: rgba(244, 241, 236, 0.82);
    padding: 22px 5%;
    box-shadow: 0 10px 40px rgba(0, 0, 0, 0.04);
}

/* LOGO */
.admin-logo {
    display: flex;
    flex-direction: column;
}

.admin-logo span {
    font-size: 11px;
    letter-spacing: 0.45em;
    color: #777;
}

.admin-logo h1 {
    font-size: 24px;
    font-family: 'Cormorant Garamond', serif;
    font-weight: 400;
    color: #1a1a1a;
}

/* DESKTOP BUTTONS */
.header-actions {
    display: flex;
    gap: 16px;
    align-items: center;
}

.action-btn-top {
    height: 52px;
    padding: 0 28px;
    border-radius: 100px;
    border: none;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
    cursor: pointer;
    text-decoration: none;
    font-size: 10px;
    letter-spacing: 0.28em;
    text-transform: uppercase;
    transition: 0.5s;
    position: relative;
    overflow: hidden;
}

.action-btn-top::before {
    content: "";
    position: absolute;
    top: 0;
    left: -120%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255,255,255,0.3), transparent);
    transition: 0.8s;
}

.action-btn-top:hover::before {
    left: 120%;
}

.primary-btn {
    background: #111;
    color: white;
}

.primary-btn:hover {
    transform: translateY(-3px);
    background: #2a2a2a;
}

.light-btn {
    background: rgba(255, 255, 255, 0.6);
    color: #111;
    border: 1px solid rgba(0, 0, 0, 0.05);
}

.light-btn:hover {
    transform: translateY(-3px);
    background: rgba(255, 255, 255, 0.8);
}

.logout-btn {
    background: #d94b4b;
    color: white;
}

.logout-btn:hover {
    background: #c03939;
    transform: translateY(-3px);
}

/* ANIMATED MENU BUTTON - 3 LINES TURNS INTO X */
.menu-btn {
    width: 52px;
    height: 52px;
    border-radius: 50%;
    display: none;
    justify-content: center;
    align-items: center;
    cursor: pointer;
    border: 1px solid rgba(0, 0, 0, 0.08);
    backdrop-filter: blur(14px);
    background: rgba(255, 255, 255, 0.6);
    transition: all 0.5s ease;
    z-index: 1000000;
}

.menu-btn i {
    color: #111;
    font-size: 22px;
    transition: all 0.3s ease;
}

.menu-btn.active {
    background: #111;
    transform: rotate(90deg);
}

.menu-btn.active i {
    color: white;
}

.menu-btn:hover {
    transform: rotate(90deg);
    background: rgba(255, 255, 255, 0.8);
}

.menu-btn.active:hover {
    background: #333;
}

/* LEFT SIDEBAR */
.sidebar {
    position: fixed;
    top: 0;
    left: 0;
    width: 280px;
    height: 100vh;
    background: rgba(245, 242, 236, 0.98);
    backdrop-filter: blur(24px);
    z-index: 100000;
    transform: translateX(-100%);
    transition: transform 0.5s cubic-bezier(0.4, 0, 0.2, 1);
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: flex-start;
    padding: 80px 30px;
    gap: 25px;
    border-right: 1px solid rgba(0, 0, 0, 0.06);
}

.sidebar.active {
    transform: translateX(0);
}

.sidebar a, .sidebar button {
    text-decoration: none;
    color: #111;
    font-size: 22px;
    font-family: 'Cormorant Garamond', serif;
    font-weight: 300;
    background: none;
    border: none;
    cursor: pointer;
    padding: 10px 0;
    text-align: left;
    width: 100%;
    transition: 0.3s;
}

.sidebar a:hover, .sidebar button:hover {
    transform: translateX(8px);
    opacity: 0.6;
}

.sidebar a:last-child {
    color: #d94b4b;
}

/* Overlay */
.overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.3);
    z-index: 99999;
    opacity: 0;
    visibility: hidden;
    transition: all 0.3s ease;
}

.overlay.active {
    opacity: 1;
    visibility: visible;
}

/* MAIN CONTAINER */
.container {
    width: 90%;
    max-width: 1400px;
    margin: auto;
    padding-top: 130px;
    padding-bottom: 80px;
}

/* PAGE TITLE */
.page-header {
    margin-bottom: 60px;
    text-align: center;
}

.page-header h1 {
    font-family: 'Cormorant Garamond', serif;
    font-size: 56px;
    font-weight: 300;
    letter-spacing: 0.02em;
    color: #1a1a1a;
}

.page-header p {
    color: #777;
    font-size: 13px;
    letter-spacing: 0.2em;
    text-transform: uppercase;
    margin-top: 10px;
}

/* PROJECTS GRID */
.projects-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(380px, 1fr));
    gap: 34px;
}

/* PROJECT CARD */
.project-card {
    background: rgba(255, 255, 255, 0.72);
    backdrop-filter: blur(18px);
    border: 1px solid rgba(0, 0, 0, 0.05);
    border-radius: 30px;
    overflow: hidden;
    transition: 0.5s cubic-bezier(.19,1,.22,1);
}

.project-card:hover {
    transform: translateY(-8px);
    border-color: rgba(0, 0, 0, 0.1);
    box-shadow: 0 25px 50px rgba(0, 0, 0, 0.08);
}

/* CARD IMAGE */
.card-image {
    width: 100%;
    height: 300px;
    overflow: hidden;
}

.card-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: 1.2s cubic-bezier(.19,1,.22,1);
}

.project-card:hover .card-image img {
    transform: scale(1.06);
}

/* CARD CONTENT */
.card-content {
    padding: 28px;
}

.card-content h2 {
    font-family: 'Cormorant Garamond', serif;
    font-size: 34px;
    font-weight: 300;
    color: #1a1a1a;
    margin-bottom: 12px;
}

.location {
    color: #777;
    font-size: 10px;
    letter-spacing: 0.18em;
    text-transform: uppercase;
    margin-bottom: 16px;
    display: flex;
    align-items: center;
    gap: 6px;
}

.description {
    color: #555;
    line-height: 1.7;
    font-size: 14px;
    margin-bottom: 20px;
}

/* GALLERY PREVIEW */
.gallery-preview {
    display: flex;
    gap: 10px;
    overflow-x: auto;
    padding-bottom: 8px;
    margin-bottom: 20px;
}

.gallery-preview::-webkit-scrollbar {
    height: 4px;
}

.gallery-preview::-webkit-scrollbar-track {
    background: rgba(0, 0, 0, 0.05);
    border-radius: 10px;
}

.gallery-preview::-webkit-scrollbar-thumb {
    background: rgba(0, 0, 0, 0.2);
    border-radius: 10px;
}

.gallery-preview img {
    width: 85px;
    height: 85px;
    object-fit: cover;
    border-radius: 16px;
    border: 1px solid rgba(0, 0, 0, 0.05);
    flex-shrink: 0;
    transition: 0.3s;
    cursor: pointer;
}

.gallery-preview img:hover {
    transform: translateY(-4px) scale(1.04);
}

/* CARD ACTIONS */
.card-actions {
    display: flex;
    gap: 12px;
    margin-top: 20px;
}

.action-btn {
    flex: 1;
    padding: 12px;
    text-align: center;
    text-decoration: none;
    font-size: 10px;
    letter-spacing: 0.18em;
    text-transform: uppercase;
    border-radius: 100px;
    transition: 0.4s;
    background: rgba(0, 0, 0, 0.04);
    color: #111;
    border: 1px solid rgba(0, 0, 0, 0.05);
}

.edit-btn:hover {
    background: #111;
    color: white;
    transform: translateY(-3px);
}

.delete-btn {
    color: #d94b4b;
    border-color: rgba(217, 75, 75, 0.15);
    background: rgba(217, 75, 75, 0.05);
}

.delete-btn:hover {
    background: rgba(217, 75, 75, 0.12);
    transform: translateY(-3px);
}

/* EMPTY STATE */
.empty-state {
    text-align: center;
    padding: 100px 20px;
    background: rgba(255, 255, 255, 0.5);
    border-radius: 30px;
    border: 1px solid rgba(0, 0, 0, 0.05);
}

.empty-state i {
    font-size: 70px;
    color: #111;
    margin-bottom: 20px;
    opacity: 0.4;
}

.empty-state h2 {
    font-family: 'Cormorant Garamond', serif;
    font-size: 48px;
    font-weight: 300;
    color: #1a1a1a;
    margin-bottom: 12px;
}

.empty-state p {
    color: #777;
    font-size: 14px;
}

/* LOGO POPUP */
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

.popup-box {
    width: 420px;
    padding: 40px;
    border-radius: 30px;
    background: rgba(255, 255, 255, 0.95);
    backdrop-filter: blur(24px);
    border: 1px solid rgba(0, 0, 0, 0.05);
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
    width: 40px;
    height: 40px;
    border-radius: 50%;
    background: rgba(0, 0, 0, 0.05);
    border: none;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: 0.3s;
}

.close-popup:hover {
    transform: rotate(90deg);
    background: rgba(0, 0, 0, 0.1);
}

.popup-box h2 {
    font-family: 'Cormorant Garamond', serif;
    font-size: 32px;
    font-weight: 300;
    color: #1a1a1a;
    margin-bottom: 25px;
}

.popup-logo-preview {
    width: 120px;
    height: 120px;
    border-radius: 20px;
    overflow: hidden;
    margin-bottom: 25px;
    background: #f4f1ec;
    display: flex;
    align-items: center;
    justify-content: center;
    border: 1px solid rgba(0, 0, 0, 0.05);
}

.popup-logo-preview img {
    width: 100%;
    height: 100%;
    object-fit: contain;
}

.popup-box input {
    width: 100%;
    margin-bottom: 20px;
    padding: 14px;
    border-radius: 100px;
    border: 1px solid rgba(0, 0, 0, 0.1);
    background: rgba(255, 255, 255, 0.8);
    font-family: 'Outfit', sans-serif;
}

.popup-save-btn {
    width: 100%;
    padding: 14px;
    border: none;
    border-radius: 100px;
    cursor: pointer;
    font-weight: 500;
    transition: 0.4s;
    background: #111;
    color: white;
    letter-spacing: 0.1em;
}

.popup-save-btn:hover {
    transform: translateY(-3px);
    background: #2a2a2a;
}

/* MOBILE RESPONSIVE */
@media (max-width: 900px) {
    .header-actions {
        display: none;
    }
    
    .menu-btn {
        display: flex;
    }
    
    .admin-header {
        padding: 18px 6%;
    }
    
    .admin-logo h1 {
        font-size: 20px;
    }
    
    .admin-logo span {
        font-size: 9px;
    }
    
    .container {
        padding-top: 110px;
        width: 88%;
    }
    
    .projects-grid {
        grid-template-columns: 1fr;
    }
    
    .card-content h2 {
        font-size: 30px;
    }
    
    .page-header h1 {
        font-size: 42px;
    }
}

@media (max-width: 550px) {
    .popup-box {
        width: 90%;
        padding: 30px 20px;
    }
    
    .popup-box h2 {
        font-size: 28px;
    }
    
    .page-header h1 {
        font-size: 36px;
    }
}
</style>

</head>

<body>

<!-- Overlay -->
<div class="overlay" id="overlay"></div>

<!-- LEFT SIDEBAR -->
<div class="sidebar" id="sidebar">
    <a href="/admin/create" onclick="closeSidebar()">Add Project</a>
    <button onclick="openLogoPopup(); closeSidebar();" style="background:none; border:none; cursor:pointer; text-align:left;">Change Logo</button>
    <a href="/admin/logout" onclick="closeSidebar()" style="color:#d94b4b;">Logout</a>
</div>

<!-- HEADER -->
<header class="admin-header" id="adminHeader">
    <div class="admin-logo">
        <span>FB DESIGN STUDIO</span>
        <h1>Admin Panel</h1>
    </div>

    <div class="header-actions">
        <a href="/admin/create" class="action-btn-top primary-btn">
            <i class="ri-add-line"></i>
            Add Project
        </a>
        <button class="action-btn-top light-btn" onclick="openLogoPopup()">
            <i class="ri-image-line"></i>
            Change Logo
        </button>
        <a href="/admin/logout" class="action-btn-top logout-btn">
            <i class="ri-logout-box-line"></i>
            Logout
        </a>
    </div>

    <div class="menu-btn" id="menuBtn">
        <i class="ri-menu-3-line"></i>
    </div>
</header>

<!-- MAIN CONTENT -->
<div class="container">
    <div class="page-header">
        <h1>Projects</h1>
        <p>Manage your interior design portfolio</p>
    </div>

    <?php if(!empty($projects)): ?>
    <div class="projects-grid">
        <?php foreach($projects as $project): ?>
        <div class="project-card">
            <?php if(!empty($project['image'])): ?>
            <div class="card-image">
                <img src="<?= base_url('uploads/projects/' . basename($project['image'])) ?>" alt="">
            </div>
            <?php endif; ?>
            
            <div class="card-content">
                <h2><?= esc((string)$project['title']) ?></h2>
                <div class="location">
                    <i class="ri-map-pin-line"></i>
                    <?= esc((string)$project['location']) ?>
                </div>
                <p class="description"><?= esc((string)$project['description']) ?></p>
                
                <?php if(!empty($project['gallery'])): ?>
                <div class="gallery-preview">
                    <?php
                    $gallery = json_decode($project['gallery'], true);
                    if(is_array($gallery)):
                        foreach(array_slice($gallery, 0, 4) as $image):
                    ?>
                    <img src="<?= base_url('uploads/projects/' . basename($image)) ?>" alt="">
                    <?php endforeach; endif; ?>
                </div>
                <?php endif; ?>
                
                <div class="card-actions">
                    <a href="/admin/edit/<?= $project['id'] ?>" class="action-btn edit-btn">Edit</a>
                    <a href="/admin/delete/<?= $project['id'] ?>" class="action-btn delete-btn" onclick="return confirm('Delete this project?')">Delete</a>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
    <?php else: ?>
    <div class="empty-state">
        <i class="ri-gallery-line"></i>
        <h2>No Projects Found</h2>
        <p>Upload your first architecture project</p>
    </div>
    <?php endif; ?>
</div>

<!-- LOGO POPUP -->
<div class="logo-popup" id="logoPopup">
    <div class="popup-box">
        <button class="close-popup" onclick="closeLogoPopup()">
            <i class="ri-close-line"></i>
        </button>
        <h2>Website Logo</h2>
        <?php
        use App\Models\SettingModel;
        $settingModel = new SettingModel();
        $settings = $settingModel->first();
        ?>
        <?php if(!empty($settings['site_logo'])): ?>
        <div class="popup-logo-preview">
            <img src="<?= base_url('uploads/' . $settings['site_logo']) ?>" alt="">
        </div>
        <?php endif; ?>
        <form action="<?= base_url('admin/logo/update') ?>" method="POST" enctype="multipart/form-data">
            <input type="file" name="site_logo" required>
            <button type="submit" class="popup-save-btn">Update Logo</button>
        </form>
    </div>
</div>

<script>
// Get elements
const menuBtn = document.getElementById('menuBtn');
const sidebar = document.getElementById('sidebar');
const overlay = document.getElementById('overlay');

// Function to close sidebar
function closeSidebar() {
    sidebar.classList.remove('active');
    overlay.classList.remove('active');
    menuBtn.classList.remove('active');
    menuBtn.innerHTML = '<i class="ri-menu-3-line"></i>';
    document.body.style.overflow = '';
}

// Function to open sidebar
function openSidebar() {
    sidebar.classList.add('active');
    overlay.classList.add('active');
    menuBtn.classList.add('active');
    menuBtn.innerHTML = '<i class="ri-close-line"></i>';
    document.body.style.overflow = 'hidden';
}

// Toggle function
function toggleSidebar() {
    if (sidebar.classList.contains('active')) {
        closeSidebar();
    } else {
        openSidebar();
    }
}

// Add click event to menu button
menuBtn.onclick = toggleSidebar;

// Overlay click closes sidebar
overlay.onclick = closeSidebar;

// Logo Popup Functions
function openLogoPopup() {
    document.getElementById('logoPopup').style.display = 'flex';
}

function closeLogoPopup() {
    document.getElementById('logoPopup').style.display = 'none';
}

// Close with Escape key
document.addEventListener('keydown', function(event) {
    if (event.key === 'Escape') {
        closeSidebar();
        closeLogoPopup();
    }
});

// Header scroll effect
window.addEventListener('scroll', function() {
    const header = document.getElementById('adminHeader');
    if (window.scrollY > 40) {
        header.classList.add('scrolled');
    } else {
        header.classList.remove('scrolled');
    }
});
</script>

</body>
</html>