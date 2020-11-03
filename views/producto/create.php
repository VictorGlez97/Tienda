<?php if (isset($edit) && $edit && isset($pro) && is_object($pro)){ ?>
        <h3> Edita Producto <?= $pro->producto; ?> </h3><br/><hr/><br/>
        <?php $url = base_url.'producto/update&id='.$id; //var_dump($pro);?>
<?php } else { ?>
        <h3> Agrega Producto </h3><br/><hr/><br/>
        <?php $url = base_url.'producto/save'; ?>
<?php } ?>

<form action="<?= $url ?>" method="POST" enctype="multipart/form-data">
    
    <label for="product"> Producto: </label><br/>
    <input type="text" name="product" value="<?= isset($pro) && is_object($pro) ? $pro->producto : '' ?>" required /><br/>
    
    <label for="category"> Categoria: </label><br/>
    <select name="category" >
        <option value=""> </option>
    <?php 
        $categories = Utls::showCategories(); 
        if (!empty($categories)){
            foreach ($categories as $category){
    ?>
        <option value="<?= $category['id'] ?>" <?= isset($pro) && is_object($pro) && $category['id'] == $pro->catego_id ? 'selected' : ''  ?> > <?= $category['categoria'] ?> </option>
    <?php          
            }
        }
    ?>
    </select><br/>
    
    <label for="desc"> Descripción </label><br/>
    <textarea name="desc"> <?= isset($pro) && is_object($pro) ? $pro->descripcion : '' ?> </textarea><br/>
    
    <label for="price"> Precio: </label><br/>
    <input type="number" name="price" value="<?= isset($pro) && is_object($pro) ? $pro->precio : '' ?>" required /><br/>
    
    <label for="disp"> Disposición: </label><br/>
    <input type="number" name="disp" value="<?= isset($pro) && is_object($pro) ? $pro->disposicion : '' ?>" required /><br/>
    
    <label for="bargain"> Oferta: </label><br/>
    <input type="text" name="bargain" value="<?= isset($pro) && is_object($pro) ? $pro->oferta : '' ?>" /><br/>
    
    <label for="date"> Fecha: </label><br/>
    <input type="text" name="date" value="<?= date("j / F / Y") ?>" required readonly style="text-align: center;" /><br/>
    <!--<input type="date" name="date" required /><br/>-->
    
    <label for="img"> Imagen: </label><br/>
    <?php if (isset($pro) && is_object($pro) && !empty($pro->img)) {?>
    <img src="<?= base_url ?>/uploads/images/<?=$pro->img?>" height="20%" width="20%"><br/>
    <?php } ?>
    <input type="file" name="img" /><br/>
    
    <button type="submit" class="btn-create"> Guardar </button>
    
</form>

