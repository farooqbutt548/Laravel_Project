<h2>Product File</h2>
<table border="1px">

    <tr>
        <th>Name</th>
        <th>Description</th>
        <th>View</th>
        <th>Download</th>
    </tr>
    @foreach($data as $data)
    <tr>
        <td>{{$data->name}}</td>
        <td>{{$data->description}}</td>
        <td><a href="{{route('downloadFile',$data->file)}}">Download</a> </td>
        <td> <a href="{{route('viewFile',$data->id)}}">View</a> </td>
    </tr>
    @endforeach
</table>

