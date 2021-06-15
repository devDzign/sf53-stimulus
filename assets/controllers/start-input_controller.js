import {Controller} from 'stimulus';

/*
 * This is an example Stimulus controller!
 *
 * Any element with a data-controller="hello" attribute will cause
 * this controller to be executed. The name "hello" comes from the filename:
 * hello_controller.js -> "hello"
 *
 * Delete this file or adapt it for your use!
 */
export default class extends Controller {
    static targets = ['champ'];
    static values = {
        urlApi: String,
    }

    changeHandler = async (event) => {

        const url = await this.urlApiValue;
        const {value, name} = await event.target;

      await fetch(url, {
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json'
            },
            method: 'post',
            body: JSON.stringify({[name]: value})
        }).then( async ressponse => {

          for (const itemElement of this.champTargets) {
              let urlForm = itemElement.dataset.urlForm;
              let dependInput = itemElement.dataset.depend;
              let isChanged = itemElement.dataset.isChanged;

              if(dependInput === name){
                  const responseHtml = await fetch(urlForm, {
                      method: 'get',
                  });
                  const formHtml  = await responseHtml.text();
                  if(isChanged === "yes"){
                       itemElement.innerHTML = formHtml
                  }else{
                      itemElement.outerHTML = formHtml
                  }
              }

          }

      })
            .catch(error => console.log(error));


    }

}


function roughScale(x, base) {
    const parsed = parseInt(x, base);
    if (isNaN(parsed)) { return 0; }
    return parsed * 100;
}
