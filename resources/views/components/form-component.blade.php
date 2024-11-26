<div class="mt-3 flex flex-col font-outfit">
    <label for="{{ $dbCol }}" class="mt-3 mb-2">{{ $label }}</label>
    <input type="{{ $type }}" name="{{ $dbCol }}" id="{{ $dbCol }}" value="{{ old("$dbCol") }}" class="p-2 rounded-md border-2">
</div>
