<style>
    @keyframes logoGlow {
        from {
            filter: drop-shadow(4px 4px 15px rgb(81, 226, 247));
        }

        50% {
            filter: drop-shadow(4px 4px 45px rgb(81, 226, 247));
        }

        to {
            filter: drop-shadow(4px 4px 15px rgb(81, 226, 247));
        }
    }

    @keyframes zoomInDown {
        0% {
            opacity: 0;
            -webkit-transform: scale3d(.1, .1, .1) translate3d(0, -1000px, 0);
            transform: scale3d(.1, .1, .1) translate3d(0, -1000px, 0);
            -webkit-animation-timing-function: cubic-bezier(.55, .055, .675, .19);
            animation-timing-function: cubic-bezier(.55, .055, .675, .19)
        }

        60% {
            opacity: 1;
            -webkit-transform: scale3d(.475, .475, .475) translate3d(0, 60px, 0);
            transform: scale3d(.475, .475, .475) translate3d(0, 60px, 0);
            -webkit-animation-timing-function: cubic-bezier(.175, .885, .32, 1);
            animation-timing-function: cubic-bezier(.175, .885, .32, 1)
        }
    }

    @keyframes bounceInUp {

        0%,
        60%,
        75%,
        90%,
        to {
            -webkit-animation-timing-function: cubic-bezier(.215, .61, .355, 1);
            animation-timing-function: cubic-bezier(.215, .61, .355, 1)
        }

        0% {
            opacity: 0;
            -webkit-transform: translate3d(0, 3000px, 0) scaleY(5);
            transform: translate3d(0, 3000px, 0) scaleY(5)
        }

        60% {
            opacity: 1;
            -webkit-transform: translate3d(0, -20px, 0) scaleY(.9);
            transform: translate3d(0, -20px, 0) scaleY(.9)
        }

        75% {
            -webkit-transform: translate3d(0, 10px, 0) scaleY(.95);
            transform: translate3d(0, 10px, 0) scaleY(.95)
        }

        90% {
            -webkit-transform: translate3d(0, -5px, 0) scaleY(.985);
            transform: translate3d(0, -5px, 0) scaleY(.985)
        }

        to {
            -webkit-transform: translateZ(0);
            transform: translateZ(0)
        }
    }

    .logo {
        filter: drop-shadow(4px 4px 15px rgb(81, 226, 247));
        user-select: none;
        -webkit-user-drag: none;
    }

    .description {
        opacity: 1;
    }
</style>
<section class="about-section">
    <div class="hero-container min-h-screen flex justify-center items-center flex-col">
        <img src="{{ asset('asset/logo-main.png') }}" alt="logo"
            class="animate__animated animate__bounce logo lg:w-[630px] sm:w-[500px] max-sm:w-[320px] ">
        <p
            class="description lg:w-[760px] lg:text-lg xl:w-[900px] text-justify mt-7 drop-shadow-2xl sm:w-[550px] sm:text-md max-sm:w-[300px] max-sm:text-xs max-sm:leading-6">
            Battle of Minds 2024 merupakan sebuah lomba dengan bentuk kegiatan Numerical Logical Competition yang
            memadukan
            konsep logika matematika dengan permainan yang seru dan menantang untuk mengasah pola pikir siswa siswi
            SMA/SMK.
            Tahun ini, Battle Of Minds 2024 mengangkat tema “Exploring the Depths of Minds” yang memiliki arti seorang
            penjelajah yang sedang mendalami pemahaman akan sesuatu.
        </p>
    </div>
</section>
