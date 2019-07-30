@component('mail::message')
# Introduction

Thanks so much for registering!

@component('mail::button', ['url' => 'https://laracasts.com'])
Button Text
@endcomponent

@component('mail::panel', ['url' => ''])
Laravel is so cool.
@endcomponent


Thanks,<br>
{{ config('app.name') }}
@endcomponent
