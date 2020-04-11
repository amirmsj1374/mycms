<section class="price-area overlay section-padding" id="price-page">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-6 col-sm-offset-3 text-center">
                <div class="page-title">
                    <h2>Afortable Price</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit voluptates, temporibus at, facere harum fugiat!</p>
                </div>
            </div>
        </div>
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