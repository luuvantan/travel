@extends('layouts.app')
    <link href="{{ asset('css/post.css') }}" rel="stylesheet">
@section('content')
    <div class="card-body container post-index" data-post-id="{{ $post->id }}">
        <div class="col-md-12">
           
        </div>
        <div class="row mt-3">
            <div class="col-md-9">
                <div class="show-post">
                    <div class="col-md-12 mt-2">
                        <a href="{{ $post->user->link }}">
                            <img style="" class="owner-post-img" src="{{ $post->user->avatar }}">
                            {{ $post->user->name }}
                        </a>
                        <span class="" style="color: #9b9b9b!important; font-size: 14px;">/{{ $post->created_at }}</span>
                    </div>
                    <div class="mt-2 mb-5 color-green d-flex">
                        <h1 style="padding-top: 7px;">
                            {{ $post->title }}
                        </h1>
                    </div>
                    <div class="col-md-12">
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
                        <li class="pb-3">
                            <a href="{{ $new->link }}">
                                <i class="fa fa-pencil pr-3" aria-hidden="true"></i>
                                {{ mb_substr($new->title, 0, 60, 'UTF-8') }} ...
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>

                <div class="p-1 d-flex mt-5" style="border-left: 3px solid #3c98ca;">
                    <a href="#" class="color-red">TIN TỨC MỚI</a>
                </div>
                <div class="wrap-img-text mt-4 mb-2" id="news">
                    <ul class="">
                        @foreach($news as $new)
                        <li class="pb-3">
                            <a href="{{ $new->link }}">
                                <i class="fa fa-pencil pr-3" aria-hidden="true"></i>
                                {{ mb_substr($new->title, 0, 60, 'UTF-8') }} ...
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="row text-center ">
                <div class="col-12 form-group" id="vote"  data-url="{{ route('vote.addVote') }}">
                    <p class="count-rate">{{ $average }}/5 ({{ $countVote }} votes)</p>
                    <?php
                        $temp = !empty($userVote) ? $userVote : $average;
                        $rate = round($temp*2);
                    ?>
                    <fieldset class="rating {{ !empty($userVote) ? 'userVote disabled' : 'guestVote'}} {{ \Auth::check() ? '' : 'disabled' }}">
                        <input type="radio" id="star5" name="rating" value="5" {{ ($rate == 10) ? 'checked' : ''}}/><label class="full" for="star5" title="Awesome - 5 stars"></label>
                        <input type="radio" id="star4half" name="rating" value="4.5" {{ ($rate == 9) ? 'checked' : ''}}/><label class="half" for="star4half" title="Pretty good - 4.5 stars"></label> 
                        <input type="radio" id="star4" name="rating" value="4" {{ ($rate == 8) ? 'checked' : ''}}/><label class="full" for="star4" title="Pretty good - 4 stars"></label> 
                        <input type="radio" id="star3half" name="rating" value="3.5" {{ ($rate == 7) ? 'checked' : ''}}/><label class="half" for="star3half" title="Meh - 3.5 stars"></label> 
                        <input type="radio" id="star3" name="rating" value="3" {{ ($rate == 6) ? 'checked' : ''}}/><label class="full" for="star3" title="Meh - 3 stars"></label> 
                        <input type="radio" id="star2half" name="rating" value="2.5" {{ ($rate == 5) ? 'checked' : ''}}/><label class="half" for="star2half" title="Kinda bad - 2.5 stars"></label> 
                        <input type="radio" id="star2" name="rating" value="2" {{ ($rate == 4) ? 'checked' : ''}}/><label class="full" for="star2" title="Kinda bad - 2 stars"></label> 
                        <input type="radio" id="star1half" name="rating" value="1.5" {{ ($rate == 3) ? 'checked' : ''}}/><label class="half" for="star1half" title="Meh - 1.5 stars"></label> 
                        <input type="radio" id="star1" name="rating" value="1" {{ ($rate == 2) ? 'checked' : ''}}/><label class="full" for="star1" title="Sucks big time - 1 star"></label> 
                        <input type="radio" id="starhalf" name="rating" value="0.5" {{ ($rate == 1) ? 'checked' : ''}}/><label class="half" for="starhalf" title="Sucks big time - 0.5 stars"></label> 
                        <input type="radio" class="reset-option" name="rating" value="reset" /> 
                    </fieldset>
                </div>   
            </div>
            <h4>Comments</p>
            @if(\Auth::check())
            <div class="card" id="comment" data-url="{{ route('comment.addComment') }}">
                <div class="row" style="padding:20px;">
                    <img class="avatar" src="{{ \Auth::user()->avatar }}"></img>
                    <form style="width: calc(100% - 50px)" action="" class="comment">
                        <div class="form-group green-border-focus">
                            <!-- <textarea class="form-control" placeholder="Write a comment..." rows="1"></textarea> -->
                            <input id="hihi" name="content" type="hidden">
                            <textarea name="text" style="display:none" id="hiddenArea" type="hidden" ></textarea>
                            <div name="abc" id="editor" class="content-post">
                            
                            </div>
                        </div>
                    </form> 
                </div>
                <div class="form-group">
                    <button class="btn btn-primary mr-2 mt-5" id="post-comment" style="float:right;" type="submit">Post Comment</button>
                </div>               
            </div>
            @else
            <div class="card text-sm-center mb-1 cursor-pointer">
                <div class="card-body">
                    <a href="{{ route('login') }}">
                        <span class="card-text text-muted">
                            <i aria-hidden="true" class="fa fa-comment-o"></i>
                            Login to comment
                        </span>
                    </a>
                    
                </div>
            </div>
                <!-- <a href="">login</a> -->
            @endif

            @foreach($comments as $key=>$comment)
            <div class="card mt-3 show-comment">
                <div class="col-md-12 mt-2">
                    <a href="{{ $comment->user->link }}">
                        <img style="width: 22px;height: 22px;border-radius: 50%;"
                            class="" src="{{ $comment->user->avatar }}">
                        {{ $comment->user->name }}
                    </a>
                    <span class="style-date">{{ $comment->created_at }}</span>
                </div>
                <div class="col-md-12 mt-2">
                    {!! $comment->content !!}
                </div>
                
            </div>
            @endforeach
        </div>
    </div>
@endsection
@push('footer')
    <script src="{{ asset('js/posts/index.js') }}"></script>
@endpush
