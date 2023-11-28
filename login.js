function validateLoginForm() {
  
  var name = document.getElementById('username').value;
  var password = document.getElementById('password').value;

  if (name === '' || password === '') {
      alert('Please fill in all fields');
  } else {
      login();
  }
}

function login() {
  var formData = $('#loginForm').serialize();

  $.ajax({
      type: 'POST',
      url: 'login.php',
      data: formData,
      success: function(response) {
          $('#loginResponse').html(response);
      }
  });
}


document.getElementById("login").addEventListener("change", function() {
  document.getElementById("login-link").click();
});

document.getElementById("signup").addEventListener("change", function() {
  document.getElementById("signup-link").click();
});
