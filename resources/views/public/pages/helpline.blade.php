@extends('public.master')
@section('content')
<div class="electro-product-wrapper wrapper-padding pt-95 pb-45" style="padding: 2px">
    <div class="container-fluid">
        <div class="top-product-style">
            <div class="tab-content">
                <div class="row">
                    @php
                    use App\Model\Slide;
                    $slides=Slide::all();
                    @endphp
                    <div class="col-md-12">
                        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                            @for($i=0;$i<5;$i++)
                            @if($i==0)
                                <li data-target="#carousel-example-generic" data-slide-to="{{$i}}" class="active"></li>
                                @else
                                <li data-target="#carousel-example-generic" data-slide-to="{{$i}}"></li>
                            @endif
                            @endfor
                            </ol>
                            <!-- Wrapper for slides -->
                            <div class="carousel-inner" role="listbox">
                            @php $check=0; @endphp
                            @forelse($slides as $slide)
                            @php $check=$check+1;@endphp
                                @if($check==1)
                                    <div class="item active">
                                    <img src="storage/{{$slide->image}}" style="width:100%;height: 320px;" alt="Slider">
                                    <div class="carousel-caption">

                                    </div>
                                    </div>
                                @else
                                    <div class="item">
                                    <img src="storage/{{$slide->image}}" style="width:100%;height: 320px;" alt="Slider">
                                    <div class="carousel-caption">

                                    </div>
                                    </div>
                                @endif
                            @empty
                            @endforelse
                            </div>
                            <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                            </a>
                            <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                </div><br>
                <div class="tab-pane active show fade" id="electro1" role="tabpanel">
                    <div class="custom-row-2">
                        <div class="row">
                            <div class="col-md-12 col-md-offset-2" style="color: orange">
                                <h1><i class="pe-7s-call"></i> Contact No: +8801615336636</h1>
                                <h1><i class="pe-7s-call"></i>Telephone No: +201615336636</h1>
                                <h1><i class="pe-7s-mail"></i>Email: admin@hatirpal.com</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
