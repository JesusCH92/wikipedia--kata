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
                const textInput = document.querySelector('#text_input');
                const title = document.querySelector('#title');
                const snippet = document.querySelector('#snippet');
                view().paintElementInContainer({
                    element: data['data']['input'],
                    container: textInput,
                });
                view().paintElementInContainer({
                    element: data['data']['title'],
                    container: title,
                });
                view().paintElementInContainer({
                    element: data['data']['snippet'],
                    container: snippet,
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
