<h3>Model Information</h3>
<div class="profile-user-info">
    <div class="profile-info-row">
        <div class="profile-info-name"> Stage name </div>

        <div class="profile-info-value">
            <span>{{ $modele->stage_name }}</span>
        </div>
    </div>

    <div class="profile-info-row">
        <div class="profile-info-name"> facebook </div>

        <div class="profile-info-value">
            <span> {{ $modele->facebook }} </span>
        </div>
    </div>

    <div class="profile-info-row">
        <div class="profile-info-name"> instagram </div>

        <div class="profile-info-value">
            <span> {{ $modele->instagram }} </span>
        </div>
    </div>

    <div class="profile-info-row">
        <div class="profile-info-name"> twitter </div>

        <div class="profile-info-value">
            <span class="text-capitalize"> {{ $modele->twitter }} </span>
        </div>
    </div>

    <div class="profile-info-row">
        <div class="profile-info-name"> youtube </div>

        <div class="profile-info-value">
            <span class="text-capitalize"> {{ $modele->youtube }} </span>
        </div>
    </div>

    <div class="profile-info-row">
        <div class="profile-info-name"> Bio </div>

        <div class="profile-info-value">
            <span class="text-capitalize"> {{ $modele->bio }} </span>
        </div>
    </div>

    <div class="profile-info-row">
        <div class="profile-info-name"> Joined </div>

        <div class="profile-info-value">
            <span> {{ $modele->created_at }} </span>
        </div>
    </div>

    <div class="profile-info-row">
        <div class="profile-info-name"> Status </div>

        <div class="profile-info-value">
            <span> {{ $modele->verified ? 'Verified' : 'Not verified' }} </span>
        </div>
    </div>

    <div class="profile-info-row">
        <div class="profile-info-name"> Price </div>
        <div class="profile-info-value">
            <b class="" style="color: #AA3853">
                {{ $modele->user->modelPlan ? '$'.$modele->user->modelPlan->cost : 'Not defined yet' }}
            </b>
        </div>
    </div>
</div>