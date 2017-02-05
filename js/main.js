function countChar(val) {
        val = $(val);
        var maxLen = 1900;
        if(val.val() !== undefined){
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
    }

};

$( document ).ready(function(){
    $('body').removeClass('no-js');
    validate();

    if(('#newLibraryText').length){
        countChar('#newLibraryText');
    }

    if($('#generatedText').length){




       var wrapper = $('body'),
           element = wrapper.find('#generatedText'),
           lastElement = wrapper.find('#generatedText'),
           lastElementTop = element.position().top,
           elementsHeight = element.outerHeight(),
           scrollAmount = lastElementTop;
           console.log(scrollAmount);
           $('body').animate({
               scrollTop: scrollAmount
           }, 1000, function() {
               lastElement.addClass('current-last');
           });
           var selectAllLink = '<span id="selectall_wrap"><a href="javascript:void(0);" class="selectall">Select all!</a></span>';
           $(selectAllLink).insertBefore($('#generatedText'));


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
        button.html(button.data('value'));
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

function SelectText(element) {
    var doc = document
        , text = doc.getElementById(element)
        , range, selection
    ;
    if (doc.body.createTextRange) {
        range = document.body.createTextRange();
        range.moveToElementText(text);
        range.select();
    } else if (window.getSelection) {
        selection = window.getSelection();
        range = document.createRange();
        range.selectNodeContents(text);
        selection.removeAllRanges();
        selection.addRange(range);
    }
    }

    document.onclick = function(e) {
    if (e.target.className === 'selectall') {
        SelectText('generatedText');
    }
};
