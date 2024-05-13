<style>
    .maskot-guide {
        /* filter: drop-shadow(0px 0px 10px white); */
        animation: glow 4s infinite;
    }

    @keyframes glow {
        from {
            filter: drop-shadow(0px 0px 1px rgb(120, 142, 255));
        }

        50% {
            filter: drop-shadow(0px 0px 20px rgb(120, 142, 255));
        }

        to {
            filter: drop-shadow(0px 0px 1px rgb(120, 142, 255));
        }

    }
</style>
<section class="guide-section my-24" id="guide">
    <div class="flex justify-center items-center box">
        <h1 class="faq-title mb-6 text text-5xl font-bold text-center leading-normal w-4/5 max-md:text-3xl"
            data-text="GUIDEBOOK">
            GUIDEBOOK</h1>
    </div>
    <div class="flex flex-col justify-center items-center">
        <h1 class="bg-white text-center rounded-xl text-black text-xl py-3 px-5 max-md:text-base">Click Bomby to open the guidebook!</h1>
        <a href='https://bom.petra.ac.id/pdf/Guidebook%20BOM.pdf' target="_blank" class="inline-block">
            <img src="asset/maskot-guidebook.png" alt="Guidebook Mascot" class="maskot-guide h-[500px] max-sm:h-[300px]">
        </a>
    </div>
</section>
