<?php
require_once('controller.php');

Class AboutController{

    private $variousManager;

    public function __construct(){
        $this->variousManager = new VariousManager();
    }

    function about()
    {
        $getFullVarious = $this->variousManager->getFullVarious();
        $view = new ViewManager('about');
        $view->generate(array('getFullVarious' => $getFullVarious));
    }

    function various($id)
    {
        $getVarious = $this->variousManager->getVarious($id);
        $view = new ViewManager('various');
        $view->generate(array('getVarious' => $getVarious));
    }


}