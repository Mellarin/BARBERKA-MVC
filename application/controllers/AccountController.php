<?php

namespace application\controllers;

use application\core\Controller;

class AccountController extends Controller {

    public function registerAction() {
        if(!empty($_POST)){
            if(!$this->model->isEmailExists($_POST['email']) and !$this->model->isUsernameExists($_POST['username'])){
                if($this->model->validation($_POST)){
                    $this->model->register($_POST);
                    $_SESSION['service_message'] = 'You need to activate your account';
                } else {
                    $_SESSION['INVALIDDATA'] = 'BAD DATA';
                }
            } else {
                $_SESSION['USEREXISTS'] = 'User with this email or username already exists!';
            }

        }
        $this->view->render('Registration');

    }

    public function loginAction(){
        if(isset($_POST)){
            if($this->model->loginValidation($_POST)){
                if($this->model->isDataAboutUserExists($_POST['email'],$_POST['password'])){
                    if($this->model->isActivatedAccount($_POST['email'])){
                        $this->model->login($_POST['email']);
                    } else {
                        $_SESSION['ACTIVATION_ISSUES']='YOU NEED TO ACTIVATE YOUR ACCOUNT TO LOGIN!';
                    }
                } else {
                    $_SESSION['USER_NOT_EXISTS']='YOU NEED TO ACTIVATE YOUR ACCOUNT TO LOGIN!';
                }
            } else {
                echo '123';
            }
        }
        $this->view->render('Login');
    }

    public function confirmAction(){
        if(!$this->model->activateCode($this->route['token'])){
            $this->view->redirect('/home');
        } else {
            $this->model->activateAccount($this->route['token']);
            $this->view->render('Account was activated!');
        }
    }

    public function profileAction(){
        $values = [
            'data' => $this->model->infoAboutUser($_SESSION['user']['ID'])[0],
        ];
        echo $_SESSION['user']['ID'];
        $this->view->render('Profile',$values);
    }

    public function logoutAction(){
        unset($_SESSION['user']);
        $this->view->redirect('home');
    }

    public function changeAction(){
        if(isset($_POST)){
            if(preg_match('#^[A-Za-z][A-Za-z0-9]{5,31}$#',$_POST['username']) and preg_match('#[-0-9a-zA-Z.+_]+@[-0-9a-zA-Z.+_]+.[a-zA-Z]{2,4}#',$_POST['email']) and preg_match('#^\+?3?8?(0\d{9})$#',$_POST['phone'])){
                $this->model->updateAccount($_POST,$_SESSION['user']['ID']);
                if ($_FILES['img']['tmp_name']) {
                $this->model->uploadUserImage($_FILES['img']['tmp_name'], $_SESSION['user']['ID']);
            } else {
                    echo 'false';
                }
            } else {
                $_SESSION['UPDATEISSUES'] = 'BAD DATA';
            }
        }
        $values = [
            'data' => $this->model->infoAboutUser($_SESSION['user']['ID'])[0],
        ];
        $this->view->render('Edit haircut', $values);
    }

}