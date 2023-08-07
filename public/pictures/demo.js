function clearErrors(){

    errors = document.getElementsByClassName('formerror');
    for(let item of errors)
    {
        item.innerHTML = "";
    }


}
function seterror(id, error){
    //sets error inside tag of id 
    element = document.getElementById(id);
    element.getElementsByClassName('formerror')[0].innerHTML = error;

}

function validateForm(){
    var returnval = true;
    clearErrors();

    //perform validation and if validation fails, set the value of returnval to false
    var name = document.forms['myForm']["fname"].value;
    if (name.length<5){
        seterror("name", "*Length of name is too short");
        returnval = false;
    }

    if (name.length == 0){
        seterror("name", "*Length of name cannot be zero!");
        returnval = false;
    }

    var email = document.forms['myForm']["femail"].value;
    if (email.length>15){
        seterror("email", "*Email length is too long");
        returnval = false;
    }

    var password = document.forms['myForm']["fpass"].value;
    if (password.length < 6){

        // Quiz: create a logic to allow only those passwords which contain atleast one letter, one number and one special character and one uppercase letter
        seterror("pass", "*Password should be atleast 6 characters long!");
        returnval = false;
    }

    var cpassword = document.forms['myForm']["fcpass"].value;
    if (cpassword != password){
        seterror("cpass", "*Please Confirm Password");
        returnval = false;
    }

    return returnval;
}


function fullname()
{
    document.getElementById('full').style.backgroundColor='rgb(0, 153, 255)';
    document.getElementById('full').style.color='Black';
}

function mail(){
    document.getElementById('email').style.backgroundColor='red';
}
function hlo()
{
    const email = document.getElementById('email')
    const password = document.getElementById('password')
    const form = document.getElementById('form')
    const errorElement = document.getElementById('error')

    form.addEventListener('submit', (e) => {
        let messages = []
      if (password.value === '' || password.value == null)
      {
           messages.push('*Password must contain some value')
      }
      if (password.value.length <= 8)
      {
        messages.push('*Password must be longer than 8 characters')
      }
      if (password.value.length > 20)
      {
        messages.push('*Password must be shorter than 20 characters')
      }
      if(messages.length > 0)
    {
        e.preventDefault()
        errorElement.innerText = messages.join(', ')
    }
    }) 
}
