let eid = 0;

const addExperienceCard = () => {
    eid++;
    if(eid > 1) {
        const firstCard = document.querySelector("div#experience-1");
        const newCard = firstCard.cloneNode(true);
        newCard.querySelector(".title").value = "";
        newCard.querySelector(".description").value = "";
        newCard.id = `experience-${eid}`
        experienceForm.appendChild(newCard);

        return;
    }
    experienceForm.innerHTML +=
        `
        <div class="card col-sm-12 col-md-6" id='experience-${eid}'>
            <div class="card-body">
                <div class="form-group">
                    <small>title</small>
                    <input type="text" class="form-control form-control-sm title">
                </div>
                <div class="form-group">
                    <small >description</small>
                    <input type="text" class="form-control form-control-sm description">
                </div>     
                
            </div>
        </div>
        `
}

addExperience.addEventListener("click", addExperienceCard);