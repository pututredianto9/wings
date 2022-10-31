<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Models extends CI_Model {
	
	function check_credential($table,$where){		
		return $this->db->get_where($table,$where);
	}
    public function Product(){
		//query semua record di table SELECT Product_Code, Product_Name, FLOOR(Price-(Price * (SELECT Discount FROM product)/100)) as Price FROM `product`;
        $q="SELECT Product_Code, Product_Name, FLOOR(Price-(Price * (SELECT Discount FROM product WHERE Product_Code=a.Product_Code ORDER BY `product`.`Price` ASC limit 1 )/100)) as Price_Diskon, Price FROM `product` as a";
        return $this->db->query($q);
	}
    public function Detail($Product_Code){
		
        $q="SELECT Product_Code, Product_Name, FLOOR(Price-(Price * (SELECT Discount FROM product WHERE Product_Code=a.Product_Code ORDER BY `product`.`Price` ASC limit 1 )/100)) as Price_Diskon, Price FROM `product` as a Where Product_Code = '$Product_Code'";
        return $this->db->query($q);
	}
    public function find($Product_Code){
		$q="SELECT Product_Code, Product_Name, FLOOR(Price-(Price * (SELECT Discount FROM product WHERE Product_Code=a.Product_Code ORDER BY `product`.`Price` ASC limit 1 )/100)) as Price_Diskon, Price FROM `product` as a Where Product_Code = '$Product_Code'";
        return $this->db->query($q);
	}
    public function checkout(){
		//create new invoice
        $q= "Select MAX(Document_Number) as number FROM transaction_header";
        $result = $this->db->query($q)->result();
        $tampung = $result[0]->number;
        $number_terakhir = $tampung + 1;
		$invoice = array (
			'Document_Code' => 'TRX',
			'Document_Number' => $number_terakhir,
			'User' => $_SESSION['nama'],
			'Total' => '',
			'Date' => date('y-m-d'),
		);
		$this->db->insert('transaction_header', $invoice);
		$invoice_id = $this->db->insert_id();
		
        $total = 0;
		foreach($this->cart->contents() as $item){
			$data = array(
				'Document_Code' => 'TRX',
				'Document_Number' => $number_terakhir,
				'Product_Code' =>$item['name'],
				'Quantity' =>$item['qty'],
				'Unit' =>'PCS',
				'Sub_Total' =>$item['subtotal'],
				'Currency' =>'IDR',
				'Price' =>$item['price']
			);
            $total+=$item['subtotal'];
			$this->db->insert('transaction_detail', $data);
		}
        $datas = array(
			'Total' => $total,
        );
        $this->db->where('Document_Number',$number_terakhir);
        $this->db->update('transaction_header', $datas);
		return TRUE;
	}
    public function allTransaksi(){
		$q="SELECT * FROM transaction_header";
        return $this->db->query($q);
	}
    
    public function dateilTransaksi($id){
        $q="SELECT * FROM transaction_detail where Document_Number='".$id."'";
        return $this->db->query($q);
	}
}