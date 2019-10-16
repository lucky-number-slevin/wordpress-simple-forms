class FormService {

    async createCalculatorForm(url, data) {
        return jQuery.post({
            type: "POST",
            url: url,
            data: JSON.stringify(data),
        });
    }

}
