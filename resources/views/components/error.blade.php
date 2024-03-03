@if (Session::has('error'))
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 mb-4 rounded relative" role="alert">
      <span class="block sm:inline">{{ Session::get('error') }}</span>
    </div>
@endif
