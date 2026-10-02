
  <!-- Bootstrap -->
  <script src="{{ asset('student/vendor/popper.min.js') }}"></script>
  <script src="{{ asset('student/vendor/bootstrap.min.js') }}"></script>

  <!-- Perfect Scrollbar -->
  <script src="{{ asset('student/vendor/perfect-scrollbar.min.js') }}"></script>

  <!-- DOM Factory -->
  <script src="{{ asset('student/vendor/dom-factory.js') }}"></script>

  <!-- MDK -->
  <script src="{{ asset('student/vendor/material-design-kit.js') }}"></script>

  <!-- App JS -->
  <script src="{{ asset('student/js/app.js') }}"></script>

  <!-- Preloader -->
  <script src="{{ asset('student/js/preloader.js') }}"></script>

  <!-- Global Settings -->
  <script src="{{ asset('student/js/settings.js') }}"></script>

  <!-- Flatpickr -->
  <script src="{{ asset('student/vendor/flatpickr/flatpickr.min.js') }}"></script>
  <script src="{{ asset('student/js/flatpickr.js') }}"></script>

  <!-- Moment.js -->
  <script src="{{ asset('student/vendor/moment.min.js') }}"></script>
  <script src="{{ asset('student/vendor/moment-range.js') }}"></script>

  <!-- Chart.js -->
  <!-- <script src="{{ asset('student/vendor/Chart.min.js') }}"></script>
  <script src="{{ asset('student/js/chartjs.js') }}"></script> -->

  <!-- Chart.js Samples -->
  <script src="{{ asset('student/js/page.hr-dashboard.js') }}"></script>

  <!-- List.js -->
  <script src="{{ asset('student/vendor/list.min.js') }}"></script>
  <script src="{{ asset('student/js/list.js') }}"></script>

  <!-- Tables -->
  <script src="{{ asset('student/js/toggle-check-all.js') }}"></script>
  <script src="{{ asset('student/js/check-selected-row.js') }}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js" integrity="sha512-fD9DI5bZwQxOi7MhYWnnNPlvXdp/2Pj3XSTRrFs5FQa4mizyGLnJcN6tuvUS6LbmgN1ut+XGSABKvjN0H6Aoow==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  
     <script>
       
      document.addEventListener("DOMContentLoaded", () => {
    const chatIcon = document.getElementById('chatIcon');
    const chatBoxWrapper = document.getElementById('chatBoxWrapper');
    const closeChat = document.getElementById('closeChat');
    const sendBtn = document.getElementById('sendBtn');
 const messageInput = document.getElementById('message');
    // Debugging: Check if the closeChat element is correctly selected
    console.log(closeChat);  // Ensure it's not null, should log the <svg> or <i> element

    // Check if the closeChat element is available before adding the event listener
    if (closeChat) {
        closeChat.addEventListener('click', (event) => {
            console.log("Close button clicked");

            // Close the chat box with animation
            chatBoxWrapper.classList.remove('show');
            chatBoxWrapper.classList.add('hide');
            setTimeout(() => {
                chatBoxWrapper.style.display = 'none'; // Hide the chat box after animation
            }, 300); // Match animation duration
        });
    }

    // Event listener for opening the chat box
    chatIcon.addEventListener('click', () => {
        chatBoxWrapper.style.display = 'block';
        chatBoxWrapper.classList.remove('hide');
        chatBoxWrapper.classList.add('show');
    });

    // Event listener for send button
    sendBtn.addEventListener('click', () => {
        const message = messageInput.value.trim();
        
        if (!message) {
            Swal.fire({
                icon: 'error',
                title: 'Error!',
                text: 'Please enter a message before sending.',
            });
            return;
        }

        // Show loading state
        const originalBtnText = sendBtn.innerHTML;
        sendBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Sending...';
        sendBtn.disabled = true;

        // Get CSRF token from meta tag
        const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        // Send AJAX request
        $.ajax({
            url: '{{ route("student.send.message") }}',
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': token
            },
            data: {
                message: message
            },
            success: function(response) {
                if (response.success) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Message Sent!',
                        text: 'Your message has been delivered.',
                        timer: 2000,
                        showConfirmButton: false
                    });
                    messageInput.value = ''; // Clear the input
                } else {
                    throw new Error(response.message || 'Something went wrong');
                }
            },
            error: function(xhr) {
                Swal.fire({
                    icon: 'error',
                    title: 'Error!',
                    text: xhr.responseJSON?.message || 'Failed to send message. Please try again.',
                });
            },
            complete: function() {
                // Reset button state
                sendBtn.innerHTML = originalBtnText;
                sendBtn.disabled = false;
            }
        });
    });
});


    </script>
