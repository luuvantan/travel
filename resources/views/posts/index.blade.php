@extends('layouts.app')
    <link href="{{ asset('css/post.css') }}" rel="stylesheet">
@section('content')
    <div class="card-body container post-index" data-post-id="{{ $post->id }}">
        <div class="col-md-12">
           
        </div>
        <div class="row mt-3">
            <div class="card col-md-9">
                <div class="">
                    <div class="mt-2 mb-5 color-green d-flex">
                        <h1 style="padding-top: 7px;">
                            {{ $post->title }}
                        </h1>
                    </div>
                    <div class="">
                        {!! $post->content !!}
                    </div>
                </div>

            </div>

            <div class="col-md-3 mt-3 float-right" style="padding-left: 25px">
                <div class="p-1 d-flex" style="border-left: 3px solid #3c98ca;">
                    <a class="color-red" href="#">TIN TỨC LIÊN QUAN</a>
                </div>
                <div class="wrap-img-text mt-4 mb-2" id="news-related">
                    <ul class="">
                        @foreach($news as $new)
                        <li class="pb-3"><a href="{{ $new->link }}"><i class="fa fa-pencil pr-3" aria-hidden="true"></i>{{ substr($new->title, 0, 60) }} ...</a></li>
                        @endforeach
                    </ul>
                </div>

                <div class="p-1 d-flex mt-5" style="border-left: 3px solid #3c98ca;">
                    <a href="#" class="color-red">TIN TỨC MỚI</a>
                </div>
                <div class="wrap-img-text mt-4 mb-2" id="news">
                    <ul class="">
                        @foreach($news as $new)
                        <li class="pb-3"><a href="{{ $new->link }}"><i class="fa fa-pencil pr-3" aria-hidden="true"></i>{{ substr($new->title, 0, 60) }} ...</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="row text-center ">
                <div class="col-12 form-group">
                    <p class="count-rate">{{ $average }}/5 ({{ $countVote }} votes)</p>
                    <fieldset class="rating {{ !empty($userVote) ? 'userVote' : 'guestVote'}}">
                        <input type="radio" id="star5" name="rating" value="5"/><label class="full" for="star5" title="Awesome - 5 stars"></label>
                        <input type="radio" id="star4half" name="rating" value="4.5" /><label class="half" for="star4half" title="Pretty good - 4.5 stars"></label> 
                        <input type="radio" id="star4" name="rating" value="4" /><label class="full" for="star4" title="Pretty good - 4 stars"></label> 
                        <input type="radio" id="star3half" name="rating" value="3.5" /><label class="half" for="star3half" title="Meh - 3.5 stars"></label> 
                        <input type="radio" id="star3" name="rating" value="3" /><label class="full" for="star3" title="Meh - 3 stars"></label> 
                        <input type="radio" id="star2half" name="rating" value="2.5" /><label class="half" for="star2half" title="Kinda bad - 2.5 stars"></label> 
                        <input type="radio" id="star2" name="rating" value="2" /><label class="full" for="star2" title="Kinda bad - 2 stars"></label> 
                        <input type="radio" id="star1half" name="rating" value="1.5" /><label class="half" for="star1half" title="Meh - 1.5 stars"></label> 
                        <input type="radio" id="star1" name="rating" value="1" /><label class="full" for="star1" title="Sucks big time - 1 star"></label> 
                        <input type="radio" id="starhalf" name="rating" value="0.5" checked/><label class="half" for="starhalf" title="Sucks big time - 0.5 stars"></label> 
                        <input type="radio" class="reset-option" name="rating" value="reset" /> 
                    </fieldset>
                </div>   
            </div>
            <h4>Comments</p>
            <div class="card">
                <div class="row" style="padding:20px;">
                    @if(\Auth::check())
                        <img class="avatar" src="{{ \Auth::user()->avatar }}"></img>
                        <form style="width: calc(100% - 50px)" action="">
                            <textarea name="" id="" rows="6" class="col-12"></textarea>
                        </form> 
                    @else
                        <a href="">login</a>
                    @endif
                </div>

                <div class="form-group">
                    <button class="btn btn-primary mr-2" data-url="{{ route('vote.addVote') }}" style="float:right;" type="submit">Post Comment</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('footer')
    <script src="{{ asset('js/posts/index.js') }}"></script>
@endpush
