@component('mail::message')
# Visitor Message

Some Visitor left a message:
<br>
First name: {{ $first_name }}<br>
Last name: {{ $last_name }}<br>
Email: {{ $email }}<br>
Subject: {{ $subject }}
<br>
Message: {{ $message }}
<br>
@component('mail::button', ['url' => ''])
View Message
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
