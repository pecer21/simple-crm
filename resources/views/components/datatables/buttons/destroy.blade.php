<form method="POST" action="{{ $url }}">
    {{ csrf_field() }}
    {{ method_field('DELETE') }}

    <input type="submit" class="btn btn-danger" value="{{ __('button.delete') }}">
</form>
