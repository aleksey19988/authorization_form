let registrationForm = document.getElementById('registration-form');
const alertSuccess = document.getElementById('alert-success');
const alertFailed = document.getElementById('alert-danger');

registrationForm.onsubmit = async (e) => {
    e.preventDefault();

    fetch('../registration/registrationRequest.php',
        {
            method: 'POST',
            body: new FormData(registrationForm),
        }).then(function(response) {
            return response.json();
        }).then(function(json) {
            if (json.result === 'success') {
                alertSuccess.style.display = 'block';
            } else {
                alertFailed.style.display = 'block';
            }
            registrationForm.reset();
    });
}