@extends('pages.users.master')
@section('sub-content')

<div class='container'>
<h1>Welcome {{ $user->first_name. ' '. $user->last_name }}</h1>
<hr>
<b>You Can change your profile and every Information here...</b>

<div class="row">
<div class="col-md-4">
<div class="card card-body mt-2 pointer" onclick="location.href='{{route('userS.profile')}}'">
<h3>Update profile</h3>
</div>
</div>
</div>

<br><br><br><br><br>
<br><br><br><br><br>
</div>
@endsection