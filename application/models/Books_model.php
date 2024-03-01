<?php

class Books_model extends CI_Model
{
	/**
	 * @return int
	 */
	public function getAllCount()
	{
		return $this->db->count_all_results('book');
	}

	/**
	 * @return array
	 */
	public function getAll($recordNumber)
	{
		$query = $this->db
			->select('b.*, u.username')
			->from('book b')
			->join('user u', 'u.user_id = b.book_user', 'left')
			->limit(5, $recordNumber)
			->get()
		;

		return $query->result_array();
	}

	/**
	 * @return array
	 */
	public function getCategories()
	{
		$categories = $this->db->get('category')->result_array();
		$returnResult = [];
		foreach ($categories as $category) {
			$returnResult[$category['category_id']] = $category['category_name'];
		}

		return $returnResult;
	}

	/**
	 * @param $data
	 *
	 * @return false|int
	 */
	public function create($data)
	{
		$categories = $data['book_category'];
		unset($data['book_category']);
		if ($this->db->insert('book', $data)) {
			$bookId = $this->db->insert_id();
			$batchSave = [];
			foreach ($categories as $category) {
				$batchSave[] = [
					'book_id'     => $bookId,
					'category_id' => $category,
				];
			}

			return $this->db->insert_batch('book_category', $batchSave);
		}

		return false;
	}

	/**
	 * @param $id
	 *
	 * @return array|array[]
	 */
	public function getBookById($id)
	{
		return $this->db->get_where('book', "book_id = {$id}")->row_array();
	}

	/**
	 * @param $data
	 *
	 * @return bool
	 */
	public function assignBook($data)
	{
		return $this->db
			->where('book_id', $data['book_id'])
			->update('book', ['book_user' => $data['user_book']])
		;
	}

	public function unassign($bookId)
	{
		return $this->db
			->where('book_id', $bookId)
			->update('book', ['book_user' => null])
		;
	}
}
