<!-- Modal -->
<div class="modal fade" id="AddModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New Livreur</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form class="form-inline" method="POST" action="../LivreurController/CA@Livreur.php?cmd=add">
        <div name='cmd' value='add' class="form-group mb-2">
            <label for="staticEmail2" class="sr-only">Email </label>
            <input name='mail' type="mail" class="form-control" id="inputEmail4" placeholder="">
            <label for="staticEmail2" class="sr-only">Nom </label>
            <input name='nom' type="text" class="form-control" id="inputEmail4" placeholder="">
            <label for="staticEmail2" class="sr-only">Prenom </label>
            <input name='prenom' type="text" class="form-control" id="inputEmail4" placeholder="">
            <label for="staticEmail2" class="sr-only">Phone Number </label>
            <input name='pn' type="tel" class="form-control" id="inputEmail4" placeholder="">
            <label for="staticEmail2" class="sr-only">password </label>
            <input name='pass' type="password" class="form-control" id="inputEmail4" placeholder="">
        </div>
        
    
       
      </div>
      <div  class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="submit" value="Add" class="btn btn-primary">
      </div>
      </form>
    </div>
  </div>
</div>