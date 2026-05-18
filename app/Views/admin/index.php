<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0">

    <title>
        FB Design Studio | Admin Dashboard
    </title>

    <link
        href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@300;400;500;600&family=Outfit:wght@200;300;400;500;600&display=swap"
        rel="stylesheet">

    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/remixicon/fonts/remixicon.css">

    <style>
        /* RESET */

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

            position: relative;
        }

        /* BACKGROUND */

        body::before {
            content: "";

            position: fixed;

            inset: 0;

            background:
                radial-gradient(circle at top left,
                    rgba(0, 0, 0, 0.02),
                    transparent 35%),

                radial-gradient(circle at bottom right,
                    rgba(201, 169, 110, 0.08),
                    transparent 35%);

            pointer-events: none;

            z-index: -2;
        }

        /* GRAIN */

        .grain {
            position: fixed;

            inset: 0;

            pointer-events: none;

            opacity: 0.03;

            z-index: 999999;

            background-image:
                radial-gradient(rgba(0, 0, 0, 0.04) 1px,
                    transparent 1px);

            background-size: 4px 4px;
        }

        /* HEADER */

        .admin-header {
            position: fixed;

            top: 0;
            left: 0;

            width: 100%;

            z-index: 999999;

            padding: 26px 5%;

            display: flex;

            justify-content: space-between;

            align-items: center;

            transition: 0.7s cubic-bezier(.19, 1, .22, 1);

            background:
                rgba(244, 241, 236, 0.55);

            backdrop-filter: blur(18px);

            border-bottom:
                1px solid rgba(0, 0, 0, 0.05);
        }

        .admin-header.scrolled {
            background:
                rgba(244, 241, 236, 0.84);

            padding: 20px 5%;

            box-shadow:
                0 10px 40px rgba(0, 0, 0, 0.04);
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
            font-size: 26px;

            font-family: 'Cormorant Garamond', serif;

            font-weight: 400;

            color: #1a1a1a;
        }

        /* ACTIONS */

        .header-actions {
            display: flex;

            gap: 16px;

            align-items: center;
        }

        .action-btn-top {
            height: 54px;

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

            background:
                linear-gradient(90deg,
                    transparent,
                    rgba(255, 255, 255, 0.3),
                    transparent);

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
        }

        .light-btn {
            background:
                rgba(255, 255, 255, 0.7);

            color: #111;

            border:
                1px solid rgba(0, 0, 0, 0.05);
        }

        .light-btn:hover {
            transform: translateY(-3px);
        }

        .logout-btn {
            background: #d94b4b;
            color: white;
        }

        .logout-btn:hover {
            background: #c03939;

            transform: translateY(-3px);
        }

        /* MENU */

        .menu-btn {
            width: 54px;
            height: 54px;

            border-radius: 50%;

            display: none;

            justify-content: center;

            align-items: center;

            cursor: pointer;

            border:
                1px solid rgba(0, 0, 0, 0.08);

            backdrop-filter: blur(14px);

            background:
                rgba(255, 255, 255, 0.6);

            transition: all 0.5s ease;

            z-index: 1000000;
        }

        .menu-btn i {
            color: #111;

            font-size: 22px;
        }

        /* SIDEBAR */

        .sidebar {
            position: fixed;

            top: 0;
            left: 0;

            width: 280px;
            height: 100vh;

            background:
                rgba(245, 242, 236, 0.98);

            backdrop-filter: blur(24px);

            z-index: 100000;

            transform: translateX(-100%);

            transition:
                transform 0.5s cubic-bezier(0.4, 0, 0.2, 1);

            display: flex;

            flex-direction: column;

            justify-content: center;

            align-items: flex-start;

            padding: 80px 30px;

            gap: 25px;

            border-right:
                1px solid rgba(0, 0, 0, 0.06);
        }

        .sidebar.active {
            transform: translateX(0);
        }

        .sidebar a {
            text-decoration: none;

            color: #111;

            font-size: 24px;

            font-family: 'Cormorant Garamond', serif;

            font-weight: 300;

            transition: 0.3s;
        }

        .sidebar a:hover {
            transform: translateX(8px);

            opacity: 0.6;
        }

        /* OVERLAY */

        .overlay {
            position: fixed;

            top: 0;
            left: 0;

            width: 100%;
            height: 100%;

            background:
                rgba(0, 0, 0, 0.3);

            z-index: 99999;

            opacity: 0;

            visibility: hidden;

            transition: 0.3s;
        }

        .overlay.active {
            opacity: 1;
            visibility: visible;
        }

        /* CONTAINER */

        .container {
            width: 92%;

            max-width: 1600px;

            margin: auto;

            padding-top: 150px;

            padding-bottom: 100px;
        }

        /* HERO */

        .dashboard-hero {
            width: 100%;

            display: flex;

            justify-content: space-between;

            align-items: flex-end;

            gap: 40px;

            margin-bottom: 70px;
        }

        /* HERO LEFT */

        .hero-content {
            max-width: 760px;
        }

        .hero-label {
            display: inline-block;

            margin-bottom: 20px;

            font-size: 11px;

            letter-spacing: 0.35em;

            color: #777;
        }

        .hero-content h1 {
            font-size: 92px;

            line-height: 0.92;

            font-weight: 300;

            font-family: 'Cormorant Garamond', serif;

            letter-spacing: -0.05em;

            margin-bottom: 24px;

            color: #111;
        }

        .hero-content p {
            max-width: 620px;

            line-height: 2;

            color: #666;

            font-size: 15px;
        }

        /* HERO RIGHT */

        .hero-stats {
            display: flex;

            gap: 18px;
        }

        /* HERO CARD */

        .hero-card {
            min-width: 220px;

            padding: 34px;

            border-radius: 32px;

            background:
                rgba(255, 255, 255, 0.65);

            backdrop-filter: blur(24px);

            border:
                1px solid rgba(0, 0, 0, 0.05);

            box-shadow:
                0 20px 50px rgba(0, 0, 0, 0.04);
        }

        .hero-card h2 {
            font-size: 64px;

            font-weight: 300;

            font-family: 'Cormorant Garamond', serif;

            margin-bottom: 12px;
        }

        .hero-card span {
            font-size: 10px;

            letter-spacing: 0.22em;

            color: #777;
        }

        /* LIVE CARD */

        .live-card {
            display: flex;

            flex-direction: column;

            justify-content: center;
        }

        .live-dot {
            width: 12px;
            height: 12px;

            border-radius: 50%;

            background: #2ecc71;

            margin-bottom: 18px;

            animation: pulse 1.5s infinite;
        }

        .live-card h3 {
            font-size: 18px;

            letter-spacing: 0.08em;

            margin-bottom: 8px;
        }

        .live-card p {
            font-size: 13px;

            color: #777;
        }

        @keyframes pulse {

            0% {
                transform: scale(1);
                opacity: 1;
            }

            50% {
                transform: scale(1.5);
                opacity: 0.5;
            }

            100% {
                transform: scale(1);
                opacity: 1;
            }

        }

        /* PROJECT GRID */

        .projects-grid {
            display: grid;

            grid-template-columns:
                repeat(auto-fill,
                    minmax(380px, 1fr));

            gap: 34px;
        }

        /* CARD */

        .project-card {
            position: relative;

            background:
                rgba(255, 255, 255, 0.72);

            backdrop-filter: blur(18px);

            border:
                1px solid rgba(0, 0, 0, 0.05);

            border-radius: 34px;

            overflow: hidden;

            transition:
                0.5s cubic-bezier(.19, 1, .22, 1);
        }

        .project-card:hover {
            transform: translateY(-8px);

            border-color:
                rgba(0, 0, 0, 0.1);

            box-shadow:
                0 25px 50px rgba(0, 0, 0, 0.08);
        }

        .project-card::after {
            content: '';

            position: absolute;

            inset: 0;

            background:
                linear-gradient(to top,
                    rgba(0, 0, 0, 0.10),
                    transparent 40%);

            opacity: 0;

            transition: 0.5s;

            pointer-events: none;
        }

        .project-card:hover::after {
            opacity: 1;
        }

        /* STATUS */

        .project-status {
            position: absolute;

            top: 20px;
            right: 20px;

            z-index: 10;

            padding: 10px 18px;

            border-radius: 100px;

            background:
                rgba(255, 255, 255, 0.7);

            backdrop-filter: blur(12px);

            font-size: 10px;

            letter-spacing: 0.22em;

            border:
                1px solid rgba(0, 0, 0, 0.05);
        }

        /* IMAGE */

        .card-image {
            width: 100%;
            height: 320px;

            overflow: hidden;
        }

        .card-image img {
            width: 100%;
            height: 100%;

            object-fit: cover;

            transition: 1.2s cubic-bezier(.19, 1, .22, 1);
        }

        .project-card:hover .card-image img {
            transform: scale(1.06);
        }

        /* CONTENT */

        .card-content {
            padding: 30px;
        }

        .card-content h2 {
            font-family: 'Cormorant Garamond', serif;

            font-size: 38px;

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

            line-height: 1.8;

            font-size: 14px;

            margin-bottom: 22px;
        }

        /* GALLERY */

        .gallery-preview {
            display: flex;

            gap: 10px;

            overflow-x: auto;

            padding-bottom: 8px;

            margin-bottom: 22px;
        }

        .gallery-preview img {
            width: 90px;
            height: 90px;

            object-fit: cover;

            border-radius: 18px;

            border:
                1px solid rgba(0, 0, 0, 0.05);

            flex-shrink: 0;

            transition: 0.3s;
        }

        .gallery-preview img:hover {
            transform:
                translateY(-4px) scale(1.04);
        }

        /* ACTIONS */

        .card-actions {
            display: grid;

            grid-template-columns:
                repeat(2, 1fr);

            gap: 12px;

            margin-top: 20px;
        }

        .action-btn {
            padding: 14px;

            text-align: center;

            text-decoration: none;

            font-size: 10px;

            letter-spacing: 0.18em;

            text-transform: uppercase;

            border-radius: 100px;

            transition: 0.4s;

            background:
                rgba(0, 0, 0, 0.04);

            color: #111;

            border:
                1px solid rgba(0, 0, 0, 0.05);

            position: relative;

            overflow: hidden;
        }

        .action-btn::before {
            content: '';

            position: absolute;

            top: 0;
            left: -120%;

            width: 100%;
            height: 100%;

            background:
                linear-gradient(90deg,
                    transparent,
                    rgba(255, 255, 255, 0.3),
                    transparent);

            transition: 0.7s;
        }

        .action-btn:hover::before {
            left: 120%;
        }

        .edit-btn:hover {
            background: #111;

            color: white;

            transform: translateY(-3px);
        }

        .delete-btn {
            color: #d94b4b;

            border-color:
                rgba(217, 75, 75, 0.15);

            background:
                rgba(217, 75, 75, 0.05);
        }

        .delete-btn:hover {
            background:
                rgba(217, 75, 75, 0.12);

            transform: translateY(-3px);
        }

        /* EMPTY */

        .empty-state {
            text-align: center;

            padding: 120px 20px;

            background:
                rgba(255, 255, 255, 0.5);

            border-radius: 30px;

            border:
                1px solid rgba(0, 0, 0, 0.05);
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

        /* RESPONSIVE */

        @media(max-width:900px) {

            .header-actions {
                display: none;
            }

            .menu-btn {
                display: flex;
            }

            .container {
                padding-top: 120px;
            }

            .dashboard-hero {
                flex-direction: column;

                align-items: flex-start;
            }

            .hero-content h1 {
                font-size: 58px;
            }

            .hero-stats {
                width: 100%;

                flex-direction: column;
            }

            .projects-grid {
                grid-template-columns: 1fr;
            }

        }
    </style>

</head>

<body>

    <div class="grain"></div>

    <div class="overlay" id="overlay"></div>

    <!-- SIDEBAR -->

    <div class="sidebar" id="sidebar">

        <a href="/admin/create">

            Add Project

        </a>

        <a href="/admin/home-projects/create">

            Homepage CMS

        </a>

        <a href="/admin/logo">

            Change Logo

        </a>

        <a href="/admin/logout" style="color:#d94b4b;">

            Logout

        </a>

    </div>

    <!-- HEADER -->

    <header class="admin-header" id="adminHeader">

        <div class="admin-logo">

            <span>

                FB DESIGN STUDIO

            </span>

            <h1>

                Admin Panel

            </h1>

        </div>

        <div class="header-actions">

            <a
                href="/admin/create"
                class="action-btn-top primary-btn">

                <i class="ri-add-line"></i>

                Add Project

            </a>
            <a href="/admin/logo"
                class="action-btn-top light-btn">

                <i class="ri-image-line"></i>

                Change Logo

            </a>

            <a
                href="/admin/home-projects/create"
                class="action-btn-top light-btn">

                <i class="ri-layout-grid-line"></i>

                Homepage CMS

            </a>
            <a
                href="/admin/home-projects"
                class="action-btn-top">

                <i class="ri-layout-grid-line"></i>

                Homepage Projects

            </a>

            <a
                href="/admin/logout"
                class="action-btn-top logout-btn">

                <i class="ri-logout-box-line"></i>

                Logout

            </a>

        </div>

        <div class="menu-btn" id="menuBtn">

            <i class="ri-menu-3-line"></i>

        </div>

    </header>

    <!-- MAIN -->

    <div class="container">

        <!-- HERO -->

        <div class="dashboard-hero">

            <div class="hero-content">

                <span class="hero-label">

                    FB DESIGN STUDIO CMS

                </span>

                <h1>

                    Creative Control Center

                </h1>

                <p>

                    Manage architecture projects,
                    homepage galleries, branding assets
                    and studio content from one premium
                    dashboard experience.

                </p>

            </div>

            <div class="hero-stats">

                <div class="hero-card">

                    <h2>

                        <?= count($projects ?? []) ?>

                    </h2>

                    <span>

                        TOTAL PROJECTS

                    </span>

                </div>

                <div class="hero-card live-card">

                    <div class="live-dot"></div>

                    <h3>

                        SYSTEM ACTIVE

                    </h3>

                    <p>

                        All services operational

                    </p>

                </div>

            </div>

        </div>

        <!-- PROJECTS -->

        <?php if (!empty($projects)): ?>

            <div class="projects-grid">

                <?php foreach ($projects as $project): ?>

                    <div class="project-card">

                        <div class="project-status">

                            LIVE

                        </div>

                        <?php if (!empty($project['image'])): ?>

                            <div class="card-image">

                                <img
                                    src="<?= base_url('uploads/projects/' . basename($project['image'])) ?>"
                                    alt="">

                            </div>

                        <?php endif; ?>

                        <div class="card-content">

                            <h2>

                                <?= esc((string)$project['title']) ?>

                            </h2>

                            <div class="location">

                                <i class="ri-map-pin-line"></i>

                                <?= esc((string)$project['location']) ?>

                            </div>

                            <p class="description">

                                <?= esc((string)$project['description']) ?>

                            </p>
                            <?php if (!empty($project['gallery'])): ?>

                                <div class="gallery-preview">

                                    <?php

                                    $gallery =
                                        json_decode(
                                            $project['gallery'],
                                            true
                                        );

                                    if (is_array($gallery)):

                                        foreach ($gallery as $media):

                                            /*
|--------------------------------------------------------------------------
| SUPPORT OLD + NEW GALLERY STRUCTURE
|--------------------------------------------------------------------------
*/

                                            $filePath = '';

                                            if (is_array($media)) {
                                                $filePath =
                                                    $media['file'] ?? '';
                                            } else {
                                                $filePath =
                                                    $media;
                                            }

                                            /*
|--------------------------------------------------------------------------
| FILE EXTENSION
|--------------------------------------------------------------------------
*/

                                            $extension =
                                                pathinfo(
                                                    $filePath,
                                                    PATHINFO_EXTENSION
                                                );

                                            /*
|--------------------------------------------------------------------------
| VIDEO CHECK
|--------------------------------------------------------------------------
*/

                                            $isVideo =
                                                in_array(
                                                    strtolower($extension),
                                                    ['mp4', 'webm', 'mov', 'ogg']
                                                );

                                    ?>

                                            <?php if ($isVideo): ?>

                                                <video
                                                    controls
                                                    muted
                                                    playsinline
                                                    style="
width:90px;
height:90px;
object-fit:cover;
border-radius:18px;
flex-shrink:0;
background:#000;
">

                                                    <source
                                                        src="<?= base_url('uploads/projects/' . basename($filePath)) ?>"
                                                        type="video/mp4">

                                                </video>

                                            <?php else: ?>

                                                <img
                                                    src="<?= base_url('uploads/projects/' . basename($filePath)) ?>"
                                                    alt="">

                                            <?php endif; ?>

                                    <?php endforeach;
                                    endif; ?>

                                </div>

                            <?php endif; ?>

                            <div class="card-actions">

                                <a
                                    href="/admin/edit/<?= $project['id'] ?>"
                                    class="action-btn edit-btn">

                                    Edit

                                </a>

                                <a
                                    href="/admin/delete/<?= $project['id'] ?>"
                                    class="action-btn delete-btn"
                                    onclick="return confirm('Delete this project?')">

                                    Delete

                                </a>

                            </div>

                        </div>

                    </div>

                <?php endforeach; ?>

            </div>

        <?php else: ?>

            <div class="empty-state">

                <i class="ri-gallery-line"></i>

                <h2>

                    No Projects Found

                </h2>

                <p>

                    Upload your first architecture project

                </p>

            </div>

        <?php endif; ?>

    </div>

    <script>
        const menuBtn =
            document.getElementById(
                'menuBtn'
            );

        const sidebar =
            document.getElementById(
                'sidebar'
            );

        const overlay =
            document.getElementById(
                'overlay'
            );

        function closeSidebar() {

            sidebar.classList.remove(
                'active'
            );

            overlay.classList.remove(
                'active'
            );

            document.body.style.overflow =
                '';

        }

        function openSidebar() {

            sidebar.classList.add(
                'active'
            );

            overlay.classList.add(
                'active'
            );

            document.body.style.overflow =
                'hidden';

        }

        menuBtn.onclick = () => {

            if (
                sidebar.classList.contains(
                    'active'
                )
            ) {
                closeSidebar();
            } else {
                openSidebar();
            }

        };

        overlay.onclick =
            closeSidebar;

        window.addEventListener(
            'scroll',
            function() {

                const header =
                    document.getElementById(
                        'adminHeader'
                    );

                if (window.scrollY > 40) {
                    header.classList.add(
                        'scrolled'
                    );
                } else {
                    header.classList.remove(
                        'scrolled'
                    );
                }

            }
        );
    </script>

</body>

</html>