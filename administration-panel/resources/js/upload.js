window.handleUpload = function(url, file, callback) {

    var request = new XMLHttpRequest();

    request.open("POST", url);

    var formData = new FormData();
    formData.append('logo', file);
    request.send(formData);

    request.onreadystatechange = function () {
        if (request.readyState === 4) {
            if (request.status === 200) {
                var response = JSON.parse(request.responseText);
                callback.response(response);
            }
        }
    };

};

window.handleDelete = function(url, path) {

    var request = new XMLHttpRequest();

    request.open("POST", url);

    var formData = new FormData();
    formData.append('file_path', path);
    formData.append('_method', 'DELETE');
    request.send(formData);

    request.onreadystatechange = function () {
        if (request.readyState === 4) {
            if (request.status === 200) {
                var response = JSON.parse(request.responseText);
                console.log(response);
            }
        }
    };

};
