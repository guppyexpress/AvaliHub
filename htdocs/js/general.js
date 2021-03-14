function makeRestCall(method, url, successFunction, data = null) {
    const xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4) {
            if (xhr.status === 200 || xhr.status === 201) {
                successFunction();
            } else if (xhr.status === 401) {
                alert('');
            } else if (xhr.status === 404) {
                alert('');
            } else {
                alert('');
            }

            if (!(xhr.status === 200 || xhr.status === 201)) {
                console.error(method, url, xhr.responseText);
            }
        }
    }

    xhr.open(method, `/api${url}`, true);

    xhr.send(data);

    return xhr;
}