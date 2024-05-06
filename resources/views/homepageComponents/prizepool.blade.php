<style>
    .podium-text {
        text-align: center;
        padding: 0 2rem;
        display: flex;
        justify-content: center;
        align-items: center;
        align-self: flex-end;
    }

    .rank {
        background: linear-gradient(125deg, rgba(61, 37, 84, 1) 0%, rgba(123, 48, 176, 1) 51%, rgba(120, 27, 55, 1) 100%);
        animation: moveGradient 30s linear infinite;
        box-shadow: 1px 0px 14px 4px rgba(255, 255, 255, 1);
        -webkit-box-shadow: 1px 0px 14px 4px rgba(255, 255, 255, 1);
        -moz-box-shadow: 1px 0px 14px 4px rgba(255, 255, 255, 1);
        padding: 1rem 0;
        font-size: 3.5rem;
    }

    .first {
        text-shadow: 0 0 5px white, 0 0 10px white, 0 0 15px white;
        z-index: 10;
    }

    .second {
        text-shadow: 0 0 5px white, 0 0 10px white;
        z-index: 5;
    }

    .third {
        text-shadow: 0 0 5px white;
        z-index: 5;
    }

    .prize {
        height: 100px;
        font-size: 1.5rem;
        font-family: 'Rowdies', sans-serif;
        background: linear-gradient(180deg, transparent 0%, transparent 20%, rgba(192, 76, 227, 0.9) 100%) !important;
        /* clip-path: polygon(15% 0, 85% 0, 100% 100%, 0 100%); */
        padding-top: 20px;
        box-shadow: none;   
        border-top-left-radius: 80px;
        border-top-right-radius: 80px;
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
</style>

<section class="prize-section h-screen w-screen">
    <div class="flex justify-center items-center py-10">
        <h1 class="font-bold md:text-6xl sm:text-5xl max-sm:text-4xl">PRIZEPOOL</h1>
    </div>
    <div class="flex justify-center">
        <div class="grid grid-rows-2 grid-cols-3">
            <div class="podium-text prize mb-[-50px]">Rp3.000.000</div>
            <div class="podium-text prize">Rp5.000.000</div>
            <div class="podium-text prize mb-[-95px]">Rp2.000.000</div>
            <div class="podium-text second rank h-[150px]">2</div>
            <div class="podium-text first rank h-[200px]">1</div>
            <div class="podium-text third rank h-[105px]">3</div>
        </div>
    </div>
</section>
