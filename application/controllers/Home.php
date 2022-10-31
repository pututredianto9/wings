<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
    function __construct(){
		parent::__construct();		
        if(empty($_SESSION['nama'])){
            redirect('Login');
        }
		$this->load->model('Models');
        $this->load->library('cart');
	}
	
	public function index()
	{
        $data['barang'] = $this->Models->Product()->result();
		$this->load->view('home',$data);
	}
    public function Detail($Product_Code)
	{
        $data['barang'] = $this->Models->Detail($Product_Code)->result();
		$this->load->view('detail_product',$data);
	}

    public function add_to_cart($Product_Code)
	{
		$Product = $this->Models->find($Product_Code)->result();
		$data = array(
			'id'      => $Product[0]->Product_Code,
			'name'      => $Product[0]->Product_Name,
			'qty'     => 1,
			'price'   => $Product[0]->Price_Diskon
		);
		$this->cart->insert($data);
		redirect('Home');
	}
	
	public function cart()
	{
		$this->load->view('show_cart');
	}
	public function clear_cart()
	{
		$this->cart->destroy();
		redirect('Home');
	}
    public function order(){
        $is_processed = $this->Models->checkout();
		if($is_processed){
			$this->cart->destroy();
			redirect('Home/success');
		} else {
            echo 'gagal';
		}
    }
    public function success(){
        echo 'sukses';
    }

    public function report(){
        $datas = $this->Models->allTransaksi()->result_array();
        $newDataAll = [];
        foreach ($datas as $key => $value) {
            $listDetailData = $this->Models->dateilTransaksi($value['Document_Number'])->result_array();
            $newDataAll [] = array(
                'Document_Code'=>$value['Document_Code'],
                'Document_Number'=>$value['Document_Number'],
                'User'=>$value['User'],
                'Total'=>$value['Total'],
                'Date'=>$value['Date'],
                'ListItem'=>$listDetailData,
            );
        }
        $data['all'] = $newDataAll;
        $this->load->view('report',$data);
    }
}
