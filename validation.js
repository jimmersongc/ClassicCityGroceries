var $ = function(id) {
    return document.getElementById(id);
};

function validateEmail() {
  var emailID = document.reg.email.value;
  atpos = emailID.indexOf("@");
  dotpos = emailID.lastIndexOf(".");

  if(document.reg.email.value == ""){
    alert("Please provide an email address");
    document.reg.Name.focus();
    return false;
  }

  if (atpos < 1 || ( dotpos - atpos < 2 )) {
    alert("Please enter correct email ID")
    document.myForm.email.focus() ;
    return false;
  }

};

function validateLogin() {
  var emailID = document.myForm.email.value;
  atpos = emailID.indexOf("@");
  dotpos = emailID.lastIndexOf(".");

  if(document.myForm.email.value == ""){
    alert("Please provide an email address");
    document.reg.Name.focus();
    return false;
  }

  if (atpos < 1 || ( dotpos - atpos < 2 )) {
    alert("Please enter correct email ID")
    document.myForm.email.focus() ;
    return false;
  }

  if(document.myForm.password.value == "" ) {
    alert( "Please provide a password" );
    document.myForm.password.focus() ;
    return false;
  }
  

  return( true );

};

function validateRegistration() {

  if(document.myForm.first.value == "" ) {
    alert( "Please provide your first name" );
    document.myForm.Name.focus() ;
    return false;
  }

  if(document.myForm.last.value == "" ) {
    alert( "Please provide your last name" );
    document.myForm.Name.focus() ;
    return false;
  }

 var emailID = document.myForm.email.value;
  atpos = emailID.indexOf("@");
  dotpos = emailID.lastIndexOf(".");

  if(document.myForm.email.value == ""){
    alert("Please provide an email address");
    document.myForm.Name.focus();
    return false;
  }

if (atpos < 1 || ( dotpos - atpos < 2 )) {
    alert("Please enter correct email ID")
    document.myForm.email.focus() ;
    return false;
  }
    

 if(document.myForm.password.value == "" ) {
    alert( "Please provide a password" );
    document.myForm.password.focus() ;
    return false;
  }
  

  return( true );
  
 };

 function validateBilling() {

    if (document.billing.name.value == "") {
      alert("Please provide a name!");
      document.billing.name.focus();
      return false;
    } 

    if (document.billing.address.value == "") {
      alert("Please provide an address!");
      document.billing.address.focus();
      return false;
    } 

    if (document.billing.city.value == "") {
      alert("Please provide a city!");
      document.billing.city.focus();
      return false;
    } 

    if (document.billing.state.value == "") {
      alert("Please provide a state!");
      document.billing.state.focus();
      return false;
    } 

    if (document.billing.zip.value == "" || isNaN(document.billing.zip.value) || LengthCheck5() == false) {
      LengthCheck5();
      alert("Please provide a zip code! Make sure zip code is 5 numbers!");
      document.billing.zip.focus();
      return false;
    } 
    if (document.billing.cardnumber.value == "" || isNaN(document.billing.cardnumber.value) || LengthCheck16() == false) {
      LengthCheck16();
      alert("Please provide a valid card number! AND Card number must be 16 numbers!");
      document.billing.cardnumber.focus();
      return false;
    } 
    if (document.billing.cvv.value == "" || isNaN(document.billing.cvv.value) || LengthCheck3() == false) {
      LengthCheck3();
      alert("Please provide a valid card cvv! AND CVV must be 3 numbers!");
      document.billing.cvv.focus();
      return false;
    } 
  return (true);

 };

 function validatePayment() {
    if (document.payment.cardname.value == "") {
      alert("Please provide a valid card name!");
      document.payment.cardname.focus();
      return false;
    } 
    if (document.payment.cardnumber.value == "" || isNaN(document.payment.cardnumber.value) || LengthCheck16() == false) {
      LengthCheck16();
      alert("Please provide a valid card number! AND Card number must be 16 numbers!");
      document.payment.cardnumber.focus();
      return false;
    } 
    if (document.payment.month.value == "") {
      alert("Please provide a valid month!");
      document.payment.month.focus();
      return false;
    } 
    if (document.payment.year.value == "" || isNaN(document.payment.year.value) || LengthCheck4() == false) {
      LengthCheck4();
      alert("Please provide a valid year! AND Year must be 4 numbers!");
      document.payment.year.focus();
      return false;
    } 
    if (document.payment.cvv.value == "" || isNaN(document.payment.cvv.value) || LengthCheck3() == false) {
      LengthCheck3();
      alert("Please provide a valid card cvv! AND CVV must be 3 numbers!");
      document.payment.cvv.focus();
      return false;
    } 
    return(true);
 };

 function LengthCheck5() {
    var str = document.getElementById("zip").value;
    var n = str.length;
    document.getElementById("zip").innerHTML = n;
    if ((n > 5) || (n < 5))
    {
      return false;
    }
    return true;
};

 function LengthCheck16() {
    var str = document.getElementById("cardnumber").value;
    var n = str.length;
    document.getElementById("cardnumber").innerHTML = n;
    if ((n > 16) || (n < 16))
    {
      return false;
    }
    return true;
};

function LengthCheck4() {
    var str = document.getElementById("year").value;
    var n = str.length;
    document.getElementById("year").innerHTML = n;
    if ((n > 4) || (n < 4))
    {
      return false;
    }
    return true;
};

function LengthCheck3() {
    var str = document.getElementById("cvv").value;
    var n = str.length;
    document.getElementById("cvv").innerHTML = n;
    if ((n > 3) || (n < 3))
    {
      return false;
    }
    return true;
};