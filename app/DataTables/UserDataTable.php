<?php

namespace App\DataTables;

use App\User;

class UserDataTable extends DataTable
{
	protected $model = User::class;

	protected $columns = [
		'id' => 'id',
		'name' => 'nombre',
		'email' => 'correo',
		'user_type.name' => 'tipo',
	];
}