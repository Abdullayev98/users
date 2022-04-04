<h1>Email Verification Mail</h1>
Please verify your email with bellow link:
<a href="{{ route('login.verifyAccount', ['user' =>$data['user'],'hash' => $data['code']]) }}">Verify Email</a>
