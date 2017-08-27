<html>
  <head>
    <title>Figure Revision</title>

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

          <a class="item a-1" href="../ReportModule/index.php">
            <i class="left margin-r bar chart icon"></i>
            <span>Reports</span>
          </a>

          <a class="item a-1" href="../SummaryModule/index.php">
            <i class="left margin-r tasks icon"></i>
            <span>Summary</span>
          </a>

          <a class=" active item a-1" href="../EditAllModule/index.php">
            <i class="left margin-r edit icon"></i>
            <span>Figure Revision</span>
          </a>

        </div>
      </div>

        <div class="fourteen wide grey-1 column">
          <center>
          <h1 class="h1 mt">Figure Revision</h1>
          <div class="ui divider d-1"></div>
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
                      <div class="menu" id="loadprojectname"></div>
                    </div>
                  </div>

                  <div class="field">
                    <label class="t-left"> Component</label>
                    <div class="ui fluid search selection dropdown projectDropDown" id="revision_part">
                      <input type="hidden" name="component" onchange="check_type()">
                      <i class="dropdown icon"></i>
                      <div class="default text">Choose Component to be Editted</div>
                      <div class="ui menu">
                        <div class="item" data-value="1">
                          Project Details
                        </div>
                        <div class="item" data-value="2">
                          Sub-Contractors
                        </div>
                        <div class="item" data-value="3">
                          Withdrawals
                        </div>
                      </div>
                    </div>
                  </div>

                </div>
                <div class="four fields" id="dates" style='display:none'>

                  <div class="field">
                    <label class="t-left"> Date Start</label>
                    <div class="ui input">
                      <input type="date" id="date_start">
                    </div>
                  </div>
                  <div class="field">
                    <label class="t-left"> Date End</label>
                    <div class="ui input">
                      <input type="date" id="date_end">
                    </div>
                  </div>

                </div>


                  <div class="mar-1 fields">
                    <div class="ui fluid container">
                      <!--<button class="ui f-right deny button" onclick="clearAll()">Delete</button>-->
                      <button class="ui f-right blue-1 button" onclick="checkEdit()">Edit</button>
                    </div>
                  </div>

                </div>
              </div>
            </div>

            <div class="ui divider d-1"></div>

                              <!--Project details-->
            <div class="ui fluid container"  id="project_details" style='display:none'>
              <div class="ui top attached segment d-1">
                  <div class="ui form">
                      <h2 class="h2">Project Details</h2>
                      <div id="proj_id" style="display:none"></div>
                      <div class="two fields">
                          <div class="field">
                            <label class="t-left"> Project Name</label>
                            <div class="ui input">
                              <input type="text" id="project_name">
                            </div>
                          </div>
                          <div class="field">
                            <label class="t-left"> Project Engineer</label>
                            <div class="ui input">
                              <input type="text" id="project_engineer">
                            </div>
                          </div>
                      </div>
                      <div class="two fields">
                          <div class="field">
                            <label class="t-left"> Contract Cost</label>
                            <div class="ui input">
                              <input type="texst" id="contract_cost">
                            </div>
                          </div>
                          <div class="field">
                            <label class="t-left">Code</label>
                            <div class="ui input">
                              <input type="text" id="code"  readonly="readonly">
                            </div>
                          </div>
                    </div>

                    <h1 class="h1 mt">Bill Of Quantities</h1>

                    <div class="ui divider d-1"></div>

                    <table class="ui single line table d-1" id ="t_boq" contenteditable="true"  onkeyup="calcTotal()">
                      <thead>
                        <tr>
                          <th>Item No.</th>
                          <th>Description</th>
                          <th>Unit</th>
                          <th>Quantity</th>
                          <th>Unit Cost</th>
                          <th>Total Cost</th>
                        </tr>
                      </thead>
                      <tbody id="loadboqtotable">
                      </tbody>

                    </table>
                    <div class="mar-1 fields">
                      <div class="ui fluid container">
                        <button class="ui f-left blue-1 button" onclick="addrowtotable()">Add Row</button>
                        <button class="ui f-right blue-1 button" onclick="savethisboq()">Save All</button>
                      </div>
                    </div>
                </div>
              </div>
            </div>

            <!-- Sub Contractors -->
            <div class="ui fluid container"  id="subcon_details" style='display:none' >
              <div class="ui top attached segment d-1">
                  <div class="ui form">
                      <h2 class="h2">Sub Contractors Details</h2>
                      <div id="proj_id" style="display:none"></div>
                      <h2 class="h1 mt">List of Sub-Contractors for this Project</h2>
                      <div class="ui divider d-1"></div>
                      <div class="ui top attached segment d-1">
                        <div class="ui form">
                          <h4>Sub Contractors<h4>
                              <table class="ui celled table" id='subcon_table' contenteditable="true" onkeyup="calcuTotal()">
                              <thead>
                                  <tr>
                                    <th class="center aligned sorted ascending" rowspan="2" contenteditable="false">Sub Contractors Name</th>
                                    <th class="center aligned" rowspan="2" contenteditable="false">Work</th>
                                    <th class="center aligned" colspan="2" contenteditable="false">Contract Amount</th>
                                    <th class="center aligned" rowspan="2" contenteditable="false">Total</th>
                                  </tr>
                                  <tr>
                                   <th class="center aligned" contenteditable="false">Labor</th>
                                   <th class="center aligned" contenteditable="false">Materials</th>
                                 </tr>
                              </thead>
                              <tbody id='subcon_tbody'>
                              </tbody>
                            </table>
                            <div class="mar-1 fields">
                              <div class="ui fluid container">
                                <button class="ui f-right blue-1 button" onclick="savethissubcon()">Save All</button>
                              </div>
                            </div>
                        </div>
                      </div>
                    </div>
                </div>
            </div>

            <div class="ui fluid container"  id="withdrawal_details" style='display:none' onkeyup="calcucomplexTotal()">
              <div class="ui top attached segment d-1">
                  <div class="ui form">
                      <h2 class="h2">Withdrawal Details</h2>
                      <div id="aps_projectname" style="display:none"></div>
                      <h3>Withdrawal Details of Project Code </h3><h3 id="proj_code"></h3>
                        <label>Actual Withdrawals as of <label id="label_date"></label></label>
                          <table class="ui celled structured table" id='withdrawal_table' contenteditable="true">
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
                            <button class="ui f-right blue-1 button" onclick="">Save All</button>
                          </div>
                        </div>
                  </div>
              </div>
            </div>

          </div>




          </center>
        </div>

    </div>
    <div class="ui modal" id="securitymodal" style="max-height: 300px;"></div>
    <script src="../FrontEndController/figurerevisionscript.js" type="text/javascript"></script>

  </body>
</html>
