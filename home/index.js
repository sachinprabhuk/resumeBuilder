const personalNext = document.querySelector("#personal-next");
const addEducation = document.querySelector("#add-new-education");
const educationForm = document.querySelector("#form-education");

let id = 0;
const addEducationCard = () => {
    id++;
    educationForm.innerHTML += (
        `
        <div class="card col-sm-12 col-md-6" id='education-${id}'>
            <div class="card-body">
                <div class="form-group">
                    <small for="insititution">institution</small>
                    <input type="text" class="form-control form-control-sm" class="insititution">
                </div>
                <div class="form-group">
                <small for="descrip">description</small>
                <input type="password" class="form-control form-control-sm" class="description">
                </div>     
                <div class="form-group">
                    <small>year of study</small>
                    <div class="row">
                        <div class="col">
                            <input type="month" class="form-control start"/>
                        </div>
                        <div class="col">
                            <input type="month"  class="form-control end" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
        `        
    );
}

addEducationCard();
addEducation.addEventListener("click", addEducationCard);




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