<?php
class Reportes_model extends CI_Model{
    function __constuct(){
        parent::__construct();
    }

    function reporte_1(){
        $this->db->select('pro.cod_producto, pro.producto, sum(dv.cantidad) suma');
        $this->db->from('detalle_venta dv');
        $this->db->join('productos pro', 'pro.cod_producto=dv.cod_producto');
        $this->db->join('ventas v', 'v.cod_venta=dv.cod_venta');
        $this->db->group_by('pro.cod_producto');
        $data = $this->db->get();
        return $data->result();
    }
    
    function reporte_2(){
        $this->db->select('pro.cod_producto, pro.producto, sum(dc.cantidad) suma');
        $this->db->from('detalle_compras dc');
        $this->db->join('productos pro', 'pro.cod_producto=dc.cod_producto');
        $this->db->join('compras c', 'c.cod_compra=dc.cod_compra');
        $this->db->group_by('pro.cod_producto');
        $data = $this->db->get();
        return $data->result();
    }
    
    function reporte_3(){
        $this->db->select('ds.cod_servicio, s.servicio, count(ds.cod_servicio) count');
        $this->db->from('detalle_servicio ds');
        $this->db->join('servicio s', 's.cod_servicio=ds.cod_servicio');
        $this->db->group_by('ds.cod_servicio');
        $data = $this->db->get();
        return $data->result();
    }
}