const wordController = (function ({input, model}){
    const initEvent = function() {
        input.addEventListener('input', function(event) {
            model.getWord({query: event.target.value});
        });
    };

    return {
        initEvent: initEvent,
    }
});

export default wordController;