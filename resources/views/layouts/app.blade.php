<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('assets/vendors/jquery/jquery-3.5.0.min.js') }}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('assets/webfonts/inter/inter.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/app.min.css') }}">

    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">

    <script src="https://www.gstatic.com/firebasejs/7.13.1/firebase-app.js"></script>

    <!-- If you enabled Analytics in your project, add the Firebase SDK for Analytics -->
    <script src="https://www.gstatic.com/firebasejs/7.13.1/firebase-analytics.js"></script>

    <!-- Add Firebase products that you want to use -->
    <script src="https://www.gstatic.com/firebasejs/7.13.1/firebase-auth.js"></script>
    <script src="https://www.gstatic.com/firebasejs/7.13.1/firebase-database.js"></script>
    <script src="https://www.gstatic.com/firebasejs/7.13.1/firebase-firestore.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script>
        // For Firebase JS SDK v7.20.0 and later, measurementId is optional
        const firebaseConfig = {
            apiKey: "AIzaSyDRMZvi_GAwwlLQ3Nb5_WHwzik7_yW2RxA",
            authDomain: "laravelchatnew.firebaseapp.com",
            databaseURL: "https://laravelchatnew-default-rtdb.firebaseio.com",
            projectId: "laravelchatnew",
            storageBucket: "laravelchatnew.appspot.com",
            messagingSenderId: "935856049269",
            appId: "1:935856049269:web:389a5ab304985836bafc3c",
            measurementId: "G-EGNTXF27R6"

        };
        firebase.initializeApp(firebaseConfig);
        firebase.analytics();

        var ref = firebase.database().ref("user_id_{{ auth()->user()->id }}/web_notification");

        let newItems = false;
        ref.on('child_added', function(snapshot) {
            var snotificaton = snapshot.val();
            if (snotificaton.url == "block") {
                var blockkks =
                    '<li class="list-group-item"><div class="media"><div class="btn btn-danger btn-icon rounded-circle text-light mr-2"><i class="fa fa-ban" style="color:white;font-size:50px;"></i></div><div class="media-body"><h6><a href="' +
                    snotificaton.url + '">' +
                    snotificaton.text + '</a></h6><p class="text-muted mb-0">25 mins ago</p></div></div></li>';
            } else {
                var blockkks =
                    '<li class="list-group-item"><div class="media"><div class="btn btn-primary btn-icon rounded-circle text-light mr-2"><!-- Default :: Inline SVG --><svg class="hw-24" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg><!-- Alternate :: External File link --><!-- <img class="injectable hw-24" src="./../assets/media/heroicons/outline/check-circle.svg" alt=""> --></div><div class="media-body"><h6><a href="' +
                    snotificaton.url + '">' +
                    snotificaton.text + '</a></h6><p class="text-muted mb-0">25 mins ago</p></div></div></li>';


            }
            $('#notifiy').append(blockkks);
            if (!newItems) {
                return
            }

            toastr.options.timeOut = 1500; // 1.5s 
            console.log(snotificaton);
            if (snotificaton.blocked == "1" || snotificaton.un_blocked == "1") {
                location.reload();
            } else {
                toastr.success('<a href=' + snotificaton.url + '>' + snotificaton.text + '</a>');

            }

        });


        ref.once('value', () => {
            newItems = true
        })
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body class="chats-tab-open">
    @php
        $check_has_subs = App\Models\Subscribed::where('user_id', Auth::user()->id)
            ->where('is_active', 1)
            ->count();
    @endphp

    @if ($check_has_subs > 0)
        <div class="alert alert-success"><i class="fa fa-diamond"></i> You'r Premium User. Currently You have
            {{ $check_has_subs }} Active Subscriptions</div>
    @endif
    <!-- Main Layout Start -->
    <div class="main-layout">
        <!-- Navigation Start -->
        <div class="navigation navbar navbar-light bg-primary">
            <!-- Logo Start -->
            <a class="d-none d-xl-block bg-light rounded p-1" href="./../index.html">
                <!-- Default :: Inline SVG -->
                <svg height="30" width="30" viewBox="0 0 512 511">
                    <g>
                        <path
                            d="m120.65625 512.476562c-7.25 0-14.445312-2.023437-20.761719-6.007812-10.929687-6.902344-17.703125-18.734375-18.117187-31.660156l-1.261719-41.390625c-51.90625-46.542969-80.515625-111.890625-80.515625-183.992188 0-68.816406 26.378906-132.101562 74.269531-178.199219 47.390625-45.609374 111.929688-70.726562 181.730469-70.726562s134.339844 25.117188 181.730469 70.726562c47.890625 46.097657 74.269531 109.382813 74.269531 178.199219 0 68.8125-26.378906 132.097657-74.269531 178.195313-47.390625 45.609375-111.929688 70.730468-181.730469 70.730468-25.164062 0-49.789062-3.253906-73.195312-9.667968l-46.464844 20.5c-5.035156 2.207031-10.371094 3.292968-15.683594 3.292968zm135.34375-471.976562c-123.140625 0-216 89.816406-216 208.925781 0 60.667969 23.957031 115.511719 67.457031 154.425781 8.023438 7.226563 12.628907 17.015626 13.015625 27.609376l.003906.125 1.234376 40.332031 45.300781-19.988281c8.15625-3.589844 17.355469-4.28125 25.921875-1.945313 20.132812 5.554687 41.332031 8.363281 63.066406 8.363281 123.140625 0 216-89.816406 216-208.921875 0-119.109375-92.859375-208.925781-216-208.925781zm-125.863281 290.628906 74.746093-57.628906c5.050782-3.789062 12.003907-3.839844 17.101563-.046875l55.308594 42.992187c16.578125 12.371094 40.304687 8.007813 51.355469-9.433593l69.519531-110.242188c6.714843-10.523437-6.335938-22.417969-16.292969-14.882812l-74.710938 56.613281c-5.050781 3.792969-12.003906 3.839844-17.101562.046875l-55.308594-41.988281c-16.578125-12.371094-40.304687-8.011719-51.355468 9.429687l-69.554688 110.253907c-6.714844 10.523437 6.335938 22.421874 16.292969 14.886718zm0 0"
                            data-original="#000000" class="active-path" data-old_color="#000000" fill="#665dfe">
                        </path>
                    </g>
                </svg>

                <!-- Alternate :: External File link -->
                <!-- <img class="injectable" src="./../assets/media/logo.svg" alt=""> -->
            </a>
            <!-- Logo End -->

            <!-- Main Nav Start -->
            <ul class="nav nav-minimal flex-row flex-grow-1 justify-content-between flex-xl-column justify-content-xl-center"
                id="mainNavTab" role="tablist">

                <!-- Chats Tab Start -->
                <li class="nav-item">
                    <a class="nav-link p-0 py-xl-3 active" id="chats-tab" href="#chats-content" title="Chats">
                        <!-- Default :: Inline SVG -->
                        <svg class="hw-24" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z">
                            </path>
                        </svg>

                        <!-- Alternate :: External File link -->
                        <!-- <img class="injectable hw-24" src="./../assets/media/heroicons/outline/chat-alt-2.svg" alt="Chat icon"> -->
                    </a>
                </li>
                <!-- Chats Tab End -->
                <!-- Profile Tab Start -->
                <li class="nav-item">
                    <a class="nav-link p-0 py-xl-3" id="profile-tab" href="#profile-content" title="Profile">
                        <!-- Default :: Inline SVG -->
                        <svg class="hw-24" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>

                        <!-- Alternate :: External File link -->
                        <!-- <img class="injectable hw-24" src="./../assets/media/heroicons/outline/user-circle.svg" alt="Profile icon"> -->
                    </a>
                </li>
                <!-- Profile Tab End -->

                <!-- Pricing Tab Start -->
                <li class="nav-item">
                    <a class="nav-link p-0 py-xl-3" id="calls-tab" href="#calls-content" title="Pricing">
                        <!-- Default :: Inline SVG -->
                        <svg xmlns="http://www.w3.org/2000/svg" height="24" width="24" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z" />
                        </svg>
                        <!-- Alternate :: External File link -->
                        <!-- <img class="injectable hw-24" src="./../assets/media/heroicons/outline/user-circle.svg" alt="Profile icon"> -->
                    </a>
                </li>
                <!-- Pricing Tab End -->


            </ul>
            <!-- Main Nav End -->
        </div>
        <!-- Navigation End -->

        <!-- Sidebar Start -->
        <aside class="sidebar">
            <!-- Tab Content Start -->
            <div class="tab-content">
                <!-- Chat Tab Content Start -->
                <div class="tab-pane active" id="chats-content">
                    <div class="d-flex flex-column h-100">
                        <div class="hide-scrollbar h-100" id="chatContactsList">

                            <!-- Chat Header Start -->
                            <div class="sidebar-header sticky-top p-2">

                                <div class="d-flex justify-content-between align-items-center">
                                    <!-- Chat Tab Pane Title Start -->
                                    <h5 class="font-weight-semibold mb-0">Chats</h5>
                                    <!-- Chat Tab Pane Title End -->

                                    <ul class="nav flex-nowrap">

                                        <li class="nav-item list-inline-item mr-1">
                                            <a class="nav-link text-muted px-1" href="#" title="Notifications"
                                                role="button" data-toggle="modal" data-target="#notificationModal">
                                                <!-- Default :: Inline SVG -->
                                                <svg class="hw-20" fill="none" viewBox="0 0 24 24"
                                                    stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9">
                                                    </path>
                                                </svg>

                                                <!-- Alternate :: External File link -->
                                                <!-- <img src="./../assets/media/heroicons/outline/bell.svg" alt="" class="injectable hw-20"> -->
                                            </a>
                                        </li>

                                        <li class="nav-item list-inline-item mr-0">
                                            <div class="dropdown">
                                                <a class="nav-link text-muted px-1" href="#" role="button"
                                                    title="Details" data-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">
                                                    <!-- Default :: Inline SVG -->
                                                    <svg class="hw-20" fill="none" viewBox="0 0 24 24"
                                                        stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z">
                                                        </path>
                                                    </svg>

                                                    <!-- Alternate :: External File link -->
                                                    <!-- <img src="./../assets/media/heroicons/outline/dots-vertical.svg" alt="" class="injectable hw-20"> -->
                                                </a>

                                                <div class="dropdown-menu dropdown-menu-right">

                                                    <a class="dropdown-item" href="#" role="button"
                                                        data-toggle="modal" data-target="#createGroup">Create
                                                        Group</a>

                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>


                                <!-- Sidebar Header Start -->
                                <div class="sidebar-sub-header">
                                    <!-- Sidebar Header Dropdown Start -->
                                    <div class="dropdown mr-2">
                                        <!-- Dropdown Button Start -->
                                        <button class="btn btn-outline-default dropdown-toggle" type="button"
                                            data-chat-filter-list="" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                            All Chats
                                        </button>
                                        <!-- Dropdown Button End -->

                                        <!-- Dropdown Menu Start -->
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" data-chat-filter="" data-select="all-chats"
                                                href="#">All Chats</a>

                                            <a class="dropdown-item" data-chat-filter="" data-select="groups"
                                                href="#">Groups</a>

                                        </div>
                                        <!-- Dropdown Menu End -->
                                    </div>
                                    <!-- Sidebar Header Dropdown End -->

                                    <!-- Sidebar Search Start -->
                                    <form class="form-inline">
                                        <div class="input-group">
                                            <input type="text"
                                                class="form-control search border-right-0 transparent-bg pr-0"
                                                placeholder="Search users...">
                                            <div class="input-group-append">
                                                <div class="input-group-text transparent-bg border-left-0"
                                                    role="button">
                                                    <!-- Default :: Inline SVG -->
                                                    <svg class="text-muted hw-20" fill="none" viewBox="0 0 24 24"
                                                        stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                                    </svg>

                                                    <!-- Alternate :: External File link -->
                                                    <!-- <img class="injectable hw-20" src="./../assets/media/heroicons/outline/search.svg" alt=""> -->
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    <!-- Sidebar Search End -->
                                </div>
                                <!-- Sidebar Header End -->
                            </div>
                            <!-- Chat Header End -->
                            @php
                                $conversation = App\Models\ChatConvo::where('sender_id', Auth::user()->id)
                                    ->orwhere('reciever_id', Auth::user()->id)
                                    ->orderBy('id', 'DESC')
                                    ->get();
                                $count_conversation = App\Models\ChatConvo::where('sender_id', Auth::user()->id)
                                    ->orwhere('reciever_id', Auth::user()->id)
                                    ->count();
                                $all_group = App\Models\GroupParticipant::where('participant_id', Auth::user()->id)
                                    ->orderBy('id', 'DESC')
                                    ->get();
                                $all_group_count = App\Models\GroupParticipant::where('participant_id', Auth::user()->id)->count();
                                
                            @endphp
                            <!-- Chat Contact List Start -->
                            <ul class="contacts-list" id="chatContactTab" data-chat-list="">
                                <!-- Chat Item Start -->
                                @if ($count_conversation > 0)
                                    @foreach ($conversation as $contact)
                                        @php
                                            if ($contact->reciever_id == Auth::user()->id) {
                                                $contact_details = App\Models\User::where('id', $contact->sender_id)->first();
                                            } else {
                                                $contact_details = App\Models\User::where('id', $contact->reciever_id)->first();
                                            }
                                        @endphp
                                        <!-- Chat Item Start -->
                                        <li class="contacts-item @if ($id ?? '' == $contact_details->id) active @endif">
                                            <a class="contacts-link"
                                                href="/Conversation/{{ $contact_details->id }}/{{ str_replace(' ', '-', $contact_details->name) }}">
                                                <div class="avatar avatar-online">
                                                    <img src="{{ asset('/assets/media/avatar') }}/{{ $contact_details->avatar ?? 'avatar.png' }}"
                                                        alt="">
                                                </div>
                                                <div class="contacts-content">
                                                    <div class="contacts-info">
                                                        <h6 class="chat-name">
                                                            {{ $contact_details->name }}</h6>
                                                        <div class="chat-time">
                                                            <span>{{ $contact->created_at->diffForHumans() }}</span>
                                                        </div>
                                                    </div>
                                                    <div class="contacts-texts">
                                                        <p class="text-truncate">
                                                            {{ $contact->message }}
                                                        </p>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        <!-- Chat Item End -->
                                    @endforeach
                                @else
                                    <li class="contacts-item archived">
                                        No Contact Found.
                                    </li>
                                @endif

                                @if ($all_group_count > 0)
                                    @foreach ($all_group as $all_groups)
                                        <!-- Chat Item Start -->
                                        @php
                                            $group_details = App\Models\Group::where('id', $all_groups->group_id)->first();
                                        @endphp
                                        <li
                                            class="contacts-item groups @if ($id ?? '' == $group_details->id) active @endif">
                                            <a class="contacts-link"
                                                href="/Group/{{ $group_details->id }}/{{ str_replace(' ', '-', $group_details->group_name) }}">
                                                <div class="avatar bg-success text-light">
                                                    <span>
                                                        <!-- Default :: Inline SVG -->
                                                        <img src="{{ asset('/group_thumb') }}/{{ $group_details->group_thumb }}"
                                                            alt="" class="img">

                                                        <!-- Alternate :: External File link -->
                                                        <!-- <img class="injectable" src="./../assets/media/heroicons/outline/user-group.svg" alt=""> -->
                                                    </span>
                                                </div>
                                                <div class="contacts-content">
                                                    <div class="contacts-info">
                                                        <h6 class="chat-name">
                                                            {{ $group_details->group_name }}
                                                        </h6>
                                                        <div class="chat-time">
                                                            <span>{{ $group_details->updated_at->format('d/m/yy') }}</span>
                                                        </div>
                                                    </div>
                                                    <div class="contacts-texts">
                                                        <p class="text-truncate"><span>Jeny: </span>That’s pretty
                                                            common. I
                                                            heard that a lot of people had the same experience.</p>
                                                        <div class="d-inline-flex align-items-center ml-1">
                                                            <!-- Default :: Inline SVG -->
                                                            @if ($group_details->group_privacy == 'private')
                                                                <svg class="hw-16 text-muted" viewBox="0 0 20 20"
                                                                    fill="currentColor">
                                                                    <path fill-rule="evenodd"
                                                                        d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z"
                                                                        clip-rule="evenodd"></path>
                                                                </svg>
                                                            @endif

                                                            <!-- Alternate :: External File link -->
                                                            <!-- <img class="injectable hw-16 text-muted" src="./../assets/media/heroicons/solid/lock-closed.svg" alt=""> -->
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        <!-- Chat Item End -->
                                    @endforeach
                                @endif
                            </ul>
                            <!-- Chat Contact List End -->
                        </div>
                    </div>
                </div>
                <!-- Chats Tab Content End -->
                <!-- Profile Tab Content Start -->
                <div class="tab-pane" id="profile-content">
                    <div class="d-flex flex-column h-100">
                        <div class="hide-scrollbar">
                            <!-- Sidebar Header Start -->
                            <div class="sidebar-header sticky-top p-2 mb-3">
                                <h5 class="font-weight-semibold">Profile</h5>
                                <p class="text-muted mb-0">Personal Information & Settings</p>
                            </div>
                            <!-- Sidebar Header end -->

                            <!-- Sidebar Content Start -->
                            <div class="container-xl">
                                <div class="row">
                                    <div class="col">

                                        <!-- Card Start -->
                                        <div class="card card-body card-bg-5">

                                            <!-- Card Details Start -->
                                            <div class="d-flex flex-column align-items-center">
                                                <div class="avatar avatar-lg mb-3">
                                                    <img class="avatar-img" id="profile_display" src="{{asset('/assets/media/avatar')}}/{{Auth::user()->avatar}}"
                                                        alt="">
                                                </div>

                                                <div class="d-flex flex-column align-items-center">
                                                    <h5><span  id="display_name">{{ Auth::user()->name }}</span> <i class="fa fa-check-circle" aria-hidden="true" style="color: skyblue;" title="Premium"></i></h5>
                                                </div>

                                                <div class="d-flex">
                                                    <a class="btn btn-outline-default mx-1" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" type="button">
                                                        <!-- Default :: Inline SVG -->
                                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                            @csrf
                                                        </form>
                                                        <svg class="hw-18 d-none d-sm-inline-block" fill="none"
                                                            viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                                                        </svg>

                                                        <!-- Alternate :: External File link -->
                                                        <!-- <img class="injectable hw-18" src="./../assets/media/heroicons/outline/logout.svg" alt=""> -->
                                                        <span>Logout</span>
                                                    </a>
                                                </div>
                                            </div>
                                            <!-- Card Details End -->

                                            <!-- Card Options Start -->
                                            <div class="card-options">
                                                <div class="dropdown">
                                                    <button
                                                        class="btn btn-secondary btn-icon btn-minimal btn-sm text-muted text-muted"
                                                        type="button" data-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false">
                                                        <!-- Default :: Inline SVG -->
                                                        <svg class="hw-20" fill="none" viewBox="0 0 24 24"
                                                            stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
                                                        </svg>

                                                        <!-- Alternate :: External File link -->
                                                        <!-- <img class="injectable hw-20" src="./../assets/media/heroicons/outline/dots-vertical.svg" alt=""> -->
                                                    </button>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item change_profile">Change Profile
                                                            Picture
                                                            <form method="post" id="update_profile_pic_form" enctype="multipart/form-data">
                                                                <input type="hidden" id="token" value="{{ csrf_token() }}">
                                                                  <input type="file" name="files" id="profile_input" onchange="readURLfor_profile(this);" style="display: none;">
                                                            </form>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Card Options End -->

                                        </div>
                                        <!-- Card End -->
                                        
                                                <script type="text/javascript">
                                                    $('.change_profile').bind("click", function() {

                                                        $('#profile_input').click();
                                                    });
                                                </script>
                                                    <script type="text/javascript">
                                                        var x = document.getElementById("profile_display");                                                
                                                        function readURLfor_profile(input) {
                                                            if (input.files && input.files[0]) {
                                                                var reader = new FileReader();
                                                
                                                                reader.onload = function(e) {
                                                                    $('#profile_display')
                                                                        .attr('src', e.target.result)
                                                                        .width(80)
                                                                        .height(82);
                                                                        // $('#submit_form').click();

                                                                            var form = new FormData(document.getElementById('update_profile_pic_form'));
                                                                            var token = $('#token').val();
                                                                            form.append('_token', token);
                                                                            $.ajax({
                                                                                url: '/change_profile_pic',
                                                                                type: 'post',
                                                                                data: form,
                                                                                cache: false,
                                                                                contentType: false, //must, tell jQuery not to process the data
                                                                                processData: false,

                                                                                success: function(response) {
                                                                                    toastr.success('Profile Picture has been updated.');
                                                                                }
                                                                            });


                                                                             
                                                                };
                                                                var name = document.getElementById('profile_input');
                                                                $('#files').val(name.files.item(0).name);
                                                                reader.readAsDataURL(input.files[0]);
                                                            }
                                                        }
                                                    </script>

                                        <!-- Card Start -->
                                        <div class="card mt-3">

                                            <!-- List Group Start -->
                                            <ul class="list-group list-group-flush">

                                          
                                                <!-- List Group Item Start -->
                                                <li class="list-group-item py-2">
                                                    <div class="media align-items-center">
                                                        <div class="media-body">
                                                            <p class="small text-muted mb-0">Birthdate</p>
                                                            <p class="mb-0" id="dob">{{Auth::user()->dob ?? 'N/A'}}</p>
                                                        </div>
                                                        <!-- Default :: Inline SVG -->
                                                        <svg class="text-muted hw-20 ml-1" fill="none"
                                                            viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                                        </svg>

                                                        <!-- Alternate :: External File link -->
                                                        <!-- <img class="injectable text-muted hw-20 ml-1" src="./../assets/media/heroicons/outline/calendar.svg" alt=""> -->
                                                    </div>
                                                </li>
                                                <!-- List Group Item End -->

                                                <!-- List Group Item Start -->
                                                <li class="list-group-item py-2">
                                                    <div class="media align-items-center">
                                                        <div class="media-body">
                                                            <p class="small text-muted mb-0">Phone</p>
                                                            <p class="mb-0"id="phone">{{Auth::user()->phone ?? 'N/A'}}</p>
                                                        </div>
                                                        <!-- Default :: Inline SVG -->
                                                        <svg class="text-muted hw-20 ml-1" fill="none"
                                                            viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                                        </svg>

                                                        <!-- Alternate :: External File link -->
                                                        <!-- <img class="injectable text-muted hw-20 ml-1" src="./../assets/media/heroicons/outline/phone.svg" alt=""> -->
                                                    </div>
                                                </li>
                                                <!-- List Group Item End -->

                                                <!-- List Group Item Start -->
                                                <li class="list-group-item py-2">
                                                    <div class="media align-items-center">
                                                        <div class="media-body">
                                                            <p class="small text-muted mb-0">Email</p>
                                                            <p class="mb-0" id="email">{{Auth::user()->email ?? 'N/A'}}</p>
                                                        </div>

                                                        <!-- Default :: Inline SVG -->
                                                        <svg class="text-muted hw-20 ml-1" fill="none"
                                                            viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                                        </svg>

                                                        <!-- Alternate :: External File link -->
                                                        <!-- <img class="injectable text-muted hw-20 ml-1" src="./../assets/media/heroicons/outline/mail.svg" alt=""> -->
                                                    </div>
                                                </li>
                                                <!-- List Group Item End -->

                                                <!-- List Group Item Start -->
                                                <li class="list-group-item py-2">
                                                    <div class="media align-items-center">
                                                        <div class="media-body">
                                                            <p class="small text-muted mb-0">Website</p>
                                                            <p class="mb-0" id="website">{{Auth::user()->website ?? 'N/A'}}</p>
                                                        </div>
                                                        <!-- Default :: Inline SVG -->
                                                        <svg class="text-muted hw-20 ml-1" fill="none"
                                                            viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                        </svg>

                                                        <!-- Alternate :: External File link -->
                                                        <!-- <img class="injectable text-muted hw-20 ml-1" src="./../assets/media/heroicons/outline/globe.svg" alt=""> -->
                                                    </div>
                                                </li>
                                                <!-- List Group Item End -->

                                                <!-- List Group Item Start -->
                                                <li class="list-group-item pt-2">
                                                    <div class="media align-items-center">
                                                        <div class="media-body">
                                                            <p class="small text-muted mb-0">Address</p>
                                                            <p class="mb-0" id="address">{{Auth::user()->address ?? 'N/A'}}</p>
                                                        </div>
                                                        <!-- Default :: Inline SVG -->
                                                        <svg class="text-muted hw-20 ml-1" fill="none"
                                                            viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                                                        </svg>

                                                        <!-- Alternate :: External File link -->
                                                        <!-- <img class="injectable text-muted hw-20 ml-1" src="./../assets/media/heroicons/outline/home.svg" alt=""> -->
                                                    </div>
                                                </li>
                                                <!-- List Group Item End -->

                                            </ul>
                                            <!-- List Group End -->

                                        </div>
                                        <!-- Card End -->

                                        <!-- Card Start -->
                                        <div class="card my-3">

                                            <!-- List Group Start -->
                                            <ul class="list-group list-group-flush">

                                                <!-- List Group Item Start -->
                                                <li class="list-group-item py-2">
                                                    <div class="media align-items-center">
                                                        <div class="media-body">
                                                            <p class="small text-muted mb-0">Facebook</p>
                                                            <a class="font-size-sm font-weight-medium" href="#">{{Auth::user()->facebook ?? 'N/A'}}</a>
                                                        </div> 
                                                        <!-- Alternate :: External File link -->
                                                        <!-- <img class="injectable text-muted hw-20 ml-1" src="./../assets/media/icons/facebook.svg" alt=""> -->
                                                    </div>
                                                </li>
                                                <!-- List Group Item End -->

                                                <!-- List Group Item Start -->
                                                <li class="list-group-item py-2">
                                                    <div class="media align-items-center">
                                                        <div class="media-body">
                                                            <p class="small text-muted mb-0">Youtube</p>
                                                            <a class="font-size-sm font-weight-medium"
                                                                href="#">{{Auth::user()->youtube ?? 'N/A'}}</a>
                                                        </div> 
                                                        <!-- Alternate :: External File link -->
                                                        <!-- <img class="injectable text-muted hw-20 ml-1" src="./../assets/media/icons/twitter.svg" alt=""> -->
                                                    </div>
                                                </li>
                                                <!-- List Group Item End -->

                                                <!-- List Group Item Start -->
                                                <li class="list-group-item py-2">
                                                    <div class="media align-items-center">
                                                        <div class="media-body">
                                                            <p class="small text-muted mb-0">Twitch</p>
                                                            <a class="font-size-sm font-weight-medium"
                                                                href="#">{{Auth::user()->twitch ?? 'N/A'}}</a>
                                                        </div> 
                                                        <!-- Alternate :: External File link -->
                                                        <!-- <img class="injectable text-muted hw-20 ml-1" src="./../assets/media/icons/instagram.svg" alt=""> -->
                                                    </div>
                                                </li>
                                                <!-- List Group Item End -->
  
                                            </ul>
                                            <!-- List Group End -->

                                        </div>
                                        <!-- Card End -->

                                    </div>
                                </div>
                            </div>
                            <!-- Sidebar Content End -->
                        </div>
                    </div>
                </div>
                <!-- Profile Tab Content End -->

                <!-- Tab Content End -->
        </aside>
        <!-- Sidebar End -->
        <main class="main">
            <!-- Profile Settings Start -->
            <div class="profile">
                <div class="page-main-heading sticky-top py-2 px-3 mb-3">

                    <!-- Chat Back Button (Visible only in Small Devices) -->
                    <button class="btn btn-secondary btn-icon btn-minimal btn-sm text-muted d-xl-none" type="button"
                        data-close="">
                        <svg class="hw-20" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                        </svg>
                        <!-- <img class="injectable hw-20" src="./../assets/media/heroicons/outline/arrow-left.svg" alt=""> -->
                    </button>

                    <div class="pl-2 pl-xl-0">
                        <h5 class="font-weight-semibold">Settings</h5>
                        <p class="text-muted mb-0">Update Personal Information &amp; Settings</p>
                    </div>
                </div>

                <div class="container-xl px-2 px-sm-3">
                    <div class="row">
                        <div class="col">
                            <div class="card mb-3">
                                <div class="card-header">
                                    <h6 class="mb-1">Account</h6>
                                    <p class="mb-0 text-muted small">Update personal &amp; contact information</p>
                                </div>
                                <form method="post" id="account_info_form">
                                    <input type="hidden" id="token" value="{{ csrf_token() }}">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="firstName">Full Name</label>
                                                <input type="text" value="{{Auth::user()->name}}" name="name" class="form-control form-control-md"
                                                    id="firstName" placeholder="Type your first name"
                                                    value="Catherine">
                                            </div>
                                        </div> 
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="mobileNumber">Mobile number</label>
                                                <input type="text" name="phone" class="form-control form-control-md"
                                                    id="mobileNumber" value="{{Auth::user()->phone}}" placeholder="Type your mobile number"
                                                    value="+01-222-364522">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="birthDate">Birth date</label>
                                                <input type="date" name="dob" class="form-control form-control-md"
                                                    id="birthDate" value="{{Auth::user()->dob}}" placeholder="dd/mm/yyyy" value="20/11/1992">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="emailAddress">Email address</label>
                                                <input type="email" readonly class="form-control form-control-md"
                                                    id="emailAddress"  placeholder="Type your email address"
                                                    value="catherine.richardson@gmail.com">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="webSite">Website</label>
                                                <input type="text" name="website" class="form-control form-control-md"
                                                    id="webSite"value="{{Auth::user()->website}}" placeholder="Type your website"
                                                    value="www.catherichardson.com">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="Address">Address</label>
                                                <input type="text" value="{{Auth::user()->address}}" name="address" class="form-control form-control-md"
                                                    id="Address" placeholder="Type your address"
                                                    value="1134 Ridder Park Road, San Fransisco, CA 94851">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card-footer d-flex justify-content-end">
                                    <button type="reset" class="btn btn-link text-muted mx-1">Reset</button>
                                    <button type="submit" class="btn btn-primary">Save Changes</button>
                                </div>
                            </form>
                            </div>

                            <div class="card mb-3">
                                <div class="card-header">
                                    <h6 class="mb-1">Social network profiles</h6>
                                    <p class="mb-0 text-muted small">Update personal &amp; contact information</p>
                                </div>

                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="facebookId">Facebook</label>
                                                <input type="text" class="form-control form-control-md"
                                                    id="facebookId" placeholder="Username">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="twitterId">Twitter</label>
                                                <input type="text" class="form-control form-control-md"
                                                    id="twitterId" placeholder="Username">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="instagramId">Instagram</label>
                                                <input type="text" class="form-control form-control-md"
                                                    id="instagramId" placeholder="Username">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="linkedinId">Linkedin</label>
                                                <input type="text" class="form-control form-control-md"
                                                    id="linkedinId" placeholder="Username">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card-footer d-flex justify-content-end">
                                    <button type="button" class="btn btn-link text-muted mx-1">Reset</button>
                                    <button type="button" class="btn btn-primary">Save Changes</button>
                                </div>
                            </div>

                            <div class="card mb-3">
                                <div class="card-header">
                                    <h6 class="mb-1">Password</h6>
                                    <p class="mb-0 text-muted small">Update personal &amp; contact information</p>
                                </div>

                                <div class="card-body">
                                    <form>
                                        <div class="row">
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="current-password">Current Password</label>
                                                    <input type="password" class="form-control form-control-md"
                                                        id="current-password" placeholder="Current password"
                                                        autocomplete="on">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="new-password">New Password</label>
                                                    <input type="password" class="form-control form-control-md"
                                                        id="new-password" placeholder="New password"
                                                        autocomplete="off">
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="repeat-password">Repeat Password</label>
                                                    <input type="password" class="form-control form-control-md"
                                                        id="repeat-password" placeholder="Repeat password"
                                                        autocomplete="off">
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                                <div class="card-footer d-flex justify-content-end">
                                    <button type="button" class="btn btn-link text-muted mx-1">Reset</button>
                                    <button type="button" class="btn btn-primary">Save Changes</button>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <!-- Profile Settings End -->
            @php
                $package = App\Models\Packages::where('is_active', 1)->get();
            @endphp
            <!-- Pricing Log Page Start -->
            <div class="calls px-0 py-2 p-xl-3">
                <div class="container-xl">
                    <div class="row">
                        <div class="col">
                            <div class="card card-bg-1 mb-3">
                                <div class="card-body">
                                    <div class="d-flex flex-column align-items-center">
                                        <div class="d-flex flex-column align-items-center">
                                            <h5 class="mb-1">Pricing & Membership</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row calls-log">
                        <div class="col">
                            @foreach ($package as $packages)
                                <div class="card">
                                    <div class="card-header">
                                        <h5>{{ $packages->pacakge_name }}</h5>
                                    </div>
                                    <div class="card-body">
                                        <h1>${{ $packages->pacakge_price }} <br>
                                            <p>/ @if ($packages->pacakge_valid == 'life_time')
                                                    Life Time
                                                @else
                                                    {{ $packages->pacakge_valid }}
                                                @endif
                                            </p>
                                        </h1>
                                        <p>{{ $packages->pacakge_description }}</p>
                                    </div>
                                    <div class="card-footer">
                                        <a href="{{ route('front.payforsubscribe', $packages->id) }}"
                                            class="btn btn-primary">Subscribe</a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <!-- Pricing Log Page End -->


            @yield('content')


            <!-- Modal 2 :: Create Group -->
            <div class="modal modal-lg-fullscreen fade" id="createGroup" tabindex="-1" role="dialog"
                aria-labelledby="createGroupLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-dialog-zoom">
                    <form method="post" id="create_group_form" enctype="multipart/form-data">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title js-title-step" id="createGroupLabel">&nbsp;</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body py-0 hide-scrollbar">
                                <div class="row hide pt-2" data-step="1" data-title="Create a New Group">

                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="groupName">Group name</label>
                                            <input type="text" required name="group_name"
                                                class="form-control form-control-md" id="groupName"
                                                placeholder="Type group name here">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label>Choose profile picture</label>
                                            <div class="custom-file">
                                                <input type="file" required name="files"
                                                    class="custom-file-input" id="profilePictureInput"
                                                    accept="image/*">
                                                <label class="custom-file-label" for="profilePictureInput">Choose
                                                    file</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group mb-0">
                                                    <label>Group privacy</label>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group rounded p-2 border">
                                                    <div class="custom-control custom-radio">
                                                        <input class="form-check-input" required type="radio"
                                                            name="group_privacy" id="exampleRadios1" value="public"
                                                            checked="">
                                                        <label class="form-check-label" for="exampleRadios1">
                                                            Public group
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group rounded p-2 border">
                                                    <div class="custom-control custom-radio">
                                                        <input class="form-check-input" required type="radio"
                                                            name="group_privacy" id="exampleRadios2" value="private">
                                                        <label class="form-check-label" for="exampleRadios2">
                                                            Private group
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-link text-muted js-btn-step mr-auto"
                                            data-orientation="cancel" data-dismiss="modal"></button>
                                        <button type="button" class="btn btn-secondary  js-btn-step"
                                            data-orientation="previous"></button>
                                        <button type="submit" class="btn btn-primary js-btn-step"
                                            data-orientation="next"></button>
                                    </div>

                                </div>
                                <input type="hidden" id="token" value="{{ csrf_token() }}">
                    </form>


                    <div class="row hide pt-2" data-step="2" data-title="Add Group Members">
                        <div class="col-12 px-0">
                            <!-- Search Start -->
                            <div class="input-group w-100 bg-light">
                                <input type="text"
                                    class="form-control form-control-md search border-right-0 transparent-bg pr-0"
                                    placeholder="Search...">
                                <div class="input-group-append">
                                    <div class="input-group-text transparent-bg border-left-0" role="button">
                                        <!-- Default :: Inline SVG -->
                                        <svg class="hw-20" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                        </svg>

                                        <!-- Alternate :: External File link -->
                                        <!-- <img class="injectable hw-20" src="./../assets/media/heroicons/outline/search.svg" alt=""> -->
                                    </div>
                                </div>
                            </div>
                            <!-- Search End -->
                        </div>
                        <form method="post" id="add_member_form" class="col-sm-12">
                            <input type="hidden" id="token" value="{{ csrf_token() }}">

                            <div class="col-12 px-0">
                                <!-- List Group Start -->
                                <ul class="list-group list-group-flush">
                                    @php
                                        $all_user = App\Models\User::where('id', '!=', Auth::user()->id)->get();
                                    @endphp
                                    @if ($all_user->count() > 0)
                                        @foreach ($all_user as $all_users)
                                            <!-- List Group Item Start -->
                                            <li class="list-group-item">
                                                <div class="media">
                                                    <div class="avatar avatar-online mr-2">
                                                        <img src="{{ asset('/assets/media/avatar') }}/{{ $all_users->avatar ?? 'avatar.png' }}"
                                                            alt="">
                                                    </div>

                                                    <div class="media-body">
                                                        <h6 class="text-truncate">
                                                            <a href="#"
                                                                class="text-reset">{{ $all_users->name }}</a>
                                                        </h6>

                                                    </div>

                                                    <div class="media-options">
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox"
                                                                name="participants_id" value="{{ $all_users->id }}"
                                                                id="chx-user-{{ $all_users->id }}">
                                                            <label class="custom-control-label"
                                                                for="chx-user-{{ $all_users->id }}"></label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <label class="media-label"
                                                    for="chx-user-{{ $all_users->id }}"></label>
                                            </li>


                                            <script>
                                                // Add record
                                                $('#add_member_form').submit(function(e) {


                                                    e.preventDefault();
                                                    var form = new FormData(document.getElementById('add_member_form'));
                                                    var token = $('#token').val();
                                                    form.append('_token', token);
                                                    var checked_box = document.getElementById("chx-user-{{ $all_users->id }}");

                                                    if (checked_box.checked == true) {

                                                        $.ajax({
                                                            url: '/add_member/{{ $all_users->id }}',
                                                            type: 'post',
                                                            data: form,
                                                            cache: false,
                                                            contentType: false, //must, tell jQuery not to process the data
                                                            processData: false,

                                                            success: function(response) {

                                                            }
                                                        });
                                                    }

                                                });
                                            </script>
                                        @endforeach
                                    @else
                                        No users found.
                                    @endif
                                    <!-- List Group Item End -->
                                    <input type="hidden" id="group_id" name="group_id">

                                </ul>
                                <!-- List Group End -->
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-link text-muted js-btn-step mr-auto"
                                    data-orientation="cancel" data-dismiss="modal"></button>

                                <button type="submit" class="btn btn-primary js-btn-step"
                                    data-orientation="next"></button>
                            </div>
                        </form>
                    </div>

                    <div class="row pt-2 h-100 hide" data-step="3" data-title="Finished">
                        <div class="col-12">
                            <div class="d-flex justify-content-center align-items-center flex-column h-100">
                                <div class="btn btn-success btn-icon rounded-circle text-light mb-3">
                                    <!-- Default :: Inline SVG -->
                                    <svg class="hw-24" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7"></path>
                                    </svg>

                                    <!-- Alternate :: External File link -->
                                    <!-- <img class="injectable hw-24" src="./../assets/media/heroicons/outline/check.svg" alt=""> -->
                                </div>
                                <h6>Group Created Successfully</h6>
                                <p class="text-muted text-center">Lorem ipsum dolor sit amet consectetur
                                    adipisicing elit. Dolores cumque laborum fugiat vero pariatur provident!</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <script src="{{ asset('assets/vendors/jquery/jquery-3.5.0.min.js') }}"></script>
            <script src="{{ asset('assets/vendors/jquery/jquery-3.5.0.min.js') }}"></script>
            <script src="{{ asset('assets/vendors/bootstrap/bootstrap.bundle.min.js') }}"></script>
            <script src="{{ asset('assets/vendors/magnific-popup/jquery.magnific-popup.min.js') }}"></script>
            <script src="{{ asset('assets/vendors/svg-inject/svg-inject.min.js') }}"></script>
            <script src="{{ asset('assets/vendors/modal-stepes/modal-steps.min.js') }}"></script>
            <script src="{{ asset('assets/js/app.js') }}"></script>


            <script>
                // Add record
                $('#create_group_form').submit(function(e) {


                    e.preventDefault();
                    var form = new FormData(document.getElementById('create_group_form'));
                    var token = $('#token').val();
                    form.append('_token', token);
                    $.ajax({
                        url: '/create_group',
                        type: 'post',
                        data: form,
                        cache: false,
                        contentType: false, //must, tell jQuery not to process the data
                        processData: false,

                        success: function(response) {
                            console.log(response);
                            document.getElementById('group_id').value = response;
                        }
                    });


                });
            </script>

<script>
    // Add record
    $('#account_info_form').submit(function(e) {


        e.preventDefault();
        var form = new FormData(document.getElementById('account_info_form'));
        var token = $('#token').val();
        form.append('_token', token);

        $.ajax({
            url: '/update_profile_info',
            type: 'post',
            data: form,
            cache: false,
            contentType: false, //must, tell jQuery not to process the data
            processData: false,

            success: function(response) {
                $('#phone').html(response.res.phone);
                $('#dob').html(response.res.dob);
                $('#display_name').html(response.res.name);
                $('#website').html(response.res.website);
                $('#address').html(response.res.address);
                toastr.success('Profile Information has been updated.');
            }
        });


    });
</script>




</body>

</html>
