<style>
    .timeline {
        grid-template-columns: 340px auto;
        background: linear-gradient(125deg, rgba(61, 37, 84, 0.75) 0%, rgba(123, 48, 176, 0.75) 51%, rgba(120, 27, 55, 0.75) 100%);
        box-shadow: 0px 0px 10px 4px rgba(255, 255, 255, 0.75);
        -webkit-box-shadow: 0px 0px 10px 4px rgba(255, 255, 255, 0.75);
        -moz-box-shadow: 0px 0px 10px 4px rgba(255, 255, 255, 0.75);
    }
    
    .timeline-point {
        box-shadow: 0px 0px 5px 0px white;
        background-color: white;
    }

    .timeline-line {
        border-color: white;
    }

    @media screen and (max-width: 1024px) {
        .timeline {
            grid-template-columns: 250px auto;
        }
    }

    @media screen and (max-width:640px) {
        .timeline {
            grid-template-rows: 50px auto;
            grid-template-columns: none;

        }
    }
</style>
<div class="w-screen flex flex-col justify-center items-center" id="timeline">
    <div class="flex justify-center items-center w-screen">
        <h1 class="faq-title mb-6 text text-5xl font-bold text-center leading-normal w-4/5 max-md:text-3xl"
            data-text="TIMELINE">TIMELINE</h1>
    </div>
    <ol class="timeline-line relative border-s-2 lg:w-[900px] md:w-[600px] sm:w-[600px] max-sm:w-[300px]">
        <li class="mb-10 ms-6">
            <span class="timeline-point absolute flex items-center justify-center w-6 h-6 rounded-full -start-3">
            </span>
            <div class="timeline grid rounded-xl shadow-xl p-4 max-sm:h-fit">
                <div class="datetime flex flex-col justify-center max-sm:h-[50px] max-sm:pb-2">
                    <h1 class="lg:text-2xl md:text-lg text-white font-bold">Technical Meeting 1</h1>
                    <h2 class="lg:text-lg md:text-sm text-white font-bold">19<sup>th</sup> July 2024</h2>
                </div>
                <div class="location row-span-2 flex items-center sm:border-l-2 max-sm:border-t-2 sm:pl-5 max-sm:pt-2">
                    <i class="fa-solid fa-location-dot pr-3 lg:text-2xl md:text-lg max-sm:hidden"></i>
                    <a class="text-white font-bold lg:text-lg flex md:text-sm"
                        href="https://maps.app.goo.gl/4WiVAX6eAcaynNKz7">
                        Online via Google Meet
                    </a>
                </div>
            </div>
        </li>
        <li class="mb-10 ms-6">
            <span class="timeline-point absolute flex items-center justify-center w-6 h-6 rounded-full -start-3">
            </span>
            <div class="timeline grid rounded-xl shadow-xl p-4 max-sm:h-fit">
                <div class="datetime flex flex-col justify-center max-sm:h-[50px] max-sm:pb-2">
                    <h1 class="lg:text-2xl md:text-lg text-white font-bold">Elimination 1</h1>
                    <h2 class="lg:text-lg md:text-sm text-white font-bold">23<sup>rd</sup> July 2024</h2>
                </div>
                <div class="location row-span-2 flex items-center sm:border-l-2 max-sm:border-t-2 sm:pl-5 max-sm:pt-2">
                    <i class="fa-solid fa-location-dot pr-3 lg:text-2xl md:text-lg max-sm:hidden"></i>
                    <a class="text-white font-bold lg:text-lg flex md:text-sm"
                        href="https://maps.app.goo.gl/4WiVAX6eAcaynNKz7">
                        Petra Christian University, T Building
                    </a>
                </div>
            </div>
        </li>
        <li class="mb-10 ms-6">
            <span class="timeline-point absolute flex items-center justify-center w-6 h-6 rounded-full -start-3">
            </span>
            <div class="timeline grid rounded-xl shadow-xl p-4 max-sm:h-fit">
                <div class="datetime flex flex-col justify-center max-sm:h-[50px] max-sm:pb-2">
                    <h1 class="lg:text-2xl md:text-lg text-white font-bold">Technical Meeting 2</h1>
                    <h2 class="lg:text-lg md:text-sm text-white font-bold">25<sup>th</sup> July 2024</h2>
                </div>
                <div class="location row-span-2 flex items-center sm:border-l-2 max-sm:border-t-2 sm:pl-5 max-sm:pt-2">
                    <i class="fa-solid fa-location-dot pr-3 lg:text-2xl md:text-lg max-sm:hidden"></i>
                    <p class="text-white font-bold lg:text-lg flex md:text-sm">
                        Online via Google Meet
                    </p>
                </div>
            </div>
        </li>
        </li>
        <li class="mb-10 ms-6">
            <span class="timeline-point absolute flex items-center justify-center w-6 h-6 rounded-full -start-3">
            </span>
            <div class="timeline grid rounded-xl shadow-xl p-4 max-sm:h-fit">
                <div class="datetime flex flex-col justify-center max-sm:h-[50px] max-sm:pb-2">
                    <h1 class="lg:text-2xl md:text-lg text-white font-bold">Elimination 2</h1>
                    <h2 class="lg:text-lg md:text-sm text-white font-bold">27<sup>th</sup> July 2024</h2>
                </div>
                <div class="location row-span-2 flex items-center sm:border-l-2 max-sm:border-t-2 sm:pl-5 max-sm:pt-2">
                    <i class="fa-solid fa-location-dot pr-3 lg:text-2xl md:text-lg max-sm:hidden"></i>
                    <a class="text-white font-bold lg:text-lg flex md:text-sm"
                        href="https://maps.app.goo.gl/4WiVAX6eAcaynNKz7">
                        Fairway Nine Mall Surabaya
                    </a>
                </div>
            </div>
        </li>
        </li>
        <li class="mb-10 ms-6">
            <span class="timeline-point absolute flex items-center justify-center w-6 h-6 rounded-full -start-3">
            </span>
            <div class="timeline grid rounded-xl shadow-xl p-4 max-sm:h-fit">
                <div class="datetime flex flex-col justify-center max-sm:h-[50px] max-sm:pb-2">
                    <h1 class="lg:text-2xl md:text-lg text-white font-bold">Grand Final</h1>
                    <h2 class="lg:text-lg md:text-sm text-white font-bold">28<sup>th</sup> July 2024</h2>
                </div>
                <div class="location row-span-2 flex items-center sm:border-l-2 max-sm:border-t-2 sm:pl-5 max-sm:pt-2">
                    <i class="fa-solid fa-location-dot pr-3 lg:text-2xl md:text-lg max-sm:hidden"></i>
                    <a class="text-white font-bold lg:text-lg flex md:text-sm"
                        href="https://maps.app.goo.gl/4WiVAX6eAcaynNKz7">
                        Fairway Nine Mall Surabaya
                    </a>
                </div>
            </div>
        </li>
    </ol>
</div>
