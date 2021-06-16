import {Controller} from 'stimulus';

export default class extends Controller {

    static targets = ["toUpdate"]


    async refreshitem(event){
        console.log(event.target.dataset.updateUrl);
        const response = await fetch(event.target.dataset.updateUrl);
        event.target.outerHTML = await response.text();
    }

    record(event) {
        fetch(event.target.dataset.recordUrl)
            .then(response => this.useResponse(event, response));
    }

    useResponse(event, response) {
        if (response.status == 200) {
            this.updateAllListener(event.target.id);
        }
    }

    updateAllListener(id) {
        this.toUpdateTargets.forEach(function (item) {
            const depends = item.dataset.dependOn.split(" ");
            if (depends.includes(id)) {
                console.log(item);
                item.dispatchEvent(new Event("refreshItem"));
            }
        });
    }


}