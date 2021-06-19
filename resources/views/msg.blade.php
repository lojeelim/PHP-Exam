<div id="fadeout">
@if(session('message'))
    <div class="text-green-600">
        <span class="flex p-2 rounded-lg bg-green-500 text-white block">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            {{session('message')}}
        </span>

    </div>
@endif
</div>

<script>
    window.onload = function() {
        window.setTimeout(fadeout, 2000);
    }

    function fadeout() {
        document.getElementById('fadeout').style.opacity = '0';
    }
</script>