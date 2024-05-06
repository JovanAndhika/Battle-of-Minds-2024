<style>
    .text {
        position: relative;
        color: #fff;
        font-weight: 700;
        letter-spacing: 2px;
        text-transform: uppercase;
    }

    .text:before,
    .text:after {
        color: white;
        content: attr(data-text);
        position: absolute;
        width: 100%;
        height: 100%;
        background: none;
        overflow: hidden;
        top: 0;
    }

    .text:before {
        left: 2px;
        text-shadow: -2px 0 blue;
        animation: glitch-1 5s linear infinite reverse;
    }

    .text:after {
        left: -2px;
        text-shadow: -2px 0 blue;
        animation: glitch-2 5s linear infinite reverse;
    }

    @keyframes glitch-1 {
        0% {
            clip: rect(132px, auto, 101px, 30px);
        }

        5% {
            clip: rect(17px, auto, 94px, 30px);
        }

        10% {
            clip: rect(40px, auto, 66px, 30px);
        }

        15% {
            clip: rect(87px, auto, 82px, 30px);
        }

        20% {
            clip: rect(137px, auto, 61px, 30px);
        }

        25% {
            clip: rect(34px, auto, 14px, 30px);
        }

        30% {
            clip: rect(133px, auto, 74px, 30px);
        }

        35% {
            clip: rect(76px, auto, 107px, 30px);
        }

        40% {
            clip: rect(59px, auto, 130px, 30px);
        }

        45% {
            clip: rect(29px, auto, 84px, 30px);
        }

        50% {
            clip: rect(22px, auto, 67px, 30px);
        }

        55% {
            clip: rect(67px, auto, 62px, 30px);
        }

        60% {
            clip: rect(10px, auto, 105px, 30px);
        }

        65% {
            clip: rect(78px, auto, 115px, 30px);
        }

        70% {
            clip: rect(105px, auto, 13px, 30px);
        }

        75% {
            clip: rect(15px, auto, 75px, 30px);
        }

        80% {
            clip: rect(66px, auto, 39px, 30px);
        }

        85% {
            clip: rect(133px, auto, 73px, 30px);
        }

        90% {
            clip: rect(36px, auto, 128px, 30px);
        }

        95% {
            clip: rect(68px, auto, 103px, 30px);
        }

        100% {
            clip: rect(14px, auto, 100px, 30px);
        }
    }

    @keyframes glitch-2 {
        0% {
            clip: rect(129px, auto, 36px, 30px);
        }

        5% {
            clip: rect(36px, auto, 4px, 30px);
        }

        10% {
            clip: rect(85px, auto, 66px, 30px);
        }

        15% {
            clip: rect(91px, auto, 91px, 30px);
        }

        20% {
            clip: rect(148px, auto, 138px, 30px);
        }

        25% {
            clip: rect(38px, auto, 122px, 30px);
        }

        30% {
            clip: rect(69px, auto, 54px, 30px);
        }

        35% {
            clip: rect(98px, auto, 71px, 30px);
        }

        40% {
            clip: rect(146px, auto, 34px, 30px);
        }

        45% {
            clip: rect(134px, auto, 43px, 30px);
        }

        50% {
            clip: rect(102px, auto, 80px, 30px);
        }

        55% {
            clip: rect(119px, auto, 44px, 30px);
        }

        60% {
            clip: rect(106px, auto, 99px, 30px);
        }

        65% {
            clip: rect(141px, auto, 74px, 30px);
        }

        70% {
            clip: rect(20px, auto, 78px, 30px);
        }

        75% {
            clip: rect(133px, auto, 79px, 30px);
        }

        80% {
            clip: rect(78px, auto, 52px, 30px);
        }

        85% {
            clip: rect(35px, auto, 39px, 30px);
        }

        90% {
            clip: rect(67px, auto, 70px, 30px);
        }

        95% {
            clip: rect(71px, auto, 103px, 30px);
        }

        100% {
            clip: rect(83px, auto, 40px, 30px);
        }
    }

    .chats {
        grid-template-rows: auto 422px auto;
    }

    .chat {
        font-family: 'Geologica', sans-serif;
        letter-spacing: 0;
    }

    .chat-header,
    .chat-footer {
        background-color: rgb(117, 52, 147);
    }

    .user-chat {
        background-color: rgba(155, 64, 173, 0.7);
    }

