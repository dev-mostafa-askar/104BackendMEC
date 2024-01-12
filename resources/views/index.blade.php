<x-page-header />
    <section class="px-6 py-8">
        <x-client-nav />
       <x-website-header />

        <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">   
            @if($posts->count() > 0)             
                <x-main-post :post="$posts->first()" />
            @endif
            <div class="lg:grid lg:grid-cols-3">
                @foreach($posts->skip(1) as $post)
                    <x-post :post="$post" />
                @endforeach
            </div>
        </main>
       <x-client-footer />
    </section>
</body>
