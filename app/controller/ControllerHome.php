<?php
namespace App\Controller;

use Src\Classes\ClassRender;
use Src\interfaces\InterfaceView;

class ControllerHome extends ClassRender  implements InterfaceView{
  public function __construct()
  {
    $this->setTitle("Página iniial");
      $this->setDescription("Esse é o nosso site de MVC");
      $this->setKeywords("mvc completo, curso de mvc, webdesign em foco");
      $this->setDir("home");
      $this->renderLayout();
  }
}