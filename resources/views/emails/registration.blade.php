Hello {{$user->name}},

You have been registered in webadmin, please click the link below to activate your account:

<a href="http://localhost/activate?email={{$user->email}}&token={{$token}}">Activate Accout</a>
