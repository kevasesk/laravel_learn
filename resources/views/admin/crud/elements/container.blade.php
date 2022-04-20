<div class="accordion" id="accordion{{$column['column']}}">
    <div class="accordion-item">
        <h2 class="accordion-header" id="panelsStayOpen-id-{{$column['column']}}">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-{{$column['column']}}" aria-expanded="true" aria-controls="panelsStayOpen-{{$column['column']}}">
                {{$column['title']}}
            </button>
        </h2>
        <div id="panelsStayOpen-{{$column['column']}}" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-id-{{$column['column']}}">
            <div class="accordion-body">
                @if($column['contentType'] == 'images')   @include('admin.crud.elements.container.images')
                @elseif($column['contentType'] == 'tabs') @include('admin.crud.elements.container.tabs')
                @endif
            </div>
        </div>
    </div>
</div>
