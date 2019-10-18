class MessageRendere {

    appendMessage(element, message, error = false) {
        let messageClass = SF_SUCCESS_MESSAGE_CLASS;
        if (error) {
            messageClass = SF_ERROR_MESSAGE_CLASS;
        }
        element.after(jQuery(`<div class="${messageClass}">${message}</div>`));
    };

    removeMessages(identifiers) {
        identifiers.forEach(function (value, index) {
            jQuery(`.${value}`).remove();
            jQuery(`#${value}`).remove();
        });
    }

    logHttpErrorMessage(error) {
        console.error(`HTTP Error; Status ${error.status}; Message: "${error.responseJSON}"`);
        console.error(error);
    }

}
