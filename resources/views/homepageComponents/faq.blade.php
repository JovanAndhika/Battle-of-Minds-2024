<style>
    .accordion {
        max-width: 1000px;
        margin: 2rem auto;
    }

    .accordion-item {
        margin: 1rem 0;
        border-radius: 0.5rem;
        box-shadow: 2px 2px 5px 5px rgba(0, 0, 255, 0.35);
    }

    .accordion-item-header {
        padding: 0.5rem 3rem 0.5rem 1rem;
        min-height: 3.5rem;
        line-height: 1.25rem;
        font-weight: bold;
        display: flex;
        align-items: center;
        position: relative;
        cursor: pointer;
        color: white;
    }

    .accordion-item-header::after {
        content: "\25BE";
        font-size: 2rem;
        position: absolute;
        right: 1rem;
        transition: ease .38s;
    }

    .accordion-item-header.active::after {
        rotate: 180deg;
    }

    .accordion-item-body {
        max-height: 0;
        overflow: hidden;
        transition: max-height 0.2s ease-out;
    }

    .accordion-item-body-content {
        padding: 1rem;
        line-height: 1.5rem;
        border-top: 3px solid;
        letter-spacing: 0;
        background-color: transparent !important;
        font-family: 'Geologica', sans-serif;
        /* Ganti dengan gambar atau nilai yang sesuai */
        border-image: linear-gradient(to right, transparent, white, transparent) 1;
    }


    /* .accordion-item-body-content {
        padding: 1rem;
        line-height: 1.5rem;
        border-top: 3px solid;
        letter-spacing: 0;
        background-color: !important;
        font-family: 'Geologica', sans-serif;
        border-image: linear-gradient(to right, transparent, white, transparent) 1;
    } */

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
</style>

<section class="faq-section w-screen flex justify-center items-center flex-col sticky top-16 z-[-1] h-fit" id="faq">
    <div class="flex justify-center items-center h-24 text-3xl font-bold">
        <h1 class="faq-title text text-4xl text-center leading-normal w-4/5 max-md:text-3xl" data-text="Frequently Asked Questions">Frequently Asked Questions</h1>
    </div>
    <div class="accordion w-screen lg:w-4/5 md:w-3/4 sm:w-3/5 max-sm:w-4/5">
        <div class="accordion-item">
            <div class="accordion-item-header sm:text-lg max-sm:text-base">
                Apa itu BoM?
            </div>
            <div class="accordion-item-body">
                <div class="accordion-item-body-content sm:text-lg max-sm:text-base">
                    Web Development broadly refers to the tasks associated with developing functional websites and
                    applications for the Internet. The web development process includes web design, web content
                    development, client-side/server-side scripting and network security configuration, among other
                    tasks.
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <div class="accordion-item-header sm:text-lg max-sm:text-base">
                Siapa saja yang bisa mengikuti kegiatan BoM?
            </div>
            <div class="accordion-item-body">
                <div class="accordion-item-body-content sm:text-lg max-sm:text-base">
                    HTML, aka HyperText Markup Language, is the dominant markup language for creating websites and
                    anything that can be viewed in a web browser.
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <div class="accordion-item-header sm:text-lg max-sm:text-base">
                Question 3
            </div>
            <div class="accordion-item-body">
                <div class="accordion-item-body-content sm:text-lg max-sm:text-base">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit quam, nesciunt rem culpa quos
                    tempora illum distinctio quas sed cumque nulla porro voluptate? Iste consequuntur id, iusto sequi
                    adipisci hic.
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <div class="accordion-item-header sm:text-lg max-sm:text-base">
                Question 4
            </div>
            <div class="accordion-item-body">
                <div class="accordion-item-body-content sm:text-lg max-sm:text-base">
                    HTTP, aka HyperText Transfer Protocol, is the underlying protocol used by the World Wide Web and
                    this protocol defines how messages are formatted and transmitted, and what actions Web servers and
                    browsers should take in response to various commands.
                </div>
                <div class="accordion-item !my-8">
                    <div class="accordion-item-header sm:text-lg max-sm:text-base">
                        Question 4
                    </div>
                    <div class="accordion-item-body">
                        <div class="accordion-item-body-content sm:text-lg max-sm:text-base">
                            HTTP, aka HyperText Transfer Protocol, is the underlying protocol used by the World Wide Web and
                            this protocol defines how messages are formatted and transmitted, and what actions Web servers and
                            browsers should take in response to various commands.
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <div class="accordion-item-header sm:text-lg max-sm:text-base">
                        Question 5
                    </div>
                    <div class="accordion-item-body">
                        <div class="accordion-item-body-content sm:text-lg max-sm:text-base">
                            CORS, aka Cross-Origin Resource Sharing, is a mechanism that enables many resources (e.g. images,
                            stylesheets, scripts, fonts) on a web page to be requested from another domain outside the domain
                            from which the resource originated.
                        </div>
                        <div class="accordion-item !my-8">
                            <div class="accordion-item-header sm:text-lg max-sm:text-base">
                                Question 5
                            </div>
                            <div class="accordion-item-body">
                                <div class="accordion-item-body-content sm:text-lg max-sm:text-base">
                                    CORS, aka Cross-Origin Resource Sharing, is a mechanism that enables many resources (e.g. images,
                                    stylesheets, scripts, fonts) on a web page to be requested from another domain outside the domain
                                    from which the resource originated.
                                </div>
                            </div>
                        </div>
                    </div>
</section>


<script>
    const accordionItemHeaders = document.querySelectorAll(".accordion-item-header");

    accordionItemHeaders.forEach(accordionItemHeader => {
        accordionItemHeader.addEventListener("click", event => {


            const currentlyActiveAccordionItemHeader = document.querySelector(
                ".accordion-item-header.active");
            if (currentlyActiveAccordionItemHeader && currentlyActiveAccordionItemHeader !==
                accordionItemHeader) {
                currentlyActiveAccordionItemHeader.classList.toggle("active");
                currentlyActiveAccordionItemHeader.nextElementSibling.style.maxHeight = 0;
            }

            accordionItemHeader.classList.toggle("active");
            const accordionItemBody = accordionItemHeader.nextElementSibling;
            if (accordionItemHeader.classList.contains("active")) {
                accordionItemBody.style.maxHeight = accordionItemBody.scrollHeight + "px";
            } else {
                accordionItemBody.style.maxHeight = 0;
            }

        });
    });
</script>