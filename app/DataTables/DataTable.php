<?php

namespace App\DataTables;

class DataTable
{
	protected $model;

	protected $columns = [
		'id',
	];

	private $relations = [];

	public function __construct()
	{
		$this->normalizeColumns();
	}

	protected $perPage = 15;

	private function normalizeColumns()
	{
		foreach ($this->columns as $columnName => $columnTitle) {
			if (is_int($columnName)) {
				unset($this->columns[$columnName]);
				$this->columns[$this->cleanColumnName($columnTitle)] = $columnTitle;
			}
		}
	}

	// Employee::select('firstname', 'lastname', 'employee_job_id')->where('firstname', 'like', "%$word%")->orWhere('lastname', 'like', "%$word%")->with(['job' => function($query) {
	//     $query->select('id', 'name');
	// }])->get();

	private function cleanColumnName($name)
	{
		return strtolower(str_replace(' ', '_', $name));
	}

	private function query()
	{
		return $this->model::select(array_keys($this->columns))->paginate($this->perPage);
	}

	private function handleRequest()
	{
		//
	}

	private function handleResponse()
	{
		$query = $this->query()->toArray();
		$query['columns'] = $this->columns;
		return $query;
	}

	public function response()
	{
		return response()->json($this->handleResponse());
	}
}