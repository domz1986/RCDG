<!DOCTYPE html>
<html>

  <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">

      <title>Sub-Contractors</title>

      <link href="http://fonts.googleapis.com/css?family=Nunito:300,400,700" rel="stylesheet" type="text/css">
      <link href="./Libraries/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
      <link href="./Libraries/superlist.css" rel="stylesheet" type="text/css" >
      <link rel = "stylesheet" type = "text/css" href="./Libraries/semantic/semantic.css">
      <link href="./Libraries/owl.carousel/assets/owl.carousel.css" rel="stylesheet" type="text/css" >
      <link href="./Libraries/colorbox/example1/colorbox.css" rel="stylesheet" type="text/css" >
      <link href="./Libraries/bootstrap-select/bootstrap-select.min.css" rel="stylesheet" type="text/css">
      <link href="./Libraries/bootstrap-fileinput/fileinput.min.css" rel="stylesheet" type="text/css">
      <link rel="shortcut icon" type="image/x-icon" href="Libraries/favicon.png">

      <script src="./Libraries/jquery-1.12.4.js" type="text/javascript"></script>
      <script src="./Libraries/ajax-3.1.1.js" type="text/javascript"></script>

      <script src="./Libraries/semantic/semantic.js"></script>
      <script src="./Libraries/semantic/semantic.min.js"></script>
  </head>

  <body>
    <div class="page-wrapper">

      <header class="header header-minimal">
        <div class="header-statusbar">
          <div class="header-statusbar-inner">

            <div class="header-statusbar-left">
              <h1>RCDG Construction Corporation</h1>
            </div>

                <div class="header-statusbar-right">
                  <div class="hidden-xs visible-lg">
                    <ul class="breadcrumb">
                      <li><a href="#">Logout</a></li>
                    </ul>
                  </div>
                </div>

          </div>
        </div>
      </header>

      <div class="main">
        <div class="outer-admin">
          <div class="wrapper-admin">

            <div class="sidebar-secondary-admin">
              <ul>
                <li>
                  <a href="./index.php">
                    <span class="icon"><i class="fa fa-search"></i></span>
                    <span class="title">Project List</span>
                    <span class="subtitle">Manage your projects</span>
                  </a>
                </li>
                <li>
                  <a href="./addnew.php">
                    <span class="icon"><i class="fa fa-road"></i></span>
                    <span class="title">New Project</span>
                    <span class="subtitle">Add project</span>
                  </a>
                </li>

                <li >
                  <a href="./reports.php">
                    <span class="icon"><i class="fa fa-bar-chart"></i></span>
                    <span class="title">Reports</span>
                    <span class="subtitle">Generate Reports</span>
                  </a>
                </li>

                <li>
                  <a href="./withdrawal.php">
                    <span class="icon"><i class="fa fa-money"></i></span>
                    <span class="title">Withdrawal</span>
                    <span class="subtitle">Withdaws Budgets</span>
                  </a>
                </li>

                <li >
                  <a href="./withdraw_report.php">
                    <span class="icon"><i class="fa fa-tasks"></i></span>
                    <span class="title">Summary</span>
                    <span class="subtitle">Withdawal Reports</span>
                  </a>
                </li>

                <li class="active">
                  <a href="./subcontract.php">
                    <span class="icon"><i class="fa fa-share"></i></span>
                    <span class="title">Sub Contractors</span>
                    <span class="subtitle">Add sub-contractors</span>
                  </a>
                </li>

              </ul>
            </div>

            <div class="content-admin">
              <div class="content-admin-wrapper">

                <div class="content-admin-main">
                  <div class="content-admin-main-inner">
                    <div class="container-fluid">
                      <!-- PROJECT HEADER -->
                      <div class="row">
                          <div class="col-sm-12">
                            <div class="page-title">
                              <h3>Sub Contractors</h3>
                            </div>
                          </div>
                        </div>

                        <div class="row">
                            <div class=" col-sm-10 ">
                              <div class="page-title">
                              <label> Project <span class="star-star">*</span></label>
                              <div class="ui pointing below red basic label" id='selpro' style='visibility:hidden'>
                                Please Select a Project First
                              </div>
                                  <div class="ui fluid search selection dropdown projectDropDown" id="aps_projectname">
                                    <input type="hidden" name="projectname" onchange="load_subcontable()">
                                    <i class="dropdown icon"></i>
                                    <div class="default text">Project List</div>
                                    <div class="menu" id="loadprojectname"></div>
                                  </div>
                            </div>
                            <h4>Fill up Sub-Contrator's details<h4>

                                    <div class=" container-fluid">

                                      <div class="col-sm-6"><label>Sub-Contractors In Charge <span class="star-star">*</span></label>
                                      </div>
                                      <div class="ui input focus col-sm-6">
                                        <input type="text" placeholder="Insert name" id="name">
                                        <div class="ui left pointing red basic label" id='selname' style='visibility:hidden'>
                                          Please Enter Name of In Charge
                                        </div>
                                      </div>
                                      <br>
                                      <br>
                                      <div class="col-sm-6"><label>Work <span class="star-star">*</span></label></div>
                                      <div class="ui input focus col-sm-5">
                                        <input type="text" placeholder="Type of work" id="work">
                                        <div class="ui left pointing red basic label" id='selwork' style='visibility:hidden'>
                                          Please Input Work Type
                                        </div>
                                      </div>
                                      <br>
                                      <br>
                                      <div class="col-sm-6"><label>Labor Amount </label></div>
                                      <div class="ui input focus col-sm-4">
                                        <input type="text" placeholder="Labor amount" id="concost" onkeyup="check_digit(event)">
                                        <div class="ui left pointing red basic label" id='selcost' style='visibility:hidden'>
                                          Please Labor Contract Amount
                                        </div>
                                      </div>
                                      <br>
                                      <br>
                                      <div class="col-sm-6 "><label>Material Amount</label></div>
                                      <div class="ui input focus col-sm-4">
                                        <input type="text" placeholder="Material amount" id="matcost">
                                        <div class="ui left pointing red basic label" id='selmat' style='visibility:hidden'>
                                          Please Material Amount
                                        </div>
                                      </div>
                                      <div class="col-sm-6">
                                      <br>
                                      <br>
                                      <button class="ui button" onclick="check_subcon_fill()">
                                      Submit
                                      </button>
                                      </div>
                                    </div>
                            </div>
                      </div>
                      <div class="row">
                        <div class="col-sm-11">
                          <div class="page-title "></div>
                          <h4>Sub Contractors<h4>
                              <table class="ui sortable celled table" id='subcon_table'>
                              <thead>
                                <tr>
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
                            </div>
                              </table>
                        </div>
                      </div>

                  </div>
                </div>
              </div>

                <div class="content-admin-footer">
                  <div class="container-fluid">
                    <div class="content-admin-footer-inner">
                      &copy; 2017 All rights reserved. Created by <a href="http://desdevconcept.com/" target="_blank">DesDev Concepts</a>.
                    </div>
                  </div>
                </div>

              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
    <script src="withdrawalscript.js" type="text/javascript"></script>
  </body>

</html>
