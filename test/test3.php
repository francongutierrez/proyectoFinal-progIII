<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="test.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  
</head>
<body>
  <div class="container">
    <div class="row"></div>
    <form id="myForm" class="needs-validation" novalidate>
      <input type="text" id="username" class="form-control" placeholder="Titulo">
      <input type="text" id="username" class="form-control" placeholder="Descripcion">
      <button type="submit">Enviar</button>
    </form>
  </div>


  <div class="container">
    <div id="errorModal" class="modal">
    <div class="modal-dialog">
      <div class="modal-content">  
        <div class="modal-header">
          <h4>Error</h4>
          <span class="close" id="closeModal">&times;</span>
        </div>   
        <div class="modal-body">
          <p id="errorText"></p>
        </div>
        <div class="modal-footer">
          <button  data-bs-dismiss="errorModal">Cerrar</button>
        </div>
      </div>
    </div>
    </div>
  </div>

  <script src="test2.js"></script>

</body>
</html>
