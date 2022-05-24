
    $(document).on('click', '.opensearchDiv', function() {
        $('.spacediv>div:nth-child(1)').css('width', '25%');
        $('.spacediv>div:nth-child(2)').css('width', '50%');
        $('.spacediv>div:nth-child(3)').css('width', '25%');
    });
    $(document).on('click', '.closesearchDiv', function() {
        $('.spacediv>div:nth-child(1)').css('width', '30%');
        $('.spacediv>div:nth-child(2)').css('width', '70%');
        $('.spacediv>div:nth-child(3)').css('width', '0%');
    });
    $(document).on('click', '.openchatinfo', function() {
        if(!$(this).hasClass('openactive')){
            $(this).addClass('openactive');
        $('.chatoption').css('display', 'block');
        }else{
            $(this).removeClass('openactive');
        $('.chatoption').css('display', 'none');
        }
    });
    $(document).on('click', '.openboxoption', function() {
        if(!$(this).hasClass('openactive')){
            $(this).addClass('openactive');
        $('.boxoption').css('display', 'block');
        }else{
            $(this).removeClass('openactive');
        $('.boxoption').css('display', 'none');
        }
    });
    $(document).on('click', '.closespace1int', function() {
        $('.space1int').css('width', '0%');
    });
    $(document).on('click', '.openspace1int', function() {
        $('.space1int').css('width', '100%');
    });
    $(document).on('click', '.logoutbtn', function() {
        $('.logoutme').css('display', 'flex');
        $('.boxoption').css('display', 'none');
        $('.openboxoption').removeClass('openactive');
    });
    $(document).on('click', '.closeoverlay', function() {
        $('.overlay').css('display', 'none');
    });
