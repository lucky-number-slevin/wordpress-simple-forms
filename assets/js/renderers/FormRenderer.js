class FormRenderer {

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

}
