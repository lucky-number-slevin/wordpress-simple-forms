jQuery(document).ready(function ($) {

    const createFormId = 'sp-create-form';
    $("#sp-create-form").submit(function (e) {
        e.preventDefault();
        const form = $(this);

        // Process all form group elements (select, checkbox group, etc.)
        const multipleAnswerQuestions = [];
        form.children('.js-form-group').each(function (index, value) {
            const groupElement = $(this);
            groupElement.find('.js-form-group-option').each(function (index, value) {
                const option = $(this);
                const optionId = option.attr('value');
                const isSelected = option.is(':checked');
                multipleAnswerQuestions.push({optionId: optionId, isSelected: isSelected});
            })
        });
        console.log('MULTIPLE ANSWER QUESTIONS ', multipleAnswerQuestions); // TODO: REMOVE

        // Process all form elements with a single value (e.g. text input)
        const singleAnswerQuestions = [];
        form.children('.js-form-element').each(function (index, value) {
            const formElement = $(this);
            singleAnswerQuestions.push({
                answerId: formElement.attr('id'),
                answerValue: formElement.find('.js-form-element-value').attr('value')});
        });
        console.log('MULTIPLE ANSWER QUESTIONS', singleAnswerQuestions); // TODO: REMOVE

        // $.ajax({
        //     type: "POST",
        //     url: url,
        //     data: form.serialize(), // serializes the form's elements.
        //     success: function(data)
        //     {
        //         alert(data); // show response from the php script.
        //     }
        // });

    });

});
