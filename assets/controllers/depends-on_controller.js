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
    static targets = ['count'];
    static values = {
        urlApi: String
    }

    changeHandler = async (event) => {
        const url = this.urlApiValue;
        const {value, name} = await event.target;

      await fetch(url, {
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json'
            },
            method: 'post',
            body: JSON.stringify({[name]: value})
        }).then( async ressponse => {
          const responseHtml = await fetch('/api/form', {
              method: 'get',
          });

          const formHtml  = await responseHtml.text();
          this.element.outerHTML = formHtml;
      })
            .catch(error => console.log(error))
    }



}
