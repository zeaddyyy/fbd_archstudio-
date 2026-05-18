<!-- Simple profile view for changing password when logged in -->
<!DOCTYPE html>
<html>
<head>
    <title>Change Password | FB Design Studio</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon/fonts/remixicon.css">
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600&display=swap" rel="stylesheet">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            background: #f4f1ec;
            font-family: 'Outfit', sans-serif;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .container { width: 100%; max-width: 500px; margin: 20px; }
        .card {
            background: rgba(255, 255, 255, 0.72);
            backdrop-filter: blur(18px);
            border: 1px solid rgba(0, 0, 0, 0.05);
            border-radius: 30px;
            padding: 40px;
        }
        h2 { margin-bottom: 30px; font-weight: 300; font-family: 'Cormorant Garamond', serif; font-size: 36px; }
        .form-group { margin-bottom: 20px; }
        .input-group {
            position: relative;
            display: flex;
            align-items: center;
        }
        .input-group i {
            position: absolute;
            left: 18px;
            color: #999;
        }
        .input-group input {
            width: 100%;
            padding: 14px 18px 14px 48px;
            background: rgba(255, 255, 255, 0.6);
            border: 1px solid rgba(0, 0, 0, 0.08);
            border-radius: 20px;
            font-family: 'Outfit', sans-serif;
        }
        .btn {
            width: 100%;
            padding: 14px;
            background: #111;
            color: white;
            border: none;
            border-radius: 100px;
            cursor: pointer;
            margin-top: 10px;
        }
        .btn:hover { background: #2a2a2a; }
        .back-link { text-align: center; margin-top: 20px; }
        .back-link a { color: #666; text-decoration: none; }
        .alert {
            padding: 12px;
            border-radius: 12px;
            margin-bottom: 20px;
            font-size: 13px;
        }
        .alert-error { background: rgba(217, 75, 75, 0.1); color: #8b3a3a; }
        .alert-success { background: rgba(100, 150, 100, 0.1); color: #4a6b4a; }
    </style>
</head>
<body>
    <div class="container">
        <div class="card">
            <h2>Change Password</h2>
            <?php if(session()->getFlashdata('error')): ?>
                <div class="alert alert-error"><?= esc(session()->getFlashdata('error')) ?></div>
            <?php endif; ?>
            <?php if(session()->getFlashdata('success')): ?>
                <div class="alert alert-success"><?= esc(session()->getFlashdata('success')) ?></div>
            <?php endif; ?>
            <form method="post" action="<?= base_url('admin/change-password') ?>">
                <?= csrf_field() ?>
                <div class="form-group">
                    <div class="input-group">
                        <i class="ri-lock-line"></i>
                        <input type="password" name="current_password" placeholder="Current Password" required>
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <i class="ri-lock-line"></i>
                        <input type="password" name="new_password" placeholder="New Password" required>
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <i class="ri-lock-line"></i>
                        <input type="password" name="confirm_password" placeholder="Confirm New Password" required>
                    </div>
                </div>
                <button type="submit" class="btn">Update Password</button>
            </form>
            <div class="back-link">
                <a href="<?= base_url('admin') ?>"><i class="ri-arrow-left-line"></i> Back to Dashboard</a>
            </div>
        </div>
    </div>
</body>
</html>