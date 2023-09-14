<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Api Dukcapil | Daftar</title>


  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="adminlte/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="adminlte/plugins/sweetalert2/sweetalert2.min.css">
  <!-- Toastr -->
  <link rel="stylesheet" href="adminlte/plugins/toastr/toastr.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="adminlte/dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="adminlte/index2.html"><b>DAFTAR</b> Aplikasi</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Pendaftaran User</p>

      <form id="registerForm">
      <div class="input-group mb-3">
          <input type="text" name="nama" id="nama" class="form-control" placeholder="Nama Lengkap">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input name="email" id="email"  class="form-control" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password"  id="password"  class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text" onclick="password_show_hide();">
              <span class="fas fa-eye" id="show_eye"></span>
              <span class="fas fa-eye-slash d-none" id="hide_eye"></span>
              
            </div>
          </div>
        </div>
        
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Daftar</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

     
      <!--
      <p class="mb-1">
        <a href="forgot-password.html">I forgot my password</a>
      </p>
      <p class="mb-0">
        <a href="register.html" class="text-center">Register a new membership</a>
      </p>
      -->
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="adminlte/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="adminlte/dist/js/adminlte.min.js"></script>
<!-- jquery-validation -->
<script src="adminlte/plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="adminlte/plugins/jquery-validation/additional-methods.min.js"></script>
<!-- SweetAlert2 -->
<link rel="stylesheet" href="adminlte/plugins/sweetalert2/sweetalert2.min.css">
<!-- SweetAlert2 -->
<script src="adminlte/plugins/sweetalert2/sweetalert2.min.js"></script>

<script>
$(function () {
  $.validator.setDefaults({
    submitHandler: function () {
      const url ="backend/daftar.php";
      FormData={ 
          nama: $("#nama").val(), 
          email: $("#email").val(), 
          password: $("#password").val(), 
      }
      $.post(url, FormData,function (data, status) {
        if (status === "success" && data == "ok") {
          Swal.fire({
            title: "Selamat",
            text: "Pendaftaran Berhasil",
            icon: "success",
            showCancelButton: false,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Ok",
          }).then((result) => {
            if (result.isConfirmed) {
              window.location.href = "login.php";
            }
          });
        } else {
          Swal.fire("Maaf", "Data tidak ditemukan atau Anda belum melakukan konfirmasi", "error");
        }
      });
    },
  });
  $("#registerForm").validate({
    rules: {
      nama: {
        required: true,
      },
      email: {
        required: true,
        email: true,
      },
      password: {
        required: true,
        minlength: 5,
      },
      terms: {
        required: true,
      },
    },
    messages: {
      nama: {
        required: "namaharus terisi",
      },
      email: {
        required: "alamat email harus terisi",
        email: "Silahkan input alamat email dengan benar",
      },
      password: {
        required: "Password harus terisi",
        minlength: "Password minimal 5 karakter",
      },
      terms: "Please accept our terms",
    },
    errorElement: "span",
    errorPlacement: function (error, element) {
      error.addClass("invalid-feedback");
      element.closest(".form-group").append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass("is-invalid");
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass("is-invalid");
    },
  });
});
function password_show_hide() {
  var x = document.getElementById("password");
  var show_eye = document.getElementById("show_eye");
  var hide_eye = document.getElementById("hide_eye");
  hide_eye.classList.remove("d-none");
  if (x.type === "password") {
    x.type = "text";
    show_eye.style.display = "none";
    hide_eye.style.display = "block";
  } else {
    x.type = "password";
    show_eye.style.display = "block";
    hide_eye.style.display = "none";
  }
}
</script>
</body>
</body>
</html>
