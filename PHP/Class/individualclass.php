<?php

  class individualClass{

    private $ind_id;
    private $boq_id;
    private $ind_quantity;
    private $ind_particular;
    private $ind_unitcost;
    private $ind_amount;
    private $ind_supplier;
    private $subcon_id;
    private $subcon_type;
    private $w_id;

    public function setind_ID($ind_ID){
      $this->ind_id = $ind_ID;
    }
    public function setboq_ID($boq_ID){
      $this->boq_id = $boq_ID;
    }
    public function setind_QNTY($ind_QNTY){
      $this->ind_quantity = $ind_QNTY;
    }
    public function setind_PAR($ind_PAR){
      $this->ind_particular = $ind_PAR;
    }
    public function setind_UNITCOST($ind_UNITCOST){
      $this->ind_unitcost = $ind_UNITCOST;
    }
    public function setind_AMNT($ind_AMNT){
      $this->ind_amount = $ind_AMNT;
    }
    public function setind_SUP($ind_SUP){
      $this->ind_supplier = $ind_SUP;
    }
    public function setsc_ID($subcon_ID){
      $this->subcon_id = $subcon_ID;
    }
    public function setst_TYPE($subcon_TYPE){
      $this->subcon_type = $subcon_TYPE;
    }
    public function setw_ID($w_ID){
      $this->w_id = $w_ID;
    }

    public function saveIndividuals()
    {

      include("../connection.php");
      $this->generate_indID();
    //  echo $this->ind_id;
      $sql = $con->prepare("INSERT INTO tblindividual (individual_ID,boqID,individual_QNTY,
                    individual_PARTICULARS, individual_UNITCOST, individual_AMOUNT, individual_SUPPLIER, w_ID, subconID, subconTYPE)
                    VALUES (?,?,?,?,?,?,?,?,?,?)");

      $sql->bind_param("sidsddssss",$this->ind_id,$this->boq_id,$this->ind_quantity,
                        $this->ind_particular,$this->ind_unitcost,$this->ind_amount,$this->ind_supplier,
                        $this->w_id,$this->subcon_id,$this->subcon_type);


      if($sql->execute() == TRUE)
      {
        return 1;
      }
      else
      {
          return "Statement failed: ". $sql->error . " <br> ".$con->error;
      }
    }

    public function generate_indID()
    {
      include("../connection.php");

      $sql = "SELECT individual_ID FROM tblindividual
              ORDER BY individual_ID DESC LIMIT 1";
      $result = $con->query($sql);
      if($result->num_rows > 0)
      {
          while($row = $result->fetch_assoc())
          {
              $hold = explode("-",$row['individual_ID']);
              $id = $hold[1]+1;
              $this->ind_id = "Ind-".$id;
          }
          //echo "enter = {".$this->w_ID."} ";
      }
      else
      {
          $this->ind_id = "Ind-10000";

      }

    }
}
?>
