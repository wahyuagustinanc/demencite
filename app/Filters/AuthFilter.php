<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class AuthFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        if (!session('email')) {
            return redirect()->to(base_url('/'));
        }
        // if (session()->get('level') == "") {
        //     session()->setFlashdata('pesan', 'Silakan melakukan login terlebih dahulu');
        //     return redirect()->to(base_url('auth/login'));
        // }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // if (session()->get('level') == 1) {
        //     return redirect()->to(base_url('home'));
        // }
    }
}
