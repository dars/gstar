<?php

class BaseController extends Controller {

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
	}
	public function missingMethod($parameters)
	{
    	echo "您的請求方法 (".$parameters.") 不存在呦~ 啾咪";
	}
}
