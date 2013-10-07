<?php
class Product extends Eloquent
{
    protected $softDelete = true;

    public function tabs()
    {
        return $this->hasMany('Tab');
    }

    static public function getImages($prod_id, $multi = false)
    {
        $pixs = Image::where('product_id', '=', $prod_id)->orderby('id','asc')->get()->toArray();
        if(count($pixs) > 0) {
            if($multi) {
                return $pixs;
            } else {
                return $pixs[0]['name'];
            }
        } else {
            return false;
        }
    }
}
