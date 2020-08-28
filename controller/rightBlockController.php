<?php
$postManager = new PostManager();
$userManager = new UserManager();
$lastUser = $userManager->getLastUser();
$lastPost = $postManager->lastPost();