</style>

<section class="faq-section w-screen flex justify-center items-center flex-col sticky top-16 z-[-1] h-fit" id="faq">
    <div class="flex justify-center items-center h-24 text-3xl font-bold">
        <h1 class="faq-title text text-5xl text-center leading-normal w-4/5 max-md:text-3xl"
            data-text="Frequently Asked Questions">Frequently Asked Questions</h1>
    </div>

    <div class="chats grid sm:w-[380px] max-sm:w-[310px] h-[550px] bg-gray-200 my-10 rounded-3xl overflow-hidden">
        <div class="chat-header w-full h-[70px] rounded-t-2xl flex justify-start items-center">
            <img src="{{ asset('asset/bomby_profile.png') }}" alt="faq-maskot"
                class="rounded-full h-11 bg-yellow-400 mx-4">
            <p class="text-lg font-bold">Bomby</p>
        </div>
        <div class="chat-section overflow-y-scroll overflow-x-hidden">
            <div class="bombyAnswer flex">
                <img src="{{ asset('asset/bomby_profile.png') }}" alt="faq-maskot"
                    class="rounded-full h-8 bg-yellow-400 ml-4 mr-3">
                <p
                    class="chat overflow-visible text-black sm:text-base max-sm:text-sm sm:w-[250px] max-sm:w-[200px] px-3 py-2
                bg-white rounded-tr-2xl rounded-br-2xl rounded-bl-2xl my-5">
                    Halooo 😁, perkenalkan namaku Bomby. Aku akan menjawab pertanyaan kalian seputar acara Battle of
                    Minds.
                </p>
            </div>
        </div>

        <div class="chat-footer w-full h-[58px] rounded-b-2xl flex justify-between place-self-end items-center">
            <p class="ml-5 font-bold max-sm:text-xs">Choose your question here</p>
            <div class="flex items-center h-full" data-twe-dropdown-position="dropup">
                <i class="fa-regular fa-comment-dots mx-5 text-2xl hover:cursor-pointer" type="button"
                    id="dropdownMenuButton1" data-twe-dropdown-toggle-ref aria-expanded="false" data-twe-ripple-init
                    data-twe-ripple-color="light">
                </i>
                <ul class="absolute z-[1000] float-left m-0 hidden min-w-max h-[180px] overflow-y-scroll list-none overflow-hidden rounded-lg border-none bg-white bg-clip-padding text-base shadow-lg data-[twe-dropdown-show]:block"
                    aria-labelledby="dropdownMenuButton1" data-twe-dropdown-menu-ref>
                    <li>
                        <p class="question w-[400px] block border-b-2 border-purple-500 bg-white px-4 py-2 text-sm text-purple-800 font-bold hover:bg-zinc-200/60 focus:bg-zinc-200/60 focus:outline-none active:bg-zinc-200/60 active:no-underline hover:cursor-pointer"
                            href="#" data-twe-dropdown-item-ref question-code="0">Apa itu Battle of Minds (BoM)?
                        </p>
                    </li>
                    <li>
                        <p class="question w-[400px] block border-b-2 border-purple-500 bg-white px-4 py-2 text-sm text-purple-800 font-bold hover:bg-zinc-200/60 focus:bg-zinc-200/60 focus:outline-none active:bg-zinc-200/60 active:no-underline hover:cursor-pointer"
                            href="#" data-twe-dropdown-item-ref question-code="1">Ada berapa babak dalam acara
                            BoM?</p>
                    </li>
                    <li>
                        <p class="question w-[400px] block border-b-2 border-purple-500 bg-white px-4 py-2 text-sm text-purple-800 font-bold hover:bg-zinc-200/60 focus:bg-zinc-200/60 focus:outline-none active:bg-zinc-200/60 active:no-underline hover:cursor-pointer"
                            href="#" data-twe-dropdown-item-ref question-code="2">BoM diadakan secara
                            onsite/online?</p>
                    </li>
                    <li>
                        <p class="question w-[400px] block border-b-2 border-purple-500 bg-white px-4 py-2 text-sm text-purple-800 font-bold hover:bg-zinc-200/60 focus:bg-zinc-200/60 focus:outline-none active:bg-zinc-200/60 active:no-underline hover:cursor-pointer"
                            href="#" data-twe-dropdown-item-ref question-code="3">Siapa saja yang boleh mendaftar
                            BoM?</p>
                    </li>
                    <li>
                        <p class="question w-[400px] block border-b-2 border-purple-500 bg-white px-4 py-2 text-sm text-purple-800 font-bold hover:bg-zinc-200/60 focus:bg-zinc-200/60 focus:outline-none active:bg-zinc-200/60 active:no-underline hover:cursor-pointer"
                            href="#" data-twe-dropdown-item-ref question-code="4">Apakah satu orang bisa mendaftar
                            lebih dari satu tim?</p>
                    </li>
                    <li>
                        <p class="question w-[400px] block border-b-2 border-purple-500 bg-white px-4 py-2 text-sm text-purple-800 font-bold hover:bg-zinc-200/60 focus:bg-zinc-200/60 focus:outline-none active:bg-zinc-200/60 active:no-underline hover:cursor-pointer"
                            href="#" data-twe-dropdown-item-ref question-code="5">Berapa biaya pendaftaran BoM?
                        </p>
                    </li>
                    <li>
                        <p class="question w-[400px] block border-b-2 border-purple-500 bg-white px-4 py-2 text-sm text-purple-800 font-bold hover:bg-zinc-200/60 focus:bg-zinc-200/60 focus:outline-none active:bg-zinc-200/60 active:no-underline hover:cursor-pointer"
                            href="#" data-twe-dropdown-item-ref question-code="6">Bagaimana proses validasi
                            pembayaran?</p>
                    </li>
                    <li>
                        <p class="question w-[400px] block border-b-2 border-purple-500 bg-white px-4 py-2 text-sm text-purple-800 font-bold hover:bg-zinc-200/60 focus:bg-zinc-200/60 focus:outline-none active:bg-zinc-200/60 active:no-underline hover:cursor-pointer"
                            href="#" data-twe-dropdown-item-ref question-code="7">Apabila tim tidak dapat hadir
                            pada hari - h acara apa konsekuensinya?</p>
                    </li>
                    <li>
                        <p class="question w-[400px] block border-b-2 border-purple-500 bg-white px-4 py-2 text-sm text-purple-800 font-bold hover:bg-zinc-200/60 focus:bg-zinc-200/60 focus:outline-none active:bg-zinc-200/60 active:no-underline hover:cursor-pointer"
                            href="#" data-twe-dropdown-item-ref question-code="8">Apakah peserta akan mendapatkan
                            konsumsi?</p>
                    </li>
                    <li>
                        <p class="question w-[400px] block border-b-2 border-purple-500 bg-white px-4 py-2 text-sm text-purple-800 font-bold hover:bg-zinc-200/60 focus:bg-zinc-200/60 focus:outline-none active:bg-zinc-200/60 active:no-underline hover:cursor-pointer"
                            href="#" data-twe-dropdown-item-ref question-code="9">Apakah acara ini menyediakan
                            transportasi untuk peserta?</p>
                    </li>
                </ul>
            </div>
        </div>
    </div>

