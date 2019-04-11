    function adult(roomid){
       var adult = $('#adult_'+roomid).val();
       var child = $('#child_'+roomid).val();
       var infant = $('#infant_'+roomid).val();
       
       if(adult >= 0)
       {
            var total = Number(adult) + Number(child) + Number(infant) ;
            if(total > 7)
            {
                alert("Max Person 7 in each room allowed"); 
                $('#adult_'+roomid).val(''); 
            }

            if(adult > 3 )
            {
                alert("Not more than 3 Adults");
                $('#adult_'+roomid).val('');
            }
            if(Number(adult) >= 1)
            {
                $('#adult_'+roomid).css('border','1px solid #CCC'); 
            }

            confirmbooking();
       }
       else
       {
        $('#adult_'+roomid).val(''); 
       }
    }

    function child(roomid){
       var adult = $('#adult_'+roomid).val();
       var child = $('#child_'+roomid).val();
       var infant = $('#infant_'+roomid).val();
       if(child >= 0)
       {
            var total = Number(adult) + Number(child) + Number(infant) ;
            if(total > 7)
            {
                alert("Max Person 7 in each room allowed");  
                $('#child_'+roomid).val('');
            }

            if(child > 3)
            {
                alert("Not more than 3 Children");
                $('#child_'+roomid).val('');
            }

            if(Number(adult) == 0)
            {
                alert("At least 1 Adult Supervision Needed"); 
                $('#adult_'+roomid).css('border','1px solid RED'); 
                $('#child_'+roomid).val('');
            }

            confirmbooking();
       }
       else
       {
          $('#child_'+roomid).val(''); 
       }
    }

    function infant(roomid){
       var adult = $('#adult_'+roomid).val();
       var child = $('#child_'+roomid).val();
       var infant = $('#infant_'+roomid).val();
       if(infant >= 0)
       {
            var total = Number(adult) + Number(child) + Number(infant) ;
            if(total > 7)
            {
                alert("Max Person 7 in each room allowed");  
                $('#infant_'+roomid).val('');
            }

            if(infant > 3)
            {
                alert("Not more than 3 Infants");
                $('#infant_'+roomid).val('');
            }
            
            if(Number(adult) == 0)
            {
                alert("At least 1 Adult Supervision Needed"); 
                $('#adult_'+roomid).css('border','1px solid RED'); 
                $('#infant_'+roomid).val('');
            }

            if(Number(adult) < Number(infant))
            {
                alert("No room can have more infants than adults. (i.e. adults >= infants per room)"); 
                $('#infant_'+roomid).css('border','1px solid RED');  
                $('#infant_'+roomid).val('');                 
            }

            if(Number(adult) >= Number(infant))
            {
                $('#infant_'+roomid).css('border','1px solid #ccc');   
            }
            confirmbooking();
        }
        else
        {
            $('#infant_'+roomid).val(''); 
        }
    }

    function confirmbooking()
    {
        var adult = 0;
        var child = 0;
        var infant = 0;
        $('input[name="adult[]"]').each(function() 
        {
            var loopAdult = $(this).val();
            adult = Number(loopAdult) + Number(adult);
            
        });

        $('input[name="child[]"]').each(function() 
        {
            var loopchild = $(this).val();
            child = Number(loopchild) + Number(child);
            
        });

        $('input[name="infant[]"]').each(function() 
        {
            var loopinfant = $(this).val();
            infant = Number(loopinfant) + Number(infant);
            
        });
        
        var totalTourist = Number(adult) + Number(child) + Number(infant);
        $('#adult-total').html("<span >Number of Total Adults : </span>"+adult);
        $('#child-total').html("<span style='margin-left:10px'>Children : </span>"+child);
        $('#infant-total').html("<span style='margin-left:10px'>Infants : </span>"+infant);
        $('#In-total').html("<span style='margin-left:10px'> =  </span>"+totalTourist+ " Pax");
        
        if(Number(totalTourist) >= 1)
        {
            var suggestion = "<strong>Tripfez Suggestion : </strong>" +adult + " Adult(s), " + child + " Children and " + infant + " Infant(s) can fit in ";                
            //Now the tricky part
            if(Number(totalTourist) > 14)
            {
               
                $('#room-suggestion').html(suggestion + ' 3 rooms');

                //Infant logic no need coz its common to Parents

            }
            else
            {
                if(Number(totalTourist) <= 14 && Number(totalTourist) >= 8)
                {
                    
                    if(Number(child) >= 7)
                    {
                        $('#room-suggestion').html(suggestion + ' 3 rooms');
                    }
                    if(Number(child) <= 6 && Number(totalTourist) <= 14 && Number(totalTourist) > 7)
                    {
                        $('#room-suggestion').html(suggestion + ' 2 rooms');
                    }
                    if(Number(totalTourist) >=8 && Number(totalTourist) < 14 )
                    {
                        $('#room-suggestion').html(suggestion + ' 2 rooms');
                        //Tick here
                        if(Number(child) >= 7)
                        {
                            $('#room-suggestion').html(suggestion + ' 3 rooms'); 
                        }

                    }  
                    if(Number(adult) >= 7)
                    {
                        $('#room-suggestion').html(suggestion + ' 3 rooms');
                    }              
                } 
                if(Number(totalTourist) <= 7)
                {
                    if(Number(child) >= 4 || Number(adult) >= 4  )
                    {
                        $('#room-suggestion').html(suggestion + ' 2 rooms');
                        //But trick is here 
                        if(Number(adult) >= 7)
                        {
                            $('#room-suggestion').html(suggestion + ' 3 rooms');
                        }
                    }
                    else
                    {
                        $('#room-suggestion').html(suggestion + ' 1 room');
                    }
                }
            }
        }
        else
        {
            $('#room-suggestion').html('');
        }

        

    }

    function cancelRoom(roomid)
    {
        
        $("#room-select-"+roomid).hide('slow', function(){ $("#room-select-"+roomid).remove(); });
        
        $('#room_'+roomid).removeClass( "btn btn-warning" ).addClass( "btn btn-primary" );
        book(roomid);
        confirmbooking();
    }

    function submitbooking()
    {
        var adult = 0;
        $('input[name="adult[]"]').each(function() 
        {
            var loopAdult = $(this).val();
            adult = Number(loopAdult) + Number(adult);
            
        });
        if(Number(adult) >= 1)
        {
          $("#myModal-confirm").modal('show');  
        }
        else
        {
            $('input[name="adult[]"]').css('border','1px solid RED')
        }
        
		     
    }

    function reconfirm() {

        

        $('#SubForm').html('Processing Data...');
        var roomlist = $('#roomNumber').val();        
        var match = roomlist.split(',');

        var count = Number((roomlist.match(/,/g) || []).length);

        if(Number(count) == 0)
        {

            //alert("Executing this block");
                var variable = roomlist;
                
                var checkAdult = $('#adult_'+variable).val();
                if(checkAdult >= 1)
                {
                    var checkChild = $('#child_'+variable).val();
                    if(checkChild <= 0)
                    {
                        checkChild =0;
                    }
                    var checkInfant = $('#infant_'+variable).val();
                    if(checkInfant <= 0)
                    {
                        checkInfant = 0;
                    }
                    
                    $.ajax({ url: 'service/book.php',
                        data: {
                            'adult'  :  checkAdult,
                            'child'  :  checkChild,
                            'infant' :  checkInfant,
                            'name'   :  "Mr. ABC",
                            'contact':  "601385******",
                            'date'   :  $('#date').val(),
                            'roomnumber' : variable
                        },
                        type: 'post',
                        dataType:'json',
                        success: function(data) 
                        {
                            //Do nothing
                        }
                    });
                    
                }
                $('#SubForm').html('Processed!');

        }
        
        if(Number(count) >= 1)
        {
            //alert("Executing that block");
            for (var a in match)
            {
                
                var variable = match[a];
                
                var checkAdult = $('#adult_'+variable).val();
                if(checkAdult >= 1)
                {
                    var checkChild = $('#child_'+variable).val();
                    if(checkChild <= 0)
                    {
                        checkChild =0;
                    }
                    var checkInfant = $('#infant_'+variable).val();
                    if(checkInfant <= 0)
                    {
                        checkInfant = 0;
                    }
                    
                    $.ajax({ url: 'service/book.php',
                        data: {
                            'adult'  :  checkAdult,
                            'child'  :  checkChild,
                            'infant' :  checkInfant,
                            'name'   :  "Mr. ABC",
                            'contact':  "601385******",
                            'date'   :  $('#date').val(),
                            'roomnumber' : variable
                        },
                        type: 'post',
                        dataType:'json',
                        success: function(data) 
                        {
                            //Do nothing
                        }
                    });
                    
                }
                $('#SubForm').html('Processed!');
            }            
        }

        
        setTimeout(function() {
            search();
            $("#myModal-confirm").modal('hide');
            $('#SubForm').html('Yes, Proceed');
        }, 500);
 
    }




