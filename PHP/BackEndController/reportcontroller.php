<?php

  session_start();

  include("../Class/billofqntyclass.php");
  include("../Class/projectclass.php");
  include("../Class/withdrawalclass.php");
  include("../Class/individualclass.php");
  include("../Class/subconclass.php");
  include("../Class/reportclass.php");


  switch ($_POST['func']) {

    case 1: //Overall reports

    $overallReport = new reportClass();
    $overallReport->set_wdate($_POST['wdate']);
    $overallReport->set_wsdate($_POST['wsdate']);
    $overallReport->set_filter($_POST['filter']);
    echo $overallReport->generate_OverallReport();
    break;

    case 2: //Subcon reports
    $subconReport = new reportClass();
    $subconReport->set_wdate($_POST['wdate']);
    $subconReport->set_wsdate($_POST['wsdate']);
    $subconReport->set_filter($_POST['filter']);
    echo $subconReport->generate_SubconReport();
    break;

    case 3: //withdrawals
    $withdrawalReport = new reportClass();
    $withdrawalReport->set_pcode($_POST['pcode']);
    $withdrawalReport->set_wdate($_POST['wdate']);
    $withdrawalReport->set_wsdate($_POST['wsdate']);
    $withdrawalReport->set_filter($_POST['filter']);
    echo $withdrawalReport->generate_WithdrawalReport();
    break;

    case 4: //withdrawals edit
    $withdrawalload = new reportClass();
    $withdrawalload->set_pcode($_POST['pcode']);
    $withdrawalload->set_wdate($_POST['wdate']);
    $withdrawalload->set_wsdate($_POST['swdate']);
    $withdrawalload->set_filter($_POST['filter']);
    echo $withdrawalload->generate_WithdrawalLoad();
    break;


}

?>
