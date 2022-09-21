
/*------------Check Login-------------------*/

function CheckLogin() {
    if(phone()===true&&password()===true){
        return true;
    }
    var count=0;
    if(phone()===false){
        count++;
    }
    if(password()===false){
        count++;
    }
    if(count!==0){
    return false;
    } 
}

/*---------------Check Register and valdiate--------------------*/

function name1(){
    if (document.getElementById('name').value === ""){
        document.getElementById('checkname').style.display = "block";
        return false;
    }
    document.getElementById('checkname').style.display = "none";
    return true;
}
function phone(){
    if(document.getElementById('phone').value === "") {
        document.getElementById('checkphone').style.display = "block";
        return false;
    }
    document.getElementById('checkphone').style.display = "none";
    return true;
}
function password(){
    if(document.getElementById('password').value === "") {
        document.getElementById("checkpassword").style.display = "block";
        return false;
    }
    document.getElementById("checkpassword").style.display = "none";
    return true;
}
function speciality(){
    if(document.getElementById('speciality').value === "") {
        document.getElementById("checkspeciality").style.display = "block";
        return false;
    }
    document.getElementById("checkspeciality").style.display = "none";
    return true;
}

function CheckRegisterResipient(){
    if(name1() === true && phone() === true && password() ===true){
        if(SignUpCheckReci()==true)
            return true;
        else
            return false;
    }
    var count=0;
    if(name1()===false){
        count++;
    }
    if(password()===false){
        count++;
    }
    if(phone()===false){
        count++;
    }
    if(count!==0){
        return false;
    } 
}
function CheckRegisterRestaurant(){
    if(name1() === true && phone() === true && password() ===true &&speciality()===true ){
        if(SignUpCheckRes()==true)
            return true;
        else
            return false;
        
    }
    
    var count=0;

    if(name1()===false){
        count++;
    }
    if(password()===false){
        count++;
    }
    if(phone()===false){
        count++;
    }
    if(speciality()===false){
        count++;
    }
    if(count!==0){
        return false;
    }
    
}


/*---------------Add meal page--------------------*/


document.addEventListener("DOMContentLoaded", function () {
    const form = document.getElementById('addMealForm');

    form.addEventListener('submit', (event) => {
        // handle the form data
        event.preventDefault();

        let name = form.elements['name'].value;
        let quantity = form.elements['quantity'].value;
        let description = form.elements['description'].value;

        alert('you added a new meal : \n name: ' + name + ' \n quantity: ' + quantity + ' \n description: ' + description);
    });

});
function SignUpCheckRes(){
    var x=0;
    var Allinput=/^(\s|\w|\d|<br>)*?$/;
    var nameFormat=/^[a-zA-Z ]*$/;
    var passwordFormat=/(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,20}/;
    var numberResturant=/[0]{1}[1]{2}[0-9]{7}/;

    var name = document.forms["RegisterFormRestaurant"].name.value;
    var phone= document.forms["RegisterFormRestaurant"].phone.value;
    var password = document.forms["RegisterFormRestaurant"].password.value;
    var speciality = document.forms["RegisterFormRestaurant"].speciality.value;
    


    if(name.length > 30 || nameFormat.test(name)==false || Allinput.test(name)===false){
        document.getElementById("checkname1").style.display = "block";
        document.getElementById("checkname1").innerHTML= "Only letters and white space are allowed AND the minimum length for a name is 30";
        x++;
        
    }
    else{   
    document.getElementById("checkname1").style.display = "none";
    
    }

    if(phone.length > 10 || Allinput.test(phone)===false || numberResturant.test(phone)===false){
        document.getElementById("checkphone1").style.display = "block";
        document.getElementById("checkphone1").innerHTML="Only numbers are allowed AND the minimum length for a phone is 10";
        x++;
    }
    else{   
    document.getElementById("checkphone1").style.display = "none";
    
    }
   
    
    if(Allinput.test(password)===false || passwordFormat.test(password)===false){
        document.getElementById("checkpassword1").style.display = "block";
        document.getElementById("checkpassword1").innerHTML=" \n No spaces allowed only letters, numbers, special characters are allowed \n";
        x++;
    }
    else{   
    document.getElementById("checkpassword1").style.display = "none";
    
    }
    if(password.length > 20 || Allinput.test(password)===false || passwordFormat.test(password)===false){
        document.getElementById("checkpassword1").style.display = "block";
        document.getElementById("checkpassword1").innerHTML="No spaces allowed only letters, numbers, special characters are allowed AND the minimum length for a password is 20";
       x++;
    }
    else{   
    document.getElementById("checkpassword1").style.display = "none";
    
    }

    if(speciality.length > 15 || Allinput.test(speciality)===false || nameFormat.test(speciality)===false){
        document.getElementById("checkspeciality1").style.display = "block";
        document.getElementById("checkspeciality1").innerHTML="\n Only letters and white space are allowed AND the minimum length for a speciality1 is 15";
        x++;
    }
    else{   
    document.getElementById("checkspeciality1").style.display = "none";
    }
    
    if(x===0) {
        return true;}
    else{
        return false;
    }
    
}

function SignUpCheckReci(){
    var a=0;
    var Allinput=/^(\s|\w|\d|<br>)*?$/;
    var nameFormat=/^[a-zA-Z ]*$/;
    var passwordFormat=/(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,20}/;
    var numberNormal=/[0]{1}[5]{1}[0-9]{8}/;
 
    var name = document.forms["RegisterFormRecipient"].name.value;
    var phone= document.forms["RegisterFormRecipient"].phone.value;
    var password = document.forms["RegisterFormRecipient"].password.value;
    
    if(name.length > 30 || nameFormat.test(name)==false || Allinput.test(name)===false){
        document.getElementById("checkname1").style.display = "block";
        document.getElementById("checkname1").innerHTML= "Only letters and white space are allowed AND the minimum length for a name is 30";
        a++;
        
    }
    else{   
    document.getElementById("checkname1").style.display = "none";
    }

    if(phone.length > 10 || Allinput.test(phone)===false || numberNormal.test(phone)===false){
        document.getElementById("checkphone1").style.display = "block";
        document.getElementById("checkphone1").innerHTML="Only numbers are allowed AND the minimum length for a phone is 10";
        a++;
    }
    else{   
    document.getElementById("checkphone1").style.display = "none";
    }
   
    
    if(password.length > 20 || Allinput.test(password)===false || passwordFormat.test(password)===false){
        document.getElementById("checkpassword1").style.display = "block";
        document.getElementById("checkpassword1").innerHTML="No spaces allowed only letters, numbers, special characters are allowed AND the minimum length for a password is 20";
       a++;
    }
    else{   
    document.getElementById("checkpassword1").style.display = "none";
    
    }

    if(a===0)
        return true;
    else
        return false;
}
/*---------------------Validate Add Meal--------------------*/

var usrname;

