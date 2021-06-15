import {Controller} from 'stimulus';

export default class extends Controller {
    static targets = ['champ'];

    changeHandler = async (event) => {
          for (const itemElement of this.champTargets) {
              let urlForm = itemElement.dataset.urlForm;
              const responseHtml = await fetch(urlForm, {
                  method: 'get',
              });
              const formHtml  = await responseHtml.text();
              itemElement.innerHTML = formHtml;
          }
    }

}

