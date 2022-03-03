<table border="1">
    <tr>
        <th>Name</th>
        <th>Description</th>
        <th>File</th>
    </tr>

        <tr>
            <td>{{$data->name}}</td>
            <td>{{$data->description}}</td>
           <div height="700" width="400"> <td><iframe height="100%" width="100%" src="/assets/{{$data->file}}" style="width: 100%;"></iframe></td></div>
        </tr>

</table>
