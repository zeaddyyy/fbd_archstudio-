<?php

namespace App\Controllers;

use App\Models\ProjectModel;
use App\Controllers\BaseController;
use App\Models\SettingModel;

class Admin extends BaseController
{
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
    | LOGIN AUTH
    |-----------------------------------
    */

   public function auth()
{
    $username = $this->request->getPost('username');
    $password = $this->request->getPost('password');
    $remember = $this->request->getPost('remember_me');

    $adminUser = 'admin';
    
    // Get saved password from session, or use default
    $adminPass = session()->get('saved_password') ?? '123456';

    if ($username === $adminUser && $password === $adminPass)
    {
        session()->set('admin_logged_in', true);
        
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
    | SEND OTP TO EMAIL
    |-----------------------------------
    */

    public function sendOTP()   
    {
        $email = $this->request->getPost('email');
        
        // Admin email for demo (change to your email)
        $adminEmail = 'mantashashaikh657@gmail.com';
        
        if ($email !== $adminEmail) {
            return redirect()->back()
                            ->with('error', 'Email not found in our records')
                            ->withInput();
        }
        
        // Generate 6-digit OTP
        $otp = sprintf("%06d", mt_rand(1, 999999));
        
        // Store OTP in session
        session()->set('reset_otp', $otp);
        session()->set('reset_email', $email);
        session()->set('otp_expires', time() + 900); // 15 minutes
        
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
            return redirect()->back()
                            ->with('error', 'Failed to send OTP. Please try again.')
                            ->withInput();
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
    | VERIFY OTP
    |-----------------------------------
    */

    public function verifyOTP()
    {
        $otp = $this->request->getPost('otp');
        $sessionOtp = session()->get('reset_otp');
        $expires = session()->get('otp_expires');
        
        if (!$sessionOtp || !$expires) {
            return redirect()->to('/admin/forgot-password')
                            ->with('error', 'Session expired. Please request again.');
        }
        
        if (time() > $expires) {
            session()->remove(['reset_otp', 'reset_email', 'otp_expires']);
            return redirect()->to('/admin/forgot-password')
                            ->with('error', 'OTP has expired. Please request a new one.');
        }
        
        if ($otp !== $sessionOtp) {
            return redirect()->back()
                            ->with('error', 'Invalid OTP. Please try again.');
        }
        
        // Mark as verified
        session()->set('otp_verified', true);
        
        return redirect()->to('/admin/reset-password')
                        ->with('success', 'OTP verified! Please set your new password.');
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
    | UPDATE PASSWORD
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
    
    // ACTUALLY SAVE THE NEW PASSWORD
    // Save to a file or session for demo purposes
    session()->set('saved_password', $password);
    
    // Clear OTP session
    session()->remove(['reset_otp', 'reset_email', 'otp_expires', 'otp_verified']);
    
    return redirect()->to('/admin/login')
                    ->with('success', 'Password reset successful! Your new password is saved.');
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
    | CHANGE PASSWORD (When Logged In)
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
        
        // Check current password (hardcoded for demo)
        if ($currentPassword !== '123456') {
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