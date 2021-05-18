let signInForm = document.getElementById('sign-in-form');
let alertFailed = document.getElementById('alert-danger');

signInForm.onsubmit = async (e) => {
    e.preventDefault();
    // let requestUrl = '../authorization/authorizationRequest.php';

    fetch('../authorization/authorizationRequest.php', {
        method: 'POST',
        body: new FormData(signInForm),
    }).then(function(response) {
        return response.json();
    }).then(function(json) {
        // alert(json);
        console.log(json);
        if (json.result === 'success') {
            location.reload();
        } else {
            let div = document.createElement('div');
            div.className = 'alert alert-danger';
            div.innerHTML = `${json.error}`;
            document.getElementById('form-container').prepend(div);
            console.log(div);
            signInForm.reset();
        }
    })
}