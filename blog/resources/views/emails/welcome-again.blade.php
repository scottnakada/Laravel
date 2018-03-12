@component('mail::message')
# Introduction

Thanks so much for registering!



@component('mail::button', ['url' => 'http://blog.test'])

Start Browsing

@endcomponent

@component('mail::panel', ['url' => ''])

Happy Blogging!!!

@endcomponent

Thanks,<br>
{{ config('app.name') }}

@endcomponent
