<div class="container">
    <h2>Perfil de empresa</h2>
    <form method="post" action="">
        <div class="jb-fg">
            <div class="jb-fgl">
                <label for="field-name">Nombre</label>
            </div>
            <div class="jb-fgr">
                <input type="text" class="" id="field-name" name="field-name" value="<?php echo $perfil['field-name'] ?? '' ?>">
            </div>
        </div>
        <div class="jb-fg">
            <div class="jb-fgl">
                <label for="field-surname">Primer Apellido</label>
            </div>
            <div class="jb-fgr">
                <input type="text" class="" id="field-surname" name="field-surname" value="<?php echo $perfil['field-surname'] ?? '' ?>">
            </div>
        </div>
        <div class="jb-fg">
            <div class="jb-fgl">
                <label for="field-lastname">Segundo Apellido</label>
            </div>
            <div class="jb-fgr">
                <input type="text" class="" id="field-lastname" name="field-lastname" value="<?php echo $perfil['field-lastname'] ?? '' ?>">
            </div>
        </div>
        <button type="submit" class="btn btn-">Guardar</button>
    </form>
</div>