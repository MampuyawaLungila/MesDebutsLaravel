<!Doctype html>
<html>
    <title>
        Mon premier projet en Laravel
    </title>
    <body>
        <table>
    <thead>
        <tr>
            <th colspan="2">Tableau des posts</th>
        </tr>
    </thead>
    <tbody>
        @foreach($post as $p)
        <tr>
            <td>{{ $p->titre }}</td>
            <td>{{ $p->contenu }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

    </body>
</html>