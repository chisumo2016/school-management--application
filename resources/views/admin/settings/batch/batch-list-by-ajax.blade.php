<thead>
    <tr>
        <th>SI</th>
        <th>Batch Name</th>
        <th> Student Capacity</th>
        <th>Action</th>
    </tr>
</thead>
<tbody>
@php($i=1)
@foreach($batches as $batch)
    <tr>
        <td>{{ $i++ }}</td>
        <td>{{ $batch->batch_name}}</td>
        <td>{{ $batch->student_capacity}}</td>
        <td>
            @if($batch->status == 1)
                <button   onclick='unpublished("{{ $batch->id }}", "{{ $batch->class_id }}")' title="unpublished" id="unpublished" class="btn btn-success btn-sm fa fa-arrow-alt-circle-up"></button>
            @else
                <button   onclick='published("{{ $batch->id }}", "{{ $batch->class_id }}")'   title="published"    class="btn btn-warning btn-sm fa fa-arrow-alt-circle-down"></button>
            @endif
            <a href="{{ route('batch-edit',['id'=>$batch->id]) }}"    title="title"     class="btn btn-info btn-sm fa fa-edit" target="_blank"></a>
            <button onclick='delt("{{ $batch->id }}", "{{ $batch->class_id }}")'      title="delete"    onclick="return confirm('if you want to delete this item press OK')"
               class="btn btn-danger btn-sm fa fa-trash-alt"></button>
        </td>
    </tr>
@endforeach
</tbody>
<script>
    function unpublished(batchId,classId) {
        var check = confirm('If you want to unpublished this item,Press OK');
        if (check) {
            $.get("{{ route('batch-unpublished') }}" , { batch_id:batchId, class_id:classId} , function (data) {
                $("#batchList").html(data);
            })
        }
    }

    function published(batchId,classId) {
        var check = confirm('If you want to published this item,Press OK');
        if (check) {
            $.get("{{ route('batch-published') }}" , { batch_id:batchId, class_id:classId} , function (data) {
                $("#batchList").html(data);
            })
        }
    }

    function delt(batchId,classId) {
        var check = confirm('If you want to delete this item,Press OK');
        if (check) {
            $.get("{{ route('batch-delete') }}" , { batch_id:batchId, class_id:classId} , function (data) {
                $("#batchList").html(data);
            })
        }
    }
</script>








