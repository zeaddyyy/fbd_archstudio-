<?php

namespace App\Controllers;

use App\Models\ProjectModel;
use App\Controllers\BaseController;
use App\Models\SettingModel;
use App\Models\AdminModel;  // ← ADDED

class Admin extends BaseController
{
    protected $adminModel;  // ← ADDED
    
    public function __construct()  // ← ADDED
    {
        $this->adminModel = new AdminModel();
    }
    
    /*
    |-----------------------------------
    | ADMIN DASHBOARD
    |-----------------------------------
    */

    public function index()
    {
         if(!session()->get('admin_logged_in'))
    {
        return redirect()->to('/admin/login');
    }
        $model =
        new ProjectModel();

        /*
        |-----------------------------------
        | GET PROJECTS
        |-----------------------------------
        */

        $projects =
        $model
        ->orderBy('id', 'DESC')
        ->findAll();

        /*
        |-----------------------------------
        | LOAD VIEW
        |-----------------------------------
        */

        return view(
            'admin/index',
            [
                'projects' => $projects
            ]
        );
    }

    /*
    |-----------------------------------
    | CREATE PAGE
    |-----------------------------------
    */

    public function create()
    {
         if(!session()->get('admin_logged_in'))
    {
        return redirect()->to('/admin/login');
    }
        return view(
            'admin/create'
        );
    }

    /*
    |-----------------------------------
    | STORE PROJECT
    |-----------------------------------
    */

    public function store()
    {
         if(!session()->get('admin_logged_in'))
    {
        return redirect()->to('/admin/login');
    }
        $model =
        new ProjectModel();

        /*
        |-----------------------------------
        | GET FORM DATA
        |-----------------------------------
        */

        $title =
        $this->request->getPost(
            'title'
        );

        $description =
        $this->request->getPost(
            'description'
        );

        $location =
        $this->request->getPost(
            'location'
        );

        /*
        |-----------------------------------
        | UPLOAD PATH
        |-----------------------------------
        */

        $uploadPath =
        FCPATH .
        'uploads/projects/';

        /*
        |-----------------------------------
        | CREATE FOLDER IF NOT EXISTS
        |-----------------------------------
        */

        if (! is_dir($uploadPath))
        {
            mkdir(
                $uploadPath,
                0777,
                true
            );
        }

        /*
        |-----------------------------------
        | STORE IMAGES
        |-----------------------------------
        */

        $uploadedImages = [];

        /*
        |-----------------------------------
        | GET FILES
        |-----------------------------------
        */

        $files =
        $this->request->getFileMultiple(
            'project_files'
        );

        /*
        |-----------------------------------
        | LOOP FILES
        |-----------------------------------
        */

        if ($files)
        {
           foreach ($files as $file)
{
    if (
        $file->isValid()
        &&
        !$file->hasMoved()
        &&
        strpos(
            $file->getMimeType(),
            'image'
        ) !== false
    )
    {
        /*
        |---------------------------
        | RANDOM FILE NAME
        |---------------------------
        */

                    $newName =
                    $file->getRandomName();

                    /*
                    |---------------------------
                    | MOVE FILE
                    |---------------------------
                    */

                    $file->move(
                        $uploadPath,
                        $newName
                    );

                    /*
                    |---------------------------
                    | SAVE IMAGE PATH
                    |---------------------------
                    */

                    $uploadedImages[] =
                    'projects/' .
                    $newName;
                }
            }
        }

        /*
        |-----------------------------------
        | MAIN THUMBNAIL
        |-----------------------------------
        */

        $mainImage =
        ! empty($uploadedImages)
        ? $uploadedImages[0]
        : '';

        /*
        |-----------------------------------
        | INSERT DATA
        |-----------------------------------
        */

        $insertData = [

            'title' =>
            $title,

            'description' =>
            $description,

            'location' =>
            $location,

            'image' =>
            $mainImage,

            'gallery' =>
            json_encode(
                $uploadedImages
            ),

        ];

        /*
        |-----------------------------------
        | SAVE TO DATABASE
        |-----------------------------------
        */

        $saved =
        $model->insert(
            $insertData
        );

        /*
        |-----------------------------------
        | ERROR CHECK
        |-----------------------------------
        */

        if (! $saved)
        {
            dd(
                $model->errors()
            );
        }

        /*
        |-----------------------------------
        | REDIRECT
        |-----------------------------------
        */

        return redirect()
        ->to('/admin')
        ->with(
            'success',
            'Project Uploaded Successfully'
        );
    }

    /*
    |-----------------------------------
    | DELETE PROJECT
    |-----------------------------------
    */

