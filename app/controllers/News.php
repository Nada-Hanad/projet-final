<?php

/**
 * home class
 */
class News
{
    use Controller;

    public function index()
    {
        $model = new NewsModel;
        $news = $model->findAll();
        if (is_array($news)) {

            $this->view('news',  $news);
        } else {
            $this->view('news',  []);
        }
    }
    public function show()
    {
        $url = $_GET['url'];
        $id = explode('/', $url)[2];


        $model = new NewsModel;
        $result = $model->getById($id);
        $this->view('newsDisplay',  $result);
    }
}
