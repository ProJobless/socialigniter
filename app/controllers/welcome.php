<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends Public_Controller {

	/**
	 * Index Page for this controller
	 */
	public function index(){
		//Views
        $data['main_content'] = 'public/welcome/index';
        $this->load->view('public/template', $data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */