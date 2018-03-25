$(function(){
    $("#phone_number").mask("8 (999) 999-99-99");
});
var form = document.querySelector('#reg_form');
var pass1 =document.querySelector('#password');
var pass2 =document.querySelector('#password2');

var checkValidity = function () {
    if (pass1.value !== pass2.value) {
        pass1.style.borderColor ="red";
        pass2.style.borderColor = "red";
        return false;
    }
    return true;
}
form.addEventListener('submit', function (evt) {
    evt.preventDefault();
    pass1.style.borderColor = "";
    pass2.style.borderColor = "";
    if (checkValidity()) {
        form.submit();
    }
});
