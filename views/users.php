<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title text-bold"><i class="fa fa-user"></i> Cadastro de Usuario</h3>
            </div>
            <form name="user" action="<?= LOCALHOST ?>user" method="POST" >
                <div class="box-body">
                    <div class="alert alert-success alert-dismissible hidden col-md-12">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <i class="icon fa fa-check"></i>
                        <span class="text-bold">
                            Cadastro com Sucesso;
                        </span>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="user_id"><i class="fa fa-expeditedssl"></i> Id Usuario</label>
                        <input type="text" readonly class="form-control"  value="0" name="user_id" id="user_id" placeholder="Gerado Automatico">
                    </div>
                    <div class="form-group col-md-10">
                        <label for="user_name"><i class="fa fa-search-plus"></i> Nome Usuario</label>
                        <input type="text" class="form-control" name="user_name" id="user_name" placeholder="Nome do Usuario">
                    </div>
                    <div class="form-group col-md-12">
                        <label for="user_email">E-mail</label>
                        <input type="text" class="form-control" name="user_email" id="user_email" placeholder="Email">
                    </div>
                </div>
                <div class="box-footer text-right ">
                    <button type="submit" class="btn bg-blue-active text-info text-bold "><i class="fa fa-save"></i> Salvar   </button>
                    <button type="button"  class="btn btn-danger  text-bold" ><i class="fa fa-close"></i> Cancelar</button>     
                    <img id="gifload" class="logo hidden " alt="" src="<?= TEMPLATE_RESOURCES; ?>load.gif"/>
                </div>
            </form>
        </div>

    </div>   
</div>



