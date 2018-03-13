
window.onload = loadDataOnload();
//document.onkeypress = calcTotal();


function loadDataOnload()
{
  $('#securitymodal').load('../Modal/SecurityModal.php', function(){

    $('#securitymodal').modal('setting', 'closable', false).modal('show');
  });

  loadProjects();
//  getdate();
}
function goback()
{
  window.history.back();
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

function calcuTotal(){

var table = document.getElementById("t_ind");
//  alert("enter");
  var total=0;
  var i;
  for(i=1;i<table.rows.length;i++){
      //total = total + parseFloat(table.rows[i].cells[5].innerHTML);
    if (table.rows[i].cells[2].innerHTML!="" && table.rows[i].cells[3].innerHTML!=""){
      var tcost = (parseFloat(table.rows[i].cells[3].innerHTML) * parseFloat(table.rows[i].cells[4].innerHTML));
      table.rows[i].cells[5].innerHTML = tcost.toFixed(2);
      total = total + parseFloat(table.rows[i].cells[5].innerHTML);
      //alert(total);
    }

  }
  document.getElementById("t_amnt").innerHTML=total.toFixed(2);
}

function loadProjects()
{

  $.ajax({

    url:"../PHP/BackEndController/withdrawalcontroller.php",
    type:"POST",
    data:{func: 3},
    success: function(resultdata){
    //  alert(resultdata);
      $('#loadprojectname').html(resultdata);

    }

  });

}
function check_type()
{
  var revpart = $('#revision_part').dropdown('get value');
  var field = document.getElementById('dates');

  if(revpart==3)
  {
    field.setAttribute("style","visibility:visible");
  }
  else
  {
    field.setAttribute("style",'display:none');
  }
}
function loadProjectDetails(){

  var projectcode = $('#aps_projectname1').dropdown('get value');
  document.getElementById('code').value = projectcode;
  //alert("asdfdsfsad"+projectcode);

  $.ajax({

    url: "../PHP/BackEndController/billofquantitiescontroller.php",
    type: "POST",
    data: {func: 4,pcode:projectcode},
    success: function(resultdata){

      if($.trim(resultdata) != ""){
    //    alert(resultdata);
        info = $.trim(resultdata).split("=");

        document.getElementById('project_engineer').value = info[0];
        document.getElementById('contract_cost').value = info[1];
        document.getElementById('project_name').value = info[2];
        document.getElementById('proj_id').value = info[3];
        loadBOQToTable();
      }
      else {
        alert("Error!");
      }

    }

  });
}
function loadBOQToTable(){


  var projectcode = $('#aps_projectname1').dropdown('get value');
//  alert(projectcode);
  $.ajax({

    url: "../PHP/BackEndController/billofquantitiescontroller.php",
    type:"POST",
    data:{func: 5,pcode:projectcode},
    success: function(resultdata){
      //alert(resultdata);
      $("#loadboqtotable").html(resultdata);

    }

  });

}
function loadSubConTable()
{

    var projectcode = $('#aps_projectname1').dropdown('get value');
  //  alert(projectcode);

    $.ajax({
      url: "../PHP/BackEndController/withdrawalcontroller.php",
      type: "POST",
      data: {func: 11, pcode:projectcode},
      success: function(resultdata){
        //alert(resultdata);
          $('#subcon_tbody').html(resultdata);
        }
      });
  }
function loadWithdrawaltable()
{
    //alert(projectCode);

    var projectCode = $('#aps_projectname1').dropdown('get value');
    var date_report = $('#date_end').val();
    var date_start = $('#date_start').val();
    var filter_text = $('#filter').val();
  //  alert(projectCode+" "+date_start+" "+date_report);
    $.ajax({
      url:"../PHP/BackEndController/reportcontroller.php",
      type:"POST",
      data:{func: 4,swdate:date_start,wdate:date_report,pcode:projectCode,filter:filter_text},
      success: function(resultdata)
      {
      //  alert(resultdata);
        $('#withdrawal_tbody').html(resultdata);
      }
    });
}
function calcTotal(){
//  alert("entra");
  var table = document.getElementById("t_boq");
  var total=0;
  var i;
  for(i=1;i<table.rows.length-1;i++){
      //total = total + parseFloat(table.rows[i].cells[5].innerHTML);
    if (table.rows[i].cells[4].innerHTML!="" && table.rows[i].cells[5].innerHTML!=""){
      var tcost = (parseFloat(table.rows[i].cells[4].innerHTML) * parseFloat(table.rows[i].cells[5].innerHTML));
      table.rows[i].cells[6].innerHTML = tcost.toFixed(2);
      total = total + parseFloat(table.rows[i].cells[6].innerHTML);

    }
  }
  table.rows[i].cells[1].innerHTML=total.toFixed(2);
}
function calcuTotal(){

  var tables = document.getElementById("subcon_table");
  //alert(tables.rows.length);
  var i;
  for(i=1;i<tables.rows.length;i++)
  {
    if (tables.rows[i].cells[3].innerHTML!="" && tables.rows[i].cells[4].innerHTML!="")
    {
      var tcost = (parseFloat(tables.rows[i].cells[3].innerHTML) + parseFloat(tables.rows[i].cells[4].innerHTML));
      tables.rows[i].cells[5].innerHTML = tcost;
    }
  }
}
function calcucomplexTotal()
{

  var tables = document.getElementById("withdrawal_table");
  var withdraw_line="";
  var total_with = 0;
  var i;
  for(i=1;i<=tables.rows.length+1;i++)
  {
    if(tables.rows[i].cells[0].innerHTML=="withdrawal")
    {
      withdraw_line.innerHTML = total_with;
      if(tables.rows[i+1].cells[0].innerHTML!="withdrawal")
      {
        total_with=0;
      }
      else
      {
        total_with=tables.rows[i].cells[12].innerHTML;
      }
      withdraw_line = document.getElementById("total_"+tables.rows[i].cells[1].innerHTML);
    }
    else if (tables.rows[i].cells[10].innerHTML!="" && tables.rows[i].cells[11].innerHTML!=""&&(tables.rows[i].cells[0].innerHTML!=""&&tables.rows[i].cells[0].innerHTML!="withdrawal"))
    {
      var tcost = (parseFloat(tables.rows[i].cells[10].innerHTML) * parseFloat(tables.rows[i].cells[11].innerHTML));
      tables.rows[i].cells[12].innerHTML = tcost;
      total_with=total_with+tcost;
      withdraw_line.innerHTML = total_with;
    }
  }
}
function addrowtotable(){

   var table = document.getElementById("t_boq");

   var row = table.insertRow(table.rows.length-1);
   var w = row.insertCell();
   w.setAttribute('style','display:none');
   row.insertCell();
   row.insertCell();
   row.insertCell();
   row.insertCell();
   row.insertCell();
   row.insertCell();

   //alert(table.rows[table.rows.length-1].cells[5].innerHTML);
}
function checkEdit()
{
    var proj = $('#aps_projectname1').dropdown('get value');
    var rev = $('#revision_part').dropdown('get value');
    var date_start  = $('#date_start').val();
    var date_end = $('#date_end').val();


    if(proj!="" && rev=="1") //project details
    {
      loadProjectDetails();
      var project_field = document.getElementById('project_details');
      project_field.setAttribute("style","visibility:visible");
      var subcon_field = document.getElementById('subcon_details');
      subcon_field.setAttribute("style","display:none");
      var withdrawal_field = document.getElementById('withdrawal_details');
      withdrawal_field.setAttribute("style","display:none");
    }
    else if(proj!="" && rev=="2")
    {
      loadSubConTable();
      var project_field = document.getElementById('project_details');
      project_field.setAttribute("style","display:none");
      var subcon_field = document.getElementById('subcon_details');
      subcon_field.setAttribute("style","visibility:visible");
      var withdrawal_field = document.getElementById('withdrawal_details');
      withdrawal_field.setAttribute("style","display:none");
    }
    else if(proj!="" && rev=="3")
    {
      loadWithdrawaltable();
      var project_field = document.getElementById('project_details');
      project_field.setAttribute("style","display:none");
      var subcon_field = document.getElementById('subcon_details');
      subcon_field.setAttribute("style","display:none");
      var withdrawal_field = document.getElementById('withdrawal_details');
      withdrawal_field.setAttribute("style","Visibility:visible");
    }


}
function savethissubcon()
{
  var projCode =  $('#aps_projectname1').dropdown('get value');
  var sctable = document.getElementById('subcon_table');
  var i;
  for(i=2;i<sctable.rows.length;i++)
  {

      var scid = sctable.rows[i].cells[0].innerHTML;
      var engName = sctable.rows[i].cells[1].innerHTML;
      var work = sctable.rows[i].cells[2].innerHTML;
      var conCost = sctable.rows[i].cells[3].innerHTML;
      var matCost = sctable.rows[i].cells[4].innerHTML;
    //  alert(scid+" "+engName+" "+work+" "+conCost+" "+matCost);
      $.ajax({
          url:"../PHP/BackEndController/withdrawalcontroller.php",
          type:"POST",
          data:{func:14,pcode:projCode,id:scid,ename:engName,wk:work,ccost:conCost,mcost:matCost},
          success: function(resultdata)
          {
      //      alert(resultdata);
            alert("SubContractor Editted!");
            location.reload();
          }
        });
    }
}
function savethisboq(){

  var table = document.getElementById("t_boq");//boq table
  var projectid = $('#proj_id').val();
  var projectname = $('#project_name').val();
  var projectcode = $('#code').val();
  var projectengr = $('#project_engineer').val();
  var projectconcost = $('#contract_cost').val();
//  alert(projectid+" "+projectname+" "+projectcode+" "+projectengr+" "+projectconcost);
  //------------project info

  $.ajax({

    url: "../PHP/BackEndController/billofquantitiescontroller.php",
    type: "POST",
    data: {func: 7, pid:projectid, pname: projectname, pcode: projectcode, pengr: projectengr,pconcost: projectconcost},
    success: function(resultdata){
      //alert(resultdata);

      if($.trim(resultdata) == 1){
        //------------boq entry

        for(var i=1 ; i<table.rows.length-1;i++)
        {
          var tblid =table.rows[i].cells[0].innerHTML;
          var tblitemno =table.rows[i].cells[1].innerHTML;
          var tbldesc=table.rows[i].cells[2].innerHTML;
          var tblunit=table.rows[i].cells[3].innerHTML;
          var tblqnty=table.rows[i].cells[4].innerHTML;
          var tblunitcost=table.rows[i].cells[5].innerHTML;
          var tbltotalcost=table.rows[i].cells[6].innerHTML;
        //  alert(tblid+" "+tblitemno);
          if(tblid!=""&&tblitemno!="")
          {
        //    alert("chene ya daan");
            $.ajax({

              url: "../PHP/BackEndController/billofquantitiescontroller.php",
              type: "POST",
              data: {func: 8, id:tblid, itemno: tblitemno, desc: tbldesc, unit: tblunit,
                     qnty: tblqnty, unitcost: tblunitcost, totalcost: tbltotalcost, pcode: projectcode},
              success: function(resultdata)
              {
                alert(resultdata);
                  if($.trim(resultdata) == 1){
                    //alert("Saved Entry!");
                  }
                  else {
                  //  alert("Error Entry!");
                  }
                }
              });

            }
            else if(tblitemno!="") //Update
            {
        //      alert("ase nuebo");
              $.ajax({

                url: "../PHP/BackEndController/billofquantitiescontroller.php",
                type: "POST",
                data: {func: 2, itemno: tblitemno, desc: tbldesc, unit: tblunit,
                       qnty: tblqnty, unitcost: tblunitcost, totalcost: tbltotalcost, pcode: projectcode},
                success: function(resultdata)
                {
                    if($.trim(resultdata) == 1){
                      //alert("Saved Entry!");
                    }
                    else {
                    //  alert("Error Entry!");
                    }
                  }
                });
            }
        }
        $('#p_name').val("");
        $('#p_code').val("");
        $('#p_eng').val("");
        $('#p_concost').val("");
        alert("Project Saved!");
        location.reload();

      }
      else {

        alert("Error Project!");

      }
    }

  });

}
function savewithdrawal()
{

  var table = document.getElementById("withdrawal_table");//withdrawal table
  var projCode =  $('#aps_projectname1').dropdown('get value');
  var i;
  for(i=1 ; i<table.rows.length-1;i++)
  {
        var wtype =table.rows[i].cells[0].innerHTML;
      //  alert("wtype = "+wtype);
        if(wtype == "withdrawal")
        {
        //  alert("withdrawal ");
          var w_id =table.rows[i].cells[1].innerHTML;
          var w_desc =table.rows[i].cells[10].innerHTML;
          var w_name =table.rows[i].cells[11].innerHTML;
          var w_date =table.rows[i].cells[8].innerHTML;
          var total_amnt =table.rows[i].cells[12].innerHTML;
          $.ajax({

            url: "../PHP/BackEndController/withdrawalcontroller.php",
            type: "POST",
            data: {func: 15, wid:w_id, wdesc: w_desc, totalamnt:total_amnt,
                   wdate: w_date, wname: w_name},
            success: function(resultdata)
            {
            //  alert(resultdata);
                if($.trim(resultdata) == 1){

              //    alert("Saved Entry!");
                }
                else {
              //    alert("Error Entry!");
                }
              }
            });
        }
        else if(wtype!="")
        {
        //  alert("individual ");
          var in_id = table.rows[i].cells[1].innerHTML;
          var in_par = table.rows[i].cells[3].innerHTML;
          var in_sup = table.rows[i].cells[9].innerHTML;
          var in_qnty = table.rows[i].cells[10].innerHTML;
          var in_unit = table.rows[i].cells[11].innerHTML;
          var in_amnt = table.rows[i].cells[12].innerHTML;
          $.ajax({

            url: "../PHP/BackEndController/withdrawalcontroller.php",
            type: "POST",
            data: {func: 16, indid:in_id, inpar: in_par, insup:in_sup,
                   inqnty: in_qnty, inunit: in_unit, inamnt:in_amnt},
            success: function(resultdata)
            {
            //  alert(resultdata);
                if($.trim(resultdata) == 1){

              //    alert("Saved Entry!");
                }
                else {
              //    alert("Error Entry!");
                }
              }
            });
        }
  }
  alert("Withdrawal Saved!");

}

// graph javascript

$(".menu .item").tab();
$(".projectDropDown").dropdown();
