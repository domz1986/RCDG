
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
  var arr = l_date.split("-");
  var months = ['','January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
  var month = months[Number(arr[1])];
  $('#label_date').html(month+" "+arr[2]+", "+arr[0]);
}
function label_date2(date)
{
  var l_date = date;
  var arr = l_date.split("-");
  var months = ['','January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
  var month = months[Number(arr[1])];
  $('#label_date').html(month+" "+arr[2]+", "+arr[0]);
  //generate_report();
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
function generate_report(date_report, rep_type, projectCode)
{
  //alert(date_report+"entraw"+rep_type);
  if(rep_type==1)
  {

    $.ajax({
      url:"../../PHP/BackEndController/reportcontroller.php",
      type:"POST",
      data:{func: 1,wdate:date_report},
      success: function(resultdata){
      //  alert(resultdata);
        $('#overall_tbody').html(resultdata);

      }

    });
  }
  else if(rep_type==2)
  {
  //  alert(date_report+rep_type);
    $.ajax({
      url:"../../PHP/BackEndController/reportcontroller.php",
      type:"POST",
      data:{func: 2,wdate:date_report},
      success: function(resultdata){

        $('#subcon_tbody').html(resultdata);

      }

    });
  }
  else if(rep_type==3)
  {
  //  alert(date_report+rep_type);
    $.ajax({
      url:"../../PHP/BackEndController/reportcontroller.php",
      type:"POST",
      data:{func: 3,wdate:date_report,pcode:projectCode},
      success: function(resultdata){
    //    alert(resultdata);
        $('#withdrawal_tbody').html(resultdata);

      }

    });
  }

}

function print_table()
{
  var table1 = $('#subcon_table').html();
  $('#subcon_table').html(table1);
}
$(".menu .item").tab();
$(".projectDropDown").dropdown();
