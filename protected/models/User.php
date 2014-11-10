<?php

class User extends EMongoDocument
{
    public $password = "@rvydas1166";
    public $user_name = "admin";


    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function getCollectionName()
    {
        return 'users';
    }

    public function beforeSave()
    {
        $this->password = CPasswordHelper::hashPassword($this->password);
        return parent::beforeSave();
    }



}

