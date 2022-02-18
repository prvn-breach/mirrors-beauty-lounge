module.exports = {
    deleteEmptyKeys: function(data) {
        var query = {};
        for (var key in data) {
            (data[key] !== '') ? query[key] = data[key]: '';
        }
        return query;
    },
    checkFileExist: function(urlToFile) {
        var xhr = new XMLHttpRequest();
        xhr.open('HEAD', urlToFile, false);
        xhr.send();
         
        if (xhr.status == "404") {
            return false;
        } else {
            return true;
        }
    }
}