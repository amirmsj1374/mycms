<section class="price-area overlay section-padding" id="price-page">
    <div class="container">
        
        @include('partials.section_title_and_description')

        <div class="row">
            
            @foreach ($section->contents as $content)
                <div class="col-md-{{$content->cols}}">
                    <div class="price-table">
                        @if ($content->icon)
                            <span class="price-info"><span class="fa fa-{{$content->icon}} fa-2x"></span></span>
                        @endif
                        <h3 class="text-uppercase price-title"> {{$content->title}} </h3>
                        <hr>
                        <ul class="list-unstyled">
                            @foreach (explode("\n" , $content->description) as $value)
                                <li> {{$value}} </li>
                            @endforeach
                        </ul>
                        <hr>
                        <a href="{{url($content->link_name)}}" class="button"> {{$content->link_name}} </a>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
</section>