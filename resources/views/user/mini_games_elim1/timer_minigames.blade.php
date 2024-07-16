<script>
        var now = new Date().getTime();
        var timer = new Date("July 23, 2024 10:43:00").getTime();

        var countdownTime = timer - now;; // misalnya, 60 detik

        window.onload = function() {
            startCountdown();
        };

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

                displayTime();
            }, 1000);
        }


        function displayTime() {
            var hours = Math.floor(countdownTime / (1000 * 60 * 60));
            var minutes = Math.floor((countdownTime % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((countdownTime % (1000 * 60)) / 1000);

            // Perbarui countdownTime setelah menghitung kembali jam, menit, dan detik
            countdownTime = hours * (1000 * 60 * 60) + minutes * (1000 * 60) + seconds * 1000;

            var timerDisplay = document.getElementById("timer");
            timerDisplay.innerHTML = (hours < 10 ? "0" : "") + hours + ":" +
                (minutes < 10 ? "0" : "") + minutes + ":" +
                (seconds < 10 ? "0" : "") + seconds;
        }
    </script>