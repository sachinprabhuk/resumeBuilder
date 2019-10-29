const addproject = document.querySelector("#add-new-project");
const projectForm = document.querySelector("#form-project");

let pid = 0;
const addProjectCard = () => {
    pid++;
    projectForm.innerHTML += (
        `
        <div class="card col-sm-12 col-md-6" id='project-${pid}'>
            <div class="card-body">
                <div class="form-group">
                    <small for="projectTitle">Project Title</small>
                    <input type="text" class="form-control form-control-sm projectTitle">
                </div>
                <div class="form-group">
                    <small for="descrip">description</small>
                    <textarea class="form-control form-control-sm description"></textarea>
                </div>     
               
            </div>
        </div>
        `        
    );
}

// addProjectCard();
addproject.addEventListener("click", addProjectCard);
console.log("HELLO");





