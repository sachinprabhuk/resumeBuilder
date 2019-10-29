const personalNext = document.querySelector("#personal-next");
const addEducation = document.querySelector("#add-new-education");
const educationForm = document.querySelector("#form-education");
const personalForm = document.querySelector("#form-personal");
const projectsForm = document.querySelector("#form-project");
const logout = document.querySelector("#log-out");
const submit = document.querySelector("#final-submit");



const tabOrgnization = {
    personal: {
        pill: document.querySelector("#pill-personal"),
        tab: document.querySelector("#tab-personal")
    },
    education: {
        pill: document.querySelector("#pill-education"),
        tab: document.querySelector("#tab-education")
    },
    projects: {
        pill: document.querySelector("#pill-projects"),
        tab: document.querySelector("#tab-projects")
    },
}


personalNext.addEventListener("click", e => {
    e.preventDefault();
    tabOrgnization.personal.pill.classList.remove("active");
    tabOrgnization.personal.tab.classList.remove("active");
    tabOrgnization.personal.tab.classList.remove("show");
    
    tabOrgnization.education.pill.classList.add("active");
    tabOrgnization.education.tab.classList.add("active");
    tabOrgnization.education.tab.classList.add("show");
})

// on education next click.
const educationNext = document.querySelector("#education-next");
educationNext.addEventListener("click", e => {
    e.preventDefault();
    tabOrgnization.education.pill.classList.remove("active");
    tabOrgnization.education.tab.classList.remove("active");
    tabOrgnization.education.tab.classList.remove("show");
    
    tabOrgnization.projects.pill.classList.add("active");
    tabOrgnization.projects.tab.classList.add("active");
    tabOrgnization.projects.tab.classList.add("show");  
})




logout.addEventListener("click", ()=>{
    window.location.replace("/resumeapp/login");
});


submit.addEventListener("click", e => {
    // personal
    const fname = personalForm["firstname"].value;
    const lname = personalForm["lastname"].value;
    const contact = personalForm["contact"].value;
    const description = personalForm["description"].value;

    // education
    let insititutions = Array.from(educationForm.querySelectorAll(".card"))
        .reduce((acc, curr, i) => {
        acc.push({
            name: curr.querySelector(".institution").value,
            description: curr.querySelector(".description").value
        });
        return acc;
    }, []);

    insititutions = JSON.stringify(insititutions);
   
    // projects
    let projects = Array.from(projectsForm.querySelectorAll(".card"))
        .reduce((acc, curr, i) => {
        acc.push({
            name: curr.querySelector(".projectTitle").value,
            description: curr.querySelector(".description").value
        });
        return acc;
    }, []);

    projects = JSON.stringify(projects);

    const data = new FormData();
    data.append("fname", fname);
    data.append("lname", lname);
    data.append("contact", contact);
    data.append("description", description);
    data.append("institutions", insititutions);
    data.append("projects", projects);

    for (var value of data.values()) {
        console.log(value); 
     }
    fetch("/resumeapp/php/addInfo.php", {
        method: "POST",
        body: data
    })
    .then(data => data.json())
    .then(data => {
        console.log(data);
        if(data.auth===false)
            window.location.replace("/resumeapp/login");
        else if(data.success===true){
            console.log("going to templates");
            window.location = "/resumeapp/php/getPdf.php";
        }
        else
            console.log("heyyy error");
    })
    .catch(err => {
        console.log(err);
    })
    

});