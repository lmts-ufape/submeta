

        <div class="col-sm-10">
            <h1 class="">Avaliadores</h1>
        </div>

        <table class="table table-hover table-responsive-lg table-sm">
          <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Nome</th>
              <th scope="col">E-mail</th>
              <th scope="col">Trabalhos</th>
              <th scope="col">Visualizar</th>
            </tr>
          </thead>
          <tbody>
            @php $i = 0; @endphp
            @foreach($avaliadores as $avaliador)

            <tr>
              <td>{{$avaliador->id}}</td>
              <td>{{$avaliador->user->name}} </td>
              <td>{{$avaliador->user->email}}</td>
              <td> </td>
              <td> </td>

            </tr>
            @endforeach
          </tbody>
        </table>

