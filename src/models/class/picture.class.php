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

    $targetFile = $this->targetDir. basename($_FILES['avatar']['name']);
    $uploadCheck = 1;
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    if (!empty($_FILES['avatar'])) {
      $check = getimagesize($_FILES['avatar']["tmp_name"]);

      if ($check !== false) {
        $uploadCheck = 1;
      } else {
        throw new Exception();
        $uploadCheck = 0;
      }

      if ($_FILES["avatar"]["size"] > 5000000) {
        throw new Exception();
        $uploadCheck = 0;
      }

      if (
        $imageFileType != "jpg" && $imageFileType != "png" &&
        $imageFileType != "jpeg" && $imageFileType != "gif"
      ) {
        throw new Exception();
        $uploadCheck = 0;
      }
    }

    if ($uploadCheck == 0) {
      throw new Exception();
    } else {
      if (move_uploaded_file($_FILES["avatar"]["tmp_name"], $targetFile)) {
        $status['status'] = "The file " . htmlspecialchars(basename($_FILES["avatar"]["name"])) . " has been uploaded.";
      } else {
        $status['status'] = "Sorry, there was an error uploading your file.";
      }
    }
    return;
  }
}
