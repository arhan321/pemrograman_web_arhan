@foreach ($gurus as $g)
<tr>
    <th scope="row">{{ $g->id }}</th>
    <td>{{ $g->first_name }}</td>
    <td>{{ $g->middle_name }}</td>
    <td>{{ $g->last_name }}</td>
    <td>{{ $g->birth_dath }}</td>
    <td class="text-center">
        <a href="{{ asset('/storage/guru/'.$g->foto) }}" target="_blank">
            <img src="{{ asset('/storage/guru/'.$g->foto) }}" class="rounded" style="width: 150px">
        </a>
    </td>
    <td>
        <a href="{{ route('guru.show', $g->id) }}" class="btn btn-primary">Show</a>
        <a href="{{ route('guru.edit', $g->id) }}" class="btn btn-success">Edit</a>
        <form action="{{ route('guru.destroy', $g->id) }}" method="POST" style="display:inline-block;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>
    </td>
</tr>
@endforeach
