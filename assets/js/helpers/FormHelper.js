class FormHelper {

    // Extract all form group elements (select, checkbox group, etc.)
    extractMultipleAnswerQuestions = function (form) {
        const formGroupFieldIdentifier = '.js-form-group';
        const formGroupFieldOptionIdentifier = '.js-form-group-option';
        const multipleAnswerQuestions = [];
        form.children(formGroupFieldIdentifier).each(function (index, value) {
            const groupElement = jQuery(this);
            groupElement.find(formGroupFieldOptionIdentifier).each(function (index, value) {
                const option = jQuery(this);
                const optionId = option.attr('value');
                const isSelected = option.is(':checked');
                multipleAnswerQuestions.push({optionId: optionId, isSelected: isSelected});
            })
        });
        return multipleAnswerQuestions;
    };

    // Extract all form elements with a single value (e.g. text input)
    getSingleAnswerQuestions = function (form) {
        const singleAnswerQuestions = [];
        form.children('.js-form-element').each(function (index, value) {
            const formElement = jQuery(this);
            singleAnswerQuestions.push({
                answerId: formElement.attr('id'),
                answerValue: formElement.find('.js-form-element-value').attr('value')
            });
        });
        return singleAnswerQuestions;
    };

    appendCreateAnotherFormCalculatorBtn = function () {
        const addNewCalculatorBtnId = 'sf-add-new-form-calculator';
        const addNewCalculatorBtnIdentifier = `#${addNewCalculatorBtnId}`;
        let addNewCalculatorBtn = jQuery(addNewCalculatorBtnIdentifier);

        if (!addNewCalculatorBtn.get(0)) {

            const createFormSubmitBtn = jQuery('#sf-create-calculator-form-submit');
            const addNewCalculatorBtnHtml = jQuery(`<button id="${addNewCalculatorBtnId}" type="button">Add Another Calculator</button>`);
            createFormSubmitBtn.before(addNewCalculatorBtnHtml);

            jQuery(addNewCalculatorBtnIdentifier).click(function () {
                const calculatorNameFieldsIdentifier = '.sf-calculator-name';
                const calculatorNameHiddenFields = jQuery(calculatorNameFieldsIdentifier + ':hidden');
                calculatorNameHiddenFields.first().show();
                if (calculatorNameHiddenFields.length < 2) {
                    jQuery(addNewCalculatorBtnIdentifier).remove();
                }
            });
        }
    };

}
