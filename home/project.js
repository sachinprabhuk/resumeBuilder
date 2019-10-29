const addproject = document.querySelector("#add-new-project");
const projectForm = document.querySelector("#form-project");

let pid = 0;
const addProjectCard = () => {
    pid++;
    if(pid > 1) {
        const firstCard = document.querySelector("div#project-1");
        const newCard = firstCard.cloneNode(true);
        newCard.querySelector(".projectTitle").value = "";
        newCard.querySelector(".description").value = "";
        newCard.id = `project-${pid}`;

        projectForm.appendChild(newCard);

        return;
    }
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





