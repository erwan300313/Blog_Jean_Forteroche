<?php

class ViewManager {


private $file;
private $title;
private $postManager;
private $userManager;

public function __construct($action) {
    $this->file = "view/" . $action . "View.php";
    $this->postManager = new PostManager();
    $this->userManager = new UserManager();
}

public function generate($data) {
  $content = $this->generateFile($this->file, $data);
  $lastPost = $this->postManager->lastPost();
  $lastUser = $this->userManager->getLastUser();
  $view = $this->generateFile('view/template.php',
  array('title' => $this->title, 'content' => $content, 'lastUser' => $lastUser, 'lastPost' => $lastPost));
  echo $view;
}

private function generateFile($file, $data) {
  if (file_exists($file)) {
    extract($data);
    ob_start();
    require $file;
    return ob_get_clean();
  }
  else {
    throw new Exception("Fichier '$file' introuvable");
  }
}
}