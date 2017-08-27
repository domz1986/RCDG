
window.onload = loadDataOnload();
//document.onkeypress = calcTotal();


function loadDataOnload()
{
  loadProjectsToDropBox();
  getdate();
}
function saveWithdrawal(cost_type)
{
  if(cost_type==1)
  {
      var table = document.getElementById("t_ind");
      var projCode = $('#aps_projectname').dropdown('get value');
      var typeDC = $('#aps_typedc').dropdown('get value');
      var totalAmnt = document.getElementById('t_amnt').innerHTML;
      var w_date = $('#date_withdrawal').val();
      var w_name = $('#name_withdrawal').val();

      $.ajax({
          url:"../PHP/BackEndController/withdrawalcontroller.php",
          type:"POST",
          data:{func:6,pcode:projCode,tdc:typeDC,costtype:cost_type,totalamnt:totalAmnt,wdate:w_date,wname:w_name},
          success: function (resultdata){
            //alert(resultdata);
            for(var i=1 ; i<table.rows.length;i++){
              var ind_InH = table.rows[i].cells[0].value;         //in house value
              var ind_Subtype = table.rows[i].cells[1].innerHTML;
              var ind_Par=table.rows[i].cells[2].innerHTML;      //particulars
              var ind_Qnty=table.rows[i].cells[3].innerHTML;     //quantity
              var ind_UnitCost=table.rows[i].cells[4].innerHTML; //unit cost
              var ind_Amnt=table.rows[i].cells[5].innerHTML;     //amount
              var ind_Supplr=table.rows[i].cells[6].innerHTML;   //supplier
            //  alert("Subtype ="+ind_Subtype);

              if(table.rows[i].cells[7].innerHTML!="")
              {
                var subcon=table.rows[i].cells[7].innerHTML;
              }
              else
              {
                var subcon="";
              }
              //alert("subcon = :"+subcon+":");
              var w_id =$.trim(resultdata);                      //w_id
            //  alert (ind_InH);

            if(ind_InH!=""){
                  $.ajax({

                    url: "../PHP/BackEndController/withdrawalcontroller.php",
                    type: "POST",
                    data: {func: 7, boqid:ind_InH, par:ind_Par, qnty:ind_Qnty, amnt:ind_Amnt, unitcost:ind_UnitCost, sup:ind_Supplr, wid:w_id, sc:subcon, st:ind_Subtype},
                    success: function(resultdata){
                  //    alert(resultdata);
                      if($.trim(resultdata) == 1){
                        /*
                        $('#p_name').val("");
                        $('#p_code').val("");
                        $('#p_eng').val("");
                        $('#p_concost').val("");
                        //loadProductsToCards();
                          alert("Saved Entry!");
                        */

                      }
                      else {
                        //alert(resultdata)
                        alert("Error Entry!");

                      }

                    }

                  });
                }
                //  alert("Saved Entry!");
            }

            alert("Withdrawal Saved!");
            location.reload();
          }
      });
    }
    else {
      var projCode = $('#aps_projectname1').dropdown('get value');
      var typeidc = $('#aps_typeidc').dropdown('get value');
      var idcdate = $('#date_withdrawal1').val();
      var idcname = $('#name_withdrawal1').val();
      var idcamount = $('#indirect_amount').val();
      var idcdetails = $('#indirect_details').val();
      alert("este aki "+idcname+" "+idcamount+" "+idcdate+" "+idcdetails);
      $.ajax({
        url: "../PHP/BackEndController/withdrawalcontroller.php",
        type: "POST",
        data: {func: 12, pcode:projCode, costtype:cost_type, tidc:typeidc, date:idcdate, name:idcname, amount:idcamount, details:idcdetails},
        success: function(resultdata)
        {
          alert(resultdata);
          alert("Withdrawal Saved!");
          location.reload();
        }
      });
    }
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
  //alert("este kel");
  $('#t_ind tbody').html("");
  location.reload();
  //$('#t_ind').append("<tbody><tr><td></td><td></td><td></td><td></td><td></td></tr></tbody>");

}

