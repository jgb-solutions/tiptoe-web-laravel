<h3>Personal Information</h3>
<div class="profile-user-info">
    <div class="profile-info-row">
        <div class="profile-info-name"> Full name </div>

        <div class="profile-info-value">
            <span>{{ $user->name }}</span>
        </div>
    </div>

    <div class="profile-info-row">
        <div class="profile-info-name"> Email </div>

        <div class="profile-info-value">
            <span> {{ $user->email }} </span>
        </div>
    </div>

    <div class="profile-info-row">
        <div class="profile-info-name"> Telephone </div>

        <div class="profile-info-value">
            <span> {{ $user->telephone }} </span>
        </div>
    </div>

    <div class="profile-info-row">
        <div class="profile-info-name"> Gender </div>

        <div class="profile-info-value">
            <span class="text-capitalize"> {{ $user->gender }} </span>
        </div>
    </div>

    <div class="profile-info-row">
        <div class="profile-info-name"> Account type </div>

        <div class="profile-info-value">
            <span class="text-capitalize"> {{ $user->user_type }} </span>
        </div>
    </div>

    <div class="profile-info-row">
        <div class="profile-info-name"> Joined </div>

        <div class="profile-info-value">
            <span> {{ $user->created_at }} </span>
        </div>
    </div>

    <div class="profile-info-row">
        <div class="profile-info-name"> Status </div>

        <div class="profile-info-value">
            <span> {{ $user->active ? 'Active' : 'Inactive' }} </span>
        </div>
    </div>
</div>