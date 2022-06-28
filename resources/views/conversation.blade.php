@extends('layouts.app')

@section('content')
     
        <!-- Main Start -->
        <main class="main main-visible">

            <!-- Chats Page Start -->
            <div class="chats">
                <div class="chat-body">

                    <!-- Chat Header Start-->
                    <div class="chat-header">
                        <!-- Chat Back Button (Visible only in Small Devices) -->
                        <button class="btn btn-secondary btn-icon btn-minimal btn-sm text-muted d-xl-none" type="button"
                            data-close="">
                            <!-- Default :: Inline SVG -->
                            <svg class="hw-20" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                            </svg>

                            <!-- Alternate :: External File link -->
                            <!-- <img class="injectable hw-20" src="./../assets/media/heroicons/outline/arrow-left.svg" alt=""> -->
                        </button>

                        <!-- Chat participant's Name -->
                        <div class="media chat-name align-items-center text-truncate">
                            <div class="avatar avatar-online d-none d-sm-inline-block mr-3">
                                <img src="{{asset("/assets/media/avatar")}}/{{$contact_details->avatar ?? "avatar.png"}}" alt="">
                            </div>

                            <div class="media-body align-self-center ">
                                <h6 class="text-truncate mb-0">{{ $contact_details->name }}</h6>
                                {{-- <small class="text-muted">Online</small> --}}
                            </div>
                        </div>




                        <li class="nav-item list-inline-item d-none d-sm-block mr-0">
                            <div class="dropdown">
                                <a class="nav-link text-muted px-1" href="#" role="button" title="Details"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <!-- Default :: Inline SVG -->
                                    <svg class="hw-20" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z">
                                        </path>
                                    </svg>

                                    <!-- Alternate :: External File link -->
                                    <!-- <img src="./../assets/media/heroicons/outline/dots-vertical.svg" alt="" class="injectable hw-20"> -->
                                </a>

                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item align-items-center d-flex" href="#"
                                        data-chat-info-toggle="">
                                        <!-- Default :: Inline SVG -->
                                        <svg class="hw-20 mr-2" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                                            </path>
                                        </svg>

                                        <!-- Alternate :: External File link -->
                                        <!-- <img src="./../assets/media/heroicons/outline/information-circle.svg" alt="" class="injectable hw-20 mr-2"> -->
                                        <span>View Info</span>
                                    </a>

                                    <a class="dropdown-item align-items-center d-flex text-danger"
                                        href="/block/{{ $id }}">
                                        <!-- Default :: Inline SVG -->
                                        <svg class="hw-20 mr-2" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636">
                                            </path>
                                        </svg>

                                        <!-- Alternate :: External File link -->
                                        <!-- <img src="./../assets/media/heroicons/outline/ban.svg" alt="" class="injectable hw-20 mr-2"> -->
                                        <span>Block</span>
                                    </a>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item list-inline-item d-sm-none mr-0">
                            <div class="dropdown">
                                <a class="nav-link text-muted px-1" href="#" role="button" title="Details"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <!-- Default :: Inline SVG -->
                                    <svg class="hw-20" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z">
                                        </path>
                                    </svg>

                                    <!-- Alternate :: External File link -->
                                    <!-- <img src="./../assets/media/heroicons/outline/dots-vertical.svg" alt="" class="injectable hw-20"> -->
                                </a>

                                <div class="dropdown-menu dropdown-menu-right">


                                    <a class="dropdown-item align-items-center d-flex" href="#"
                                        data-chat-info-toggle="">
                                        <!-- Default :: Inline SVG -->
                                        <svg class="hw-20 mr-2" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                                            </path>
                                        </svg>

                                        <!-- Alternate :: External File link -->
                                        <!-- <img src="./../assets/media/heroicons/outline/information-circle.svg" alt="" class="injectable hw-20 mr-2"> -->
                                        <span>View Info</span>
                                    </a>


                                    <a class="dropdown-item align-items-center d-flex text-danger" href="/block/{{ $id }}">
                                        <!-- Default :: Inline SVG -->
                                        <svg class="hw-20 mr-2" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636">
                                            </path>
                                        </svg>

                                        <!-- Alternate :: External File link -->
                                        <!-- <img src="./../assets/media/heroicons/outline/ban.svg" alt="" class="injectable hw-20 mr-2"> -->
                                        <span>Block</span>
                                    </a>
                                </div>
                            </div>
                        </li>
                        </ul>
                    </div>
                    <!-- Chat Header End-->

                    <!-- Search Start -->
                    <div class="collapse border-bottom px-3" id="searchCollapse">
                        <div class="container-xl py-2 px-0 px-md-3">
                            <div class="input-group bg-light ">
                                <input type="text"
                                    class="form-control form-control-md border-right-0 transparent-bg pr-0"
                                    placeholder="Search...">
                                <div class="input-group-append">
                                    <span class="input-group-text transparent-bg border-left-0">
                                        <!-- Default :: Inline SVG -->
                                        <svg class="hw-20 text-muted" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                        </svg>

                                        <!-- Alternate :: External File link -->
                                        <!-- <img class="injectable hw-20" src="./../assets/media/heroicons/outline/search.svg" alt="Search icon"> -->
                                    </span>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- Search End -->

                    <!-- Chat Content Start-->
                    <div class="chat-content p-2" id="messageBody">
                        <div class="container">

                            <div id="message-container"></div>
                            {{-- <audio id="recordedAudio"></audio> --}}
                            <!-- <a id="audioDownload"></a> -->

                        </div>

                        <!-- Scroll to finish -->
                        <div class="chat-finished" id="chat-finished"></div>
                    </div>
                    <link rel="stylesheet"
                        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
                    <!-- Chat Content End-->
                    @if ($check_already_block == null)
                        <form method="post" enctype="multipart/form-data" id="send_container_messge">
                            <!-- Chat Footer Start-->
                            <div class="chat-footer">
                                <div class="form-row">
                                    <!-- Chat Input Group Start -->
                                    <div class="col">
                                        <div class="input-group">
                                            <!-- Attachment Start -->
                                            <div class="input-group-prepend mr-sm-2 mr-1">
                                                {{-- <button class="btn" type="button" id="startRecord"
                                                    style="display:block;">
                                                    <i class="fa fa-microphone" aria-hidden="true"></i>
                                                </button>
                                                <button class="btn" type="button" id="stopRecord"
                                                    style="display:none;">
                                                    <i class="fa fa-microphone" aria-hidden="true"
                                                        style="color:red;"></i>
                                                </button> --}}
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
                                                                d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z">
                                                            </path>
                                                        </svg>

                                                        <!-- Alternate :: External File link -->
                                                        <!-- <img class="injectable hw-20" src="./../assets/media/heroicons/outline/plus-circle.svg" alt=""> -->
                                                    </button>
                                                    <div class="dropdown-menu">
                                                        <div class="file_choosen_trigger">
                                                            <a class="dropdown-item" href="#">
                                                                <!-- Default :: Inline SVG -->
                                                                <svg class="hw-20 mr-2" fill="none"
                                                                    viewBox="0 0 24 24" stroke="currentColor">
                                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                                        stroke-width="2"
                                                                        d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                                                </svg>

                                                                <!-- Alternate :: External File link -->
                                                                <!-- <img class="injectable hw-20 mr-2" src="./../assets/media/heroicons/outline/photograph.svg" alt=""> -->
                                                                <span><input type="file" class="hide_file"
                                                                        name="files" onchange="readURL(this);"
                                                                        id="image" style="display: none;">
                                                                    Gallery</span>
                                                            </a>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Attachment End -->
                                            <input type="hidden" id="token" value="{{ csrf_token() }}">
                                            <!-- Textarea Start-->
                                            <input type="text" required autocomplete="off" name="message"
                                                class="form-control transparent-bg border-0 no-resize hide-scrollbar"
                                                placeholder="Write your message..." rows="1">
                                            <!-- Textarea End -->
                                        </div>
                                    </div>
                                    <!-- Chat Input Group End -->

                                    <!-- Submit Button Start -->
                                    <div class="col-auto">
                                        <button type="submit"
                                            class="btn btn-primary btn-icon rounded-circle text-light mb-1"
                                            role="button">
                                            <!-- Default :: Inline SVG -->
                                            <svg class="hw-24" fill="none" viewBox="0 0 24 24"
                                                stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                                            </svg>

                                            <!-- Alternate :: External File link -->
                                            <!-- <img src="./../assets/media/heroicons/outline/arrow-right.svg" alt="" class="injectable hw-24"> -->
                                        </button>
                                    </div>
                                    <!-- Submit Button End-->
                                </div>
                            </div>
                        </form>
                    @else
                   
                        <div class="container shadow p-3 mb-5 bg-white rounded" id="blocked_mesg">
                            @if ($check_already_block->block_from == Auth::user()->id)
                                <strong><span class="text-danger">Can't Reply To This Conversation You Blocked This
                                        Contact... <a href="/unblock/{{ $id }}"
                                            class="text-primary">Unblock</a>
                                    </span></strong>
                            @else
                            
                                <strong><span class="text-danger">Can't Reply To This...</span></strong>

                            @endif

                        </div>
                    @endif
                    <!-- Chat Footer End-->
                    <div class="container shadow p-3 mb-5 bg-white rounded" id="image_display">
                        <button type="reset" onclick="myFunction()" class="close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <img class="injectable hw-20 img-thumbnail" id="blah" src="#">

                    </div>
                </div>

                <!-- Chat Info Start -->
                <div class="chat-info">
                    <div class="d-flex h-100 flex-column">

                        <!-- Chat Info Header Start -->
                        <div class="chat-info-header px-2">
                            <div class="container-fluid">
                                <ul class="nav justify-content-between align-items-center">
                                    <!-- Sidebar Title Start -->
                                    <li class="text-center">
                                        <h5 class="text-truncate mb-0">Profile Details</h5>
                                    </li>
                                    <!-- Sidebar Title End -->

                                    <!-- Close Sidebar Start -->
                                    <li class="nav-item list-inline-item">
                                        <a class="nav-link text-muted px-0" href="#" data-chat-info-close="">
                                            <!-- Default :: Inline SVG -->
                                            <svg class="hw-22" fill="none" viewBox="0 0 24 24"
                                                stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M6 18L18 6M6 6l12 12"></path>
                                            </svg>

                                            <!-- Alternate :: External File link -->
                                            <!-- <img class="injectable hw-22" src="./../assets/media/heroicons/outline/x.svg" alt=""> -->

                                        </a>
                                    </li>
                                    <!-- Close Sidebar End -->
                                </ul>
                            </div>
                        </div>
                        <!-- Chat Info Header End  -->

                        <!-- Chat Info Body Start  -->
                        <div class="hide-scrollbar flex-fill">

                            <!-- User Profile Start -->
                            <div class="text-center p-3">

                                <!-- User Profile Picture -->
                                <div class="avatar avatar-xl mx-5 mb-3">
                                    <img class="avatar-img" src="{{asset("/assets/media/avatar")}}/{{$contact_details->avatar ?? "avatar.png"}}" alt="">
                                </div>

                                <!-- User Info -->
                                <h5 class="mb-1">{{ $contact_details->name }}</h5>
                                <p class="text-muted d-flex align-items-center justify-content-center">
                                    <!-- Default :: Inline SVG -->
                                    <svg class="hw-18 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                                        </path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    </svg>

                                    <!-- Alternate :: External File link -->
                                    <!-- <img class="injectable mr-1 hw-18" src="./../assets/media/heroicons/outline/location-marker.svg" alt=""> -->
                                    <span>{{ $contact_details->country }}</span>
                                </p>

                                <!-- User Quick Options -->
                                <div class="d-flex align-items-center justify-content-center">
                                    
                                    <a class="btn btn-danger btn-icon rounded-circle text-light mx-1" href="/block/{{ $id }}">
                                        <!-- Default :: Inline SVG -->
                                        <svg class="hw-20" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636">
                                            </path>
                                        </svg>
                                        <!-- Alternate :: External File link -->
                                        <!-- <img class="injectable hw-20" src="./../assets/media/heroicons/outline/ban.svg" alt=""> -->
                                    </a>
                                </div>
                            </div>
                            <!-- User Profile End -->

                            <!-- User Information Start -->
                            <div class="chat-info-group">
                                <a class="chat-info-group-header" data-toggle="collapse" href="#profile-info"
                                    role="button" aria-expanded="true" aria-controls="profile-info">
                                    <h6 class="mb-0">User Information</h6>

                                    <!-- Default :: Inline SVG -->
                                    <svg class="hw-20 text-muted" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>

                                    <!-- Alternate :: External File link -->
                                    <!-- <img class="injectable text-muted hw-20" src="./../assets/media/heroicons/outline/information-circle.svg" alt=""> -->
                                </a>

                                <div class="chat-info-group-body collapse show" id="profile-info">
                                    <div class="chat-info-group-content list-item-has-padding">
                                        <!-- List Group Start -->
                                        <ul class="list-group list-group-flush ">

                                            <!-- List Group Item Start -->
                                            <li class="list-group-item border-0">
                                                <p class="small text-muted mb-0">Phone</p>
                                                <p class="mb-0">{{ $contact_details->phone }}</p>
                                            </li>
                                            <!-- List Group Item End -->

                                            <!-- List Group Item Start -->
                                            <li class="list-group-item border-0">
                                                <p class="small text-muted mb-0">Email</p>
                                                <p class="mb-0">{{ $contact_details->email }}</p>
                                            </li>
                                            <!-- List Group Item End -->
 
                                            <!-- List Group Item End -->
                                        </ul>
                                        <!-- List Group End -->
                                    </div>
                                </div>
                            </div>
                            <!-- User Information End -->

                            <!-- Shared Media Start -->
                            <div class="chat-info-group">
                                <a class="chat-info-group-header" data-toggle="collapse" href="#shared-media"
                                    role="button" aria-expanded="true" aria-controls="shared-media">
                                    <h6 class="mb-0">Last Media</h6>

                                    <!-- Default :: Inline SVG -->
                                    <svg class="hw-20 text-muted" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                        </path>
                                    </svg>

                                    <!-- Alternate :: External File link -->
                                    <!-- <img class="injectable text-muted hw-20" src="./../assets/media/heroicons/outline/photograph.svg" alt=""> -->
                                </a>

                                <div class="chat-info-group-body collapse show">
                                    <div class="chat-info-group-content">
                                        <div class="form-row" id="shared-media">

                                        </div>
                                    </div>

                                </div>
                            </div>
                            <!-- Shared Media End -->

                            <!-- Shared Files Start -->
                            <div class="chat-info-group">
                                <a class="chat-info-group-header" data-toggle="collapse" href="#shared-files"
                                    role="button" aria-expanded="true" aria-controls="shared-files">
                                    <h6 class="mb-0">Documents</h6>

                                    <!-- Default :: Inline SVG -->
                                    <svg class="hw-20 text-muted" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z">
                                        </path>
                                    </svg>

                                    <!-- Alternate :: External File link -->
                                    <!-- <img class="injectable text-muted hw-20" src="./../assets/media/heroicons/outline/document.svg" alt=""> -->
                                </a>

                                <div class="chat-info-group-body collapse show" id="shared-files">
                                    <div class="chat-info-group-content list-item-has-padding">
                                        <!-- List Group Start -->
                                        <ul class="list-group list-group-flush" id="shared-docs">

                                            <!-- List Group Item Start -->



                                        </ul>
                                        <!-- List Group End -->
                                    </div>
                                </div>
                            </div>
                            <!-- Shared Files End -->

                        </div>
                        <!-- Chat Info Body Start  -->

                    </div>
                </div>
                <!-- Chat Info End -->
            </div>
            <!-- Chats Page End -->
        </main>
        <!-- Main End -->


        <!-- Modal 4 :: Notifications -->
        <div class="modal modal-lg-fullscreen fade" id="notificationModal" tabindex="-1" role="dialog"
            aria-labelledby="notificationModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-dialog-zoom">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="notificationModalLabel">Notifications</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body p-0 hide-scrollbar">
                        <div class="row">

                            <div class="col-12">
                                <!-- List Group Start -->
                                <ul class="list-group list-group-flush  py-2">
                                    <!-- List Group Item Start -->
                                    <div id="notifiy"></div>
                                    <!-- List Group Item End -->


                                </ul>
                                <!-- List Group End -->
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-center">
                        <a type="button" data-dismiss="modal" aria-label="Close"
                            class="btn btn-link text-muted">Close</a>
                    </div>
                </div>
            </div>
        </div>



        <!-- All Modals End -->
    </div>
    <!-- Main Layout End -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

    {{-- <script>
        var audioChunks;
        startRecord.onclick = (e) => {

            document.getElementById('startRecord').style.display = "none";
            document.getElementById('stopRecord').style.display = "block";

            startRecord.disabled = true;
            stopRecord.disabled = false;
            // This will prompt for permission if not allowed earlier
            navigator.mediaDevices
                .getUserMedia({
                    audio: true
                })
                .then((stream) => {
                    audioChunks = [];
                    rec = new MediaRecorder(stream);
                    rec.ondataavailable = (e) => {
                        audioChunks.push(e.data);
                        if (rec.state == "inactive") {
                            let blob = new Blob(audioChunks, {
                                type: "audio/x-mpeg-3"
                            });
                            recordedAudio.src = URL.createObjectURL(blob);
                            recordedAudio.controls = true;
                            recordedAudio.autoplay = true;
                            audioDownload.href = recordedAudio.src;
                            audioDownload.download = "mp3";
                            audioDownload.innerHTML = "download";
                        }
                    };
                    rec.start();
                })
                .catch((e) => console.log(e));
        };
        stopRecord.onclick = (e) => {
            startRecord.disabled = false;
            stopRecord.disabled = true;
            rec.stop();
        };
    </script> --}}
    <script>
        toastr.options = {
            "closeButton": true,
            "debug": false,
            "newestOnTop": true,
            "progressBar": false,
            "positionClass": "toast-bottom-left",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }
    </script>

    <script type="text/javascript">
        $('.file_choosen_trigger').bind("click", function() {

            $('#image').click();
        });
    </script>
    <script type="text/javascript">
        var x = document.getElementById("image_display");
        x.style.display = "none";

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#blah')
                        .attr('src', e.target.result)
                        .width(200)
                        .height(100);
                };
                var name = document.getElementById('image');
                x.style.display = "block";
                $('#files').val(name.files.item(0).name);
                reader.readAsDataURL(input.files[0]);
            }
        }

        function myFunction() {
            var xdiv = document.getElementById("image_display");
            xdiv.style.display = "none";
            $('#send_container_messge')[0].reset();
        }
    </script>



    <script>
        // Add record
        $('#send_container_messge').submit(function(e) {


            e.preventDefault();
            var username = $('#message_content').val();

            var form = new FormData(document.getElementById('send_container_messge'));
            var token = $('#token').val();
            form.append('_token', token);
            var x = document.getElementById("myAudio");

            $.ajax({
                url: '/send_message/{{ $id }}',
                type: 'post',
                data: form,
                cache: false,
                contentType: false, //must, tell jQuery not to process the data
                processData: false,

                success: function(response) {


                    var xdiv = document.getElementById("image_display");
                    xdiv.style.display = "none";

                    document.getElementById("send_container_messge").reset();

                    $("#messageBody").animate({
                        scrollTop: $('#messageBody').get(0).scrollHeight
                    }, 3000);
                    // console.log({'message': username});

                }
            });


        });
    </script>



    <script>
        var reff = firebase.database().ref("user_id_{{ auth()->user()->id }}/messages/user_id_{{ $id }}");
        reff.on('child_added', function(snapshot) {

            var AuthName = '{{ auth()->user()->id }}'
            var myname = "{{ Auth::user()->name }}";



            var name = snapshot.val().user_id;




            var image_tag = "";
            if (snapshot.val().file == "") {

                image_tag = "";
            } else if (snapshot.val().file_type == "image") {

                var recent_images =
                    '<div class="col-4 col-md-2 col-xl-4"><a href="#"><img src="{{ asset('/message_media') }}/' +
                    snapshot.val().files + '" class="img-fluid rounded border" alt=""></a></div>';

                $("#shared-media").append(recent_images);

                image_tag = '<a class="popup-media" href="{{ asset('/message_media') }}/' + snapshot.val()
                    .files +
                    '"><img class="img-fluid rounded" src="{{ asset('/message_media') }}/' + snapshot.val()
                    .files +
                    '"></a>';

            } else if (snapshot.val().file_type == "video") {

                var recent_images =
                    '<div class="col-4 col-md-2 col-xl-4"><a href="#"><video class="img-fluid rounded border" width="400" controls><source src="{{ asset('/message_media') }}/' +
                    snapshot.val().files + '" type="video/mp4"><source src="{{ asset('/message_media') }}/' +
                    snapshot.val().files + '" type="video/ogg"></video></a></div>';

                $("#shared-media").append(recent_images);

                image_tag =
                    '   <div class="document"><div class="btn btn-primary btn-icon rounded-circle text-light mr-2"><svg class="hw-24" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path></svg></div><div class="document-body"><h6><a href="#" class="text-reset" title="' +
                    snapshot.val().files + '">' + snapshot.val().files + '</a></h6></div></div>';

            } else if (snapshot.val().file_type == "document") {
                var recent_docs =
                    '<li class="list-group-item"><div class="document"><div class="btn btn-primary btn-icon rounded-circle text-light mr-2"><svg class="hw-24" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path></svg> </div><div class="document-body"><h6 class="text-truncate"><a href="#" class="text-reset" title="' +
                    snapshot.val().files + '">' + snapshot.val().files +
                    '</a></h6><ul class="list-inline small mb-0"><li class="list-inline-item"><span class="text-muted text-uppercase">docs</span></li></ul></div><div class="document-options ml-1"><div class="dropdown"><button class="btn btn-secondary btn-icon btn-minimal btn-sm text-muted" type="button"data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><svg class="hw-20" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z"></path></svg> </button><div class="dropdown-menu"><a class="dropdown-item" href="{{ asset('/message_media') }}/' +
                    snapshot.val().files + '" download="{{ asset('/message_media') }}/' + snapshot.val().files +
                    '">Download</a></div></div></div></div></li>';


                image_tag =
                    '<div class="document"><div class="btn btn-primary btn-icon rounded-circle text-light mr-2"><svg class="hw-24" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path></svg></div><div class="document-body"><h6><a href="#" class="text-reset" title="' +
                    snapshot.val().files + '">' + snapshot.val().files + '</a></h6></div></div>';
                $("#shared-docs").append(recent_docs);
            }

            if (name == AuthName) {

                var block =
                    ' <div class="message self"><div class="message-wrapper"><div class="message-content"><span> ' +
                    snapshot.val().text + '</span>' + image_tag +
                    '</div></div><div class="message-options"><div class="avatar avatar-sm"><img alt="" src="{{asset("/assets/media/avatar")}}/{{Auth::user()->avatar ?? "avatar.png"}}"></div><span class="message-date">' +
                    snapshot.val().date + '</span></div></div> ';

                $("#message-container").append(block);
                window.scrollTo(0, document.body.scrollHeight);


            } else {

                var block2 =
                    '<div class="message"><div class="message-wrapper"><div class="message-content"><span>' +
                    snapshot.val().text + '</span>' + image_tag +
                    '</div></div><div class="message-options"><div class="avatar avatar-sm"><img alt="" src="{{asset("/assets/media/avatar")}}/{{$contact_details->avatar ?? "avatar.png"}}"></div><span class="message-date">' +
                    snapshot.val().date + '</span></div></div> ';

                $("#message-container").append(block2);

                window.scrollTo(0, document.body.scrollHeight);

            }

        });
    </script>

 @endsection