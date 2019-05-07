
         
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
        <h3>Formulario de Sugerencias</h3>
        <form id="form1" name="form1" action="./pages/mail.php" method="POST">
         <p>
             Correo electrónico: <input type="email" name="mail" id="mail" value="tienda_pollos@gmail.com" readonly >
        </p>
            Sugerencia: 
            <p>
                <textarea placeholder="Escribe aquí tú sugerencía" style="resize:none;" name="com" id="com" cols="25" rows="5" ></textarea>

            <p> Aceptas los terminos y <a href="index.php?p=condiciones">Condiciones de uso de tus datos.</a>    <input type="checkbox" name="condicion" id="condicion" onclick="checkifempty()" required/></p> 

        </p>
        <input type="submit" name="registrarse" id="registrarse" disabled="true">
        </form>