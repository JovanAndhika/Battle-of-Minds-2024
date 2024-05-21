<style>
    .prizepool::before {
        content: attr(prizepool-title);
        text-align: left;
        transform: rotateX(-200deg);
        transform-origin: bottom;
        line-height: 90px;
        position: absolute;
        top: 0;
        left: 0;
        background: linear-gradient(to top, white, transparent);
        background-clip: text;
        -webkit-background-clip: text;
        color: transparent;
        opacity: 0.4;
    }
</style>

<section class="prize-section h-screen w-screen">
    <div class="flex justify-center items-center py-10">
        <h1 class="text-6xl font-bold">PRIZEPOOL</h1>
    </div>
    <div class="flex justify-center items-center">
        <h1 class="prizepool text-center font-bold relative font-[Rowdies] 2xl:text-8xl56 xl:text-7xl" prizepool-title="Rp100.000.000++">
            Rp100.000.000++</h1>
    </div>

</section>

<script>
    window.onload = function() {
        var shadowRoot = document.querySelector('spline-viewer').shadowRoot;
        shadowRoot.querySelector('#logo').remove();
    }
</script>
