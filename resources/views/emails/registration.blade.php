Hello {{$user->name}},

You have been registered in webadmin with this credentials:

Email : {{$user->email}}
Password: {{$password}}

Please click the link below to activate this account:

<a href="http://localhost/activate?email={{$user->email}}&token={{$user->activation_token}}">Activate Accout</a>
