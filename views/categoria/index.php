<h3> Gestionar Categorias </h3><br/><hr><br/>

<a href="<?= base_url ?>categoria/create" class="btn-create"> Crea Categoria </a><br/><br/>

<table>
    <tr>
        <th> ID </th>
        <th> CATEGORIA </th>
    </tr>
<?php
    foreach ($categories as $category){
?>   
        <tr>
            <td> <?= $category['id'] ?> </td>
            <td> <?= $category['categoria'] ?> </td>
        </tr>  
<?php      
    }   //var_dump($categories);
?>
</table>

    
