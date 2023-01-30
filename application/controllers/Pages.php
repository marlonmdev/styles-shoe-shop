<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pages extends CI_Controller {

	public function index(){
		$this->load->model('pagesmodel');
		$data['items'] = $this->pagesmodel->get_best_sellers();
		$this->load->view('pages/header');
		$this->load->view('pages/home', $data);
		$this->load->view('pages/footer');

	}

	public function privacy_policy(){
		$this->load->view('pages/header');
		$this->load->view('pages/privacy');
		$this->load->view('pages/footer');
	}

	public function about(){
		$this->load->view('pages/header');
		$this->load->view('pages/about');
		$this->load->view('pages/footer');
	}

	function test1(){
		$name = 'Marlon';
		$this->session->set_userdata('name', $name);
		echo "The session library was set.";
	}

	function test(){
		$length = 10;
		echo $this->generate_random_string($length);
	}

	function generate_random_string($length){
		$characters = '23456789abcdefghjkmnpqrstuvwxyzABCDEFGHJKMNPQRSTUVWXYZ';
		$randomString = '';
		for($i=0;$i < $length;$i++){
			$randomString .= $characters[rand(0, strlen($characters) -1 )];
		}
		return $randomString;
	}

	public function products(){
		$this->load->library('pagination');
		$config['base_url'] = base_url().'Nike';
		$config['uri_segment'] = 2;
		$config['per_page'] = 12;

		//pagination style
		$config['first_link'] = 'First';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['last_link'] = 'Last';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a href="#">';
		$config['cur_tag_close'] = '</a></li>';

		$page = $this->uri->segment(2);
		$brand = 'Nike';

		$this->load->model('pagesmodel');

		$data['items'] = $this->pagesmodel->get_items($config['per_page'], $page, $brand);
		$config['total_rows'] = $this->pagesmodel->get_product_total_rows();
		$data['num'] = $this->pagesmodel->get_number_items($brand);
		$this->pagination->initialize($config);
		$data['pagination'] = $this->pagination->create_links();
		$this->load->view('pages/header');
		$this->load->view('pages/products',$data);
		$this->load->view('pages/footer');
	}

	public function nike(){
		$this->load->library('pagination');
		$config['base_url'] = base_url().'Nike';
		$config['uri_segment'] = 2;
		$config['per_page'] = 12;

		//pagination style
		$config['first_link'] = 'First';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['last_link'] = 'Last';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a href="#">';
		$config['cur_tag_close'] = '</a></li>';

		$page = $this->uri->segment(2);
		$brand = $this->uri->segment(1);

		$this->load->model('pagesmodel');

		$data['items'] = $this->pagesmodel->get_items($config['per_page'], $page, $brand);
		$config['total_rows'] = $this->pagesmodel->get_product_total_rows();
		$data['num'] = $this->pagesmodel->get_number_items($brand);
		$this->pagination->initialize($config);
		$data['pagination'] = $this->pagination->create_links();
		$this->load->view('pages/header');
		$this->load->view('pages/nike',$data);
		$this->load->view('pages/footer');
	}

	public function nike_price_low(){
		$this->load->library('pagination');
		$config['base_url'] = base_url().'Nike';
		$config['uri_segment'] = 2;
		$config['per_page'] = 12;

		//pagination style
		$config['first_link'] = 'First';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['last_link'] = 'Last';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a href="#">';
		$config['cur_tag_close'] = '</a></li>';

		$page = $this->uri->segment(2);
		$brand = $this->uri->segment(1);

		$this->load->model('pagesmodel');

		$data['items'] = $this->pagesmodel->get_items_low($config['per_page'], $page, $brand);
		$config['total_rows'] = $this->pagesmodel->get_product_total_rows();
		$data['num'] = $this->pagesmodel->get_number_items($brand);
		$this->pagination->initialize($config);
		$data['pagination'] = $this->pagination->create_links();
		$this->load->view('pages/header');
		$this->load->view('pages/nike',$data);
		$this->load->view('pages/footer');
	}

	public function nike_price_high(){
		$this->load->library('pagination');
		$config['base_url'] = base_url().'Nike';
		$config['uri_segment'] = 2;
		$config['per_page'] = 12;

		//pagination style
		$config['first_link'] = 'First';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['last_link'] = 'Last';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a href="#">';
		$config['cur_tag_close'] = '</a></li>';

		$page = $this->uri->segment(2);
		$brand = $this->uri->segment(1);

		$this->load->model('pagesmodel');

		$data['items'] = $this->pagesmodel->get_items_high($config['per_page'], $page, $brand);
		$config['total_rows'] = $this->pagesmodel->get_product_total_rows();
		$data['num'] = $this->pagesmodel->get_number_items($brand);
		$this->pagination->initialize($config);
		$data['pagination'] = $this->pagination->create_links();
		$this->load->view('pages/header');
		$this->load->view('pages/nike',$data);
		$this->load->view('pages/footer');
	}

	public function rebook(){
		$this->load->library('pagination');
		$config['base_url'] = base_url().'Rebook';
		$config['uri_segment'] = 2;
		$config['per_page'] = 12;

		//pagination style
		$config['first_link'] = 'First';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['last_link'] = 'Last';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a href="#">';
		$config['cur_tag_close'] = '</a></li>';

		$page = $this->uri->segment(2);
		$brand = $this->uri->segment(1);

		$this->load->model('pagesmodel');

		$data['items'] = $this->pagesmodel->get_items($config['per_page'], $page, $brand);
		$config['total_rows'] = $this->pagesmodel->get_product_total_rows();
		$data['num'] = $this->pagesmodel->get_number_items($brand);
		$this->pagination->initialize($config);
		$data['pagination'] = $this->pagination->create_links();
		$this->load->view('pages/header');
		$this->load->view('pages/rebook',$data);
		$this->load->view('pages/footer');
	}

	public function rebook_price_low(){
		$this->load->library('pagination');
		$config['base_url'] = base_url().'Rebook';
		$config['uri_segment'] = 2;
		$config['per_page'] = 12;

		//pagination style
		$config['first_link'] = 'First';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['last_link'] = 'Last';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a href="#">';
		$config['cur_tag_close'] = '</a></li>';

		$page = $this->uri->segment(2);
		$brand = $this->uri->segment(1);

		$this->load->model('pagesmodel');

		$data['items'] = $this->pagesmodel->get_items_low($config['per_page'], $page, $brand);
		$config['total_rows'] = $this->pagesmodel->get_product_total_rows();
		$data['num'] = $this->pagesmodel->get_number_items($brand);
		$this->pagination->initialize($config);
		$data['pagination'] = $this->pagination->create_links();
		$this->load->view('pages/header');
		$this->load->view('pages/rebook',$data);
		$this->load->view('pages/footer');
	}

	public function rebook_price_high(){
		$this->load->library('pagination');
		$config['base_url'] = base_url().'Rebook';
		$config['uri_segment'] = 2;
		$config['per_page'] = 12;

		//pagination style
		$config['first_link'] = 'First';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['last_link'] = 'Last';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a href="#">';
		$config['cur_tag_close'] = '</a></li>';

		$page = $this->uri->segment(2);
		$brand = $this->uri->segment(1);

		$this->load->model('pagesmodel');

		$data['items'] = $this->pagesmodel->get_items_high($config['per_page'], $page, $brand);
		$config['total_rows'] = $this->pagesmodel->get_product_total_rows();
		$data['num'] = $this->pagesmodel->get_number_items($brand);
		$this->pagination->initialize($config);
		$data['pagination'] = $this->pagination->create_links();
		$this->load->view('pages/header');
		$this->load->view('pages/rebook',$data);
		$this->load->view('pages/footer');
	}

	public function adidas(){
		$this->load->library('pagination');
		$config['base_url'] = base_url().'Adidas';
		$config['uri_segment'] = 2;
		$config['per_page'] = 12;

		//pagination style
		$config['first_link'] = 'First';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['last_link'] = 'Last';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a href="#">';
		$config['cur_tag_close'] = '</a></li>';

		$page = $this->uri->segment(2);
		$brand = $this->uri->segment(1);

		$this->load->model('pagesmodel');

		$data['items'] = $this->pagesmodel->get_items($config['per_page'], $page, $brand);
		$config['total_rows'] = $this->pagesmodel->get_product_total_rows();
		$data['num'] = $this->pagesmodel->get_number_items($brand);
		$this->pagination->initialize($config);
		$data['pagination'] = $this->pagination->create_links();
		$this->load->view('pages/header');
		$this->load->view('pages/adidas',$data);
		$this->load->view('pages/footer');
	}

	public function adidas_price_low(){
		$this->load->library('pagination');
		$config['base_url'] = base_url().'Adidas';
		$config['uri_segment'] = 2;
		$config['per_page'] = 12;

		//pagination style
		$config['first_link'] = 'First';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['last_link'] = 'Last';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a href="#">';
		$config['cur_tag_close'] = '</a></li>';

		$page = $this->uri->segment(2);
		$brand = $this->uri->segment(1);

		$this->load->model('pagesmodel');

		$data['items'] = $this->pagesmodel->get_items_low($config['per_page'], $page, $brand);
		$config['total_rows'] = $this->pagesmodel->get_product_total_rows();
		$data['num'] = $this->pagesmodel->get_number_items($brand);
		$this->pagination->initialize($config);
		$data['pagination'] = $this->pagination->create_links();
		$this->load->view('pages/header');
		$this->load->view('pages/adidas',$data);
		$this->load->view('pages/footer');
	}

	public function adidas_price_high(){
		$this->load->library('pagination');
		$config['base_url'] = base_url().'Adidas';
		$config['uri_segment'] = 2;
		$config['per_page'] = 12;

		//pagination style
		$config['first_link'] = 'First';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['last_link'] = 'Last';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a href="#">';
		$config['cur_tag_close'] = '</a></li>';

		$page = $this->uri->segment(2);
		$brand = $this->uri->segment(1);

		$this->load->model('pagesmodel');

		$data['items'] = $this->pagesmodel->get_items_high($config['per_page'], $page, $brand);
		$config['total_rows'] = $this->pagesmodel->get_product_total_rows();
		$data['num'] = $this->pagesmodel->get_number_items($brand);
		$this->pagination->initialize($config);
		$data['pagination'] = $this->pagination->create_links();
		$this->load->view('pages/header');
		$this->load->view('pages/adidas',$data);
		$this->load->view('pages/footer');
	}

	public function under_armour(){
		$this->load->library('pagination');
		$config['base_url'] = base_url().'UnderArmour';
		$config['uri_segment'] = 2;
		$config['per_page'] = 12;

		//pagination style
		$config['first_link'] = 'First';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['last_link'] = 'Last';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a href="#">';
		$config['cur_tag_close'] = '</a></li>';

		$page = $this->uri->segment(2);
		$brand = $this->uri->segment(1);

		$this->load->model('pagesmodel');

		$data['items'] = $this->pagesmodel->get_items($config['per_page'], $page, $brand);
		$config['total_rows'] = $this->pagesmodel->get_product_total_rows();
		$data['num'] = $this->pagesmodel->get_number_items($brand);
		$this->pagination->initialize($config);
		$data['pagination'] = $this->pagination->create_links();
		$this->load->view('pages/header');
		$this->load->view('pages/under_armour',$data);
		$this->load->view('pages/footer');
	}

	public function under_armour_price_low(){
		$this->load->library('pagination');
		$config['base_url'] = base_url().'UnderArmour';
		$config['uri_segment'] = 2;
		$config['per_page'] = 12;

		//pagination style
		$config['first_link'] = 'First';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['last_link'] = 'Last';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a href="#">';
		$config['cur_tag_close'] = '</a></li>';

		$page = $this->uri->segment(2);
		$brand = $this->uri->segment(1);

		$this->load->model('pagesmodel');

		$data['items'] = $this->pagesmodel->get_items_low($config['per_page'], $page, $brand);
		$config['total_rows'] = $this->pagesmodel->get_product_total_rows();
		$data['num'] = $this->pagesmodel->get_number_items($brand);
		$this->pagination->initialize($config);
		$data['pagination'] = $this->pagination->create_links();
		$this->load->view('pages/header');
		$this->load->view('pages/under_armour',$data);
		$this->load->view('pages/footer');
	}

	public function under_armour_price_high(){
		$this->load->library('pagination');
		$config['base_url'] = base_url().'UnderArmour';
		$config['uri_segment'] = 2;
		$config['per_page'] = 12;

		//pagination style
		$config['first_link'] = 'First';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['last_link'] = 'Last';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a href="#">';
		$config['cur_tag_close'] = '</a></li>';

		$page = $this->uri->segment(2);
		$brand = $this->uri->segment(1);

		$this->load->model('pagesmodel');

		$data['items'] = $this->pagesmodel->get_items_high($config['per_page'], $page, $brand);
		$config['total_rows'] = $this->pagesmodel->get_product_total_rows();
		$data['num'] = $this->pagesmodel->get_number_items($brand);
		$this->pagination->initialize($config);
		$data['pagination'] = $this->pagination->create_links();
		$this->load->view('pages/header');
		$this->load->view('pages/under_armour',$data);
		$this->load->view('pages/footer');
	}

	public function puma(){
		$this->load->library('pagination');
		$config['base_url'] = base_url().'Puma';
		$config['uri_segment'] = 2;
		$config['per_page'] = 12;

		//pagination style
		$config['first_link'] = 'First';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['last_link'] = 'Last';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a href="#">';
		$config['cur_tag_close'] = '</a></li>';

		$page = $this->uri->segment(2);
		$brand = $this->uri->segment(1);

		$this->load->model('pagesmodel');

		$data['items'] = $this->pagesmodel->get_items($config['per_page'], $page, $brand);
		$config['total_rows'] = $this->pagesmodel->get_product_total_rows();
		$data['num'] = $this->pagesmodel->get_number_items($brand);
		$this->pagination->initialize($config);
		$data['pagination'] = $this->pagination->create_links();
		$this->load->view('pages/header');
		$this->load->view('pages/puma',$data);
		$this->load->view('pages/footer');
	}

	public function puma_price_low(){
		$this->load->library('pagination');
		$config['base_url'] = base_url().'Puma';
		$config['uri_segment'] = 2;
		$config['per_page'] = 12;

		//pagination style
		$config['first_link'] = 'First';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['last_link'] = 'Last';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a href="#">';
		$config['cur_tag_close'] = '</a></li>';

		$page = $this->uri->segment(2);
		$brand = $this->uri->segment(1);

		$this->load->model('pagesmodel');

		$data['items'] = $this->pagesmodel->get_items_low($config['per_page'], $page, $brand);
		$config['total_rows'] = $this->pagesmodel->get_product_total_rows();
		$data['num'] = $this->pagesmodel->get_number_items($brand);
		$this->pagination->initialize($config);
		$data['pagination'] = $this->pagination->create_links();
		$this->load->view('pages/header');
		$this->load->view('pages/puma',$data);
		$this->load->view('pages/footer');
	}

	public function puma_price_high(){
		$this->load->library('pagination');
		$config['base_url'] = base_url().'Puma';
		$config['uri_segment'] = 2;
		$config['per_page'] = 12;

		//pagination style
		$config['first_link'] = 'First';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['last_link'] = 'Last';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a href="#">';
		$config['cur_tag_close'] = '</a></li>';

		$page = $this->uri->segment(2);
		$brand = $this->uri->segment(1);

		$this->load->model('pagesmodel');

		$data['items'] = $this->pagesmodel->get_items_high($config['per_page'], $page, $brand);
		$config['total_rows'] = $this->pagesmodel->get_product_total_rows();
		$data['num'] = $this->pagesmodel->get_number_items($brand);
		$this->pagination->initialize($config);
		$data['pagination'] = $this->pagination->create_links();
		$this->load->view('pages/header');
		$this->load->view('pages/puma',$data);
		$this->load->view('pages/footer');
	}

	public function jordan(){
		$this->load->library('pagination');
		$config['base_url'] = base_url().'Jordan';
		$config['uri_segment'] = 2;
		$config['per_page'] = 12;

		//pagination style
		$config['first_link'] = 'First';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['last_link'] = 'Last';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a href="#">';
		$config['cur_tag_close'] = '</a></li>';

		$page = $this->uri->segment(2);
		$brand = $this->uri->segment(1);

		$this->load->model('pagesmodel');

		$data['items'] = $this->pagesmodel->get_items($config['per_page'], $page, $brand);
		$config['total_rows'] = $this->pagesmodel->get_product_total_rows();
		$data['num'] = $this->pagesmodel->get_number_items($brand);
		$this->pagination->initialize($config);
		$data['pagination'] = $this->pagination->create_links();
		$this->load->view('pages/header');
		$this->load->view('pages/jordan',$data);
		$this->load->view('pages/footer');
	}	

	public function jordan_price_low(){
		$this->load->library('pagination');
		$config['base_url'] = base_url().'Jordan';
		$config['uri_segment'] = 2;
		$config['per_page'] = 12;

		//pagination style
		$config['first_link'] = 'First';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['last_link'] = 'Last';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a href="#">';
		$config['cur_tag_close'] = '</a></li>';

		$page = $this->uri->segment(2);
		$brand = $this->uri->segment(1);

		$this->load->model('pagesmodel');

		$data['items'] = $this->pagesmodel->get_items_low($config['per_page'], $page, $brand);
		$config['total_rows'] = $this->pagesmodel->get_product_total_rows();
		$data['num'] = $this->pagesmodel->get_number_items($brand);
		$this->pagination->initialize($config);
		$data['pagination'] = $this->pagination->create_links();
		$this->load->view('pages/header');
		$this->load->view('pages/jordan',$data);
		$this->load->view('pages/footer');
	}

	public function jordan_price_high(){
		$this->load->library('pagination');
		$config['base_url'] = base_url().'Jordan';
		$config['uri_segment'] = 2;
		$config['per_page'] = 12;

		//pagination style
		$config['first_link'] = 'First';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['last_link'] = 'Last';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a href="#">';
		$config['cur_tag_close'] = '</a></li>';

		$page = $this->uri->segment(2);
		$brand = $this->uri->segment(1);

		$this->load->model('pagesmodel');

		$data['items'] = $this->pagesmodel->get_items_high($config['per_page'], $page, $brand);
		$config['total_rows'] = $this->pagesmodel->get_product_total_rows();
		$data['num'] = $this->pagesmodel->get_number_items($brand);
		$this->pagination->initialize($config);
		$data['pagination'] = $this->pagination->create_links();
		$this->load->view('pages/header');
		$this->load->view('pages/jordan',$data);
		$this->load->view('pages/footer');
	}

	public function lining(){
		$this->load->library('pagination');
		$config['base_url'] = base_url().'Lining';
		$config['uri_segment'] = 2;
		$config['per_page'] = 12;

		//pagination style
		$config['first_link'] = 'First';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['last_link'] = 'Last';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a href="#">';
		$config['cur_tag_close'] = '</a></li>';

		$page = $this->uri->segment(2);
		$brand = $this->uri->segment(1);

		$this->load->model('pagesmodel');

		$data['items'] = $this->pagesmodel->get_items($config['per_page'], $page, $brand);
		$config['total_rows'] = $this->pagesmodel->get_product_total_rows();
		$data['num'] = $this->pagesmodel->get_number_items($brand);
		$this->pagination->initialize($config);
		$data['pagination'] = $this->pagination->create_links();
		$this->load->view('pages/header');
		$this->load->view('pages/lining',$data);
		$this->load->view('pages/footer');
	}

	public function lining_price_low(){
		$this->load->library('pagination');
		$config['base_url'] = base_url().'Lining';
		$config['uri_segment'] = 2;
		$config['per_page'] = 12;

		//pagination style
		$config['first_link'] = 'First';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['last_link'] = 'Last';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a href="#">';
		$config['cur_tag_close'] = '</a></li>';

		$page = $this->uri->segment(2);
		$brand = $this->uri->segment(1);

		$this->load->model('pagesmodel');

		$data['items'] = $this->pagesmodel->get_items_low($config['per_page'], $page, $brand);
		$config['total_rows'] = $this->pagesmodel->get_product_total_rows();
		$data['num'] = $this->pagesmodel->get_number_items($brand);
		$this->pagination->initialize($config);
		$data['pagination'] = $this->pagination->create_links();
		$this->load->view('pages/header');
		$this->load->view('pages/lining',$data);
		$this->load->view('pages/footer');
	}

	public function lining_price_high(){
		$this->load->library('pagination');
		$config['base_url'] = base_url().'Lining';
		$config['uri_segment'] = 2;
		$config['per_page'] = 12;

		//pagination style
		$config['first_link'] = 'First';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['last_link'] = 'Last';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a href="#">';
		$config['cur_tag_close'] = '</a></li>';

		$page = $this->uri->segment(2);
		$brand = $this->uri->segment(1);

		$this->load->model('pagesmodel');

		$data['items'] = $this->pagesmodel->get_items_high($config['per_page'], $page, $brand);
		$config['total_rows'] = $this->pagesmodel->get_product_total_rows();
		$data['num'] = $this->pagesmodel->get_number_items($brand);
		$this->pagination->initialize($config);
		$data['pagination'] = $this->pagination->create_links();
		$this->load->view('pages/header');
		$this->load->view('pages/lining',$data);
		$this->load->view('pages/footer');
	}

	public function dc(){
		$this->load->library('pagination');
		$config['base_url'] = base_url().'DC';
		$config['uri_segment'] = 2;
		$config['per_page'] = 12;

		//pagination style
		$config['first_link'] = 'First';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['last_link'] = 'Last';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a href="#">';
		$config['cur_tag_close'] = '</a></li>';

		$page = $this->uri->segment(2);
		$brand = $this->uri->segment(1);

		$this->load->model('pagesmodel');

		$data['items'] = $this->pagesmodel->get_items($config['per_page'], $page, $brand);
		$config['total_rows'] = $this->pagesmodel->get_product_total_rows();
		$data['num'] = $this->pagesmodel->get_number_items($brand);
		$this->pagination->initialize($config);
		$data['pagination'] = $this->pagination->create_links();
		$this->load->view('pages/header');
		$this->load->view('pages/dc',$data);
		$this->load->view('pages/footer');
	}

	public function dc_price_low(){
		$this->load->library('pagination');
		$config['base_url'] = base_url().'DC';
		$config['uri_segment'] = 2;
		$config['per_page'] = 12;

		//pagination style
		$config['first_link'] = 'First';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['last_link'] = 'Last';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a href="#">';
		$config['cur_tag_close'] = '</a></li>';

		$page = $this->uri->segment(2);
		$brand = $this->uri->segment(1);

		$this->load->model('pagesmodel');

		$data['items'] = $this->pagesmodel->get_items_low($config['per_page'], $page, $brand);
		$config['total_rows'] = $this->pagesmodel->get_product_total_rows();
		$data['num'] = $this->pagesmodel->get_number_items($brand);
		$this->pagination->initialize($config);
		$data['pagination'] = $this->pagination->create_links();
		$this->load->view('pages/header');
		$this->load->view('pages/dc',$data);
		$this->load->view('pages/footer');
	}

	public function dc_price_high(){
		$this->load->library('pagination');
		$config['base_url'] = base_url().'DC';
		$config['uri_segment'] = 2;
		$config['per_page'] = 12;

		//pagination style
		$config['first_link'] = 'First';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['last_link'] = 'Last';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a href="#">';
		$config['cur_tag_close'] = '</a></li>';

		$page = $this->uri->segment(2);
		$brand = $this->uri->segment(1);

		$this->load->model('pagesmodel');

		$data['items'] = $this->pagesmodel->get_items_high($config['per_page'], $page, $brand);
		$config['total_rows'] = $this->pagesmodel->get_product_total_rows();
		$data['num'] = $this->pagesmodel->get_number_items($brand);
		$this->pagination->initialize($config);
		$data['pagination'] = $this->pagination->create_links();
		$this->load->view('pages/header');
		$this->load->view('pages/dc',$data);
		$this->load->view('pages/footer');
	}

	public function converse(){
		$this->load->library('pagination');
		$config['base_url'] = base_url().'Converse';
		$config['uri_segment'] = 2;
		$config['per_page'] = 12;

		//pagination style
		$config['first_link'] = 'First';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['last_link'] = 'Last';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a href="#">';
		$config['cur_tag_close'] = '</a></li>';

		$page = $this->uri->segment(2);
		$brand = $this->uri->segment(1);

		$this->load->model('pagesmodel');

		$data['items'] = $this->pagesmodel->get_items($config['per_page'], $page, $brand);
		$config['total_rows'] = $this->pagesmodel->get_product_total_rows();
		$data['num'] = $this->pagesmodel->get_number_items($brand);
		$this->pagination->initialize($config);
		$data['pagination'] = $this->pagination->create_links();
		$this->load->view('pages/header');
		$this->load->view('pages/converse',$data);
		$this->load->view('pages/footer');
	}

	public function converse_price_low(){
		$this->load->library('pagination');
		$config['base_url'] = base_url().'Converse';
		$config['uri_segment'] = 2;
		$config['per_page'] = 12;

		//pagination style
		$config['first_link'] = 'First';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['last_link'] = 'Last';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a href="#">';
		$config['cur_tag_close'] = '</a></li>';

		$page = $this->uri->segment(2);
		$brand = $this->uri->segment(1);

		$this->load->model('pagesmodel');

		$data['items'] = $this->pagesmodel->get_items_low($config['per_page'], $page, $brand);
		$config['total_rows'] = $this->pagesmodel->get_product_total_rows();
		$data['num'] = $this->pagesmodel->get_number_items($brand);
		$this->pagination->initialize($config);
		$data['pagination'] = $this->pagination->create_links();
		$this->load->view('pages/header');
		$this->load->view('pages/converse',$data);
		$this->load->view('pages/footer');
	}

	public function converse_price_high(){
		$this->load->library('pagination');
		$config['base_url'] = base_url().'Converse';
		$config['uri_segment'] = 2;
		$config['per_page'] = 12;

		//pagination style
		$config['first_link'] = 'First';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['last_link'] = 'Last';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a href="#">';
		$config['cur_tag_close'] = '</a></li>';

		$page = $this->uri->segment(2);
		$brand = $this->uri->segment(1);

		$this->load->model('pagesmodel');

		$data['items'] = $this->pagesmodel->get_items_high($config['per_page'], $page, $brand);
		$config['total_rows'] = $this->pagesmodel->get_product_total_rows();
		$data['num'] = $this->pagesmodel->get_number_items($brand);
		$this->pagination->initialize($config);
		$data['pagination'] = $this->pagination->create_links();
		$this->load->view('pages/header');
		$this->load->view('pages/converse',$data);
		$this->load->view('pages/footer');
	}

	public function search_item(){
		$brand = $this->input->post('brand');
		$search = $this->input->post('search');
		$this->load->model('pagesmodel');
		$data['search'] = $this->pagesmodel->search_item($brand, $search);
		$this->load->view('pages/header');
		$this->load->view('pages/'.$brand,$data);
		$this->load->view('pages/header');

	}

	public function show_item(){
		$id = $this->uri->segment(3);
		$this->load->model('pagesmodel');
		$data['items'] = $this->pagesmodel->retrieve_item($id);
		$data['num'] = $this->pagesmodel->get_quantity($id);
		$item = $this->pagesmodel->retrieve_item($id);
		$brand = $item->brand;
		$category = $item->cat;
		$data['similar'] = $this->pagesmodel->get_similar_items($id, $brand, $category);
		$count = $this->pagesmodel->get_similar_num($id, $brand, $category);
		if($count){
			$data['title'] = "Similar Products";
		}else{
			$data['title'] = "";
		}
		$this->load->view('pages/header');
		$this->load->view('pages/show_item', $data);
		$this->load->view('pages/footer');
	}


	public function register(){
		$config_image = array();
		$config_image['upload_path'] = './images/customers';
		$config_image['allowed_types'] = 'jpg|png|gif';
		$config_image['max_size'] = '1024';

		$this->form_validation->set_rules('fname', 'First Name', 'trim|xss_clean');
		$this->form_validation->set_rules('lname', 'Last Name', 'trim|xss_clean');
		$this->form_validation->set_rules('email', 'Email', 'trim|valid_email|is_unique[s3_customers.email]|xss_clean');
		$this->form_validation->set_rules('pass1', 'Password', 'trim|md5|xss_clean');
		$this->form_validation->set_rules('pass2', 'Confirm Password', 'trim|matches[pass1]|md5|xss_clean');

		if($this->form_validation->run() == false){
			$this->load->view('pages/header');
			$this->load->view('pages/home');
			$this->load->view('pages/footer');
		}else{
			$fname = $this->input->post('fname');
			$lname = $this->input->post('lname');
			$email = $this->input->post('email');
			$pword = $this->input->post('pass2');

			$this->load->library('upload',$config_image);
			$this->upload->do_upload();
			$data = array('upload_data' => $this->upload->data());
			$this->image_resize($data['upload_data']['full_path'], $data['upload_data']['file_name']);
			$data = array(
				'fname' => $fname,
				'lname' => $lname,
				'email' => $email,
				'picture' => $data['upload_data']['file_name'],
				'pword' => $pword
			);
			$this->load->model('pagesmodel');
			$inserted = $this->pagesmodel->register($data);
			if($inserted){
				$this->session->set_flashdata('success', 'Account successfully created! Please add your shipping and billing info below:');
				redirect('update_account/'.$this->db->insert_id());
			}else{
				$arr = array('error' => 'Register Failed!');
				$this->session->set_flashdata($arr);
				redirect(base_url(),'refresh');
			}
		}
	}

	public function image_resize($path,$file){
		$config_resize = array();
		$config_resize['image_library'] = 'gd2';
		$config_resize['source_image'] = $path;
		$config_resize['maintain_ratio'] = TRUE;
		$config_resize['width'] = '50';
		$config_resize['height'] = '50';
		$config_resize['new_image'] = './images/customers/thumbs/'.$file;
		$this->load->library('image_lib', $config_resize);
		$this->image_lib->resize();
	}


	public function sign_in(){
		$this->form_validation->set_rules('email', 'email', 'trim|valid_email|xss_clean');
		$this->form_validation->set_rules('pword', 'Password', 'trim|xss_clean');


		if($this->form_validation->run() == false){
			$this->load->view('pages/header');
			$this->load->view('pages/home');
			$this->load->view('pages/footer');
		}else{
			$email = $this->input->post('email');
			$pword = md5($this->input->post('pword'));
			$this->load->model('pagesmodel');
			$customer = $this->pagesmodel->verify_sign_in($email,$pword);
			if($customer->email != '' && $customer->pword == $pword){
			$customer = array(
				'id' => $customer->id,
				'fname' => $customer->fname,
				'lname' => $customer->lname,
				'email' => $customer->email,
				'picture' => $customer->picture,
				'signed_in' => true
				);
			$this->session->set_userdata($customer);
			$this->session->set_flashdata("success", "Sign In Successfully!");
			redirect('view_cart');
			}
			else
			{
				$this->session->set_flashdata("error", "Invalid email or password!");
				redirect(base_url());
			}
		}
	}

	public function account_update(){
		$id = $this->uri->segment(2);
		$data['heading'] = "Add Info to Your Account";
		$data['title'] = "Add Info";
		$data['id'] = $id;
		$this->load->view('pages/header');
		$this->load->view('pages/add_account_info', $data);
		$this->load->view('pages/footer');
	}
		
	public function account(){
		$id = $this->session->userdata('id');
		$this->load->model('pagesmodel');
		$found = $this->pagesmodel->find_customer_id($id);
		if($found){
			$data['heading'] = "Update Your Account Info";
			$data['title'] = "Update Info";
			$this->load->view('pages/header');
			$this->load->view('pages/update_account', $data);
			$this->load->view('pages/footer');
		}else{
			$data['heading'] = "Add Info to Your Account";
			$data['title'] = "Add Info";
			$this->load->view('pages/header');
			$this->load->view('pages/update_account', $data);
			$this->load->view('pages/footer');
		}
		
	}

	public function update_info(){

		$this->form_validation->set_rules('s_lname', 'Shipping Contact Number', 'trim|numeric|xss_clean');
		$this->form_validation->set_rules('s_address', 'Shipping Address', 'trim|xss_clean');
		$this->form_validation->set_rules('s_city', 'Shipping City', 'trim|xss_clean');
		$this->form_validation->set_rules('s_zip', 'Shipping Zip Code', 'trim|xss_clean');
		$this->form_validation->set_rules('b_lname', 'Billing Contact Number', 'trim|numeric|xss_clean');
		$this->form_validation->set_rules('b_address', 'Billing Address', 'trim|xss_clean');
		$this->form_validation->set_rules('b_city', 'Billing City', 'trim|xss_clean');
		$this->form_validation->set_rules('b_zip', 'Billing Zip Code', 'trim|xss_clean');

		if($this->form_validation->run() == false){
			$this->load->view('pages/header');
			$this->load->view('pages/update_account');
			$this->load->view('pages/footer');
		}else{
			$id = $this->input->post('id'); 
			$s_cont = $this->input->post('s_cont'); 
			$s_addr = $this->input->post('s_addr'); 
			$s_city = $this->input->post('s_city'); 
			$s_zip = $this->input->post('s_zip');
			$b_cont = $this->input->post('s_cont'); 
			$b_addr = $this->input->post('s_addr'); 
			$b_city = $this->input->post('s_city'); 
			$b_zip = $this->input->post('s_zip');
			
			$this->load->model('pagesmodel');
			$found = $this->pagesmodel->find_customer_id($id);
			if($found){
				$data=array(
				'cust_id' => $id,
				's_cont' => $s_cont,
				's_addr' => $s_addr,
				's_city' => $s_city,
				's_zip' => $s_zip,
				'b_cont' => $b_cont,
				'b_addr' => $b_addr,
				'b_city' => $b_city,
				'b_zip' => $b_zip
				);
				$result = $this->pagesmodel->update_info($data, $id);
				if($result){
					$this->session->set_flashdata("success", "Account Updated Successfully!");
					redirect('view_cart');
				}
				else{
					$this->session->set_flashdata("error", "Something went wrong! We could not update your account info at this moment!");
					redirect('update_account');
				}
			}else{
				$data=array(
				'cust_id' => $id,
				's_cont' => $s_cont,
				's_addr' => $s_addr,
				's_city' => $s_city,
				's_zip' => $s_zip,
				'b_cont' => $b_cont,
				'b_addr' => $b_addr,
				'b_city' => $b_city,
				'b_zip' => $b_zip
				);
				$result = $this->pagesmodel->add_info($data);
				if($result){
					$this->session->set_flashdata("success", "Account Info Added Successfully!");
					redirect('view_cart');
				}
				else{
					$this->session->set_flashdata("error", "Something went wrong! We could not update your account info at this moment!");
					redirect('update_account');
				}
			}
					
		}
	}

	public function user_log_out()
	{
		$this->session->unset_userdata('id');
		$this->session->unset_userdata('fname');
		$this->session->unset_userdata('lname');
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('picture');
		$this->session->unset_userdata('signed_in');
		redirect('/');
	}

	public function log_out()
	{
		$this->session->unset_userdata('id');
		$this->session->unset_userdata('fname');
		$this->session->unset_userdata('lname');
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('picture');
		$this->session->unset_userdata('signed_in');
		$this->session->set_flashdata('success', 'Successfully logged out!');
		redirect('/');
	}


}
