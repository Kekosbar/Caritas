$(function() {
    $('a').click(function() {
        div = $(this).attr('href'); //grab #one, #two which correspond to the div id we're targetting
        paragraph = $(div); //store each div in a variable for later use        
            
        $('div').removeClass('grey-bg'); //remove any greyed backgrounds
        $(paragraph).toggleClass('grey-bg'); //add grey background to clicked element
       
    });
});