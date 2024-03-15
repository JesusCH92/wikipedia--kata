const wordController = (function ({input, model}){
    const initEvent = function() {
        input.addEventListener('input', function(event) {
            console.log(event.target.value);
            model.getWord({query: event.target.value});
        });
    };

    return {
        initEvent: initEvent,
    }
});

export default wordController;