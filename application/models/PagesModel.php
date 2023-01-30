<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class PagesModel extends CI_Model {


	private $lastQuery = '';


	public function get_items($limit,$start,$brand){
		$this->db->where('brand', $brand);
		$stock = 0;
		$this->db->where('stock !=', $stock);
		$this->db->limit($limit, $start);
		$this->db->order_by('added_at', 'desc');
		$query = $this->db->get('s3_products');
		$this->lastQuery = $this->db->last_query();
		if($query){
			return $query->result();
		}else{
			return false;
		}
	}

	public function get_items_low($limit,$start,$brand){
		$this->db->where('brand', $brand);
		$stock = 0;
		$this->db->where('stock !=', $stock);
		$this->db->limit($limit, $start);
		$this->db->order_by('price', 'asc');
		$query = $this->db->get('s3_products');
		$this->lastQuery = $this->db->last_query();
		if($query){
			return $query->result();
		}else{
			return false;
		}
	}

	public function get_items_high($limit,$start,$brand){
		$this->db->where('brand', $brand);
		$stock = 0;
		$this->db->where('stock !=', $stock);
		$this->db->limit($limit, $start);
		$this->db->order_by('price', 'desc');
		$query = $this->db->get('s3_products');
		$this->lastQuery = $this->db->last_query();
		if($query){
			return $query->result();
		}else{
			return false;
		}
	}

	public function get_best_sellers(){
		$this->db->where("stock !=", 0);
		$this->db->order_by("sold", "desc");
		$this->db->limit(4);
		$query = $this->db->get('s3_products'); 
		if($query){
			return $query->result();
		}else{
			return false;
		}
	}

	public function get_similar_items($id, $brand, $category){
		$this->db->where('id !=', $id);
		$this->db->where('brand', $brand);
		$this->db->where('cat', $category);
		$this->db->order_by('id', 'RANDOM');
		$this->db->limit(4);
		$query = $this->db->get('s3_products');
		if($query){
			return $query->result();
		}else{
			return FALSE;
		}
	}

	public function get_similar_num($id, $brand, $category){
		$this->db->where('id !=', $id);
		$this->db->where('brand', $brand);
		$this->db->where('cat', $category);
		$this->db->order_by('id', 'RANDOM');
		$this->db->limit(4);
		$query = $this->db->get('s3_products');
		if($query->num_rows() >= 1){
			return TRUE;
		}else{
			return FALSE;
		}
	}
 
	public function get_product_total_rows(){
		$sql = explode('LIMIT', $this->lastQuery);
		$query = $this->db->query($sql[0]);
		$result = $query->result();
		return count($result);

	}

	public function get_number_items($brand){
		$this->db->where('brand', $brand);
		$this->db->from('s3_products');
		$query = $this->db->count_all_results();
		return $query;
	}

	public function search_item($brand, $search){
		$this->db->where('brand', $brand, 'name', $search);
		$query = $this->db->get('s3_products');
		if($query){
			return $query->row();
		}else{
			return false;
		}
	}

	public function retrieve_item($id){
		$this->db->where('id', $id);
		$query = $this->db->get('s3_products');
		if($query){
			return $query->row();
		}else{
			return false;
		}
	}

	public function get_quantity($id){
		$this->db->where('id', $id);
		$query = $this->db->get('s3_products');
		if($query){
			return $query->row();
		}else{
			return false;
		}
	}

	public function retrieve_one_customer($id){
		$this->db->where('id', $id);
		$query = $this->db->get('s3_customers');
		if($query){
			return $query->row();
		}else{
			return false;
		}
	}

	public function verify_sign_in($email){
		$this->db->where('email', $email);
		$query = $this->db->get('s3_customers');
		if($query){
			return $query->row();
		}else{
			return false;
		}
	}

	public function register($data){
		$query = $this->db->insert('s3_customers', $data);
		if($query){
			return $this->db->insert_id();
		}else{
			return FALSE;
		}
	}

	public function find_customer_id($id){
		$this->db->where('cust_id', $id);
		$query = $this->db->get('s3_cust_details');
		if($query){
			return $query->row();;
		}else{
			return false;
		}
	}

	public function update_info($data, $id){
		$this->db->where('cust_id', $id);
		$query = $this->db->update('s3_cust_details', $data);
		if($query){
			return TRUE;
		}else{
			return FALSE;
		}
	}

	public function add_info($data){
		$query = $this->db->insert('s3_cust_details', $data);
		if($query){
			return TRUE;
		}else{
			return FALSE;
		}
	}

}