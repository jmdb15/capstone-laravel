@include('partials.__header')
    
<style>
    #mid::-webkit-scrollbar{
        display:none;
    }
</style>

    @include('partials.__navbar')
    <main class="h-full w-full px-2 max-w-1920 border-2 border-gray-700 flex justify-between fixed md:px-0">
        <div id="left" class="h-[calc(100%-70px)] mt-[70px] min-w-[324px] max-w-[324px] basis-1/4 bg-blue-300 hidden md:block"></div>
        <div id="mid" class="h-[calc(100%-70px)] mt-[70px] bg-yellow-100 overflow-y-scroll basis-full md:basis-2/3 lg:basis-1/2">
            <div class="h-[600px] w-full my-10 bg-gray-400"></div>
            <div class="h-[600px] w-full my-10 bg-gray-400"></div>
            <div class="h-[600px] w-full my-10 bg-gray-400"></div>
        </div>
        <div id="right" class="h-[calc(100%-70px)] mt-[70px] min-w-[324px] max-w-[324px] basis-1/4 bg-blue-300 hidden lg:block"></div>
    </main>

</body>
</html>