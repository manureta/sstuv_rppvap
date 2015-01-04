<div class="login-container login-layout">
    <div class="position-relative">
        <div class="login-container">
        <div id="login-box" class="login-box visible widget-box no-border">

            <div class="widget-body">
                <div class="widget-main">
                <h4 class="header blue lighter bigger">
                    <i class="icon-user green"></i>
                    Por favor ingrese los datos requeridos
                </h4>
                
                <div class="space-6"></div>
              
                        <fieldset>
                            <?php $_CONTROL->txtUsuario->RenderWithError(); ?>
                            <?php $_CONTROL->txtPassword->RenderWithError(); ?>

                            <div class="space"></div>

                            <div class="clearfix">

                                <?php $_CONTROL->btnLogin->Render(); ?>  
                            </div>

                            <div class="space-4"></div>
                        </fieldset>
              

                </div><!-- /widget-main -->

                <div class="toolbar clearfix">
                   
                    <div></div>

                    
                </div>
            </div><!-- /widget-body -->
        </div><!-- /login-box -->
    </div>
</div>
