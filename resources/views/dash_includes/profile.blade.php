@auth
<div class="profile clearfix">
    <div class="profile_pic">
        <img src="{{ asset('dashboard/assets/images/img.jpg') }}" alt="Profile Picture" class="img-circle profile_img">
    </div>
    <div class="profile_info">
        <span>Welcome,</span>
        <h2>{{ Auth::user()->name }}</h2>
    </div>
</div>
@endauth