  public function delete(?int $id = null)
    {
        if(!session()->get('admin_logged_in'))
{
    return redirect()->to('/admin/login');
}
    
        $model =
        new ProjectModel();

        /*
        |-----------------------------------
        | FIND PROJECT
        |-----------------------------------
        */

        $project =
        $model->find($id);

        if (!$project)
        {
            return redirect()
            ->to('/admin');
        }

        /*
        |-----------------------------------
        | DELETE MAIN IMAGE
        |-----------------------------------
        */

        if (
            ! empty($project['image'])
            &&
            file_exists(
                FCPATH .
                'uploads/' .
                $project['image']
            )
        )
        {
            unlink(
                FCPATH .
                'uploads/' .
                $project['image']
            );
        }

        /*
        |-----------------------------------
        | DELETE GALLERY
        |-----------------------------------
        */

        if (! empty($project['gallery']))
        {
            $gallery =
            json_decode(
                $project['gallery'],
                true
            );

            if (is_array($gallery))
            {
                foreach ($gallery as $image)
                {
                    if (
                        file_exists(
                            FCPATH .
                            'uploads/' .
                            $image
                        )
                    )
                    {
                        unlink(
                            FCPATH .
                            'uploads/' .
                            $image
                        );
                    }
                }
            }
        }

        /*
        |-----------------------------------
        | DELETE RECORD
        |-----------------------------------
        */

        $model->delete($id);

        return redirect()
        ->to('/admin')
        ->with(
            'success',
            'Project Deleted'
        );
    }
        /*
    |-----------------------------------
    | EDIT PROJECT
    |-----------------------------------
    */

    public function edit($id)
    {
        if(!session()->get('admin_logged_in'))
{
    return redirect()->to('/admin/login');
}
        $model =
        new ProjectModel();

        $project =
        $model->find($id);

        if (!$project)
        {
            return redirect()->to('/admin');
        }

        return view(
            'admin/edit',
            [
                'project' => $project
            ]
        );
    }

    /*
    |-----------------------------------
    | UPDATE PROJECT
    |-----------------------------------
    */

    public function update($id)
    {
        if(!session()->get('admin_logged_in'))
{
    return redirect()->to('/admin/login');
}
        $model =
        new ProjectModel();

        /*
        |-----------------------------------
        | FIND PROJECT
        |-----------------------------------
        */

        $project =
        $model->find($id);

        if (!$project)
        {
            return redirect()->to('/admin');
        }

        /*
        |-----------------------------------
        | FORM DATA
        |-----------------------------------
        */

        $title =
        $this->request->getPost('title');

        $description =
        $this->request->getPost('description');

        $location =
        $this->request->getPost('location');

        /*
        |-----------------------------------
        | OLD IMAGE
        |-----------------------------------
        */

        $mainImage =
        $project['image'];

        $gallery =
        json_decode(
            $project['gallery'],
            true
        ) ?? [];

        /*
        |-----------------------------------
        | NEW FILES
        |-----------------------------------
        */

        $files =
        $this->request->getFileMultiple(
            'project_files'
        );

        $uploadPath =
        FCPATH .
        'uploads/projects/';

        if ($files)
        {
            foreach ($files as $file)
            {
                if (
                    $file->isValid()
                    &&
                    ! $file->hasMoved()
                )
                {
                    $newName =
                    $file->getRandomName();

                    $file->move(
                        $uploadPath,
                        $newName
                    );

                    $gallery[] =
                    'projects/' .
                    $newName;
                }
            }

            /*
            |-----------------------------------
            | NEW THUMBNAIL
            |-----------------------------------
            */

            $mainImage =
            $gallery[0];
        }

        /*
        |-----------------------------------
        | UPDATE DATABASE
        |-----------------------------------
        */

        $model->update($id, [

            'title' =>
            $title,

            'description' =>
            $description,

            'location' =>
            $location,

            'image' =>
            $mainImage,

            'gallery' =>
            json_encode($gallery)

        ]);

        return redirect()
        ->to('/admin')
        ->with(
            'success',
            'Project updated successfully!'
        );
    }
    
    public function logo()
    {
         if(!session()->get('admin_logged_in'))
        {
            return redirect()->to('/admin/login');
        }
        $model = new SettingModel();

        $data['setting'] = $model->first();

        return view('admin/logo', $data);
    }

