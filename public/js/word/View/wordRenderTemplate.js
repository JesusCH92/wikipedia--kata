const wordRenderTemplate = (function () {
    const renderElementInContainer = function ({container, element}) {
        container.appendChild(element);
    };

    const paintElementInContainer = function ({container, element}) {
        container.innerHTML = element;
    };

    const paintPLainTextInContainer = function ({container, element}) {
        container.textContent = element;
    };

    return {
        renderElementInContainer: renderElementInContainer,
        paintElementInContainer: paintElementInContainer,
        paintPLainTextInContainer: paintPLainTextInContainer,
    };
});

export default wordRenderTemplate;