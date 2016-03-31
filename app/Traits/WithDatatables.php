<?php

namespace App\Traits;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use DB;
use Datatables;

trait WithDatatables
{
    protected $tableModel = null;

    public function ajaxData(Request $request)
    {
        if (!is_null($this->tableModel)) {
            DB::statement(DB::raw('set @rownum=0'));
            $columns = $this->tableModel->getFillable();
            array_unshift($columns, DB::raw('@rownum := @rownum + 1 AS rownum'));
            $models = $this->tableModel->select($columns);

            if (isset($this->relation)) {
                $models = $models->with($this->relation);
            }

            $dataTables = Datatables::of($models);
            $dataTables->addColumn('action', function($model) {
                return $this->getActionButton($model);
            });


            if ($keyword = $request->get('search')['value']) {
                $dataTables->filterColumn('rownum', 'whereRaw', '@rownum  + 1 like ?', ["%{$keyword}%"]);
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

    private function getActionButton($model)
    {
        return '<a class="btn btn-xs btn-primary btn-edit" data-value="'.$model->uuid.'"><i class="glyphicon glyphicon-edit"></i> Edit</a> &nbsp;' .
        '<a class="btn btn-xs btn-danger btn-delete" data-value="'.$model->uuid.'" data-info="'.$this->getDataName($model).'"><i class="glyphicon glyphicon-remove"></i> Delete</a> &nbsp;';
    }
}
