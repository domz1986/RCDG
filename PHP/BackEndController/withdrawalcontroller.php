<?php

  session_start();

  include("../Class/billofqntyclass.php");
  include("../Class/projectclass.php");
  include("../Class/withdrawalclass.php");
  include("../Class/individualclass.php");
  include("../Class/subconclass.php");
  include("../Class/accountclass.php");


  switch ($_POST['func']) {

    case 1: //save project

    $saveproject = new ProjectClass();
    $saveproject->setprojectName($_POST['pname']);
    $saveproject->setprojectCode($_POST['pcode']);
    $saveproject->setprojectEngr($_POST['pengr']);
    $saveproject->setprojectCost($_POST['pconcost']);
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

    case 6: //save withdrawal

    $saveWithdrawal = new withdrawalClass();
    $saveWithdrawal->setw_TYPE($_POST['costtype']);
    $saveWithdrawal->setp_CODE($_POST['pcode']);
    $saveWithdrawal->setw_INDTYPE($_POST['tdc']);
    $saveWithdrawal->setw_TOTALAMNT($_POST['totalamnt']);
    $saveWithdrawal->setw_DATE($_POST['wdate']);
    $saveWithdrawal->setw_NAME($_POST['wname']);
    echo $saveWithdrawal->saveWithdrawal();
    break;

    case 7: //save individuals

    $saveindividual = new individualClass();
    $saveindividual->setboq_ID($_POST['boqid']);
    $saveindividual->setind_QNTY($_POST['qnty']);
    $saveindividual->setind_PAR($_POST['par']);
    $saveindividual->setind_UNITCOST($_POST['unitcost']);
    $saveindividual->setind_AMNT($_POST['amnt']);
    $saveindividual->setind_SUP($_POST['sup']);
    $saveindividual->setw_ID($_POST['wid']);
    $saveindividual->setsc_ID($_POST['sc']);
    $saveindividual->setst_TYPE($_POST['st']);
    echo $saveindividual->saveIndividuals();
    break;

    case 8: //load graph
    $loadgraph = new withdrawalClass();
    $loadgraph->setp_CODE($_POST['pcode']);
    $loadgraph->setw_INDTYPE($_POST['windtype']);
    echo $loadgraph->loadGraph();
    break;

    case 9: //save Subcontractors
    $savesubcon = new subconClass();
    $savesubcon->set_pcode($_POST['pcode']);
    $savesubcon->set_scengrname($_POST['ename']);
    $savesubcon->set_scwork($_POST['wk']);
    $savesubcon->set_scconamnt($_POST['ccost']);
    $savesubcon->set_scmatamnt($_POST['mcost']);
    echo $savesubcon->saveSubCon();
    break;

    case 10: //load in subcon dropdown
    $loadsubcon = new subconClass();
    $loadsubcon->set_pcode($_POST['pcode']);
    echo $loadsubcon->load_dropdown();
    break;

    case 11: //load subcon in table
    $loadtablesc =new subconClass();
    $loadtablesc->set_pcode($_POST['pcode']);
    echo $loadtablesc->load_table();
    break;

    case 12: //save indiirect
    $saveWithdrawal = new withdrawalClass();
    $saveWithdrawal->setw_TYPE($_POST['costtype']);
    $saveWithdrawal->setp_CODE($_POST['pcode']);
    $saveWithdrawal->setw_INDTYPE($_POST['tidc']);
    $saveWithdrawal->setw_TOTALAMNT($_POST['amount']);
    $saveWithdrawal->setw_DATE($_POST['date']);
    $saveWithdrawal->setw_NAME($_POST['name']);
    $saveWithdrawal->setw_DETAILS($_POST['details']);
    echo $saveWithdrawal->saveWithdrawal2();
    break;

    case 13: //log in
    $accountLog = new accountClass();
    $accountLog->set_user($_POST['user']);
    $accountLog->set_password($_POST['pass']);
    echo $accountLog->Log_In();
    break;

    case 14: //save/edit Subcontractors
    $editsubcon = new subconClass();
    $editsubcon->set_scid($_POST['id']);
    $editsubcon->set_pcode($_POST['pcode']);
    $editsubcon->set_scengrname($_POST['ename']);
    $editsubcon->set_scwork($_POST['wk']);
    $editsubcon->set_scconamnt($_POST['ccost']);
    $editsubcon->set_scmatamnt($_POST['mcost']);
    echo $editsubcon->editsavesubcon();
    break;

    case 15: //edit withdrawalclass
    $editwithdrawal = new withdrawalClass();
    $editwithdrawal->setw_ID($_POST['wid']);
    $editwithdrawal->setw_DETAILS($_POST['wdesc']);
    $editwithdrawal->setw_TOTALAMNT($_POST['totalamnt']);
    $editwithdrawal->setw_DATE($_POST['wdate']);
    $editwithdrawal->setw_NAME($_POST['wname']);
    $editwithdrawal->editWithdrawal();
    break;

    case 16: //edit individuals
    $editindividual = new individualClass();
    $editindividual->setind_ID($_POST['indid']);
    $editindividual->setind_PAR($_POST['inpar']);
    $editindividual->setind_SUP($_POST['insup']);
    $editindividual->setind_QNTY($_POST['inqnty']);
    $editindividual->setind_UNITCOST($_POST['inunit']);
    $editindividual->setind_AMNT($_POST['inamnt']);
    echo $editindividual->editIndividuals();
    break;
}

?>
