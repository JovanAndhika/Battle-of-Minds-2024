<script>
    var now = new Date().getTime();
    var timer = new Date("July 23, 2024 10:43:00").getTime();

    var countdownTime = timer - now;; // misalnya, 60 detik

    function startCountdown() {
        var countdownInterval = setInterval(function() {
            countdownTime--;

            if (countdownTime <= 0) {
                clearInterval(countdownInterval);

                Swal.fire({
                    icon: 'info',
                    title: 'Waktu telah habis !',
                    showConfirmButton: false,
                    timer: 2000
                });

                setTimeout(() => {
                    window.location = '/view'
                }, 2000);
            }

        }, 1000);
    }
</script>