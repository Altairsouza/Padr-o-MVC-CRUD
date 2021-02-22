<?php
namespace App\Controller;

use Src\Classes\ClassRender;
use Src\interfaces\InterfaceView;

class ControllerContato extends ClassRender  implements InterfaceView{
  public function __construct()
  {
    $this->setTitle("Contato");
      $this->setDescription("Faça contato conosco.");
      $this->setKeywords("contato, telefone, email");
      $this->setDir("contato");
      $this->renderLayout();
  }
}