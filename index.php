<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TripFez</title>
    <link href="node_modules/bootstrap/dist/css/bootstrap.css" rel="stylesheet">
    <link href="custom.css" rel="stylesheet">

</head> 

<body>

       
 
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">TripFez</a>
          </div>
          <div id="navbar" class="navbar-collapse collapse">
            <!--
                
            --->
          </div><!--/.navbar-collapse -->
        </div>
      </nav>
  
      <!-- Main jumbotron for a primary marketing message or call to action -->
      <div class="jumbotron" style="padding-bottom:0px!important">
        <div class="container">
          <p style="padding-top:10px;">
                <h4></h4> 
                <label style="font-size:18px;font-weight:400;margin-right:15px;">Select Your Booking date: </label> 
                <input type="text" name="date" id="date" alt="date" class="IP_calendar" title="Y-m-d">
                <button class="btn btn-primary" id="search" role="button" onclick="search()">Search || Refresh</button>
                <button class="btn btn-danger" id="continue" role="button" onclick="booking()" style="float:right;display:none;">Continue Booking (<span id="count" style="font-weight:bolder">0</span>)</button>
                <button class="btn btn-warning" id="selection" role="button" onclick="showhide()" style="float:right;display:none;margin-right:10px;">Show Selection </button>
               
                </p>
          
        </div>
      </div>

        <div class="container">
        <!-- Example row of columns -->
            <input id="roomNumber" type="text" value="" style="display:none;"/>
            <div class="row">
            
                <div class="table-responsive" id="show-hide" >
                    <table id="records_table"  class="table table-bordered" style="padding:2px!important;display:none">
                            <tr>
                                <th>Sl</th>
                                <th>Room Number</th>
                                <th>User</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                    </table> 
                    <div id="main-logic" style="display:none">
                     Main Logic
                    </div>
                </div>  
            </div>
              <!-- Modal -->
                <div class="modal fade" id="myModal" role="dialog">
                    <div class="modal-dialog">
                    
                    <!-- Modal content-->
                    <div class="modal-content " >
                        
                        <div class="modal-body">
                        <p>Not allowed to select more than three(3) rooms.</p>
                        </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                    
                    </div>
                </div> 
               <!--Modal-->
               

             
            <div style="position:fixed;bottom:0px;width:100%">

                    <p>&copy; 2019 Tripfez Sdn. Bhd</p>
            </div>
 
        </div>
  

  

    
    <!--Js-->
    <script type="text/javascript" src="http://services.iperfect.net/js/IP_generalLib.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>

    <script type="text/javascript">
    
    function showhide()
    {
        $('#records_table').show();
        $('#main-logic').hide();
    }

    function search()
    {
        $('#roomNumber').val('');
        $('#count').html('0');
        $("#records_table tr").remove(); 
        $('#records_table').show(1000);
        $('#main-logic').hide(1000);
        $('#continue').hide(1000);
        $('#selection').hide(1000);
        var date = $('#date').val();
        $.ajax({
                type: "GET",
                url: "service/available-room.php",
                data: { 
                    date: $('#date').val(), 
                },
                success: function(result) {
                    console.log(result);
                    var trHTML = '';
                    trHTML += '<tr class="warning"><th>Sl</th><th>Room Number</th><th>Customer Name</th><th>Status</th><th>Action</th></tr>';                                     
                    var sl=0;
                    $.each(result, function (i, item) 
                    {   ++sl;
                        var name   = item.name;
                        var status = item.status;
                        if(item.name === null)
                        {
                            name = "";
                        }
                        if(item.status === null)
                        {
                            status = "";
                        }
                        if(item.name === null && item.status === null)
                        {
                        
                            trHTML += '<tr><td>' + sl + '</td><td>' + item.RoomNumber + '</td><td>' + name + '</td><td>' + status + '</td><td><button class="btn btn-primary" id="room_' + item.RoomNumber + '" onclick="book(' + item.RoomNumber + ')">Choose</button></td></tr>';     
                        }
                        else
                        {
                            trHTML += '<tr class="success"><td>' + sl + '</td><td>' + item.RoomNumber + '</td><td>' + name + '</td><td>' + status + '</td><td>'+ item.DateTime +'</td></tr>';
                        }
                                        });
                    $('#records_table').append(trHTML);
                },
                error: function(result) {
                    alert('error');
                }
            });
    } 
    
    function book(RoomNumber)
    {
        var cleanStr = $('#roomNumber').val().replace(/^[\s,]+/,"").replace(/[\s,]+$/,"").replace(/\s*,+\s*(,+\s*)*/g,",");
        $('#roomNumber').val(cleanStr); 
        
        var selected = $('#roomNumber').val();
        
        if( selected.match(new RegExp("(?:^|,)"+RoomNumber+"(?:,|$)"))) 
        {
            $('#roomNumber').val(selected.replace(RoomNumber, ""));
            $('#room_'+RoomNumber).removeClass( "btn btn-warning" ).addClass( "btn btn-primary" );
        }
        else
        {  
            if((cleanStr.match(/,/g) || []).length == 2)
            {
                $("#myModal").modal();
            }
            else
            {
            var list = RoomNumber+","+selected;
            $('#roomNumber').val(list)
            $('#room_'+RoomNumber).addClass("btn btn-warning");            
            }

        }


        var cleanStr = $('#roomNumber').val().replace(/^[\s,]+/,"").replace(/[\s,]+$/,"").replace(/\s*,+\s*(,+\s*)*/g,",");
        $('#roomNumber').val(cleanStr); 
        if((cleanStr.match(/,/g) || []).length >= 0 && (cleanStr.match(/,/g) || []).length < 3 && cleanStr !='' )
        {
            var total = (cleanStr.match(/,/g) || []).length;
            var roomCount = total + 1;
            $('#count').html(roomCount);
            $('#continue').show(1000);
        }
        else
        {
            $('#continue').hide(1000); 
        }  
           
    }

    function booking()
    {
        $('#selection').show();
        $('#records_table').hide();
        $('#main-logic').show();

        /* Main Logic Here */
        var selectedRoom = $('#roomNumber').val();
        $('#main-logic').load('service/dynamic-room.php?room='+selectedRoom);

    }


    </script>
  </body>
</html>
 



    




