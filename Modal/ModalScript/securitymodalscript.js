
window.onload = loadthis();

  function loadthis()
  {
    easy_enter();
  }


  function Log_in()
  {

    var username = $('#username').val();
    var password = $('#password').val();
    //alert(username+" / "+password);

    $.ajax({

      url: "../PHP/BackEndController/withdrawalcontroller.php",
      type: "POST",
      data: {func: 13, user:username, pass:password},
      success: function(resultdata){
        //alert(resultdata);
        if($.trim(resultdata) == "1")
        {
          $('.modal').modal('hide');
        }
        else
        {
          alert("Invalid username or password!");
          location.reload();
        }

      }

    });
  }

  function easy_enter()
  {
    var press_key = document.getElementById('password');
    press_key.addEventListener("keydown", function (e)
    {
      if(e.keyCode==13)
      {
        Log_in();
      }
    });

  }
