//Creating a function to validate the form
//create a call function for when the form is submitted

function validateForm()

{

    var fname = document.forms['user_details']['first_name'].value;

    var lname = document.forms['user_details']['last_name'].value;

    var city = document.forms['user_details']['city_name'].value;

    var uname = document.forms['user_details']['user_name'].value;

    var password = document.forms['user_details']['password'].value;

//user_details is the name of the form

    if (fname == null || lname == "" || city == "" || uname == "" || password == "")

    {

        alert('All the required details have not been supplied');

        return false;

    }

    return true;

}