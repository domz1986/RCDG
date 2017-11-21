<html>
  <head>
      <center>
        <title>Over All Project Costing Report</title>

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
          <h3>Over All Project Costing</h3>
          <div id="rep_date" style="display:none"></div>
          <div id="rep_type" style="display:none"></div>
          <div id="filter" style="display:none"></div>
            <label>from <label id="slabel_date"></label> to <label id="label_date"></label></label>
              <table class="ui celled structured table" id='subcon_table'>
                <thead>
                    <tr>
                      <th class="center aligned sorted ascending" rowspan="3">Projects</th>
                      <th class="center aligned" rowspan="3">Contract Amount</th>
                      <th class="center aligned" colspan="4">In-house Contract</th>
                      <th class="center aligned" colspan="8">Running Total</th>
                      <th class="center aligned" colspan="4">Percentage</th>
                      <th class="center aligned" rowspan="3">Percentage per Contract</th>
                      <th class="center aligned" colspan="4">Remaining Balance</th>
                      <th class="center aligned" rowspan="3">Remaining Balance per Contract</th>
                      <th class="center aligned" rowspan="3">Remarks</th>
                    </tr>
                    <tr>
                     <th class="center aligned" rowspan="2">Material</th>
                     <th class="center aligned" rowspan="2">Sub-Con</th>
                     <th class="center aligned" rowspan="2">Equipment</th>
                     <th class="center aligned" rowspan="2">Labor</th>
                     <th class="center aligned" colspan="4">Direct Cost</th>
                     <th class="center aligned" colspan="3">Indirect Cost</th>
                     <th class="center aligned" rowspan="2">Total</th>
                     <th class="center aligned" rowspan="2">Material</th>
                     <th class="center aligned" rowspan="2">Sub-Con</th>
                     <th class="center aligned" rowspan="2">Equipment</th>
                     <th class="center aligned" rowspan="2">Labor</th>
                     <th class="center aligned" rowspan="2">Material</th>
                     <th class="center aligned" rowspan="2">Sub-Con</th>
                     <th class="center aligned" rowspan="2">Equipment</th>
                     <th class="center aligned" rowspan="2">Labor</th>
                   </tr>
                   <tr>
                     <th class="center aligned">Material</th>
                     <th class="center aligned">Sub-Con</th>
                     <th class="center aligned">Equipment</th>
                     <th class="center aligned">Labor</th>
                     <th class="center aligned">Utilities</th>
                     <th class="center aligned">Others</th>
                     <th class="center aligned">POS</th>
                   </tr>
                </thead>
                <tbody id='overall_tbody'>
                </tbody>
              </table>
              
          </div>
        </div>
        <!-- SUBCON REPORT -->
        <div class="ui top attached segment d-1" id="SubCon" style="display:none">
          <div class="ui form">
            <h3>Sub-Contractors Progress Billings</h3>
              <label>Actual Billings from <label id="slabel_date1"></label> to <label id="label_date1"></label></label>
                <table class="ui celled structured table" id='subcon_table2'>
                <thead>
                    <tr>
                      <th class="center aligned sorted ascending" rowspan="2">Name of Projects</th>
                      <th class="center aligned" rowspan="2">Sub-Con</th>
                      <th class="center aligned" rowspan="2">Work</th>
                      <th class="center aligned" colspan="3">Contract Amount</th>
                      <th class="center aligned" colspan="3">Running Amount</th>
                      <th class="center aligned" colspan="3">Total Percentage</th>
                      <th class="center aligned" colspan="3">Balance Amount to Contract</th>
                      <th class="center aligned" rowspan="2">Remarks</th>
                    </tr>
                    <tr>
                     <th class="center aligned">Labor</th>
                     <th class="center aligned">Material</th>
                     <th class="center aligned">Total</th>
                     <th class="center aligned">Labor</th>
                     <th class="center aligned">Material</th>
                     <th class="center aligned">Total</th>
                     <th class="center aligned">Labor</th>
                     <th class="center aligned">Material</th>
                     <th class="center aligned">Total</th>
                     <th class="center aligned">Labor</th>
                     <th class="center aligned">Material</th>
                     <th class="center aligned">Total</th>
                   </tr>
                </thead>
              <tbody id='overall_tbody'>
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
              $('#s_rep_type').html(arr[2]);
              $('#filter').html(arr[4]);
              label_date2(arr[0],arr[2]);
              generate_report(arr[0],arr[1],1,arr[2],arr[4]);
          });
      </script>
  </body>
</html>
