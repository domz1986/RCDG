<?php

  class ProjectClass{

    private $projectID;
    private $projectCode;
    private $projectName;
    private $projectCost;
    public $projectEngr;

    public function setprojectID($id){
      $this->projectID = $id;
    }

    public function setprojectCode($code){
      $this->projectCode = $code;
    }

    public function setprojectName($name){
      $this->projectName = $name;
    }

    public function setprojectCost($cost){
      $this->projectCost = $cost;
    }

    public function setprojectEngr($engr){
      $this->projectEngr = $engr;
    }

    public function ProjectClass(){

    }

    public function saveproject(){

      include("../connection.php");

      $sql = "INSERT INTO tblproject (`projectCode`, `projectName`, `projectCost`, `projectEngr`)
                    VALUES ('$this->projectCode','$this->projectName','$this->projectCost',
                      '$this->projectEngr')";


      $con->query($sql);
      return 1;
    }



    public function loadProjectsToDropBox(){

      include("../connection.php");

      $sql = "SELECT projectID, projectCode, projectName
              FROM tblproject
              ORDER BY projectName ASC";

      $result = $con->query($sql);

      if($result->num_rows > 0){

        while($row = $result->fetch_assoc()){

          echo "<div class='item' data-value=\"".$row['projectCode']."\">".
                $row['projectName']."</div>";


        }

      }

      $con->close();

    }

    public function getProjectInfo(){

      $projectinfo = "";

      include("../connection.php");

      $sql = "SELECT *
              FROM tblproject
              WHERE projectCode = '$this->projectCode'";

      $result = $con->query($sql);
      $row = $result->fetch_assoc();
      $productinfo = $row['projectEngr']."=".$row['projectCost']."=".$row['projectName']."=".$row['projectID'];

      return $productinfo;

    }
    public function editproject(){

      include("../connection.php");

      $sql = "UPDATE tblproject SET projectCode='".$this->projectCode."', projectName='".$this->projectName."', projectCost=".$this->projectCost.", projectEngr='".$this->projectEngr."' WHERE projectID = ".$this->projectID;
      $con->query($sql);
      return 1;
    }
}
