<style>
    .footer-container {
        background: linear-gradient(360deg, rgba(2, 0, 36, 1) 0%, rgba(9, 9, 121, 1) 49%, rgb(0, 173, 208) 100%);
    }

    #ig-logo {
        background: linear-gradient(45deg, #ffde85 0%, #f7792a 30%, #f7504f 40%, #d82b81 60%, #d82b81 75%, #9536c2 100%);
        background-clip: text;
        -webkit-background-clip: text !important;
        color: transparent;
        margin-left: 2.5px;
    }

    .contacts {
        background: linear-gradient(180deg, transparent 0%, transparent 49%, rgb(255, 255, 255) 100%) !important;
        transition: .3s ease;
        /* animation: digital 2.5s linear infinite; */
    }

    .contacts:hover {
        box-shadow: 0px -28px 15px 0px rgba(255, 255, 255, 1) inset;
        border-top: 1.8px solid rgba(255, 255, 255, 1);
    }

    .contacts i {
        animation: flying 2.5s linear infinite;
    }

    .contact-text {
        font-family: 'Geologica', sans-serif;
    }

    #line-logo {
        margin-left: 2px;
    }

    #tiktok-logo {
        text-shadow: 2px 2px 1px rgb(253, 85, 85), -2px -2px 1px rgb(99, 213, 252);
        margin-left: 5px;
    }

    #whatsapp-logo {
        color: rgba(7, 94, 84);
        margin-left: 5px;
        /* font-weight: bold; */
    }

    @keyframes digital {
        from {
            background-position: bottom;
        }

        to {
            background-position: top;
        }
    }

    @keyframes flying {
        from {
            transform: translateY(4.5px);
        }

        50% {
            transform: translateY(-4px);
        }

        to {
            transform: translateY(4.5px);
        }
    }

    @media not all and (min-width: 768px) {
        .logo-univ {
            grid-row: 3;
        }

        .container-sosmed {
            grid-row: 4;
        }
    }

    #reglCanvas {
        /* background: linear-gradient(125deg, rgb(44, 18, 67) 0%, rgb(44, 7, 70) 51%, rgb(46, 11, 92) 100%); */
        background: darkslateblue;

    }
</style>
<section class="footer-section z-10">
    <canvas class="h-[730px] w-screen z-10 absolute" id="reglCanvas"></canvas>
    <div class="footer-grid-layout py-10 lg:px-32 lg:pr-16 md:pr-10 md:px-24 h-[730px] w-screen grid grid-cols-2 grid-rows-2 max-lg:grid-rows-3 max-md:grid-rows-4 max-md:grid-cols-1
            max-md:px-0 max-md:py-10 absolute z-20"
        id="footer">
        <h1
            class="footer-title font-bold text-5xl w-[480px] max-lg:text-4xl max-lg:w-96 max-lg:col-span-2 max-md:col-span-1
                max-md:text-3xl max-md:w-[300px] max-md:justify-self-center sm:leading-normal max-sm:leading-normal max-md:text-center">
            Are you ready to compete in the Battle of Minds?</h1>
        <div
            class="justify-self-end self-center max-lg:col-span-2 max-lg:justify-self-start max-md:col-span-1 max-md:justify-self-center">
        </div>
        <ul
            class="container-sosmed list-none flex flex-col justify-center items-center justify-self-start self-end pb-0 max-lg:col-span-1
                max-md:justify-self-center max-md:pb-0">
            <li class="font-bold text-3xl text-center w-60 py-1 max-md:text-2xl">Contact Us</li>
            <div class="grid grid-cols-4">
                <li class="py-3 flex w-20 justify-center items-center">
                    <a data-tooltip-target="line" data-tooltip-placement="bottom"
                        href="https://line.me/R/ti/p/@639vlaiy?oat_content=url"
                        class="contacts rounded-xl w-14 h-16 text-[#4cc764] text-4xl p-5 text-center flex justify-center items-center">
                        <i class="fa-brands fa-line" id="line-logo"></i>
                    </a>
                    <div id="line" role="tooltip"
                        class="contact-text absolute z-101 invisible font-bold inline-block px-3 py-2 text-sm bg-white text-blue-800 rounded-lg shadow-sm opacity-0 tooltip">
                        @612dapw
                        <div class="tooltip-arrow" data-popper-arrow></div>
                    </div>
                </li>
                <li class="py-3 flex w-20 justify-center items-center">
                    <a data-tooltip-target="instagram" data-tooltip-placement="bottom"
                        href="https://www.instagram.com/battleofminds.pcu?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw=="
                        class="contacts rounded-xl w-14 h-16 text-4xl p-5 text-center flex justify-center items-center">
                        <i class="fa-brands fa-instagram" id="ig-logo"></i></a>
                    <div id="instagram" role="tooltip"
                        class="contact-text absolute z-10 invisible font-bold inline-block px-3 py-2 text-sm bg-white text-blue-800 rounded-lg shadow-sm opacity-0 tooltip">
                        @BOMPetra
                        <div class="tooltip-arrow" data-popper-arrow></div>
                    </div>
                </li>
                <li class="py-3 flex w-20 justify-center items-center">
                    <a data-tooltip-target="tiktok" data-tooltip-placement="bottom" href="https://www.tiktok.com/@battleofminds.pcu?_t=8mFwGVqUy2r&_r=1"
                        class="contacts rounded-xl w-14 h-16 text-black text-4xl p-5 text-center flex justify-center items-center">
                        <i class="fa-brands fa-tiktok" id="tiktok-logo"></i></a>
                    <div id="tiktok" role="tooltip"
                        class="contact-text absolute z-10 invisible font-bold inline-block px-3 py-2 text-sm bg-white text-blue-800 rounded-lg shadow-sm opacity-0 tooltip">
                        @BoMPetra
                        <div class="tooltip-arrow" data-popper-arrow></div>
                    </div>
                </li>
                <li class="py-3 flex w-20 justify-center items-center">
                    <a data-tooltip-target="whatsapp" data-tooltip-placement="bottom" href="https://wa.me/628991706114"
                        class="contacts rounded-xl w-14 h-16 text-black text-4xl p-5 text-center flex justify-center items-center">
                        <i class="fa-brands fa-whatsapp" id="whatsapp-logo"></i></a>
                    <div id="whatsapp" role="tooltip"
                        class="contact-text absolute z-10 invisible font-bold inline-block px-3 py-2 text-sm bg-white text-blue-800 rounded-lg shadow-sm opacity-0 tooltip">
                        08991706114 (Michelle)
                        <div class="tooltip-arrow" data-popper-arrow></div>
                    </div>
                </li>
            </div>
        </ul>
        <div
            class="logo-univ justify-self-end self-end pb-1 xl:w-[600px] md:w-[400px] max-md:w-[280px] max-md:justify-self-center">
            <img class="xl:w-[600px] md:w-[400px] max-sm:w-[280px]" src="{{ asset('asset/sc-bom-white.png') }}"
                alt="LogoSC">
        </div>
    </div>
</section>
