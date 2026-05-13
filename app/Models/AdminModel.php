<?php

namespace App\Models;

use CodeIgniter\Model;

class AdminModel extends Model
{
    protected $table = 'admin_users';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'email', 
        'username', 
        'password', 
        'otp', 
        'otp_expires_at'
    ];
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    
    protected $validationRules = [
        'email' => 'required|valid_email|is_unique[admin_users.email,id,{id}]',
        'username' => 'required|min_length[3]|is_unique[admin_users.username,id,{id}]',
        'password' => 'required|min_length[6]'
    ];
    
    // Hash password before insert/update
    protected function hashPassword(array $data)
    {
        if (isset($data['password'])) {
            $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
        }
        return $data;
    }
    
    // Verify password
    public function verifyPassword($plainPassword, $hashedPassword)
    {
        return password_verify($plainPassword, $hashedPassword);
    }
    
    // Generate OTP
    public function generateOTP()
    {
        return sprintf("%06d", mt_rand(1, 999999));
    }
    
    // Save OTP for user
    public function saveOTP($email, $otp)
    {
        $expiresAt = date('Y-m-d H:i:s', strtotime('+15 minutes'));
        
        return $this->where('email', $email)
                    ->set(['otp' => $otp, 'otp_expires_at' => $expiresAt])
                    ->update();
    }
    
    // Verify OTP
    public function verifyOTP($email, $otp)
    {
        $admin = $this->where('email', $email)
                      ->where('otp', $otp)
                      ->where('otp_expires_at >', date('Y-m-d H:i:s'))
                      ->first();
        
        return $admin ? $admin : null;
    }
    
    // Clear OTP after use
    public function clearOTP($email)
    {
        return $this->where('email', $email)
                    ->set(['otp' => null, 'otp_expires_at' => null])
                    ->update();
    }
}