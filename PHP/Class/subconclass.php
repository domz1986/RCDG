<?php

  class subconClass{

    private $sc_id;
    private $p_code;
    private $sc_engrname;
    private $sc_work;
    private $sc_conamnt;
    private $sc_matamnt;
    private $sc_status;

    public function set_scid($sc_ID){
      $this->sc_id = $sc_ID;
    }

    public function set_pcode($p_CODE){
      $this->p_code = $p_CODE;
    }

    public function set_scengrname($sc_ENAME){
      $this->sc_engrname = $sc_ENAME;
    }

    public function set_scwork($sc_WORK)
    {
      $this->sc_work = $sc_WORK;
    }

    public function set_scconamnt($sc_CAMNT)
    {
      $this->sc_conamnt = $sc_CAMNT;
    }

    public function set_scmatamnt($sc_MAMNT)
    {
      $this->sc_matamnt = $sc_MAMNT;
    }

    public function set_scstatus($sc_STATUS)
    {
      $this->sc_status = $sc_STATUS;
    }

    public function saveSubCon()
    {

      include("../connection.php");
      //return $this->sc_id;
      $this->generate_scID();

      $sql = $con->prepare("INSERT INTO tblsubcon (subconID,projectCode,subconEngr,
                    subconWork,subconConAmnt,subconMatAmnt) VALUES (?,?,?,?,?,?)");

      $sql->bind_param("ssssdd",$this->sc_id,$this->p_code,$this->sc_engrname,
                      $this->sc_work,$this->sc_conamnt,$this->sc_matamnt);


      if($sql->execute() == TRUE)
      {
        return $this->sc_id;
      }
      else
      {
          return "Statement failed: ". $sql->error . " <br> ".$con->error;
      }
    }

    public function generate_scID()
    {
      include("../connection.php");

      $sql = "SELECT subconID FROM tblsubcon
              ORDER BY subconID DESC LIMIT 1";
      $result = $con->query($sql);
      if($result->num_rows > 0)
      {
          while($row = $result->fetch_assoc())
          {
              $hold = explode("-",$row['subconID']);
              $id = $hold[1]+1;
              $this->sc_id = "SC-".$id;
          }
      }
      else
      {
          $this->sc_id = "SC-10000";
      }
    }

    public function load_dropdown()
    {
      include("../connection.php");

      $sql = "SELECT * FROM tblsubcon
              WHERE projectCode LIKE '".$this->p_code."' AND subconStatus LIKE 1";
      $result = $con->query($sql);
      if($result->num_rows > 0)
      {
          while($row = $result->fetch_assoc())
          {
            echo "<div class='item' data-value=\"".$row['subconID']."\">".
                  $row['subconEngr']." ".$row['subconWork']."</div>";
          }
      }

    }
    public function load_table()
    {
      include("../connection.php");

      $sql = "SELECT * FROM tblsubcon
              WHERE projectCode LIKE '".$this->p_code."' AND subconStatus LIKE 1";
      $result = $con->query($sql);
      if($result->num_rows > 0)
      {
          while($row = $result->fetch_assoc())
          {
            $a = floatval($row['subconConAmnt']);
            $b = floatval($row['subconMatAmnt']);
            $total = $a+$b;
            echo "<tr> <td style='display:none'>".$row['subconID'].
                  "</td> <td>".$row['subconEngr'].
                  "</td> <td>".$row['subconWork'].
                  "</td> <td>".$row['subconConAmnt'].
                  "</td> <td>".$row['subconMatAmnt'].
                  "</td> <td>".$total.
                  "</td> </tr>";
          }
      }
    }
    public function editsavesubcon()
    {
      include("../connection.php");

      $sql = "UPDATE tblsubcon SET
              projectCode = '".$this->p_code."',
              subconEngr = '".$this->sc_engrname."',
              subconWork = '".$this->sc_work."',
              subconConAmnt = '".$this->sc_conamnt."',
              subconMatamnt = '".$this->sc_matamnt."' WHERE subconID = '".$this->sc_id."'";
      echo $sql;
      $con->query($sql);
      return 1;
    }

}
?>
