<h3>Models</h3>
<ul class="list-unstyled team-members">
    @foreach($models as $model)
    <li onclick="location.href='/profile/{{ $model->user->id }}'" class=" cursor-pointer">
        <div class="row">
            <div class="col-md-1 col-1 mt-1">
                <div class="avatar border">
                    <img src="{{ asset($model->poster) }}" alt="Circle Image"
                        class="img-circle img-no-padding rounded img-responsive ">
                </div>
            </div>
            <div class="col-md-7 col-7 text-left">
                {{ __($model->stage_name) }}
                <br />
                <span class="text-muted">
                    <small>{{ __('Offline') }}</small>
                </span>
            </div>
        </div>
    </li>
    @endforeach
</ul>