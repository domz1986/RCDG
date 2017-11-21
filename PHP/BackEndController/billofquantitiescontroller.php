<?php

  session_start();

  include("../Class/billofqntyclass.php");
  include("../Class/projectclass.php");

  switch ($_POST['func']) {

    case 1: //save project

      $saveproject = new ProjectClass();
      $saveproject->setprojectName($_POST['pname']);
      $saveproject->setprojectCode($_POST['pcode']);
      $saveproject->setprojectEngr($_POST['pengr']);
      $saveproject->setprojectCost($_POST['pconcost']);
      $saveproject->setmatCost($_POST['costM']);
      $saveproject->setequipCost($_POST['costE']);
      $saveproject->setlaborCost($_POST['costL']);
      echo $saveproject->saveproject();
    break;

    case 2: //save boq
      $saveboqentry = new BillofQntyClass();
      $saveboqentry->setboqItemNo($_POST['itemno']);
      $saveboqentry->setboqDesc($_POST['desc']);
      $saveboqentry->setboqUnit($_POST['unit']);
      $saveboqentry->setboqQnty($_POST['qnty']);
      $saveboqentry->setboqUnitCost($_POST['unitcost']);
      $saveboqentry->setboqTotalCost($_POST['totalcost']);
      $saveboqentry->setboqprojectCode($_POST['pcode']);
      echo $saveboqentry->saveboq();

    break;

    case 3: //load project dropbox

      $loadprojectname = new ProjectClass();
      echo $loadprojectname->loadProjectsToDropBox();
      break;


      case 4: //project info

        $getprojectinfo = new ProjectClass();
        $getprojectinfo->setprojectCode($_POST['pcode']);
        echo $getprojectinfo->getProjectInfo();
        break;

      case 5: //load boq to table

        $loadboqtotable = new BillofQntyClass();
        $loadboqtotable->setboqprojectCode($_POST['pcode']);
        echo $loadboqtotable->loadBOQToTable();
        break;

      case 6: //load boq to dropdown

        $loadboqtodropdown = new BillofQntyClass();
        $loadboqtodropdown->setboqprojectCode($_POST['pcode']);
        echo $loadboqtodropdown->loadBOQToDropDown();
        break;

      case 7: //edit/save project details
      $editproject = new ProjectClass();
      $editproject->setprojectID($_POST['pid']);
      $editproject->setprojectName($_POST['pname']);
      $editproject->setprojectCode($_POST['pcode']);
      $editproject->setprojectEngr($_POST['pengr']);
      $editproject->setprojectCost($_POST['pconcost']);
      echo $editproject->editproject();
      break;

      case 8: //update boqID
      $editboq = new BillofQntyClass();
      $editboq->setboqID($_POST['id']);
      $editboq->setboqItemNo($_POST['itemno']);
      $editboq->setboqDesc($_POST['desc']);
      $editboq->setboqUnit($_POST['unit']);
      $editboq->setboqQnty($_POST['qnty']);
      $editboq->setboqUnitCost($_POST['unitcost']);
      $editboq->setboqTotalCost($_POST['totalcost']);
      $editboq->setboqprojectCode($_POST['pcode']);
      echo $editboq->updateBOQ();
      break;


}

?>
