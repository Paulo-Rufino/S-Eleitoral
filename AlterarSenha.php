<?php include 'includes/header.php'; ?>

<body class="hold-transition login-page">
<div class="login-box">
    <div class="login-logo">
      <b>ALTERAR SENHA</b>
    </div>
  
    <div class="login-box-body">
      <p class="login-box-msg">Faça a alteração da senha</p>

      <form action="LoginAlterado.php" method="POST">
          <!--<input type="text" class="id" name="id">-->
          
          <div class="form-group has-feedback">
            <input type="text" class="form-control" name="eleitor" placeholder="Usuário" required>
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
          </div>
          
          <div class="form-group has-feedback">
            <input type="password" class="form-control" name="Senha" placeholder="Nova Senha" required>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>

          <div class="form-group has-feedback">
            <input type="password" class="form-control" name="NovaSenha" placeholder="Confirmar Senha" required>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>

          <div class="row">
          <div class="col-xs-4">
                <button type="submit" class="btn btn-primary btn-block btn-flat" name="logar"><i class="fa fa-sign-in"></i> SALVAR</button>
            </div>
          </div>
      </form>
    </div>
    <?php
   if(isset($_SESSION['error'])){
        echo "
          <div class='callout callout-danger text-center mt20'>
            <p>".$_SESSION['error']."</p> 
          </div>
        ";
        unset($_SESSION['error']);
      }
    ?>
</div>
  
<?php include 'includes/scripts.php' ?>
</body>
</html>
