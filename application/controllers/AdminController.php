<?php

namespace application\controllers;

use application\core\Controller;
use application\core\View;
use application\lib\Pagination;

class AdminController extends Controller {
    public function __construct($route) {
        parent::__construct($route);
        $this->view->layout = 'admin';
    }

    public function loginAction() {
        if(!empty($_POST)){
            if($this->model->loginValidation($_POST)){
                if($this->model->isEmailExists($_POST['email'])){
                    $this->model->isAdmin($_POST['email'],$_POST['password']);
                    if($_SESSION['admin']['access']=='admin'){
                    } else {
                    }
                } else {
                    echo '321';
                }
            } else {
                echo '123';
            }
        }
        $this->view->render('Admin login');
    }

    public function panelAction(){
        $this->view->render('Panel');
    }

    public function logoutAction(){
        unset($_SESSION['admin']);
        $this->view->redirect('home');
    }

    public function addhaircutsAction(){
        if(!empty($_POST)){
            $id = $this->model->addHaircut($_POST);
            if(!empty($id)){
                $this->model->uploadImageHaircut($_FILES['img']['tmp_name'],$id);
            } else {
                echo '123';
            }
        }
        $this->view->render('Add haircut');
    }

    public function deletehaircutAction(){
        if(!$this->model->isHaircutExists($this->route['id'])){
            exit('False!');
        } else{
            $this->model->haircutDelete($this->route['id']);
            $this->view->redirect('admin/posts');
        }
        $this->view->render('Delete haircut');
    }

    public function edithaircutAction() {
        if (!$this->model->isHaircutExists($this->route['id'])) {
            $this->view->redirect('404');
        }
        if (!empty($_POST)) {
            if (!$this->model->validation($_POST, 'edit')) {
                $this->view->redirect('404');
            }
            $this->model->editHaircut($_POST, $this->route['id']);
            if ($_FILES['img']['tmp_name']) {
                $this->model->uploadImageHaircut($_FILES['img']['tmp_name'], $this->route['id']);
            }
        }
        $values = [
            'data' => $this->model->infoAboutHaircut($this->route['id'])[0],
        ];
        $this->view->render('Edit haircut', $values);
    }

    public function oldPostsAction(){
        $values = [
            'list'=>$this->model->postsLists($this->route),
        ];
        $this->view->render('Posts',$values);
        //:TODO ??? Old pagination ???
    }

    public function postsAction(){
        $values = [
            'list' =>$this->model->angularAsync($this->route),
        ];
        $this->view->render('Posts',$values);
    }

}