<html>
  <head>
    <title>Withdrawal</title>

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

          <a class="active item a-1" href="../WithdrawalModule/index.php">
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
        <center>
        <h1 class="h1 mt">Withdrawal</h1>

        <div class="ui divider d-1"></div>

        <div class="ui two item stackable tabs menu d-1">
          <a class="active item" data-tab="tab_dc">Direct Cost</a>
          <a class="item" data-tab="tab_ic">Indirect Cost</a>
        </div>

        <div class="ui tab" data-tab="tab_ic">
          <h2 class="h1">Indirect Cost</h2>
          <div class="ui fluid container">
            <div class="ui top attached segment d-1">
              <div class="ui form">
                <div class="two fields">

                  <div class="field">
                    <label class="t-left"> Project </label>
                    <div class="ui fluid search selection dropdown projectDropDown" id="aps_projectname1">
                      <input type="hidden" name="projectname" onchange="">
                      <i class="dropdown icon"></i>
                      <div class="default text">Project List</div>
                      <div class="menu" id="loadprojectname1"></div>
                    </div>
                  </div>

                  <div class="field">
                    <label class="t-left"> Type of Indirect Cost </label>
                    <div class="ui fluid selection dropdown projectDropDown" id='aps_typeidc'>
                      <input id="test" type="hidden" name="typedc">
                      <i class="dropdown icon"></i>
                      <div class="default text">Select Type of Inirect Cost</div>
                      <div class="ui menu">
                        <div class="item" data-value="5">
                          Utilities
                        </div>
                        <div class="item" data-value="6">
                          Others
                        </div>
                        <div class="item" data-value="7">
                          POS
                        </div>
                      </div>
                    </div>
                  </div>

                </div>

                <div class="two fields">

                  <div class="field">
                    <label class="t-left"> Date of Withdrawal</label>
                    <div class="ui input">
                      <input type="date" id="date_withdrawal1">
                    </div>
                  </div>

                  <div class="field">
                    <label class="t-left"> Name</label>
                    <div class="ui input">
                      <input type="text" id="name_withdrawal1">
                    </div>
                  </div>

                </div>

                <div class="two fields">
                    <div class="field">
                      <label class="t-left">Amount</label>
                      <div class="ui input">
                        <input type="text" id="indirect_amount">
                      </div>
                    </div>

                    <div class="field">
                      <label class="t-left">Indirect Cost Details</label>
          		        <textarea rows="4" cols="50" id="indirect_details"></textarea>
                    </div>
                </div>
              </div>
            </div>
            <div class="mar-1 fields">
              <div class="ui fluid container">
                <button class="ui f-right blue-1 button" onclick="saveWithdrawal(2)">Save</button>
              </div>
            </div>

          </div>
        </div>

        <div class="ui active tab" data-tab="tab_dc">
          <h2 class="h1">Direct Cost</h2>

          <div class="ui fluid container">
            <div class="ui top attached segment d-1">
              <div class="ui form">

                <div class="two fields">

                  <div class="field">
                    <label class="t-left">Project</label>
                    <div class="ui fluid search selection dropdown projectDropDown" id="aps_projectname">
                      <input type="hidden" name="projectname" onchange="loadInhouse()">
                      <i class="dropdown icon"></i>
                      <div class="default text">Project List</div>
                      <div class="menu" id="loadprojectname"></div>
                    </div>
                  </div>

                  <div class="field">
                    <label class="t-left">Type of Direct Cost</label>
                    <div class="ui fluid search selection dropdown projectDropDown" id="aps_typedc">
                      <input type="hidden" name="typedc" onchange="check_subcon()">
                      <i class="dropdown icon"></i>
                      <div class="default text">Select Type of Direct Cost</div>
                      <div class="menu">
                        <div class="item" data-value="1">
                          Material
                        </div>
                        <div class="item" data-value="2">
                          Labor
                        </div>
                        <div class="item" data-value="3">
                          Equipment
                        </div>
                        <div class="item" data-value="4">
                          Sub-Contractors
                        </div>
                      </div>
                    </div>
                  </div>

                </div>

                <div class="two fields">

                  <div class="field">
                    <label class="t-left"> Date of Withdrawal</label>
                    <div class="ui input">
                      <input type="date" id="date_withdrawal">
                    </div>
                  </div>
                  <div class="field">
                    <label class="t-left"> Name</label>
                    <div class="ui input col-sm-5">
                      <input type="text" id="name_withdrawal">
                    </div>
                  </div>

                </div>

                <div class="three fields">

                  <div class="field">
                    <label class="t-left">In House</label>
                    <div class="ui fluid search selection dropdown projectDropDown" id="aps_typeh">
                      <input type="hidden" name="user">
                      <i class="dropdown icon"></i>
                      <div class="default text">Select Inhouse</div>
                      <div class="menu" id="loadboqtodropdown"></div>
                    </div>
                  </div>

                  <div class="field">
                    <label class="t-left" id='sclbl' style="display:none">Sub-Contractors</label>
                    <div class="ui fluid selection dropdown projectDropDown" id="subcondropdown" style="display:none">
                    <input type="hidden" name="typedc">
                    <i class="dropdown icon"></i>
                    <div class="default text" id="ntext">Select Sub-Contractor</div>
                    <div class="menu" id="subcon_menu"></div>
                    </div>
                  </div>

                  <div class="field">
                    <label class="t-left" id='sctc' style="display:none">Sub-Contractors Type Cost</label>
                    <div class="ui fluid selection dropdown projectDropDown" id="subconTypeCost" style="display:none">
                    <input type="hidden" name="typedc">
                    <i class="dropdown icon"></i>
                    <div class="default text">Select Type of Sub-Contract Cost</div>
                    <div class="menu">
                      <div class="item" data-value="Materials">
                        Materials
                      </div>
                      <div class="item" data-value="Labor">
                        Labor
                      </div>
                    </div>
                    </div>
                  </div>

                </div>

            </div>
          </div>
        </div>


          <h2 class="h1">Individuals</h2>

          <div class="ui fluid container">
            <div class="ui top attached segment d-1">

              <button class="ui blue-1 button b-1" onclick="addrowtoTable()">
                Add Row
              </button>

              <table class="ui single line table" id ="t_ind" contenteditable="true" onkeyup="calcuTotal()">
                <thead>
                  <tr>
                    <th contenteditable="false">
                      <h3>In House</h3>
                    </th>
                    <th contenteditable="false" style="display:none" id="subcon_col">
                      <h3>Sub-Con Cost Type</h3>
                    </th>
                    <th contenteditable="false">
                      <h3>Particulars</h3>
                    </th>
                    <th contenteditable="false">
                      <h3>Quantity</h3>
                    </th>
                    <th contenteditable="false">
                      <h3>Unit Cost</h3>
                    </th>
                    <th contenteditable="false">
                      <h3>Amount</h3>
                    </th>
                    <th contenteditable="false">
                      <h3>Supplier</h3>
                    </th>
                  </tr>
                </thead>
              </table>

              <div class="two fields">
                <div class="field">
                  <div class="ui left large label">Total Amount:</div>
                </div>
                <div class="field">
                  <div class="ui large label" id="t_amnt">0.00</div>
                </div>
              </div>

            </div>

            <div class="mar-1 fields">
              <div class="ui fluid container">
                <button class="ui f-right deny button" onclick="clearAll()">Cancel</button>
                <button class="ui f-right blue-1 button" onclick="saveWithdrawal(1)">Save</button>
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
