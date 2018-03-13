
window.onload = loadDataOnload();
//document.onkeypress = calcTotal();


function loadDataOnload()
{
  loadProjectsToDropBox();
  getdate();
  print_table();
}
function label_date()
{
  var l_date = $('#rep_date').val();
  var s_date = $('#s_rep_date').val();
  var arr = l_date.split("-");
  var arr1 = s_date.split("-");
  var months = ['','January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
  var month = months[Number(arr[1])];
  var month1 = months[Number(arr1[1])];
  $('#slabel_date').html(month1+" "+arr1[2]+", "+arr1[0]);
  $('#label_date').html(month+" "+arr[2]+", "+arr[0]);
  $('#slabel_date1').html(month1+" "+arr1[2]+", "+arr1[0]);
  $('#label_date1').html(month+" "+arr[2]+", "+arr[0]);
  $('#slabel_date2').html(month1+" "+arr1[2]+", "+arr1[0]);
  $('#label_date2').html(month+" "+arr[2]+", "+arr[0]);
}

function getdate()
{
  var today = new Date();
  var dd = today.getDate();
  var mm = today.getMonth()+1;

  var yyyy = today.getFullYear();
  if(dd<10){
      dd='0'+dd;
  }
  if(mm<10){
      mm='0'+mm;
  }
  var today = mm+'/'+dd+'/'+yyyy;
  $("#date").html("Date: "+today);
  $("#date1").html("Date: "+today);
  var today = yyyy+'-'+mm+'-'+dd;
  //alert(today);
  return today;
}

function clearAll()
{
  $('#t_ind tbody').html("");
}

function calcuTotal(){

var table = document.getElementById("t_ind");
//  alert("enter");
  var total=0;
  var i;
  for(i=1;i<table.rows.length;i++){
      //total = total + parseFloat(table.rows[i].cells[5].innerHTML);
    if (table.rows[i].cells[2].innerHTML!="" && table.rows[i].cells[3].innerHTML!=""){
      var tcost = (parseFloat(table.rows[i].cells[2].innerHTML) * parseFloat(table.rows[i].cells[3].innerHTML));
      table.rows[i].cells[4].innerHTML = tcost.toFixed(2);
      total = total + parseFloat(table.rows[i].cells[4].innerHTML);
      //alert(total);
    }

  }
  document.getElementById("t_amnt").innerHTML=total.toFixed(2);
}

function loadProjectsToDropBox()
{

  $.ajax({

    url:"../PHP/BackEndController/withdrawalcontroller.php",
    type:"POST",
    data:{func: 3},
    success: function(resultdata){
      //alert(resultdata);
      $('#loadprojectname').html(resultdata);
      $('#loadprojectname1').html(resultdata);
    }
  });
}

function type_change()
{
    var value = $('#test').val();
    if(value == 3 )
    {
      var field = document.getElementById('project_box');
      field.setAttribute("style","visibility:visible");
    }
    else {
      var field = document.getElementById('project_box');
      field.setAttribute("style","display:none");
    }
}
function generate_report()
{
  label_date();
  var rep_type = $('#rep_type').dropdown('get value');
  var s_date_report = $('#s_rep_date').val();
  var date_report = $('#rep_date').val();
  var projectCode = $('#aps_projectname').dropdown('get value');
  var filter_text = $('#filter').val();
 //OVER ALL REPORT
  if(rep_type==1)
  {
    var ep = document.getElementById("empty_proj");
    ep.setAttribute("style","visibility:hidden");
    var div = document.getElementById('Overall');
    div.setAttribute("style","visibility:visible");
    var div = document.getElementById('SubCon');
    div.setAttribute("style","display:none");
    var div = document.getElementById('withdrawal_rep');
    div.setAttribute("style","display:none");
    $.ajax({
      url:"../PHP/BackEndController/reportcontroller.php",
      type:"POST",
      data:{func: 1,wdate:date_report,wsdate:s_date_report,filter:filter_text},
      success: function(resultdata){
        //alert(resultdata);
        $('#overall_tbody').html(resultdata);

      }

    });
  } // SUBCON PROGRESS REPORT
  else if(rep_type==2)
  {
    var ep = document.getElementById("empty_proj");
    ep.setAttribute("style","visibility:hidden");
    var div = document.getElementById('Overall');
    div.setAttribute("style","display:none");
    var div = document.getElementById('SubCon');
    div.setAttribute("style","visibility:visible");
    var div = document.getElementById('withdrawal_rep');
    div.setAttribute("style","display:none");
  //  alert(date_report);
    $.ajax({
      url:"../PHP/BackEndController/reportcontroller.php",
      type:"POST",
      data:{func: 2,wdate:date_report,wsdate:s_date_report,filter:filter_text},
      success: function(resultdata){
    //    alert(resultdata);
        $('#subcon_tbody').html(resultdata);

      }

    });
  }
  else if(rep_type==3) //WITHDRAWAL DETAILS
  {
    //alert(projectCode);
      var div = document.getElementById('Overall');
      div.setAttribute("style","display:none");
      var div = document.getElementById('SubCon');
      div.setAttribute("style","display:none");
      var div = document.getElementById('withdrawal_rep');
      div.setAttribute("style","visibility:visible");
      if(projectCode=="")
      {
        var ep = document.getElementById("empty_proj");
        ep.setAttribute("style","visibility:visible");
      }
      else
      {
        $.ajax({
          url:"../PHP/BackEndController/reportcontroller.php",
          type:"POST",
          data:{func: 3,wdate:date_report,pcode:projectCode,wsdate:s_date_report,filter:filter_text},
          success: function(resultdata){
        //    alert(resultdata);
            $('#withdrawal_tbody').html(resultdata);

          }

        });
      }
  }
}

function open_report_win()
{
  var store = new Array();
  store[0] = $('#rep_date').val();
  store[1] = $('#rep_type').dropdown('get value');
  store[2] = $('#s_rep_date').val();
  store[4] = $('#filter').val();
  sessionStorage.setItem("sent", store);

  window.open('../ReportModule/Reports/overallReport.php','_blank');
}
function open_report_win1()
{
  var store = new Array();
  store[0] = $('#rep_date').val();
  store[1] = $('#rep_type').dropdown('get value');
  store[2] = $('#s_rep_date').val();
  store[4] = $('#filter').val();

  sessionStorage.setItem("sent", store);

  window.open('../ReportModule/Reports/SubConReport.php','_blank');
}
function open_report_win2()
{
  var store = new Array();
  store[0] = $('#rep_date').val();
  store[1] = $('#rep_type').dropdown('get value');
  store[2] = $('#aps_projectname').dropdown('get value');
  store[3] = $('#s_rep_date').val();
  store[4] = $('#filter').val();
  sessionStorage.setItem("sent", store);

  window.open('../ReportModule/Reports/WithdrawalReport.php','_blank');
}
function print_table()
{
  var table1 = $('#subcon_table').html();
  $('#subcon_table').html(table1);
}
$(".menu .item").tab();
$(".projectDropDown").dropdown();
