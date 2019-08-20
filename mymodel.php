<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class My_Model extends CI_Model {


  protected $table;

	/**
	* get all users
	* @return array
	*/
	public function all()
	{
	$all = $this->db->get($this->table);
	return $all;
	}

  /**
	* get one line
	* @param int $id
	* @return array
	*/
	public function find($id)
	{
		$this->db->where("id", $id);
		$get = $this->db->get($this->table);
		return $get->row();
	}

  /**
	* insert
	* @param int $id
	* @param int $array
	* @return int affected row
	*/
	public function insert($array)
	{
		$this->db->insert($this->table, $_POST);
		return $this->db->affected_rows();
	}

  /**
	* update one  line
	* @param int $id
	* @param int $array
	* @return int affected row
	*/
	public function update($id, $array)
	{
		$this->db->where("id", $id);
		$this->db->update($this->table, $array);

		return $this->db->affected_rows();
	}

  /**
  * delete
  * @param int $id
  * @return int affected row
  */
  public function delete($id)
  {
    $this->db->where("id", $id)
              ->delete($this->table);

    return $this->db->affected_rows();
  }


  /**
  * get json
  * @param int $name
  * @return int array
  */
  public function getJson($name)
  {
    $this->load->helper('file');
    $string = read_file('./dataapp/'.$name.'.json');
    return json_decode($string);
  }

}
