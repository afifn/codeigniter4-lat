<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Users;
use CodeIgniter\Database\Query;

class AuthController extends BaseController
{
    protected $user;
    public function __construct()
    {
        $this->user = new Users();
    }
    public function index()
    {
        return view('admin/login');
    }

    public function authenticate()
    {
        $post  = $this->request->getPost();
        $query = $this->user->where('email', $post['email'])->first();
        if ($query) {
            if ($query['role'] == 'admin') {
                if (password_verify($post['password'], $query['password'])) {
                    echo 'login success';
                    print_r($query);

                    $params = ['id_user' => $query['id_user']];
                    session()->set($params);
                } else {
                    return redirect()->back()->with('message', 'Your password are wrong!');
                }
            } else {
                return redirect()->back()->with('message', 'can\'t access this page!');
            }
        } else {
            return redirect()->back()->with('message', 'Your credentials are wrong!');
        }
    }
}