function check_subcon()
{
  var value = $('#aps_typedc').dropdown('get value');
  var pro = $('#aps_projectname').dropdown('get value');
//  alert(value+" "+pro);
  if(value==4 && pro!='')
  {
    var dropdown = document.getElementById('subcondropdown');
    dropdown.setAttribute("style","visibility:visible");
    var sclbl = document.getElementById('sclbl');
    sclbl.setAttribute("style","visibility:visible");

    var TypeCost = document.getElementById('subconTypeCost');
    TypeCost.setAttribute("style","visibility:visible");
    var sctc = document.getElementById('sctc');
    sctc.setAttribute("style","visibility:visible");

    var subcon_col = document.getElementById('subcon_col');
    subcon_col.setAttribute("style","visibility:visible");

    var projcode = $("#aps_projectname").dropdown('get value');
  //  alert(projcode);

    $.ajax({
      url: "../PHP/BackEndController/withdrawalcontroller.php",
      type: "POST",
      data: {func: 10, pcode:projcode},
      success: function(resultdata){
        if($.trim(resultdata) != ""){
        //  alert(resultdata);
          $('#subcon_menu').html(resultdata);
          }else
          {
            alert("Error gayod!");
          }
        }
    });
  }
  else {
    if(pro=='' && value==4)
    {
      alert("Load Project First");

      var txt = $('#aps_typedc').dropdown('get text');
      alert(txt);
      var txt2 = $('#aps_typedc').dropdown('get value');
      alert(txt2);
    }

    var child = document.getElementById("subcondropdown");
    child.setAttribute("style","display:none");
    var child2 = document.getElementById('sclbl');
    child2.setAttribute("style","display:none");
    var child4 = document.getElementById('subconTypeCost');
    child4.setAttribute("style","display:none");
    var child5 = document.getElementById('sctc');
    child5.setAttribute("style","display:none");

  }

}
function load_subcontable()
{
      var projectcode = $('#aps_projectname').dropdown('get value');

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
function check_digit(evt)
{
  $('#concost').html(function () {
    this.value = this.value.replace(/[^0-9\.]/g,'');
});
}
function check_addrow()
{
  var value = $('#aps_typedc').dropdown('get value');
  if(value=="")
    return false;
  else
  {
    var value2 = $('#aps_typeh').dropdown('get text');
  //  alert(value2);
    if(value2=="Select Inhouse")
    {
      return false;
    }
    else {
      return true;
    }
  }
}
function addSubCon()
{
  
    var projCode =  $('#aps_projectname').dropdown('get value');
    var engName = document.getElementById('name').value;
    var work = document.getElementById('work').value;
    var conCost = document.getElementById('concost').value;
    var matCost = document.getElementById('matcost').value;
  $.ajax({
      url:"../PHP/BackEndController/withdrawalcontroller.php",
      type:"POST",
      data:{func:9,pcode:projCode,ename:engName,wk:work,ccost:conCost,mcost:matCost},
      success: function(resultdata){
        alert("SubContractor saved!");
        location.reload();
      }
    });

}
function check_subcon_fill()
{
  var pro = $('#aps_projectname').dropdown('get value');
  var nme = document.getElementById('name').value;
  var wrk = document.getElementById('work').value;
  var cst = document.getElementById('concost').value;
  var mat = document.getElementById('matcost').value;

  if(pro=="")
  {
    document.getElementById("selpro").style.visibility='visible';
  }
  else if(nme=="")
  {
    document.getElementById("selname").style.visibility='visible';
  }
  else if(wrk=="")
  {
    document.getElementById("selwork").style.visibility='visible';
  }
  else if(cst==""&&mat=="")
  {
    document.getElementById("selcost").style.visibility='visible';
    document.getElementById("selmat").style.visibility='visible';
  }
  else
  {
    addSubCon();
  }
}
function addrowtoTable()
{
  if(check_addrow())
  {
      $('#aps_typedc').addClass("disabled");

     var table = document.getElementById("t_ind").appendChild(document.createElement('tbody'));
     var row = table.insertRow(table.rows.length);
     var x = row.insertCell();
     x.contentEditable = false;
     x.innerHTML = $('#aps_typeh').dropdown('get text');
     x.value = $('#aps_typeh').dropdown('get value');
     //   alert(x.value);
     var typecost = $('#subconTypeCost').dropdown('get value');
      // alert("typecost "+typecost);
     if(typecost!="")
     {

        var w = row.insertCell(); //Subcon cell
        w.contentEditable = false;
        w.innerHTML = $('#subconTypeCost').dropdown('get text');
        w.value = $('#subconTypeCost').dropdown('get value');
      }
      else {

        var w =  row.insertCell();
        w.contentEditable = false;
        w.innerHTML = "";
        w.style.display='none';

      }
     row.insertCell();
     row.insertCell();
     var y = row.insertCell();
     //   y.contentEditable = false;
     row.insertCell();
     row.insertCell();
     if($('#aps_typedc').dropdown('get value')==4)
     {
       var subcon = row.insertCell();
       subcon.innerHTML = $('#subcondropdown').dropdown('get value');
       subcon.style.display='none';
     }
     else {
       var subcon = row.insertCell();
       subcon.innerHTML = null;
       subcon.style.display='none';
     }
   //alert(table.rows[table.rows.length-1].cells[5].innerHTML);
   }
   else {
     alert("Fill in missing");
   }
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


function loadInhouse()
{

  var projectcode = $('#aps_projectname').dropdown('get value');
  //alert(projectcode);

  $.ajax({

    url: "../PHP/BackEndController/billofquantitiescontroller.php",
    type: "POST",
    data: {func: 6,pcode:projectcode},
    success: function(resultdata){
    //  alert("resultdata:"+resultdata);
      if($.trim(resultdata) != ""){
      //  alert(resultdata);
        info = $.trim(resultdata).split("=");

        $('#loadboqtodropdown').html(resultdata);
      //  alert(resultdata);
      }
      else {
        alert("Error!");
      }

    }

  });

}

function loadgraph()
{
//  alert("entra");

  var projectcode = $('#aps_projectname').dropdown('get value');
/*  var title = document.createElement("ul");
  title.setAttribute("class","bar-graph");
  var t = document.createElement('p');
  t.innerHTML = "Title";
  var div = document.createElement("div");
  div.setAttribute("class","bar-wrap");
  var bar = document.createElement("span");
  bar.setAttribute("class","bar-fill");
  bar.setAttribute("style","width: 50%;");
  title.appendChild(t);
  title.appendChild(div);
  div.appendChild(bar);
  document.getElementById('reload').appendChild(title);*/
  var i;
  for(i=1;i<5;i++){
    var count = i;

    $.ajax({
      async:false,
      url: "../PHP/BackEndController/withdrawalcontroller.php",
      type: "POST",
      data: {func: 8,pcode:projectcode,windtype:count},
      success: function(resultdata){
    //    alert(resultdata);
        $('#reload').html(resultdata);
      }

    });
  //  alert(count);

  }
//  alert("ca");

}

function loadBOQToDropdown()
{
  //alert("Inside Load BOQ to Table!");
  var projectcode = $('#aps_projectname').dropdown('get value');
//  alert(projectcode);
  $.ajax({

    url: "../PHP/BackEndController/billofquantitiescontroller.php",
    type:"POST",
    data:{func: 5,pcode:projectcode},
    success: function(resultdata){

      $("#loadboqtotable").html(resultdata);

    }

  });

}
// graph javascript

$(".menu .item").tab();
$(".projectDropDown").dropdown();
