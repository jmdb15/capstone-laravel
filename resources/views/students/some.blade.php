@include('partials.__header')
    
<style>
    #mid::-webkit-scrollbar{
        display:none;
    }
</style>

    @include('partials.__navbar')
    <button data-popover-target="popover-default">Hover</button>
    <button onclick="simulateHover(this)">Click</button>
    <x-popover />

    <script>
        function simulateHover(e){
            console.log(e)
            e.setAttribute('data-popover-target', 'popover-default');
        }
    </script>
</body>
</html>