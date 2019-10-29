let id = 0;
const addEducationCard = () => {
    id++;
    educationForm.innerHTML+=
        `
        <div class="card col-sm-12 col-md-6" id='education-${id}'>
            <div class="card-body">
                <div class="form-group">
                    <small for="insititution">institution</small>
                    <input type="text" class="form-control form-control-sm institution">
                </div>
                <div class="form-group">
                <small for="descrip">description</small>
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

addEducationCard();
addEducation.addEventListener("click", addEducationCard);