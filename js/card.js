$(function() {

    var click = true;
    var t = 0;
    $(document).on('click', '#card .card-kata', function(e) {
        if (click) {
            let crun = setInterval(function(argument) {
                t += 1;
                console.log(parseInt(t))
                if (parseInt(t) == 10) {
                    clearInterval(crun);
                    click = true;
                    t = 0
                } else {
                    click = false;
                }
                console.log(click)
            }, 100);

            click = false;
            if ($(this).hasClass('open')) {
                $(this).removeClass('open');
            } else {
                $(this).addClass('open');
            }
        }

        console.log(click)
        return false;

    });
});