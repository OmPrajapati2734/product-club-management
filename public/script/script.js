    // Document is ready 
    $(document).ready(function () { 

        

    // Submit button 
    $("#submitbtn").click(function () { 
        let clubid = $('#club_id').val();
        if (clubid.length == 0) { 
            $("#clubidcheck").html("**club id cannot be null"); 
            return false; 
        } else { 
            $("#clubidcheck").hide();
        } 
    }); 
    });
    