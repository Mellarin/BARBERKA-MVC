<?php

namespace application\models;

use application\core\Model;

class Main extends Model {
    public function numberOfHaircuts(){
        $this->db->column('SELECT COUNT(ID) FROM Barberka_haircuts');
    }

    public function haircutsList($route){
        $max = 10;
        $value = [
            'max' => $max,
            'start' => ((($route['page'] ?? 1) - 1) * $max),
        ];
        return $this->db->row('SELECT * FROM `Barberka_haircuts` ORDER BY ID DESC LIMIT :start, :max', $value);
    }

    public function isHaircutExists($id){
        $value = [
            'ID' => $id,
        ];
        return $this->db->column('SELECT ID FROM `Barberka_haircuts` WHERE ID = :ID',$value);
    }

    public function infoAboutHaircut($id){
        $value = [
            'ID' => $id,
        ];
        return $this->db->row('SELECT * FROM Barberka_haircuts WHERE ID=:ID',$value);
    }


}