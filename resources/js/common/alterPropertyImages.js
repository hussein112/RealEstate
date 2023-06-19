let ids = keys.split(",");

// Handle Deletes
ids.forEach(id => {
    if (id !== '') {
        document.getElementById("delete-" + id).addEventListener("click", () => {
            if (confirm("Are you sure you want to delete image #" + id)) {
                axios.delete(`http://127.0.0.1:8000/delete/images/${id}`, {
                    headers: {
                        'X-CSRF-TOKEN': CSSRF
                    }
                }).then(response => {
                    location.reload();
                }).catch(error => {
                    alert(error);
                });
            }
        });
    }
});

// Handle Updates
ids.forEach(id => {
    if(id !== ''){
        let UPDATE_URL = "http://127.0.0.1:8000/edit/property/" + prop_id + "/" + id;
        document.getElementById('update-image-' + id).addEventListener('change', function(event) {
            console.log(id);
            let file = event.target.files[0];
            let formData = new FormData();
            formData.append('image', file);

            let xhr = new XMLHttpRequest();
            xhr.open('POST', UPDATE_URL);
            xhr.setRequestHeader('X-CSRF-TOKEN', CSSRF);

            xhr.onload = function() {
                console.log(xhr);
                if (xhr.status === 200) {
                    location.reload();
                } else {
                    alert('Error: ' + xhr.status);
                }
            };

            xhr.onerror = function() {
                console.log('Request failed');
                alert('Request failed');
            };

            xhr.send(formData);
        });    }
});

// Handle Inserts
let INSERT_URL = "http://127.0.0.1:8000/add/property/" + prop_id;
document.getElementById('new-image').addEventListener('change', function(event) {
    let file = event.target.files[0];
    let formData = new FormData();
    formData.append('image', file);

    let xhr = new XMLHttpRequest();
    xhr.open('POST', INSERT_URL);
    xhr.setRequestHeader('X-CSRF-TOKEN', CSSRF);

    xhr.onload = function() {
        if (xhr.status === 200) {
            location.reload();
        } else {
            alert('Error: ' + xhr.status);
        }
    };

    xhr.onerror = function() {
        console.log('Request failed');
        alert('Request failed');
    };

    xhr.send(formData);
});
