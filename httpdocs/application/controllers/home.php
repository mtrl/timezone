<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$data = array();
		$this->load->helper('timezones');
		$data['timezones'] = get_timezones();
		$data['settings'] = $this->load_settings();
		$this->load->view('home', $data);
	}
	
	public function results(){
		$this->load->helper('timezones');

		$timezones = get_timezones();
		$date_format = 'H:i:s dS F Y';
		$data = array();
		// Save the user's settings in a session
		$data['settings'] = $this->save_settings();
		// Get the unix epoch time for the original place
		date_default_timezone_set($this->input->get('user-timezone'));
		$epoch = strtotime($this->input->get('date') . ' ' . $this->input->get('time'));
		// utc time
		$data['utc_time'] = date($date_format, $epoch);
		// Get the time in each of the selected locations
		$times = array();
		if(sizeof($this->input->get('compare')) > 0) {
			foreach($this->input->get('compare') as $timezone){
				$time = array();
				date_default_timezone_set($timezone);
				$time['timezone'] = $timezone;
				$time['nice'] = $timezones[$timezone];
				$time['time'] = date($date_format, $epoch);
				$times[] = $time;
			}
		}
		$data['times'] = $times;
		$data['timezones'] = $timezones;
		$data['form_data'] = $this->input;
		
		$this->load->view('home', $data);
	}
	
	private function save_settings()
	{
		$settings = array();
		$settings['time'] = $this->input->get('time');
		$settings['date'] = $this->input->get('date');
		$settings['user-timezone'] = $this->input->get('user-timezone');
		$settings['compare'] = $this->input->get('compare');
		$this->load->library('session');
		$this->session->set_userdata(array('settings' => $settings));
		return $settings;
	}
	
	private function load_settings() {
		$this->load->library('session');
		$settings = array();
		if(!empty($this->session->userdata['settings'])) {
			$settings = $this->session->userdata['settings'];
		}
		return $settings;
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */