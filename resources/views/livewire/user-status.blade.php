<div class="profile-user-info">
    <div class="profile-info-row">
        <div class="profile-info-name"> User status </div>

        <div class="profile-info-value d-flex justify-content-between align-items-baseline">
            <span>{{ $user->active ? "Active" : "Inactive" }}</span>

            <button class="btn btn-{{  $user->active ? 'success' : 'default' }} btn-sm button"
                wire:click="toggleActive">
                Clicick to {{ $user->active ? "desactivate" : "activate"}}
            </button>
        </div>
    </div>

    @if($user->user_type === "MODEL")
    <div class="profile-info-row">
        <div class="profile-info-name"> Model status </div>

        <div class="profile-info-value d-flex justify-content-between align-items-baseline">
            <span>{{ $user->modele->verified ? "Verified" : "Not verified" }}</span>

            <button class="btn btn-{{  $user->modele->verified ? 'success' : 'default' }} btn-sm button"
                wire:click="toggleVerify">
                Clicick to {{ !$user->modele->verified ? "verify" : "put on hold"}}
            </button>
        </div>
    </div>
    @endif
</div>

<style>
.button {
    width: 200px;
}
</style>