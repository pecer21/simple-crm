<form method="POST" action="{{ $delete_url }}">
    {{ csrf_field() }}
    {{ method_field('DELETE') }}

        <input type="submit" class="btn btn-danger" value="{{ __('Delete') }}">
</form>
