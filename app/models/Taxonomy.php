<?php
class Taxonomy extends Eloquent
{
    protected $softDelete = true;

    // 取得所有主分類
    static public function getTaxo1()
    {
        $res = array();
        $model = Taxonomy::select(array('id', 'name'))->where('parent_id', '=', 0)->orderBy('weight','desc')->get()->toArray();
        foreach($model as $t){
            $res[''] = '請選擇';
            $res[$t['id']] = $t['name'];
        }
        return $res;
    }

    // 去得同層所有次分類
    static public function getTaxo2($id)
    {
        $res = array();
        $model = Taxonomy::find($id);
        $model2 = Taxonomy::select(array('id', 'name'))->where('parent_id', '=', $model->parent_id)->orderBy('weight','desc')->get()->toArray();
        foreach($model2 as $t){
            $res[$t['id']] = $t['name'];
        }
        return $res;
    }

    // 取得母分類id
    static public function getParentId($id)
    {
        $res = array();
        $model = Taxonomy::find($id);
        return $model['parent_id'];
    }

    // 取得分類名
    static public function getName($id)
    {
        $model = Taxonomy::find($id);
        return $model->name;
    }

    // 取得分類名
    static public function getImage($id)
    {
        $model = Taxonomy::find($id);
        return $model->image;
    }

    // 以名稱取得id
    static public function getTaxoId($name, $parent_id=0)
    {
        $model = Taxonomy::select(array('id'))->where('name', '=', $name)->where('parent_id', '=', $parent_id)->get()->toArray();
        if($model){
            return $model[0]['id'];
        } else {
            return 0;
        }
    }

    // 取得所有分類, with_photo 含第一項產品圖
    static public function getMenu($with_photo = false)
    {
        $menu = array();
        $model = Taxonomy::select(array('id','name'))->where('parent_id', '=', 0)->orderBy('weight', 'desc')->get()->toArray();
        foreach($model as $t) {
            $model2 = Taxonomy::select(array('id', 'name'))->where('parent_id', '=', $t['id'])->orderBy('weight', 'desc')->get()->toArray();
            $t['child'] = array();
            foreach($model2 as $t2) {
                if($with_photo) {
                    $model3 = Product::where('taxonomy_id', '=', $t2['id'])->orderBy('weight', 'desc')->get()->toArray();
                    if($model3){
                        $obj = $model3[0];
                        $img = Image::where('product_id', '=', $obj['id'])->orderBy('id', 'asc')->get()->toArray();
                        if($img){
                            $pix = $img[0];
                            $t2['image'] = $pix['name'];
                        }
                    }
                }
                array_push($t['child'], $t2);
            }
            array_push($menu, $t);
        }
        return $menu;
    }
}
