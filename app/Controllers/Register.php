<?php

namespace App\Controllers;

use App\Models\User;
use CodeIgniter\RESTful\ResourceController;
use App\Models\UserModel;

class Register extends ResourceController
{
    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->user = new User();
    }
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {
        echo view('auth/register');
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {
        //
    }

    /**
     * Return a new resource object, with default properties
     *
     * @return mixed
     */
    public function new()
    {
        //
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        $payload = [
            "name" => $this->request->getPost('name'),
            "email" => $this->request->getPost('email'),
            "password" => sha1(md5($this->request->getPost('password'))),
        ];

        $this->user->put($payload);
        return redirect()->to('login');
    }

    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
    public function edit($id = null)
    {
        //
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    {
        //
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        //
    }
}
