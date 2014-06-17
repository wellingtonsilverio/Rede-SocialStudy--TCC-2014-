<div id="opcoesG">
    <div>Adicionar Administrador do Grupo</div>
    <div>Remover Administrador do Grupo</div>
    <div id="mdg" onClick="javascript: $('#smdg').slideToggle(300);">Mudar descriçao do Grupo</div>
    <section id="smdg">
    	<h1>Descriçao:</h1>
        <form method="post">
        <textarea id="mdesc" name="mdesc"></textarea>
        <input name="Submit" type="submit" class="submit" value="Editar descriçao" style="float:right; margin-top:-37px; margin-right:5px; border-radius:5px; width:150px;" />
        </form>
    </section>
    <div onClick="javascript: $('#smng').slideToggle(300);">Mudar nome do Grupo</div>
    <section id="smng">
    	<h1>Mudar nome:</h1>
        <form method="post">
        <input type="text" id="mdnome" name="mdnome" />
        <input name="Submit" type="submit" class="submit" value="Editar nome" style="float:right; margin-top:-29px; margin-right:5px; border-radius:5px; width:150px;" />
        </form>
    </section>
    <div>Mudar categorias do Grupo</div>
    <div onClick="javascript: $('#smfg').slideToggle(300);">Mudar a foto do Grupo</div>
  <section id="smfg">
    	<h1>Mudar foto:</h1>
        <form method="post" enctype="multipart/form-data">
        <input type="file" name="mdfoto" id="mdfoto">
        <input name="Submit" type="submit" class="submit" value="Editar foto" style="float:right; margin-top:-29px; margin-right:5px; border-radius:5px; width:150px;" />
    </form>
    </section>
</div>