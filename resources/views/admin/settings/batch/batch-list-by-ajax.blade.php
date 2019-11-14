<thead>
    <tr>
        <th>SI</th>
        <th>Batch Name</th>
        <th>Action</th>
    </tr>
</thead>
<tbody>
@php($i=1)
@foreach($batches as $batch)
    <tr>
        <td>{{ $i++ }}</td>
        <td>{{ $batch->batch_name}}</td>
        <td>
            @if($batch->status == 1)
                <a href="{{ route('class-unpublished',['id'=>$batch->id]) }}"  title="unpublished" class="btn btn-success btn-sm fa fa-arrow-alt-circle-up"></a>
            @else
                <a href="{{ route('class-published',['id'=>$batch->id]) }}"      title="published"    class="btn btn-warning btn-sm fa fa-arrow-alt-circle-down"></a>
            @endif
            <a href="{{ route('class-edit',['id'=>$batch->id]) }}"    title="title"     class="btn btn-info btn-sm fa fa-edit"></a>
            <a href="{{ route('class-delete',['id'=>$batch->id]) }}"   title="delete"    onclick="return confirm('if you want to delete this item press OK')"
               class="btn btn-danger btn-sm fa fa-trash-alt"></a>
        </td>
    </tr>
@endforeach
</tbody>
