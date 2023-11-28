function validateForm() {
    
    var name = document.getElementById('Name').value;
    var email = document.getElementById('Email').value;
    var password = document.getElementById('Password').value;
    var confirm =document.getElementById('Confirm').value;
    
    if (name === '' || email === '' || password === '' || confirm === '') {
        alert('Please fill in all fields');
    } else {
        signUp();
    }
}

function signUp() {
    var formData = $('#signupForm').serialize();

    $.ajax({
        type: 'POST',
        url: 'register.php',
        data: formData,
        success: function(response) {
            $('#response').html(response);
        }
    });
}
