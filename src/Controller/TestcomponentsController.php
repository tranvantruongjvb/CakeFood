<?php
namespace App\Controller;

use App\Controller\AppController;
class TestComponentsController extends AppController{
    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('Data');
    }
    
    public function test1(){
       $data = $this->Data->randd(6);//Sử dụng function randd(6),randdom 6 số
       $this->set("data",$data);
    }
}