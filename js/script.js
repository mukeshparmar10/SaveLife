function checkConfirmPassword()
{
	if(f1.password.value==f1.confirm_password.value)
	{
		return true;
	}
	else
	{
		alert("Password and confirm password is not match.");
		f1.confirm_password.focus();
	}	
}