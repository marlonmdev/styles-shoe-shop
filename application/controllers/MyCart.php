<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MyCart extends CI_Controller {

	public function add_to_cart(){
		$id = $this->uri->segment(3);
		$this->load->model('shoppingcart');
		$qty = $this->input->post('qty');
		$product = $this->shoppingcart->find($id);
		$data = array(
			'pic'    => $product->picture,
			'id'     => $product->id,
			'size'   => $product->size,
			'qty'    => $qty,
			'name'   => $product->brand.' '.$product->name,
			'price'  => $product->price,
		);

		$this->cart->insert($data);
		$prev = $_SERVER['HTTP_REFERER'];
		redirect($prev);
		
	}

	public function remove_item(){
		$id = $this->uri->segment(3);
		$this->cart->update(array('rowid' => $id, 'qty' => 0));
		redirect('view_cart');
	}
	
	public function view_cart(){
		$rows = count($this->cart->contents());
		if($rows == 0){
			$this->load->view('pages/header');
			$this->load->view('pages/no_cart');
			$this->load->view('pages/footer');
		}else{
			$this->load->view('pages/header');
			$this->load->view('pages/shopping_cart');
			$this->load->view('pages/footer');
		}			
	}

	public function clear_cart(){
		$this->cart->destroy();
		$this->load->view('pages/header');
		$this->load->view('pages/no_cart');
		$this->load->view('pages/footer');
	}

	function test(){
		$length = 10;
		echo $this->generate_random_string($length);
	}

	function generate_random_string(){
		$characters = '23456789abcdefghjkmnpqrstuvwxyzABCDEFGHJKMNPQRSTUVWXYZ';
		$randomString = '';
		for($i=0;$i < 10;$i++){
			$randomString .= $characters[rand(0, strlen($characters) -1 )];
		}
		return $randomString;
	}

	public function order(){
		$cust_id = $this->uri->segment(2);
		$this->load->model('shoppingcart');
		$customer = $this->shoppingcart->retrieve_one_customer($cust_id);
		$order_ref = $this->generate_random_string();
		$data1 = array(
				'order_ref' => $order_ref,
		    	'cust_id' => $cust_id,
		        'name' => $customer->fname.' '.$customer->lname,
		        'email' => $customer->email,
		        'total' => $this->cart->total(),
		        'status' => 'order in process'
		    );
		$order_id = $this->shoppingcart->order($data1);
		$this->load->model('shoppingcart');
		$data = $this->shoppingcart->get_order_ref($order_id);
		foreach($this->cart->contents() as $row) {
		     $data2 = array(
		     	'order_ref' => $data->order_ref,
		    	'cust_id' => $cust_id,
		    	'item_id' => $row['id'],
					'item_pic' => $row['pic'],
					'item_name' => $row['name'],
					'item_size' => $row['size'],
					'item_qty' => $row['qty'],
					'item_price' => $row['price'],
					'item_subtotal' => $row['subtotal'],
		    );
		    $result =$this->shoppingcart->place_order($data2);
		    $id = $row['id'];
		    $product = $this->shoppingcart->get_item($id);
		    $stock = array('stock' => $product->stock - $row['qty'], 'sold' =>$product->sold + $row['qty']);
		    $this->shoppingcart->update_product_stock($id, $stock);
		}
		if($result){
   			$this->cart->destroy();
   			redirect('success/'.$order_id);
   		}else{
   			$this->session->set_flashdata('error', 'Sorry, Unable to place your order!');
   			redirect('view_cart');
   		}
		
	}

	public function success(){
		$id = $this->uri->segment(2);
		$this->load->model('shoppingcart');
		$data['row'] = $this->shoppingcart->get_order_ref($id);
		$this->load->view('pages/success', $data);
	}

}
