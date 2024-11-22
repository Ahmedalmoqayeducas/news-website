<section class="{{ $color }}-sec">
    <div class="container">
        <!-- category Section -->
        <h3 class="my-4">{{ $title }}</h3>

        <div class="row">
            @foreach ($news as $new)
            <div class="{{ $card }} col-sm-6 portfolio-item">
                <div class="card h-100">
                    {{ $new['picture'] }}
                    <a href="#"><img class="card-img-top" src="news/img/{{ $new['image'] }}" alt=""></a>
                    <div class="card-body">
                        <h4 class="card-title">
                            <a href="#">{{ $new['title'] }}</a>
                        </h4>
                        <p class="card-text">{{ $new['description'] }}</p>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('thread.details',$new['id']) }}" class="btn btn-primary">Learn More</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

         @if(!str_contains($title, 'last'))
        <div align="center"><a class="btn btn-success" href="{{ $new['path '] }}">more news</a></div>
        @endif
    </div>
</section>
