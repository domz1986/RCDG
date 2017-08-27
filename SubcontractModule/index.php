<html>
  <head>
    <title>Sub Contractors</title>

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

          <a class="active item a-1-1" href="../SubcontractModule/index.php">
            <i class="left margin-r share icon"></i>
            <span>Sub Contractors</span>
          </a>

          <a class="item a-1" href="../WithdrawalModule/index.php">
            <i class="left margin-r money icon"></i>
            <span>Withdrawal</span>
          </a>

          <a class="item a-1" href="../ReportModule/index.php">
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
            <h1 class="h1 mt">Sub-Contractors</h1>
            <div class="ui divider d-1"></div>

              <div class="ui top attached segment d-1">
                <div class="ui form">

                  <div class="field">
                    <label class="t-left"> Project </label>
                    <div class="ui fluid search selection dropdown projectDropDown" id="aps_projectname">
                      <input type="hidden" name="projectname" onchange="load_subcontable()">
                      <i class="dropdown icon"></i>
                      <div class="default text">Project List</div>
                      <div class="menu" id="loadprojectname"></div>
                    </div>
                  </div>

                  <div class="two fields">

                      <div class="field">

                          <div class="ui input focus">
                            <label>Sub-Contractors In Charge <span class="star-star">*</span></label>
                          </div>
                          <input type="text" placeholder="Insert name" id="name">
                          <div class="ui up pointing red basic label" id='selname' style='visibility:hidden'>
                            Please Enter Name of In Charge
                          </div>
                      </div>

                      <div class="field">
                          <div class="ui input focus">
                            <label class="t-left">Work <span class="star-star">*</span></label>
                          </div>
                          <input type="text" placeholder="Type of work" id="work">
                          <div class="ui up pointing red basic label" id='selwork' style='visibility:hidden'>
                            Please Input Work Type
                          </div>
                      </div>

                    </div>

                    <div class="two fields">

                        <div class="field">
                          <div class="ui input focus">
                            <label class="t-left">Labor Amount </label>
                          </div>
                          <input type="text" placeholder="Labor amount" id="concost" onkeyup="check_digit(event)">
                          <div class="ui up pointing red basic label" id='selcost' style='visibility:hidden'>
                            Please Labor Contract Amount
                          </div>
                        </div>

                        <div class="field">
                          <div class="ui input focus col-sm-4">
                            <label class="t-left">Material Amount</label>
                          </div>
                          <input type="text" placeholder="Material amount" id="matcost">
                          <div class="ui up pointing red basic label" id='selmat' style='visibility:hidden'>
                            Please Material Amount
                          </div>
                        </div>

                  </div>
                  <div class="mar-1 fields">
                    <div class="ui fluid container">
                      <button class="ui f-right blue-1 button" onclick="check_subcon_fill()">Save Sub-Contractor</button>
                    </div>
                  </div>
                </div>
              </div>

              <h2 class="h1 mt">List of Sub-Contractors for this Project</h2>
              <div class="ui divider d-1"></div>
              <div class="ui top attached segment d-1">
                <div class="ui form">
                  <h4>Sub Contractors<h4>
                      <table class="ui celled table" id='subcon_table'>
                      <thead>
                          <tr>
                            <th style="display:none" id="scid"></th>
                            <th class="center aligned sorted ascending" rowspan="2">Sub Contractors Name</th>
                            <th class="center aligned" rowspan="2">Work</th>
                            <th class="center aligned" colspan="2">Contract Amount</th>
                            <th class="center aligned" rowspan="2">Total</th>
                          </tr>
                          <tr>
                           <th class="center aligned">Labor</th>
                           <th class="center aligned">Materials</th>
                         </tr>
                      </thead>
                      <tbody id='subcon_tbody'>
                      </tbody>
                    </table>
                </div>
              </div>

            </div>

          </center>
        </div>
      </div>
    </div>

  <script src="../FrontEndController/withdrawalscript.js" type="text/javascript"></script>
  </body>
</html>
