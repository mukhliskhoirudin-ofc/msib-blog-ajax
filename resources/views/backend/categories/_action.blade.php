<div class="btn-group">
    <a href="{{ route('panel.categories.show', $category) }}" class="btn btn-sm btn-info"><span
            class="ti ti-eye"></span></a>
    <a href="{{ route('panel.categories.edit', $category) }}" class="btn btn-sm btn-warning"><span
            class="ti ti-pencil"></span></a>
    <form action="{{ route('panel.categories.destroy', $category) }}" method="POST"
        onsubmit="return confirm('Yakin hapus?')" style="display:inline;">
        @csrf
        @method('DELETE')
        <button class="btn btn-sm btn-danger"><span class="ti ti-trash"></span></button>
    </form>
</div>
