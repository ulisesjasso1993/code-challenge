<?php

class Categories_model extends CI_Model
{
	/**
	 * @return int
	 */
	public function getAllCount()
	{
		return $this->db->count_all_results('category');
	}

	/**
	 * @return array|array[]
	 */
	public function getAll($recordNumber)
	{
		$query = $this->db
			->select()
			->from('category')
			->limit(5, $recordNumber)
			->get()
		;

		return $query->result_array();
	}

	public function create($data)
	{
		return $this->db->insert('category', $data);
	}
}
