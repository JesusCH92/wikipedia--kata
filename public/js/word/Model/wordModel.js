const wordModel = (function ({view}){
    const getWord = function ({query}) {
        const url = `/api/word?q=${query}`;
        fetch(url)
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                console.log(data);
                const resultContainer = document.querySelector('#result_container');
                view().paintElementInContainer({
                    element: data['message'],
                    container: resultContainer,
                });
            })
            .catch(error => {
                console.error('There has been a problem with your fetch operation:', error);
            });
    };

    return {
        getWord: getWord,
    };
});

export default wordModel;
