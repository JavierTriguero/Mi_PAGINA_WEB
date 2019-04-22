<html>
 
        <head>
         
        <script type="text/javascript">
        
        
        //Si el checkbox esta marcado 
        function checkifempty()
        {
            
            if (!document.form1.condicion.checked)
          {
              //deshabilitado a true
            document.form1.registrarse.disabled=true;
          }
            else
          {     
              //deshabilitado a false
            document.form1.registrarse.disabled=false;
          }
         
        }
        </script>
         
         
        </head>
         
         
        <body>
         <h3>Formulario de Sugerencias</h3>
        <form id="form1" name="form1" action="./pages/mail.php" method="POST">
         <p>
             Correo electrónico: <input type="email" name="mail" id="mail"  pattern="^[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$" required >
        </p>
            Sugerencia: 
            <p>
                <textarea style="resize:none;" maxlength="50" name="com" id="com" cols="30" rows="10">

                </textarea>
            <p> Aceptas los terminos y condiciones de uso de tus datos.    <input type="checkbox" name="condicion" id="condicion" onclick="checkifempty()" required/></p> 

        </p>
        <input type="submit" name="registrarse" id="registrarse" disabled="true">
        </form>
         
        </body>
         
    </html>