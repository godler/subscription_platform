@component('mail::message')
# New post. {{$subscriber->email}} {{$post->title}}

{{$post->description}}

@component('mail::button', ['url' => $post->website->name])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
