<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class AdminModel extends CI_Model {

	public function retrieve_one_account($email){
		$this->db->where('email', $email);
		$query = $this->db->get('s3_admins');
		if($query){
			return $query->row();
		}else{
			return false;
		}
	}

	private $lastQuery = '';

	public function get_products($limit, $start){
		$this->db->order_by('added_at', 'desc');
		$this->db->limit($limit, $start);
		$query = $this->db->get('s3_products');  
		$this->lastQuery = $this->db->last_query();
		if($query){
			return $query->result();
		}else{
			return FALSE;
		}
	}

	public function get_item_stock($id){
		$this->db->where('id', $id);
		$query = $this->db->get('s3_products');
		if($query){
			return $query->row();
		}else{
			return FALSE;
		}
	}

	public function update_stock($id, $data){
		$this->db->where('id', $id);
		$query = $this->db->update('s3_products', $data);
		if($query){
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

		public function get_product_by_id($id){
		$this->db->where('id', $id);
		$query = $this->db->get('s3_products');
		if($query->num_rows() > 0)
		{
			return $query->row();
		}else
		{
			return false;
		}
	}

	public function insert_product($product){
		$query = $this->db->insert('s3_products', $product);
		if($query){
			return TRUE;
		}else{
			return FALSE;
		}
	}

	public function fetch_single_item($id){
		$this->db->where("id",$id);
		$query = $this->db->get('s3_products');
		if($query){
			return $query->result();
		}else{
			return FALSE;
		}
	}

	public function delete_product($id){
		$this->db->where('id', $id);
		$query = $this->db->delete('s3_products');
		if($query){
			return TRUE;
		}else{
			return FALSE;
		}
	}

	public function get_account_by_id($id){
		$this->db->where('id', $id);
		$query = $this->db->get('s3_admins');
		if($query->num_rows() > 0)
		{
			return $query->row();
		}else
		{
			return false;
		}
	}

	public function product_update($id,$product){
		$this->db->where('id', $id);
		$query = $this->db->update('s3_products', $product);
		if($query){
			return TRUE;
		}else{
			return FALSE;
		}
	}

		public function get_accounts(){
		$query = $this->db->get('s3_admins');  
		if($query){
			return $query->result();
		}else{
			return FALSE;
		}
	}

	public function insert_account($data){
		$query = $this->db->insert('s3_admins', $data);
		if($query){
			return TRUE;
		}else{
			return FALSE;
		}
	}

	public function get_account_byId($id){
		$this->db->where('id', $id);
		$query = $this->db->get('s3_admins');
		if($query->num_rows() > 0)
		{
			return $query->row();
		}else
		{
			return false;
		}
	}

		public function delete_account($id){
		$this->db->where('id', $id);
		$query = $this->db->delete('s3_admins');
		if($query){
			return TRUE;
		}else{
			return FALSE;
		}
	}

	public function password_verify($id){
		$query = $this->db->get_where('s3_admins', array('id' => $id));
		if($query){
			return $query->row();
		}else{
			return FALSE;
		}
	}

	public function update_admin_account($id, $data){
		$this->db->where('id', $id);
		$query = $this->db->update('s3_admins', $data);
		if($query){
			return TRUE;
		}else{
			return FALSE;
		}
	}

	public function get_orders($limit, $start){
		$this->db->order_by('ordered_at', 'desc');
		$this->db->limit($limit, $start);
		$query = $this->db->get('s3_orders');  
		$this->lastQuery = $this->db->last_query();
		if($query){
			return $query->result();
		}else{
			return FALSE;
		}
	}


	public function get_orders_total_rows(){
		$sql = explode('LIMIT', $this->lastQuery);
		$query = $this->db->query($sql[0]);
		$result = $query->result();
		return count($result);
	}

	public function change_order_status($id, $data){
		$this->db->where('id', $id);
		$query = $this->db->update('s3_orders', $data);
		if($query){
			return TRUE;
		}else{
			return FALSE;
		}
	}

	public function get_order_details($order_ref){
		$query = $this->db->get_where('s3_order_details', array('order_ref' => $order_ref));
		if($query){
			return $query->result();
		}else{
			return FALSE;
		}
	}

	public function add_sales($sale){
		$query = $this->db->insert('s3_sales', $sale);
		return true;
	}

	public function get_sales($limit, $start){
		$this->db->order_by('id', 'asc');
		$this->db->limit($limit, $start);
		$query = $this->db->get('s3_sales');  
		$this->lastQuery = $this->db->last_query();
		if($query){
			return $query->result();
		}else{
			return FALSE;
		}
	}

	public function get_sales_total_rows(){
		$sql = explode('LIMIT', $this->lastQuery);
		$query = $this->db->query($sql[0]);
		$result = $query->result();
		return count($result);
	}

	public function get_total($order_ref){
		$query = $this->db->get_where('s3_orders', array('order_ref' => $order_ref));
		if($query){
			return $query->row();
		}else{
			return FALSE;
		}
	}

	public function get_customer($cust_id){
		$this->db->where('id', $cust_id);
		$query = $this->db->get('s3_customers');
		if($query){
			return $query->row();
		}else{
			return FALSE;
		}
	}

	public function get_customer_details($cust_id){
		$this->db->where('cust_id', $cust_id);
		$query = $this->db->get('s3_cust_details');
		if($query){
			return $query->row();
		}else{
			return FALSE;
		}
	}

}
