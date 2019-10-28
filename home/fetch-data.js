function getCookie(cname) {
    var name = cname + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(';');
    for(var i = 0; i <ca.length; i++) {
      var c = ca[i];
      while (c.charAt(0) == ' ') {
        c = c.substring(1);
      }
      if (c.indexOf(name) == 0) {
        return c.substring(name.length, c.length);
      }
    }
    return "";
}

const email = new FormData();

email.append("email", getCookie('user'));

fetch("/resumeapp/php/getInfo.php", {
    method: "POST",
    body: email
})
.then(data=>data.json())
.then(data => {
    if(data.success){

        let result = data.result;
        console.log(result.fname);
        personalForm["firstname"].value= result.fname;
        personalForm["lastname"].value= result.lname;
        personalForm["contact"].value= result.contact;
        personalForm["email"].value= result.email;
        personalForm["description"].value= result.description;

        
    }
});