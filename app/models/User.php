<?php


/**
 * User class
 */
class User
{

	use Model;

	protected $table = 'Utilisateurs';

	protected $allowedColumns = [

		'email',
		'password',
		'sexe',
		'date_naissance'

	];

	public function validate($data)
	{

		$errors = [];

		if (empty($data['email'])) {
			$errors['email'] = "L'email est obligatoire";
		}

		if (empty($data['password'])) {
			$errors['password'] = "Le mot de passe est obligatoire";
		}

		if (empty($data['sexe'])) {
			$errors['sexe'] = "Le sexe est obligatoire";
		}

		if (empty($data['date_naissance'])) {
			$errors['date_naissance'] = "La date de naissance est obligatoire";
		}

		return $errors;
	}
}
