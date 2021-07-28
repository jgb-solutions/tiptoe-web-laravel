@extends('layouts.app', [
'class' => '',
'elementActive' => 'profile'
])

@section('content')

<style>
/* Android 2.3 :checked fix */
@-webkit-keyframes fake {
    from {
        opacity: 1;
    }

    to {
        opacity: 1;
    }
}

@keyframes fake {
    from {
        opacity: 1;
    }

    to {
        opacity: 1;
    }
}

.worko-tabs {
    margin: 20px;
    width: 80%;
}

.worko-tabs .state {
    position: absolute;
    left: -10000px;
}

.worko-tabs .flex-tabs {
    display: flex;
    justify-content: space-between;
    flex-wrap: wrap;
}

.worko-tabs .flex-tabs .tab {
    flex-grow: 1;
    max-height: 40px;
}

.worko-tabs .flex-tabs .panel {
    background-color: #fff;
    padding-top: 20px;
    margin-top: -7px;
    min-height: 300px;
    display: none;
    width: 100%;
    text-align: left;
}

.worko-tabs .tab {
    display: inline-block;
    padding: 10px;
    vertical-align: top;
    background-color: #eee;
    cursor: hand;
    cursor: pointer;
    border-left: 10px solid #ccc;
}

.worko-tabs .tab:hover {
    background-color: #fff;
}

#tab-one:checked~.tabs #tab-one-label,
#timeline:checked~.tabs #timeline-label,
#tab-two:checked~.tabs #tab-two-label,
#tab-three:checked~.tabs #tab-three-label,
#tab-five:checked~.tabs #tab-five-label,
#tab-four:checked~.tabs #tab-four-label {
    background-color: #fff;
    cursor: default;
    border-left-color: #AA3853;
}

#tab-one:checked~.tabs #tab-one-panel,
#timeline:checked~.tabs #timeline-label,
#tab-two:checked~.tabs #tab-two-panel,
#tab-five:checked~.tabs #tab-five-label,
#tab-three:checked~.tabs #tab-three-panel,
#tab-four:checked~.tabs #tab-four-panel {
    display: block;
}

@media (max-width: 600px) {
    .flex-tabs {
        flex-direction: column;
    }

    .flex-tabs .tab {
        background: #fff;
        border-bottom: 1px solid #ccc;
    }

    .flex-tabs .tab:last-of-type {
        border-bottom: none;
    }

    .flex-tabs #timeline-label {
        order: 1;
    }

    .flex-tabs #tab-one-label {
        order: 3;
    }

    .flex-tabs #tab-two-label {
        order: 5;
    }

    .flex-tabs #tab-three-label {
        order: 7;
    }

    .flex-tabs #tab-four-label {
        order: 9;
    }

    .flex-tabs #tab-five-label {
        order: 11;
    }



    .flex-tabs #tab-one-panel {
        order: 2;
    }

    .flex-tabs #tab-one-panel {
        order: 4;
    }

    .flex-tabs #tab-two-panel {
        order: 6;
    }

    .flex-tabs #tab-three-panel {
        order: 8;
    }

    .flex-tabs #tab-four-panel {
        order: 10;
    }

    .flex-tabs #tab-five-panel {
        order: 12;
    }

    #timeline:checked~.tabs #timeline-label,
    #tab-one:checked~.tabs #tab-one-label,
    #tab-two:checked~.tabs #tab-two-label,
    #tab-three:checked~.tabs #tab-three-label,
    #tab-five:checked~.tabs #tab-five-label,
    #tab-four:checked~.tabs #tab-four-label {
        border-bottom: none;
    }

    #timeline:checked~.tabs #timeline-label,
    #tab-one:checked~.tabs #tab-one-panel,
    #tab-two:checked~.tabs #tab-two-panel,
    #tab-three:checked~.tabs #tab-three-panel,
    #tab-five:checked~.tabs #tab-five-label,
    #tab-four:checked~.tabs #tab-four-panel {
        border-bottom: 1px solid #ccc;
    }
}

@import url('//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css');

#social {
    /* margin: 40px 10px; */
    display: flex;
    justify-content: center;
    width: 100%;
}

.smGlobalBtn {
    /* global button class */
    display: inline-block;
    position: relative;
    cursor: pointer;
    width: 50px;
    height: 50px;
    border: 2px solid #ddd;
    /* add border to the buttons */
    box-shadow: 0 3px 3px #999;
    padding: 0px;
    text-decoration: none;
    text-align: center;
    color: #fff;
    font-size: 25px;
    font-weight: normal;
    line-height: 2em;
    border-radius: 27px;
    -moz-border-radius: 27px;
    -webkit-border-radius: 27px;
}

/* facebook button class*/
.facebookBtn {
    background: #BDBDBD;
}

