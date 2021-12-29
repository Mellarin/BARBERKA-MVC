<?php
//WHAT CAN I SAY EXCEPT YOU ARE WELCOME....
namespace application\controllers;
use application\core\Controller;
use application\lib\Pagination;

class MainController extends Controller {
	public function indexAction() {
		$this->view->render('Home');
	}
    public function aboutAction() {
        $this->view->render('About');
    }
    public function galleryAction(){
        $this->view->render('Gallery');
    }
    public function priceAction(){
        $this->view->render('Pricing');
    }
    public function haircutAction(){
        if (!$this->model->isHaircutExists($this->route['id'])) {
            $this->view->redirect('404');
        }
        $values = [
            'data' => $this->model->infoAboutHaircut($this->route['id'])[0],
        ];
        $this->view->render('Haircut', $values);
    }
    public function haircutsAction(){
        $pagination = new Pagination($this->route,$this->model->numberOfHaircuts());
        $values = [
            'pagination'=>$pagination->get(),
            'list'=>$this->model->haircutsList($this->route),
        ];
        $this->view->render('Haircuts',$values);
    }
}