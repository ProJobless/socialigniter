<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends Public_Controller {

	/**
	 * Index Page for this controller
	 */
	public function index(){
		$data = array('randomcode' => $this->_randomcode(10));
		//Views
        $this->load->view('public/welcome/index',$data);
	}

	private function _randomcode($length) {
        $len = $length;
        $base = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz123456789";
        $max = strlen($base) - 1;
        $randomcode = '';
        mt_srand((double) microtime() * 1000000);

        while (strlen($randomcode) < $len + 1) {
            $randomcode.=$base[mt_rand(0, $max)];
        }

            return $randomcode;
    }
}