<?php

namespace App\Controllers;

use App\Models\ProjectModel;
use App\Controllers\BaseController;
use App\Models\SettingModel;
use App\Models\AdminModel;  // ← ADDED
use App\Models\HomepageProjectModel;

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
        if (!session()->get('admin_logged_in')) {
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
        if (!session()->get('admin_logged_in')) {
            return redirect()->to('/admin/login');
        }
        return view(
            'admin/create'
        );
    }

    /*
    |-----------------------------------
    | STORE PROJECT
    |-----------------------------------*/

public function store()
{
    if (!session()->get('admin_logged_in')) {
        return redirect()->to('/admin/login');
    }

    $model =
        new ProjectModel();

    /*
|-----------------------------------
| FORM DATA
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
    | UPLOAD DIRECTORY
    |-----------------------------------
    */

        $uploadPath =
            FCPATH .
            'uploads/projects/';

        if (!is_dir($uploadPath)) {
            mkdir(
                $uploadPath,
                0777,
                true
            );
        }

        /*
    |-----------------------------------
    | STORE MEDIA
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
    | PROCESS FILES
    |-----------------------------------
    */

        if ($files) {

            foreach ($files as $index => $file) {

                if (
                    $file
                    &&
                    $file->isValid()
                    &&
                    ! $file->hasMoved()
                ) {

                    /*
                |---------------------------
                | ALLOWED TYPES
                |---------------------------
                */

                    $allowedExtensions = [

                        'jpg',
                        'jpeg',
                        'png',
                        'webp',
                        'mp4',
                        'mov',
                        'webm',
                        'ogg'

                    ];

                    $extension =
                        strtolower(
                            $file->getExtension()
                        );

                    if (
                        ! in_array(
                            $extension,
                            $allowedExtensions
                        )
                    ) {
                        continue;
                    }

                    /*
                |---------------------------
                | RANDOM NAME
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
                | MEDIA TYPE
                |---------------------------
                */

                    $type =
                        in_array(
                            $extension,
                            [
                                'mp4',
                                'mov',
                                'webm',
                                'ogg'
                            ]
                        )
                        ? 'video'
                        : 'image';

                    /*
                |---------------------------
                | SAVE MEDIA
                |---------------------------
                */

                    $mediaTitles =
$this->request->getPost(
'media_titles'
) ?? [];

$mediaDescriptions =
$this->request->getPost(
'media_descriptions'
) ?? [];

/*
|--------------------------------------------------------------------------
| SAVE MEDIA
|--------------------------------------------------------------------------
*/

$uploadedImages[] = [

    'file' =>
    'projects/' .
    $newName,

    'type' =>
    $type,

    'title' =>
    $mediaTitles[$index]
    ?? 'Project Media',

    'description' =>
    $mediaDescriptions[$index]
    ?? ''

];
                }
            }
        }

        /*
    |-----------------------------------
    | MAIN THUMBNAIL
    |-----------------------------------
    */

        $mainImage = '';

        if (
            isset($uploadedImages[0])
            &&
            isset($uploadedImages[0]['file'])
        ) {
            $mainImage =
                $uploadedImages[0]['file'];
        }

        /*
    |-----------------------------------
    | INSERT DATABASE
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
                $uploadedImages,
                JSON_UNESCAPED_SLASHES
            )

        ];

        /*
    |-----------------------------------
    | SAVE
    |-----------------------------------
    */

        $model->insert(
            $insertData
        );

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
        if (!session()->get('admin_logged_in')) {
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

        if (!$project) {
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
        ) {
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

        if (! empty($project['gallery'])) {
            $gallery =
                json_decode(
                    $project['gallery'],
                    true
                );

            if (is_array($gallery)) {
                foreach ($gallery as $media) {

                    /*
    |-----------------------------------
    | SUPPORT OLD + NEW GALLERY FORMAT
    |-----------------------------------
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
    |-----------------------------------
    | DELETE FILE
    |-----------------------------------
    */

                    if (
                        ! empty($filePath)
                        &&
                        file_exists(
                            FCPATH .
                                'uploads/' .
                                $filePath
                        )
                    ) {
                        unlink(
                            FCPATH .
                                'uploads/' .
                                $filePath
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
        if (!session()->get('admin_logged_in')) {
            return redirect()->to('/admin/login');
        }
        $model =
            new ProjectModel();

        $project =
            $model->find($id);

        if (!$project) {
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
    if (!session()->get('admin_logged_in')) {
        return redirect()->to('/admin/login');
    }

    $model =
        new ProjectModel();

    /*
    |--------------------------------------------------------------------------
    | FIND PROJECT
    |--------------------------------------------------------------------------
    */

    $project =
        $model->find($id);

    if (!$project) {
        return redirect()->to('/admin');
    }

    /*
    |--------------------------------------------------------------------------
    | FORM DATA
    |--------------------------------------------------------------------------
    */

    $title =
        $this->request->getPost('title');

    $description =
        $this->request->getPost('description');

    $location =
        $this->request->getPost('location');

    /*
    |--------------------------------------------------------------------------
    | EXISTING GALLERY
    |--------------------------------------------------------------------------
    */

    $gallery =
        json_decode(
            $project['gallery'],
            true
        ) ?? [];

    /*
    |--------------------------------------------------------------------------
    | MAIN IMAGE
    |--------------------------------------------------------------------------
    */

    $mainImage =
        $project['image'];

    /*
    |--------------------------------------------------------------------------
    | UPLOAD PATH
    |--------------------------------------------------------------------------
    */

    $uploadPath =
        FCPATH .
        'uploads/projects/';

    if (!is_dir($uploadPath)) {

        mkdir(
            $uploadPath,
            0777,
            true
        );
    }

    /*
    |--------------------------------------------------------------------------
    | NEW FILES
    |--------------------------------------------------------------------------
    */

    $files =
        $this->request->getFileMultiple(
            'project_files'
        );

    /*
    |--------------------------------------------------------------------------
    | MEDIA TITLES
    |--------------------------------------------------------------------------
    */

    $mediaTitles =
        $this->request->getPost(
            'media_titles'
        ) ?? [];

    /*
    |--------------------------------------------------------------------------
    | MEDIA DESCRIPTIONS
    |--------------------------------------------------------------------------
    */

    $mediaDescriptions =
        $this->request->getPost(
            'media_descriptions'
        ) ?? [];

    /*
    |--------------------------------------------------------------------------
    | PROCESS FILES
    |--------------------------------------------------------------------------
    */

    if ($files) {

        foreach ($files as $index => $file) {

            if (
                $file &&
                $file->isValid() &&
                !$file->hasMoved()
            ) {

                /*
                |--------------------------------------------------------------------------
                | EXTENSION
                |--------------------------------------------------------------------------
                */

                $extension =
                    strtolower(
                        $file->getExtension()
                    );

                /*
                |--------------------------------------------------------------------------
                | RANDOM NAME
                |--------------------------------------------------------------------------
                */

                $newName =
                    $file->getRandomName();

                /*
                |--------------------------------------------------------------------------
                | MOVE FILE
                |--------------------------------------------------------------------------
                */

                $file->move(
                    $uploadPath,
                    $newName
                );

                /*
                |--------------------------------------------------------------------------
                | MEDIA TYPE
                |--------------------------------------------------------------------------
                */

                $type =
                    in_array(
                        $extension,
                        [
                            'mp4',
                            'mov',
                            'webm',
                            'ogg'
                        ]
                    )
                    ? 'video'
                    : 'image';

                /*
                |--------------------------------------------------------------------------
                | SAVE MEDIA
                |--------------------------------------------------------------------------
                */

                $gallery[] = [

                    'file' =>
                    'projects/' .
                    $newName,

                    'type' =>
                    $type,

                    'title' =>
                    $mediaTitles[$index]
                    ?? 'Project Media',

                    'description' =>
                    $mediaDescriptions[$index]
                    ?? ''

                ];
            }
        }
    }

    /*
    |--------------------------------------------------------------------------
    | MAIN THUMBNAIL
    |--------------------------------------------------------------------------
    */

    if (
        isset($gallery[0]['file'])
    ) {

        $mainImage =
            $gallery[0]['file'];
    }

    /*
    |--------------------------------------------------------------------------
    | UPDATE DATABASE
    |--------------------------------------------------------------------------
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
        json_encode(
            $gallery,
            JSON_UNESCAPED_SLASHES
        )

    ]);

    /*
    |--------------------------------------------------------------------------
    | REDIRECT
    |--------------------------------------------------------------------------
    */

    return redirect()
        ->to('/admin')
        ->with(
            'success',
            'Project Updated Successfully'
        );
    }

    public function logo()
    {
        if (!session()->get('admin_logged_in')) {
            return redirect()->to('/admin/login');
        }
        $model = new SettingModel();

        $data['setting'] = $model->first();

        return view('admin/logo', $data);
    }

    public function updateLogo()
    {
        if (!session()->get('admin_logged_in')) {
            return redirect()->to('/admin/login');
        }

        $settingModel =
            new \App\Models\SettingModel();

        $setting =
            $settingModel->first();

        $file =
            $this->request->getFile(
                'site_logo'
            );

        if ($file && $file->isValid()) {
            $newName =
                $file->getRandomName();

            $file->move(
                FCPATH . 'uploads/',
                $newName
            );

            /* DELETE OLD LOGO */

            if (
                !empty($setting['site_logo']) &&
                file_exists(
                    FCPATH .
                        'uploads/' .
                        $setting['site_logo']
                )
            ) {
                unlink(
                    FCPATH .
                        'uploads/' .
                        $setting['site_logo']
                );
            }

            /* UPDATE DATABASE */

            if ($setting) {
                $settingModel->update(
                    $setting['id'],
                    [
                        'site_logo' =>
                        $newName
                    ]
                );
            } else {
                $settingModel->insert([
                    'site_logo' =>
                    $newName
                ]);
            }

            return redirect()
                ->back()
                ->with(
                    'success',
                    'Logo updated successfully'
                );
        }

        return redirect()
            ->back()
            ->with(
                'error',
                'Logo upload failed'
            );
    }

    /*
    |-----------------------------------
    | LOGIN PAGE
    |-----------------------------------
    */

    public function login()
    {
        if (session()->get('admin_logged_in')) {
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
        if (session()->get('admin_logged_in')) {
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
        if (session()->get('admin_logged_in')) {
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
        if (session()->get('admin_logged_in')) {
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
        if (!session()->get('admin_logged_in')) {
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
        if (!session()->get('admin_logged_in')) {
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
| HOMEPAGE PROJECTS DASHBOARD
|-----------------------------------
*/

    public function homeProjects()
    {
        if (!session()->get('admin_logged_in')) {
            return redirect()->to('/admin/login');
        }

        helper('text');

        $model =
            new HomepageProjectModel();

        $projects =
            $model
            ->orderBy(
                'id',
                'DESC'
            )
            ->findAll();

        return view(
            'admin/dashboard',
            [
                'projects' =>
                $projects
            ]
        );
    }
    /*
|-----------------------------------
| CREATE HOMEPAGE PROJECT
|-----------------------------------
*/

    public function createHomeProject()
    {
        if (!session()->get('admin_logged_in')) {
            return redirect()->to('/admin/login');
        }

        return view(
            'admin/create_home_project'
        );
    }

    /*
|-----------------------------------
| STORE HOMEPAGE PROJECT
|-----------------------------------
*/

    public function storeHomeProject()
    {
        if (!session()->get('admin_logged_in')) {
            return redirect()->to('/admin/login');
        }

        $model =
            new HomepageProjectModel();

        /*
    |-----------------------------------
    | UPLOAD PATH
    |-----------------------------------
    */

        $uploadPath =
            FCPATH .
            'uploads/homepage/';

        if (! is_dir($uploadPath)) {
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

        $files =
            $this->request->getFileMultiple(
                'project_images'
            );

        if ($files) {
            foreach ($files as $file) {
                if (
                    $file->isValid()
                    &&
                    !$file->hasMoved()
                    &&
                    strpos(
                        $file->getMimeType(),
                        'image'
                    ) !== false
                ) {
                    $newName =
                        $file->getRandomName();

                    $file->move(
                        $uploadPath,
                        $newName
                    );

                    $uploadedImages[] =
                        $newName;
                }
            }
        }

        /*
    |-----------------------------------
    | THUMBNAIL
    |-----------------------------------
    */

        $thumbnail =
            ! empty($uploadedImages)
            ? $uploadedImages[0]
            : '';

        /*
    |-----------------------------------
    | INSERT
    |-----------------------------------
    */

        $model->insert([

            'title' =>
            $this->request->getPost(
                'title'
            ),

            'description' =>
            $this->request->getPost(
                'description'
            ),

            'location' =>
            $this->request->getPost(
                'location'
            ),

            'year' =>
            $this->request->getPost(
                'year'
            ),

            'designer' =>
            $this->request->getPost(
                'designer'
            ),

            'team' =>
            $this->request->getPost(
                'team'
            ),

            'area' =>
            $this->request->getPost(
                'area'
            ),

            'category' =>
            $this->request->getPost(
                'category'
            ),

            'layout_type' =>
            $this->request->getPost(
                'layout_type'
            ),

            'thumbnail' =>
            $thumbnail,

            'gallery' =>
            json_encode(
                $uploadedImages
            )

        ]);

        return redirect()
            ->to('/admin/home-projects')
            ->with(
                'success',
                'Homepage Project Added Successfully'
            );
    }

    /*
|-----------------------------------
| DELETE HOMEPAGE PROJECT
|-----------------------------------
*/

    public function deleteHomeProject(?int $id = null)
    {
        if (!session()->get('admin_logged_in')) {
            return redirect()->to('/admin/login');
        }

        $model =
            new HomepageProjectModel();

        $project =
            $model->find($id);

        if (!$project) {
            return redirect()
                ->to('/admin/home-projects');
        }

        /*
    |-----------------------------------
    | DELETE GALLERY
    |-----------------------------------
    */

        $gallery =
            json_decode(
                $project['gallery'],
                true
            ) ?? [];

        foreach ($gallery as $image) {
            $path =
                FCPATH .
                'uploads/homepage/' .
                $image;

            if (file_exists($path)) {
                unlink($path);
            }
        }

        $model->delete($id);

        return redirect()
            ->to('/admin/home-projects')
            ->with(
                'success',
                'Homepage Project Deleted'
            );
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
