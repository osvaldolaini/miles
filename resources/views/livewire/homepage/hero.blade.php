<!-- component -->
<section>
	<div class="bg-black text-white pb-20 pt-12">
        <div class="container mx-auto flex flex-col md:flex-row items-center my-10 md:my-24">
            <div class="flex flex-col w-full lg:w-1/3 justify-center items-start p-8">
                {{-- <h1 class="text-3xl md:text-5xl p-2 text-teal-500 tracking-loose">SisteMilhas</h1> --}}
                <h2 class="text-3xl md:text-5xl leading-relaxed md:leading-snug mb-2">Encontre a melhor oportunidade
                </h2>
                <p class="text-sm md:text-base text-gray-50 mb-4">Explore essa nova formas de se conectar a pessoas para negociar milhas.</p>
                <a href="{{ url('/app') }}"
                    class="bg-transparent hover:bg-teal-500 text-teal-500 hover:text-white rounded shadow hover:shadow-lg py-2 px-4 border border-teal-500 hover:border-transparent">
                    Explore agora</a>
            </div>
            <div class="p-8 mt-12 mb-6 md:mb-0 md:mt-0 ml-0 md:ml-12 lg:w-2/3 justify-center">
                <div class="h-48 flex flex-wrap content-center">
                    <div>
                        <img class="inline-block mt-28 hidden xl:block" src="{{ url('storage/images/hero/miles-hero-left.webp') }}">
                    </div>
                    <div>
                        <img class="inline-block mt-24 md:mt-0 p-8 md:p-0"  src="{{ url('storage/images/hero/miles-hero-center.webp') }}">
                    </div>
                    <div>
                        <img class="inline-block mt-28 hidden lg:block" src="{{ url('storage/images/hero/miles-hero-right.webp') }}">
                    </div>
                </div>
            </div>
        </div>
	</div>
</section>
