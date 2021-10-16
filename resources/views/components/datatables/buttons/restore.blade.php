<form method="POST" action="{{ $url }}">
    {{ csrf_field() }}
    {{ method_field('PATCH') }}

    <input type="submit" class="btn btn-success" value="{{ __('button.restore') }}">
</form>
