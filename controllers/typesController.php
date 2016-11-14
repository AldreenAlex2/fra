<?php

cLass typesController extends AppsController
{
  public function __construct(){
    parent::__construct();
  }
  public function index(){

    //$types = $this->types->find("types", "all");
    //$this->set("types", $types);
    //$this->set("typesCount", $this->types->find("types", "count"));
      
    //opcion 2
      
      
    $this->set("types", $this->types->find("types",  "all"));
    $this->set("typeCount", $this->types->find("types", "count"));
      
    //$this->set("types", $this->types->find("types", "all"));
    
  }

  public function add(){
    if ($_SESSION["type_name"]=="Administradores") {
      if ($_POST) {
      include_once(ROOT."libs".DS."password.php");
      $pass = new password();
      $_POST["password"] = $pass->getPassword($_POST["password"]);
      //print_r($_POST);
      if ($this->types->save("types", $_POST)) {
        $this->redirect(array("controller"=>"types"));
      }else{
        $this->redirect(array("controller"=>"types", "method"=>"add"));
      }
    }
      /*$types=$this->types->find("types");
      print_r($types);
      exit;*/
      
      $this->set("types", $this->types->find("types"));
      $this->_view->setView("add");
    }else{
      $this->redirect(array("controller"=>"types"));
    }
  }  


  public function edit($id){
      if ($id) {
        //print_r($_GET);
        //$this->set("id", $id);
        $options = array(
          "conditions" => "id=".$id
        );
        $type = $this->types->find("types","first", $options);
        $this->set("type", $type);
          $this->set("types", $this->types->find("types"));
      }
      /*else{
        $this->redirect(array("controller"=>"types"));
      }*/

      if($_POST){
        if(!empty($_POST["newPassword"])){
            $pass =new Password();
            $_POST["password"] = $pass->getPassword($_POST[password]);
          //$_POST["password"] = $_POST["newPassword"];
        }
        if ($this->types->update("types", $_POST)){
          $this->redirect(
            array(
              "controller"=>"types"
              )
          );
        }else{
          $this->redirect(
            array(
              "controller"=>"types",
              "method"=>"edit/".$_POST["id"]
            )
          );
        }
        
      }
  }
    
    public function delete($id){
        $conditions = "id=".$id;
      if(  $this->types->delete("types",$conditions)){
          $this->redirect(array("controller"=>"types"));
      }else{
          $this->redirect(array("controller"=>"types","method"=>"add"));
      }
    }
    
    
}

