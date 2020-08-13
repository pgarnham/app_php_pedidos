function checkEmail(theForm) {
    if (theForm.new_email.value != theForm.conf_new_email.value)
    {
        alert('Los correos ingresados no coinciden!');
        return false;
    } else {
        return true;
    }
}