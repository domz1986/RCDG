<?php

  class withdrawalClass{

    private $w_id;
    private $w_type;
    private $project_code;
    private $w_indtype;
    private $w_totalamount;
    private $individual_id;
    private $w_date;
    private $w_name;
    private $w_details;
    private $w_status;

    public function setw_ID($w_ID){
      $this->w_id = $w_ID;
    }

    public function setw_TYPE($w_TYPE){
      $this->w_type = $w_TYPE;
    }

    public function setp_CODE($project_CODE){
      $this->project_code = $project_CODE;
    }

    public function setw_INDTYPE($w_INDTYPE)
    {
      $this->w_indtype = $w_INDTYPE;
    }

    public function setw_TOTALAMNT($w_TOTALAMNT)
    {
      $this->w_totalamount = $w_TOTALAMNT;
    }

    public function seti_ID($individual_ID)
    {
      $this->individual_id = $individual_ID;
    }

    public function setw_DATE($w_DATE)
    {
      $this->w_date = $w_DATE;
    }

    public function setw_NAME($w_NAME)
    {
      $this->w_name = $w_NAME;
    }
    public function setw_DETAILS($w_DETAILS)
    {
      $this->w_details = $w_DETAILS;
    }

    public function setw_STATUS($w_STATUS)
    {
      $this->w_status = $w_STATUS;
    }

    public function saveWithdrawal()
    {

      include("../connection.php");
      $this->generate_wID();
    //  echo $this->w_id;
      $sql = $con->prepare("INSERT INTO tblwithdrawal (w_ID,w_TYPE,projectCODE,
                    w_IndTYPE,w_totalAMNT,w_Date,w_Name) VALUES (?,?,?,?,?,?,?)");

      $sql->bind_param("sissdss",$this->w_id,$this->w_type,$this->project_code,
                      $this->w_indtype,$this->w_totalamount,$this->w_date,$this->w_name);


      if($sql->execute() == TRUE)
      {
        return $this->w_id;
      }
      else
      {
          return "Statement failed: ". $sql->error . " <br> ".$con->error;
      }
    }
    public function saveWithdrawal2()
    {
      include("../connection.php");
      $this->generate_wID();
    //  echo $this->w_id;
      $sql = $con->prepare("INSERT INTO tblwithdrawal (w_ID,w_TYPE,projectCODE,
                    w_IndTYPE,w_totalAMNT,w_Date,w_Description,w_Name) VALUES (?,?,?,?,?,?,?,?)");

      $sql->bind_param("sissdsss",$this->w_id,$this->w_type,$this->project_code,
                      $this->w_indtype,$this->w_totalamount,$this->w_date,$this->w_details,$this->w_name);


      if($sql->execute() == TRUE)
      {
        return $this->w_id;
      }
      else
      {
          return "Statement failed: ". $sql->error . " <br> ".$con->error;
      }
    }

    public function loadGraph()
    {
      include("../connection.php");
      $sql = "SELECT DISTINCT tblbillofqnty.boqID as id, boqDesc as B, boqTotalCost as C, (SELECT SUM(individual_AMOUNT) from tblindividual where boqID = id) as total from tblbillofqnty,tblwithdrawal,tblindividual WHERE tblbillofqnty.boqID = tblindividual.boqID AND tblindividual.w_ID = tblwithdrawal.w_ID AND tblwithdrawal.projectCode = '".$this->project_code."' ORDER BY C DESC";

      $result = $con->query($sql);

      if($result->num_rows > 0)
      {
        echo " <div class='ui top attached segment d-1'>";
        echo " <div class='t-left'>";
        echo "<ul class='bar-graph'>";
          while($row=$result->fetch_assoc())
          {
            $percent = round((100/$row['C'])*$row['total'],2);
            echo "<h4> <div class='inline field'><b>".$row['B']."</b> <div class='ui blue basic label'>".$percent
            ."% </div> </div> </h4>";
            echo "<div class='bar-wrap'><span class='bar-fill' style='width: ".$percent."%;'></span></div>";
            echo "<div style='background-color:white;color:black;padding:30px;'>";
            echo "<h4> <i class='list layout icon'></i> BOQ Unit Details</h4>";
            echo "<table class='ui very basic collapsing celled table'>";
            echo "<thead><th class='two wide'></th><th></th></thead>";
            echo "<tbody>";
            echo "<tr><td><b>BOQ Allocated Cost:</b></td><td>".$row['C']."</td></tr>";
            echo "<tr><td><b>Total Amount:</b></td><td>".$row['total']."</td></tr>";
            echo "</tbody></table>";
            echo "</div>";
            echo "<div style='background-color:white;color:black;padding:30px;'>";
            echo "Individual Details";
            echo "<table class='ui small table'>";
            echo "<thead><tr><th>Particulars</th><th>Unit Cost</th><th>Amount</th><th>Suppliers</th></tr></thead>";
            echo "<tbody>";
            $sql2 = "SELECT * FROM tblindividual WHERE boqID LIKE '".$row['id']."'";
            $result2 = $con->query($sql2);
            if($result2->num_rows > 0)
            {
              while($row2=$result2->fetch_assoc())
              {
                echo "<tr><td>".$row2['individual_PARTICULARS']."</td><td>".$row2['individual_UNITCOST']."</td><td>".$row2['individual_AMOUNT']."</td><td>".$row2['individual_SUPPLIER']."</td></tr>";
              }
            }
            echo "</tbody></table>";
            echo "</div>";
          }
        echo "</ul>";
        echo  "</div>";
        echo  "</div>";
        echo "<br>";
          //return $line;
      }
      else
      {
          return "Statement failed: ". $sql->error . " <br> ".$con->error;

      }

    }


    public function generate_wID()
    {
      include("../connection.php");

      $sql = "SELECT w_ID FROM tblwithdrawal
              ORDER BY w_ID DESC LIMIT 1";
      $result = $con->query($sql);
      if($result->num_rows > 0)
      {
          while($row = $result->fetch_assoc())
          {
              $hold = explode("-",$row['w_ID']);
              $id = $hold[1]+1;
              $this->w_id = "W-".$id;
          }
          //echo "enter = {".$this->w_ID."} ";
      }
      else
      {
          $this->w_id = "W-10000";

      }

    }

}
?>
