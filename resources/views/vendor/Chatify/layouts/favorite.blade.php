@php
$logo  =\App\Models\Utility::get_file(config('chatify.user_avatar.folder')); 
$avatar = \App\Models\Utility::get_file('/users-avatar');
@endphp

<div class="favorite-list-item">
     @if(!empty($user->avatar))
    <div data-id="{{ $user->id }}" data-action="0" class="avatar av-m" 
        style="background-image: url('{{asset($logo.'/'.$user->avatar)}}');">
    </div>
     @else
        <div data-id="{{ $user->id }}" data-action="0" class="avatar av-m"
             style="background-image: url('{{asset($logo.'/avatar.png')}}') !important;">
        </div>
    @endif
    <p>{{ strlen($user->name) > 5 ? substr($user->name,0,6).'..' : $user->name }}</p>
</div>
