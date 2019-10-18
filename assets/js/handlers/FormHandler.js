class FormHandler {

    handleCreateCalculatorForm = function (form) {
        const messageRenderer = new MessageRendere();
        messageRenderer.removeMessages([SF_SUCCESS_MESSAGE_CLASS, SF_ERROR_MESSAGE_CLASS]);

        const formHelper = new FormHelper();
        const formRenderer = new FormRenderer();

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
            messageRenderer.appendMessage(form, data.message);
            form.remove();
            formRenderer.appendBuildFormButton();
        }).catch(function (error) {
            messageRenderer.appendMessage(form, error.responseJSON, true);
            messageRenderer.logHttpErrorMessage(error);
        });
    }

}
