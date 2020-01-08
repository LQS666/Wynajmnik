@extends('layouts.admin')

@section('title', __('dashboard/profile.title'))

@section('profile')

<div class="main-content-panels">
    <div class="main-content-panel main-content-panel__profile">
        <h2 class="font-semibold">{{ __('dashboard/profile.title') }}</h2>
        <form method="POST" action="{{ route('my-account.account-change') }}" enctype="multipart/form-data"
            class="form">
            @csrf
            <div class="photo-upload">
                @if ($user->avatar)
                <img class="photo-upload__image" id="photoUploader" src="{{ $user->avatarUrl }}" alt="Avatar">
                @else
                <img class="photo-upload__image" id="photoUploader" src="{{ asset('/assets/images/avatar.png') }}" alt="Avatar">
                @endif
                <label class="photo-upload__btn">
                    <input type="file" name="avatar" id="avatar" class="photo-upload__btn-uploader"
                        onchange="changeUserAvatar(this);">
                    <span class="photo-upload__btn-text">{{ __('dashboard/profile.photo_upload_text') }}</span>
                </label>
                <p class="text-xs">{{ __('dashboard/profile.photo_upload_requirements') }}</p>
            </div>
            <div class="form--input-box">
                <label for="email">{{ __('dashboard/profile.email') }}</label>
                <input type="email" name="email" id="email" value="{{ old('email', $user['email']) }}"
                    autocomplete="off" disabled>
            </div>
            <div class="form--input-box">
                <label for="name">{{ __('dashboard/profile.name') }}</label>
                <input type="text" name="name" id="name" value="{{ old('name', $user['name']) }}" autocomplete="off">
            </div>
            <div class="form--input-box">
                <label for="surname">{{ __('dashboard/profile.surname') }}</label>
                <input type="text" name="surname" id="surname" value="{{ old('surname', $user['surname']) }}"
                    autocomplete="off">
            </div>
            <div class="form--input-box" data-title="date">
                <label for="birth_date">{{ __('dashboard/profile.birth_date') }}</label>
                <input type="date" name="birth_date" id="birth_date"
                    value="{{ old('birth_date', $user['birth_date']->format('Y-m-d')) }}">
            </div>
            <button type="submit" class="button button--block mt-12">{{ __('dashboard/profile.submit') }}</button>
        </form>
    </div>

    <div class="main-content-panel main-content-panel__profile">
        <h2 class="font-semibold">{{ __('dashboard/change.title') }}</h2>
        <form method="POST" action="{{ route('my-account.password-change') }}" class="form">
            @csrf
            <div class="form--input-box">
                <label for="email">{{ __('dashboard/change.passwordOld') }}</label>
                <input type="password" name="password-old" id="password-old" autocomplete="off">
            </div>
            <div class="form--input-box">
                <label for="password">{{ __('dashboard/change.passwordNew') }}</label>
                <input type="password" name="password-new" id="password-new">
            </div>
            <div class="form--input-box">
                <label for="password">{{ __('dashboard/change.passwordNewConfirm') }}</label>
                <input type="password" name="password-new_confirmation" id="password-new_confirmation">
            </div>
            <button type="submit" class="button button--block mt-12">{{ __('dashboard/change.submit') }}</button>
        </form>
    </div>
</div>

<script>
    function changeUserAvatar(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#photoUploader')
                        .attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
</script>


@endsection