<?php

namespace application\models;

use application\core\Model;

class Admin extends Model {

    public function loginValidation($POST=[]){
        if(preg_match('#[-0-9a-zA-Z.+_]+@[-0-9a-zA-Z.+_]+.[a-zA-Z]{2,4}#',$POST['email']) and preg_match('#^\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$#',$POST['password'])){
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

    public function isAdmin($email,$password){
        $value = [
            'email' => $email,
        ];
        $sql = 'SELECT * FROM Barberka_users WHERE email = :email';
        $dataAboutUser = $this->db->row('SELECT * FROM Barberka_users WHERE email = :email', $value);
        $_SESSION['admin'] = $dataAboutUser[0];
        if(!password_verify($password,$_SESSION['admin']['user_password'])){
            unset($_SESSION['admin']);
        }

    }

    public function validation($post,$type){
        if(empty($_FIlES['img']['tmp_name']) and $type == 'add'){
            return false;
        } else {
            return true;
        }
    }
    public function addHaircut($array){
        $values = [
            'ID' => ' ',
            'name' => $array['name'],
            'description' => $array['description'],
        ];
        $this->db->query('INSERT INTO `Barberka_haircuts`(`ID`,`name`, `description`) VALUES (:ID,:name,:description)',$values);
        return $this->db->LastInsertId();
    }

    public function uploadImageHaircut($path,$id){
//     $img = new \Imagick();
//     $img->cropThumbnailImage(1080, 600);
//     $img->setImageCompressionQuality(80);
//     $img->writeImage('public/userImages/'.$id.'.jpg');
     move_uploaded_file($path,'public/usersImages/'.$id.'.jpg');
    }

    public function isHaircutExists($id){
        $value = [
            'ID'=>$id,
        ];
        return $this->db->column('SELECT ID FROM `Barberka_haircuts` WHERE ID = :ID',$value);
    }

    public function haircutDelete($id){
        $value = [
           'ID' => $id,
        ];
        $this->db->query('DELETE FROM Barberka_haircuts WHERE ID = :ID',$value);
        unlink('public/userImages'.$id.'.jpg');
    }

    public function infoAboutHaircut($id){
        $value = [
            'ID' => $id,
        ];
        return $this->db->row('SELECT * FROM Barberka_haircuts WHERE ID=:ID',$value);
    }

    public function editHaircut($post,$id){
        $value = [
           'ID' => $id,
            'name' => $post['name'],
            'description' => $post['description'],
        ];
        $this->db->query('UPDATE Barberka_haircuts SET name = :name, description = :description WHERE ID = :ID', $value);
    }

    public function numberOfHaircuts(){
        return $this->db->column('SELECT COUNT(ID) FROM Barberka_haircuts');
    }

    public function postsLists($route){
        $max = 3;
        $value = [
            'max' => $max,
            'start' => ((($route['page'] ?? 1) - 1) * $max),
        ];
        return $this->db->row('SELECT * FROM Barberka_haircuts ORDER BY ID DESC LIMIT :start, :max', $value);
    }

    public function validatePassword($password){

    }
    public function angularAsync(){
        return $this->db->row('SELECT * FROM Barberka_haircuts ORDER BY ID DESC');
    }


}