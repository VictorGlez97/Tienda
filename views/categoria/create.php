<h3> Crea Categoria </h3><br/><hr/><br/>

<form action="<?=base_url?>categoria/save" method="POST">
    
    <label for="category"> Nombre de la categoria: </label><br/>
    <input type="text" name="category" required /><br/>
    
    <input type="submit" value="Guardar" class="btn-create" />
    
</form>

<?php //var_dump($_SESSION); ?>

