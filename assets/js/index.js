function showhide()
{
    $('#records_table').show();
    $('#main-logic').hide();
    $('#selection').hide();
    $('#continue').show();
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

    //Getting cuurent date
    var today = new Date();
    var dd = String(today.getDate()).padStart(2, '0');
    var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
    var yyyy = today.getFullYear();

    today = yyyy+"-"+mm+"-"+dd;
    var selecteddate = new Date(date);
    var today        = new Date(today);
    var disable="false";
    if(selecteddate < today)
    {
        disable="true";
    }
    

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
                    var Contact = item.Contact;
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
                    
                        if(disable == 'false')
                        {
                        trHTML += '<tr><td>' + sl + '</td><td>' + item.RoomNumber + '</td><td>' + name + '</td><td>' + status + '</td><td><button class="btn btn-primary" id="room_' + item.RoomNumber + '" onclick="book(' + item.RoomNumber + ')">Available for Booking</button></td></tr>';     
                        }
                         if(disable == 'true')
                        {
                        trHTML += '<tr><td>' + sl + '</td><td>' + item.RoomNumber + '</td><td>' + name + '</td><td>' + status + '</td><td><button class="btn btn-default" id="room_' + item.RoomNumber + '" >Unavailable </button></td></tr>';     
                        }      
                    
                    
                    }
                    else
                    {
                        trHTML += '<tr class="success"><td>' + sl + '</td><td>' + item.RoomNumber + '</td><td>' + name +"-("+Contact+")"+ '</td><td>' + status + '</td><td>'+ item.DateTime +'</td></tr>';
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
    $('#continue').hide();

    /* Main Logic Here */
    var selectedRoom = $('#roomNumber').val();
    $('#main-logic').load('service/dynamic-room.php?room='+selectedRoom);

}


