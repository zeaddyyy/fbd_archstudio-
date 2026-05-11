<?php

namespace App\Controllers;

use App\Models\ContactModel;
use CodeIgniter\Controller;

class Contact extends Controller
{
    public function index()
    {
        return view('contact');
    }

    public function send()
    {
        $data = [

            'name' => (string)
            $this->request->getPost('name'),

            'phone' => (string)
            $this->request->getPost('phone'),

            'email' => (string)
            $this->request->getPost('email'),

            'service' => (string)
            $this->request->getPost('service'),

            'message' => (string)
            $this->request->getPost('message'),
        ];

        $model = new ContactModel();

        $model->saveInquiry($data);

        $whatsappMessage = urlencode(

            "Hello FB Design Studio\n\n" .

            "Name: {$data['name']}\n" .

            "Phone: {$data['phone']}\n" .

            "Email: {$data['email']}\n" .

            "Service: {$data['service']}\n" .

            "Message: {$data['message']}"
        );

        return redirect()->to(

            "https://wa.me/917359129662?text={$whatsappMessage}"
        );
    }
}