</section>

<script>
    const chatSection = document.querySelector('.chat-section');

    const answerArray = [
        'Battle of Minds adalah lomba yang memadukan konsep logika matematika dengan permainan yang seru dan menantang di bidang Science, Technology, Engineering, and Math.',
        'Lomba ini terdiri dari tiga babak, yakni dua babak eliminasi dan satu babak final. Untuk mendapatkan informasi lebih rinci, akan diadakan TM 1 untuk babak pertama dan TM 2 untuk babak kedua.',
        'Setiap peserta yang mengikuti kompetisi Battle of Minds diwajibkan hadir secara ONSITE, di Petra Christian University untuk babak 1. Lalu, untuk babak 2 dan babak final akan dilakukan ONSITE di Fairway Nine Mall Surabaya',
        'Pendaftar yang boleh mengikuti lomba Battle Of Minds 2024 adalah siswa/i SMA/SMK di Indonesia',
        'Tidak, setiap peserta tidak boleh mewakili lebih dari 1 tim.',
        'FREE!! Namun peserta diwajibkan deposit sebesar Rp200.000 yang dibayarkan melalui Rekening BCA 2981104724 A.n/ MARCELINUS ANTHONY TEGUH, dan memberikan kode 1 pada akhir nominal seperti: 200.001 dan memberikan keterangan berita acara: BOM24-(namatim) contoh: BOM24-timhore',
        'Setelah pendaftaran melalui website telah berhasil, panitia akan memberikan email konfirmasi dalam waktu 1 x 24 jam bahwa pendaftaran kalian tervalidasi.',
        'Sayang sekali jika ada tim yang tidak hadir pada hari-h acara, maka tim tersebut akan didiskualifikasi dan uang tidak akan dikembalikan 🥲🥲',
        'Tenang aja, setiap peserta akan mendapatkan konsumsi kok 🥰🍴',
        'Sayang sekali, tetapi pihak Battle of Minds tidak menyediakan fasilitas transportasi untuk peserta 😔😔'

    ]

    var replyUser = function(answer) {
        const bombyResponse = document.createElement('div');
        bombyResponse.classList.add('bombyAnswer', 'pt-4', 'flex');

        const bombyProfile = document.createElement('img');
        bombyProfile.src = 'asset/bomby_profile.png';
        bombyProfile.alt = 'faq-maskot';
        bombyProfile.classList.add('rounded-full', 'h-8', 'bg-yellow-400', 'ml-4', 'mr-3');

        const replyText = document.createElement('p');
        replyText.classList.add('chat', 'overflow-visible', 'text-black', 'sm:text-base', 'max-sm:text-sm', 'sm:w-[250px]', 'max-sm:w-[200px]', 'px-3', 'py-2',
            'bg-white', 'rounded-tr-2xl', 'rounded-br-2xl', 'rounded-bl-2xl', 'my-5');
        replyText.textContent = answer;

        bombyResponse.appendChild(bombyProfile);
        bombyResponse.appendChild(replyText);

        chatSection.appendChild(bombyResponse);
    }

    function makeChat(e) {
        var questionText = e.currentTarget.innerHTML;
        var questionCode = e.currentTarget.getAttribute('question-code');

        const userChat = document.createElement('div');
        userChat.classList.add('userAnswer', 'pt-5', 'flex', 'justify-end');
        const textChat = document.createElement('p');
        textChat.classList.add('chat', 'user-chat', 'overflow-visible', 'text-white', 'sm:text-base','max-sm:text-sm', 'px-3', 'py-2',
            'backdrop-opacity-80', 'rounded-tr-2xl', 'rounded-bl-2xl', 'rounded-tl-2xl', 'mr-4', 'sm:w-[250px]','max-sm:w-[200px]');
        textChat.textContent = questionText;

        userChat.appendChild(textChat);
        chatSection.appendChild(userChat);
        chatSection.scrollTop = chatSection.scrollHeight;

        setTimeout(function() {
            replyUser(answerArray[questionCode]);
            chatSection.scrollTop = chatSection.scrollHeight;
        }, 1000);
    }

    document.querySelectorAll('.question').forEach(item => {
        item.addEventListener('click', makeChat);
    });
</script>
