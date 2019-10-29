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

const insertPersonalData = result =>{
        console.log(result.fname);
        personalForm["firstname"].value= result.fname;
        personalForm["lastname"].value= result.lname;
        personalForm["contact"].value= result.contact;
        personalForm["email"].value= result.email;
        personalForm["description"].value= result.description;
}

const insertEducationalData = result =>{
  let id = 1;
  result.forEach((curr)=>{
    addEducationCard();
    let currentCard = document.querySelector('#education-'+id);
    currentCard.querySelector(".institution").value = curr.institution;
    currentCard.querySelector(".description").value = curr.description;
    id++;
  });

  // no education fields previously entered, so add one
  if(id == 1)
    addEducationCard();
  
}

const insertProjectsData = result =>{
  let id= 1;
  result.forEach((curr)=>{
    addProjectCard();
    let currentCard = document.querySelector('#project-'+id);
    currentCard.querySelector(".projectTitle").value = curr.title;
    currentCard.querySelector(".description").value = curr.description;
    id++;
  });
  
  // no projects fields previously entered, so add one
  if(id == 1)
    addProjectCard();
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

        let personalResult = data.personalResult;
        let educationalResult = data.educationalResult;
        let projectsResult = data.projectsResult;

        insertPersonalData(personalResult);
        insertEducationalData(educationalResult);
        insertProjectsData(projectsResult);
    } else {
        // if no data was entered or something went wrong,
        // we still want one card to be displayed, thuss........
        addProjectCard();
        addEducationCard()
    }
})