@extends('layouts.app')
    <link href="{{ asset('css/post.css') }}" rel="stylesheet">
@section('content')
    <div class="container post-index">
        <div class="">
            {!! $post->content !!}
        </div>
        <div class="row text-center ">
            <div class="col-12 form-group">
                <p class="count-rate">6.7/10 (222 votes)</p>
                <fieldset class="rating">
                    <input type="radio" id="star5" name="rating" value="5" /><label class="full" for="star5" title="Awesome - 5 stars"></label>
                    <input type="radio" id="star4half" name="rating" value="4.5" /><label class="half" for="star4half" title="Pretty good - 4.5 stars"></label> 
                    <input type="radio" id="star4" name="rating" value="4" /><label class="full" for="star4" title="Pretty good - 4 stars"></label> 
                    <input type="radio" id="star3half" name="rating" value="3.5" /><label class="half" for="star3half" title="Meh - 3.5 stars"></label> 
                    <input type="radio" id="star3" name="rating" value="3" /><label class="full" for="star3" title="Meh - 3 stars"></label> 
                    <input type="radio" id="star2half" name="rating" value="2.5" /><label class="half" for="star2half" title="Kinda bad - 2.5 stars"></label> 
                    <input type="radio" id="star2" name="rating" value="2" /><label class="full" for="star2" title="Kinda bad - 2 stars"></label> 
                    <input type="radio" id="star1half" name="rating" value="1.5" /><label class="half" for="star1half" title="Meh - 1.5 stars"></label> 
                    <input type="radio" id="star1" name="rating" value="1" /><label class="full" for="star1" title="Sucks big time - 1 star"></label> 
                    <input type="radio" id="starhalf" name="rating" value="0.5" /><label class="half" for="starhalf" title="Sucks big time - 0.5 stars"></label> 
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
                        <textarea name="" id="" rows="7" class="col-12"></textarea>
                    </form> 
                @else
                    <a href="">login</a>
                @endif
            </div>

            <div class="form-group">
                <button class="btn btn-primary mr-2" style="float:right;" type="submit">Post Comment</button>
            </div>
        </div>
    </div>
@endsection
@push('footer')
    <script src="{{ asset('js/posts/index.js') }}"></script>
@endpush
