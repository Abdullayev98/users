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
                        </div>
                    </div>
                </div>




                @foreach ($conversations as $conversation)


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
                <form action="{{ route('conversation.send', $user) }}" method="post" class="msger-inputarea">
                    @csrf
                    <input required name="text" type="text" class="msger-input" placeholder="Enter your message..." />
                    <button type="submit" required class="msger-send-btn ">@lang('site.send_button')</button>
                </form>
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
                <div class="block">
                    <span>@lang('site.sent')</span>
                    <p>{{ date('d.m.y (H:m)', strtotime($message->created_at)) }}</p>
                </div>
                <div class="block">
                    <span>@lang('site.status')</span>
                    <p>{{ ($message->status == 1) ? trans('site.medium') : (($message->status == 0) ? trans('site.low') : trans('site.high')) }}
                    </p>
                </div>

            </div>
        </div>

    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <script src="{{ asset('js/admin/conversation.js') }}"></script>

    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.5/dist/sweetalert2.all.min.js"></script>
@endsection
