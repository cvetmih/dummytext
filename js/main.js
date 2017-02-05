function countChar(val) {
        val = $(val);
        var maxLen = 1900;
        var len = val.val().length;

        var charNum = $('#charNum');
        if (len > maxLen) {
            var toBe = val.val().substring(0, maxLen);
          val.val(toBe);
          charNum.addClass('error');
          if($('#shortened').length > 0) {
              $('#shortened').remove();
          }
              var howMuch = len-maxLen;
              if(howMuch > 1){
                  howMuch += ' characters';
              }
              else{
                  howMuch += ' character';
              }
              charNum.parents('.form-group').append('<b id="shortened">Your string was shortened by '+ howMuch +'.</b>');


          len = val.val().length;
          charNum.text( len + '/' + maxLen );
        //   $('#shorten').fadeIn();

        } else {
          charNum.removeClass('error');
          charNum.text( len + '/' + maxLen );
        }

      };


$( document ).ready(function(){
    $('body').removeClass('no-js');
  validate();
  if(('#newLibraryText').length>0){
      countChar('#newLibraryText');
  }
});

$('form').keyup(function(){
    validate();
});

function validate(){
    var validate = true;

    $("input").each(function() {
        if($(this).val().trim() == ''){
            validate = false;
        }
    });

    $("textarea").each(function() {
        if($(this).val().trim() == ''){
            validate = false;
        }
    });

    var button = $('.btn-default');

    if(validate == true){
        button.removeClass('disabled');
        button.removeAttr('disabled');
        button.html('Create library');
    }
    else{
        button.attr('disabled','disabled');
        button.addClass('disabled');
        button.html('Fill all inputs');
    }
}

$('.slideLabel .form-control').on('focus', function(){
    pushLabelUp($(this));
});

$('.slideLabel .form-control').focusout(function() {
    pushLabelDown($(this));
});

function pushLabelUp(elem){
    elem.siblings('label').css({
        top: '-30px',
        left: '5px',
        fontSize: '20px',
    })
    // elem.parents('.form-group')
}

function pushLabelDown(elem){
    if(elem.val().trim() == ''){
        elem.siblings('label').css({
            top: '7px',
            left: '11px',
            fontSize: '14px',
        });
    }
}