    public function updateLogo()
    {
         if(!session()->get('admin_logged_in'))
        {
            return redirect()->to('/admin/login');
        }
        $model = new SettingModel();

        $file = $this->request->getFile('site_logo');

        if ($file && $file->isValid() && !$file->hasMoved()) {

            $newName = $file->getRandomName();
            $file->move(FCPATH . 'uploads/', $newName);

            $setting = $model->first();

            if ($setting) {

                // delete old logo (optional but recommended)
                if (!empty($setting['site_logo']) && file_exists(FCPATH . 'uploads/' . $setting['site_logo'])) {
                    unlink(FCPATH . 'uploads/' . $setting['site_logo']);
                }

                // update new logo
                $model->update($setting['id'], [
                    'site_logo' => $newName
                ]);
            }
        }

        return redirect()->to('/admin/logo')
                ->with('success', 'Logo updated successfully');
    }

    /*
    |-----------------------------------
    | LOGIN PAGE
    |-----------------------------------
    */

    public function login()
    {
        if(session()->get('admin_logged_in')) {
            return redirect()->to('/admin');
        }
        return view('admin/login');
    }

    /*
    |-----------------------------------
    | LOGIN AUTH - UPDATED WITH DATABASE
    |-----------------------------------
    */

   public function auth()
{
    $username = $this->request->getPost('username');
    $password = $this->request->getPost('password');
    $remember = $this->request->getPost('remember_me');
    
    // Find admin by username
    $admin = $this->adminModel->where('username', $username)->first();
    
    // ✅ Verify against DATABASE password
    if ($admin && $this->adminModel->verifyPassword($password, $admin['password'])) {
        session()->set([
            'admin_logged_in' => true,
            'admin_id' => $admin['id'],
            'admin_username' => $admin['username'],
            'admin_email' => $admin['email']
        ]);
        
        if ($remember) {
            session()->set('remember_me', true);
        }
        
        return redirect()->to('/admin');
    }
    
    return redirect()
        ->to('/admin/login')
        ->with('error', 'Invalid Login Details')
        ->withInput();
}

    /*
    |-----------------------------------
    | FORGOT PASSWORD - SHOW FORM
    |-----------------------------------
    */

    public function forgotPassword()
    {
        if(session()->get('admin_logged_in')) {
            return redirect()->to('/admin');
        }
        return view('admin/forgot_password');
    }

    /*
    |-----------------------------------
    | SEND OTP TO EMAIL - UPDATED WITH DATABASE
    |-----------------------------------
    */