.facebookBtn:before {
    /* use :before to add the relevant icons */
    font-family: "FontAwesome";
    content: "\f09a";
    /* add facebook icon */
}

.facebookBtn:hover {
    color: #4060A5;
    background: #fff;
    border-color: #4060A5;
    /* change the border color on mouse hover */
}

/* twitter button class*/
.twitterBtn {
    background: #BDBDBD;
}

.twitterBtn:before {
    font-family: "FontAwesome";
    content: "\f099";
    /* add twitter icon */

}

.twitterBtn:hover {
    color: #00ABE3;
    background: #fff;
    border-color: #00ABE3;
}

/* instagram button class*/
.instagramBtn {
    background: #BDBDBD;
}

.instagramBtn:before {
    font-family: "FontAwesome";
    content: "\f16d";
    /* add instagram icon */
}

.instagramBtn:hover {
    color: #B52B7E;
    background: #fff;
    border-color: #B52B7E;
}

/* youtube button class*/
.youtubeBtn {
    background: #BDBDBD;
}

.youtubeBtn:before {
    font-family: "FontAwesome";
    content: "\f167";
    /* add youtube icon */
}

.youtubeBtn:hover {
    color: #F60200;
    background: #fff;
    border-color: #F60200;
}
</style>



<div class="content">
    @if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
    @endif
    @if (session('password_status'))
    <div class="alert alert-success" role="alert">
        {{ session('password_status') }}
    </div>
    @endif
    <div class="row">
        <div class="col-md-4">
            <div class="card card-user">
                <div class="image">
                    <img src="{{ asset('paper/img/damir-bosnjak.jpg') }}" alt="...">
                </div>
                <div class="card-body" style="min-height:20px;">
                    <div class="author">
                        <a href="javascript:void(0)">
                            <img class="avatar border-gray" src="{{ asset($user->avatar) }}" alt="...">

                            <h5 class="title">{{ __($user->name)}}</h5>
                        </a>
                        <p class="description">
                            {{ __($user->user_type)}}
                        </p>
                    </div>
                </div>
                @if($user->user_type === "MODEL")
                <div class="card-footer">
                    <div class="button-container">
                        <div class="row">
                            <div class="col-lg-3 col-md-6 col-6 ml-auto">
                                <h5>{{ __($user->modele->photos->count()) }}
                                    <br>
                                    <small>{{ __(str_plural('Photo', $user->modele->photos->count())) }}</small>
                                </h5>
                            </div>
                            <div class="col-lg-4 col-md-6 col-6 ml-auto mr-auto">
                                <h5>{{ __($user->modele->followers->count()) }}
                                    <br>
                                    <small>{{ __(str_plural('Follower', $user->modele->followers->count())) }}</small>
                                </h5>
                            </div>
                            <div class="col-lg-3 mr-auto">
                                <h5>{{ __($user->modele->photoLiked->count()) }}
                                    <br>
                                    <small>{{ __(str_plural('Like', $user->modele->photoLiked->count())) }}</small>
                                </h5>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="button-container">
                        <div class="row">
                            <div id="social">
                                <a class="facebookBtn smGlobalBtn m-1" href="{{ $user->modele->facebook }}"></a>
                                <a class="twitterBtn smGlobalBtn m-1" href="{{ $user->modele->twitter }}"></a>
                                <a class="instagramBtn smGlobalBtn m-1" href="{{ $user->modele->instagram }}"></a>
                                <a class="youtubeBtn smGlobalBtn m-1" href="{{ $user->modele->youtube }}"></a>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
            </div>

            <div class="card">
                @if($user->user_type === "CONSUMER")
                <div class="card-header">
                    <h4 class="card-title">{{ __('Models') }}</h4>
                </div>
                <div class="card-body">
                    <ul class="list-unstyled team-members">
                        @forelse($user->modeles->take(3) as $modele)
                        <li onclick="location.href='/profile/{{ $modele->user->id }}'" class=" cursor-pointer">
                            <div class="row">
                                <div class="col-md-2 col-2">
                                    <div class="avatar border">
                                        <img src="{{ asset($modele->poster) }}" alt="Circle Image"
                                            class="img-circle img-no-padding rounded img-responsive ">
                                    </div>
                                </div>
                                <div class="col-md-7 col-7">
                                    {{ __($modele->stage_name) }}
                                    <br />
                                    <span class="text-muted">
                                        <small>{{ __('Offline') }}</small>
                                    </span>
                                </div>
                                <div class="col-md-3 col-3 text-right">
                                    <button class="btn btn-sm btn-outline-success btn-round btn-icon">
                                        <!-- <i class="fa fa-envelope"></i> -->
                                    </button>
                                </div>
                            </div>
                        </li>
                        @empty
                        <li>
                            You don't follow any model yet
                        </li>
                        @endforelse
                    </ul>
                </div>
                @else
                <div class="card-header">
                    <h4 class="card-title">{{ __('Followers') }}</h4>
                </div>

                <div class="card-body">
                    <ul class="list-unstyled team-members">
                        @forelse($user->modele->followers->take(3) as $follower)
                        <li onclick="location.href='/profile/{{ $follower->id }}'" class=" cursor-pointer">
                            <div class="row">
                                <div class="col-md-2 col-2">
                                    <div class="avatar border">
                                        <img src="{{ asset($follower->avatar) }}" alt="Circle Image"
                                            class="img-circle img-no-padding rounded img-responsive ">
                                    </div>
                                </div>
                                <div class="col-md-7 col-7">
                                    {{ __($follower->name) }}
                                    <br />
                                    <span class="text-muted">
                                        <small>{{ __('Offline') }}</small>
                                    </span>
                                </div>
                                <div class="col-md-3 col-3 text-right">
                                    <button class="btn btn-sm btn-outline-success btn-round btn-icon">
                                        <!-- <i class="fa fa-envelope"></i> -->
                                    </button>
                                </div>
                            </div>
                        </li>
                        @empty
                        <li>
                            You don't have any follower yet
                        </li>
                        @endforelse
                    </ul>
                </div>
                @endif
            </div>
        </div>
        <div class="col-md-8 text-center ">
            <div class="card">
                <div class="card-body worko-tabs" style="margin-top:0px; width:98%;">
                    <div class="row w-100">
                        <div class="w-100">
                            @if($user->user_type === "MODEL")
                            <input class="state" type="radio" title="timeline" name="tabs-state" id="timeline"
                                checked />
                            @endif
                            <input class="state" type="radio" title="tab-one" name="tabs-state" id="tab-one"
                                @if($user->user_type ==="CONSUMER") checked @endif />
                            <input class="state" type="radio" title="tab-two" name="tabs-state" id="tab-two" />
                            <input class="state" type="radio" title="tab-three" name="tabs-state" id="tab-three" />
                            <input class="state" type="radio" title="tab-four" name="tabs-state" id="tab-four" />
                            <input class="state" type="radio" title="tab-five" name="tabs-state" id="tab-five" />

                            <div class="tabs flex-tabs w-100">
                                @if($user->user_type === "MODEL")
                                <label for="timeline" id="timeline-label" class="tab">Timeline</label>
                                @endif
                                <label for="tab-one" id="tab-one-label" class="tab">About</label>

                                @if($user->user_type === "CONSUMER")
                                <label for="tab-four" id="tab-four-label" class="tab">Models</label>

                                @endif

                                @if($user->user_type === "MODEL")
                                <label for="tab-two" id="tab-two-label" class="tab">Model Information</label>

                                <label for="tab-three" id="tab-three-label" class="tab">Followers</label>

                                @endif

                                <label for="tab-five" id="tab-five-label" class="tab">Action</label>


                                @if($user->user_type === "MODEL")
                                <div id="timeline-label" class="panel active">
                                    @include('profile.timeline', ['modele' => $user->modele])
                                </div>

                                <div id="tab-three-panel" class="panel">
                                    @include('followers.follower-list', ['followers' => $user->modele->followers])
                                </div>

                                <div id="tab-two-panel" class="panel">
                                    @include('profile.model-information', ['modele' => $user->modele])
                                </div>
                                @endif

                                <div id="tab-five-label" class="panel w-100">
                                    <!-- <livewire:user-status :user="$user" /> -->
                                    @livewire('user-status', ['user' => $user])
                                </div>

                                <div id="tab-one-panel"
                                    class="panel @if($user->user_type === 'consumer') active @endif">
                                    @include('profile.personal-information', ['user' => $user])
                                </div>

                                <div id="tab-four-panel" class="panel">
                                    @include('models.model-list', ['models' => $user->modeles])
                                </div>

                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<style>
.profile-user-info {
    display: table;
    width: 98%;
    width: calc(100% - 24px);
    text-align: left;
}

.profile-info-row {
    display: table-row;
}

.profile-info-name,
.profile-info-value {
    display: table-cell;
    border-top: 1px dotted #D5E4F1;
}

.profile-info-name {
    text-align: right;
    padding: 6px 10px 6px 4px;
    font-weight: 400;
    color: #667E99;
    background-color: transparent;
    width: 110px;
    vertical-align: middle;
    text-align: left;
}

.profile-info-value {
    padding: 6px 4px 6px 6px
}

.profile-info-value>span+span:before {
    display: inline;
    content: ",";
    margin-left: 1px;
    margin-right: 3px;
    color: #666;
    border-bottom: 1px solid #FFF
}

.profile-info-value>span+span.editable-container:before {
    display: none
}

.profile-info-row:first-child .profile-info-name,
.profile-info-row:first-child .profile-info-value {
    border-top: none
}
</style>



@endsection