<?php

require_once('./src/models/class/database.class.php');

class Picture extends Database
{

  public $targetDir;

  public function __construct()
  {
    parent::__construct();
    $this->targetDir = trim("./public/images/uploads/ ");
  }

  public function uploadImage()
  {
    $targetFile = $this->targetDir. basename($_FILES['image']['name']);
    $uploadCheck = 1;
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    if (!empty($_FILES['image'])) {

      if ($_FILES["image"]["size"] > 5000000) {
        $uploadCheck = 0;
      }

      if (
        $imageFileType != "jpg" && $imageFileType != "png" &&
        $imageFileType != "jpeg" && $imageFileType != "gif"
      ) {
        $uploadCheck = 0;
      }
    }

    if ($uploadCheck == 0) {
      throw new Exception();
    } else {
      if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
        true;
      } else {
        throw new Exception();
      }
    }
    return;
  }

  // public function getPicturesDesc(){
  //   $getPicturesDesc = $this->pdo->prepare("");

  // }
}
