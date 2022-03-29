@if (isset(auth()->user()->admin))
    @component('_partials.admin-menu')
    @endcomponent
@else
    @component('_partials.user-menu')
    @endcomponent

@endif
