$('input:radio').bind('click mousedown', (function() {
    //Capture radio button status within its handler scope,
    //so we do not use any global vars and every radio button keeps its own status.
    //This required to uncheck them later.
    //We need to store status separately as browser updates checked status before click handler called,
    //so radio button will always be checked.
    var isChecked;

    return function(event) {
        //console.log(event.type + ": " + this.checked);

        if(event.type == 'click') {
            //console.log(isChecked);

            if(isChecked) {
                //Uncheck and update status
                isChecked = this.checked = false;
                $('.errormsg').removeClass('alert alert-danger').text('');
            } else {
                //Update status
                //Browser will check the button by itself
                isChecked = true;
                $('.errormsg').removeClass('alert alert-danger').text('');
                //Do something else if radio button selected
                /*
                if(this.value == 'somevalue') {
                    doSomething();
                } else {
                    doSomethingElse();
                }
                */
            }
        } else {
            //Get the right status before browser sets it
            //We need to use onmousedown event here, as it is the only cross-browser compatible event for radio buttons
            isChecked = this.checked;
        }
    }})());
//radios validation
$(document).ready(function() {
    $(".form-check-input").change(function() {
        if($('.form-check-input:checked').length > 3){
            $(this).prop('checked', false);
            $('.errormsg').addClass('alert alert-danger').text('Нельзя оценить более трёх кандидатов!');
        }
        if($('#inlineRadio1:checked').length > 1){
            $(this).prop('checked', false);
            $('.errormsg').addClass('alert alert-danger').text('Нельзя ставить одинаковый балл разным кандидатам!');
        }
        if($('#inlineRadio2:checked').length > 1){
            $(this).prop('checked', false);
            $('.errormsg').addClass('alert alert-danger').text('Нельзя ставить одинаковый балл разным кандидатам!');
        }
        if($('#inlineRadio3:checked').length > 1){
            $(this).prop('checked', false);
            $('.errormsg').addClass('alert alert-danger').text('Нельзя ставить одинаковый балл разным кандидатам!');
        }
    });
});

//Submition validation
$(document).on("submit", "form", function(e){
    if($('.form-check-input:checked').length < 3){
        $('.errormsg').addClass('alert alert-danger').text('Оценок должно быть ТРИ!');
        e.preventDefault();
        return false;
    }
});