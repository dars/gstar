<?php
namespace Controllers;
use BaseController;
use Taxonomy;
use stdClass;

class TaxonomyController extends BaseController {
	public function get_taxo2($parent_id)
	{
		$this->layout = null;
		$res = new stdClass;
		$res->html = '';
		$res->success = true;
        $model = Taxonomy::select(array('id', 'name'))->where('parent_id', '=', $parent_id)->orderby('weight','desc')->get()->toArray();
        foreach($model as $t){
            $res->html .= '<option value='.$t['id'].'>'.$t['name'].'</option>';
        }
        echo json_encode($res);
	}
}
