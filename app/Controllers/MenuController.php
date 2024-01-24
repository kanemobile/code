<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Menu;
use Hermawan\DataTables\DataTable;

class MenuController extends BaseController {

    protected $menu;

    public function __construct() {
        $this->menu = new Menu();
    }

    public function index() {
        return view('menu/index');
    }

    public function getMenus() {
        $this->menu->select('id, nom, parent_id');

        return DataTable::of($this->menu)
                        ->edit('parent_id', function ($row) {
                            return ($row->parent_id != 0) ? $this->menu->find($row->parent_id)->nom : 0;
                        })
                        ->add('action', function ($row) {
                            return '<a href="' . url_to('menus.edit', $row->id) . '" class="btn btn-primary">Edit</a>';
                        })
                        ->toJson();
    }

    public function ajouter() {

        $parents = $this->menu->findAll();

        $tableau = array();

        $tableau[0] = 'No Parent';

        foreach ($parents as $value) {
            $tableau[$value->id] = $value->nom;
        }

        return view('menu/nouveau', compact('tableau'));
    }

    public function store() {
        if (!$this->validate(
                        [
                            'nom' => 'required|max_length[255]|is_unique[menus.nom]',
                        ])) {

            return redirect()->back()->withInput();
        } else {
            $data = [
                "nom" => $this->request->getPost("nom"),
                'parent_id' => $this->request->getPost('parent'),
                'icon' => $this->request->getPost('icon'),
            ];
            $this->menu->insert($data);
            return redirect('menu')->with('success', 'Données enregistrées avec succès');
        }
    }
}
