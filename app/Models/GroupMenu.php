<?php

namespace App\Models;

use CodeIgniter\Model;

class GroupMenu extends Model
{
    protected $table            = 'groupmenus';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function getGroupMenu($id) {
        $found = $this->builder()
            ->select('groupmenus.*')
            ->join('auth_groups', 'groupmenus.group_id = auth_groups.id')
            ->where('auth_groups.id', $id)
            ->get()->getResult();

        return $found;
    }

    public function getMenus($groupe) {
        $found = $this->builder()
            ->select('menus.*')
            ->join('menus', 'groupmenus.menu_id = menus.id')
            ->where('groupmenus.group_id', $groupe)
            ->get()->getResult();

        return $found;
    }
}
