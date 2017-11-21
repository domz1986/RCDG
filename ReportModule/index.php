<html>
  <head>
    <title>Reports</title>

    <link href="../Libraries/semantic/semantic.min.css" rel="stylesheet" type="text/css">
    <link href="../Libraries/semantic/semantic.css" rel="stylesheet" type="text/css">
    <link href="../Libraries/main.css" rel="stylesheet" type="text/css">

    <script src="../Libraries/jquery-1.12.4.js" type="text/javascript"></script>
    <script src="../Libraries/ajax-3.1.1.js" type="text/javascript"></script>


    <script src="../Libraries/semantic/semantic.js"></script>
    <script src="../Libraries/semantic/semantic.min.js"></script>

  </head>
  <body>
    <div class="ui grid">
      <div class="two wide blue-1 column">
        <div class="ui vertical secondary menu">

          <div class="item a-1">
            <center>
              <h1 class="h1">RCDG</h1>
              <span class="fs-1">Construction Corporation</span>
            </center>
          </div>

            <div class="ui divider"></div>

          <a class="item a-1" href="../ProjectListModule/index.php">
            <i class="left margin-r search icon"></i>
            <span>Project List</span>
          </a>

          <a class="item a-1" href="../NewProject/index.php">
            <i class="left margin-r road icon"></i>
            <span>New Project</span>
          </a>

          <a class="item a-1-1" href="../SubcontractModule/index.php">
            <i class="left margin-r share icon"></i>
            <span>Sub Contractors</span>
          </a>

          <a class="item a-1" href="../WithdrawalModule/index.php">
            <i class="left margin-r money icon"></i>
            <span>Withdrawal</span>
          </a>

          <a class="active item a-1" href="../ReportModule/index.php">
            <i class="left margin-r bar chart icon"></i>
            <span>Reports</span>
          </a>

          <a class="item a-1" href="../SummaryModule/index.php">
            <i class="left margin-r tasks icon"></i>
            <span>Summary</span>
          </a>

          <a class="item a-1" href="../EditAllModule/index.php">
            <i class="left margin-r edit icon"></i>
            <span>Figure Revision</span>
          </a>

        </div>
      </div>
      <div class="fourteen wide grey-1 column">
        <div class="ui fluid container">
          <center>
            <h1 class="h1 mt">Reports</h1>

            <div class="ui divider d-1"></div>
            <div class="ui top attached segment d-1">
              <div class="ui form">
                  <div class="two fields">

                    <div class="field">
                      <label class="t-left"> Type of Report </label>
                      <div class="ui fluid selection dropdown projectDropDown" id='rep_type'>
                        <input id="test" type="hidden" name="reptype" onchange="type_change()">
                        <i class="dropdown icon"></i>
                        <div class="default text">Select Type of Report</div>
                        <div class="ui menu">
                          <div class="item" data-value="1">
                            OverAll Project Costing
                          </div>
                          <div class="item" data-value="2">
                            Subcontract Progess Billings
                          </div>
                          <div class="item" data-value="3">
                            Withdrawal Details
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="field" id="project_box" style="display:none">
                      <label class="t-left"> Project </label>
                      <div class="ui fluid search selection dropdown projectDropDown" id="aps_projectname">
                        <input type="hidden" name="projectname" onchange="">
                        <i class="dropdown icon"></i>
                        <div class="default text">Project List</div>
                        <div class="menu" id="loadprojectname"></div>
                      </div>
                    </div>


                  </div>
                  <div class="two fields">

                    <div class="field">
                      <label class="t-left"> Date of Report Coverage</label>
                      <div class="two fields">
                        <div class="field">
                          <div class="ui input">
                            <input type="date" id="s_rep_date">
                          </div>
                        </div>
                        <div class="field">
                        <div class="ui input">
                          <input type="date" id="rep_date">
                        </div>
                        </div>
                      </div>
                    </div>
                    <div class="field">
                      <div class="ui pointing red basic label" style="display:none" id="empty_proj">
                        Please select project from the list
                      </div>
                    </div>
                  </div>
                  <div class="two fields">

                    <div class="field">
                      <label class="t-left"> Filter Text</label>
                      <div class="two fields">

                        <div class="field">
                          <input type="text" placeholder="Input Filter Text" id="filter">
                        </div>
                          <div class="mar-1 fields">
                            <div class="ui fluid container">
                              <button class="ui f-right blue-1 button" onclick="generate_report()">Generate Report</button>
                            </div>
                          </div>
                        </div>
                      </div>

                    </div>

                  </div>


              </div>
            </div>
            <div class="ui divider d-1"></div>
            <!-- OVERALL REPORT -->
            <div class="ui top attached segment d-1" id="Overall" style="display:none">
              <div class="ui form">
                <h3>Over All Project Costing</h3>
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
                  <div class="mar-1 fields">
                    <div class="ui fluid container">
                      <button class="ui f-right blue-1 button" onclick="open_report_win()" >Print Report</button>
                    </div>
                  </div>
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
                    <tbody id='subcon_tbody'>
                    </tbody>
                  </table>
                  <div class="mar-1 fields">
                    <div class="ui fluid container">
                      <button class="ui f-right blue-1 button" onclick="open_report_win1()" >Print Report</button>
                    </div>
                  </div>
              </div>
            </div>
            <!-- WITHDRAWAL REPORT -->
            <div class="ui top attached segment d-1" id="withdrawal_rep" style="display:none">
              <div class="ui form">
                <h3>Withdrawal Details of Project Code </h3><h3 id="proj_code"></h3>
                  <label>Actual Billings from <label id="slabel_date2"></label> to <label id="label_date2"></label></label>
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
                  <div class="mar-1 fields">
                    <div class="ui fluid container">
                      <button class="ui f-right blue-1 button" onclick="open_report_win2()" >Print Report</button>
                    </div>
                  </div>
              </div>
            </div>

            </div>
          </center>
        </div>
      </div>

      <script src="../FrontEndController/reportscript.js" type="text/javascript"></script>
  </body>
</html>
