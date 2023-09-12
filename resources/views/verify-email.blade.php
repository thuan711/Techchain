<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<h3 class="alert alert-info p-2 text-center w-75 mx-auto mt-5">
    Bạn chưa xác thực email. <br>
    Hãy kiểm tra email và nhắp nút xác thực email để hoàn thành đăng ký tài khoản
</h3>
<form action="{{route('verification.send')}}" method="post" class="w-75 mx-auto mt-3 text-center" > @csrf 
<button id="sendEmailBtn" type="submit" class="btn btn-primary p-2"> Gửi lại email xác thực</button>
</form>
<script>
document.addEventListener("DOMContentLoaded", function() {
  const sendEmailBtn = document.getElementById("sendEmailBtn");
  
  // Function to disable the button and prevent multiple clicks
  function disableButton() {
    sendEmailBtn.disabled = true;
    sendEmailBtn.textContent = "Đang xử lý...";
    // Here, you can add code to submit the form or trigger the desired action.
    // For example, you can use AJAX to submit the form to the server.
  }

  // Event listener for the button click
  sendEmailBtn.addEventListener("click", function(event) {
    event.preventDefault(); // Prevent the default form submission behavior
    disableButton();
  });
});
</script>