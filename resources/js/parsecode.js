$.fn.parsecode = function() {
    $("code").each(function(){
        //var str = $(this).html();
        var parsedString = $(this).html().replace(/</g, '&lt;')
        $(this).html(parsedString);
    });
};

$(".parse-code").parsecode();