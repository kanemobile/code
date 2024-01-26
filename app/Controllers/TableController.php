<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Table;
use App\Models\Menu;
use Hermawan\DataTables\DataTable;

class TableController extends BaseController {

    protected $table;
    protected $menu;

    public function __construct() {
        $this->table = new Table();
        $this->menu = new Menu();
    }

    public function index() {
        return view('table/index');
    }

    public function getMenus() {
        $this->table->select('id, nom, url');

        return DataTable::of($this->table)
                        ->add('action', function ($row) {
                            return '<a href="' . url_to('tables.edit', $row->id) . '" class="btn btn-primary">Edit</a>';
                        })
                        ->toJson();
    }

    public function ajouter() {

        $menus = $this->menu->findAll();

        $tableau = array();

        foreach ($menus as $value) {
            $tableau[$value->id] = $value->nom;
        }

        return view('table/nouveau', compact('tableau'));
    }

    public function store() {
        if (!$this->validate(
                        [
                            'nom' => 'required|max_length[255]|is_unique[tables.nom]',
                            'url' => 'required',
                        ])) {

            return redirect()->back()->withInput();
        } else {
            $data = [
                "menu_id" => $this->request->getPost("menu"),
                "nom" => $this->request->getPost("nom"),
                'url' => $this->request->getPost('url'),
                'icon' => $this->request->getPost('icon'),
            ];
            $this->table->insert($data);
            return redirect('table')->with('success', 'Données enregistrées avec succès');
        }
    }

    public function edit($id) {
        $table = $this->table->find($id);

        $menus = $this->menu->findAll();

        $tableau = array();

        $tableau[$table->menu_id] = $this->menu->find($table->menu_id)->nom;

        foreach ($menus as $value) {
            $tableau[$value->id] = $value->nom;
        }

        return view('table/edit', compact('table', 'tableau'));
    }

    public function update() {

        $rules = [
            'id' => 'max_length[19]|is_natural_no_zero',
            'nom' => 'required|max_length[255]|is_unique[tables.nom,id,{id}]',
            'url' => 'required',
        ];

        if (!$this->validate($rules)) {

            return redirect()->back()->withInput();
        } else {


            $this->table->update(
                    $this->request->getPost('id'),
                    [
                        'menu_id' => $this->request->getPost('menu'),
                        'nom' => $this->request->getPost('nom'),
                        'url' => $this->request->getPost('url'),
                        'icon' => $this->request->getPost('icon'),
                    ]
            );
            return redirect('table')->with('success', 'Données enregistrées avec succès');
        }
    }
}
