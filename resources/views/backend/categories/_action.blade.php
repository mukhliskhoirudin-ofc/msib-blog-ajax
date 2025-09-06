<div class="btn-group">
    <a href="{{ route('panel.categories.edit', $category) }}" class="btn btn-sm btn-warning">
        <span class="ti ti-pencil"></span>
    </a>
    <button class="btn btn-sm btn-danger btn-delete" data-id="{{ $category->uuid }}">
        <i class="ti ti-trash"></i>
    </button>
</div>
