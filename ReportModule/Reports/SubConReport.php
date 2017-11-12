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
          <h3>Sub-Contractors Progress Billings</h3>
          <div id="rep_date" style="display:none"></div>
          <div id="rep_type" style="display:none"></div>
          <div id="filter" style="display:none"></div>
            <label>Actual Billings from <label id="slabel_date"></label> to <label id="label_date"></label></label>
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
              <tbody id='subcon_tbody'>
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
              generate_report(arr[0],arr[1],2,arr[2],arr[4]);
          });
      </script>
  </body>
</html>
