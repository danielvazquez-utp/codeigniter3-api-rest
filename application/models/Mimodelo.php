<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mimodelo extends CI_Model {

    public function __construct()
	{
		$this->load->database();
	}

	/*
	* Métodos generales
	*/

	public function get($tabla='', $atributos, $orden, $agrupamiento='')
	{
		if ($agrupamiento!='') {
			$this->db->group_by($agrupamiento);
		}
	    if(count($orden)>0){
	        foreach ($orden as $cve => $val){
	            $this->db->order_by($cve, $val);
	        }
		}
		if(count($atributos)>0){
			foreach ($atributos as $cve => $val)
				$this->db->where($cve, $val);
		}
		$resultado = $this->db->get($tabla);
		if ($resultado->num_rows()>0){
			return $resultado;
		}
		else
			return false;
	}

	public function get_or($tabla='', $atributos, $orden, $agrupamiento='')
	{
		if ($agrupamiento!='') {
			$this->db->group_by($agrupamiento);
		}
	    if(count($orden)>0){
	        foreach ($orden as $cve => $val){
	            $this->db->order_by($cve, $val);
	        }
		}
		if(count($atributos)>0){
			$contador = 0;
			foreach ($atributos as $cve => $val)
				if ($contador<1)
					$this->db->where($cve, $val);
				else
					$this->db->or_where($cve, $val);
				$contador++;
		}
		$resultado = $this->db->get($tabla);
		if ($resultado->num_rows()>0){
			return $resultado;
		}
		else
			return false;
	}

	public function get_like($tabla='', $atributos, $orden, $agrupamiento='', $like)
	{
		if ($agrupamiento!='') {
			$this->db->group_by($agrupamiento);
		}
	    if(count($orden)>0){
	        foreach ($orden as $cve => $val){
	            $this->db->order_by($cve, $val);
	        }
		}
		if(count($atributos)>0){
			foreach ($atributos as $cve => $val)
				$this->db->where($cve, $val);
		}
		if (count($like)>0) {
			foreach ($like as $cve => $val)
				$this->db->like($cve, $val);
		}
		$resultado = $this->db->get($tabla);
		if ($resultado->num_rows()>0){
			return $resultado;
		}
		else
			return false;
	}

	public function set($tabla, $valores)
	{
		$this->db->insert($tabla, $valores);
	}

	public function update($tabla='', $condiciones=array(), $atributos=array())
	{
		$where = '';
		foreach ($condiciones as $cve => $val) {
			if ($where=='')
				$where = " WHERE $cve = '$val' ";
			else
				$where .= " AND $cve = '$val' ";
		}

		$set = '';
		foreach ($atributos as $cve => $val) {
			$set .= " $cve = '$val', ";
		}
		
		if ($set!='') {
			$set = substr($set, 0, strlen($set)-2);
		}
		

		$sql = "UPDATE $tabla SET $set $where ";

		$this->db->query($sql);
	}

	public function index($tabla, $cve)
	{
		$sql = "SELECT MAX($cve) as 'indice' from $tabla";
		$resultado = $this->db->query($sql);
		if ($resultado->num_rows()>0) {
			$res = $resultado->row(0);
			return $res->indice;
		}
		else
			return false;
	}

	public function delete($tabla='', $atributos)
	{
		if(count($atributos)>0){
			foreach ($atributos as $cve => $val)
				$this->db->where($cve, $val);
		}
		$this->db->delete($tabla);
	}

	public function query($sql){
		$resultado = $this->db->query($sql);
		if ($resultado->num_rows()>0) {
			return $resultado;
		}
		else
			return false;
	}

	public function truncar($tabla){
		$this->db->truncate($tabla);
	}

	public function fields($tabla=''){
		$fields = $this->db->list_fields($tabla);
		if (count($fields)>0){
			return $fields;
		}
		else
			return false;
	}

}