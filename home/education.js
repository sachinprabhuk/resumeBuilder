let id = 0;

const addEducationCard = () => {
    id++;
    if(id > 1) {
        const firstCard = document.querySelector("div#education-1");
        const newCard = firstCard.cloneNode(true);
        newCard.querySelector(".institution").value = "";
        newCard.querySelector(".description").value = "";
        newCard.querySelector(".start").value = "";
        newCard.querySelector(".end").value = "";
        newCard.id = `education-${id}`
        educationForm.appendChild(newCard);

        return;
    }
    educationForm.innerHTML +=
        `
        <div class="card col-sm-12 col-md-6" id='education-${id}'>
            <div class="card-body">
                <div class="form-group">
                    <small>institution</small>
                    <input type="text" class="form-control form-control-sm institution">
                </div>
                <div class="form-group">
                    <small >description</small>
                    <input type="text" class="form-control form-control-sm description">
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
}

addEducation.addEventListener("click", addEducationCard);