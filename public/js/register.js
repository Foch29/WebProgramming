
function form_check(event){
    if(form.email.value.lenght == 0 || form.username.value.lenght == 0 || form.password.value.lenght == 0 
        || form.confirm.value.lenght == 0 ){
            alert("Fill every field");
        event.preventDefault();
    }
}
const form = document.form["form_register"];
form.addEventListener("submit",form_check);