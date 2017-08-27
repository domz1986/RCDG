<html>
  <head>
    <title>Statistical Summary</title>

    <link href="../Libraries/semantic/semantic.min.css" rel="stylesheet" type="text/css">
    <link href="../Libraries/semantic/semantic.css" rel="stylesheet" type="text/css">
    <link href="../Libraries/main.css" rel="stylesheet" type="text/css">
    <link rel = "stylesheet" type = "text/css" href="../Libraries/bar_graph.css">
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

          <a class="item a-1" href="../ReportModule/index.php">
            <i class="left margin-r bar chart icon"></i>
            <span>Reports</span>
          </a>

          <a class="active item a-1" href="../SummaryModule/index.php">
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
            <h1 class="h1 mt">Withdrawal Reports</h1>

            <div class="ui divider d-1"></div>

            <h2 class="ui header h1">
              <i class="large icons">
                <i class="bar chart icon"></i>
              </i>
              Statistics
              <span class="sub header sp">Displays a statistical summary of BOQ</span>
            </h2>

            <br><br>

            <div class="ui fluid search selection dropdown d-1 projectDropDown" id="aps_projectname">
              <input type="hidden" name="projectname" onchange="loadgraph()">
              <i class="dropdown icon"></i>
              <div class="default text">Project List</div>
              <div class="menu" id="loadprojectname"></div>
            </div>
            <br>
            <div id="reload">
            </div>

          </center>
        </div>
      </div>
    </div>

    <script src="../FrontEndController/withdrawalscript.js" type="text/javascript"></script>

  </body>
</html>
