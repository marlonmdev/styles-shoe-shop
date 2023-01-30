<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function index(){
		$this->load->view('admin/login');
	}

	public function date_formats($timestamp, $format){
		switch ($format){
			case 'full';
			//Full //Friday 18th of February 2018 at 10:00:00 AM
			$the_date = date('l jS \of F Y \a\t h:i:s A', $timestamp);
			break;
			case 'cool';
			//Full //Friday 18th of February 2018
			$the_date = date('l jS \of F Y', $timestamp);
			break;
			case 'shorter':
			//Shorter // 18th of February 2018
			$the_date = date('jS \of F Y', $timestamp);
			break;
			case 'mini';
			//Mini // 18th of Feb 2018
			$the_date = date('jS M Y', $timestamp);
			break;
			case 'oldschool';
			//Oldschool // 18/2/18
			$the_date = date('j\/n\/y', $timestamp);
			break;
			case 'datepicker';
			//Datepicker // 18/2/18
			$the_date = date('d\-m\-Y', $timestamp);
			break;
		}
		return $the_date;
	}

	public function login_parse(){
		$this->form_validation->set_rules('usrname', 'Username', 'trim|xss_clean');
		$this->form_validation->set_rules('pword', 'Password', 'trim|xss_clean|md5');
		if($this->form_validation->run() == false){
			$this->load->view('admin/login');
		}else{
			$email = $this->input->post('email');
			$pword = $this->input->post('pword');
			$this->load->model('adminmodel');
			$user = $this->adminmodel->retrieve_one_account($email);
			if($user->email == $email && $user->passw == $pword){
				$user = array(
					'user_id' => $user->id,
					'email' => $user->email,
					'username' => $user->usrname,
					'logged_in' => true
					);
				$this->session->set_userdata($user);
				redirect('panel');
			}else{
				$this->session->set_flashdata("error", "Invalid email or password!");
				redirect('login');
			}
		}
	}


	public function logout(){
		$this->session->sess_destroy();
		redirect('login');
	}

	public function products(){
		$this->load->library('pagination');
		$config['base_url'] = base_url().'admin/products';
		$config['uri_segment'] = 3;
		$config['per_page'] = 6;

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

		$page = $this->uri->segment(3,0);		

		$this->load->model('adminmodel');
		$data['content'] = $this->adminmodel->get_products($config['per_page'], $page);
		$config['total_rows'] = $this->adminmodel->get_product_total_rows();	
		$this->pagination->initialize($config);
		$data['pagination'] = $this->pagination->create_links();

		$this->load->view('admin/header');
		$this->load->view('admin/panel', $data);
		$this->load->view('admin/footer');
	}

	public function stock_add(){
		$id = $this->uri->segment(3);
		$this->load->model('adminmodel');
		$data['item'] = $this->adminmodel->get_item_stock($id);
		$this->load->view('admin/header');
		$this->load->view('admin/stock_add', $data);
		$this->load->view('admin/footer');
	}

	public function stock_update(){
		$id = $this->input->post('id');
		$this->form_validation->set_rules('stock', 'Stocks', 'trim|xss_clean|numeric');
		if($this->form_validation->run() == false){
			$arr = array ('error' => 'Stock must be numeric!');
			$this->session->set_flashdata($arr);
			redirect('stock/add/'.$id, 'refresh');
		}else{
			$id = $this->input->post('id');
			$current_stock = $this->input->post('current_stock');
			$stock =  $this->input->post('stock');
			$new_stock = $current_stock + $stock;
			$data = array('stock' => $new_stock);
			$this->load->model('adminmodel');
			$updated = $this->adminmodel->update_stock($id, $data);
			if($updated){
			$arr = array ('success' => 'Stock Updated Successfully!');
					$this->session->set_flashdata($arr);
					redirect('panel','refresh');
			}else{
				$arr = array ('error' => 'Stock Update Failed!');
				$this->session->set_flashdata($arr);
				redirect('panel','refresh');
			}
		}
		
	}

	public function product_upload(){
		$config_image = array();
		$config_image['upload_path'] = './images';
		$config_image['allowed_types'] = 'jpg|png|gif';
		$config_image['max_size'] = '1024';

		$this->form_validation->set_rules('brand', 'Brand', 'trim|xss_clean');
		$this->form_validation->set_rules('name', 'Shoe name', 'trim|xss_clean');
		$this->form_validation->set_rules('price', 'Price', 'trim|xss_clean|numeric');
		$this->form_validation->set_rules('cat', 'Category', 'trim|xss_clean');
		$this->form_validation->set_rules('descr', 'Description', 'trim|xss_clean');
		$this->form_validation->set_rules('size', 'Size', 'trim|xss_clean|numeric');
		$this->form_validation->set_rules('stock', 'Stocks', 'trim|xss_clean|numeric');

		if($this->form_validation->run() == false){
			$this->load->model('adminmodel');
			$data['content'] = $this->adminmodel->get_products();
			$this->load->view('admin/header');
			$this->load->view('admin/panel', $data);
			$this->load->view('admin/footer');
		}else{
			$brand =  $this->input->post('brand');
			$name =  $this->input->post('name');
			$price =  $this->input->post('price');
			$cat =  $this->input->post('cat');
			$descr =  $this->input->post('descr');
			$size =  $this->input->post('size');
			$stock =  $this->input->post('stock');
			$this->load->library('upload',$config_image);
			$this->upload->do_upload();
			$data = array('upload_data' => $this->upload->data());
			$this->image_resize($data['upload_data']['full_path'], $data['upload_data']['file_name']);
			$product = array(
				'brand' => $brand,
				'name' => $name,
				'price' => $price,
				'cat' => $cat,
				'descr' => $descr,
				'size' => $size,
				'stock' => $stock,
				'sold' => 0,
				'picture' =>  $data['upload_data']['file_name'],
			);
			$this->load->model('adminmodel');
			$uploaded = $this->adminmodel->insert_product($product);
			if ($uploaded){
			$arr = array ('success' => 'Product Added Successfully!');
					$this->session->set_flashdata($arr);
					redirect('panel','refresh');
			}else{
				$arr = array ('error' => 'Product Add Failed!');
				$this->session->set_flashdata($arr);
				redirect('panel','refresh');
			}
		}
		
	}

	public function image_resize($path,$file){
		$config_resize = array();
		$config_resize['image_library'] = 'gd2';
		$config_resize['source_image'] = $path;
		$config_resize['maintain_ratio'] = TRUE;
		$config_resize['width'] = '120';
		$config_resize['height'] = '100';
		$config_resize['new_image'] = './images/thumb/'.$file;
		$this->load->library('image_lib', $config_resize);
		$this->image_lib->resize();
	}

	
	public function product_delete(){
		$id = $this->uri->segment(3);
		$this->load->model('adminmodel');
		$result = $this->adminmodel->delete_product($id);
		if($result){
			$arr = array ('success' => 'Product Deleted Successfully!');
			$this->session->set_flashdata($arr);
			redirect('panel','refresh');
		}
		else{
			$arr = array ('error' => 'Product Delete Failed!');
			$this->session->set_flashdata($arr);
			redirect('panel','refresh');
		}
	}

	public function product_edit(){
		$id = $this->uri->segment(3);
		$this->load->model('adminmodel');
		$data['row'] = $this->adminmodel->get_product_by_id($id);
		$this->load->view('admin/header');
		$this->load->view('admin/product_edit', $data);
		$this->load->view('admin/footer');
	}

	public function product_update(){
		$config_image = array();
		$config_image['upload_path'] = './images';
		$config_image['allowed_types'] = 'jpg|png|gif';
		$config_image['max_size'] = '1024';

		$this->form_validation->set_rules('brand', 'Brand', 'trim|xss_clean');
		$this->form_validation->set_rules('name', 'Shoe name', 'trim|xss_clean');
		$this->form_validation->set_rules('price', 'Price', 'trim|xss_clean|numeric');
		$this->form_validation->set_rules('cat', 'Category', 'trim|xss_clean');
		$this->form_validation->set_rules('decr', 'Description', 'trim|xss_clean');
				$this->form_validation->set_rules('stock', 'Stocks', 'trim|xss_clean|numeric');

		if($this->form_validation->run() == false){
			$id = $this->uri->segment(3);
			$this->load->model('adminmodel');
			$data['content'] = $this->adminmodel->get_products();
			$this->load->view('admin/header');
			$this->load->view('admin/panel', $data);
			$this->load->view('admin/footer');
		}else{
			$id = $this->input->post('id');
			$brand =  $this->input->post('brand');
			$name =  $this->input->post('name');
			$price =  $this->input->post('price');
			$cat =  $this->input->post('cat');
			$descr =  $this->input->post('descr');
			$size =  $this->input->post('size');
			$stock =  $this->input->post('stock');
			$this->load->library('upload',$config_image);
			$this->upload->do_upload();
			$data = array('upload_data' => $this->upload->data());
			$this->image_resize($data['upload_data']['full_path'], $data['upload_data']['file_name']);
			$product = array(
				'brand' => $brand,
				'name' => $name,
				'price' => $price,
				'cat' => $cat,
				'descr' => $descr,
				'size' => $size,
				'stock' => $stock,
				'picture' =>  $data['upload_data']['file_name']
			);
			$this->load->model('adminmodel');
			$updated = $this->adminmodel->product_update($id,$product);
			if ($updated){
				$arr = array ('success' => 'Item Updated Successfully!');
				$this->session->set_flashdata($arr);
				redirect('panel','refresh');
			}else{
				$arr = array ('error' => 'Item Update Failed!');
				$this->session->set_flashdata($arr);
				redirect('panel','refresh');
			}
		}
	}

	public function orders(){
		$this->load->library('pagination');
		$config['base_url'] = base_url().'admin/orders';
		$config['uri_segment'] = 3;
		$config['per_page'] = 5;

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

		$page = $this->uri->segment(3,0);		

		$this->load->model('adminmodel');
		$data['content'] = $this->adminmodel->get_orders($config['per_page'], $page);
		$config['total_rows'] = $this->adminmodel->get_orders_total_rows();	
		$this->pagination->initialize($config);
		$data['pagination'] = $this->pagination->create_links();

		$this->load->view('admin/header');
		$this->load->view('admin/orders', $data);
		$this->load->view('admin/footer');
	}

	public function sales(){	
		$this->load->library('pagination');
		$config['base_url'] = base_url().'admin/sales';
		$config['uri_segment'] = 3;
		$config['per_page'] = 10;

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
		$page = $this->uri->segment(3,0);		

		$this->load->model('adminmodel');
		$data['content'] = $this->adminmodel->get_sales($config['per_page'], $page);
		$config['total_rows'] = $this->adminmodel->get_sales_total_rows();	
		$this->pagination->initialize($config);
		$data['pagination'] = $this->pagination->create_links();


		$this->load->view('admin/header');
		$this->load->view('admin/sales', $data);
		$this->load->view('admin/footer');
	}

	public function change_order_status(){
		$id = $this->input->post('id');
		$status = $this->input->post('status');
		$amount = $this->input->post('amount');
		$this->load->model('adminmodel');
		$data= array('status'=> $status);
		$sale = array('amount'=>$amount);
		if($status == 'received'){
			$updated = $this->adminmodel->change_order_status($id, $data);
			$sales = $this->adminmodel->add_sales($sale);	
			if($updated){
			$arr = array ('success' => 'Status Changed Successfully!');
				$this->session->set_flashdata($arr);
				redirect('orders','refresh');
			}else{
				$arr = array('error' => 'Status Change Failed!');
				$this->session->set_flashdata($arr);
				redirect('orders','refresh');
			}		
		}else{
		$updated = $this->adminmodel->change_order_status($id, $data);
		if($updated){
			$arr = array ('success' => 'Status Changed Successfully!');
				$this->session->set_flashdata($arr);
				redirect('orders','refresh');
			}else{
				$arr = array('error' => 'Status Change Failed!');
				$this->session->set_flashdata($arr);
				redirect('orders','refresh');
		}
	}
		
	}

	public function order_details(){
		$cust_id = $this->uri->segment(3);
		$order_ref = $this->input->post('order_ref');
		$this->load->model('adminmodel');
		$data['customer'] = $this->adminmodel->get_customer($cust_id);
		$data['details'] = $this->adminmodel->get_customer_details($cust_id);
		$data['order'] = $this->adminmodel->get_total($order_ref);
		$data['items'] = $this->adminmodel->get_order_details($order_ref);
		$this->load->view('admin/header');
		$this->load->view('admin/order_details', $data);
		$this->load->view('admin/footer');
	}

	public function accounts(){
		$this->load->model('adminmodel');
		$data['content'] = $this->adminmodel->get_accounts();
		$this->load->view('admin/header');
		$this->load->view('admin/accounts', $data);
		$this->load->view('admin/footer');
	}


	public function account_insert(){
		$this->form_validation->set_rules('email', 'Email', 'trim|valid_email|is_unique[s3_admins.email]|xss_clean');
		$this->form_validation->set_rules('usrname', 'Username', 'trim|is_unique[s3_admins.usrname]|xss_clean');
		$this->form_validation->set_rules('pass1', 'Password', 'trim|xss_clean');
		$this->form_validation->set_rules('pass2', 'Password Confirm', 'trim|xss_clean|matches[pass1]');

		if($this->form_validation->run() == false){
			$this->load->model('adminmodel');
			$data['content'] = $this->adminmodel->get_accounts();
			$this->load->view('admin/header');
			$this->load->view('admin/accounts', $data);
			$this->load->view('admin/footer');
		}else{
			$email = $this->input->post('email');
			$usrname = $this->input->post('usrname');
			$passw = md5($this->input->post('pass2'));
			$data = array(
				'email' => $email,
				'usrname' => $usrname,
				'passw' => $passw
			);
			$this->load->model('adminmodel');
			$inserted = $this->adminmodel->insert_account($data);
			if($inserted){
				$arr = array ('success' => 'Account Saved Successfully!');
				$this->session->set_flashdata($arr);
				redirect('accounts','refresh');
			}else{
				$arr = array('error' => 'Account Save Failed!');
				$this->session->set_flashdata($arr);
				redirect('accounts','refresh');
			}
		}
	}

	public function account_edit(){
		$id = $this->uri->segment(3);
		$this->load->model('adminmodel');
		$data['row'] = $this->adminmodel->get_account_by_id($id);
		$this->load->view('admin/header');
		$this->load->view('admin/account_edit', $data);
		$this->load->view('admin/footer');
	}

	public function account_delete(){
		$id = $this->uri->segment(3);
		$this->load->model('adminmodel');
		$result = $this->adminmodel->delete_account($id);
		if($result){
			$arr = array ('success' => 'Product Deleted Successfully!');
			$this->session->set_flashdata($arr);
			redirect('accounts','refresh');
		}
		else{
			$arr = array ('error' => 'Account Delete Failed!');
			$this->session->set_flashdata($arr);
			redirect('accounts','refresh');
		}
	}

	public function account_update(){
		$id = $this->input->post('id');
		$this->form_validation->set_rules('email', 'Email', 'trim|valid_email|xss_clean');
		$this->form_validation->set_rules('usrname', 'Username', 'trim|xss_clean');
		$this->form_validation->set_rules('pass1', 'Password', 'trim|xss_clean');
		$this->form_validation->set_rules('pass2', 'Confirm Password', 'trim|xss_clean|matches[pass1]');
		
		if($this->form_validation->run() == false){
			$this->load->model('adminmodel');
			$data['row'] = $this->adminmodel->get_account_by_id($id);
			$this->load->view('admin/header');
			$this->load->view('admin/account_edit', $data);
			$this->load->view('admin/footer');
		}else{
			$id=$this->input->post('id');
			$email = $this->input->post('email');
			$usrname = $this->input->post('usrname');
			$pword = md5($this->input->post('pass2'));
			$this->load->model('adminmodel');
			$admin = $this->adminmodel->password_verify($id);
			if($admin->passw == $pword){
				$this->load->model('adminmodel');
					$id=$this->input->post('id');
					$data = array('email'=>$email, 'usrname'=>$usrname);
					$updated = $this->adminmodel->update_admin_account($id, $data);
					if($updated){
						$arr = array('success' => 'Account Updated Successfully!');
						$this->session->set_flashdata($arr);
						redirect('accounts','refresh');
					}else{
						$arr = array('error' => 'Accout Update Failed!');
						$this->session->set_flashdata($arr);
						redirect('accounts','refresh');
					}
			}else{
				$id = $admin->id;
				$arr = array('error' => 'Invalid Password!');
				$data['row'] = $this->adminmodel->get_account_by_id($id);
				$this->session->set_flashdata($arr);
				redirect('account/edit/'.$id, $data);
			}
		}
	}

}
