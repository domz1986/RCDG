<html>
  <head>
    <title>Project List</title>

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

          <a class="active item a-1" href="./index.php">
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

            <h1 class="h1 mt">Project Details</h1>

            <div class="ui divider d-1"></div>

            <div class="ui top attached segment b1">
              <form class="ui filter form" id="addpurchasestock" onsubmit="return false">
                <div class="two fields">

                  <div class="field">

                    <label class="t-left">Project Name</label>

                    <div class="ui fluid search selection dropdown projectDropDown" id="aps_projectname">
                      <input type="hidden" name="projectname" onchange="loadProjectDetails()">
                      <i class="dropdown icon"></i>
                      <div class="default text">Project List</div>
                      <div class="menu" id="loadprojectname">
                      </div>
                    </div>

                  </div>

                  <div class="field">
                    <label class="t-left">Project Engineer</label>
                    <input type="text" placeholder="Project Engineer" id="pv_engr" readonly>
                  </div>
                </div>

                <div class="two fields">
                  <div class="field">
                    <label class="t-left">Contract Cost</label>
                    <input type="text" placeholder="Contract Cost" id="pv_concost" readonly>
                  </div>

                  <div class="field">
                    <label class="t-left">Code</label>
                    <input type="text" placeholder="Project Code" id="pv_code" readonly>
                  </div>
                </div>
              </form>
            </div>

            <h1 class="h1 mt">Bill Of Quantities</h1>

            <div class="ui divider d-1"></div>

            <table class="ui single line table d-1">
              <thead>
                <tr>
                  <th>Item No.</th>
                  <th>Description</th>
                  <th>Quantity</th>
                  <th>Unit</th>
                  <th>Unit Cost</th>
                  <th>Total Cost</th>
                </tr>
              </thead>
              <tbody id="loadboqtotable">
              </tbody>
            </table>
          </center>

        </div>
      </div>

    </div>

    <script src="../FrontEndController/billofquantitiesscript.js" type="text/javascript"></script>

  </body>
</html>
