class FormHandler {

    handleCreateCalculatorForm = function (form) {
        const url = form.attr('action');

        const formHelper = new FormHelper();

        // const multipleAnswerQuestions = formHelper.extractMultipleAnswerQuestions(form);
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
                })
            }
        });

        const data = {
            form: formData,
            calculators: calculatorsData
        };

        const formService = new FormService();
        formService.createCalculatorForm(url, data).then(function (d) {
            console.log(d);
        }).catch(function (e) {
            console.error(e);
        });
    }
}
