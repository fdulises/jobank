<div class="container">
    <h2>Publicar Oferta</h2>
    <form method="post" action="?save">
        <div class="jb-fg">
            <div class="jb-fgl">
                <label for="field-cargo">Cargo</label>
            </div>
            <div class="jb-fgr">
                <input type="text" class="" id="field-cargo">
            </div>
        </div>
        <div class="jb-fg">
            <div class="jb-fgl">
                <label for="field-ciudad">Ciudad</label>
            </div>
            <div class="jb-fgr">
                <input type="text" class="" id="field-ciudad">
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
        <button type="submit" class="btn btn-">Publicar</button>
    </form>
</div>