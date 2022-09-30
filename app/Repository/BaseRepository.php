<?php
namespace App\Repository;

use Illuminate\Database\Eloquent\Model;

abstract class BaseRepository {

    public $table;

    public function __construct(Model $model){
        $this->table = $model;
    }

    public function getAll(){
        return $this->table::all();
    }

    public function getById($id){
        return $this->table::findorFail($id);
    }

    public function create($model){
        if ($model->save())
            return $model;
        else {
            return null;
        }
    }
    
    public function update($id, $values){
        $item = $this->table::where('id',$id)->first();
        $item->update($values);
        return $item;
    }

    public function delete($model){
        return $model->delete();
    }

    public function softDelete($model)
    {
        $model->update(['is_deleted' => 1]);
        return true;
    }

}
