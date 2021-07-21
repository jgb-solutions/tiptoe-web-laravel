<h3>Followers</h3>
<ul class="list-unstyled team-members">
    @foreach($followers as $follower)
    <li onclick="location.href='/profile/{{ $follower->id }}'" class=" cursor-pointer">
        <div class="row">
            <div class="col-md-1 col-1 mt-1">
                <div class="avatar border">
                    <img src="{{ asset($follower->avatar) }}" alt="Circle Image"
                        class="img-circle img-no-padding rounded img-responsive ">
                </div>
            </div>
            <div class="col-md-7 col-7 text-left">
                {{ __($follower->name) }}
                <br />
                <span class="text-muted">
                    <small>{{ __('Offline') }}</small>
                </span>
            </div>

        </div>
    </li>
    @endforeach
</ul>