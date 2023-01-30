<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ShoppingCart extends CI_Model {

	public function find($id){
		$this->db->where('id', $id);
		$query = $this->db->get('s3_products');
		if($query){
			return $query->row();
		}else{
			return false;
		}

	}

	public function retrieve_one_customer($cust_id){
		$this->db->where('id', $cust_id);
		$query = $this->db->get('s3_customers');
		if($query){
			return $query->row();
		}else{
			return false;
		}
	}

	public function order($data1){
		$query = $this->db->insert('s3_orders', $data1);
		if($query){
			return $this->db->insert_id();
		}else{
			return false;
		}
	}

	public function get_order_ref($id){
		$this->db->where('id', $id);
		$query = $this->db->get('s3_orders');
		if($query){
			return $query->row();
		}else{
			return false;
		}
	}


	public function place_order($data2){
		$query = $this->db->insert('s3_order_details', $data2);
		if($query){
			return true;
		}else{
			return false;
		}
	}

	public function get_item($id){
		$this->db->where('id', $id);
		$query = $this->db->get('s3_products');
		if($query){
			return $query->row();
		}else{
			return false;
		}
	}

	public function update_product_stock($id, $stock){
		$this->db->where('id', $id);
		$query = $this->db->update('s3_products', $stock);
		if($query){
			return TRUE;
		}else{
			return FALSE;
		}
	}

}