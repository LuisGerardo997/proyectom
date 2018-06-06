<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Paypal_model extends CI_Model {

	function __construct() {
		parent::__construct();
	}

	/* This function create new Service. */

	function create($Total,$SubTotal,$Tax,$PaymentMethod,$PayerStatus,$PayerMail,$saleId,$CreateTime,$UpdateTime,$State) {
        $this->db->set('txn_id',$saleId);
        $this->db->set('paymentmethod',$PaymentMethod);
        $this->db->set('payerstatus',$PayerStatus);
        $this->db->set('payermail',$PayerMail);
        $this->db->set('total',$Total);
        $this->db->set('subtotal',$SubTotal);
        $this->db->set('tax',$Tax);
        $this->db->set('payment_state',$State);
		$this->db->set('createtime',$CreateTime);
		$this->db->set('updatetime',$UpdateTime);
		$this->db->insert('payments');
		$id = $this->db->insert_id();
		return $id;
	}

}
