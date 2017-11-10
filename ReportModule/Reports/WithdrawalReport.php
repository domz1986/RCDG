<html>
  <head>
      <center>
        <title>Sub-Contractors Progress Billing</title>

        <link href="../../Libraries/semantic/semantic.min.css" rel="stylesheet" type="text/css">
        <link href="../../Libraries/semantic/semantic.css" rel="stylesheet" type="text/css">
        <link href="../../Libraries/main.css" rel="stylesheet" type="text/css">

        <script src="../../Libraries/jquery-1.12.4.js" type="text/javascript"></script>
        <script src="../../Libraries/ajax-3.1.1.js" type="text/javascript"></script>


        <script src="../../Libraries/semantic/semantic.js"></script>
        <script src="../../Libraries/semantic/semantic.min.js"></script>

    </center>
  </head>
  <body>

        <center>
          <div id="rep_date" style="display:none"></div>
          <div id="rep_type" style="display:none"></div>
          <div id="aps_projectname" style="display:none"></div>
          <h3>Withdrawal Details of Project Code </h3><h3 id="proj_code"></h3>
            <label>Actual Withdrawals from <label id="slabel_date"></label> to <label id="label_date"></label></label>
              <table class="ui celled structured table" id='withdrawal_table'>
              <thead>
                  <tr>
                    <th class="center aligned sorted ascending"colspan="1">Date</th>
                    <th class="center aligned" rowspan="1">Type of Withdrawal</th>
                    <th class="center aligned" colspan="5">Description</th>
                    <th class="center aligned" colspan="3">Name</th>
                    <th class="center aligned" rowspan="1">Total Amount</th>
                  </tr>
              </thead>
              <tbody id='withdrawal_tbody'>
              </tbody>
            </table>
        </center>

      <script src="../../FrontEndController/Printreportscript.js" type="text/javascript"></script>
      <script  type="text/javascript">
          $(document).ready(function(){
              var a = sessionStorage.getItem("sent");
              var arr = a.split(",")
              $('#rep_date').html(arr[0]);
              $('#rep_type').html(arr[1]);
              $('#aps_projectname').html(arr[2]);
              $('#s_rep_date').html(arr[3]);
              label_date2(arr[0],arr[3]);
              generate_report(arr[0],arr[1],arr[2],arr[3]);
          });
      </script>
  </body>
</html>
