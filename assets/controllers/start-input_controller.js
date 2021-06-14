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

    connect() {

    }

    changeHandler = async (event) => {

        const url = this.urlApiValue;

        const {value, name} = await event.target;

        console.log(value);
        console.log(name);

        const response = await fetch(url, {
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json'
            },
            method: 'post',
            body: JSON.stringify({[name]: value, 'content': ''})
        })
            .then(response => {
                console.log(response)
            })
            .catch(error => console.log(error))
    }

}