   public function sendOTP()   
{
    $email = $this->request->getPost('email');
    
    // Check if email exists in database
    $admin = $this->adminModel->where('email', $email)->first();
    
    if (!$admin) {
        return redirect()->back()
                        ->with('error', 'Email not found in our records')
                        ->withInput();
    }
    
    // Generate OTP using model
    $otp = $this->adminModel->generateOTP();
    
    // Save OTP to database
    $this->adminModel->saveOTP($email, $otp);
    
    // Store email in session
    session()->set('reset_email', $email);
    
    // Load email service
    $emailService = \Config\Services::email();
    
    $emailService->setTo($email);
    $emailService->setSubject('Password Reset OTP - FB Design Studio');
    
    $message = "
    <html>
    <head>
        <style>
            body { font-family: Arial, sans-serif; }
            .container { max-width: 600px; margin: 0 auto; padding: 20px; }
            .header { background: #111; color: white; padding: 20px; text-align: center; }
            .otp-code { font-size: 32px; font-weight: bold; color: #111; padding: 20px; text-align: center; letter-spacing: 5px; }
            .footer { text-align: center; padding: 20px; color: #666; font-size: 12px; }
        </style>
    </head>
    <body>
        <div class='container'>
            <div class='header'>
                <h2>FB Design Studio</h2>
                <p>Password Reset Request</p>
            </div>
            <div class='otp-code'>
                <strong>{$otp}</strong>
            </div>
            <p style='text-align: center;'>Use this OTP to reset your password. This OTP is valid for 15 minutes.</p>
            <div class='footer'>
                <p>&copy; " . date('Y') . " FB Design Studio. All rights reserved.</p>
            </div>
        </div>
    </body>
    </html>
    ";
    
    $emailService->setMessage($message);
    $emailService->setMailType('html');
    
    if ($emailService->send()) {
        return redirect()->to('/admin/verify-otp')
                        ->with('success', 'OTP sent to your email. Please check your inbox.');
    } else {
        // If email fails, show OTP on screen (for testing)
        return redirect()->to('/admin/verify-otp')
                        ->with('success', '🔐 Your OTP is: ' . $otp . ' (Check console - Email not configured)');
    }
}
    /*
    |-----------------------------------
    | VERIFY OTP FORM
    |-----------------------------------
    */

    public function verifyOTPForm()
    {
        if(session()->get('admin_logged_in')) {
            return redirect()->to('/admin');
        }
        
        if (!session()->get('reset_email')) {
            return redirect()->to('/admin/forgot-password')
                            ->with('error', 'Please request password reset first');
        }
        
        return view('admin/verify_otp');
    }

    /*
    |-----------------------------------
    | VERIFY OTP - UPDATED WITH DATABASE
    |-----------------------------------
    */

    public function verifyOTP()
    {
        $otp = $this->request->getPost('otp');
        $email = session()->get('reset_email');
        
        if (!$email) {
            return redirect()->to('/admin/forgot-password')
                            ->with('error', 'Session expired. Please request again.');
        }
        
        // Verify OTP using model
        $admin = $this->adminModel->verifyOTP($email, $otp);
        
        if ($admin) {
            session()->set('otp_verified', true);
            return redirect()->to('/admin/reset-password')
                            ->with('success', 'OTP verified! Please set your new password.');
        }
        
        return redirect()->back()
                        ->with('error', 'Invalid or expired OTP. Please try again.');
    }

    /*
    |-----------------------------------
    | RESET PASSWORD FORM
    |-----------------------------------
    */

    public function resetPasswordForm()
    {
        if(session()->get('admin_logged_in')) {
            return redirect()->to('/admin');
        }
        
        if (!session()->get('otp_verified') || !session()->get('reset_email')) {
            return redirect()->to('/admin/forgot-password')
                            ->with('error', 'Unauthorized access. Please request password reset.');
        }
        
        return view('admin/reset_password');
    }

    /*
    |-----------------------------------
    | UPDATE PASSWORD - UPDATED WITH DATABASE
    |-----------------------------------
    */

public function updatePassword()
{
    $password = $this->request->getPost('password');
    $confirmPassword = $this->request->getPost('confirm_password');
    
    if (!session()->get('otp_verified') || !session()->get('reset_email')) {
        return redirect()->to('/admin/forgot-password')
                        ->with('error', 'Session expired. Please request again.');
    }
    
    if (strlen($password) < 6) {
        return redirect()->back()
                        ->with('error', 'Password must be at least 6 characters');
    }
    
    if ($password !== $confirmPassword) {
        return redirect()->back()
                        ->with('error', 'Passwords do not match');
    }
    
    // ✅ FIXED: Save to DATABASE, not session
    $email = session()->get('reset_email');
    $admin = $this->adminModel->where('email', $email)->first();
    
    if ($admin) {
        // Update password in database (model will auto-hash it)
        $this->adminModel->update($admin['id'], ['password' => $password]);
    }
    
    // Clear OTP from database
    $this->adminModel->clearOTP($email);
    
    // Clear sessions
    session()->remove(['reset_otp', 'reset_email', 'otp_expires', 'otp_verified']);
    
    return redirect()->to('/admin/login')
                    ->with('success', 'Password reset successful! Please login with your new password.');
}

    /*
    |-----------------------------------
    | PROFILE - Change Password (When Logged In)
    |-----------------------------------
    */

    public function profile()
    {
        if(!session()->get('admin_logged_in')) {
            return redirect()->to('/admin/login');
        }
        
        return view('admin/profile');
    }

    /*
    |-----------------------------------
    | CHANGE PASSWORD (When Logged In) - UPDATED WITH DATABASE
    |-----------------------------------
    */

    public function changePassword()
{
    if(!session()->get('admin_logged_in')) {
        return redirect()->to('/admin/login');
    }
    
    $currentPassword = $this->request->getPost('current_password');
    $newPassword = $this->request->getPost('new_password');
    $confirmPassword = $this->request->getPost('confirm_password');
    
    $adminId = session()->get('admin_id');
    $admin = $this->adminModel->find($adminId);
    
    // Verify current password
    if (!$this->adminModel->verifyPassword($currentPassword, $admin['password'])) {
        return redirect()->back()
                        ->with('error', 'Current password is incorrect');
    }
    
    if (strlen($newPassword) < 6) {
        return redirect()->back()
                        ->with('error', 'New password must be at least 6 characters');
    }
    
    if ($newPassword !== $confirmPassword) {
        return redirect()->back()
                        ->with('error', 'New passwords do not match');
    }
    
    // ✅ Save new password to DATABASE
    $this->adminModel->update($adminId, ['password' => $newPassword]);
    
    return redirect()->to('/admin')
                    ->with('success', 'Password changed successfully!');
}

    /*
    |-----------------------------------
    | LOGOUT
    |-----------------------------------
    */

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/admin/login');
    }
}