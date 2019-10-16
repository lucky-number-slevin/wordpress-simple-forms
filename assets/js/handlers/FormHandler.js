class FormHandler {

    handleCreateCalculatorForm = function (form) {
        const url = form.attr('action');

        const formHelper = new FormHelper();

        const multipleAnswerQuestions = formHelper.extractMultipleAnswerQuestions(form);
        const singleAnswerQuestions = formHelper.getSingleAnswerQuestions(form);
        const data = {
            singleAnswerQuestions: singleAnswerQuestions,
            multipleAnswerQuestions: multipleAnswerQuestions
        };

        const formService = new FormService();
        formService.createCalculatorForm(url, data).then(function (d) {
            console.log(d);
        }).catch(function (e) {
            console.error(e);
        });
    }
}
