<style>
    .rank {
        background: linear-gradient(125deg, rgba(61, 37, 84, 0.75) 0%, rgba(123, 48, 176, 0.75) 51%, rgba(120, 27, 55, 0.75) 100%);
        box-shadow: 1px 0px 7px 4px rgba(255, 255, 255, 1);
        -webkit-box-shadow: 1px 0px 7px 4px rgba(255, 255, 255, 1);
        -moz-box-shadow: 1px 0px 7px 4px rgba(255, 255, 255, 1);
        grid-template-columns: 110px auto;
    }

    .placement {
        background: linear-gradient(125deg, rgba(61, 37, 84, 1) 0%, rgba(123, 48, 176, 1) 51%, rgba(120, 27, 55, 1) 100%);
        font-family: 'Rowdies', sans-serif;
        text-shadow: 0px 0px 30px rgba(255, 255, 255, 1);
    }

    .prize-text {
        font-family: 'Rowdies', sans-serif;

    }

    .prize-line {
        box-shadow: 0px 0px 2px 2px rgba(255, 255, 255, 1);
        -webkit-box-shadow: 0px 0px 2px 2px rgba(255, 255, 255, 1);
        -moz-box-shadow: 0px 0px 2px 2px rgba(255, 255, 255, 1);
    }

    @media screen and (max-width:640px){
        .rank{
            grid-template-columns: 80px auto;
        }

        .prize-line {
        box-shadow: 0px 0px 1px 1px rgba(255, 255, 255, 1);
        -webkit-box-shadow: 0px 0px 1px 1px rgba(255, 255, 255, 1);
        -moz-box-shadow: 0px 0px 1px 1px rgba(255, 255, 255, 1);
    }
    }
</style>

<section class="prize-section h-[550px] w-screen">
    <div class="flex justify-center items-center py-10">
        <h1 class="font-bold md:text-6xl sm:text-5xl max-sm:text-4xl">PRIZEPOOL</h1>
    </div>
    <div class="flex justify-center items-center">
        <div class="grid grid-rows-3">
            <div class="rank grid rounded-2xl w-[450px] my-4 h-[90px] max-sm:w-[300px] max-sm:h-[70px]">
                <p
                    class="first placement text-2xl max-sm:text-lg text-center flex items-center 
                    justify-center w-[90px] max-sm:w-[70px] rounded-tl-2xl rounded-bl-2xl max-sm:h-[70px]">
                    1st</p>
                <div class="flex justify-center items-start flex-col">
                    <p class="text-2xl max-sm:text-xl prize-text my-1">Rp5.000.000</p>
                    <hr class="prize-line w-11/12">
                    <p class="text-base max-sm:text-xs prize-text py-1">Trophy + E-Certificate</p>
                </div>
            </div>
            <div class="rank grid rounded-2xl w-[450px] my-4 h-[90px] max-sm:w-[300px] max-sm:h-[70px]">
                <p
                    class="second placement text-2xl max-sm:text-lg text-center flex items-center 
                    justify-center w-[90px] max-sm:w-[70px] rounded-tl-2xl rounded-bl-2xl max-sm:h-[70px]">
                    2nd</p>
                <div class="flex justify-center items-start flex-col">
                    <p class="text-2xl max-sm:text-xl prize-text my-1">Rp3.000.000</p>
                    <hr class="prize-line w-11/12">
                    <p class="text-base max-sm:text-xs prize-text py-1">Trophy + E-Certificate</p>
                </div>
            </div>
            <div class="rank grid rounded-2xl w-[450px] my-4 h-[90px] max-sm:w-[300px] max-sm:h-[70px]">
                <p
                    class="third placement text-2xl max-sm:text-lg text-center flex items-center 
                    justify-center w-[90px] max-sm:w-[70px] rounded-tl-2xl rounded-bl-2xl max-sm:h-[70px]">
                    3rd</p>
                <div class="flex justify-center items-start flex-col">
                    <p class="text-2xl max-sm:text-xl prize-text my-1">Rp2.000.000</p>
                    <hr class="prize-line w-11/12">
                    <p class="text-base max-sm:text-xs prize-text py-1">Trophy + E-Certificate</p>
                </div>
            </div>
        </div>
    </div>
</section>
