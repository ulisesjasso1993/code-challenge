<?php

class Users_model extends CI_Model
{

	/**
	 * @return int
	 */
	public function getAllCount()
	{
		return $this->db->count_all_results('user');
	}

	/**
	 * @return array|array[]
	 */
	public function getAll($recordNumber)
	{
		$query = $this->db
			->select()
			->from('user')
		;

		if (!is_null($recordNumber)) {
			$query->limit(5, $recordNumber);
		}

		return $query->get()->result_array();
	}

	/**
	 * @param $data
	 *
	 * @return bool
	 */
	public function create($data)
	{
		return $this->db->insert('user', $data);
	}
}
