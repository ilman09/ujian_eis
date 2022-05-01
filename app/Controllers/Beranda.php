<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;

class Beranda extends ResourceController
{
    public function __construct() {
       
    }
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {
        $berandas = $this->berandaModel->findAll();

        $payload = [
            "berandas" => $berandas
        ];

        echo view('beranda/index', $payload);
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
        echo view('beranda/new');
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
            "status" => $this->request->getPost('status'),
        ];


        $this->berandaModel->insert($payload);
        return redirect()->to('/beranda');
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
        $berandas = $this->session->get('berandas');
        $data = null;

        $_new_berandas = [];

        foreach ($berandas as $item) {
            if ($item['id'] == $id) {
                $data = $item;
                continue;
            }

            array_push($_new_berandas, $item);
        }

        if (!$data) {
            throw new \Exception("Data not found!");
        }

        $this->session->set('berandas', $_new_berandas);
        return redirect()->to('/beranda');
    }
}
