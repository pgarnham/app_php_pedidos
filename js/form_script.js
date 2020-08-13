function checkEmail(theForm) {
    if (theForm.new_email.value != theForm.conf_new_email.value)
    {
        alert('Los correos ingresados no coinciden!');
        return false;
    } else {
        return true;
    }
}

function checkUser(theForm) {
    if (!set_correos.has(theForm.your_email.value))
    {
        alert('Este correo no tiene datos asociados!');
        return false;
    } else {
        return true;
    }
}