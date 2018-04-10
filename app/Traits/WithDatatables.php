<?php

namespace App\Traits;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use DB;
use Datatables;
use Auth;

trait WithDatatables
{
    protected $tableModel = null;
    private $columnConfigs = [];

    public function ajaxData(Request $request)
    {
        if (!is_null($this->tableModel)) {
            $models = $this->tableModel;
            if (isset($this->relation)) {
                $models = $this->tableModel->with($this->relation);
            }

            $dataTables = Datatables::of($models->get());
            $this->columnConfigs = $this->getColumnConfigs($this->dtMode);
            foreach ($this->columnConfigs as $mode => $idColumn) {
                switch ($mode) {
                    case 'action':
                        $dataTables->addColumn('action', function($model) use ($idColumn) {
                            return $this->getActionButton($model, $idColumn);
                        });
                        break;

                    case 'checkbox':
                        $dataTables->addColumn('checkbox', function($model) use ($idColumn) {
                            return $this->getCheckBox($model, $idColumn);
                        });
                        break;
                }
            }

            return $dataTables->make(true);
        } else {
            //TODO: throw exception
        }
    }

    public function getDataName($model)
    {
        return $model->name;
    }

    private function getActionButton($model, $idColumn)
    {
        return '<a class="btn btn-xs btn-primary btn-edit" data-value="'.$model->getAttribute($idColumn).'"><i class="fa fa-edit"></i> Edit</a> &nbsp;' .
        '<a class="btn btn-xs btn-danger btn-delete" data-value="'.$model->getAttribute($idColumn).'" data-info="'.$this->getDataName($model).'"><i class="fa fa-trash"></i> Delete</a> &nbsp;';
    }

    private function getCheckbox($model, $idColumn)
    {
        return '<input type="checkbox" name="checkbox" value="'.$model->getAttribute($idColumn).'" />';
    }

    private function getColumnConfigs()
    {
        $configs = [];
        foreach ($this->dtMode as $mode) {
            $values = explode(':', $mode);
            $configs[$values[0]] = isset($values[1]) ? $values[1] : 'id';
        }

        return $configs;
    }
}
