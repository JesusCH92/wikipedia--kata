const wordRenderTemplate = (function () {
    const renderElementInContainer = function ({container, element}) {
        container.appendChild(element);
    };

    const paintElementInContainer = function ({container, element}) {
        container.innerHTML = element;
    };

    return {
        renderElementInContainer: renderElementInContainer,
        paintElementInContainer: paintElementInContainer,
    };
});

export default wordRenderTemplate;