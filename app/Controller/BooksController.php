<?php

Configure::write('debug', 0);
App::uses('Sanitize', 'Utility');
App::uses('AppController', 'Controller');

class BooksController extends AppController {

    public $uses = array('Books');
    public $components = array('RequestHandler');
    public $layout = 'json';

    public function listarBooks() {
        Configure::write('debug', 2);
        $this->Books->recursive = 0;
        $books = $this->Books->find("all", array("fields" => array('Books.title', 'Books.author')));
        $books = $this->compactArray($books, "Books");
        $this->set('books', $books);
    }

    public function buscaBook() {
        $id = Sanitize::clean(trim($this->request->params['id']));
        $title = Sanitize::clean(trim($this->request->params['title']));
        $author = Sanitize::clean(trim($this->request->params['author']));
        if (!empty($id)) {
            $books = $this->Books->find("all", array("conditions" => array("Books.id" => $id), "fields" => array('Books.title', 'Books.author', 'Books.publisher', 'Books.isbn')));
        } elseif (!empty($title) && empty($author)) {
            $books = $this->Books->find("all", array("conditions" => array("Books.title LIKE '%$title%'"), "fields" => array('Books.title', 'Books.author')));
        } elseif (!empty($title) && !empty($author)) {
            $books = $this->Books->find("all", array("conditions" => array("Books.title LIKE '%$title%'", "Books.author LIKE '%$author%'"), "fields" => array('Books.title', 'Books.author')));
        }
        $books = $this->compactArray($books, "Books");
        $this->set('books', $books);
        $this->render('listar_books');
    }

    private function compactArray($array, $model) {
        $aux = array();
        foreach ($array as $a) {
            $aux[] = $a[$model];
        }
        return $aux;
    }

}
