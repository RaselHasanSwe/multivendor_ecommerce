<?php
namespace App\Services\Admin;

use Illuminate\Http\Request;

class DatatableService {

    protected $limit;
    protected $start;
    protected $order;
    protected $dir;
    protected $model;
    protected $relations;
    protected $searchColumn;
    protected $searchValue;
    protected $whereCondition;

    public function datatable( $model, Request $request, $columns, $searchColumn = [], $relations = [], $whereCondition = [])
    {
        $this->limit = $request->input('length');
        $this->start = $request->input('start');
        $this->order = $columns[$request->input('order.0.column')];
        $this->dir = $request->input('order.0.dir');
        $this->searchValue =$request->input('search.value');
        $this->model = $model;
        $this->relations = $relations;
        $this->searchColumn = $searchColumn;
        $this->whereCondition = $whereCondition;
        $data['totalData'] =  $this->itemCount();
        $data['totalFiltered'] = (empty($this->searchValue)) ? $this->itemCount() : $this->searchItem( true );
        $data['items'] = (empty($this->searchValue)) ? $this->items() : $this->searchItem();
        return $data;
    }

    public function itemCount()
    {   $query = $this->model::query();
        if (count($this->whereCondition)) $query->where($this->whereCondition);
        return $query->count();
    }

    public function getRelation()
    {
        $data = [];
        if(count($this->relations)){
            foreach($this->relations as $key => $realtion){
                $data[] = $key;
            }
        }
        return $data;
    }

    public function items()
    {
        $query = $this->model::query();
        if(count($this->whereCondition)) $query->where($this->whereCondition);
        if(count($this->relations)) $query->with($this->getRelation());
        $query->offset($this->start);
        $query->limit($this->limit)
        ->orderBy($this->order,$this->dir);
        $data = $query->get();
        return $data;
    }

    public function searchItem( $count = false )
    {
        $searchColumn   = $this->searchColumn;
        $relations      = $this->relations;
        $search         = $this->searchValue;

        $query          = $this->model::query();
        if (count($this->whereCondition)) $query->where($this->whereCondition);
        $query->where( function($query) use($search, $searchColumn, $relations){
            foreach( $searchColumn as $key => $item ){
                if($key == 0 ) $query->where($item,'LIKE',"%{$search}%");
                $query->orWhere($item, 'LIKE',"%{$search}%");
            }
            if(count($relations)){
                foreach($relations as $key1 => $relation){
                    $query->orWhereHas($key1, function($q) use ($search, $relation ) {
                        foreach($relation as $key2 => $val){
                            if($key2 == 0) $q->where($val, 'LIKE', "%{$search}%");
                            $q->orWhere($val, 'LIKE', "%{$search}%");
                        }
                        return $q;
                    });
                }
            }
            return $query;
        })
        ->offset($this->start)
        ->limit($this->limit)
        ->orderBy($this->order,$this->dir);
        $data = ($count === true) ? $query->count() : $query->get();
        return $data;

    }

    public function drow( Request $request, $totalData, $totalFiltered, $data)
    {
        $item = [
            "draw"            => intval($request->input('draw')),
            "recordsTotal"    => intval($totalData),
            "recordsFiltered" => intval($totalFiltered),
            "data"            => $data
        ];
        return json_encode($item);
    }
}
