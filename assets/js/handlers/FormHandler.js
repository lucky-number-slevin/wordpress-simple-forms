class FormHandler {

    handleCreateCalculatorForm = function (form) {
        const formHelper = new FormHelper();
        formHelper.removeMessages();

        const singleAnswerQuestions = formHelper.getSingleAnswerQuestions(form);
        const formData = {};
        const calculatorsData = [];
        singleAnswerQuestions.forEach(function (item, index) {
            const itemValue = item.answerValue.trim();
            if (item.answerId === 'calculator-form-name' && itemValue) {
                formData.name = itemValue
            } else if (item.answerId.includes('calculator-name') && itemValue) {
                calculatorsData.push({
                    name: itemValue
                });
            }
        });
        const url = form.attr('action');
        const data = {
            form: formData,
            calculators: calculatorsData
        };

        const formService = new FormService();
        formService.createCalculatorForm(url, data).then(function (data, status) {
            formHelper.appendMessage(form, data.message);
            form.remove();
        }).catch(function (error) {
            formHelper.appendMessage(form, error.responseJSON, true);
            formHelper.logHttpErrorMessage(error);
        });
    }

}
