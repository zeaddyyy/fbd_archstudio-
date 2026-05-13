<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password | FB Design Studio</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon/fonts/remixicon.css">
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600&family=Cormorant+Garamond:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
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
            padding: 50px 45px;
        }
        .brand { text-align: center; margin-bottom: 30px; }
        .brand-icon {
            width: 80px; height: 80px;
            background: rgba(0, 0, 0, 0.04);
            border-radius: 28px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 20px;
        }
        .brand-icon i { font-size: 40px; color: #1a1a1a; }
        .brand h1 {
            font-size: 42px;
            font-weight: 300;
            font-family: 'Cormorant Garamond', serif;
            color: #1a1a1a;
        }
        .alert {
            padding: 14px 18px;
            border-radius: 16px;
            margin-bottom: 25px;
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 13px;
        }
        .alert-error { background: rgba(217, 75, 75, 0.1); border-left: 3px solid #d94b4b; color: #8b3a3a; }
        .alert-success { background: rgba(100, 150, 100, 0.1); border-left: 3px solid #6b8c6b; color: #4a6b4a; }
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
            font-size: 20px;
        }
        .input-group input {
            width: 100%;
            padding: 15px 18px 15px 52px;
            background: rgba(255, 255, 255, 0.6);
            border: 1px solid rgba(0, 0, 0, 0.08);
            border-radius: 20px;
            font-size: 15px;
            font-family: 'Outfit', sans-serif;
        }
        .input-group input:focus {
            outline: none;
            border-color: rgba(0, 0, 0, 0.2);
            background: rgba(255, 255, 255, 0.9);
        }
        .password-toggle {
            position: absolute;
            right: 18px;
            cursor: pointer;
            color: #999;
            z-index: 2;
        }
        .btn {
            width: 100%;
            padding: 16px;
            background: #111;
            color: white;
            border: none;
            border-radius: 100px;
            font-size: 12px;
            font-weight: 500;
            letter-spacing: 0.18em;
            text-transform: uppercase;
            cursor: pointer;
            transition: 0.4s;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            margin-top: 25px;
        }
        .btn:hover { transform: translateY(-3px); background: #2a2a2a; }
        .requirements {
            font-size: 11px;
            color: #666;
            margin-top: 15px;
            text-align: center;
        }
        @media (max-width: 550px) { .card { padding: 35px 25px; } }
    </style>
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="brand">
                <div class="brand-icon"><i class="ri-lock-password-line"></i></div>
                <h1>Reset Password</h1>
            </div>

            <?php if(session()->getFlashdata('error')): ?>
                <div class="alert alert-error"><i class="ri-alert-line"></i><span><?= session()->getFlashdata('error') ?></span></div>
            <?php endif; ?>

            <form method="post" action="<?= base_url('admin/update-password') ?>">
                <?= csrf_field() ?>
                <div class="form-group">
                    <div class="input-group">
                        <i class="ri-lock-line"></i>
                        <input type="password" name="password" id="password" placeholder="New Password" required>
                        <i class="ri-eye-line password-toggle" id="togglePassword"></i>
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <i class="ri-lock-line"></i>
                        <input type="password" name="confirm_password" id="confirm_password" placeholder="Confirm New Password" required>
                        <i class="ri-eye-line password-toggle" id="toggleConfirmPassword"></i>
                    </div>
                </div>
                <button type="submit" class="btn"><i class="ri-refresh-line"></i> Update Password</button>
            </form>
            <div class="requirements">
                <i class="ri-information-line"></i> Password must be at least 6 characters
            </div>
        </div>
    </div>

    <script>
        function togglePasswordVisibility(toggleId, inputId) {
            const toggle = document.getElementById(toggleId);
            const input = document.getElementById(inputId);
            if (toggle && input) {
                toggle.addEventListener('click', function() {
                    const type = input.getAttribute('type') === 'password' ? 'text' : 'password';
                    input.setAttribute('type', type);
                    this.classList.toggle('ri-eye-line');
                    this.classList.toggle('ri-eye-off-line');
                });
            }
        }
        
        togglePasswordVisibility('togglePassword', 'password');
        togglePasswordVisibility('toggleConfirmPassword', 'confirm_password');
        
        setTimeout(function() {
            const alerts = document.querySelectorAll('.alert');
            alerts.forEach(alert => {
                alert.style.transition = 'opacity 0.4s ease';
                alert.style.opacity = '0';
                setTimeout(() => alert.remove(), 400);
            });
        }, 5000);
    </script>
</body>
</html>