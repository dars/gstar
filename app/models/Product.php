<?php
class Product extends Eloquent
{
    protected $softDelete = true;

    public function tabs()
    {
        return $this->hasMany('Tab');
    }
}
