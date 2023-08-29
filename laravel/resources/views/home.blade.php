<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Via CEP</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script>
      window.csrfToken = "{{ csrf_token() }}";
    </script>
  </head>
  <body>
    <div class="container mt-5">
      <div class="row">
        <div class="col-md-6 offset-md-3">
          <section>
            <div class="container">
              <label for="cep">Digite o CEP:</label>
              <input type="text" id="cep">
              <button class="btn btn-primary" id="search">BUSCAR</button>
            </div>
          </section>
        </div>
      </div>
    </div>
    <div class="container mt-5">
      <div class="row">
      @if(isset($error))
      <div class="alert alert-danger">
          {{ $error }}
        </div>
    @endif
    <div class="col-md-6 offset-md-3">
          <table class="table table-bordered" id="cepTable">
            <thead>
              <tr>
                <th scope="col">CEP</th>
                <th scope="col">Cidade</th>
                <th scope="col">UF</th>
                <th scope="col">Rua</th>
                <th scope="col">Bairro</th>
              </tr>
            </thead>
            <tbody>
            <tbody id="resultBody"></tbody>
            </tbody>
          </table>
          <button id="downloadCSV" class="btn btn-primary">Download CSV</button>
          <button id="limparTabela" class="btn btn-danger">Limpar tabela</button>
        </div>
      </div>
    </div>
  </body>
  <script src="{{ asset('js/cep.js') }}"></script>
  <script src="{{ asset('js/csv.js') }}"></script>
</html>
