<footer class="bg-white/40 backdrop-blur-md border-t border-neutral-200/30 py-8 relative z-10">
    <div class="mx-auto max-w-7xl px-6 lg:px-8 flex flex-col sm:flex-row items-center justify-between gap-4">
        <div class="flex items-center gap-2">
            <img src="{{ asset('images/logo.png') }}" alt="Postan Logo" class="h-7 w-auto">
            <span class="font-extrabold tracking-widest text-xs text-neutral-900">POSTAN</span>
            <span class="text-xs text-neutral-400 font-medium ml-2">© {{ date('Y') }} Postan POS. All rights reserved.</span>
        </div>
        <div class="flex items-center gap-6 text-xs text-neutral-500 font-medium">
            <a href="{{ route('beranda.index') }}" data-target="home" class="hover:text-sky-600 transition">Home</a>
            <a href="{{ route('info.index') }}" data-target="info" class="hover:text-sky-600 transition">Info</a>
            <a href="{{ route('showcase.index') }}" data-target="showcase" class="hover:text-sky-600 transition">Showcase</a>
            <a href="{{ route('contact.index') }}" data-target="contact" class="hover:text-sky-600 transition">Contact</a>
        </div>
    </div>
</footer>
