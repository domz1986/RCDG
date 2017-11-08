<html>
  <head>
    <title>New Project</title>

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

          <a class="active item a-1" href="../NewProject/index.php">
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

            <table class="ui single line table d-1" id="t_project" class="table" contenteditable="true">
              <thead>
                <tr>
                  <th contenteditable="false">Project Name</th>
                  <th contenteditable="false">Code</th>
                  <th contenteditable="false">Project Engineer</th>
                  <th contenteditable="false">Contract Cost </th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>
              </tbody>
            </table>

            <h1 class="h1">Bill Of Quantities</h1>

            <div class="ui divider td-1"></div>

            <table class="ui single line table d-1" id ="t_boq" class="table" contenteditable="true" onkeyup="calcTotal()">
              <thead>
                <tr>
                  <th contenteditable="false">Item No.</th>
                  <th contenteditable="false">Description</th>
                  <th contenteditable="false">Quantity</th>
                  <th contenteditable="false">Unit</th>
                  <th contenteditable="false">Unit Cost</th>
                  <th contenteditable="false">Total Cost</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>
                <tr>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>
                <tr>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>
                <tr>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>
                <tr>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>
                <tr>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>
                <tr>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>
                <tr>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>
                <tr>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>
                <tr>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>
              </tbody>
              <thead>
                <tr contenteditable="false">
                  <th colspan="5">Total</th>
                  <th>0.00</th>
                </tr>
              </thead>
            </table>
            <!-- add new button -->

            <div class="mar-1 fields">
              <div class="ui fluid container">

                  <input class="ui deny button" style="float: left" type="button" value="Add Row" onclick="addrowtotable()">
                  <input class="ui f-right blue-1 button" style="float: right" type="button" value="Save Project" onclick="savethisboq()">

              </div>
            </div>



            </div>


          </center>
        </div>
      </div>
    </div>
    <script src="../FrontEndController/billofquantitiesscript.js"></script>
  </body>
</html>
