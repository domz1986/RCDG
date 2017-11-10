<?php

  class reportClass{

    private $p_code;
    private $w_date;
    private $w_date_start;
    private $p_status;

    public function set_pcode($p_CODE){
      $this->p_code = $p_CODE;
    }

    public function set_wdate($w_DATE){
      $this->w_date = $w_DATE;
    }

    public function set_wsdate($ws_DATE){
      $this->ws_date = $ws_DATE;
    }
    public function set_wdate_start($w_sDATE){
      $this->w_date_start = $w_sDATE;
    }

    public function set_pstatus($p_STATUS)
    {
      $this->sc_status = $p_STATUS;
    }

    public function generate_OverallReport()
    {
      include("../connection.php");

      $sql = "SELECT projectCode as pCode,
      (SELECT SUM(boqTotalCost) FROM `tblbillofqnty` WHERE projectCode = pCode) as ContractAmnt,
      (SELECT SUM(subconConAmnt)+SUM(subconMatAmnt) FROM tblsubcon where projectCode = pCode) AS Subcon_contract,
      (SELECT SUM(w_totalAMNT) FROM tblwithdrawal WHERE w_IndTYPE = '1' AND projectCODE = pCode AND w_date<='".$this->w_date."' AND w_Date>='".$this->ws_date."') AS RUNNING_MATERIAL, (";
      $sql2 = "SELECT SUM(w_totalAMNT) FROM tblwithdrawal WHERE w_IndTYPE = '4' AND projectCODE = pCode AND w_Date<='".$this->w_date."' AND w_Date>='".$this->ws_date."') AS RUNNING_SUBCON, (";
      $sql3 = "SELECT SUM(w_totalAMNT) FROM tblwithdrawal WHERE w_IndTYPE = '3' AND projectCODE = pCode AND w_Date<='".$this->w_date."' AND w_Date>='".$this->ws_date."') AS RUNNING_EQUIPMENT, (";
      $sql4 = "SELECT SUM(w_totalAMNT) FROM tblwithdrawal WHERE w_IndTYPE = '2' AND projectCODE = pCode AND w_Date<='".$this->w_date."' AND w_Date>='".$this->ws_date."') AS RUNNING_LABOR, (";
      $sql5 = "SELECT SUM(w_totalAMNT) FROM tblwithdrawal WHERE w_IndTYPE = '5' AND projectCODE = pCode AND w_Date<='".$this->w_date."' AND w_Date>='".$this->ws_date."') AS RUNNING_UTILITIES, (";
      $sql6 = "SELECT SUM(w_totalAMNT) FROM tblwithdrawal WHERE w_IndTYPE = '6' AND projectCODE = pCode AND w_Date<='".$this->w_date."' AND w_Date>='".$this->ws_date."') AS RUNNING_OTHERS,(";
      $sql7 = "SELECT SUM(w_totalAMNT) FROM tblwithdrawal WHERE w_IndTYPE = '7' AND projectCODE = pCode AND w_Date<='".$this->w_date."' AND w_Date>='".$this->ws_date."') AS RUNNING_POS FROM `tblproject` WHERE projectStatus = 1";
      $result = $con->query($sql.$sql2.$sql3.$sql4.$sql5.$sql6.$sql7);
    //  return $sql.$sql2.$sql3.$sql4.$sql5.$sql6.$sql7;
      if($result->num_rows > 0)
      {
          while($row = $result->fetch_assoc())
          {
            echo "<tr>";

              echo "<td>".$row['pCode']."</td>";
              echo "<td>".round($row['ContractAmnt'],2)."</td>";
              echo "<td></td>";
              echo "<td>".$row['Subcon_contract']."</td>";
              echo "<td>".$row['RUNNING_MATERIAL']."</td>";
              echo "<td>".$row['RUNNING_SUBCON']."</td>";
              echo "<td>".$row['RUNNING_EQUIPMENT']."</td>";
              echo "<td>".$row['RUNNING_LABOR']."</td>";
              echo "<td>".$row['RUNNING_UTILITIES']."</td>";
              echo "<td>".$row['RUNNING_OTHERS']."</td>";
              echo "<td>".$row['RUNNING_POS']."</td>";
              $total = $row['RUNNING_POS']+$row['RUNNING_OTHERS']+$row['RUNNING_UTILITIES']+$row['RUNNING_LABOR']+$row['RUNNING_EQUIPMENT']+$row['RUNNING_SUBCON']+$row['RUNNING_MATERIAL'];
              echo "<td>".$total."</td>";
            echo "</tr>";

          }
      }
      else
      {
          return "Statement failed: ". $sql->error . " <br> ".$con->error;
      }
    }
    function generate_SubconReport()
    {
      include("../connection.php");

      $sql = "SELECT projectCode as pCode, subconEngr, subconWork,subconConAmnt as Labor,
      SubconMatAmnt as Materials, subconID as scsID, (subconConAmnt+SubconMatAmnt) as Total,
      (SELECT SUM(w_totalAMNT) FROM tblwithdrawal WHERE w_indTYPE = 4 AND projectCode = pCode AND
      (SELECT w_ID from tblindividual WHERE subconID = scsID AND subconTYPE = 'Labor') = w_ID AND
      w_DATE<='".$this->w_date."' AND w_DATE>='".$this->ws_date."') as Labor2, (SELECT SUM(w_totalAMNT) FROM tblwithdrawal WHERE w_indTYPE = 4 AND
      projectCode = pCode AND (SELECT w_ID from tblindividual WHERE subconID = scsID AND subconTYPE = 'Materials')
      = w_ID AND w_DATE<='".$this->w_date."' AND w_DATE>='".$this->ws_date."') as Materials2  FROM tblsubcon ORDER BY `pCode` ASC";
      $result = $con->query($sql);
      //return $sql;
      if($result->num_rows > 0)
      {
          while($row = $result->fetch_assoc())
          {
            echo "<tr>";

              echo "<td>".$row['pCode']."</td>";
              echo "<td>".$row['subconEngr']."</td>";
              echo "<td>".$row['subconWork']."</td>";
              echo "<td>".$row['Labor']."</td>";
              echo "<td>".$row['Materials']."</td>";
              echo "<td>".$row['Total']."</td>";
              echo "<td>".$row['Labor2']."</td>";
              echo "<td>".$row['Materials2']."</td>";
              $total_run = $row['Labor2']+$row['Materials2'];
              echo "<td>".$total_run."</td>";
              $perc_labor =round($row['Labor2']/($row['Labor']/100),2);
              echo "<td>".$perc_labor." %</td>";

              $perc_material=round($row['Materials']/($row['Materials2']/100),2);
              echo "<td>".$perc_material." %</td>";
              $perc_total=round($total_run/($row['Total']/100),2);
              echo "<td>".$perc_total." %</td>";
              $bal_l=round($row['Labor']-$row['Labor2'],2);
              if($bal_l<=-1)
              {
                $bal_l="(".($bal_l*-1).")";
              }
              echo "<td>".$bal_l." </td>";
              $bal_m=round($row['Materials']-$row['Materials2'],2);
              if($bal_m<=-1)
              {
                $bal_m="(".($bal_m*-1).")";
              }
              echo "<td>".$bal_m." </td>";
              $bal_t=round($row['Total']-$total_run,2);
              if($bal_t<=-1)
              {
                $bal_t="(".($bal_t*-1).")";
              }
              echo "<td>".$bal_t." </td>";
              echo "<td contentEditable='true'></td>";
            echo "</tr>";

          }
    }
    else
    {
        return "Statement failed: ". $sql->error . " <br> ".$con->error;
    }
  }
  function generate_WithdrawalReport()
  {
    include("../connection.php");

    $sql = "SELECT w_ID,w_date, w_Name, w_IndTYPE, w_totalAMNT, w_Description FROM `tblwithdrawal` WHERE projectCODE='".$this->p_code."' AND  w_DATE<='".$this->w_date."' AND  w_DATE>='".$this->ws_date."'  ORDER BY w_DATE ASC";
    $type = array("","Materials","Labor","Equipment","Sub-Contractors","Utilities","Others","POS");
    $result = $con->query($sql);
    //return $sql;
    if($result->num_rows > 0)
    {
        while($row = $result->fetch_assoc())
        {
            echo "<tr><td colspan='11'></td></tr>";
            echo "<tr style='outline:thin dotted'>";
            echo "<td style='display:none'>".$row['w_ID']."</td>";
            echo "<td colspan='1'>".$row['w_date']."</td>";
            echo "<td rowspan='1'>".$type[$row['w_IndTYPE']]."</td>";
            echo "<td colspan='5'>".$row['w_Description']."</td>";
            echo "<td colspan='3'>".$row['w_Name']."</td>";
            echo "<td rowspan='1'><b>".$row['w_totalAMNT']."</b></td>";
            echo "</tr>";

            $sql2 = "SELECT boqID as bq, (SELECT boqItemNo from tblbillofqnty WHERE boqID = bq) as boqin, individual_PARTICULARS, individual_QNTY, individual_UNITCOST, individual_AMOUNT, subconID as sID, subconTYPE, (SELECT subconEngr FROM tblsubcon WHERE subconID = sID) as sbeng, (SELECT subconWork FROM tblsubcon WHERE subconID = sID) as sbwork, (SELECT subconConAmnt FROM tblsubcon WHERE subconID = sID) as sbca, (SELECT subconMatAmnt FROM tblsubcon WHERE subconID = sID) as sbma, individual_SUPPLIER FROM tblindividual WHERE w_ID = '".$row['w_ID']."'";
            $result2 = $con->query($sql2);
            if($result2->num_rows > 0)
            {
              echo "<tr>";
              echo "<td class='center aligned sorted ascending'colspan='1'><b>BOQ Item No.</b></td>";
              echo "<td class='center aligned' rowspan='1'><b>Particulars</b></td>";
              echo "<td class='center aligned' colspan='1'><b>Subcon TYPE</b></td>";
              echo "<td class='center aligned' colspan='1'><b>Engr Name</b></td>";
              echo "<td class='center aligned' colspan='1'><b>Work TYPE</b></td>";
              echo "<td class='center aligned' colspan='1'><b>Labor Amnt</b></td>";
              echo "<td class='center aligned' colspan='1'><b>Material Amnt</b></td>";
              echo "<td class='center aligned' colspan='1'><b>Supplier</b></td>";
              echo "<td class='center aligned' rowspan='1'><b>Quantity</b></td>";
              echo "<td class='center aligned' rowspan='1'><b>Unit Cost</b></td>";
              echo "<td class='center aligned' rowspan='1'><b>Total Cost</b></td>";
              echo "</tr>";

                while($row2 = $result2->fetch_assoc())
                {
                  echo "<tr>";
                  echo "<td style='display:none' id='boq_id'>".$row2['bq']."</td>";
                  echo "<td>".$row2['boqin']."</td>";
                  echo "<td>".$row2['individual_PARTICULARS']."</td>";
                  echo "<td>".$row2['subconTYPE']."</td>";
                  echo "<td>".$row2['sbeng']."</td>";
                  echo "<td>".$row2['sbwork']."</td>";
                  echo "<td>".$row2['sbca']."</td>";
                  echo "<td>".$row2['sbma']."</td>";
                  echo "<td>".$row2['individual_SUPPLIER']."</td>";
                  echo "<td>".$row2['individual_QNTY']."</td>";
                  echo "<td>".$row2['individual_UNITCOST']."</td>";
                  echo "<td>".$row2['individual_AMOUNT']."</td>";
                  echo "</tr>";
                }
                echo "<tr><td colspan='11'></tr>";
            }
        }
    }


  }
  function generate_WithdrawalLoad()
  {
    include("../connection.php");

    $sql = "SELECT w_ID,w_date, w_Name, w_IndTYPE, w_totalAMNT, w_Description FROM `tblwithdrawal` WHERE projectCODE='".$this->p_code."' AND  w_DATE<='".$this->w_date."' AND w_DATE>= '".$this->w_date_start."' ORDER BY w_DATE ASC";
    $type = array("","Materials","Labor","Equipment","Sub-Contractors","Utilities","Others","POS");
    $result = $con->query($sql);
    //return $sql;
    if($result->num_rows > 0)
    {
        while($row = $result->fetch_assoc())
        {
            echo "<tr style='outline:thin dotted'>";
            echo "<td style='display:none'>withdrawal</td>";
            echo "<td style='display:none'>".$row['w_ID']."</td>";
            echo "<td style='display:none'>withdrawal</td>";
            echo "<td style='display:none'>withdrawal</td>";
            echo "<td style='display:none'>withdrawal</td>";
            echo "<td style='display:none'>withdrawal</td>";
            echo "<td style='display:none'>withdrawal</td>";
            echo "<td style='display:none'>withdrawal</td>";
            echo "<td colspan='1'>".$row['w_date']."</td>";
            echo "<td rowspan='1'>".$type[$row['w_IndTYPE']]."</td>";
            echo "<td colspan='5'>".$row['w_Description']."</td>";
            echo "<td colspan='3'>".$row['w_Name']."</td>";
            echo "<td rowspan='1' contentEditable='true' id='total_".$row['w_ID']."'><b>".$row['w_totalAMNT']."</b></td>";
            echo "</tr>";

            $sql2 = "SELECT individual_ID, boqID as bq, (SELECT boqItemNo from tblbillofqnty WHERE boqID = bq) as boqin, individual_PARTICULARS, individual_QNTY, individual_UNITCOST, individual_AMOUNT, subconID as sID, subconTYPE, (SELECT subconEngr FROM tblsubcon WHERE subconID = sID) as sbeng, (SELECT subconWork FROM tblsubcon WHERE subconID = sID) as sbwork, (SELECT subconConAmnt FROM tblsubcon WHERE subconID = sID) as sbca, (SELECT subconMatAmnt FROM tblsubcon WHERE subconID = sID) as sbma, individual_SUPPLIER FROM tblindividual WHERE w_ID = '".$row['w_ID']."'";
            $result2 = $con->query($sql2);
            if($result2->num_rows > 0)
            {
              echo "<tr>";
              echo "<td style='display:none'></td>";
              echo "<td style='display:none'></td>";
              echo "<td class='center aligned sorted ascending'colspan='1' contentEditable='false'><b>BOQ Item No.</b></td>";
              echo "<td class='center aligned' rowspan='1'><b>Particulars</b></td>";
              echo "<td class='center aligned' colspan='1'><b>Subcon TYPE</b></td>";
              echo "<td class='center aligned' colspan='1'><b>Engr Name</b></td>";
              echo "<td class='center aligned' colspan='1'><b>Work TYPE</b></td>";
              echo "<td class='center aligned' colspan='1'><b>Labor Amnt</b></td>";
              echo "<td class='center aligned' colspan='1'><b>Material Amnt</b></td>";
              echo "<td class='center aligned' colspan='1'><b>Supplier</b></td>";
              echo "<td class='center aligned' rowspan='1'><b>Quantity</b></td>";
              echo "<td class='center aligned' rowspan='1'><b>Unit Cost</b></td>";
              echo "<td class='center aligned' rowspan='1' contentEditable='false'><b>Total Cost</b></td>";
              echo "</tr>";

                while($row2 = $result2->fetch_assoc())
                {
                  echo "<tr>";
                  echo "<td style='display:none'>".$row['w_ID']."</td>";
                  echo "<td style='display:none'>".$row2['individual_ID']."</td>";
                  echo "<td contentEditable='false'>".$row2['boqin']."</td>";
                  echo "<td contentEditable='false'>".$row2['individual_PARTICULARS']."</td>";
                  echo "<td>".$row2['subconTYPE']."</td>";
                  echo "<td>".$row2['sbeng']."</td>";
                  echo "<td>".$row2['sbwork']."</td>";
                  echo "<td contentEditable='false'>".$row2['sbca']."</td>";
                  echo "<td contentEditable='false'>".$row2['sbma']."</td>";
                  echo "<td>".$row2['individual_SUPPLIER']."</td>";
                  echo "<td>".$row2['individual_QNTY']."</td>";
                  echo "<td>".$row2['individual_UNITCOST']."</td>";
                  echo "<td contentEditable='false'>".$row2['individual_AMOUNT']."</td>";
                  echo "</tr>";
                }
                echo "<tr><td style='display:none'></td>";
                echo "<td style='display:none'></td>";
                echo "<td style='display:none'></td>";
                echo "<td style='display:none'></td>";
                echo "<td style='display:none'></td>";
                echo "<td style='display:none'></td>";
                echo "<td style='display:none'></td>";
                echo "<td style='display:none'></td>";
                echo "<td style='display:none'></td>";
                echo "<td style='display:none'></td>";
                echo "<td style='display:none'></td>";
                echo "<td style='display:none'></td>";
                echo "<td colspan='11'></td></tr>";
            }
        }
    }


  }

}
?>
