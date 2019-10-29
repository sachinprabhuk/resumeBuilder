let aid = 0;

const addAchivementCard = () => {
    aid++;
    if(aid > 1) {
        const firstCard = document.querySelector("div#achivement-1");
        const newCard = firstCard.cloneNode(true);
        newCard.querySelector(".title").value = "";
        newCard.querySelector(".description").value = "";
        newCard.id = `achivement-${aid}`
        achivementForm.appendChild(newCard);

        return;
    }
    achivementForm.innerHTML +=
        `
        <div class="card col-sm-12 col-md-6" id='achivement-${aid}'>
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

addAchivement.addEventListener("click", addAchivementCard);