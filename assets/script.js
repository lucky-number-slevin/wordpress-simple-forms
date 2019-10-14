jQuery(document).ready(function ($) {

    const createFormId = 'sp-create-form';
    $("#sp-create-form").submit(function(e) {
        e.preventDefault();
        const form = $(this);

        const formElements = $(`#${createFormId} .js-form-element`);

        formElements.each(function (index, value) {
            // TODO: check if form element has a particular class and extract value accordingly
        });

        console.log(formElements);

        const url = form.attr('action');

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
