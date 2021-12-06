<?php

namespace application\models;

use application\core\Model;

class Account extends Model {
    public function activateAccount($activation_code){
        $value = [
            'activation_code' => $activation_code,
        ];
        $this->db->query('UPDATE Barberka_users SET email_verify = 1,activation_code = " " WHERE activation_code = :activation_code',$value);
    }
    public function activateCode($code){
        $value = [
            'code' => $code,
        ];
        return $this->db->column('SELECT ID FROM Barberka_users WHERE activation_code = :code', $value);

    }
    public function register($array){
        $activation_code = $this->generateCode();
        $values = [
            'username' => $array['username'],
            'email' => $array['email'],
            'user_password' => password_hash($array['password'], PASSWORD_DEFAULT),
            'phone' => $array['phone'],
            'country'=>$array['country'],
            'access' =>'member',
            'activation_code' => $activation_code,
            'email_verify' => '0',
        ];
        $this->db->query('INSERT INTO `Barberka_users`(`username`, `email`, `user_password`, `phone`, `country`, `access`,`activation_code`, `email_verify`) VALUES (:username,:email,:user_password,:phone,:country,:access,:activation_code,:email_verify)',$values);
        mail($_POST['email'],'Account activation!','Activate acccout: https://lightdesign.info/account/confirm/'.$activation_code);
    }
    public function validation($POST=[]){
        $regex = [
            'login' =>[
                'pattern' => '#^[A-Za-z][A-Za-z0-9]{5,31}$#',
                'message' => 'Login is not valid',
            ],
            'email' =>[
                'pattern' => '#[-0-9a-zA-Z.+_]+@[-0-9a-zA-Z.+_]+.[a-zA-Z]{2,4}#',
                'message' => 'Email adress is not valid',
            ],
            'password' =>[
                'pattern' => '#^\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$#',
                'message' => 'Password is not valid',
            ],
            'password2' =>[
                'pattern' => '#^\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$#',
                'message' => 'Password is not valid',
            ],
            'phone' =>[
                'pattern' => '#^\+?3?8?(0\d{9})$#',
                'message' => 'Phonenumber is not valid',
            ],
        ];
        if(preg_match('#^[A-Za-z][A-Za-z0-9]{5,31}$#',$POST['username']) and preg_match('#[-0-9a-zA-Z.+_]+@[-0-9a-zA-Z.+_]+.[a-zA-Z]{2,4}#',$POST['email']) and preg_match('#^\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$#',$POST['password']) and $POST['password']==$POST['password2'] and preg_match('#^\+?3?8?(0\d{9})$#',$POST['phone'])){
            return true;
        } else {
            return false;
        }
    }
    public function isEmailExists($email) {
        $value = [
            'email' => $email,
        ];
        return $this->db->column('SELECT ID FROM Barberka_users WHERE email = :email', $value);
    }

    public function isUsernameExists($username) {
        $value = [
            'username' => $username,
        ];
        return $this->db->column('SELECT ID FROM Barberka_users WHERE username = :username', $value);
    }

    public function isPhoneExists($phone){
        $value = [
            'phone' => $phone,
        ];
        return $this->db->column('SELECT ID FROM Barberka_users WHERE phone = :phone', $value);
    }
    public function generateCode(){
        return substr(str_shuffle(str_repeat('0123456789abcdefghijklmnopqrstuvwxyz', 20)), 0, 40);
    }

    public function loginValidation($POST=[]){
        if(preg_match('#[-0-9a-zA-Z.+_]+@[-0-9a-zA-Z.+_]+.[a-zA-Z]{2,4}#',$POST['email']) and preg_match('#^\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$#',$POST['password'])){
            return true;
        } else {
            return false;
        }
    }

    public function isDataAboutUserExists($email,$password){
        $value = [
            'email' => $email,
        ];
        $hashed_password = $this->db->column('SELECT user_password FROM Barberka_users WHERE email = :email', $value);
        if(!password_verify($password,$hashed_password)){
            return false;
        } else {
            return true;
        }
    }

    public function isActivatedAccount($email){
        $value = [
            'email' => $email,
        ];
        $sql = 'SELECT email_verify FROM Barberka_users WHERE email = :email';
        $email_verify = $this->db->column($sql,$value);
        if($email_verify == 0){
            return false;
        } else {
            return true;
        }
    }

    public function login($email){
        $value = [
            'email' => $email,
        ];
        $sql = 'SELECT * FROM Barberka_users WHERE email = :email';
        $dataAboutUser = $this->db->row('SELECT * FROM Barberka_users WHERE email = :email', $value);
        $_SESSION['user'] = $dataAboutUser[0];
    }

    public function updateAccount($array,$id){
        $value = [
            'ID' => $id,
            'username' => $array['username'],
            'email' => $array['email'],
            'phone' => $array['phone'],
        ];
        $this->db->query('UPDATE Barberka_users SET username = :username, email=:email, phone=:phone WHERE ID = :ID', $value);
    }

    public function uploadUserImage($path,$id){
        move_uploaded_file($path,'public/imagesOfAccounts/'.$id.'.jpg');
    }

    public function infoAboutUser($id){
        $value = [
            'ID' => $id,
        ];
        return $this->db->row('SELECT * FROM Barberka_users WHERE ID=:ID',$value);
    }


}