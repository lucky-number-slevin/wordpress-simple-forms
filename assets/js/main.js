jQuery(document).ready(function (jQuery) {

    const formRenderer = new FormRenderer();
    formRenderer.appendCreateAnotherFormCalculatorBtn();

    // Add handler on from submission
    jQuery('#sf-create-calculator-form').submit(function (e) {
        e.preventDefault();
        const formHandler = new FormHandler();
        formHandler.handleCreateCalculatorForm(jQuery(this));
    });

});
