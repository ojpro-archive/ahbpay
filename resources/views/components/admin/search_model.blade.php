<div class="modal modal-search fade" id="searchModal" tabindex="-1" role="dialog" aria-labelledby="searchModal"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{ route('dashboard') }}" method="GET">
                @csrf
                <div class="modal-header">
                    <input type="search" class="form-control" id="inlineFormInputGroup" name="search"
                        placeholder="SEARCH">
            </form>
        </div>
    </div>
</div>
</div>
