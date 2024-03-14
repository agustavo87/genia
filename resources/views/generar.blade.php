<x-layouts.app>
    <div class="bg-black text-white flex min-h-screen flex-col items-center pt-16 sm:justify-center sm:pt-0">
        <a href="#">
            <div class="text-foreground font-semibold text-2xl tracking-tighter mx-auto flex items-center gap-2">
                <div>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M15.042 21.672 13.684 16.6m0 0-2.51 2.225.569-9.47 5.227 7.917-3.286-.672Zm-7.518-.267A8.25 8.25 0 1 1 20.25 10.5M8.288 14.212A5.25 5.25 0 1 1 17.25 10.5" />
                    </svg>
                </div>
                Imaginator
            </div>
        </a>
        <div class="relative mt-12 w-full max-w-xl sm:mt-10">
            <div class="relative -mb-1 h-1 w-full bg-gradient-to-r from-transparent via-sky-300 to-transparent"
                bis_skin_checked="1"></div>
            <div
                class="mx-5 border dark:border-b-white/50 dark:border-t-white/50 border-b-white/20 sm:border-t-white/20 shadow-[20px_0_20px_20px] shadow-slate-500/10 dark:shadow-white/20 rounded-lg border-white/20 border-l-white/20 border-r-white/20 sm:shadow-sm lg:rounded-xl lg:shadow-none">
                <div class="flex flex-col p-6">
                    <h3 class="text-xl font-semibold leading-6 tracking-tighter">Generar</h3>
                    <p class="mt-1.5 text-sm font-medium text-white/50">Welcome introduce your promt to generate your image.
                    </p>
                </div>
                <div class="p-6 pt-0">
                    <form method="POST" action="/generate">
                        @csrf 
                        <div>
                            <div>
                                <div
                                    class="group relative rounded-lg border focus-within:border-sky-200 px-3 pb-1.5 pt-2.5 duration-200 focus-within:ring focus-within:ring-sky-300/30">
                                    <div class="flex justify-between">
                                        <label
                                            for="prompt"
                                            class="text-xs font-medium text-muted-foreground group-focus-within:text-white text-gray-400">
                                            Prompt:</label>
                                    </div>
                                    <div class="flex items-center">
                                        <input type="text" name="prompt"
                                            value="{{$prompt}}"
                                            class="block w-full border-0 bg-transparent p-0 text-sm file:my-1 placeholder:text-muted-foreground/90 focus:outline-none focus:ring-0 focus:ring-teal-500 sm:leading-7 text-foreground">
                                    </div>
                                </div>
                                @error('prompt')
                                    <div class="ml-1 text-xs text-red-200">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="mt-4 flex items-center justify-end gap-x-2">
                            <button
                                class="font-semibold hover:bg-black hover:text-white hover:ring hover:ring-white transition duration-300 inline-flex items-center justify-center rounded-md text-sm focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 bg-white text-black h-10 px-4 py-2"
                                type="submit">Generate</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        {{-- @foreach ($errors->all() as $message)
            {{ $message }}
        @endforeach --}}
    </div>
</x-layouts.app>