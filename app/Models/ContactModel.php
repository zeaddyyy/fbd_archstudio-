<?php

namespace App\Models;

use CodeIgniter\Model;

class ContactModel extends Model
{
    protected $table      = 'contact_inquiries';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'name',
        'phone',
        'email',
        'service',
        'message',
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    protected $validationRules = [
        'name'    => 'required|min_length[2]|max_length[100]',
        'phone'   => 'required|max_length[20]',
        'email'   => 'required|valid_email',
        'service' => 'required',
        'message' => 'required|min_length[10]',
    ];

    public function saveInquiry(array $data): bool
    {
        return $this->insert($data) !== false;
    }

    public function getLatest(int $limit = 20): array
    {
        return $this->orderBy('created_at', 'DESC')->findAll($limit);
    }

    public function getByService(string $service): array
    {
        return $this->where('service', $service)
                    ->orderBy('created_at', 'DESC')
                    ->findAll();
    }
}