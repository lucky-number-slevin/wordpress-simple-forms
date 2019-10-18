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

    appendCreateAnotherFormCalculatorBtn() {
        const addNewCalculatorBtnIdentifier = `#${SF_ADD_NEW_FORM_CALCULATOR_ID}`;
        let addNewCalculatorBtn = jQuery(addNewCalculatorBtnIdentifier);

        if (!addNewCalculatorBtn.get(0)) {

            const createFormSubmitBtn = jQuery('#sf-create-calculator-form-submit');
            const addNewCalculatorBtnHtml = jQuery(`<button id="${SF_ADD_NEW_FORM_CALCULATOR_ID}" type="button">Add Another Calculator</button>`);
            createFormSubmitBtn.before(addNewCalculatorBtnHtml);

            jQuery(addNewCalculatorBtnIdentifier).click(function () {
                const calculatorNameHiddenFields = jQuery(`.${SF_CALCULATOR_NAME_CLASS}` + ':hidden');
                calculatorNameHiddenFields.first().show();
                if (calculatorNameHiddenFields.length < 2) {
                    jQuery(addNewCalculatorBtnIdentifier).remove();
                }
            });
        }
    };

    appendBuildFormButton() {
        jQuery(`.${SF_SUCCESS_MESSAGE_CLASS}`).after(jQuery(`<button id="${SF_ADD_NEW_FORM_CALCULATOR_ID}" type="button">Build Form</button>`));
        jQuery(`#${SF_ADD_NEW_FORM_CALCULATOR_ID}`).click(function () {
            // TODO: display/reroute to Build/Edit Form form
        })
    }

    appendMessage(element, message, error = false) {
        let messageClass = SF_SUCCESS_MESSAGE_CLASS;
        if (error) {
            messageClass = SF_ERROR_MESSAGE_CLASS;
        }
        element.after(jQuery(`<div class="${messageClass}">${message}</div>`));
    };

    removeMessages() {
        jQuery(`.${SF_ERROR_MESSAGE_CLASS}`).remove();
        jQuery(`.${SF_SUCCESS_MESSAGE_CLASS}`).remove();
    }

    logHttpErrorMessage(error) {
        console.error(`HTTP Error; Status ${error.status}; Message: "${error.responseJSON}"`);
    }
}
