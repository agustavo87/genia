
    <x-layouts.app>
        <div class="bg-black text-white flex min-h-screen flex-col items-center py-16 sm:justify-center sm:pt-0">
            
            <div class="relative mt-12 w-full max-w-xl sm:mt-10">
                <div class="relative -mb-1 h-1 w-full bg-gradient-to-r from-transparent via-sky-300 to-transparent"
                    bis_skin_checked="1"></div>
                <div
                    class="mx-5 border dark:border-b-white/50 dark:border-t-white/50 border-b-white/20 sm:border-t-white/20 shadow-[20px_0_20px_20px] shadow-slate-500/10 dark:shadow-white/20 rounded-lg border-white/20 border-l-white/20 border-r-white/20 sm:shadow-sm lg:rounded-xl lg:shadow-none">
                    <div class="flex flex-col p-6">
                        <h3 class="text-xl font-semibold leading-6 tracking-tighter">Your image</h3>
                        <p class="mt-1.5 text-sm font-medium text-white/50">{{ $prompt }}</p>

                    </div>
                    <div class="m-6 rounded-lg border overflow-hidden">
                        <img src="{{$img}}">
                    </div>
                </div>
            </div>
            <div class="flex justify-center gap-5  mt-8">
                <a class="text-sm font-medium text-foreground underline" href="{{ route('generation.create', ['prompt' => $prompt])}}">
                    Generate again
                </a>
                <a class="text-sm font-medium text-foreground underline" href="{{ route('generation.create')}}">
                    Generate other
                </a>
            </div>
        </div>
    </x-layouts.app>