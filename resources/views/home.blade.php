@extends('layouts.app')

@section('content')
         <!-- Main Start -->
            <!-- Chats Page Start -->
            <div class="chats">
                <div class="d-flex flex-column justify-content-center text-center h-100 w-100">
                    <div class="container">
                        <div class="avatar avatar-lg mb-2">
                            <img class="avatar-img" src="{{asset('/assets/media/avatar')}}/{{Auth::user()->avatar}}" alt="">
                        </div>
                        <h5>Welcome, {{ Auth::user()->name }}!</h5>
                        <p class="text-muted">Please select a chat to Start messaging.</p>
                        <button class="btn btn-outline-primary no-box-shadow" type="button" data-toggle="modal"
                            data-target="#startConversation">
                            Start a conversation
                        </button>
                    </div>
                </div>
            </div>
            <!-- Chats Page End -->
        </main>
        <!-- Main End -->
@endsection
