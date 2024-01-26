<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use Myth\Auth\Models\GroupModel;
use App\Models\Menu;
use App\Models\GroupMenu;
use Hermawan\DataTables\DataTable;

class GroupeController extends BaseController {

    protected $groupe;
    protected $menu;
    protected $groupmenu;

    public function __construct() {
        $this->groupe = new GroupModel();
        $this->menu = new Menu();
        $this->groupmenu = new GroupMenu();
    }

    public function index() {
        return view('groupe/index');
    }

    public function ajouter() {

        return view('groupe/nouveau');
    }

    public function store() {

        if (!$this->validate(
            [
                'name' => 'required|max_length[255]|is_unique[auth_groups.name]',
                'description' => 'max_length[255]',
            ])) {

            return redirect()->back()->withInput();
        } else {
            $data = [
                "name" => $this->request->getPost("name"),
                'description' => $this->request->getPost('description'),
            ];
            $this->groupe->insert($data);

            return redirect('groupe')->with('success', 'Données enregistrées avec succès');
        }
    }

    public function getGroupes() {

        $this->groupe->select('id, name, description');

        return DataTable::of($this->groupe)
            ->edit('description', function ($row) {
                return htmlspecialchars_decode($row->description);
            })
            ->add('action', function ($row) {
                return '<a href="' . url_to('groupes.edit', $row->id) . '" class="btn btn-primary">Edit</a>';
            })
            ->toJson();
    }

    public function edit($id) {
        $groupe = $this->groupe->find($id);

        $menus = $this->menu->where('parent_id', 0)->findAll();

        $groupmenus = $this->groupmenu->getGroupMenu($id);

        $tableau = array();

        foreach ($groupmenus as $grs) {
            $tableau[] = $grs->menus_id;
        }

        return view('groupe/edit', compact('groupe', 'menus', 'tableau'));
    }

    public function update() {

        $rules = [
            'id' => 'max_length[19]|is_natural_no_zero',
            'name' => 'required|max_length[255]|is_unique[auth_groups.name,id,{id}]',
            'description' => 'max_length[255]',
        ];

        if (!$this->validate($rules)) {

            return redirect()->back()->withInput();
        } else {


            $this->groupe->update(
                $this->request->getPost('id'),
                [
                    'name' => $this->request->getPost('name'),
                    'description' => $this->request->getPost('description'),
                ]
            );

            $this->groupmenu->where('group_id', $this->request->getPost('id'))->delete();

            $menus = $this->request->getPost('menu');

            if (!is_null($menus)) {
                foreach ($menus as $m) {
                    $this->groupmenu->insert([
                        'group_id' => $this->request->getPost('id'),
                        'menus_id' => $m
                    ]);
                }
            }

            return redirect('groupe')->with('success', 'Données enregistrées avec succès');
        }
    }
}
