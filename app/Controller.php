<?php
// Le fichier de config
include_once('config.php');

abstract class Controller
{
    /**
     * Permet de charger un modèle
     * @param string $model
     * @return void
     **/
    public function loadModel(string $model)
    {
        // On va chercher le fichier correspondant au modèle souhaité, par exemple models/Article.php
        require_once(MODEL . $model . '.php');

        // On crée une instance de ce modèle. Ainsi "Article" sera accessible par $this->Article
        $this->$model = new $model();
    }

    /**
     * Afficher une vue
     * @param string $fichier
     * @param array $data
     * @return void
     **/
    public function render(string $fichier, array $data = [])
    {
        // Récupère les données et les extrait sous forme de variables
        extract($data);

        // On démarre le buffer de sortie
        ob_start();

        // On génère la vue
        require_once(VIEW . strtolower(get_class($this)) . '/' . $fichier . '.php');

        // On stocke le contenu dans $content
        $content = ob_get_clean();

        // On fabrique le "template"
        require_once(VIEW . '/layouts/default.php');
    }
}
