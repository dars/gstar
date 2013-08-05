<?php
class Taxonomy extends Eloquent
{
    protected $softDelete = true;

    static public function getTaxo1()
    {
        $res = array();
        $model = Taxonomy::select(array('id', 'name'))->where('parent_id', '=', 0)->orderby('weight','desc')->get()->toArray();
        foreach($model as $t){
            $res[''] = '請選擇';
            $res[$t['id']] = $t['name'];
        }
        return $res;
    }

    static public function getTaxo2($id)
    {
        $res = array();
        $model = Taxonomy::find($id);
        $model2 = Taxonomy::select(array('id', 'name'))->where('parent_id', '=', $model->parent_id)->orderby('weight','desc')->get()->toArray();
        foreach($model2 as $t){
            $res[$t['id']] = $t['name'];
        }
        return $res;
    }

    static public function getParentId($id)
    {
        $res = array();
        $model = Taxonomy::find($id);
        return $model['parent_id'];
    }
}
