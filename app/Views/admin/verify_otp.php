<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify OTP | FB Design Studio</title>
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
        .brand { text-align: center; margin-bottom: 40px; }
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
        .brand p { color: #777; font-size: 14px; margin-top: 8px; }
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
        .form-group { margin-bottom: 25px; }
        .otp-input {
            text-align: center;
            font-size: 32px;
            letter-spacing: 15px;
            padding: 20px;
            text-align: center;
            background: rgba(255, 255, 255, 0.6);
            border: 1px solid rgba(0, 0, 0, 0.08);
            border-radius: 20px;
            font-family: monospace;
            font-weight: bold;
        }
        .otp-input:focus {
            outline: none;
            border-color: rgba(0, 0, 0, 0.2);
            background: rgba(255, 255, 255, 0.9);
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
        }
        .btn:hover { transform: translateY(-3px); background: #2a2a2a; }
        .info-text {
            text-align: center;
            margin-top: 20px;
            font-size: 12px;
            color: #666;
        }
        @media (max-width: 550px) { .card { padding: 35px 25px; } .brand h1 { font-size: 34px; } }
    </style>
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="brand">
                <div class="brand-icon"><i class="ri-shield-check-line"></i></div>
                <h1>Verify OTP</h1>
                <p>Enter the 6-digit code sent to your email</p>
            </div>

            <?php if(session()->getFlashdata('error')): ?>
                <div class="alert alert-error"><i class="ri-alert-line"></i><span><?= session()->getFlashdata('error') ?></span></div>
            <?php endif; ?>

            <form method="post" action="<?= base_url('admin/verify-otp') ?>">
                <?= csrf_field() ?>
                <div class="form-group">
                    <input type="text" name="otp" class="otp-input" placeholder="000000" maxlength="6" pattern="[0-9]{6}" required autocomplete="off">
                </div>
                <button type="submit" class="btn"><i class="ri-check-line"></i> Verify OTP</button>
            </form>

            <div class="info-text">
                <i class="ri-time-line"></i> OTP expires in 15 minutes
            </div>
        </div>
    </div>
</body>
</html>