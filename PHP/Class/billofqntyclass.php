  <?php

  class BillofQntyClass{

    private $projectCode;
    private $boqid;
    private $boqItemNo;
    private $boqDesc;
    private $boqUnit;
    private $boqQnty;
    private $boqUnitCost;
    private $boqTotalCost;

    public function setboqprojectCode($pID){
      $this->projectCode = $pID;
    }

    public function setboqID($boqID){
      $this->boqid = $boqID;
    }

    public function setboqItemNo($itemno){
      $this->boqItemNo = $itemno;
    }

    public function setboqDesc($desc){
      $this->boqDesc = $desc;
    }

    public function setboqUnit($unit){
      $this->boqUnit = $unit;
    }

    public function setboqQnty($qnty){
      $this->boqQnty = $qnty;
    }

    public function setboqUnitCost($unitcost){
      $this->boqUnitCost = $unitcost;
    }

    public function setboqTotalCost($totalcost){
      $this->boqTotalCost = $totalcost;
    }


    public function BillofQntyClass(){

    }

    public function saveboq(){

      include("../connection.php");

      $sql = "INSERT INTO tblbillofqnty (boqItemNo,boqDesc,boqUnit,
              boqQnty,boqUnitCost,boqTotalCost,projectCode)
              VALUES ('$this->boqItemNo','$this->boqDesc','$this->boqUnit',
              '$this->boqQnty','$this->boqUnitCost','$this->boqTotalCost','$this->projectCode')";

      //echo $sql;
      $con->query($sql);
      return 1;
    }
    public function updateBOQ()
    {

      include("../connection.php");

      $sql = "UPDATE tblbillofqnty SET boqItemNo = '".$this->boqItemNo."', boqDesc = '".$this->boqDesc."',
              boqUnit = '".$this->boqUnit."', boqQnty = ".$this->boqQnty.", boqUnitCost = ".$this->boqUnitCost.",
              boqTotalCost = ".$this->boqTotalCost.",projectCode='".$this->projectCode."' WHERE boqID = ".$this->boqid;

    //  echo $sql;
      $con->query($sql);
      return 1;
    }

    public function loadBOQToTable()
    {
      include("../connection.php");

      $sql = "SELECT * FROM tblbillofqnty
              WHERE projectCode = '$this->projectCode'";

    //  echo $sql;
      $result = $con->query($sql);
      $total = 0;
      if($result->num_rows > 0){

        while($row = $result->fetch_assoc()){
          $total = $total + $row['boqTotalCost'];
          echo "<tr>";
            echo "<td style='display:none'>".$row['boqID']."</td>";
            echo "<td>".$row['boqItemNo']."</td>";
            echo "<td>".$row['boqDesc']."</td>";
            echo "<td>".$row['boqUnit']."</td>";
            echo "<td>".$row['boqQnty']."</td>";
            echo "<td>".$row['boqUnitCost']."</td>";
            echo "<td>".$row['boqTotalCost']."</td>";

          echo "</tr>";

        }

        echo "<td colspan='5'>Total</td><td>".$total."</td>";

      }


    }
    public function loadBOQToDropDown(){
      include("../connection.php");

      $sql = "SELECT * FROM tblbillofqnty
              WHERE projectCode = '$this->projectCode'";


      $result = $con->query($sql);
      $total = 0;
      if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
          $total = $total + $row['boqTotalCost'];
          echo "<div class='item' data-value=\"".$row['boqID']."\">".
                $row['boqDesc']."</div>";
        }
      }


    }
    public function eraseall()
    {

      include("../connection.php");
      $sql = "DELETE FROM  tblbillofqnty WHERE projectCode = '".$this->projectCode."'";
      //echo $sql." ";
      $result = $con->query($sql);
      return 1;
    }

}
?>
