<div class="container">
    <h2>Publicar Oferta</h2>
    <form method="post" action="?save">
        <div class="jb-fg">
            <div class="jb-fgl">
                <label for="field-cargo">Cargo</label>
            </div>
            <div class="jb-fgr">
                <input type="text" class="" id="field-cargo" name="field-cargo">
            </div>
        </div>
        <div class="jb-fg">
            <div class="jb-fgl">
                <label for="field-ciudad">Ciudad</label>
            </div>
            <div class="jb-fgr">
                <input type="text" class="" id="field-ciudad" name="field-ciudad">
            </div>
        </div>
        <div class="jb-fg">
            <div class="jb-fgl">
                <label>Contrato</label>
            </div>
            <div class="jb-fgr">
                <label>
                    <input type="radio" name="field-contrato" value="fijo">
                    Temporada/deternminado
                </label>
                <label>
                    <input type="radio" name="field-contrato" value="temporal">
                    Fijo
                </label>
            </div>
        </div>
        <div class="jb-fg">
            <div class="jb-fgl">
                <label>Turno</label>
            </div>
            <div class="jb-fgr">
                <label>
                    <input type="radio" name="field-turno" value="mañana">
                    mañana
                </label>
                <label>
                    <input type="radio" name="field-turno" value="tarde">
                    tarde
                </label>
                <label>
                    <input type="radio" name="field-turno" value="noche">
                    noche
                </label>
                <label>
                    <input type="radio" name="field-turno" value="partido">
                    partido
                </label>
                <label>
                    <input type="radio" name="field-turno" value="comercial">
                    comercial
                </label>
            </div>
        </div>
        <div class="jb-fg">
            <div class="jb-fgl">
                <label>Experiencia</label>
            </div>
            <div class="jb-fgr">
                <label>
                    <input type="radio" name="field-experiencia" value="no">
                    No requerida
                </label>
                <label>
                    <input type="radio" name="field-experiencia" value="2">
                    2 años min.
                </label>
                <label>
                    <input type="radio" name="field-experiencia" value="5">
                    5 años min.
                </label>
                <label>
                    <input type="radio" name="field-experiencia" value="10">
                    10 años min.
                </label>
            </div>
        </div>
        <div class="jb-fg">
            <div class="jb-fgl">
                <label for="field-description">Descripción</label>
            </div>
            <div class="jb-fgr">
                <textarea name="field-description" id="field-description"></textarea>
            </div>
        </div>
        <div class="jb-fg">
            <div class="jb-fgl">
                <label for="field-empresa_name">Empresa</label>
            </div>
            <div class="jb-fgr">
                <input type="text" id="field-empresa_name" name="field-empresa_name">
            </div>
        </div>
        <div class="jb-fg">
            <div class="jb-fgl">
                <label for="field-empresa_web">Website</label>
            </div>
            <div class="jb-fgr">
                <input type="text" id="field-empresa_web" name="field-empresa_web">
            </div>
        </div>
        <div class="jb-fg">
            <div class="jb-fgl">
                <label for="field-empresa_descrip">Sobre la empresa</label>
            </div>
            <div class="jb-fgr">
                <input type="text" id="field-empresa_descrip" name="field-empresa_descrip">
            </div>
        </div>
        <button type="submit" class="btn btn-">Publicar</button>
    </form>
</div>