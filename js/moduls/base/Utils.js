/**
 * Created by alexandrzanko on 2/7/18.
 */

export class Utils {

    /**
     * formArray - $(form).serializeArray();
     * @param formArray
     * @returns {{}}
     */
    static objectifyForm(formArray) {//serialize data function
        let form = {};
        for (let i = 0; i < formArray.length; i++) {
            form[formArray[i]['name']] = formArray[i]['value'];
        }
        return form;
    }
}