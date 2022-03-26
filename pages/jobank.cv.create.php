<div class="container">
    <h2>Curriculum</h2>
    <form method="post" action="">
        <div class="jb-fg">
            <div class="jb-fgl">
                <label for="field-name">Nombre</label>
            </div>
            <div class="jb-fgr">
                <input type="text" class="" id="field-name" name="field-name" value="<?php echo $cv['field-name'] ?? '' ?>">
            </div>
        </div>
        <div class="jb-fg">
            <div class="jb-fgl">
                <label for="field-surname">Primer Apellido</label>
            </div>
            <div class="jb-fgr">
                <input type="text" class="" id="field-surname" name="field-surname" value="<?php echo $cv['field-surname'] ?? '' ?>">
            </div>
        </div>
        <div class="jb-fg">
            <div class="jb-fgl">
                <label for="field-lastname">Segundo Apellido</label>
            </div>
            <div class="jb-fgr">
                <input type="text" class="" id="field-lastname" name="field-lastname" value="<?php echo $cv['field-lastname'] ?? '' ?>">
            </div>
        </div>
        <div class="jb-fg">
            <div class="jb-fgl">
                <label for="field-pob">Población</label>
            </div>
            <div class="jb-fgr">
                <input type="text" class="" id="field-pob" name="field-pob" value="<?php echo $cv['field-pob'] ?? '' ?>">
            </div>
        </div>
        <div class="jb-fg">
            <div class="jb-fgl">
                <label for="field-mail">E-mail</label>
            </div>
            <div class="jb-fgr">
                <input type="text" class="" id="field-mail" name="field-mail">
            </div>
        </div>
        <div class="jb-fg">
            <div class="jb-fgl">
                <label for="field-tel">Teléfono</label>
            </div>
            <div class="jb-fgr">
                <input type="text" class="" id="field-tel" name="field-tel">
            </div>
        </div>
        <div class="jb-fg">
            <div class="jb-fgl">
                <label for="field-foto">Foto</label>
            </div>
            <div class="jb-fgr">
                <textarea class="" id="field-foto" name="field-foto"></textarea>
            </div>
        </div>
        <div class="jb-fg">
            <div class="jb-fgl">
                <label for="field-video">Video</label>
            </div>
            <div class="jb-fgr">
                <input type="text" class="" id="field-video" name="field-video">
            </div>
        </div>
        <div class="jb-fg">
            <div class="jb-fgl">
                <label for="field-presentacion">Carta de presentación</label>
            </div>
            <div class="jb-fgr">
                <textarea class="" id="field-presentacion" name="field-presentacion"></textarea>
            </div>
        </div>
        <div class="jb-fg">
            <div class="jb-fgl">
                <label for="field-intereses">Intereses y aptitudes</label>
            </div>
            <div class="jb-fgr">
                <textarea class="" id="field-intereses" name="field-intereses"></textarea>
            </div>
        </div>
        <div class="jb-fg">
            <div class="jb-fgl">
                <label for="field-url">URL</label>
            </div>
            <div class="jb-fgr">
                <textarea class="" id="field-url" name="field-url"></textarea>
            </div>
        </div>
        <div class="jb-fg">
            <div class="jb-fgl">
                <label for="field-education">Educación</label>
            </div>
            <div class="jb-fgr">
                <textarea class="" id="field-education" name="field-education"></textarea>
            </div>
        </div>
        <div class="jb-fg">
            <div class="jb-fgl">
                <label for="field-experience">Experiencia</label>
            </div>
            <div class="jb-fgr">
                <textarea class="" id="field-experience" name="field-experience"></textarea>
            </div>
        </div>
        <button type="submit" class="btn btn-">Guardar</button>
    </form>
</div>