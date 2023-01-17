<?php


/**
 * User class
 */
class UserModel
{

	use Model;

	protected $table = 'Utilisateurs';

	protected $allowedColumns = [
		'nom',
		'email',
		'mot_de_passe',
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
	public function addToPreferences($recette_id, $user_id)
	{
		//add to the table PreferenceUtilisateur a row with recette_id and user_id
		$model = new PreferenceUtilisateurModel;
		$preference['id_utilisateur'] = $user_id;
		$preference['id_recette'] = $recette_id;
		$model->insert($preference);
	}
	public function removeFromPreferences($recette_id, $user_id)
	{
		//remove from the table PreferenceUtilisateur a row with recette_id and user_id
		$model = new PreferenceUtilisateurModel;
		$preference['id_utilisateur'] = $user_id;
		$preference['id_recette'] = $recette_id;
		//get id before deletion
		$result = $model->where($preference);

		$id = $result[0]->id;

		$model->delete($id);
	}
	public function isLikedByUser()
	{
		//check if the current recette is liked by the current user
		$model = new PreferenceUtilisateurModel;
		$preference['id_utilisateur'] = $_SESSION['user']->id;
		$preference['id_recette'] = $_POST['recetteId'];
		$result = $model->where($preference);
		//check is return type is array
		if (is_array($result)) {
			if (count($result) > 0) {
				return true;
			}
		}

		return false;
	}
	public function rateRecipe($recette_id, $user_id, $note)
	{
		$model = new NotationUtilisateurModel;

		$noteRecette['id_utilisateur'] = $user_id;
		$noteRecette['id_recette'] = $recette_id;
		$result = $model->where($noteRecette);
		if (is_array($result)) {
			if (count($result) > 0) {
				$model->delete($result[0]->id);
			}
		}

		$noteRecette['note'] = $note;




		$model->insert($noteRecette);
	}
}
