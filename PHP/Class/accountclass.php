<?php

  class accountClass{

    private $acc_id;
    private $acc_username;
    private $acc_password;
    private $acc_status;


    public function set_user($acc_USER){
      $this->acc_username = $acc_USER;
    }

    public function set_password($acc_PASS)
    {
      $this->acc_password = $acc_PASS;
    }

    public function generate_ID()
    {
      include("../connection.php");

      $sql = "SELECT acc_id FROM tblaccount
              ORDER BY acc_id DESC LIMIT 1";
      $result = $con->query($sql);
      if($result->num_rows > 0)
      {
          while($row = $result->fetch_assoc())
          {
              $hold = explode("-",$row['acc_id']);
              $id = $hold[1]+1;
              $this->w_id = "ACC-".$id;
          }
      }
      else
      {
          $this->w_id = "ACC-10000";

      }

    }


    public function Log_In()
    {
      include("../connection.php");

      $sql = "SELECT acc_id FROM tblaccount WHERE acc_user='".$this->acc_username."' AND acc_password ='".$this->acc_password."' AND acc_status = 1";

      $result = $con->query($sql);

      if($result->num_rows > 0)
      {
          while($row = $result->fetch_assoc())
          {
            return 1;
          }
      }
      else
      {
          return 2;
      }
    }

}
?>
