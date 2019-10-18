class FormService {

    async createCalculatorForm(url, data) {
        return jQuery.post(url, data);
    }

}
