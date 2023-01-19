<?php


class Params
{
    use Controller;

    public function index()
    {


        $model = new ParamsModel();
        $params = $model->findAll();
        $model2 = new DiaporamaModel();
        $diaporama = $model2->findAll();

        if (!is_array($params)) {
            $params = array();
        }
        if (!is_array($diaporama)) {
            $diaporama = array();
        }
        $this->adminView('params', array("params" => $params, "diaporama" => $diaporama));
    }
    public function edit()
    {
        $model = new ParamsModel();
        $id = $_POST["id"];

        $nom = $_POST["nom"];
        $valeur = $_POST["valeur"];
        $model->update($id, array("nom" => $nom, "valeur" => $valeur));
        header("Location: /Projet_Final/admin/params");
    }
    public function editDiapo()
    {
        $model = new DiaporamaModel();
        $id = $_POST["id"];

        $url = $_POST["url"];
        $model->update($id, array("url" => $url));
        header("Location: /Projet_Final/admin/params");
    }
    public function addDiapo()
    {
        $model = new DiaporamaModel();
        $arr['url'] = "";

        $model->insert($arr);
        header("Location: /Projet_Final/admin/params");
    }
    public function deleteDiapo()
    {
        $model = new DiaporamaModel();
        $id = $_POST["id"];
        $model->delete($id);
        header("Location: /Projet_Final/admin/params");
    }
}
