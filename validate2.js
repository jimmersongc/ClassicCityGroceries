var $ = function(id) {
    return document.getElementById(id);
};


function validate() {
      
  if(document.reg.name.value == "" ) {
    alert( "Please provide your name" );
    document.reg.Name.focus() ;
    return false;
  }

  else if(document.reg.address.value == "" ) {
    alert( "Please provide your address" );
    document.reg.Name.focus() ;
    return false;
  }
  else if(document.reg.city.value == "" ) {
    alert( "Please provide your city" );
    document.reg.Name.focus() ;
    return false;
  }
  else if(document.reg.state.value == "" ) {
    alert( "Please provide your state" );
    document.reg.Name.focus() ;
    return false;
  }
  else if (document.reg.zip.value == "" || document.reg.zip.isNaN()){
    alert("Please provide a number value for your zip code")
  }
  var emailID = document.reg.email.value;
  atpos = emailID.indexOf("@");
  dotpos = emailID.lastIndexOf(".");
    
  else if(document.reg.email.value == ""){
    alert("Please provide an email address");
    document.reg.Name.focus();
    return false;
  }

  else if (atpos < 1 || ( dotpos - atpos < 2 )) {
    alert("Please enter correct email ID")
    document.myForm.email.focus() ;
    return false;
  }
    

  else if(document.reg.password.value == "" ) {
    alert( "Please provide a password" );
    document.reg.Name.focus() ;
    return false;
  }
  
  else{
    return( true );
  }
 
 }