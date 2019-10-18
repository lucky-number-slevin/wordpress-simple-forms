class FormHelper {

    // Extract all form group elements (select, checkbox group, etc.)
    // Returns and array of objects like: {optionId: string, isSelected: bool}
    extractMultipleAnswerQuestions(form) {
        const multipleAnswerQuestions = [];
        form.children(`.${SF_JS_FORM_GROUP_CLASS}`).each(function (index, value) {
            const groupElement = jQuery(this);
            groupElement.find(`.${SF_JS_FORM_GROUP_OPTION_CLASS}`).each(function (index, value) {
                const option = jQuery(this);
                const optionId = option.attr('value');
                const isSelected = option.is(':checked');
                multipleAnswerQuestions.push({optionId: optionId, isSelected: isSelected});
            })
        });
        return multipleAnswerQuestions;
    };

    // Extract all form elements with a single value (e.g. text input)
    // Returns an array of objects like: {answerId: string, answerValue: string}
    getSingleAnswerQuestions(form) {
        const singleAnswerQuestions = [];
        form.children(`.${SF_JS_FORM_ELEMENT_CLASS}`).each(function (index, value) {
            const formElement = jQuery(this);
            singleAnswerQuestions.push({
                answerId: formElement.attr('id'),
                answerValue: formElement.find(`.${SF_JS_FORM_ELEMENT_VALUE_CLASS}`).attr('value')
            });
        });
        return singleAnswerQuestions;
    };

}
