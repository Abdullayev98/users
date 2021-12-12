@extends('voyager::master')
<link rel="stylesheet" href="/css/admin/conversation.css" />


@section('content')

    {{-- @dd($totalDuration) --}}
    <div class="inputs">
        <section class="msger">
            <div class="titles">@lang('site.title')</div>

            <main class="msger-chat">
                <div class="msg {{ $message->user_id == Auth::user()->id ? 'right-msg' : 'left-msg' }} ">
                    <div class="msg-img" style="background-image: url({{ asset('storage/'. Auth::user()->avatar)}})">
                    </div>

                    <div class="msg-bubble">
                        <div class="msg-info">
                            <div class="msg-info-name">{{ $user }}</div>
                            <div class="msg-info-time">{{--date_format($message->created_at, 'G:i a')  --}}</div>
                        </div>
                        <div class="msg-text">
                            {{ $message->text }}
                            <div>
{{--                                @forelse(json_decode($user->users) as $img)--}}
{{--                                    <a href="{{asset('storage/' . $img)}}">{{ $img }}</a> <br />--}}
{{--                                    @endforeach--}}
                            </div>
                        </div>
                    </div>
                </div>




                @foreach ($conversations as $conversation)
                    {{-- @dd($duration); --}}

                    @php
                        $message = \App\Models\User::where('id', $conversation->id)->first();

                    @endphp

                    <div class="msg {{ $conversation->user_id == Auth::user()->id ? 'right-msg' : 'left-msg' }}">
                        <div class="msg-img" style="background-image: url({{ asset('storage/'. Auth::user()->avatar)}})">
                        </div>

                        <div class="msg-bubble">
                            <div class="msg-info">
                                <div class="msg-info-name">{{ $conversation->name }}</div>
                                <div class="msg-info-time">{{ date_format($conversation->created_at, 'G:i a') }}</div>
                            </div>
                            <div class="msg-text">
                                {{ $message->text }}
                            </div>
                        </div>
                    </div>
                @endforeach
            </main>
{{--            @if($message->status == 1 || $message->status == 2)--}}
                <form action="{{ route('conversation.send', $user) }}" method="post" class="msger-inputarea">
                    @csrf
                    <input required name="text" type="text" class="msger-input" placeholder="Enter your message..." />
                    <button type="submit" required class="msger-send-btn ">@lang('site.send_button')</button>
                </form>
{{--            @else--}}
{{--                <form action="{{ route('conversation.send', $conversation->id) }}" method="post" class="msger-inputarea">--}}
{{--                    @csrf--}}
{{--                    <input name="text" type="text" class="msger-input"--}}
{{--                           {{ $message->is_closed == 1 ? "style=display:none" : "style=display:none"}} required--}}
{{--                           placeholder="Enter your message..." />--}}
{{--                    <button type="submit" required class="msger-send-btn "--}}
{{--                            {{ $message->is_closed == 1 ? "style=display:none" : "style=display:none"}}--}}
{{--                            required>@lang('site.send_button')</button>--}}
{{--                </form>--}}
{{--            @endif--}}
        </section>
        <div class="right">
            <div class="wrap">
                <div class="block text-center">
                    <h2>@lang('site.info')</h2>
                </div>
                <div class="block">
                    <span>@lang('site.appealer')</span>
                    <p>{{ $user }} </p>
                </div>
{{--                <div class="block">--}}
{{--                    <span>@lang('site.region')</span>--}}
{{--                    <p>{{ $region }}</p>--}}
{{--                </div>--}}
{{--                <div class="block">--}}
{{--                    <span>@lang('site.route')</span>--}}
{{--                    <p>{{ $route }}</p>--}}
{{--                </div>--}}
                <div class="block">
                    <span>@lang('site.sent')</span>
                    <p>{{ date('d.m.y (H:m)', strtotime($message->created_at)) }}</p>
                </div>
                <div class="block">
                    <span>@lang('site.status')</span>
                    <p>{{ ($message->status == 1) ? trans('site.medium') : (($message->status == 0) ? trans('site.low') : trans('site.high')) }}
                    </p>
                </div>
{{--                @if(($totalDuration < 48) && Auth::user()->hasRole('moderator'))--}}
{{--                    <button type="button" class="btn disabled buttonDis">@lang('site.close')</button>--}}
{{--                @elseif( ($message->status==1 || $message->status==2 ) && Auth::user()->hasRole('user'))--}}
{{--                    <div class="block text-center bloc1">--}}
{{--                        --}}{{-- <form action="{{ route('appeal.close', $message) }}" method="POST"> --}}
{{--                        --}}{{-- @csrf --}}
{{--                        <button onclick="askClose()" type="button" class="btn">@lang('site.close')</button>--}}
{{--                        --}}{{-- </form> --}}
{{--                    </div>--}}
{{--                @elseif(($message->status==1 || $message->status==2 ) && !Auth::user()->hasRole('user'))--}}
{{--                    <form action="{{ route('appeal.close', $message) }}" method="POST">--}}
{{--                        @csrf--}}
{{--                        <button onclick="this.form.submit()" type="button" class="btn btn-danger">@lang('site.close')</button>--}}
{{--                    </form>--}}
{{--                @else--}}
{{--                    <button type="button" class="btn disabled buttonDis">@lang('site.close')</button>--}}
{{--                @endif--}}
            </div>
        </div>

    </div>

{{--    <form id="submit" action="{{route('conversation.rating',$message)}}" method="POST">--}}
{{--        @csrf--}}
{{--        <div class="stars">--}}
{{--            <input type="radio" id="star1" name="rating" value="1" /><input type="radio" id="star2" name="rating"--}}
{{--                                                                            value="2" /><input type="radio" id="star3" name="rating" value="3" /><input type="radio" id="star4"--}}
{{--                                                                                                                                                        name="rating" value="4" /><input type="radio" id="star5" name="rating" value="5" />--}}

{{--            <label for="star1" aria-label="Banana">1 star</label><label for="star2">2 stars</label><label for="star3">3--}}
{{--                stars</label><label for="star4">4 stars</label><label for="star5">5 stars</label>--}}
{{--        </div>--}}
{{--    </form>--}}

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <script src="{{ asset('js/admin/conversation.js') }}"></script>

    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.5/dist/sweetalert2.all.min.js"></script>
@endsection
