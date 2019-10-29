const personalNext = document.querySelector("#personal-next");
const educationNext = document.querySelector("#education-next");

const achivementNext = document.querySelector("#achivement-next");
const experienceNext = document.querySelector("#experience-next");

const addEducation = document.querySelector("#add-new-education");
const educationForm = document.querySelector("#form-education");

const addAchivement = document.querySelector("#add-new-achivement");
const achivementForm = document.querySelector("#form-achivement");

const addExperience = document.querySelector("#add-new-experience");
console.log(addExperience);
const experienceForm = document.querySelector("#form-experience");

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
    achivements: {
        pill: document.querySelector("#pill-achivement"),
        tab: document.querySelector("#tab-achivement")
    },
    experiences: {
        pill: document.querySelector("#pill-experience"),
        tab: document.querySelector("#tab-experience")
    }
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

educationNext.addEventListener("click", e => {
    e.preventDefault();
    tabOrgnization.education.pill.classList.remove("active");
    tabOrgnization.education.tab.classList.remove("active");
    tabOrgnization.education.tab.classList.remove("show");
    
    tabOrgnization.experiences.pill.classList.add("active");
    tabOrgnization.experiences.tab.classList.add("active");
    tabOrgnization.experiences.tab.classList.add("show");
});

achivementNext.addEventListener("click", e => {
    e.preventDefault();
    tabOrgnization.achivements.pill.classList.remove("active");
    tabOrgnization.achivements.tab.classList.remove("active");
    tabOrgnization.achivements.tab.classList.remove("show");
    
    tabOrgnization.projects.pill.classList.add("active");
    tabOrgnization.projects.tab.classList.add("active");
    tabOrgnization.projects.tab.classList.add("show");
});

experienceNext.addEventListener("click", e => {
    e.preventDefault();
    tabOrgnization.experiences.pill.classList.remove("active");
    tabOrgnization.experiences.tab.classList.remove("active");
    tabOrgnization.experiences.tab.classList.remove("show");
    
    tabOrgnization.achivements.pill.classList.add("active");
    tabOrgnization.achivements.tab.classList.add("active");
    tabOrgnization.achivements.tab.classList.add("show");  
});




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
            description: curr.querySelector(".description").value,
            sdate: curr.querySelector(".start").value,
            edate: curr.querySelector(".end").value

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

    let achivement = Array.from(achivementForm.querySelectorAll(".card"))
        .reduce((acc, curr, i) => {
        acc.push({
            name: curr.querySelector(".title").value,
            description: curr.querySelector(".description").value
        });
        return acc;
    }, []);

    achivement= JSON.stringify(achivement);

    let experience = Array.from(experienceForm.querySelectorAll(".card"))
        .reduce((acc, curr, i) => {
        acc.push({
            name: curr.querySelector(".title").value,
            description: curr.querySelector(".description").value
        });
        return acc;
    }, []);

    experience = JSON.stringify(experience);


    

    const data = new FormData();
    data.append("fname", fname);
    data.append("lname", lname);
    data.append("contact", contact);
    data.append("description", description);
    data.append("institutions", insititutions);
    data.append("projects", projects);
    data.append("achivement", achivement);
    data.append("experience", experience);

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