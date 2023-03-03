<!Doctype html>
<html>
    <title>
        Mon premier projet en Laravel
    </title>
    <link rel="stylesheet" href=" {{asset('css/style.css')}} ">
    <body>
        <table>
          <img class="card-img-top" src="holder.js/100px180/" alt="Title">
          <div class="card-body">
            <h4 class="card-title">Title</h4>
            <p class="card-text">Text</p>
          </div>
        </div>>
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
