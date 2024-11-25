<?php

namespace App\Models\Repositories;

use App\Models\Entities\User;

class UserRepository {
	private $user;

	/**
	 * User construct
	 *
	 * @param User $user
	 */
	public function __construct(User $user) {
		$this->user = $user;
	}
}
