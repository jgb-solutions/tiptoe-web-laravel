<div>
    @foreach($users as $index => $user)
    <tr onclick="location.href='{{ route('profile', ['user'=> $user->id]) }}'" class="cursor-pointer">
        <td class="text-center">{{ $index + 1 }}</td>
        <td>{{ $user->name }}</td>
        <td>
            <a href="mailto:{{ $user->email }}">{{ $user->email }}</a>
        </td>
        <td>{{ $user->created_at }}</td>
        <td>
            <button class="btn btn-sm btn-{{ $user->active ? 'success' : 'secondary' }}" style="width:100px;"
                title="Click here to {{ $user->active ? 'Active' : 'Desactive' }}">
                {!! $user->active ? "Active" : "inactive" !!}
            </button>
        </td>
    </tr>
    @endforeach
</div>