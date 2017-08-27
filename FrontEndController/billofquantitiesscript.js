
window.onload = loadDataOnload();
//document.onkeypress = calcTotal();


function loadDataOnload(){

  loadProjectsToDropBox();

}


function calcTotal(){
//  alert("entra");
  var table = document.getElementById("t_boq");
  var total=0;
  var i;
  for(i=2;i<table.rows.length-1;i++){
      //total = total + parseFloat(table.rows[i].cells[5].innerHTML);
    if (table.rows[i].cells[3].innerHTML!="" && table.rows[i].cells[4].innerHTML!=""){
      var tcost = (parseFloat(table.rows[i].cells[3].innerHTML) * parseFloat(table.rows[i].cells[4].innerHTML));
      table.rows[i].cells[5].innerHTML = tcost.toFixed(2);
      total = total + parseFloat(table.rows[i].cells[5].innerHTML);
      //alert(total);
    }
  }
  table.rows[1].cells[1].innerHTML=total.toFixed(2);
}

function addrowtotable(){

   var table = document.getElementById("t_boq");

   var row = table.insertRow(table.rows.length-1);
   row.insertCell();
   row.insertCell();
   row.insertCell();
   row.insertCell();
   row.insertCell();
   row.insertCell();

   //alert(table.rows[table.rows.length-1].cells[5].innerHTML);
}

function savethisboq(){

  var table = document.getElementById("t_boq");//boq table
  var table_proj = document.getElementById("t_project");//project table

  var projectname = table_proj.rows[1].cells[0].innerHTML;
  var projectcode = table_proj.rows[1].cells[1].innerHTML;
  var projectengr = table_proj.rows[1].cells[2].innerHTML;
  var projectconcost = table_proj.rows[1].cells[3].innerHTML;

  //------------project info

  $.ajax({

    url: "../PHP/BackEndController/billofquantitiescontroller.php",
    type: "POST",
    data: {func: 1, pname: projectname, pcode: projectcode, pengr: projectengr,
           pconcost: projectconcost},
    success: function(resultdata){
    //alert(resultdata);
      if($.trim(resultdata) == 1){
        //------------boq entry

        for(var i=2 ; i<table.rows.length-1;i++){
          var tblitemno =table.rows[i].cells[0].innerHTML;
          var tbldesc=table.rows[i].cells[1].innerHTML;
          var tblunit=table.rows[i].cells[2].innerHTML;
          var tblqnty=table.rows[i].cells[3].innerHTML;
          var tblunitcost=table.rows[i].cells[4].innerHTML;
          var tbltotalcost=table.rows[i].cells[5].innerHTML;
          if(tblitemno!=""){
              $.ajax({

                url: "../PHP/BackEndController/billofquantitiescontroller.php",
                type: "POST",
                data: {func: 2, itemno: tblitemno, desc: tbldesc, unit: tblunit,
                       qnty: tblqnty, unitcost: tblunitcost, totalcost: tbltotalcost, pcode: projectcode},

                success: function(resultdata){
                  if($.trim(resultdata) == 1){
                    /*
                    $('#p_name').val("");
                    $('#p_code').val("");
                    $('#p_eng').val("");
                    $('#p_concost').val("");
                    //loadProductsToCards();
                    */
                    //alert("Saved Entry!");

                  }
                  else {

                    alert("Error Entry!");

                  }

                }

              });
            }
        }
        /*
        $('#p_name').val("");
        $('#p_code').val("");
        $('#p_eng').val("");
        $('#p_concost').val("");
        //loadProductsToCards();
        */
        alert("Project Saved!");
        location.reload();

      }
      else {

        alert("Error Project!");

      }

    }

  });

}

function loadProjectsToDropBox(){

  $.ajax({

    url:"../PHP/BackEndController/billofquantitiescontroller.php",
    type:"POST",
    data:{func: 3},
    success: function(resultdata){
    //  alert(resultdata);
      $('#loadprojectname').html(resultdata);

    }

  });

}


function loadProjectDetails(){

  var projectcode = $('#aps_projectname').dropdown('get value');
  document.getElementById('pv_code').value = projectcode;
  //alert(projectcode);

  $.ajax({

    url: "../PHP/BackEndController/billofquantitiescontroller.php",
    type: "POST",
    data: {func: 4,pcode:projectcode},
    success: function(resultdata){

      if($.trim(resultdata) != ""){
      //  alert(resultdata);
        info = $.trim(resultdata).split("=");

        document.getElementById('pv_engr').value = info[0];
        document.getElementById('pv_concost').value = info[1];
        loadBOQToTable();

      }
      else {
        alert("Error!");
      }

    }

  });

}

function loadBOQToTable(){
  //alert("Inside Load BOQ to Table!");
  var projectcode = $('#aps_projectname').dropdown('get value');
  $.ajax({

    url: "../PHP/BackEndController/billofquantitiescontroller.php",
    type:"POST",
    data:{func: 5,pcode:projectcode},
    success: function(resultdata){

      $("#loadboqtotable").html(resultdata);

    }

  });

}

$(".projectDropDown").dropdown();
