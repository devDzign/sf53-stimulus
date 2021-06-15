import {Controller} from 'stimulus';

export default class extends Controller {
    result = 0;
    dataCal = {
        data1: 0,
        data2: 0,
        data3: 0,
    }
    static targets = ['champ', 'result'];

    static values = {
        urlApi: String,
    }

    connect(){
        this.resultTarget.value = this.result
    }

    changeHandler = async (event) => {
        const url = await this.urlApiValue;
        for (const itemElement of this.champTargets) {

            let {value, name } = itemElement;
            value = (value=="")? 0: value;
            this.dataCal = {
                ...this.dataCal,
            [name]: value
            }
        }

        const response = await this.calculate(url, this.dataCal);
        this.resultTarget.value = response;
    }


     calculate = async (url, data) => {

        let response = await fetch(url, {
             headers: {
                 'Accept': 'application/json',
                 'Content-Type': 'application/json'
             },
             method: 'post',
             body: JSON.stringify(data)
         }).then( async ressponse => {

             return ressponse.json();

         })
             .catch(error => console.log(error));

        return response;
    }

}

